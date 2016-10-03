<?php
/*
 * @version		$Id: hdwmusic.php 1.0 2015-05-21 $
* @package		Joomla
* @copyright   Copyright (C) 2015-2016 Appten
* @license     GNU/GPL http://www.gnu.org/licenses/gpl-2.0.html
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

if(!defined('DS')) { 
	define('DS',DIRECTORY_SEPARATOR); 
}

// Require the base controller
require_once JPATH_COMPONENT.DS.'controller.php';

// Initialize the controller
$controller = new HdwMusicController( );

// Perform the Request task
$controller->execute( JRequest::getCmd('view'));
$controller->redirect();

?>