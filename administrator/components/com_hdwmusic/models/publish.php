<?php
/*
 * @version		$Id: publish.php 1.0 2015-05-21 $
* @package		Joomla
* @copyright   Copyright (C) 2015-2016 Appten
* @license     GNU/GPL http://www.gnu.org/licenses/gpl-2.0.html
*/
//No direct acesss
defined('_JEXEC') or die();

// Import Joomla! libraries
jimport('joomla.application.component.model');

class HdwMusicModelpublish extends JModelLegacy {

	public function publish($task)
    {
		$mainframe = JFactory::getApplication();
		$cid       = JRequest::getVar( 'cid', array(), '', 'array' );
        $publish   = ( $task == 'publish') ? 1 : 0;
        $task      = JRequest::getvar('task','','get','var');

        switch($task) {
			case "songs" :
            	$tblname ="hdwmusicsongs";
               	$taskname="songs";
				break;
			case "artists" :
            	$tblname ="hdwmusicartists";
               	$taskname="artists";
				break;
			case "albums" :
            	$tblname ="hdwmusicalbums";
               	$taskname="albums";
				break;
			case "genre" :
            	$tblname ="hdwmusicgenre";
               	$taskname="genre";
				break;
      	}
			
        $reviewTable = JTable::getInstance($tblname, 'Table');
        $reviewTable->publish($cid, $publish);
        $mainframe->redirect( 'index.php?option=com_hdwmusic&task='.$taskname);
    }
    
}

?>