<?php
/*
 * @version		$Id: hdwmusicsongs.php 1.0 2015-05-21 $
* @package		Joomla
* @copyright   Copyright (C) 2015-2016 Appten
* @license     GNU/GPL http://www.gnu.org/licenses/gpl-2.0.html
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

// Include library dependencies
jimport('joomla.filter.input');

class TableHdwMusicSongs extends JTable {

	var $id             = null;
	var $song_type      = null;
	var $song_file      = null;
	var $song_thumb     = null;
	var $song_title     = null;
	var $song_artist    = null;
	var $song_album     = null;
	var $song_lyrics    = null;
	var $song_views     = null;
	var $ordering       = 1;	
	var $published      = 0;	

	public function __construct( $db) {
		parent::__construct('#__hdwmusic_songs', 'id', $db);
	}

	public function check() {
		return true;
	}
	
}

?>