<?php
/*
 * @version		$Id: script.hdwmusic.php 1.0 2015-05-21 $
* @package		Joomla
* @copyright   Copyright (C) 2015-2016 Appten
* @license     GNU/GPL http://www.gnu.org/licenses/gpl-2.0.html
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

class Com_HdwMusicInstallerScript {

function postflight($type, $parent) {
	define('HDW_MUSIC_INSTALL_HACK', 1);
	require_once('install.hdwmusic.php');
}
	
}

?>