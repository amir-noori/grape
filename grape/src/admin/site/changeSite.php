<?php
	session_start();
	require_once(dirname(__FILE__) . '/../../db/DB.class.php');
	
	function saveSite($siteID , $default)
	{
		
	}
	
	function showSites()
	{
		if(!isset($_SESSION['siteID']))
		{
			$result = DB::executeQuery('SELECT id FROM Site Where userID="' . $_SESSION['userId'] . '" AND `default`="1"' , true);
			$_SESSION['siteID'] = $result[0]['id'];
		}
		
		$sites = DB::getRows('Site' , array('userID' => $_SESSION['userId'] ));
		
		echo '<table id="changeSiteTable" class="genralTable"><tbody><tr><th>Title</th><th>URL</th><th>Date</th><th>Choose</th><th>Default</th><th>Save</th></tr>';
		foreach($sites as $site)
		{
			echo '<tr id="changeSite_' . $site['id'] . '">';
			echo '<td title="' . $site['summary'] . '">' . $site['title'] . '</td>';
			echo '<td>' . $site['url'] . '</td>';
			echo '<td>' . $site['created'] . '</td>';
			if($site['id'] == 1)
				echo '<td title="choose this site to manage"><input class="chooseRadio" type="radio" name="siteID" checked="tre" value="' . $_SESSION['siteID'] . '"></td>';
			else
				echo '<td title="choose this site to manage"><input class="chooseRadio"  type="radio"  name="siteID" value="' . $site['id'] . '"></td>';
			
			if($site['default'] == 1)
			{
				echo '<td title="set as default"><input class="chooseRadio" type="radio" checked="true" name="default"></td>';
			}
			else
			{
				echo '<td title="set as default"><input class="chooseRadio" type="radio" name="default"></td>';
			}
			echo '<td><input class="generalInput" type="button" onclcick="changeSite(\'' . $site['id'] . '\')" value="Save"></td>';
			echo '</tr>';
		}
		echo '</tbody></table>';
	}
	
	switch($_POST['command'])
	{
		case('save'):
			saveSite($_POST['siteID'] , $_POST['defualt']);
		default:
			showSites();
	}