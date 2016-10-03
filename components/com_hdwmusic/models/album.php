<?php
/*
 * @version		$Id: album.php 1.0 2015-05-21 $
* @package		Joomla
* @copyright   Copyright (C) 2015-2016 Appten
* @license     GNU/GPL http://www.gnu.org/licenses/gpl-2.0.html
*/

// no direct access
if(!defined('DS')){
   define('DS',DIRECTORY_SEPARATOR);
}
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.model');

class HdwMusicModelAlbum extends JModelLegacy {

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
	
	public function getalbum()
    {
         $db     = JFactory::getDBO();
         $query  = "SELECT * FROM #__hdwmusic_albums WHERE published=1 AND album_slug=" . $db->Quote(str_replace(":", "-", JRequest::getVar('id')));
         $db->setQuery( $query );
         $output = $db->loadObjectList();
         return $output ? $output[0] : '';
	}
	
	public function getsongs($album)
    {
         $db     = JFactory::getDBO();
         $query  = "SELECT * FROM #__hdwmusic_songs WHERE published=1 AND song_album=" . $db->Quote($album);
         $db->setQuery( $query );
         $output = $db->loadObjectList();
         return($output);
	}
	
	public function getuserdata()
    {
        $db   = JFactory::getDBO();		 
		$user = JFactory::getUser();		
   	 	
		if($user->username) {
   	 		$query = "SELECT user_songs FROM #__hdwmusic_users WHERE user_name=".$db->Quote($user->username);
			$db->setQuery($query);
        	$output = $db->loadObjectList();
			return($output[0]);
		}
	}
	
	public function updateviews()
    {
		$session = JFactory::getSession();
		$db      = JFactory::getDBO();
		$id      =  $db->Quote(str_replace(":", "-", JRequest::getVar('id')));  
		if($session->get('album_id') != $id) {		
		 	$mainframe = JFactory::getApplication();	     	    
		 	$query     = "SELECT album_views FROM #__hdwmusic_albums WHERE album_slug=".$id;
    	 	$db->setQuery ( $query );
    	 	$output    = $db->loadObjectList();
		 
			if($output) {
				$count = $output[0]->album_views + 1;
			} else {
				$count = 1;
			};
	 
		 	$query     = "UPDATE #__hdwmusic_albums SET album_views=".$count." WHERE album_slug=".$id;
    	 	$db->setQuery ( $query );
		 	$db->execute();
		 
		 	$session->set('album_id', $id);
		}
	}
	
}

?>