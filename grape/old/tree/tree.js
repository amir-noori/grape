/* Defining global variables*/

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
var data = {};

/* Global variables definition ends*/


function log(data)
{
	console.log(data);
}

function showFiles(dir)
{
	var div = document.getElementById('treeParent');
	
	xmlhttpObserver.onreadystatechange = function()
	{
		 if (xmlhttpObserver.readyState == 4)
		 {
		     if(xmlhttpObserver.status == 200) 
		     {
		    	 if((xmlhttpObserver.response).length > 4)
		    	 {
		    		div.innerHTML = xmlhttpObserver.response;
		    	 }
		     }
		     else 
		     {
		        //alert("Error during AJAX call. Please try again #002");
		     }
		 }
	};
	xmlhttpObserver.open("POST" , "http://localhost:8888/angoor/tree/files.php" , true);

	xmlhttpObserver.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttpObserver.send('dir=' + dir + '&' + 'parent=1');
}

function showSubDirectoryFiles(dir , id)
{
	if(data[id] == true)
	{
		document.getElementById(id + '_child').style.display = 'none';
		var parent = document.getElementById(id);
		parent.style.backgroundColor = '';
		var x = parent.getElementsByClassName('dirImage');
		(x[0]).setAttribute('src' , 'http://localhost:8888/angoor/tree/resource/dir_close.jpg');
		data[id] = false;
	}
	else
	{	
			
	xmlhttpObserver.onreadystatechange = function()
	{
		 if (xmlhttpObserver.readyState == 4)
		 {
		     if(xmlhttpObserver.status == 200) 
		     {
		    	 if((xmlhttpObserver.response).length > 4)
		    	 {
				    var parent = document.getElementById(id);
				    var child = document.createElement("div");
					parent.style.backgroundColor = '#94A0FF';
					var x = parent.getElementsByClassName('dirImage');
					(x[0]).setAttribute('src' , 'http://localhost:8888/angoor/tree/resource/dir_open.jpg');
					child.setAttribute('class' , 'childContainer');
					child.setAttribute('id' , id + '_child');
				    child.innerHTML = xmlhttpObserver.response;
				  	if (parent.nextSibling) 
					{
				    	parent.parentNode.insertBefore(child, parent.nextSibling);
				  	}
				  	else 
					{
				    	parent.parentNode.appendChild(child);
				  	}
					data[id] = true;
		    	 }
		     }
		     else 
		     {
		        alert("Error during AJAX call. Please try again #002");
		     }
		 }
	};
	xmlhttpObserver.open("POST" , "http://localhost:8888/angoor/tree/files.php" , true);

	xmlhttpObserver.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttpObserver.send('dir=' + dir + '&' + 'child=1');
	}	
}

function showContent(fileName , id)
{
	selectedFile = fileName;
	
	var div = document.getElementById('fileContentArea');
	
	xmlhttpObserver.onreadystatechange = function()
	{
		 if (xmlhttpObserver.readyState == 4)
		 {
		     if(xmlhttpObserver.status == 200) 
		     {
				div.innerHTML = '';
			  	var newtext = document.createTextNode(xmlhttpObserver.response);
				div.appendChild(newtext , div);
		     }
		     else 
		     {
		        alert("Error during AJAX call. Please try again #002");
		     }
		 }
	};
	xmlhttpObserver.open("POST" , "http://localhost:8888/angoor/tree/files.php" , true);

	xmlhttpObserver.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttpObserver.send('fileName=' + fileName + '&showContent=1');
}

function saveContent()
{
	button = document.getElementById('saveContent');
	content = document.getElementById('fileContentArea').value;	
	
	xmlhttpObserver.onreadystatechange = function()
	{
		 if (xmlhttpObserver.readyState == 4)
		 {
		     if(xmlhttpObserver.status == 200) 
		     {
			  	if(xmlhttpObserver.response == 'ok')
					alert('Changes has been saved!');
				else
					alert('An error has accured! ' + xmlhttpObserver.response + ' Please try again.');
		     }
		     else 
		     {
		        alert("Error during AJAX call. Please try again #002");
		     }
		 }
	};
	xmlhttpObserver.open("POST" , "http://localhost:8888/angoor/tree/files.php" , true);

	xmlhttpObserver.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttpObserver.send('saveFile=1' + '&' + 'fileName=' + selectedFile + '&' + 'content=' + content);
}


function showSubMenu(data , id)
{
	if(selectedMenu == id)
	{
		document.getElementById(selectedMenu).style.backgroundColor = '';
		document.getElementById(selectedSubMenu).style.display = 'none';
		document.getElementById('subMenu').style.display = 'none';
		selectedMenu = '';
	}
	else{
	
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
			setTimeout("fadeIn("+i+")" , i*1000);
		}	
	}
}
}

function fadeIn(x)
{
	var menu = document.getElementById('subMenu');
	menu.style.opacity = x;
}

function fadeOut(x)
{
	var menuz = document.getElementById('subMenu');
	menuz.style.opacity -= x;
}

function openSettingMenu()
{
	var div = document.getElementById('settingMenu');
	var _style = getComputedStyle(div);
    var _width = _style.getPropertyValue('width');
	if( _width != '50px')
	{
		div.style.height = '40px';
		div.style.width = '50px';
	}
	else
	{
		div.style.height = '300px';
		div.style.width = '320px';	
	}
}

function initialization()
{
	showFiles('/');
}
	
document.onload = initialization();




