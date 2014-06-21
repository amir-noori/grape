<?php

    session_start();

    require_once(dirname(__FILE__) . '/../../../conf/config.php');
    require_once(dirname(__FILE__) . '/../../db/DB.class.php');
    
    function showSites()
    {
    	$query = 'SELECT * FROM `Site` WHERE userID="' . $_SESSION['userId'] . '"';
        $sites = DB::executeQuery($query , true);
        echo '<h3 class="tableHeader">Sites:</h3>';
    	echo '<table id="manageSitesTable" class="genralTable" ><tbody><tr><th>URL</th><th>Title</th><th>Edit</th><th>Theme</th><th>Preview</th></tr>';
    	foreach($sites as $site)
    	{
    	    echo '<tr id="site_'. $site['id'] .'">';
    	    echo '<td class="middleTabGeneral">' . $site['url'] . '</td>';
    		echo '<td class="middleTabGeneral" title="' . $site['title'] . '">' . substr($site['title'] , 0 , 50) . '...</td>';
    		echo '<td class="middleTableEdit" onclick="manageSite(\'' . $site['id'] . '\')">Edit</td>';
    		echo '<td class="middleTableEdit" onclick="showThemes(\'' . $site['id'] . '\')">Change</td>';
    		echo '<td class="middleTableEdit"><a target="_blank" href="' . $GLOBALS['config']['siteURL'] . 'site/' . $site['url'] . '" class="generalText">Preview</a></td>';
    		echo '</tr>';
    	}
    	echo '<tbody></table>';
    }