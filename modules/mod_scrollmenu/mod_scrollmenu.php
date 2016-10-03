<?php
/*------------------------------------------------------------------------
# mod_scrollmenu.php (module)
# ------------------------------------------------------------------------
# version		1.0.0
# author    	Top Position
# copyright 	Copyright (c) 2011 Top Position All rights reserved.
# @license 		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Website http://mastermarketingdigital.org/open-source-joomla-extensions

This modules uses  DC jQuery Vertical Accordion Menu - jQuery vertical accordion menu plugin
 * 	Copyright (c) 2011 Design Chemical
 *	Dual licensed under the MIT and GPL licenses:
 * 	http://www.opensource.org/licenses/mit-license.php
 * 	http://www.gnu.org/licenses/gpl.html
-------------------------------------------------------------------------
*/
// no direct access
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once __DIR__ . '/helper.php';

$list		= modscrollMenuHelper::getList($params);
$base		= modscrollMenuHelper::getBase($params);
$active		= modscrollMenuHelper::getActive($params);
$active_id 	= $active->id;
$path		= $base->tree;

$showAll	= $params->get('showAllChildren');
$class_sfx	= htmlspecialchars($params->get('class_sfx'));

if (count($list))
{
	require JModuleHelper::getLayoutPath('mod_scrollmenu', $params->get('layout', 'default'));
}
