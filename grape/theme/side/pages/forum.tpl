<?php
    echo '<?xml version="1.0" encoding="UTF-8" ?>';
    require_once(dirname(__FILE__) . '/../../../conf/config.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<span xmlns="http://www.w3.org/1999/xhtml" xmlns:gr="http://www.grapeCMS.com/template" xmlns:forum="http://www.grapeCMS.com/forum">
    
    <forum:forumBoxes>
        <forum:forumBox>
            <div class="forumBox">
                <p>Topic: <a href="#" class="generalLink" onclick="showForum(this.id)"><forum:forumTopic></forum:forumTopic></a></p>
                <p>Created At: <forum:forumCreated></forum:forumCreated></p>
            </div>
        </forum:forumBox>
    </forum:forumBoxes>
</span>



        