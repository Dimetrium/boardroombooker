<?php

class Controller_Login extends Controller
{

    function action_index ()
    {
        $user = new User();
        if ( ( isset( $_POST[ 'login' ] ) && isset( $_POST[ 'password' ] ) )
            && ( TRUE == $user->userAuthorization() ) ) {

            header( 'Location:'.BASE);

        } else {
            $this->view->generate('login_view.php', 'template_view.php');
        }
    }
}
