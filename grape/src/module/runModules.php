<?php

    require_once(dirname(__FILE__) . '/../db/DB.class.php');
        
    
    function runModules($domObject , $siteID)
    {
        $query = 'SELECT m.* , sm.isEnabled FROM `Module` m INNER JOIN `Site_Module` sm ON m.id = sm.moduleID  WHERE sm.`siteID`="' . $siteID . '"';
        $modules = DB::executeQuery($query , true);
        
        foreach($modules as $module)
        {
            if($module['isEnabled'] == true)
            {   
                require_once(dirname(__FILE__) . '/../../modules/' . $module['moduleName'] . '/main.php');
                call_user_func($module['moduleName'], $domObject);
            }
        }
    }
