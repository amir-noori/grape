<div id="mainContainer">
    <br />
    <br /><br /><br />
    <div id="mainStuff">
        <?php
            
            if(strpos($_SERVER['REQUEST_URI'] , 'login_failed') != null)
            {
                require_once(dirname(__FILE__) . '/../pages/login_failed.tpl');
            }
            else if($path[5] == 'article')
            {
                require_once(dirname(__FILE__) . '/../pages/article.tpl');
            }
            else if ($path[3] == 'page')
            {
                require_once(dirname(__FILE__) . '/../pages/showArticles.tpl');
            }
            
            require_once(dirname(__FILE__) . '/../noPage.tpl'); 
        ?>
    </div>    
</div>