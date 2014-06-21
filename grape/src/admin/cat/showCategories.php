<?php

session_start();

//require_once(dirname(__FILE__) . '/../../db/PDOFactory.class.php');
require_once(dirname(__FILE__) . '/../../db/DB.class.php');

if(!isset($_SESSION['siteID']))
{
	$result = DB::executeQuery('SELECT id FROM Site Where userID="' . $_SESSION['userId'] . '" AND `default`="1"' , true);
	$_SESSION['siteID'] = $result[0]['id'];
}

function showCats()
{
	$result = DB::executeQuery('SELECT c.* FROM Category c INNER JOIN Site_Category s ON c.id = s.categoryID WHERE s.siteID = "' . $_SESSION['siteID'] . '"' , true);
	
	echo '<h3 class="tableHeader">Categories:</h3>';
	echo '<table id="categoryTable" class="genralTable" ><tbody><tr><th>Title</th><th>Create Page</th><th>Edit</th><th>Delete</th><th>Page Count</th><th>More</th></tr>';
	foreach($result as $r)
	{
		echo '<tr id="category_'. $r['id'] .'"><td class="middleTableTitle" title="' . $r['title'] . '" onclick="showPages(\'' . $r['id'] . '\')">' . substr($r['title'] , 0 , 25) . '...</td>';
		echo '<td class="middleTableEdit" onclick="showCreateNewPageForm(event,\'' . $r['id'] . '\')">New Page</td>';
		echo '<td class="middleTableEdit">Edit</td>';
		echo '<td class="middleTableDelete" onclick="deleteCat(\'' . $r['id'] . '\')">Delete</td>';
		echo '<td class="middleTableDelete" id="categoryCount_' . $r['id'] . '">' . $r['pageCount'] . '</td>';
		echo '<td class="middleTableEdit">More</td></tr>';
	}
	echo '<tbody></table>';
	echo '<a href="#">New Category</a>';
	echo '<div id="createNewPage"><form><table><tbody><tr><td>Title:</td><td><input type="text" size="20" id="newPageTitle"></td></tr><tr><tr><td>Summary:</td><td><textarea cols="20" rows="15" id="newPageSummary"></textarea></td></tr><tr><td><input type="button" value="Save" id="saveNewPageButton"></td><td><input type="button" value="Cancel" onclick="cancelNewPage()"></td></tr></tbody></table></form></div>';
	
}

function removeCat($id)
{
	$query = 'DELETE FROM `Category` WHERE `id`="' . $id . '";';
	$query .= 'DELETE FROM `Category_Page` WHERE `categoryID`="' . $id . '";';
	$query .= 'DELETE FROM `Site_Category` WHERE `categoryID`="' . $id . '";';
	DB::executeQuery($query);
}

function createPage($title , $summary , $catID)
{
	$order = array("'" , "\"");
	$title = str_replace("'" , "{singleQuote}" , $title);
	$title = str_replace("\"" , "{doubleQuote}" , $title);
	$summary = str_replace("'" , "{singleQuote}" , $summary);
	$summary = str_replace("\"" , "{doubleQuote}" , $summary);
	$query = 'INSERT INTO `Page` (title , summary , userID , created , articleCount) VALUES ("' . $title . '","' . $summary . '", "' . $_SESSION['userId'] . '" ," ' . date('Y-m-d H:i:s') . '" ,0);';
	$query .= 'INSERT INTO `Category_Page` (categoryID , pageID) VALUES ("' . $catID . '" , LAST_INSERT_ID());';
	$query .= 'UPDATE `Category` SET pageCount=(pageCount + 1) WHERE id="' . $catID . '";';
	DB::executeQuery($query);
}

function showPages($catID)
{
	$result = DB::executeQuery('SELECT p.* FROM `Page` p INNER JOIN `Category_Page` c ON p.id = c.pageID WHERE c.categoryID="' . $catID . '"' , true);
	
	echo '<h3 class="tableHeader"><span>Pages:</span><span onclick="showAllCats()"><img class="back_button_img" src="http://localhost:8888/angoor/public/images/back.jpg"></span></h3>';
	echo '<table id="pageTable" class="genralTable"><tbody><tr><th>Title</th><th>Date</th><th>Create Article</th><th>Edit</th><th>Delete</th><th>Count</th></tr>';
	foreach($result as $r)
	{
		echo '<tr id="page_'. $r['id'] .'"><td class="middleTableTitle" title="' . $r['summary'] . '" onclick="showArticles(\'' . $r['id'] . '\', \'' . $catID . '\')">' . substr($r['title'] , 0 , 25) . '...</td>';
		echo '<td class="middleTableDate">' . date('Y-m-d H:i:s') . '</td>';
		echo '<td class="middleTableEdit" onclick="showCreateNewArticleForm(event,\'' . $r['id'] . '\')">New Article</td>';
		echo '<td class="middleTableEdit">Edit</td>';
		echo '<td class="middleTableDelete" onclick="deletePage(\'' . $r['id'] . '\')">Delete</td>';
		echo '<td class="middleTableDelete" id="articleCount_' . $r['id'] . '">' . $r['articleCount'] . '</td></tr>';
	}
	echo '<tbody></table>';
	echo '<a href="#">New Page</a>';
	echo '<div id="createNewArticle"><form><table><tbody><tr><td>Title:</td><td><input type="text" size="20" id="newArticleTitle"></td></tr><tr><tr><td>Summary:</td><td><textarea cols="20" rows="15" id="newArticleSummary"></textarea></td></tr><tr><td><input type="button" value="Save" id="saveNewArticleButton"></td><td><input type="button" value="Cancel" onclick="cancelNewArticle()"></td></tr></tbody></table></form></div>';
}

function removePage($id)
{
	$query = 'UPDATE `Category` c JOIN `Category_Page` p ON c.id = p.categoryID SET c.pageCount=(c.pageCount - 1) WHERE p.id="' . $id . '";';
	$query .= 'DELETE FROM `Category_Page` WHERE `pageID`="' . $id . '";';
	$query .= 'DELETE FROM `Page_Article` WHERE `pageID`="' . $id . '";';
	$query .= 'DELETE FROM `Page` WHERE `id`="' . $id . '";';
	DB::executeQuery($query);
}

function createArticle($title , $summary , $pageID)
{
	$order = array("'" , "\"");
	$title = str_replace("'" , "{singleQuote}" , $title);
	$title = str_replace("\"" , "{doubleQuote}" , $title);
	$summary = str_replace("'" , "{singleQuote}" , $summary);
	$summary = str_replace("\"" , "{doubleQuote}" , $summary);
	$query = 'INSERT INTO `Article` (title , summary , userID , created , commentCount) VALUES ("' . $title . '","' . $summary . '", "' . $_SESSION['userId'] . '" ," ' . date('Y-m-d H:i:s') . '" ,0);';
	$query .= 'INSERT INTO `Page_Article` (pageID , ArticleID) VALUES ("' . $pageID . '" , LAST_INSERT_ID());';
	$query .= 'UPDATE `Page` SET articleCount=(articleCount + 1) WHERE id="' . $pageID . '";';
	DB::executeQuery($query);
}

function showArticles($pageID , $catID)
{
	$result = DB::executeQuery('SELECT a.* FROM `Article` a INNER JOIN `Page_Article` p ON a.id = p.articleID WHERE p.pageID="' . $pageID . '"' , true);	
			
	echo '<h3 class="tableHeader"><span>Articles:</span><span onclick="showPages(\'' . $catID . '\')"><img class="back_button_img" src="http://localhost:8888/angoor/public/images/back.jpg"></span></h3>';
	echo '<table id="pageTable" class="genralTable"><tbody><tr><th>Title</th><th>Date</th><th>Edit</th><th>Delete</th><th>Comment Count</th></tr>';
	foreach($result as $r)
	{
		echo '<tr id="article_'. $r['id'] .'"><td class="middleTableTitle" title="' . $r['summary'] . '" onclick="showArticleInfo(\'' . $r['id'] . '\' , \'' . $pageID . '\')">' . substr($r['title'] , 0 , 25) . '...</td>';
		echo '<td class="middleTableDate">' . date('Y-m-d H:i:s') . '</td>';
		echo '<td class="middleTableEdit" onclick="showArticleInfo(\'' . $r['id'] . '\')">Edit</td>';
		echo '<td class="middleTableDelete" onclick="deleteArticle(\'' . $r['id'] . '\')">Delete</td>';
		echo '<td class="middleTableDelete" id="commentCount_' . $r['id'] . '">' . $r['commentCount'] . '</td></tr>';
	}
	echo '<tbody></table>';
	echo '<a href="#">New Article</a>';
}

function showArticleInfo($articleID , $pageID)
{
	$catID = DB::executeQuery('SELECT categoryID FROM Category_Page WHERE pageID="' . $pageID . '"'  , true);
	$result = DB::executeQuery('SELECT * FROM `Article` WHERE `id`="' . $articleID . '"' , true);
	
	echo '<h3 class="tableHeader"><span>Article:</span><span onclick="showArticles(\''.$pageID.'\',\''.$catID[0]['categoryID'].'\')"><img class="back_button_img" src="http://localhost:8888/angoor/public/images/back.jpg"></span></h3>';
	
	echo '<div id="articleInfo"><br>';
	foreach($result as $r)
	{
		echo '<table id="" class=""><tbody><tr><td>Title: </td><td>&nbsp;&nbsp;&nbsp;<input id="articleTitleInput" type="text" value="' . $r['title']  . '"></td><td>&nbsp;<input type="button" value="Save Changes" onclick="saveArticleInfo(\'title\' , \'' . $r['id'] . '\')"></td></tr>';
		echo '<tr><td>Summary: </td><td><textarea id="articleSummaryInput" cols="30" rows="8">'. $r['summary']  . '</textarea></td><td>&nbsp;<input type="button" value="Save Changes" onclick="saveArticleInfo(\'summary\' , \'' . $r['id'] . '\')"></td></tr>';
		echo '<tr><td>Created Date: </td><td>' . $r['created'] . '</td></tr></tbody></table>';
		echo '<div id="" class=""><h3>Content:</h3><div><textarea id="articleContentInput" id="articleText" cols="90" rows="30">' .  $r['articleContent'] . '</textarea><div>&nbsp;&nbsp;&nbsp;<input type="button" value="Save Changes" onclick="saveArticleInfo(\'articleContent\' , \'' . $r['id'] . '\')"></div></tbody></div>';
		echo '</div>';
	}
	echo '</div>';
}

function saveArticleInfo($articleID , $which , $data)
{
	$order = array("'" , "\"");
	$data = str_replace("'" , "{singleQuote}" , $data);
	$data = str_replace("\"" , "{doubleQuote}" , $data);
	$query = 'UPDATE `Article` SET ' . $which . '="' . $data . '" WHERE id="' . $articleID . '";';
	DB::executeQuery($query);	
}




if(isset($_POST['command']) )
{
	switch($_POST['command'])
	{
		case('saveArticleInfo'):
		{
			saveArticleInfo($_POST['articleID'] , $_POST['which'] , $_POST['data']);
			break;
		}
		case('showArticleInfo'):
		{
			showArticleInfo($_POST['articleID'] , $_POST['pageID']);
			break;
		}
		case('showArticles'):
		{
			showArticles($_POST['pageID'] , $_POST['catID']);
			break;
		}
		case('createNewArticle'):
		{
			createArticle($_POST['title'] , $_POST['summary'] , $_POST['pageID']);
			break;
		}
		case('deletePage'):
		{
			removePage($_POST['id']);
			break;
		}
		case('showPages'):
		{
			showPages($_POST['catID']);
			break;
		}
		case('createNewCat'):
		{
			createPage($_POST['title'] , $_POST['summary'] , $_POST['catID']);
			break;
		}
		case('deleteCat'):
		{
			removeCat($_POST['id']);
			break;
		}
		default:
		{
			showCats();
		}
	}
}






