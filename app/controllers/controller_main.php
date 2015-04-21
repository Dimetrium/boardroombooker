<?php

class Controller_Main extends Controller
{
    private $month;
    private $year;

    function __construct ( $param_one = null, $param_two = null )
    {

        if ( isset( $_POST[ 'month' ] ) ) {
            $this->month = $_POST[ 'month' ];
        } else if ( NULL !== $param_one ) {
            $this->month = $param_one;
        }
        if ( isset( $_POST[ 'year' ] ) ) {
            $this->year = $_POST[ 'year' ];
        } else if ( NULL !== $param_two ) {
            $this->year = $param_two;
        }

        $this->model = new Model_Main();
        $this->view = new View();

    }

    function action_index ()
    {

        $this->month ? $showmonth = $this->month : $showmonth = date( 'm', time() );
        $this->year ? $showyear = $this->year : $showyear = date( 'Y', time() );
        $current_day = date( 'd', time() );

        $calendar = new Calendar( $showmonth . '/' . $current_day . '/' . $showyear );


        $dbh = DBConnect::getInstance();
        $query = <<<SQL
            SELECT id_room
            FROM xyz_appointments
SQL;
        $room = $dbh->getRows( $query );

        $query = <<<SQL
            SELECT start, end, id_room
            FROM xyz_appointments
            WHERE id_room = :id
SQL;

        session_start();

        if ( isset( $_POST[ 'id_room' ] ) ) {
            $_SESSION[ 'id_room' ] = $_POST[ 'id_room' ];
        } else {
            $id = $_SESSION[ 'id_room' ];
        }

        if ( !isset( $_SESSION[ 'id_room' ] ) ) {
            $_SESSION[ 'id_room' ] = '1';
        }

        session_write_close();
        function array_value_recursive($key, array $arr){
            $val = array();
            array_walk_recursive($arr, function($v, $k) use($key, &$val){
                if($k == $key) array_push($val, $v);
            });
            return count($val) > 1 ? $val : array_pop($val);
        }
        $room = array_value_recursive('id_room', $room);
        $room = array_unique($room);




        $result = $dbh->getRows( $query, array(
            'id' => $id,
        ) );
        $dbh = NULL;

        foreach ( $result as $key => $val ) {
            $event[ ] = date( 'H:i', $val[ 'start' ] ) . '-' . date( 'H:i', $val[ 'end' ] );
            $date[ ] = date( 'm/d/Y', $val[ 'start' ] );
//            $room[ ] = $val[ 'id_room' ];
        }
        $eventGet = array_combine( $event, $date );

        $boardrooms = array_unique( $room );

        $calendar->setStartOfWeek( 'Monday' );
        foreach ( $eventGet as $event => $date ) {
            $calendar->addDailyHtml( $event, $date );
        }


        $template = 'calendar_view.php';

        $data[ 'showCalendar' ] = $calendar->show( FALSE );
        $data[ 'getDate' ] = $calendar->getData();
        $data[ 'boardrooms' ] = $boardrooms;

        if ( TRUE ) {
            return $this->view->generate( $template, 'template_view.php', $data );
        } else {
            throw new Exception( 'Method "generate" expected array.' );
        }
    }


}





