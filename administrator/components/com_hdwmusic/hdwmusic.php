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

// Define constants for all pages
define( 'UPLOAD_DIR_GENRE', 'media'.DS.'com_hdwmusic'.DS.'genres'.DS);
define( 'HDWMUSIC_UPLOAD_BASE_GENRE', JPATH_ROOT.DS.UPLOAD_DIR_GENRE );
define( 'HDWMUSIC_UPLOAD_BASEURL_GENRE', JURI::root().str_replace( DS, '/', UPLOAD_DIR_GENRE ));

define( 'UPLOAD_DIR_ARTIST', 'media'.DS.'com_hdwmusic'.DS.'artists'.DS);
define( 'HDWMUSIC_UPLOAD_BASE_ARTIST', JPATH_ROOT.DS.UPLOAD_DIR_ARTIST );
define( 'HDWMUSIC_UPLOAD_BASEURL_ARTIST', JURI::root().str_replace( DS, '/', UPLOAD_DIR_ARTIST ));

define( 'UPLOAD_DIR_ALBUM', 'media'.DS.'com_hdwmusic'.DS.'albums'.DS);
define( 'HDWMUSIC_UPLOAD_BASE_ALBUM', JPATH_ROOT.DS.UPLOAD_DIR_ALBUM );
define( 'HDWMUSIC_UPLOAD_BASEURL_ALBUM', JURI::root().str_replace( DS, '/', UPLOAD_DIR_ALBUM ));

define( 'UPLOAD_DIR_SONG', 'media'.DS.'com_hdwmusic'.DS.'songs'.DS);
define( 'HDWMUSIC_UPLOAD_BASE_SONG', JPATH_ROOT.DS.UPLOAD_DIR_SONG );
define( 'HDWMUSIC_UPLOAD_BASEURL_SONG', JURI::root().str_replace( DS, '/', UPLOAD_DIR_SONG ));

// CSS
$document = JFactory::getDocument();
$document->addStyleSheet(JURI::base().'components/com_hdwmusic/css/hdwmusic.css');

// Require the base controller
require_once JPATH_COMPONENT.DS.'controller.php';

// Initialize the controller
$controller = new HdwMusicController( );

// Perform the Request task
$controller->execute( JRequest::getCmd('task'));
$controller->redirect();

?>