
<div id="leftSide"> 

    <div id="loginArea" >
        <?php
            if(isset($_SESSION[$path[2] . '_userEmail']))
            {
                echo '<a class="headerText , settingLink" href="#" onclick="">' . $_SESSION[ $path[2] . '_userFirstName' ] . ' ' . $_SESSION[ $path[2] . '_userLastName'] . '</a>';
        		echo '<span class="headerText">|</span>';
        		echo '<form style="display:inline;" id="logOutForm" action="' . $GLOBALS['config']['siteURL'] . 'src/sites/site/login.php" method="POST">';
                echo '<a class="headerText , settingLink" href="#" onclick="logOut()">Log Out</a>';
                echo '<input name="site" type="hidden" value="' . $path[2] . '" />';
                echo '<input name="logOut" type="hidden" value="logOut" />';
                echo '</form>';
            }
            else
            {
                echo '<div id="loginDiv">';
            	echo '<form action="' . $GLOBALS['config']['siteURL'] . 'src/sites/site/login.php" method="POST">';
            	echo '<table style="margin:auto;margin-top:10%;">';
            	echo '<tbody>';
            	echo '<tr><td class="generalText">E-Mail:</td><td><input name="email" class="generalInput" type="text" /></td></tr>';
            	echo '<tr><td class="generalText">Password:</td><td><input name="password" class="generalInput" type="password" value="" /></td></tr>';
            	echo '<tr><td><input name="site" type="hidden" value="' . $path[2] . '" /></td></tr>';
            	echo '<tr><td><input type="submit" class="generalInput" value="Log In" /></td></tr>';
            	echo '<tr><td></td></tr><tr><td></td></tr>';
            	echo '<tr><td><a class="headerText" href="#" onclick="showRegister()">Register Here</a></td></tr>';
            	echo '</tbody>';
                echo '</table>';
            	echo '</form>';
            	echo '</div>';
            }
        
        ?>
        
        
    </div>    
	
	
	<?php require_once(dirname(__FILE__) . '/mainMenu.tpl'); ?>

	    
</div>