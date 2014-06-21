<?php
    session_start();
    echo '<?xml version="1.0" encoding="UTF-8" ?>'; 
    require_once(dirname(__FILE__) . '/../../conf/config.php');    
    require_once(dirname(__FILE__) . '/config.php');    
    
    
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

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:gr="http://www.grapeCMS.com/template" xmlns:forum="http://www.grapeCMS.com/forum">
<head>
	<title>
	</title>
	
	<link rel="stylesheet" type="text/css" href=<?php echo '"' . $GLOBALS['config']['siteURL'] . 'theme/' . $theme['name'] . '/public/css/index.css' . '"'; ?> />
	
</head>

<body>
    <?php 
        require_once(dirname(__FILE__) . '/layout/left.tpl');
        require_once(dirname(__FILE__) . '/layout/main.tpl');        
    ?>
    <gr:title style="display:none;"></gr:title>
    <br /><br />    
</body>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js" type="text/javascript" charset="utf-8"></script>	
<script src="http://jquery-ui.googlecode.com/svn/tags/latest/ui/jquery.effects.core.js" type="text/javascript"></script>
<script type="text/javascript" src=<?php echo '"' . $GLOBALS['config']['siteURL'] . "theme/" . $theme['name'] . "/public/js/index.js" .'"'; ?>></script>

<script type="text/javascript">
    (document.getElementsByTagName('title')[0]).innerHTML = (document.getElementsByTagName('gr:title')[0]).innerHTML;
</script>

</html>