<?php
    echo '<?xml version="1.0" encoding="UTF-8" ?>';
    require_once(dirname(__FILE__) . '/../../../conf/config.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<span xmlns="http://www.w3.org/1999/xhtml" xmlns:gr="http://www.grapeCMS.com/template" xmlns:forum="http://www.grapeCMS.com/forum">

     
     <div class="comments">
         <forum:forumComments>
             <forum:forumComment style="">
                 <div class="commentImage" >
                     <img id="" class="commentImage_" src="" />
                 </div>
                 <div class="arrow-left , commentArrow"></div>
                 <div class="comment" id="">
                     <br /><h4><forum:commentUserName></forum:commentUserName></h4>
                        
                        <forum:commentContent></forum:commentContent>
                 </div>    
                 <br /><br />        
             </forum:forumComment>
             
         </forum:forumComments>
     </div>
     
     <div id="ballon">
     </div>
     
     
</span>    




