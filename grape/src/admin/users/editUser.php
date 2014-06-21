<?php
	session_start();
	require_once(dirname(__FILE__) . '/../../db/DB.class.php');

function editUser($userID)
{
	
}

function deleteUser($userID)
{
	DB::executeQuery('DELETE FROM `User` WHERE id="' . $userID . '"');
	echo 'ok';
}



switch($_POST['command'])
{
	case('edit'):
	{
		editUser($_POST['userID']);
		break;
	}
	case('delete'):
	{
		deleteUser($_POST['userID']);
		break;
	}
}