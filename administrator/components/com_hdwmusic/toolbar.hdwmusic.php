<?php
/*
 * @version		$Id: toolbar.hdwmusic.php 1.0 2015-05-21 $
* @package		Joomla
* @copyright   Copyright (C) 2015-2016 Appten
* @license     GNU/GPL http://www.gnu.org/licenses/gpl-2.0.html
*/
 
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
require_once( JApplicationHelper::getPath( 'toolbar_html' ) );
switch($task) {
	case 'artists':
		TOOLBAR_HDWMUSIC::_ARTISTS();
		break;
	case 'addartists' :
	case 'editartists':
		TOOLBAR_HDWMUSIC::_ARTISTSAE();
		break;
	case 'albums':
		TOOLBAR_HDWMUSIC::_ALBUMS();
		break;
	case 'addalbums' :
	case 'editalbums':
		TOOLBAR_HDWMUSIC::_ALBUMSAE();
		break;
	case 'genre':
		TOOLBAR_HDWMUSIC::_GENRE();
		break;
	case 'addgenre'  :
	case 'editgenre' :
		TOOLBAR_HDWMUSIC::_GENREAE();
		break;
	case 'songs':
		TOOLBAR_HDWMUSIC::_SONGS();
		break;
	case 'addsongs' :
	case 'editsongs':
		TOOLBAR_HDWMUSIC::_SONGSAE();
		break;
	case 'settings'    :
	case 'savesettings':
		TOOLBAR_HDWMUSIC::_SETTINGS();
		break;
	default :
		TOOLBAR_HDWMUSIC::_DEFAULT();
}

?>