<?php

class Controller_Admin extends Controller
{
    public $model;

    function __construct ()
    {
        $this->model = new Model_Admin();
        $this->view = new View();
    }

    function action_index ()
    {
        session_start();
        $_SESSION[ 'root' ] = "123";

        if ( $_SESSION[ 'root' ] == "123" ) {
            $data = $this->model->get_data();
            $this->view->generate( 'admin_view.php', 'admin_template_view.php', $data );
        } else {
            session_destroy();
            Router::ErrorPage404();
        }


    }

    function action_logout ()
    {
        session_start();
        session_destroy();
        header( 'Location: /~user5/bookshop/' );
    }

    function action_add ()
    {
        $data = $this->model->get_data();
        $this->view->generate( 'add_view.php', 'admin_template_view.php', $data );
    }

    function action_edit ()
    {
        $data = $this->model->getBook();
        $this->view->generate( 'edit_view.php', 'admin_template_view.php', $data );
    }

    function action_users ()
    {
        $this->view->generate( 'users_view.php', 'admin_template_view.php' );

    }
}
