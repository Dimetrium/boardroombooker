<?php

class Controller_Employee extends Controller
{
    private $employee_id;

    function __construct ( $param_one = null, $param_two = null )
    {
        if ( $param_one ) {
            $this->employee_id = $param_one;
        }

        $this->view = new View();
        $this->model = new Model_Employee();
        $this->user = new User();
    }

    function action_index ()
    {

        $data = $this->model->getUsers();

        return $this->view->generate( 'employee_view.php', 'template_view.php', $data );
    }

    function action_add ()
    {

        if ( true == $this->user->userCheck() ) {
            $this->model->userAdd();
        }
        header( 'Location:' . BASE . 'employee' );

    }

    function action_del ()
    {

        $this->model->userDel( $this->employee_id );
        header( 'Location:' . BASE . 'employee' );

    }

    function action_edit ()
    {
        if ( isset( $_POST[ 'employee_email' ] ) ) {

            $this->model->userEdit( $this->employee_id );

            return header( 'Location:' . BASE . 'employee' );

        }

        $users = $this->model->getUser( $this->employee_id );

        return $this->view->generate( 'edit_view.php', 'template_view.php', $users );

    }

}

