function loadManageSitesSideTab()
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
		        alert("Error during AJAX call. Please try again. loadManageSitesSideTab()");
		     }
		 }
	};
	xmlhttpObserver.open("POST" , siteURL + "/src/sites/manage/sideTabs.php" , true);

	xmlhttpObserver.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttpObserver.send();
}

function manageSite(id)
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
		        alert("Error during AJAX call. Please try again. manageSite()");
		     }
		 }
	};
	xmlhttpObserver.open("POST" , siteURL + "/src/sites/manage/manageSite.php" , true);

	xmlhttpObserver.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttpObserver.send('id=' + id);
}

function showThemes(id)
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
		        alert("Error during AJAX call. Please try again. showThemes()");
		     }
		 }
	};
	xmlhttpObserver.open("POST" , siteURL + "/src/sites/manage/showThemes.php" , true);

	xmlhttpObserver.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttpObserver.send('id=' + id);
}

function changeTheme(siteID , themeID)
{
	var middle = document.getElementById('middle');
	xmlhttpObserver.onreadystatechange = function()
	{
		 if (xmlhttpObserver.readyState == 4)
		 {
		     if(xmlhttpObserver.status == 200) 
		     {
				alert(xmlhttpObserver.response);
		     }
		     else 
		     {
		        alert("Error during AJAX call. Please try again. changeTheme()");
		     }
		 }
	};
	xmlhttpObserver.open("POST" , siteURL + "/src/sites/manage/showThemes.php" , true);

	xmlhttpObserver.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttpObserver.send('siteID=' + siteID + '&themeID=' + themeID);
}









