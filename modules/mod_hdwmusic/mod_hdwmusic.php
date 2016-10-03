<?php
/*
 * @version		$Id: mod_hdwmusic.php 1.0 2015-05-21 $
* @package		Joomla
* @subpackage	com_hdwmusic
* @copyright   Copyright (C) 2015-2016 Appten
* @license     GNU/GPL http://www.gnu.org/licenses/gpl-2.0.html
*/
 
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

if(!defined('DS')) { 
	define('DS',DIRECTORY_SEPARATOR); 
}

// Include the syndicate functions only once
require_once( dirname(__FILE__).DS.'helper.php' );
 
$items  = @modhdwmusicHelper::getItems( $params );
$styles = @modhdwmusicHelper::getstyles( );
require (JModuleHelper::getLayoutPath('mod_hdwmusic'));

?>