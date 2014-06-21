<?php
	error_reporting(E_PARSE);

	class PDOFactory 
	{
		public static function getPDO($strDSN, $strUser, $strPass, $arParms) 
		{
			$strKey = md5(serialize(array($strDSN, $strUser, $strPass, $arParms)));
			if (!($GLOBALS["PDOS"][$strKey] instanceof PDO))
			{
				$GLOBALS["PDOS"][$strKey] = new PDO($strDSN, $strUser, $strPass, $arParms);
			};
			return($GLOBALS["PDOS"][$strKey]);
		}
		
		public static function getPdoObject() 
		{
			require_once(dirname(__FILE__) . '/../../conf/config.php');
			$strDSN = 'mysql:host=localhost;port=' . $GLOBALS['config']['database_port'] . ';dbname=' . $GLOBALS['config']['database_name'] . ';charset=UTF-8';
			$strUser = $GLOBALS['config']['database_username'];
			$strPass = $GLOBALS['config']['database_password'];
			$arParms = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'');
			
			$strKey = md5(serialize(array($strDSN, $strUser, $strPass, $arParms)));
			if (!($GLOBALS["PDOS"][$strKey] instanceof PDO))
			{
				$GLOBALS["PDOS"][$strKey] = new PDO($strDSN, $strUser, $strPass, $arParms);
			};
			return($GLOBALS["PDOS"][$strKey]);
		}
	}

	
	$PDOF = PDOFactory::getPdoObject();
	/*
	try 
	{
		$stmt = $PDOF->prepare('Select * from Category');
		$stmt->execute() or die(print_r($stmt->errorInfo()));
		$result = $stmt->fetchAll(PDO::FETCH_BOTH);
		foreach($result as $r)
		{
			echo $r['title'];
		}
	}
	catch(PDOException $e)
	{
		$e->getMessage();
	}
	*/
	
	
	