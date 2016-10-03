<?php
/*
 * @version		$Id: songs.php 1.0 2015-05-21 $
* @package		Joomla
* @copyright   Copyright (C) 2015-2016 Appten
* @license     GNU/GPL http://www.gnu.org/licenses/gpl-2.0.html
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.model');

class HdwMusicModelSongs extends JModelLegacy {

	public function __construct() {
		parent::__construct();
    }
	
	public function updateviews()
    {
	 	$mainframe = JFactory::getApplication();	
		$db        = JFactory::getDBO();		 
     	$id        = $db->Quote(JRequest::getCmd('id'));   	 	
	 	$query     = "SELECT song_views FROM #__hdwmusic_songs WHERE id=".$id;
   	 	$db->setQuery ( $query );
   	 	$output    = $db->loadObjectList();
		 
		if($output) {
			$count = $output[0]->song_views + 1;
		} else {
			$count = 1;
		};

	 	$query     = "UPDATE #__hdwmusic_songs SET song_views=".$count." WHERE id=".$id;
   	 	$db->setQuery ( $query );
	 	$db->query();
	}
	
}

?>