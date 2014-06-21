<?php 
	ini_set('display_errors',1);
	session_start();
?>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="../public/css/tree.css">
	<link rel="stylesheet" type="text/css" href="../public/css/index.css">
	<link rel="stylesheet" type="text/css" href="../public/css/accordion.css">
</head>


<body>
	aaa<hr>zzzz
	<div id="mainContainer">
		<div id="header">
			<div id="settingMenu">
				<img id="gearImage" src="../public/images/gear.jpg" onClick="openSettingMenu()">
				<div id="settingStuff" class="insideSetting">
					<?php
						if(!isset($_SESSION['email']) || empty($_SESSION['email']))
						{
							echo <<<EOF
							<form id="logIn" action="../src/admin/login.php" method="POST">
								<table>
									<tbody>
										<tr><td>E-Mail: </td><td><input class="insideSetting" type="text" name="emailzs" value="Your E-Mail" ></td></tr>
										<tr><td>Password: </td><td><input class="insideSetting" type="password" name="password"></td></tr>
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
							echo "<form id='logOut' method='post' action='../src/admin/login.php'><input type='hidden' name='logOut' value='1'><a href='#' id='logOutLink' onclick=\"document.getElementById('logOut').submit()\">Log Out</a></form>";
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
				<li><a id="homeLink" href="#" onclick="showSubMenu('Home' , 'homeLink')">Home</a></li>
				<li><a id="dataLink" href="#" onclick="showSubMenu('Data' , 'dataLink')">Data</a></li>
				<li><a id="someLink" href="#" onclick="showSubMenu('Some' , 'someLink')">Some</a></li>
				<li><a id="fooLink" href="#" onclick="showSubMenu('Foo' , 'fooLink')">Foo</a></li>
				<li><a id="aboutLink" href="#" onclick="showSubMenu('About' , 'aboutLink')">About</a></li>
			</ul>
		</div>
		<div id="subMenu">
			<span id="homeLinkMenu">
				<ul>
					<li><a href="#">home</a></li>
					<li><a href="#">home</a></li>
					<li><a href="#">home</a></li>
					<li><a href="#">home</a></li>
					<li><a href="#">home</a></li>
				</ul>
			</span>
			<span id="dataLinkMenu">
				<ul>
					<li><a href="#">data</a></li>
					<li><a href="#">data</a></li>
					<li><a href="#">data</a></li>
					<li><a href="#">data</a></li>
					<li><a href="#">data</a></li>
				</ul>
			</span>
			<span id="someLinkMenu">
				<ul>
					<li><a href="#">some</a></li>
					<li><a href="#">some</a></li>
					<li><a href="#">some</a></li>
					<li><a href="#">some</a></li>
					<li><a href="#">some</a></li>
				</ul>
			</span>
			<span id="fooLinkMenu">
				<ul>
					<li><a href="#">foo</a></li>
					<li><a href="#">foo</a></li>
					<li><a href="#">foo</a></li>
					<li><a href="#">foo</a></li>
					<li><a href="#">foo</a></li>
				</ul>
			</span>
			<span id="aboutLinkMenu">
				<ul>
					<li><a href="#">about</a></li>
					<li><a href="#">about</a></li>
					<li><a href="#">about</a></li>
					<li><a href="#">about</a></li>
					<li><a href="#">about</a></li>
				</ul>
			</span>
		</div>
		<?php
			if(isset($_SESSION['email']) || !empty($_SESSION['email']))
			{
				require_once('../src/admin/sideTabs.php');				
				require_once('../src/admin/fileContent.php');
			}
			
		?>		
	</div>
</body>

<script type="text/javascript" src="../public/js/tree.js"></script>
<script type="text/javascript" src="../public/js/index.js"></script>
<script type="text/javascript" src="../public/js/tabs.js"></script>



<script type="text/javascript">
	
</script>
</html>