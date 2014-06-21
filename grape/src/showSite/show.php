<?php
    require_once(dirname(__FILE__) . '/../db/DB.class.php');
    $query = 'SELECT * FROM `Site` WHERE `url`="' . $path[1] . '"';
    $site = DB::executeQuery($query , true);
    $theme = DB::executeQuery( 'SELECT name FROM `Theme` WHERE `id`="' . $site[0]['themeID'] . '"', true);
    $themeName = $theme[0]['name'];
    
    ob_start(); // begin collecting output
    include dirname(__FILE__) . '/../../theme/' . $theme[0]['name'] . '/index.tpl';    
    $xml = ob_get_clean();

    require_once(dirname(__FILE__) . '/../../theme/' . $themeName . '/tag/tag.php');
    //require_once(dirname(__FILE__) . '/../showSite/tag.php');

    $dom = new DOMDocument('1.0', 'utf-8');
    $dom->loadXML($xml);
    setValue($dom , 'title' , $site[0]['title']);
    setValue($dom , 'summary' , $site[0]['summary']);
    setArticleList($dom , $path[2] , $path[4]);
    setArticle($dom , $path[2] , $path[4] , $path[6]);
    setCatList($dom , $path[2]);

    require_once(dirname(__FILE__) . '/../module/runModules.php');
    runModules($dom , $site[0]['id']);
    
    echo htmlspecialchars_decode($dom->saveHTML());
   
    /*
    echo '<hr>';
    echo 'theme name: ' . $theme[0]['name'] . '<hr>';
    echo 'siteURL: ' . $path[1] . '<hr>';
    echo 'catID: ' . $path[3] . '<hr>';
    echo 'pageID: ' . $path[5] . '<hr>';
    echo 'articleID: ' . $path[6] . '<hr>';
    */