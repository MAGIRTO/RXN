<?php
/*-------------------------------------------------------------------------------
# mod_galleryaholic - GalleryAholic for Joomla 3.x v1.5.2-PRO
# -------------------------------------------------------------------------------
# author    GraphicAholic
# copyright Copyright (C) 2011-2015 GraphicAholic.com. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://www.graphicaholic.com
--------------------------------------------------------------------------------*/
// No direct access
defined('_JEXEC') or die('Restricted access');
defined('DS') or define('DS', DIRECTORY_SEPARATOR);
JHtml::_('bootstrap.framework');
// Import the file / foldersystem
jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');
$LiveSite 	= JURI::base();
$document =& JFactory::getDocument();
$modbase = JURI::base(true).'/modules/mod_galleryaholic/';
$document->setMetaData( 'viewport', 'width=device-width, initial-scale=1' );
$document->addScript ($modbase.'js/blocksit.min.js');
$document->addStyleSheet($modbase.'css/galleryaholic.css');
$imageFeed			= $params->get('imageFeed', 1);
$lightboxScript 	= $params->get('lightboxScript', '1');
$moduleID 	 		= $module->id;
$moduleTitle 	 	= $module->title;
if ($lightboxScript == "1") {
	$document->addScript ($modbase.'js/jquery.fancybox.js');
	$document->addStyleSheet($modbase.'css/jquery.fancybox.css');
}
if ($imageFeed == "4") {
require_once (dirname(__FILE__).DS.'helper.php');
$list = modGalleryAholicHelper::getimgList($params, $moduleID);
require(JModuleHelper::getLayoutPath('mod_galleryaholic'));
}
else {
require JModuleHelper::getLayoutPath('mod_galleryaholic','default',$params);
}
if ($imageFeed == "5") {
require_once dirname(__FILE__).'/helpers/helper.php';
$cacheparams->cachemode = 'id';
$cacheparams->modeparams = $cacheid;
$list = GalleryAholicHelper::getList($params, $cacheparams);
require JModuleHelper::getLayoutPath('mod_galleryaholic', $params->get('layout', 'default'));
}
if ($imageFeed == "6") {
require_once dirname(__FILE__).'/helpers/jhelpers.php';
$param = modGAprofileHelper::render($params);
}
?>