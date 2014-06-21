<?php

    require_once(dirname(__FILE__) . '/../../src/db/DB.class.php');


    function forum($domObject , $args)
    {
        require_once(dirname(__FILE__) . '/module.php');
        foreach($tags as $tag)
        {       
            switch($tag)
            {
                case('forumMainLink'):
                {
                    forumMainLink($domObject , $nameSpace , $tag , $args);
                    break;
                }
                case('forumBox'):
                {
                    if(isset($args['showForums']))
                        forumBox($domObject , $nameSpace , $tag , $args);
                    break;
                }
                case('forumTopic'):
                {
                    forumTopic($domObject , $nameSpace , $tag , $args);
                    break;
                }
                case('forumCreated'):
                {
                    forumCreated($domObject , $nameSpace , $tag , $args);
                    break;
                }
                case('forumComment'):
                {
                    if(isset($args['forumData']))
                        forumComment($domObject , $nameSpace , $tag , $args);
                    break;
                }
            }
        }
    }
    
    
    
    function forumMainLink($domObject , $nameSpace , $tag , $args)
    {
        setValueByNameSpaceAndTag($domObject , $nameSpace  , $tag , 'Forum');
    }
    
    function forumBox($domObject , $nameSpace , $tag , $args)
    {
        $query = 'SELECT f.* FROM `Forum` f INNER JOIN `Site_Forum` sf ON f.id = sf.forumId INNER JOIN `Site` s  WHERE s.`url`="' . $args['siteURL'] . '"';
        $forums = DB::executeQuery($query , true);
        
        $childTag = getValueByNameSpaceAndTag($domObject , $nameSpace , $tag);
        $parent = $childTag->parentNode;
        
        foreach($forums as $forum)
        {
            $doppel = $childTag->cloneNode(true);

            $tagXML = '<?xml version="1.0" encoding="UTF-8" ?>';
            $tagXML .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
            $tagXML .= '<span xmlns="http://www.w3.org/1999/xhtml" xmlns:gr="http://www.grapeCMS.com/template" xmlns:forum="http://www.grapeCMS.com/forum">';
            $tagXML .= $domObject->saveXML($childTag);
            $tagXML .= '</span>';

            $dom2 = new DOMDocument('1.0', 'utf-8');
            $dom2->loadXML($tagXML);

            setValueByNameSpaceAndTag($dom2 , $nameSpace , 'forumTopic' , $forum['topic']);
            setValueByNameSpaceAndTag($dom2 , $nameSpace , 'forumCreated' ,  $forum['created']);
            setTagAttr($dom2 , 'http://www.w3.org/1999/xhtml' , 'a' , 'id' , 'forumLink_' . $forum['id']);
            $doppel->nodeValue = htmlspecialchars_decode($dom2->saveHTML());
            
            $parent->appendChild($doppel);
        }
        $parent->removeChild($childTag);
    }
    
    
    function forumTopic($domObject , $nameSpace , $tag , $args)
    {
        $query = 'SELECT f.* FROM `Forum` f INNER JOIN `Site_Forum` sf ON f.id = sf.forumId INNER JOIN `Site` s  WHERE s.`url`="' . $args['siteURL'] . '" AND f.id="' . $args['forumID'] . '"';
        $forums = DB::executeQuery($query , true);
        $value = '';
        foreach($forums as $forum)
        {
            $value .= '<p>' . $forum['topic'] . '</p>';
        }
        setValueByNameSpaceAndTag($domObject , $nameSpace  , $tag , $value);
    }
        
    function forumCreated($domObject , $nameSpace , $tag , $args)
    {
        $query = 'SELECT f.* FROM `Forum` f INNER JOIN `Site_Forum` sf ON f.id = sf.forumId INNER JOIN `Site` s  WHERE s.`url`="' . $args['siteURL'] . '" AND f.id="' . $args['forumID'] . '"';
        $forums = DB::executeQuery($query , true);
        $value = '';
        foreach($forums as $forum)
        {
            $value .= '<p>' . $forum['created'] . '</p>';
        }
        
        setValueByNameSpaceAndTag($domObject , $nameSpace  , $tag , $value);
    }
    
    function forumComment($domObject , $nameSpace , $tag , $args)
    {
        $query = 'SELECT fc.* ,su.imagePath FROM `ForumComment` fc INNER JOIN `SiteUser` su ON fc.userName = su.userName INNER JOIN `Forum` f ON f.id = fc.forumId INNER JOIN `Site` s  WHERE s.`url`="' . $args['siteURL'] . '" AND f.id="' . $args['forumID'] . '" ORDER BY created ASC';
        $forumComments = DB::executeQuery($query , true);
        
        
        $childTag = getValueByNameSpaceAndTag($domObject , $nameSpace , $tag);
        $parent = $childTag->parentNode;
        foreach($forumComments as $forumComment)
        {
            
            $doppel = $childTag->cloneNode(true);

            $tagXML = '<?xml version="1.0" encoding="UTF-8" ?>';
            $tagXML .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
            $tagXML .= '<span xmlns="http://www.w3.org/1999/xhtml" xmlns:gr="http://www.grapeCMS.com/template" xmlns:forum="http://www.grapeCMS.com/forum">';
            $tagXML .= $domObject->saveXML($childTag);
            $tagXML .= '</span>';

            $dom2 = new DOMDocument('1.0', 'utf-8');
            $dom2->loadXML($tagXML);

            setValueByNameSpaceAndTag($dom2 , $nameSpace , 'commentUserName' , $forumComment['userName']);
            setValueByNameSpaceAndTag($dom2 , $nameSpace , 'commentContent' ,  $forumComment['commentContent']);

            $src = '';
            if($forumComment['imagePath'] == '')
                $src =  $GLOBALS['config']['siteURL'] . 'theme/side/public/images/user.jpg';              
            else
                $src = 'data: image;base64,' . base64_encode(file_get_contents($GLOBALS['config']['imagesDirectory'] . $forumComment['userName'] . '/' . $forumComment['imagePath']));              
            
            setTagAttr($dom2 , 'http://www.w3.org/1999/xhtml' , 'img' , 'src' , $src);
            setTagAttr($dom2 , 'http://www.w3.org/1999/xhtml' , 'img' , 'id' , $forumComment['userName']);
            
            $doppel->nodeValue = htmlspecialchars_decode($dom2->saveHTML());
            $parent->appendChild($doppel);
        }
        $parent->removeChild($childTag);
        
    }
    
    
    
    
    
    
    
    
    
    











    
    
    
    
    
    
    
    