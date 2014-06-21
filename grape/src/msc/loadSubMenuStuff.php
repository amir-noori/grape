<?php
	
	
	switch($_POST['menu'])
	{
		case('newSite'):
		{
			require_once(dirname(__FILE__) . '/../sites/create/createNewSite.php');
			createNewSitePanel();
			break;
		}
		case('manageSites'):
		{
			require_once(dirname(__FILE__) . '/../sites/manage/showSites.php');
			showSites();
			break;
		}
		case('siteModules'):
		{
			require_once(dirname(__FILE__) . '/../module/showSiteModules.php');
			showSiteModules();
			break;
		}
	}
