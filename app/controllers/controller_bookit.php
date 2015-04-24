<?php

class Controller_Bookit extends Controller
{


    function __construct ( $param_one = null, $param_two = null )
    {

        $this->view = new View();
        $this->model = new Model_Bookit();

    }

    function action_index ()
    {
        $data = $this->model->getUsers();
        $this->view->generate('bookit_view.php', 'template_view.php', $data);
    }

    public function action_add()
    {
        $this->model->addEvent();

    }


}





