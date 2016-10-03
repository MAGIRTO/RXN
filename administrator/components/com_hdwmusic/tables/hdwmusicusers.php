<?php
/*
 * @version		$Id: hdwmusicusers.php 1.0 2015-05-21 $
* @package		Joomla
* @copyright   Copyright (C) 2015-2016 Appten
* @license     GNU/GPL http://www.gnu.org/licenses/gpl-2.0.html
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

// Include library dependencies
jimport('joomla.filter.input');

class TableHdwMusicUsers extends JTable {

	var $id         = null;
	var $user_name  = null;
	var $user_songs = null;

	public function __construct( $db) {
		parent::__construct('#__hdwmusic_users', 'id', $db);
	}

	public function check() {
		return true;
	}
	
}

?>