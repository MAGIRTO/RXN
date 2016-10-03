<?php
/*
 * @version		$Id: albums.php 1.0 2015-05-21 $
* @package		Joomla
* @copyright   Copyright (C) 2015-2016 Appten
* @license     GNU/GPL http://www.gnu.org/licenses/gpl-2.0.html
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.model');

class HdwMusicModelAlbums extends JModelLegacy {

	public function __construct() {
		parent::__construct();
    }
	
	public function getsettings()
    {
         $db     = JFactory::getDBO();
         $query  = "SELECT * FROM #__hdwmusic_settings";
         $db->setQuery( $query );
         $output = $db->loadObjectList();
         return($output);
	}
	
	public function getalbums($rc)
    {
		 $mainframe  =  JFactory::getApplication();
		 $limit      =  $mainframe->getUserStateFromRequest('global.list.limit', 'limit', $rc, 'int');
		 $limitstart =  JRequest::getVar('limitstart', 0, '', 'int');
		 
		 // In case limit has been changed, adjust it
		 $limitstart = ($limit != 0 ? (floor($limitstart / $limit) * $limit) : 0);
 
		 $this->setState('limit', $limit);
		 $this->setState('limitstart', $limitstart);
			 
         $db         = JFactory::getDBO();
         $query      =  "SELECT * FROM #__hdwmusic_albums WHERE published=1";
		 if(JRequest::getCmd('orderby') == 'featured') {
		 		$query .= ' AND album_featured=1';
		 }	 
		 switch(JRequest::getCmd('char')) {
		 	case 'num' :
		 		$query  .=  " AND album_name RLIKE '^[0-9]'";
				break;
			case 'all' :
				break;
			default :
		     	$query  .=  " AND album_name LIKE '".JRequest::getCmd('char')."%'";
		 }
		 switch(JRequest::getCmd('orderby')) {
		 	case 'latest' :
		 		$query .= ' ORDER BY id DESC';
				break;
			case 'popular' :
				$query .= ' ORDER BY album_views DESC';
				break;
			case 'random' :
				$query .= ' ORDER BY RAND()';
				break;
		 }
         $db->setQuery( $query, $limitstart, $limit );
         $output = $db->loadObjectList();
         return($output);
	}
	
	public function getpagination()
    {
    	 jimport( 'joomla.html.pagination' );
		 $pageNav    = new JPagination($this->gettotal(), $this->getState('limitstart'), $this->getState('limit'));
         return($pageNav);
	}
	
	public function gettotal()
    {
         $db        = JFactory::getDBO();
         $query     = "SELECT COUNT(*) FROM #__hdwmusic_albums WHERE published=1";
		 if(JRequest::getCmd('orderby') == 'featured') {
		 		$query .= ' AND album_featured=1';
		 }
         switch(JRequest::getCmd('char')) {
		 	case 'num' :
		 		$query  .=  " AND album_name RLIKE '^[0-9]'";
				break;
			case 'all' :
				break;
			default :
		     	$query  .=  " AND album_name LIKE '".JRequest::getCmd('char')."%'";
		 }		 
         $db->setQuery( $query );
         $output = $db->loadResult();
         return($output);
	}
	
}

?>