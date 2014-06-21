/* Defining global variables*/

siteURL = 'http://grape.com:8888';
var xmlhttpObserver;
if(window.XMLHttpRequest)
{
	xmlhttpObserver = new XMLHttpRequest();
}
else
{
	xmlhttpObserver = new ActiveXObject("Microsoft.XMLHTTP");
}

var selectedFile = '';
var selectedMenu = '';
var selectedSubMenu = '';
var insideSettingClicked = false;
var target;

/* Global variables definition ends*/

function showSubMenu(id)
{
	if(selectedMenu == id)
	{
		document.getElementById(selectedMenu).style.backgroundColor = '';
		document.getElementById(selectedSubMenu).style.display = 'none';
		document.getElementById('subMenu').style.display = 'none';
		selectedMenu = '';
	}
	else
	{	
		if(selectedMenu != '')
			document.getElementById(selectedMenu).style.backgroundColor = '';
		selectedMenu = id;
		document.getElementById(id).style.backgroundColor = '#704E5E';

		if(selectedSubMenu != '')
			document.getElementById(selectedSubMenu).style.display = 'none';
		selectedSubMenu = id + 'Menu';


		var menu = document.getElementById('subMenu');
		var subMenu = document.getElementById(selectedSubMenu);
		if(menu.style.display == 'block')
		{
			subMenu.style.display = 'block';
			menu.style.display = 'block';
			for(var i = 0.01 ; i < 1 ; i += 0.01)
			{									
				setTimeout("fadeIn("+i+")" , i*1000);
			}
		}
		else
		{
			subMenu.style.display = 'block';
			menu.style.display = 'block';
			for(var i = 0.01 ; i < 1 ; i += 0.01)
			{									
				setTimeout("fadeIn("+i+",'subMenu' , '')" , i*1000);
			}	
		}
	}
}

function loadSubMenuStuff(menu)
{
	var docHeadObj = document.getElementsByTagName("head")[0];
	var dynamicScript = document.createElement("script");
	dynamicScript.type = "text/javascript";
	switch(menu)
	{
		case('newSite'):
		{
			dynamicScript.src = siteURL + '/public/js/sites/createNew.js';
			docHeadObj.appendChild(dynamicScript);
			var middle = document.getElementById('middle');
			xmlhttpObserver.onreadystatechange = function()
			{
				 if (xmlhttpObserver.readyState == 4)
				 {
				     if(xmlhttpObserver.status == 200) 
				     {
						middle.innerHTML = xmlhttpObserver.response;
				     }
				     else 
				     {
				        alert("Error during AJAX call. Please try again.loadSubMenuStuff()");
				     }
				 }
			};
			xmlhttpObserver.open("POST" , siteURL + "/src/msc/loadSubMenuStuff.php" , true);

			xmlhttpObserver.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			xmlhttpObserver.send('menu=' + menu);
			setTimeout(function()
			{
				loadCreateNewSiteSideTab();
			} , 2000);
			break;
		}
		case('manageSites'):
		{
			dynamicScript.src = siteURL + '/public/js/sites/manageSites.js';
			docHeadObj.appendChild(dynamicScript);
			var middle = document.getElementById('middle');
			xmlhttpObserver.onreadystatechange = function()
			{
				 if (xmlhttpObserver.readyState == 4)
				 {
				     if(xmlhttpObserver.status == 200) 
				     {
						middle.innerHTML = xmlhttpObserver.response;
				     }
				     else 
				     {
				        alert("Error during AJAX call. Please try again.loadSubMenuStuff()");
				     }
				 }
			};
			xmlhttpObserver.open("POST" , siteURL + "/src/msc/loadSubMenuStuff.php" , true);

			xmlhttpObserver.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			xmlhttpObserver.send('menu=' + menu);
			setTimeout(function()
			{
				loadCreateNewSiteSideTab();
			} , 2000);
			break;
		}
		case('siteModules'):
		{
			dynamicScript.src = siteURL + '/public/js/module/module.js';
			docHeadObj.appendChild(dynamicScript);
			var middle = document.getElementById('middle');
			xmlhttpObserver.onreadystatechange = function()
			{
				 if (xmlhttpObserver.readyState == 4)
				 {
				     if(xmlhttpObserver.status == 200) 
				     {
						middle.innerHTML = xmlhttpObserver.response;
				     }
				     else 
				     {
				        alert("Error during AJAX call. Please try again.loadSubMenuStuff()");
				     }
				 }
			};
			xmlhttpObserver.open("POST" , siteURL + "/src/msc/loadSubMenuStuff.php" , true);

			xmlhttpObserver.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			xmlhttpObserver.send('menu=' + menu);
			setTimeout(function()
			{
				loadCreateNewSiteSideTab();
			} , 2000);
			break;
		}
	}
	

	
}

function fadeIn(x , id , className)
{
	if(className == '')
	{
		var element = document.getElementById(id);
		element.style.opacity = x;
	}
	else
	{
		var elements = document.getElementsByClassName(className);
		for(var i = 0 ; i < elements.length ; i++)
			(elements[i]).style.opacity = x;	
	}

}

function fadeOut(x)
{
	var menuz = document.getElementById('subMenu');
	menuz.style.opacity -= x;
}

function openSettingMenu()
{
	
	var div = document.getElementById('settingMenu');
	var settingStuff = document.getElementById('settingStuff');
	var registerDiv = document.getElementById('registerDiv');

	div.style.height = '300px';
	div.style.width = '320px';
	settingStuff.style.display = 'block';
	registerDiv.style.display = 'none';
}

function showRegister()
{
	insideSettingClicked = true;
	var registerDiv = document.getElementById('registerDiv');
	var settingStuff = document.getElementById('settingStuff');
	
	registerDiv.style.display = 'block';
	settingStuff.style.display = 'none';
}


function initialization()
{
	document.onclick = function(e)
	{
		target = (e && e.target) || (event && event.srcElement);
		
		/*decide to open or close setting menu */
		var div = document.getElementById('settingMenu');
		var gearDiv = document.getElementById('gearImage');
		var settingStuff = document.getElementById('settingStuff');
		var registerDiv = document.getElementById('registerDiv');

		if(target != div && target != gearDiv && !insideSettingClicked)
		{
			div.style.height = '40px';
			div.style.width = '50px';
			settingStuff.style.display = 'none';
			registerDiv.style.display = 'none';
		}

		insideSettingClicked = false;
		/**/
		
		var searchUserInput = document.getElementById('searchUserInput');
		if(target == searchUserInput)
		{
			searchUserInput.value = 'z';
		}
		
	}
	
	var insideSetting = document.getElementsByClassName('insideSetting');
	for(var i = 0 ; i < insideSetting.length ; i++)
	{
		(insideSetting[i]).onclick = function()
		{
			insideSettingClicked = true;
		}
	}
	
	loadSubMenuStuff('newSite');
}
	
document.onload = initialization();




