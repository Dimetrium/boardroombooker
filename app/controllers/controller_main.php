<?php

class Controller_Main extends Controller
{

    function __construct ($param)
    {

        $this->model = new Model_Main($param);
        $this->view = new View();

    }

    function action_index ()
    {

        $template = 'calendar_view.php';
        $data[] = $this->model->draw_calendar(4, 2015);

        if ( is_array( $data ) ) {
            return $this->view->generate( $template, 'template_view.php', $data );
        } else {
            throw new Exception( 'Method "generate" expected array.' );
        }
    }

}





