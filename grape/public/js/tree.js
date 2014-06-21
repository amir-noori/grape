/* Defining global variables*/

var data = {};

/* Global variables definition ends*/

function showFiles(dir)
{
	var div = document.getElementById('treeParent');
	var xmlhttpObserver;
	if(window.XMLHttpRequest)
	{
		xmlhttpObserver = new XMLHttpRequest();
	}
	else
	{
		xmlhttpObserver = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttpObserver.onreadystatechange = function()
	{
		 if (xmlhttpObserver.readyState == 4)
		 {
		     if(xmlhttpObserver.status == 200) 
		     {
		    	div.innerHTML = xmlhttpObserver.response;
		     }
		     else 
		     {
		        alert("Error during AJAX call. Please try again. showFiles()");
		     }
		 }
	};
	xmlhttpObserver.open("POST" , siteURL + "/src/admin/file/tree_files.php" , true);

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
		(x[0]).setAttribute('src' , siteURL + '/public/images/dir_close.jpg');
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
					(x[0]).setAttribute('src' , siteURL + '/public/images/dir_open.jpg');
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
		        alert("Error during AJAX call. Please try again. showSubDirectoryFiles()");
		     }
		 }
	};
	xmlhttpObserver.open("POST" , siteURL + "/src/admin/file/tree_files.php" , true);

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
				div.value = xmlhttpObserver.response;
		     }
		     else 
		     {
		        alert("Error during AJAX call. Please try again. showContent()");
		     }
		 }
	};
	xmlhttpObserver.open("POST" , siteURL + "/src/admin/file/tree_files.php" , true);

	xmlhttpObserver.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttpObserver.send('fileName=' + fileName + '&showContent=1');
}

function saveContent()
{
	var content = document.getElementById('fileContentArea').value;
	var jsonObj = {
		'fileName' : selectedFile,
		'content' : unescape(content)
	}
	
	xmlhttpObserver.onreadystatechange = function()
	{
		 if (xmlhttpObserver.readyState == 4)
		 {
		     if(xmlhttpObserver.status == 200) 
		     {
			  	if(xmlhttpObserver.response == 'ok')
					alert('Changes has been saved!');
				else
					alert('An error has occured! ' + xmlhttpObserver.response + ' Please try again.');
		     }
		     else 
		     {
		        alert("Error during AJAX call. Please try again. saveContent");
		     }
		 }
	};
	xmlhttpObserver.open("POST" , siteURL + "/src/admin/file/tree_files.php" , true);

	xmlhttpObserver.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttpObserver.send('saveFile=1' + '&jsonObj=' +encodeURIComponent(JSON.stringify(jsonObj)));
}

function showFileSideTab()
{
	var xmlhttpObserver;
	if(window.XMLHttpRequest)
	{
		xmlhttpObserver = new XMLHttpRequest();
	}
	else
	{
		xmlhttpObserver = new ActiveXObject("Microsoft.XMLHTTP");
	}
	var sideTabContainer = document.getElementById('sideTabContainer');
	
	xmlhttpObserver.onreadystatechange = function()
	{
		 if (xmlhttpObserver.readyState == 4)
		 {
		     if(xmlhttpObserver.status == 200) 
		     {
			 	sideTabContainer.innerHTML = xmlhttpObserver.response;
				showFiles('.');
		     }
		     else 
		     {
		        alert("Error during AJAX call. Please try again. showFileSideTab()");
		     }
		 }
	};
	xmlhttpObserver.open("POST" , siteURL + "/src/admin/file/sideTabs.php" , true);

	xmlhttpObserver.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttpObserver.send();
}

function filePanel()
{
	document.getElementById('fileContent').style.display = 'none';
	document.getElementById('middle').innerHTML = '';
	showFileSideTab();
	showFiles('.');
}
