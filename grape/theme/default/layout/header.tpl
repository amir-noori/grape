
<div id="header"> 

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
                echo '<a id="loginLink" class="headerText" href="#" onclick="showLoginDiv()">Log In</a>';
                echo '<span class="headerText">|</span>';
                echo '<a class="headerText" href="#" onclick="showRegister()">Register</a>';
            }
        
        ?>
        
        <div id="loginDiv">
    		<div id="loginUpArrow" class="arrow-up"></div>
    		<form action="<?php echo $GLOBALS['config']['siteURL'] . 'src/sites/site/login.php'; ?>" method="POST">
    			<table style="margin:auto;margin-top:10%;">
    				<tbody>
    					<tr><td class="generalText">E-Mail:</td><td><input name="email" class="generalInput" type="text" /></td></tr>		
    					<tr><td class="generalText">Password:</td><td><input name="password" class="generalInput" type="password" value="" /></td></tr>
    					<tr><td><input name="site" type="hidden" value='<?php echo $path[2]; ?>' /></td></tr>
    					<tr><td><input type="submit" class="generalInput" value="Log In" /></td></tr>
    				</tbody>
    			</table>
    		</form>
    	</div>
    </div>    
	
</div>