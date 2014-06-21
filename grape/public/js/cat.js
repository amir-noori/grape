/*functions for categories table started*/
function showAllCats()
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
				showCatSideTab();
		     }
		     else 
		     {
		        alert("Error during AJAX call. Please try again. showAllCats()");
		     }
		 }
	};
	xmlhttpObserver.open("POST" , siteURL + "/src/admin/cat/showCategories.php" , true);

	xmlhttpObserver.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttpObserver.send('command=1');
}

function showCatSideTab()
{
	var sideTabContainer = document.getElementById('sideTabContainer');
	sideTabContainer.innerHTML = '<div id="tabMinContainer"></div>'
}

function showCreateNewPageForm(event , id)
{
	var event = event || window.event;

	var div = document.getElementById('createNewPage');
	div.style.display = 'block';
	div.style.top = event.clientY + 'px';
	div.style.left = event.clientX + 'px';
	
	var saveButton = document.getElementById('saveNewPageButton');
	saveButton.onclick = function()
	{
		var newPageTitle = document.getElementById('newPageTitle');
		var newPageSummary = document.getElementById('newPageSummary');
		if(newPageTitle.value != '')
		{
			xmlhttpObserver.onreadystatechange = function()
			{
				 if (xmlhttpObserver.readyState == 4)
				 {
				     if(xmlhttpObserver.status == 200) 
				     {
						var countDiv = document.getElementById('categoryCount_' + id);
						countDiv.innerHTML = parseInt(countDiv.innerHTML) + 1;	
						div.style.display = 'none';	
				     }
				     else 
				     {
				        alert("Error during AJAX call. Please try again. showCreateNewPageForm()");
				     }
				 }
			};
			xmlhttpObserver.open("POST" , siteURL + "/src/admin/cat/showCategories.php" , true);

			xmlhttpObserver.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			xmlhttpObserver.send('command=createNewCat&title=' + newPageTitle.value + '&summary=' + newPageSummary.value + '&catID=' + id);
		}
		else
			alert('Title can not be empty!');
	}
}

function deleteCat(id)
{
	var div = document.getElementById('category_' + id);
	if(confirm('Are You Sure?'))
	{
		xmlhttpObserver.onreadystatechange = function()
		{
			 if (xmlhttpObserver.readyState == 4)
			 {
			     if(xmlhttpObserver.status == 200) 
			     {
					if(xmlhttpObserver.response == '')
						div.parentNode.removeChild(div);
			    	else
						alert(xmlhttpObserver.response);
						
			     }
			     else 
			     {
			        alert("Error during AJAX call. Please try again. deleteCat()");
			     }
			 }
		};
		xmlhttpObserver.open("POST" , siteURL + "/src/admin/cat/showCategories.php" , true);

		xmlhttpObserver.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xmlhttpObserver.send('command=deleteCat&id='+ id);
	}
}

function cancelNewPage()
{
	var div = document.getElementById('createNewPage');
	div.style.display = 'none';
}

function showPages(id)
{
	var div = document.getElementById('middle');
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
		        alert("Error during AJAX call. Please try again.showPages()");
		     }
		 }
	};
	xmlhttpObserver.open("POST" , siteURL + "/src/admin/cat/showCategories.php" , true);

	xmlhttpObserver.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttpObserver.send('command=showPages&catID='+ id);

}

/*functions for categories table ended*/

/*************************************/

/*functions for pages table started*/

function showCreateNewArticleForm(event , id)
{
	var event = event || window.event;

	var div = document.getElementById('createNewArticle');
	div.style.display = 'block';
	div.style.top = event.clientY + 'px';
	div.style.left = event.clientX + 'px';
	
	var saveButton = document.getElementById('saveNewArticleButton');
	saveButton.onclick = function()
	{
		var newArticleTitle = document.getElementById('newArticleTitle');
		var newArticleSummary = document.getElementById('newArticleSummary');
		if(newArticleTitle.value != '')
		{
			xmlhttpObserver.onreadystatechange = function()
			{
				 if (xmlhttpObserver.readyState == 4)
				 {
				     if(xmlhttpObserver.status == 200) 
				     {
						var countDiv = document.getElementById('articleCount_' + id);
						countDiv.innerHTML = parseInt(countDiv.innerHTML) + 1;	
						div.style.display = 'none';	
				     }
				     else 
				     {
				        alert("Error during AJAX call. Please try again.showCreateNewArticleForm()");
				     }
				 }
			};
			xmlhttpObserver.open("POST" , siteURL + "/src/admin/cat/showCategories.php" , true);

			xmlhttpObserver.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			xmlhttpObserver.send('command=createNewArticle&title=' + newArticleTitle.value + '&summary=' + newArticleSummary.value + '&pageID=' + id);
		}
		else
			alert('Title can not be empty!');
	}
}

function deletePage(id)
{
	var div = document.getElementById('page_' + id);
	if(confirm('Are You Sure?'))
	{
		xmlhttpObserver.onreadystatechange = function()
		{
			 if (xmlhttpObserver.readyState == 4)
			 {
			     if(xmlhttpObserver.status == 200) 
			     {
					if(xmlhttpObserver.response == '')
						div.parentNode.removeChild(div);
			    	else
						alert(xmlhttpObserver.response);		
			     }
			     else 
			     {
			        alert("Error during AJAX call. Please try again. deletePage()");
			     }
			 }
		};
		xmlhttpObserver.open("POST" , siteURL + "/src/admin/cat/showCategories.php" , true);

		xmlhttpObserver.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xmlhttpObserver.send('command=deletePage&id='+ id);
	}
}

function cancelNewArticle()
{
	var div = document.getElementById('createNewArticle');
	div.style.display = 'none';
}

function showArticles(pageID , catID)
{
	var div = document.getElementById('middle');
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
		        alert("Error during AJAX call. Please try again. showArticles()");
		     }
		 }
	};
	xmlhttpObserver.open("POST" , siteURL + "/src/admin/cat/showCategories.php" , true);

	xmlhttpObserver.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttpObserver.send('command=showArticles&pageID='+ pageID + '&catID=' + catID);

}


/*functions for pages table ended*/

/*************************************/

/*functions for articles table started*/

function showArticleInfo(id , pageID)
{
	var div = document.getElementById('middle');
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
		        alert("Error during AJAX call. Please try again. showArticleInfo()");
		     }
		 }
	};
	xmlhttpObserver.open("POST" , siteURL + "/src/admin/cat/showCategories.php" , true);

	xmlhttpObserver.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttpObserver.send('command=showArticleInfo&articleID='+ id + '&pageID=' + pageID);
}

function saveArticleInfo(which , id)
{
	var div;
	switch(which)
	{
		case 'title':
		{
			div = document.getElementById('articleTitleInput');
			break;
		}
		case 'summary':
		{
			div = document.getElementById('articleSummaryInput');
			break;
		}
		case 'articleContent':
		{
			div = document.getElementById('articleContentInput');
			break;
		}			
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
		        alert("Error during AJAX call. Please try again. saveArticleInfo()");
		     }
		 }
	};
	xmlhttpObserver.open("POST" , siteURL + "/src/admin/cat/showCategories.php" , true);

	xmlhttpObserver.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttpObserver.send('command=saveArticleInfo&articleID='+ id + '&which=' + which  + '&data=' + div.value);
}

/*functions for articles table ended*/









