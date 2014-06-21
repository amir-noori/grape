<?php

    session_start();

    require_once(dirname(__FILE__) . '/../../../conf/config.php');
    require_once(dirname(__FILE__) . '/../../db/DB.class.php');
    
    if(isset($_POST['siteID']))
    {
        $query = 'UPDATE `Site` SET themeID = "' . $_POST['themeID'] . '" WHERE id="' . $_POST['siteID'] . '"';
        DB::executeQuery($query);
        echo 'Site Theme has changed!';
    }
    else
    {
        $query = 'SELECT * FROM `Theme`';
        $themes = DB::executeQuery($query , true);

        echo '<table><tbody>';
        echo '<tr>';
        foreach($themes as $theme)
        {
            echo '<td><div class="themeDiv" title="' . $theme['title'] . '">';
            echo '<table><tbody>';
            echo '<tr><td><img class="themeImage" onclick="changeTheme(\'' . $_POST['id'] . '\' , \'' . $theme['id'] . '\')" src="' . $GLOBALS['config']['siteURL'] . 'theme/' . $theme['name'] . '/public/images/image.png"></td></tr>';
            echo '<tr><td class="generalText">' . $theme['name'] . '</td></tr>';
            echo '</tbody></table>';
            echo '</div></td>';
        }
        echo '</tr>';
        echo '</tbody></table>';
    }
    
