<?php

/**
 * Class Model_Main
 *
 */
class Model_Main extends Model
{
    private $month;
    private $year;

    /**
     * @return array
     * @throws Exception
     */
    public function getRooms ()
    {

        $query = <<<SQL
            SELECT id_room
            FROM xyz_appointments
SQL;

        $room = $this->dbh->getRows( $query );


        // don't touch dis fuknshan
        function array_value_recursive ( $key, array $arr )
        {
            $val = array();
            array_walk_recursive( $arr, function ( $v, $k ) use ( $key, &$val ) {
                if ( $k == $key ) array_push( $val, $v );
            } );

            return count( $val ) > 1 ? $val : array_pop( $val );
        }

        $room = array_value_recursive( 'id_room', $room );

        return array_unique( $room );

    }

    public function getEvents ()
    {
        /**
         * get values of rooms id's from main page header of boardrooms select,
         * write in session
         * and Depending on room_ID get events
         * @default '1' boardroom.
         */
        /**
         * TODO: Change store method to Cookies
         */
        session_start();
        if ( isset( $_POST[ 'id_room' ] ) ) {
            $_SESSION[ 'id_room' ] = $_POST[ 'id_room' ];
        } else {
            if ( !isset( $_SESSION[ 'id_room' ] ) ) {
                $_SESSION[ 'id_room' ] = '1';
            }
            $id = $_SESSION[ 'id_room' ];
        }
        session_write_close();

        $query = <<<SQL
            SELECT app_start, app_end, id_room, appointment_id
            FROM xyz_appointments
            WHERE id_room = :id
SQL;

        $result = $this->dbh->getRows( $query, array(
            'id' => $id,
        ) );
        $dbh = null;
        foreach ( $result as $key => $val ) {
            if ( !empty( $val[ 'app_start' ] ) || !empty( $val[ 'app_end' ] ) ) {
                $time = date( 'H:i', $val[ 'app_start' ] ) . '-' . date( 'H:i', $val[ 'app_end' ] );
                $eventDate = date( 'm/d/Y', $val[ 'app_start' ] );
            }

            $event[ $val[ 'appointment_id' ] ] = [ $time => $eventDate ];

        }

        return $event;
    }

    public function setDateToShow ( $month = null, $year = null )
    {
        $this->month = $month;
        $this->year = $year;
    }

    public function getDateToShow ()
    {
        if ( isset( $_POST[ 'month' ] ) && isset( $_POST[ 'year' ] ) ) {
            $month = $_POST[ 'month' ];
            $year = $_POST[ 'year' ];
        } else if ( null !== $this->month ) {
            $month = $this->month;
        } else if ( null == $this->year ) {
            $year = $this->year;
        }

        $month ? $showmonth = $month : $showmonth = date( 'm', time() );
        $year ? $showyear = $year : $showyear = date( 'Y', time() );
        $current_day = date( 'd', time() );

        return $showmonth . '/' . $current_day . '/' . $showyear;
    }

    public function getUser ()
    {
        $user = new User();

        return $user->userGet();
    }

}
