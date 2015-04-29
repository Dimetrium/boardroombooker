<?php

class Controller_Details extends Controller
{

    private $employee_id;

    function __construct ( $param_one = null, $param_two = null )
    {
        if ( $param_one ) {
            $this->employee_id = $param_one;
        }
        $this->view = new View();
        $this->model = new Model_Details();

    }

    function action_index ()
    {

    }

    function action_show ()
    {
        $result = $this->model->getEvent( $this->employee_id );
        $this->view->generate( 'details_view.php', 'template_view.php', $result );

    }

    public function action_update ()
    {

        $this->model->updateEvent();
        header( 'Location:' . BASE );

    }

    public function action_delete ()
    {

        $this->model->delEvent();
        header( 'Location:' . BASE );

    }

}





