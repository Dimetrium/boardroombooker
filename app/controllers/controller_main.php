<?php

class Controller_Main extends Controller
{

    function __construct ( $param_one = NULL, $param_two = NULL )
    {

        $this->view = new View();
        $this->model = new Model_Main();
        $this->model->setDateToShow( $param_one, $param_two );

    }

    function action_index ()
    {

        $calendar = new Calendar( $this->model->getDateToShow() );
        // add events array to calendar

        foreach ( $this->model->getEvents() as $event => $date ) {
          foreach ( $date as $e=>$d){
            $calendar->addDailyHtml( $e, $d );
          }
        }

        $calendar->setStartOfWeek( 'Monday' );

        $data[ 'boardrooms' ] = $this->model->getRooms();
        $data[ 'showCalendar' ] = $calendar->show( FALSE );
        $data[ 'getDate' ] = $calendar->getData();

        if ( is_array( $data ) ) {
            return $this->view->generate( 'calendar_view.php', 'template_view.php', $data );
        } else {
            throw new Exception( 'Method "generate" expected array.' );
        }
    }


}





