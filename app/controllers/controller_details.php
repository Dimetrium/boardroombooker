<?php

class Controller_Details extends Controller
{


    function __construct ( $param_one = null, $param_two = null )
    {

        $this->view = new View();
//        $this->model = new Model_Details();

    }

    function action_index ()
    {
        $this->view->generate('details_view.php', 'template_view.php');
    }

    public function action_add()
    {
//        $this->model->addEvent($event);

    }


}





