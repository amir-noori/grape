<?php session_start(); ?>

<html>
<head>

</head>
	<link rel="stylesheet" type="text/css" href="../public/css/index.css">
	<style>
		.text{
			color:silver;
			font-family: Monaco,Courier New;
			font-size:20px;
		}
		
		#infoArea{
			margin-top:200px;
			margin-left:400px;
			position:absolute;
		}
		
		h1{
			position:absolute;
			margin-left:500px;
			font-family:mpact, Charcoal, sans-serif;
			color:#21CC57;
		}
		
		.backImage{
			width:40px;
			height:30px;
			float:right;
		}
		
	</style>
<body onload="init()">

	<div id="mainContainer" style="margin:auto;min-height:1000px">
	<div id="header">
	</div>
	<h1>Welcome To Grape</h1>
	<div id="infoArea">
		
		<?php
			switch($_POST['goToLevel'])
			{
				case('dbName'):
				{
					setInstallInfo($_POST['goToLevel']);
					getDbName();
					break;
				}
				case('createAccount'):
				{
					setInstallInfo($_POST['goToLevel']);
					getAccountInfo();
					break;
				}
				case('confirm'):
				{
					setInstallInfo($_POST['goToLevel']);
					confirmInfo();
					break;
				}
				case('install'):
				{
					install();
					break;
				}
				default:
				{
					switch($_POST['back'])
					{
						case('dbName'):
						{
							getDbName();
							break;
						}
						case('createAccount'):
						{
							getAccountInfo();
							break;
						}
						default:
						{
							getDomainInfo();
							break;
						}
					}
				}
			}
		?>
		
	</div>	
	</div>
	
</body>

<script type="text/javascript">

	function init()
	{
		var passFields = document.getElementsByClassName('password');
		for(var i = 0 ; i < passFields.length ; i++)
		{
			(passFields[i]).value = '';
		}		
	}
</script>

</html>


<?php

function getDomainInfo()
{
		echo '<form method="POST" action="install.php">';
		echo '<table>';
		echo '<tbody>';
		echo '<tr><td class="text">Your Domain Name: </td><td><input type="text" class="generalInput" size="35" name="domainName" value="' . $_SESSION['domainName'] . '"></td></tr>';
		echo '<tr><td><input type="submit" class="generalInput" value="next"></td></tr>';
		echo '<tr><td><input type="hidden" value="dbName" name="goToLevel"></td></tr>';
		echo '</tbody>';
		echo '</table>';
		echo '</form>';
}
	
function getDbName()
{
		echo '<form method="POST" action="install.php">';
		echo '<input type="hidden" value="" name="back">';
		echo '<input class="backImage" type="image" title="go back" src="http://localhost:8888/angoor/public/images/back.jpg">';
		echo '</form>';
		echo '<br>';
		
		echo '<form method="POST" action="install.php">';
		echo '<table>';
		echo '<tbody>';
		echo '<tr><td class="text">Your DabaBase Name: </td><td><input type="text" class="generalInput" size="20" name="dataBaseName" value="' . $_SESSION['dataBaseName'] . '"></td></tr>';
		echo '<tr><td class="text">Your DabaBase Port: </td><td><input type="text" class="generalInput" size="20" name="dataBasePort" value="' . $_SESSION['dataBasePort'] . '"></td></tr>';
		echo '<tr><td class="text">DabaBase User Name: </td><td><input type="text" class="generalInput" size="20" name="dataBaseUser" value="' . $_SESSION['dataBaseUser'] . '"></td></tr>';
		echo '<tr><td class="text">DabaBase Passwrod: </td><td><input type="password" class="generalInput , password" size="20" name="dataBasePass" value=""></td></tr>';
		echo '<tr><td><input type="submit" class="generalInput" value="next"></td></tr>';
		echo '<tr><td><input type="hidden" value="createAccount" name="goToLevel"></td></tr>';
		echo '</tbody>';
		echo '</table>';
		echo '</form>';
}

function getAccountInfo()
{
	echo '<form method="POST" action="install.php">';
	echo '<input type="hidden" value="dbName" name="back">';
	echo '<input class="backImage" type="image" title="go back" src="http://localhost:8888/angoor/public/images/back.jpg">';
	echo '</form>';
	echo '<br>';

	echo '<form method="POST" action="install.php">';
	echo '<table>';
	echo '<tbody>';
	echo '<tr><td class="text">User Name: </td><td><input type="text" class="generalInput" size="20" name="AdminUserName" value="' . $_SESSION['AdminUserName'] . '"></td></tr>';
	echo '<tr><td class="text">First Name: </td><td><input type="text" class="generalInput" size="20" name="AdminFirstName" value="' . $_SESSION['AdminFirstName'] . '"></td></tr>';
	echo '<tr><td class="text">Last Name: </td><td><input type="text" class="generalInput" size="20" name="AdminLastName" value="' . $_SESSION['AdminLastName'] . '"></td></tr>';
	echo '<tr><td class="text">E-Mail: </td><td><input type="text" class="generalInput" size="20" name="AdminMail" value="' . $_SESSION['AdminMail'] . '"></td></tr>';
	echo '<tr><td class="text">Password: </td><td><input type="password" class="generalInput , password" size="20" name="password" value=""></td></tr>';
	echo '<tr><td class="text">Confirm Passwrod: </td><td><input type="password" class="generalInput , password" size="20" name="confirmPassword" value=""></td></tr>';
	echo '<tr><td><input type="submit" class="generalInput" value="next"></td></tr>';
	echo '<tr><td><input type="hidden" value="confirm" name="goToLevel"></td></tr>';
	echo '</tbody>';
	echo '</table>';
	echo '</form>';
}

function confirmInfo()
{
	echo '<form method="POST" action="install.php">';
	echo '<input type="hidden" value="createAccount" name="back">';
	echo '<input class="backImage" type="image" title="go back" src="http://localhost:8888/angoor/public/images/back.jpg">';
	echo '</form>';
	echo '<br><br>';
	
	echo '<h3 class="text">Domain Information:</h3>';
	echo '<table style="border:solid;border-color:#5A2699"><tbody>';
	echo '<tr><td class="text">Domain Name:</td><td class="text">' . $_SESSION['domainName'] . '</td></tr>';
	echo '</tbody></table><br>';
	
	echo '<h3 class="text">DataBase Information:</h3>';
	echo '<table style="border:solid;border-color:#5A2699"><tbody>';
	echo '<tr><td class="text">DataBase Name:</td><td class="text">' . $_SESSION['dataBaseName'] . '</td></tr>';
	echo '<tr><td class="text">DataBase Port:</td><td class="text">' . $_SESSION['dataBasePort'] . '</td></tr>';
	echo '<tr><td class="text">User Name:</td><td class="text">' . $_SESSION['dataBaseUser'] . '</td></tr>';
	echo '</tbody></table><br>';
	
	echo '<h3 class="text">New Admin Information:</h3>';
	echo '<table style="border:solid;border-color:#5A2699"><tbody>';
	echo '<tr><td class="text">User Name:</td><td class="text">' . $_SESSION['AdminUserName'] . '</td></tr>';
	echo '<tr><td class="text">First Name:</td><td class="text">' . $_SESSION['AdminFirstName'] . '</td></tr>';
	echo '<tr><td class="text">Last Name:</td><td class="text">' . $_SESSION['AdminLastName'] . '</td></tr>';
	echo '<tr><td class="text">Email:</td><td class="text">' . $_SESSION['AdminMail'] . '</td></tr>';
	echo '</tbody></table>';
	
	echo '<br><form method="POST" action="install.php">';
	echo '<input type="hidden" name="goToLevel" value="install">';
	echo '<input type="submit" class="generalInput" value="Confirm And Install"></form>';
}

function install()
{
	$config  = "\n	\$GLOBALS['config'] = array();";
	$config .= "\n	\$GLOBALS['config']['database_username'] = '" . $_SESSION['dataBaseUser'] . "';";
	$config .= "\n	\$GLOBALS['config']['database_password'] = '" . $_SESSION['dataBasePass'] . "';";
	$config .= "\n	\$GLOBALS['config']['database_name'] = '" . $_SESSION['dataBaseName'] . "';";
	$config .= "\n	\$GLOBALS['config']['database_port'] = '" . $_SESSION['dataBasePort'] . "';";
	$config .= "\n	\$GLOBALS['installed'] = true;";
	file_put_contents(dirname(__FILE__) . '/../conf/config-test.php', $config , FILE_APPEND);
	
	$sqlPrepend = "DROP DATABASE IF EXISTS `" . $_SESSION['dataBaseName'] . "`;\n";
	$sqlPrepend .= "CREATE DATABASE `" . $_SESSION['dataBaseName'] . "`;\n";
	$sqlPrepend .= "USE `" . $_SESSION['dataBaseName'] . "`;\n";
	
	$sqlAppend = "\nINSERT INTO `User` (firstName , lastName , email , password , userName , permissionsID , created) VALUES(";
	$sqlAppend .= "\"" . $_SESSION['AdminFirstName'] . "\",";
	$sqlAppend .= "\"" . $_SESSION['AdminLastName'] . "\",";
	$sqlAppend .= "\"" . $_SESSION['AdminMail'] . "\",";
	$sqlAppend .= "\"" . $_SESSION['password'] . "\",";
	$sqlAppend .= "\"" . $_SESSION['AdminUserName'] . "\",";
	$sqlAppend .= "1,";
	$sqlAppend .= "\"" . date('Y-m-d H:i:s') . "\",";
	$sqlAppend .= ");\n";
	
	$sql = file_get_contents(dirname(__FILE__) . '/import-test.sql');
	file_put_contents(dirname(__FILE__) . '/import-test.sql', $sqlPrepend . $sql . $sqlAppend);
	
	echo 'Congratulations! You have installed Grape successfully!';
		
}

function setInstallInfo($goToLevel)
{
	
	switch($goToLevel)
	{
		case('dbName'):
			$_SESSION['domainName'] = $_POST['domainName'];
			break;
		case('createAccount'):
			$_SESSION['dataBaseName'] = $_POST['dataBaseName'];
			$_SESSION['dataBasePort'] = $_POST['dataBasePort'];
			$_SESSION['dataBaseUser'] = $_POST['dataBaseUser'];
			$_SESSION['dataBasePass'] = $_POST['dataBasePass'];
			break;
		case('confirm'):
			$_SESSION['AdminUserName'] = $_POST['AdminUserName'];
			$_SESSION['AdminFirstName'] = $_POST['AdminFirstName'];
			$_SESSION['AdminLastName'] = $_POST['AdminLastName'];
			$_SESSION['AdminMail'] = $_POST['AdminMail'];
			$_SESSION['password'] = $_POST['password'];
			$_SESSION['confirmPassword'] = $_POST['confirmPassword'];
			break;
		case('install'):
			break;
	}
}


?>



