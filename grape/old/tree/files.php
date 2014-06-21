<?php	
	//ini_set('display_errors',1);

	function showFiles($dir)
	{
		$html = '';
		$folders = array();
		$files = array();
		
		$html .= '<ul class="treeContainer">';
		if ($handle = opendir($dir)) 
		{
		    while (false !== ($entry = readdir($handle))) 
			{
		        if ($entry != "." && $entry != "..") 
				{
					if(is_dir( $dir . DIRECTORY_SEPARATOR . $entry))
					{
						array_push($folders , $entry);	
					}
					else
					{
						array_push($files , $entry);
					}
		        }
		    }
		    closedir($handle);
		}
		foreach($folders as $f)
		{
			$id = $f . rand(0 , 1000000000);
			$html .= '<li class="directory" id="' . $id . '"  onclick="showSubDirectoryFiles(\'' . $dir . DIRECTORY_SEPARATOR . $f . '\' , \'' . $id . '\')" > <span class="fileWrapper"><img class="dirImage" src="./resource/dir_close.jpg">&nbsp;</img>' . $f . '</span></li>';
		}
		foreach($files as $f)
		{
			$id = $f . rand(0 , 1000000000);
			$html .= '<li id="' . $f . rand(0 , 1000000000) . '" class="file"><span class="fileWrapper" onclick="showContent(\'' . $dir . DIRECTORY_SEPARATOR . $f . '\' , \'' . $id . '\')">' . $f . '</span></li>';	
		}
		$html .= '</ul>';
		return $html;
	}
	
	function showContent($name)
	{
		echo file_get_contents($name);
	}
	
	function saveContent($fileName , $content)
	{
		if(!isset($fileName) || $fileName == '' || !is_file($fileName))
			return 'No such file: "' . $fileName . '" ';
		else if(file_put_contents($fileName , $content) == false)
			return 'Could not write to file: "' . $fileName . '" ';
		return 'ok';
	}
	
	if(isset($_POST['parent']) && $_POST['parent'] == 1)
		echo showFiles($_POST['dir']);
		
	if(isset($_POST['child']) && $_POST['child'] == 1)	
		echo showFiles($_POST['dir']);

	if(isset($_POST['showContent']) && $_POST['showContent'] == 1)	
		echo showContent($_POST['fileName']);

	if(isset($_POST['saveFile']) && $_POST['saveFile'] == 1)	
		echo saveContent($_POST['fileName'] , $_POST['content']);	
	
	
	
	
	
	
	
	