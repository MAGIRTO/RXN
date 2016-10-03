<?php
/*
 * @version		$Id: user.php 1.0 2015-05-21 $
* @package		Joomla
* @copyright   Copyright (C) 2015-2016 Appten
* @license     GNU/GPL http://www.gnu.org/licenses/gpl-2.0.html
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.model');

class HdwMusicModelUser extends JModelLegacy {

	public function __construct() {
		parent::__construct();
    }
	
	public function getsettings()
    {
    	 $db   = JFactory::getDBO();	
         $query  = "SELECT * FROM #__hdwmusic_settings";
         $db->setQuery( $query );
         $output = $db->loadObjectList();
         return($output);
	}
	
	public function getsongs()
    {
		 $ids    = $this->getuserdata();
         $db     = JFactory::getDBO();
         if ($ids != '')
         {
         	$query  = "SELECT * FROM #__hdwmusic_songs WHERE published=1  AND id IN ( $ids )";        
	         $db->setQuery( $query );
	         $output = $db->loadObjectList();
         }  else {
         	$output = array();
         }
         
         return($output);
	}
	
	public function getuserdata()
    {
        $db   = JFactory::getDBO();		 
		$user = JFactory::getUser();		
   	 	
   	 	$query = "SELECT user_songs FROM #__hdwmusic_users WHERE user_name=".$db->Quote($user->username);
		$db->setQuery($query);
        $output = $db->loadObjectList();
		
		return $output ? $output[0]->user_songs : '';
	}
	
	public function add()
    {
		$db   = JFactory::getDBO();		 
		$user = JFactory::getUser();		
   	 	
   	 	$query = "SELECT id,user_songs FROM #__hdwmusic_users WHERE user_name=".$db->Quote($user->username);
		$db->setQuery($query);
        $result = $db->loadObjectList();
		
		if($result[0]->id) {
			$songs = $result[0]->user_songs . ',' . JRequest::getCmd('id');
			$query = "UPDATE #__hdwmusic_users SET user_songs=".$db->Quote(trim($songs, ','))." WHERE user_name=".$db->Quote($user->username);
    	 	$db->setQuery ( $query );
		 	$db->query();			
		} else {
			$row  = JTable::getInstance('hdwmusicusers', 'Table');
	  		$cid  = JRequest::getVar( 'cid', array(0), '', 'array' );
      		$id   = $cid[0];
      		$row->load($id);
			
			$row->user_name  = $user->username;
			$row->user_songs = JRequest::getCmd('id');
	  		$row->store();
		}
	}
	
	public function delete()
    {
		$user = JFactory::getUser();	
        $db   = JFactory::getDBO();
        
		$query = "SELECT id,user_songs FROM #__hdwmusic_users WHERE user_name=".$db->Quote($user->username);
		$db->setQuery($query);
        $result = $db->loadObjectList();	
		
		if($result[0]->id) {
			$songs = str_replace(JRequest::getCmd('id'), '', $result[0]->user_songs);
			$songs = str_replace(',,', ',', $songs);
			$query = "UPDATE #__hdwmusic_users SET user_songs=".$db->Quote(trim($songs, ','))." WHERE user_name=".$db->Quote($user->username);
    	 	$db->setQuery ( $query );
		 	$db->query();			
		}
	}
	
}

?>