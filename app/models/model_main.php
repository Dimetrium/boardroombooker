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
            SELECT app_start, app_end, id_room
            FROM xyz_appointments
            WHERE id_room = :id
SQL;

        $result = $this->dbh->getRows( $query, array(
            'id' => $id,
        ) );
        $dbh = NULL;
        foreach ( $result as $key => $val ) {
            $event[ ] = date( 'H:i', $val[ 'app_start' ] ) . '-' . date( 'H:i', $val[ 'app_end' ] );
            $date[ ] = date( 'm/d/Y', $val[ 'app_start' ] );
        }

        function array_combine_($keys, $values)
        {
            $result = array();
            foreach ($keys as $i => $k) {
                $result[$k][] = $values[$i];
            }
            array_walk($result, create_function('&$v', '$v = (count($v) == 1)? array_pop($v): $v;'));
            return    $result;
        }

        return array_combine( array_values($event), array_values($date) );
    }

    public function setDateToShow ( $month = NULL, $year = NULL )
    {
        $this->month = $month;
        $this->year = $year;
    }

    public function getDateToShow ()
    {
        if ( isset( $_POST[ 'month' ] ) && isset( $_POST[ 'year' ] ) ) {
            $month = $_POST[ 'month' ];
            $year = $_POST[ 'year' ];
        } else if ( NULL !== $this->month ) {
            $month = $this->month;
        } else if ( NULL == $this->year ) {
            $yea = $this->year;
        }

        $month ? $showmonth = $month : $showmonth = date( 'm', time() );
        $year ? $showyear = $year : $showyear = date( 'Y', time() );
        $current_day = date( 'd', time() );

        return $showmonth . '/' . $current_day . '/' . $showyear;
    }

}