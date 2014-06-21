<?php
    
    session_start();
    
    require_once(dirname(__FILE__) . '/../tag/tag.php');
    require_once(dirname(__FILE__) . '/../../../src/db/DB.class.php');
    
    
    $dir = $_SERVER['HTTP_REFERER'];	
	$path = array();
	$substr = $dir;
	$slashCount = substr_count($dir , '/');
	for($i = 0 ; $i < $slashCount + 1 ; $i++)
	{
		if($i == $slashCount)
			array_push($path , $dir);
		$substr = substr($dir , 0 , strpos($dir , '/'));
		$dir = substr_replace($dir , '' , 0 , strpos($dir , '/') + 1);
		if($i != $slashCount)
			array_push($path , $substr);
	}
	
    switch($_POST['page'])
    {
        case('about'):
        {
            $query = 'SELECT * FROM `Site` WHERE `url`="' . $path[4] . '"';
            $site = DB::executeQuery($query , true);
            ob_start(); // begin collecting output
            include dirname(__FILE__) . '/about.tpl';    
            $data = ob_get_clean();
            $dom = new DOMDocument('1.0', 'utf-8');
            $dom->loadXML($data);
            setValue($dom , 'summary' , $site[0]['summary']);
            echo htmlspecialchars_decode($dom->saveHTML());
            break;
        }
        case('contact'):
        {
            ob_start(); // begin collecting output
            include dirname(__FILE__) . '/contact.tpl';    
            $data = ob_get_clean();
            echo $data;
            break;
        }
        case('cat'):
        {
            $pages = DB::executeQuery('SELECT p.* FROM `Page` p INNER JOIN `Category_Page` c ON p.id = c.pageID WHERE c.categoryID="' . $_POST['catID'] . '"' , true);
        	if(count($pages) > 0)
        	{
        	    foreach($pages as $page)
            	{
            	    if(strpos($_SERVER['HTTP_REFERER'] , '?') != null)
                	    $path4 = substr($path[4] , 0 , strpos($path[4] , '?'));
                	else
                        $path4 = $path[4];

            	    echo '<div class="articleBox" style="border:solid 2px;">';
            	    echo '<h3><a target="_blank" href="' . $GLOBALS['config']['siteURL'] . 'site/' . $path4 . '/page/' . $page['id'] . '">' . $page['title'] . '</a></h3>';
            	    echo '<p>' . $page['summary'] . '</p>';
            	    echo '<span style="font-family:Arial;font-size:17px;">Date Created: ' . $page['created'] . '</span>';     
            	    echo '</div><br />';   	    
            	}
        	}
        	else
        	{
        	    echo '<p style="margin-left:150px;">This Category does not have any pages yet.</p>';
        	}
        	
        	if(isset($_SESSION[$path[4] . '_isAdmin']) && ($_SESSION[$path[4] . '_isAdmin'] == true))
    	    {
    	        echo '<a style="margin-left:20px;" id="addCategoryLink" class="editComment" onclick="showAddCategory()">Add Page</a>';
    	        echo '<div style="display:none;" id="addCategoryDiv">';
    	        echo '<table><tbody>';
    	        echo '<tr><td class="generalText">Title: </td><td><input class="generalInput" type="text" /></td></tr>';   
                echo '<tr><td class="generalText">Summary: </td><td><textarea class="generalInput" cols="60" rows="10"></textarea></td></tr>';
                echo '<tr><td><a id="addCategoryLink" class="editComment" onclick="saveNewCategory()">Save</a></td><td><a id="addCategoryLink" class="editComment" onclick="cancelNewCategory()">Cancel</a></td></tr>';
                echo '</tbody></table>';
                echo '</div>';
    	    }

            break;
        }
        case('forum'):
        {
            if(strpos($_SERVER['HTTP_REFERER'] , '?') != null)
        	    $path4 = substr($path[4] , 0 , strpos($path[4] , '?'));
        	else
                $path4 = $path[4];

            $args = array('siteURL' => $path4 , 'showForums' => true);
            require_once(dirname(__FILE__) . '/../../../modules/forum/main.php');
            ob_start(); // begin collecting output
            include dirname(__FILE__) . '/forum.tpl';    
            $data = ob_get_clean();
            $dom = new DOMDocument('1.0', 'utf-8');
            $dom->loadXML($data);
            forum($dom , $args);
            echo htmlspecialchars_decode($dom->saveHTML());
            break;
        }
        case('forumData'):
        {
            if(strpos($_SERVER['HTTP_REFERER'] , '?') != null)
        	    $path4 = substr($path[4] , 0 , strpos($path[4] , '?'));
        	else
                $path4 = $path[4];
                
            $args = array('siteURL' => $path4 , 'forumID' => $_POST['forumID'] , 'forumData' => true);
            require_once(dirname(__FILE__) . '/../../../modules/forum/main.php');
            ob_start(); // begin collecting output
            include dirname(__FILE__) . '/forumData.tpl';    
            $data = ob_get_clean();
            $dom = new DOMDocument('1.0', 'utf-8');
            $dom->loadXML($data);
            forum($dom , $args);
            echo htmlspecialchars_decode($dom->saveHTML());
            break;
        }
        
        default:
        {
            echo 'Welcome';
            break;
        }
    }
    