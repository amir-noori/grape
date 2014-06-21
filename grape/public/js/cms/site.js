function changeSite(id)
{
	if( id == '')
	{
		var sideTabContainer = document.getElementById('sideTabContainer');
		sideTabContainer.innerHTML = '<div id="tabMinContainer"><div>';

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
			        alert("Error during AJAX call. Please try again. changeSite()");
			     }
			 }
		};
		xmlhttpObserver.open("POST" , siteURL + "/src/admin/site/changeSite.php" , true);

		xmlhttpObserver.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xmlhttpObserver.send();
	}
	else
	{
		xmlhttpObserver.onreadystatechange = function()
		{
			 if (xmlhttpObserver.readyState == 4)
			 {
			     if(xmlhttpObserver.status == 200) 
			     {
			     	alert(id);
				 }
			     else 
			     {
			        alert("Error during AJAX call. Please try again. changeSite()");
			     }
			 }
		};
		xmlhttpObserver.open("POST" , siteURL + "/src/admin/site/changeSite.php" , true);

		xmlhttpObserver.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xmlhttpObserver.send();
	}

}