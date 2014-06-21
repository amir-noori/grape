<?php 

	error_reporting(E_PARSE);
	ini_set(error_reporting , 1);
	$dir = dirname(__FILE__);
	if(isset($_POST['logOut']))
	{		
		session_start();
		session_destroy();
		header('Location: ../../index.php?log_out');
	}
	else
	{
	
		require_once($dir . '/../common/Session.class.php');
		require_once($dir . '/../common/UserManager.class.php');
		$session = new Session();
		$user = new User($_POST['email'] , $_POST['password']);
		$userManager = new UserManager($user);
		
		if($userManager->userExists())
		{
			$session->setUserInfo($userManager->getUser());
			header('Location: ../../index.php');
		}
		else
		{
			header('Location: ../../index.php?login_error');
		}
	}
