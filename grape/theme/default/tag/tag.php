<?php   
        
        

    function replaceQuote($str)
    {
        $str = str_replace( "{singleQuote}" , "'" , $str);
    	$str = str_replace( "{doubleQuote}" , "\"" , $str);
    	return $str;
    }
    
    function setValue($domObject , $tagName , $value)
    {
        $tags = $domObject->getElementsByTagNameNS('http://www.grapeCMS.com/template' , $tagName);
        foreach($tags as $tag) 
        {
            $tag->nodeValue = $value;
        }
    }
    
    function setTagAttr($domObject , $nameSpace , $tagName , $attr , $value)
    {
        $tags = $domObject->getElementsByTagNameNS($nameSpace , $tagName);
        foreach($tags as $tag) 
        {
            $tag->setAttribute($attr , $value);
        }
    }
    
    function setCatList($domObject , $siteURL)
    {
        require_once(dirname(__FILE__) . '/../../../src/db/DB.class.php');
        $query = 'SELECT c.* FROM `Category` c INNER JOIN Site_Category sc ON c.id = sc.categoryID INNER JOIN Site s ON s.id = sc.siteID WHERE s.url="'. $siteURL .'"';
        $cats = DB::executeQuery($query , true);
        
        $tags = $domObject->getElementsByTagNameNS('http://www.grapeCMS.com/template' , 'showCatsList');

        foreach($tags as $tag) 
        {
            $tag->nodeValue = '';
            foreach($cats as $cat) 
            {
                $tag->nodeValue .= '<li><a href="#" onclick="showCat(\'' . $cat['id'] . '\')">' . $cat['title'] . '</a></li>';                
            }
        }
    }
    
    function setArticleList($domObject , $siteURL , $pageID)
    {
        require_once(dirname(__FILE__) . '/../../../src/db/DB.class.php');
        //require_once(dirname(__FILE__) . '/../../conf/config.php');
        if(strpos($_SERVER['REQUEST_URI'] , '?') != null)
    	    $dir = substr($_SERVER['REQUEST_URI'] , 0 , strpos($_SERVER['REQUEST_URI'] , '?'));
    	else
            $dir = $_SERVER['REQUEST_URI'];

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
    	if(strpos($_SERVER['HTTP_REFERER'] , '?') != null)
    	    $path2 = substr($path[2] , 0 , strpos($path[2] , '?'));
    	else
            $path2 = $path[2];
            
        $query = 'SELECT a.* FROM `Article` a INNER JOIN `Page_Article` pa ON pa.articleID = a.id INNER JOIN `Category_page` cp ON pa.pageID = cp.pageID INNER JOIN `Site_Category` sc  ON sc.categoryID = cp.categoryID INNER JOIN `Site` s ON sc.siteID = s.id WHERE pa.pageID="' . $path[4] . '" AND s.`url`="' . $path[2] . '"';
        $articles = DB::executeQuery($query , true);
        if(count($articles) > 0)
        {
            $tags = $domObject->getElementsByTagNameNS('http://www.grapeCMS.com/template' , 'showArticleList');
            foreach($tags as $tag) 
            {
                $tag->nodeValue = '<div>';
                foreach($articles as $article) 
                {
                    $tag->nodeValue .= '<div class="articleBox">';
                    $tag->nodeValue .= '<h3><a target="_blank" href="' . $GLOBALS['config']['siteURL'] . 'site/' . $path2 . '/page/' . $pageID . '/article/' . $article['id'] . '">' . $article['title'] . '</a></h3>';
                    $tag->nodeValue .= '<p>' . $article['summary'] . '</p>';                
                    $tag->nodeValue .= '</div><br />';
                }
                $tag->nodeValue .= '</div>';
            }
        }
        else if($path[3] == 'page')
        {
            setValue($domObject , 'notFound' , '<p>Sorry...! The Page you are looking for does not exist!</p>');
        }

    }
    
    function setArticle($domObject , $siteURL , $pageID , $articleID)
    {
        require_once(dirname(__FILE__) . '/../../../src/db/DB.class.php');
        //require_once(dirname(__FILE__) . '/../../conf/config.php');
        if(strpos($_SERVER['REQUEST_URI'] , '?') != null)
    	    $dir = substr($_SERVER['REQUEST_URI'] , 0 , strpos($_SERVER['REQUEST_URI'] , '?'));
    	else
            $dir = $_SERVER['REQUEST_URI'];

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
    	$path2 = '';
    	if(strpos($_SERVER['REQUEST_URI'] , '?') != null)
    	    $path2 = substr($path[2] , 0 , strpos($path[2] , '?'));
    	else
            $path2 = $path[2];
        
        $query = 'SELECT a.* FROM `Article` a INNER JOIN `Page_Article` pa ON pa.articleID = a.id INNER JOIN `Category_page` cp ON pa.pageID = cp.pageID INNER JOIN `Site_Category` sc  ON sc.categoryID = cp.categoryID INNER JOIN `Site` s ON sc.siteID = s.id WHERE a.id="' . $articleID . '" AND pa.pageID="' . $path[4] . '" AND s.`url`="' . $path[2] . '"';
        $articles = DB::executeQuery($query , true);
        $tags = $domObject->getElementsByTagNameNS('http://www.grapeCMS.com/template' , 'article');
        if(count($articles) > 0)
        {
        foreach($tags as $tag) 
        {
            $tag->nodeValue = '<div class="article">';
            foreach($articles as $article) 
            {
                $tag->nodeValue .= '<h3><a>' . replaceQuote($article['title']) . '</a></h3>';
                $tag->nodeValue .= '<p>' . replaceQuote($article['articleContent']) . '</p>';               
            }
            $tag->nodeValue .= '</div>';
        }
        $query = 'SELECT c.* ,su.imagePath FROM `Comment` c INNER JOIN `SiteUser` su ON c.userName = su.userName WHERE c.articleID="' . $articleID . '" ORDER BY `created` ASC';
        $comments = DB::executeQuery($query , true);
        foreach($tags as $tag) 
        {
            $tag->nodeValue .= '<br /><b>Comments:</b>';
            $tag->nodeValue .= '<div class="comments">';
            foreach($comments as $comment) 
            {
                $x = file_get_contents('/Applications/MAMP/grapeImages/amir_noori/amir.jpg');
                if($comment['imagePath'] == '')
                    $tag->nodeValue .= '<div class="commentImage" ><img id="' . $comment['userName'] . '" class="commentImage_" src="'. $GLOBALS['config']['siteURL'] . 'theme/default/public/images/user.jpg" /></div>';              
                else
                    $tag->nodeValue .= '<div class="commentImage" ><img id="' . $comment['userName'] . '" class="commentImage_" src="' . 'data: image;base64,' . base64_encode(file_get_contents($GLOBALS['config']['imagesDirectory'] . $comment['userName'] . '/' . $comment['imagePath']))  . '" /></div>';              
                
                $tag->nodeValue .= '<div class="arrow-left , commentArrow"></div>';
                $tag->nodeValue .= '<div class="comment" id="comment_' . $comment['id'] . '">';              
                $tag->nodeValue .= '<br /><h4>' . $comment['userName']  . ':</td></h4>';              
                $tag->nodeValue .= '<p>' . $comment['commentContent'] . '</p>';
                $tag->nodeValue .= '<p><textarea id="commentTextArea_' . $comment['id'] . '" class="commentTextArea , generalInput" cols="60" rows="10">' . $comment['commentContent'] . '</textarea></p><br />';

                if($comment['userID'] == $_SESSION[$path2 . '_userID'])
                {
                    $tag->nodeValue .= '<a id="editCommentLink_' . $comment['id'] . '" class="editComment" onclick="editComment(\'' . $comment['id'] . '\')">Edit</a>';
                    $tag->nodeValue .= '<a id="deleteCommentLink_' . $comment['id'] . '" class="editComment" onclick="deleteComment(\'' . $comment['id'] . '\')">Delete</a>';
                    $tag->nodeValue .= '<a style="display:none;" id="saveCommentLink_' . $comment['id'] . '" class="editComment" onclick="saveComment(\'' . $comment['id'] . '\')">Save</a>';
                    $tag->nodeValue .= '<a style="display:none;" id="cancelCommentLink_' . $comment['id'] . '" class="editComment" onclick="cancelComment(\'' . $comment['id'] . '\')">Cancel</a><br /><br />';
                    
                }
                $tag->nodeValue .= '</div><br />';                        
            }
            $tag->nodeValue .= '</div><br />';
            
            $tag->nodeValue .= '<div id="addComment">';
            $tag->nodeValue .= '<h3 style="font-family:Arial;">Add Comment</h3>';          
            $tag->nodeValue .= '<table>';
            $tag->nodeValue .= '<tbody style="font-family:Arial;">';
            $tag->nodeValue .= '<form>';
            if(!isset($_SESSION[$path2 .'_userID']))
            {
                $tag->nodeValue .= '<tr><td>Full Name:</td><td style="padding:10;"><input class="generalInput" name="name" type="text" value="Your Name" size="40" onfocus="javascript:if(this.value==this.defaultValue){this.value=\'\';}" onblur="javascript:if(this.value==\'\'){this.value=this.defaultValue;}" /></td></tr>';
            	$tag->nodeValue .= '<tr><td>Mail:</td><td style="padding:10;"><input class="generalInput" name="name" type="text" value="Your Mail" size="40" onfocus="javascript:if(this.value==this.defaultValue){this.value=\'\';}" onblur="javascript:if(this.value==\'\'){this.value=this.defaultValue;}" /></td></tr>';
            }
            else
            {
                $tag->nodeValue .= '<tr><td>User Name:</td><td style="padding:10;">' . $_SESSION[$path2 . '_userName'] . '</td></tr>';
            	$tag->nodeValue .= '<tr><td>Mail:</td><td style="padding:10;">' . $_SESSION[$path2 . '_userEmail'] . '</td></tr>';
            }
        	$tag->nodeValue .= '<tr>';
        	$tag->nodeValue .= '<td>Message:</td>';
        	$tag->nodeValue .= '<td style="padding:10;">';
        	$tag->nodeValue .= '<textarea class="generalInput" style="resize: none;" rows="10" cols="50" onfocus="javascript:if(this.value==this.defaultValue){this.value=\'\';}" onblur="javascript:if(this.value==\'\'){this.value=this.defaultValue;}" >Your Message</textarea>';
        	$tag->nodeValue .= '</td>';
        	$tag->nodeValue .= '</tr>';
        	$tag->nodeValue .= '<tr><td>&nbsp;&nbsp;&nbsp;<input type="submit" class="generalInput" value="Send" /></td></tr>';
        	$tag->nodeValue .= '</form>';
            $tag->nodeValue .= '</tbody>';
            $tag->nodeValue .= '</table>';
            
            
            $tag->nodeValue .= '</div><br />';
        }
        }
        else if($path[5] == 'article')
        {
            setValue($domObject , 'notFound' , '<p>Sorry...! The Article you are looking for does not exist!</p>');
        }
    }
        
    function setValueByNameSpaceAndTag($domObject , $nameSpace , $tagName , $value)
    {
        
        $tags = $domObject->getElementsByTagNameNS($nameSpace , $tagName);
        
        foreach($tags as $tag) 
        {            
            $tag->nodeValue = $value;
        }
    }
    
    function getValueByNameSpaceAndTag($domObject , $nameSpace , $tagName)
    {
        $tags = $domObject->getElementsByTagNameNS($nameSpace , $tagName);

        foreach($tags as $tag) 
        {
            return $tag;
        }
    }
    
    
    
    
    
    
