<?php
/*
 * @version		$Id: hdwmusicalbums.php 1.0 2015-05-21 $
* @package		Joomla
* @copyright   Copyright (C) 2015-2016 Appten
* @license     GNU/GPL http://www.gnu.org/licenses/gpl-2.0.html
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

// Include library dependencies
jimport('joomla.filter.input');

class TableHdwMusicAlbums extends JTable {

	var $id             = null;
	var $album_name     = null;
	var $album_slug     = null;
	var $album_type     = null;
	var $album_thumb    = null;
	var $album_cover    = null;
	var $album_artist   = null;
	var $album_genre    = null;
	var $album_header   = null;
	var $album_footer   = null;
	var $album_views    = null;
	var $album_featured = 0;
	var $published      = 0;	

	public function __construct( $db) {
		parent::__construct('#__hdwmusic_albums', 'id', $db);
	}

	public function check() {
		return true;
	}

}

?>