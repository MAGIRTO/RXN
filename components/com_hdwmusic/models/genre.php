<?php
/*
 * @version		$Id: genre.php 1.0 2015-05-21 $
* @package		Joomla
* @copyright   Copyright (C) 2015-2016 Appten
* @license     GNU/GPL http://www.gnu.org/licenses/gpl-2.0.html
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.model');

class HdwMusicModelGenre extends JModelLegacy {

	function __construct() {
		parent::__construct();
    }
	
	function getsettings()
    {
         $db     = JFactory::getDBO();
         $query  = "SELECT * FROM #__hdwmusic_settings";
         $db->setQuery( $query );
         $output = $db->loadObjectList();
         return($output);
	}
	
	function getgenre()
    {
         $db     = JFactory::getDBO();
         $query  = "SELECT * FROM #__hdwmusic_genre WHERE published=1 AND genre_slug=" . $db->Quote(str_replace(":", "-", JRequest::getVar('id')));
         $db->setQuery( $query );
         $output = $db->loadObjectList();
         return $output ? $output[0] : '';
	}
	
	function getalbums($genre, $rc)
    {
		 $mainframe  =  JFactory::getApplication();	
		 $limit      =  $mainframe->getUserStateFromRequest('global.list.limit', 'limit', $rc, 'int');
		 $limitstart = JRequest::getVar('limitstart', 0, '', 'int');
		 
		 // In case limit has been changed, adjust it
		 $limitstart = ($limit != 0 ? (floor($limitstart / $limit) * $limit) : 0);
 
		 $this->setState('limit', $limit);
		 $this->setState('limitstart', $limitstart);
		 
         $db     = JFactory::getDBO();
         $query  = "SELECT * FROM #__hdwmusic_albums WHERE published=1 AND album_genre=" . $db->Quote($genre);
		 if(JRequest::getCmd('char')) {
		 	$query  .=  " AND album_name LIKE '".strtoupper(JRequest::getCmd('char'))."%' ORDER BY album_name ASC";
		 }
         $db->setQuery( $query, $limitstart, $limit );
         $output = $db->loadObjectList();
         return($output);
	}
	
	function getpagination($genre)
    {
    	 jimport( 'joomla.html.pagination' );
		 $pageNav    = new JPagination($this->gettotal($genre), $this->getState('limitstart'), $this->getState('limit'));
         return($pageNav);
	}
	
	function gettotal($genre)
    {
         $db     = JFactory::getDBO();
         $query  = "SELECT COUNT(*) FROM #__hdwmusic_albums WHERE published=1 AND album_genre=" . $db->Quote($genre);
		 if(JRequest::getCmd('char')) {
		 	$query  .=  " AND album_name LIKE '".strtoupper(JRequest::getCmd('char'))."%' ORDER BY album_name ASC";
		 }

         $db->setQuery( $query );
         $output = $db->loadResult();
         return($output);
	}
	
	function updateviews()
    {
		$session = JFactory::getSession();
		$db      = JFactory::getDBO();
		$id      =  $db->Quote(str_replace(":", "-", JRequest::getVar('id')));  
		if($session->get('genre_id') != $id) {		
		 	$mainframe = JFactory::getApplication();    	 	
		 	$query     = "SELECT genre_views FROM #__hdwmusic_genre WHERE genre_slug=".$id;
    	 	$db->setQuery ( $query );
    	 	$output    = $db->loadObjectList();
		 
			if($output) {
				$count = $output[0]->genre_views + 1;
			} else {
				$count = 1;
			};
	 
		 	$query     = "UPDATE #__hdwmusic_genre SET genre_views=".$count." WHERE genre_slug=".$id;
    	 	$db->setQuery ( $query );
		 	$db->query();
		 
			$session->set('genre_id', $id);
		}
	}
	
}

?>