<?php
    session_start();

    require_once(dirname(__FILE__) . '/../db/DB.class.php');
    
    
    function showSiteModules()
    {
        $query = 'SELECT m.* , sm.isEnabled FROM `Module` m INNER JOIN `Site_Module` sm ON m.id = sm.moduleID  WHERE sm.`siteID`="' . 1 . '"';
        $modules = DB::executeQuery($query , true);
        
        echo '<table id="pageTable" class="genralTable"><tbody><tr><th>Name</th><th>Summary</th><th>Enabled</th></tr>';
        foreach($modules as $module)
        {
            echo '<tr>';
        	echo '<td class="middleTabGeneral" >' . $module['moduleName'] . '</td>';
        	echo '<td class="middleTabGeneral" title="' . $module['moduleSummary'] . '">' . substr($module['moduleSummary'] , 0 , 50) . '...</td>';
        	if($module['isEnabled'] == true)
        	    echo '<td class="middleTabGeneral" ><input class="generalInput" name="module_' . $module['id'] . '" type="checkbox" checked value="true"></td>';
        	else
        	    echo '<td class="middleTabGeneral" ><input class="generalInput" name="module_' . $module['id'] . '" type="checkbox" value="false"></td>';
        	    
        	echo '</tr>';
        }
        echo '<tbody></table>';
        echo '<br><input class="generalInput" type="submit" value="Save">';
    	
    }