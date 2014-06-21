<?php
    
    session_start();
    
    require_once(dirname(__FILE__) . '/../../../src/showSite/tag.php');
    require_once(dirname(__FILE__) . '/../../../src/db/DB.class.php');
    
    
    $dir = $_SERVER['HTTP_REFERER'];	
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
	
	
	switch($_POST['command'])
	{
	    case('ballonInfo'):
	    {
	        $query = 'SELECT * FROM `SiteUser` WHERE `userName`="' . $_POST['userName']. '"';
            $user = DB::executeQuery($query , true);
            echo '<br /><table style="margin-left:10px;width:auto;"><tbody>';
            echo '<tr><td>Name: </td><td>' . $user[0]['firstName'] . '  ' . $user[0]['lastName'] . '</td></tr>';
            echo '<tr><td>Mail: </td><td>' . $user[0]['email'] . '</td></tr>';
            echo '</tbody></table>';
            
            break;
	    }
	}