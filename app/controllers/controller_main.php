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
        $calendar->addDailyHtml( $e, $d, $event );
      }
    }

    ////////////////////////////

    if(!isset($_COOKIE['start_day']))
    {
      $_COOKIE['start_day'] = 'Monday';
    }

    if(isset($_POST['start_day']))
    {

      $start_day = $_POST['start_day'];
      setcookie( "start_day", $_POST['start_day'], time() + 60 * 60 * 24 * 30, BASE );

    }else{

      $start_day = $_COOKIE['start_day'];
    }

    //////////////////////////////

    $calendar->setStartOfWeek( $start_day );

    $data[ 'boardrooms' ] = $this->model->getRooms();
    $data[ 'showCalendar' ] = $calendar->show( FALSE );
    $data[ 'getDate' ] = $calendar->getData();

    if ( is_array( $data ) ) {
      return $this->view->generate( 'calendar_view.php', 'template_view.php', $data );
    } else {
      throw new Exception( 'Method "generate" expected array.' );
    }
  }

  function action_logout()
  {
    $user = new User();
    $user->userLogout();
    header('Location:'.BASE);
  }


}

