var maxTabShown = '';
var minTabClicked = '';
var accordionTabClicked = {};

function showMaxTab(id)
{
	var maxId = id.substring(0 , id.length -3) + 'Max';
	var minTab = document.getElementById(id);
	
	var fileContentDiv = document.getElementById('fileContent');
	if(id == 'fileTreeMin')
	{
		fileContentDiv.style.display = 'block';
	}
	else
	{
		fileContentDiv.style.display = 'none';
	}
	
	if(maxTabShown == '')
	{
		document.getElementById(maxId).style.display = 'block';
		maxTabShown = maxId;
		
		minTab.style.opacity = '0.5';
		minTabClicked = id;
	}
	else if(maxTabShown != maxId)
	{
		document.getElementById(maxTabShown).style.display = 'none';
		maxTabShown = maxId;
		var maxTab = document.getElementById(maxId);
		maxTab.style.display = 'block';
		
		document.getElementById(minTabClicked).style.opacity = '1';		
		minTab.style.opacity = '0.5';
		minTabClicked = id;
	}
	else
	{
		var maxTab = document.getElementById(maxId);
		maxTabShown = '';
		maxTab.style.display = 'none';
			
		minTab.style.opacity = '0.5';		
		document.getElementById(minTabClicked).style.opacity = '1';
		minTabClicked = '';
	}
}

function accordion()
{
	
}

function showSubTab(className)
{
	var elements = document.getElementsByClassName(className);
	
	if(accordionTabClicked[className] == false)
	{
		for(var i = 0 ; i < elements.length ; i++)
		{
			(elements[i]).style.display = 'none';
		}
		accordionTabClicked[className] = true;
	}
	else
	{
		for(var i = 0 ; i < elements.length ; i++)
		{
			(elements[i]).style.display = 'block';
		}
		for(var i = 0.01 ; i < 1 ; i += 0.01)
		{									
			setTimeout("fadeIn("+i+",'' , '"+className+"')" , i*1000);
		}
		accordionTabClicked[className] = false;
		
	}

	
}



