<?php
/**
* @title		joombig image animation list
* @website		http://www.joombig.com
* @copyright	Copyright (C) 2014 joombig.com. All rights reserved.
* @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/
    // no direct access
    defined('_JEXEC') or die('Restricted access');
	$mosConfig_absolute_path = JPATH_SITE;
	$mosConfig_live_site = JURI :: base();
	if(substr($mosConfig_live_site, -1)=="/") { $mosConfig_live_site = substr($mosConfig_live_site, 0, -1); }

    $module_name             = basename(dirname(__FILE__));
    $module_dir              = dirname(__FILE__);
    $module_id               = $module->id;
    $document                = JFactory::getDocument();
    $style                   = $params->get('sp_style');

    if( empty($style) )
    {
        JFactory::getApplication()->enqueueMessage( 'Slider style no declared. Check joombig image animation list configuration and save again from admin panel' , 'error');
        return;
    }

    $layoutoverwritepath     = JURI::base(true) . '/templates/'.$document->template.'/html/'. $module_name. '/tmpl/'.$style;
    $document                = JFactory::getDocument();
    require_once $module_dir.'/helper.php';
    $helper = new mod_Jbimageanimationlist($params, $module_id);
    $data = (array) $helper->display();
	$enable_jQuery				= $params->get('enable_jQuery', 1);
	$width_module				= $params->get('width_module', "100%");
	$height_module 				= $params->get('height_module', "360");
	$margin_module 				= $params->get('margin_module', "0 auto");
	$style_module 				= $params->get('style_module', "1");

	$width_item 				= $params->get('width_item', '500');
	$height_item 				= $params->get('height_item', '150');
	$background_item 			= $params->get('background_item', '#fff');
	$background_item_hover 		= $params->get('background_item_hover', '#000');
	$color_border_left 			= $params->get('color_border_left', '#000');
	$color_border_left_hover 	= $params->get('color_border_left_hover', '#fff004');

	
	$color_title 				= $params->get('color_title', "#333");
	$color_intro				= $params->get('color_intro', "#666");
	$color_intro_hover			= $params->get('color_intro_hover', "#fff004");
	$color_title_hover			= $params->get('color_title_hover', "#fff");
	
	$font_size_title			= $params->get('font_size_title', "30");
	$font_size_intro			= $params->get('font_size_intro', "14");
	$font_size_title_hover		= $params->get('font_size_title_hover', "14");
	$font_size_intro_hover		= $params->get('font_size_intro_hover', "30");
	
	$open_link					= $params->get('open_link', 1);
    //$option = (array) $params->get('animation')->$style;
    if(  is_array( $helper->error() )  )
    {
        JFactory::getApplication()->enqueueMessage( implode('<br /><br />', $helper->error()) , 'error');
    } else {
        if( file_exists($layoutoverwritepath.'/view.php') )
        {
            require(JModuleHelper::getLayoutPath($module_name, $layoutoverwritepath.'/view.php') );   
        } else {
            require(JModuleHelper::getLayoutPath($module_name, $style.'/view') );   
        }

        $helper->setAssets($document, $style);
}