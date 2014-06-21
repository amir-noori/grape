<html>

<head>
	<link rel="stylesheet" type="text/css" href="./tree.css">
</head>


<body>
	
	<div id="mainContainer">
		<div id="header">
			<div id="settingMenu" onclick="openSettingMenu()">
			
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

		<div id="treeParent">
		
		</div>
		<div id="fileContent">
			<textarea id="fileContentArea" rows="30" cols="108">
			</textarea>
			<br>
			<a href="#" id="saveContent" onclick="saveContent()">Save</a>
		</div>
	</div>
	
</body>

<script type="text/javascript" src="./tree.js"></script>
<script type="text/javascript">
	
</script>
</html>