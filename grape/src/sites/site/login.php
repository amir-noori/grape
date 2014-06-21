<?php

    session_start();
    
    if(strpos($_SERVER['HTTP_REFERER'] , '?') != null)
	    $referer = substr($_SERVER['HTTP_REFERER'] , 0 , strpos($_SERVER['HTTP_REFERER'] , '?'));
	else
        $referer = $_SERVER['HTTP_REFERER'];

    $dir = $referer;    
    $path = array();
	$substr = $dir;
	$slashCount = substr_count($dir , '/');
	for($i = 0 ; $i < $slashCount + 1 ; $i++)
	{
		if($i == $slashCount)
			array_push($path , $dir);
		$substr = substr($dir , 0 , strpos($dir , '/'));
		$dir = substr_replace($dir , '' , 0 , strpos($dir , '/') + 1);
		if($i != $slashCount)
			array_push($path , $substr);
	}    
	    
    require_once(dirname(__FILE__) . '/../../../conf/config.php');
    require_once(dirname(__FILE__) . '/../../db/DB.class.php');
    
    if(isset($_POST['email']))
    {
        $query = 'SELECT u.* FROM `SiteUser` u INNER JOIN Site_SiteUser s_su ON u.id = s_su.siteUserID INNER JOIN `Site` si ON si.`id`= s_su.`siteID` WHERE u.`email`="' . $_POST['email'] . '" AND u.`password`="' . $_POST['password'] . '" AND si.`url`="' . $path[4] . '"';
        $users = DB::executeQuery($query , true);

        if(count($users) == 1)
        {
            if(($users[0]['email'] == $_POST['email']) && ($users[0]['password'] == $_POST['password']))
            {
                $_SESSION[ $path[4] . '_userEmail' ] = $users[0]['email'];
                $_SESSION[ $path[4] . '_userName' ] = $users[0]['userName'];
                $_SESSION[ $path[4]. '_userPassword' ] = $users[0]['password'];
                $_SESSION[ $path[4] . '_userFirstName' ] = $users[0]['firstName'];
                $_SESSION[ $path[4] . '_userLastName' ] = $users[0]['lastName'];
                $_SESSION[ $path[4] . '_userID' ] = $users[0]['id'];
                $_SESSION[ $path[4] . '_isAdmin' ] = $users[0]['isAdmin'];
                        	    
                header('Location: ' . $referer); 
            }
        }
        else
            header('Location: ' . $referer . '?login_failed');
    }
    else if(isset($_POST['logOut']))
    {
        session_destroy();
        header('Location: ' . $GLOBALS['config']['siteURL'] . 'site/' . $_POST['site']);
    }
    
    
