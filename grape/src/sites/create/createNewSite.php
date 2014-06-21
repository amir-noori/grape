<?php
session_start();

require_once(dirname(__FILE__) . '/../../../conf/config.php');

function createNewSitePanel()
{
	echo '<br><br><br>';
	echo '<div id="">';
	echo '<table>';
	echo '<tbody>';
	echo '<tr><td class="createNewSiteColumn">Site URL:</td><td><span style="font-size:18px;color:silver;"> &nbsp;(' . $GLOBALS['config']['siteURL'] . 'site/) + &nbsp;</span><input type="text" class="generalInput" size="20"></td><td class="createNewUserErrMessage"></td></tr>';
	echo '<tr><td class="createNewSiteColumn">Title:</td><td><input type="text" class="generalInput" size="20"></td></tr>';
	echo '<tr><td class="createNewSiteColumn">Summary:</td><td><textarea class="generalInput" cols="30" rows="10" > </textarea></td></tr>';
	echo '<tr><td class="createNewSiteColumn">Defult:</td><td><input type="checkbox" class="generalInput"></td></tr>';
	echo '<tr><td></td></tr>';
	echo '<tr><td><input type="button" class="generalInput" value="Create"></td></tr>';
	echo '<tbody>';
	echo '</table>';
	echo '</div>';
}


