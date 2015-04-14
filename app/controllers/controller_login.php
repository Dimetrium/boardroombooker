<?php

class Controller_Login extends Controller
{

    function action_index ()
    {
        $user = new User();
        if ( ( isset( $_POST[ 'username' ] ) && isset( $_POST[ 'password' ] ) )
            && ( TRUE == $user->userAuthorization() ) ) {

            header( 'Location:/');

        } else {
            $this->view->generate('login_view.php', 'template_view.php');
        }
    }
}
