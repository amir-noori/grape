function showUsersSideTab()
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
		     }
		     else 
		     {
		        alert("Error during AJAX call. Please try again. showUsersSideTab()");
		     }
		 }
	};
	xmlhttpObserver.open("POST" , siteURL + "/src/admin/users/usersSideTabs.php" , true);

	xmlhttpObserver.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttpObserver.send();
}

function usersPanel()
{
	var div = document.getElementById('middle');
	document.getElementById('fileContent').style.display = 'none';

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
		        alert("Error during AJAX call. Please try again. usersPanel()");
		     }
		 }
	};
	xmlhttpObserver.open("POST" , siteURL + "/src/admin/users/userPanel.php" , true);

	xmlhttpObserver.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttpObserver.send();
}

function showAllUsers(pageNumber)
{
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
		        alert("Error during AJAX call. Please try again. showAllUsers()");
		     }
		 }
	};
	xmlhttpObserver.open("POST" , siteURL + "/src/admin/users/showAllUsers.php" , true);

	xmlhttpObserver.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttpObserver.send('pageNumber=' + pageNumber);
}

function showCreateNewUser()
{
	var div = document.getElementById('createNewUserContainer');
	if(div.style.display == 'block')
		div.style.display = 'none';
	else
		div.style.display = 'block';
}

function editUser(id)
{
	var middle = document.getElementById('middle');
	
	xmlhttpObserver.onreadystatechange = function()
	{
		 if (xmlhttpObserver.readyState == 4)
		 {
		     if(xmlhttpObserver.status == 200) 
		     {
			 	//middle.innerHTML = xmlhttpObserver.response;
				alert(xmlhttpObserver.response);
		     }
		     else 
		     {
		        alert("Error during AJAX call. Please try again. editUser()");
		     }
		 }
	};
	xmlhttpObserver.open("POST" , siteURL + "/src/admin/users/editUser.php" , true);

	xmlhttpObserver.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttpObserver.send('command=edit&userID=' + id);
}

function deleteUser(id)
{
	var userDiv = document.getElementById('user_' + id);
	
	if(confirm('Are you sure?'))
	{
		xmlhttpObserver.onreadystatechange = function()
		{
			 if (xmlhttpObserver.readyState == 4)
			 {
			     if(xmlhttpObserver.status == 200) 
			     {
					if(xmlhttpObserver.response != 'ok')
						alert('Somthing went wrong!: "' + xmlhttpObserver.response + '" ' + 'Please try again.');
					else	
						userDiv.parentNode.removeChild(userDiv);
			     }
			     else 
			     {
			        alert("Error during AJAX call. Please try again. deteleUser()");
			     }
			 }
		};
		xmlhttpObserver.open("POST" , siteURL + "/src/admin/users/editUser.php" , true);

		xmlhttpObserver.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xmlhttpObserver.send('command=delete&userID=' + id);	
	}
}


































