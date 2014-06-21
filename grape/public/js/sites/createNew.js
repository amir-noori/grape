function loadCreateNewSiteSideTab()
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
		        alert("Error during AJAX call. Please try again. loadCreateNewSiteSideTab()");
		     }
		 }
	};
	xmlhttpObserver.open("POST" , siteURL + "/src/sites/create/sideTabs.php" , true);

	xmlhttpObserver.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttpObserver.send();
}
