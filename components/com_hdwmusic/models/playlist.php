<?php
/*
 * @version		$Id: playlist.php 1.0 2015-05-21 $
* @package		Joomla
* @copyright   Copyright (C) 2015-2016 Appten
* @license     GNU/GPL http://www.gnu.org/licenses/gpl-2.0.html
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.model');

class HdwMusicModelPlaylist extends JModelLegacy {

	public function __construct() {
		parent::__construct();
    }
	
	public function getdata()
    {
         $db     = JFactory::getDBO();
		 
		 if(JRequest::getVar('id') == 'userdata') {
		 	$ids    = $this->getuserdata();
         	$query  = "SELECT id,song_file,song_lyrics FROM #__hdwmusic_songs WHERE published=1 AND id IN ( $ids )";
		 } else {
         	$query  = 'SELECT id,song_file,song_lyrics FROM #__hdwmusic_songs WHERE published = 1';
		 	$query .= ' AND song_album=' . $db->Quote(JRequest::getVar('id'));
		 }
		 
         $db->setQuery( $query );
         $output = $db->loadObjectList();

         $this->createXml($output);
	}
	
	public function getuserdata()
    {
        $db   = JFactory::getDBO();		 
		$user = JFactory::getUser();		
   	 	
   	 	$query = "SELECT user_songs FROM #__hdwmusic_users WHERE user_name=".$db->Quote($user->username);
		$db->setQuery($query);
        $output = $db->loadObjectList();
		
		return($output[0]->user_songs);
	}
	
	public function createXml($input)
	{	
		$data  = $input;		
		$count = count($data);
		$br    = "\n";
		
		ob_clean();
		header("content-type:text/xml;charset=utf-8");
		echo '<?xml version="1.0" encoding="utf-8"?>'.$br;
		echo '<playlist>'.$br.$br;

		for ($i=0, $n=$count; $i < $n; $i++) {
			$item = $data[$i];
			echo '<media>'.$br;
			echo '<id>'.$item->id.'</id>'.$br;
			echo '<file>'.$item->song_file.'</file>'.$br;
			echo '<lyrics><![CDATA['.$item->song_lyrics.']]></lyrics>'.$br;
			echo '</media>'.$br;
		}

		echo '</playlist>';
		exit();		
	}
	
}

?>