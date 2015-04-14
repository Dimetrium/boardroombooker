<?php

class Controller_User extends Controller
{

    function __construct ()
    {
        $this->model = new Model_User();
        $this->view = new View();
    }

    function action_index ()
    {

/*        session_start();
        $_SESSION[ 'root' ] = "123";

        if ( $_SESSION[ 'root' ] == "123" ) {
            $data = $this->model->get_data();
            $this->view->generate( 'admin_view.php', 'admin_template_view.php', $data );
        } else {
            session_destroy();
            Router::ErrorPage404();
        }*/

    }

    function action_new ()
    {
        $data = $this->model->get_data();
        $this->view->generate( 'user_view.php', 'template_view.php', $data );

    }

}
