<?php 
	error_reporting(E_PARSE);
	ini_set(error_reporting , 1);
	define('APP_ROOT' , dirname(__FILE__));
	session_start();
	
	require_once(APP_ROOT . '/conf/config.php');
	if(!$GLOBALS['installed'])
	{
		header('Location: ./install/install.php');
	}	
?>
<html>

<head>
	<link rel="stylesheet" type="text/css" href=<?php echo '"' . $GLOBALS['config']['siteURL'] . 'public/css/tree.css' . '"'; ?>>
	<link rel="stylesheet" type="text/css" href=<?php echo '"' . $GLOBALS['config']['siteURL'] . "public/css/index.css" . '"'; ?>>
	<link rel="stylesheet" type="text/css" href=<?php echo '"' . $GLOBALS['config']['siteURL'] . "public/css/accordion.css" . '"';?>>
	<link rel="stylesheet" type="text/css" href=<?php echo '"' . $GLOBALS['config']['siteURL'] . "public/css/cat.css" . '"'; ?>>
	<link rel="stylesheet" type="text/css" href=<?php echo '"' . $GLOBALS['config']['siteURL'] . "public/css/users.css" . '"'; ?>>
	<link rel="stylesheet" type="text/css" href=<?php echo '"' . $GLOBALS['config']['siteURL'] . "public/css/sites/sites.css" . '"'; ?>>	
</head>


<body>

	<div id="mainContainer">
		<div id="header">

			<div id="settingMenu">
				<img id="gearImage" src=<?php echo '"' . $GLOBALS['config']['siteURL'] . 'public/images/gear.jpg"' ;?> onClick="openSettingMenu()">
				<div id="settingStuff" class="insideSetting">					
					<?php
						if(!isset($_SESSION['email']) || empty($_SESSION['email']))
						{
							echo <<<EOF
							<form id="logIn" action="./src/admin/login.php" method="POST">
								<table>
									<tbody>
										<tr><td>E-Mail: </td><td><input class="insideSetting" type="text" name="email" value="Your E-Mail" onfocus="javascript:if(this.value==this.defaultValue){this.value='';}" onblur="javascript:if(this.value==''){this.value=this.defaultValue;}"></td></tr>
										<tr><td>Password: </td><td><input class="insideSetting" type="text" name="password" value="Your Password" onfocus="javascript:if(this.value==this.defaultValue){this.value='';}" onblur="javascript:if(this.value==''){this.value=this.defaultValue;}"></td></tr>
										<tr><td><input type="submit" class="insideSetting" value="Log In"></td></tr>
									</tbody>
								</table>
							</form>
							<a id="registerLink" class="settingLink" href="#" onclick="showRegister()">Register Here!</a><br>
							<a id="forgotLink" class="settingLink" href="#" onclick="forgot()">Forgot your password?</a>
EOF;
						}
						else
						{
							echo "<form id='logOut' method='post' action='./src/admin/login.php'><input type='hidden' name='logOut' value='1'><a href='#' id='logOutLink' onclick=\"document.getElementById('logOut').submit()\">Log Out</a></form>";
						}	
					
					?>
				</div>
				<?php
					if(!isset($_SESSION['email']) || empty($_SESSION['email']))
					{
						echo <<<EOF
						<div id="registerDiv">
							<form>
								<table>
									<tbody>
										<tr><td>First Name: </td><td><input class="insideSetting" type="text"></td></tr>
										<tr><td>Last Name: </td><td><input class="insideSetting" type="text"></td></tr>
										<tr><td>E-Mail: </td><td><input class="insideSetting" type="text"></td></tr>
										<tr><td><input type="submit" class="insideSetting" value="Sign Up"></td></tr>
									</tbody>
								</table>
							</form>
						</div>
EOF;
					}
				?>					
			</div>
		</div>
		<div id="topMenu">
			<ul style="">
				<li><a id="sitesLink" href="#" onclick="showSubMenu('sitesLink')">Sites</a></li>
				<li><a id="manageCategoriesLink" href="#" onclick="showSubMenu('manageCategoriesLink')">CMS</a></li>
				<li><a id="aboutLink" href="#" onclick="showSubMenu('aboutLink')">About</a></li>
			</ul>
		</div>
		<div id="subMenu">
			<span id="sitesLinkMenu">
				<ul>
					<li><a href="#" onclick="loadSubMenuStuff('manageSites')">Sites Management</a></li>
					<li><a href="#" onclick="loadSubMenuStuff('newSite')">New Site</a></li>
				</ul>
			</span>
			<span id="manageCategoriesLinkMenu">
				<ul>
					<li><a href="#" onclick="changeSite('')">Change Site</a></li>
					<li><a href="#" onclick="showAllCats()">Show Categories</a></li>
					<li><a href="#" onclick="usersPanel(); showUsersSideTab();">Users</a></li>
					<li><a href="#" onclick="filePanel()">Files</a></li>
					<li><a href="#" onclick="loadSubMenuStuff('siteModules')">Modules</a></li>
				</ul>
			</span>
			<span id="aboutLinkMenu">
				<ul>
					<li><a href="#">About Us</a></li>
					<li><a href="#">Contact</a></li>
				</ul>
			</span>
		</div>
		
		<?php
			if(isset($_SESSION['email']) || !empty($_SESSION['email']))
			{
				echo '<div id="sideTabContainer">';
				require_once('./src/admin/sideTabs.php');
				echo '</div>';
				require_once('./src/admin/file/fileContent.php');				
			}			
		?>
		<div id="middle">
			<?php
				if(isset($_SESSION['email']) || !empty($_SESSION['email']))
				{
					//require_once('./src/admin/file/fileContent.php');				
				}			
			?>
		</div>	
	
		<div id="footer">
		</div>
	</div>
</body>

<script type="text/javascript" src=<?php echo '"' . $GLOBALS['config']['siteURL'] . "public/js/test.js" .'"'; ?>></script>
<script type="text/javascript" src=<?php echo '"' . $GLOBALS['config']['siteURL'] . "public/js/tree.js" .'"'; ?>></script>
<script type="text/javascript" src=<?php echo '"' . $GLOBALS['config']['siteURL'] . "public/js/index.js" .'"'; ?>></script>
<script type="text/javascript" src=<?php echo '"' . $GLOBALS['config']['siteURL'] . "public/js/tabs.js" .'"'; ?>></script>
<script type="text/javascript" src=<?php echo '"' . $GLOBALS['config']['siteURL'] . "public/js/cat.js" .'"'; ?>></script>
<script type="text/javascript" src=<?php echo '"' . $GLOBALS['config']['siteURL'] . "public/js/users.js" .'"'; ?>></script>
<script type="text/javascript" src=<?php echo '"' . $GLOBALS['config']['siteURL'] . "public/js/cms/site.js" .'"'; ?>></script>

<script type="text/javascript">
	
</script>
</html>