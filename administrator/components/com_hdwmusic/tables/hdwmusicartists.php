<?php
/*
 * @version		$Id: hdwmusicartists.php 1.0 2015-05-21 $
* @package		Joomla
* @copyright   Copyright (C) 2015-2016 Appten
* @license     GNU/GPL http://www.gnu.org/licenses/gpl-2.0.html
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

// Include library dependencies
jimport('joomla.filter.input');

class TableHdwMusicArtists extends JTable {

	var $id            = null;
	var $artist_name   = null;
	var $artist_slug   = null;
	var $artist_type   = null;
	var $artist_thumb  = null;
	var $artist_header = null;
	var $artist_footer = null;
	var $artist_views  = null;
	var $published     = 0;	
	
	public function __construct( $db) {
		parent::__construct('#__hdwmusic_artists', 'id', $db);
	}

	public function check() {
		return true;
	}
	
}

?>