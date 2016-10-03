<?php
 /**
 * @package Paradigm.Extensions.Modules
 * @subpackage MidMenuSlider
 * @version $Id:
 * @author Jason Buzzeo
 * @copyright (C) 2014-2015 Paradigm Custom Solutions
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 * Mid-Menu Slider is free software. This version may have been modified pursuant
 * to the GNU/GPLv3 License, and as distributed it includes or
 * is derivative of works licensed under the GNU/GPLv3 License or
 * other free or open source software licenses.
**/

/**
 * MidMenuSlider Entry Point
**/
 
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
// Include the syndicate functions only once
require_once( dirname(__FILE__).'/helper.php' );

$menus = array($module->id);
		
$menus[] = modMidMenuHelper::GetMenus($params);


require( JModuleHelper::getLayoutPath( 'mod_midmenuslider' ) );
?>
