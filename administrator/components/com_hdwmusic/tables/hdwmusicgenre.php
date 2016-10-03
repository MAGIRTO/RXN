<?php
/*
 * @version		$Id: hdwmusicgenre.php 1.0 2015-05-21 $
* @package		Joomla
* @copyright   Copyright (C) 2015-2016 Appten
* @license     GNU/GPL http://www.gnu.org/licenses/gpl-2.0.html
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

// Include library dependencies
jimport('joomla.filter.input');

class TableHdwMusicGenre extends JTable {

	var $id           = null;
	var $genre_name   = null;
	var $genre_slug   = null;
	var $genre_type   = null;
	var $genre_thumb  = null;
	var $genre_header = null;
	var $genre_footer = null;
	var $genre_views  = null;
	var $published    = 0;	

	public function __construct( $db) {
		parent::__construct('#__hdwmusic_genre', 'id', $db);
	}

	public function check() {
		return true;
	}
	
}

?>