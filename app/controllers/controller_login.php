<?php

class Controller_Login extends Controller
{
	
	function action_index()
	{
		//$data["login_status"] = "";

		if(isset($_POST['username']) && isset($_POST['password']))
		{
			$login = $_POST['username'];
			$password =$_POST['password'];
			
			if($login=="root" && $password=="123")
			{
				$data["login_status"] = "access_granted";

				session_start();
				$_SESSION['admin'] = $password;
                header('Location:main/');
			}
			else
			{
				$data["login_status"] = "access_denied";
			}
		}
		else
		{
			$data["login_status"] = "";
            $this->view->generate('login_view.php', 'template_view.php', $data);

        }
		
	}
	
}
