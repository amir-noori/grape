<?php

	session_start();
	$dir = $_GET['dir'];
			
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
	
    require_once(dirname(__FILE__) . '/src/showSite/show.php');
	
	
	
	
	
	
	
	
	