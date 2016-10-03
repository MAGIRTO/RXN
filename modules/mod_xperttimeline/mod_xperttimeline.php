<?php

/**
 * @package Xpert Timeline
 * @version 1.2
 * @author ThemeXpert http://www.themexpert.com
 * @copyright Copyright (C) 2010 - 2014 ThemeXpert
 * @license http://www.gnu.org/licenses/gpl-3.0.html GNU/GPLv3 only
 *
 */

// no direct access
defined('_JEXEC') or die;


//Stylesheet Load
$doc = JFactory::getDocument();
$doc->addStyleSheet('modules/mod_xperttimeline/css/timeline.css');
$doc->addStyleSheet('modules/mod_xperttimeline/css/xperttimeline.css');


//Parameters
$timeline_height = $params->get('timeline_height');
$timeline_source = $params->get('timeline_source');




if( empty($timeline_height) ) 
{
	echo 'Please input timeline height';
	return;
}

if( empty($timeline_source) ) 
{
	echo 'Please input timeline source URL';
	return;
}

if ( !defined('TIMELINE') )
{	
	
//jQuery Script for CountDown
$timeline_file = JUri::root(true) . '/modules/mod_xperttimeline/js/timeline.js';
$story_file = JUri::root(true) . '/modules/mod_xperttimeline/js/storyjs-embed.js';


// Add Plugin JS and Trigger
$doc->addScript( $timeline_file );
$doc->addScript( $story_file );


$js = "jQuery(document).ready(function($){


    createStoryJS({
        type:       'timeline',
        width:      '100%',
        height:     '$timeline_height',
        source:     '$timeline_source',
        embed_id:   'xpert-timeline'  
    });

 				
 			});";
	

	$doc->addScriptDeclaration($js);
	
	define('TIMELINE', 1);
}



require JModuleHelper::getLayoutPath('mod_xperttimeline', $params->get('layout', 'default'));