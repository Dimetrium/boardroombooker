<?php

class Controller_Bookit extends Controller
{


    function __construct ( $param_one = null, $param_two = null )
    {

        $this->view = new View();
//        $this->model = new Event_Model();

    }

    function action_index ()
    {
        $this->view->generate('bookit_view.php', 'template_view.php');
    }
    public function action_add()
    {
        $start_date = $_POST['date'].' '.$_POST['start'].':00';
        $end_date = $_POST['date'].' '.$_POST['end'].':00';

        $start_date = strtotime($start_date);
        $end_date = strtotime($end_date);
        var_dump($start_date);
        var_dump($end_date);
        var_dump( $_POST );
    }


}





