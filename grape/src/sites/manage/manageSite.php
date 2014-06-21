<?php

    session_start();

    require_once(dirname(__FILE__) . '/../../../conf/config.php');
    require_once(dirname(__FILE__) . '/../../db/DB.class.php');
        
	$query = 'SELECT * FROM `Site` WHERE id="' . $_POST['id'] . '"';
    $site = DB::executeQuery($query , true);

    echo '<table><tbody>';  
    echo '<tr><td class="generalText">URL:<span style="font-size:15px;color:silver;"> &nbsp;(' . $GLOBALS['config']['siteURL'] . 'site/) + &nbsp;</span></td><td><input class="generalInput" type="text" value="' . $site[0]['url'] .'"></td>';
    echo '<td><input type="button" class="generalInput" value="Save"></td>';
    echo '<td class="error" id="site_' . $site[0]['id'] . '"></td></tr>';
    echo '</table></tbody>';
    echo '<br><br>';
    echo '<table><tbody>';
    echo '<tr><td class="generalText">Title: </td><td><input class="generalInput" type="text" value="' . $site[0]['title'] .'"></td>';
    echo '<td><input type="button" class="generalInput" value="Save"></td></tr>'; 
    echo '</table></tbody>';
    echo '<br><br>';
    echo '<table><tbody>'; 
    echo '<tr><td class="generalText">Summary: </td><td><textarea class="generalInput" style="resize:none;" cols="40" rows="10">' . $site[0]['summary'] .'</textarea></td>';
    echo '</tr><tr><td></td><td><input type="button" class="generalInput" value="Save"></td></tr>';  
    echo '</table></tbody>';
    