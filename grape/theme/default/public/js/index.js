var siteURL = 'http://grape.com:8888/';
var themeName = 'default';
var xmlhttpObserver;
if(window.XMLHttpRequest)
{
	xmlhttpObserver = new XMLHttpRequest();
}
else
{
	xmlhttpObserver = new ActiveXObject("Microsoft.XMLHTTP");
}


function getElementById(id)
{
	return document.getElementById(id);
}

function showMainStuff(page)
{
	var mainStuff = getElementById('mainStuff');
	
	xmlhttpObserver.onreadystatechange = function()
	{
		 if (xmlhttpObserver.readyState == 4)
		 {
		     if(xmlhttpObserver.status == 200) 
		     {
				mainStuff.innerHTML = xmlhttpObserver.response;
		     }
		     else 
		     {
		        alert("Error during AJAX call. Please try again. showMainStuff()");
		     }
		 }
	};
	xmlhttpObserver.open("POST" , siteURL + 'theme/' + themeName + "/pages/getResult.php" , true);

	xmlhttpObserver.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttpObserver.send('page=' + page);
}

function showCat(id)
{
	var mainStuff = getElementById('mainStuff');
	
	xmlhttpObserver.onreadystatechange = function()
	{
		 if (xmlhttpObserver.readyState == 4)
		 {
		     if(xmlhttpObserver.status == 200) 
		     {
				mainStuff.innerHTML = xmlhttpObserver.response;
		     }
		     else 
		     {
		        alert("Error during AJAX call. Please try again. showCat()");
		     }
		 }
	};
	xmlhttpObserver.open("POST" , siteURL + 'theme/' + themeName + "/pages/getResult.php" , true);

	xmlhttpObserver.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttpObserver.send('page=cat&catID=' + id);
}

function showLoginDiv()
{
	var link = getElementById('loginLink');
	if(link.style.color != 'red')
		link.style.color = 'red';
	else
		 link.style.color = 'silver';
		
	var div = getElementById('loginDiv');
	if(div.style.display == 'block')
		div.style.display = 'none';
	else
		div.style.display = 'block';
}

function showRegister()
{
	var mainStuff = getElementById('mainStuff');
	
	xmlhttpObserver.onreadystatechange = function()
	{
		 if (xmlhttpObserver.readyState == 4)
		 {
		     if(xmlhttpObserver.status == 200) 
		     {
				mainStuff.innerHTML = xmlhttpObserver.response;
		     }
		     else 
		     {
		        alert("Error during AJAX call. Please try again. showRegister()");
		     }
		 }
	};
	xmlhttpObserver.open("POST" , siteURL + 'theme/' + themeName + "/pages/register.tpl" , true);

	xmlhttpObserver.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttpObserver.send();
}

function logOut()
{
	getElementById('logOutForm').submit();
}

function editComment(id)
{
	var editCommentLink = getElementById('editCommentLink_' + id);
	var saveCommentLink = getElementById('saveCommentLink_' + id);
	var deleteCommentLink = getElementById('deleteCommentLink_' + id);
	var commentTextArea = $('#commentTextArea_' + id);
	var cancelCommentLink = getElementById('cancelCommentLink_' + id);
	
	editCommentLink.style.display = 'none';
	saveCommentLink.style.display = 'inline';
	deleteCommentLink.style.display = 'none';
	commentTextArea.fadeIn();
	cancelCommentLink.style.display = 'inline';
	
}

function saveComment(id)
{
	var editCommentLink = getElementById('editCommentLink_' + id);
	var saveCommentLink = getElementById('saveCommentLink_' + id);
	var deleteCommentLink = getElementById('deleteCommentLink_' + id);
	var commentTextArea = $('#commentTextArea_' + id);
	var cancelCommentLink = getElementById('cancelCommentLink_' + id);
	
	
	editCommentLink.style.display = 'inline';
	saveCommentLink.style.display = 'none';
	deleteCommentLink.style.display = 'inline';
	commentTextArea.fadeOut();
	cancelCommentLink.style.display = 'none';		
}

function cancelComment(id)
{
	var editCommentLink = getElementById('editCommentLink_' + id);
	var saveCommentLink = getElementById('saveCommentLink_' + id);
	var deleteCommentLink = getElementById('deleteCommentLink_' + id);
	var commentTextArea = $('#commentTextArea_' + id);
	var cancelCommentLink = getElementById('cancelCommentLink_' + id);
	
	
	editCommentLink.style.display = 'inline';
	saveCommentLink.style.display = 'none';
	deleteCommentLink.style.display = 'inline';
	commentTextArea.fadeOut();
	cancelCommentLink.style.display = 'none';		
}

function deleteComment(id)
{
	if(confirm('Are You Sure?'))
	{
		var comment = getElementById('comment_' + id);
		comment.parentNode.removeChild(comment);
	}	
}

function showForumTopics()
{
	var mainStuff = getElementById('mainStuff');
	
	xmlhttpObserver.onreadystatechange = function()
	{
		 if (xmlhttpObserver.readyState == 4)
		 {
		     if(xmlhttpObserver.status == 200) 
		     {
				mainStuff.innerHTML = xmlhttpObserver.response;
		     }
		     else 
		     {
		        alert("Error during AJAX call. Please try again. showForumTopics()");
		     }
		 }
	};
	xmlhttpObserver.open("POST" , siteURL + 'theme/' + themeName + "/pages/getResult.php" , true);

	xmlhttpObserver.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttpObserver.send('page=forum');
}

function showAddCategory()
{
	$('#addCategoryDiv').fadeIn();
	$('#addCategoryLink').fadeOut();
}
function saveNewCategory()
{
	$('#addCategoryDiv').fadeOut();
	$('#addCategoryLink').fadeIn();
}
function cancelNewCategory()
{
	$('#addCategoryDiv').fadeOut();
	$('#addCategoryLink').fadeIn();
}

function init()
{
	$('.commentImage_').mouseover(function(e)
	{
		var ballon = $('#ballon');
		xmlhttpObserver.onreadystatechange = function()
		{
			 if (xmlhttpObserver.readyState == 4)
			 {
			     if(xmlhttpObserver.status == 200) 
			     {
					ballon.html(xmlhttpObserver.response);
					ballon.css('left' , -350 + e.pageX);
					ballon.css('top' , -150 + e.pageY);

					ballon.fadeIn();
			     }
			     else 
			     {
			        //alert("Error during AJAX call. Please try again.");
			     }
			 }
		};
		xmlhttpObserver.open("POST" , siteURL + 'theme/' + themeName + "/pages/msc.php" , true);

		xmlhttpObserver.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xmlhttpObserver.send('command=ballonInfo&userName=' + this.id);
	});
	$('.commentImage_').mouseout(function(e)
	{
		var ballon = $('#ballon');
		ballon.fadeOut();
	});
	var forumMainLink = document.getElementsByTagName('forum:forummainlink');
	for(var i = 0 ; i < forumMainLink.length ; i++ )
	{
		(forumMainLink[i]).parentNode.parentNode.parentNode.removeChild((forumMainLink[i]).parentNode.parentNode);
	}
}

document.onload = init();
/* main menu started*/

var site = function() {
	this.navLi = $('#nav li').children('ul').hide().end();
	this.init();
};

site.prototype = {
 	
 	init : function() {
 		this.setMenu();
 	},
 	
 	// Enables the slidedown menu, and adds support for IE6
 	
 	setMenu : function() {
 	
 	$.each(this.navLi, function() {
 		if ( $(this).children('ul')[0] ) {
 			$(this)
 				.append('<span />')
 				.children('span')
 					.addClass('hasChildren')
 		}
 	});
 	
 		this.navLi.hover(function() {
 			// mouseover
			$(this).find('> ul').stop(true, true).slideDown('slow', 'easeOutBounce');
 		}, function() {
 			// mouseout
 			$(this).find('> ul').stop(true, true).hide(); 		
		});
 		
 	}
 
}

new site();

/* main menu ended*/