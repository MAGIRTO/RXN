<?php

defined('_JEXEC') or die( 'Restricted access' );
if(!defined('DS')) define('DS', DIRECTORY_SEPARATOR);
require_once (dirname(__FILE__).DS.'helper.php');

$doc = JFactory::getDocument();
$doc->addStyleSheet(JURI::root().'modules/mod_jfancytestimonial/assets/css/jfancytestimonial.css');

$j_style = $params->get('j_style',1);

$lists = ModJFancytestimonialHelper::getInput( $params );

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
if($j_style == 1) :
$background = $params->get('background');
$padding = $params->get('padding');
$margin = $params->get('margin');
$arrowbackground = $params->get('arrowbackground');
$arrowwidth = $params->get('arrowwidth');
$arrowmargin = $params->get('arrowmargin');
$namesize = $params->get('namesize');
$nameweight = $params->get('nameweight');
$namecolor = $params->get('namecolor');
$worksize = $params->get('worksize');
$workweight = $params->get('workweight');
$workcolor = $params->get('workcolor');
$contenttextmargin = $params->get('contenttextmargin');
$contenttextstyle = $params->get('contenttextstyle');
$contenttextpadding = $params->get('contenttextpadding');
$contenttextsize = $params->get('contenttextsize');
$contenttextcolor = $params->get('contenttextcolor');
$contentimagevisible = $params->get('contentimagevisible');
$contentimageopacity = $params->get('contentimageopacity');
$contentimagewidth = $params->get('contentimagewidth');
$contentimageheight = $params->get('contentimageheight');
$contenttopbottom = $params->get('contenttopbottom');
$arrowdownbackground = $params->get('arrowdownbackground');
$arrowdownwidth = $params->get('arrowdownwidth');
$arrowdownmargin = $params->get('arrowdownmargin');



	require( JModuleHelper::getLayoutPath( 'mod_jfancytestimonial', $params->get('layout', 'default') ) );
elseif($j_style == 2) :
$background = $params->get('background');
$padding = $params->get('padding');
$margin = $params->get('margin');
$arrowbackground = $params->get('arrowbackground');
$arrowwidth = $params->get('arrowwidth');
$arrowmargin = $params->get('arrowmargin');
$namesize = $params->get('namesize');
$nameweight = $params->get('nameweight');
$namecolor = $params->get('namecolor');
$worksize = $params->get('worksize');
$workweight = $params->get('workweight');
$workcolor = $params->get('workcolor');
$contenttextmargin = $params->get('contenttextmargin');
$contenttextstyle = $params->get('contenttextstyle');
$contenttextpadding = $params->get('contenttextpadding');
$contenttextsize = $params->get('contenttextsize');
$contenttextcolor = $params->get('contenttextcolor');
$contentimagevisible = $params->get('contentimagevisible');
$contentimageopacity = $params->get('contentimageopacity');
$contentimagewidth = $params->get('contentimagewidth');
$contentimageheight = $params->get('contentimageheight');
$contenttopbottom = $params->get('contenttopbottom');
$arrowdownbackground = $params->get('arrowdownbackground');
$arrowdownwidth = $params->get('arrowdownwidth');
$arrowdownmargin = $params->get('arrowdownmargin');
$autorun = $params->get('autorun');
$doc->addStyleSheet(JURI::root().'modules/mod_jfancytestimonial/assets/css/jquery.bxslider.css');
     $doc->addScript(JURI::root().'modules/mod_jfancytestimonial/assets/js/jquery.bxslider.js');
    require( JModuleHelper::getLayoutPath( 'mod_jfancytestimonial', $params->get('layout', '2-columns-list') ) );
elseif($j_style == 3) :
$background = $params->get('background');
$padding = $params->get('padding');
$margin = $params->get('margin');
$arrowbackground = $params->get('arrowbackground');
$arrowwidth = $params->get('arrowwidth');
$arrowmargin = $params->get('arrowmargin');
$namesize = $params->get('namesize');
$nameweight = $params->get('nameweight');
$namecolor = $params->get('namecolor');
$worksize = $params->get('worksize');
$workweight = $params->get('workweight');
$workcolor = $params->get('workcolor');
$contenttextmargin = $params->get('contenttextmargin');
$contenttextstyle = $params->get('contenttextstyle');
$contenttextpadding = $params->get('contenttextpadding');
$contenttextsize = $params->get('contenttextsize');
$contenttextcolor = $params->get('contenttextcolor');
$contentimagevisible = $params->get('contentimagevisible');
$contentimageopacity = $params->get('contentimageopacity');
$contentimagewidth = $params->get('contentimagewidth');
$contentimageheight = $params->get('contentimageheight');
$autorun = $params->get('autorun');
$contenttopbottom = $params->get('contenttopbottom');
$arrowdownbackground = $params->get('arrowdownbackground');
$arrowdownwidth = $params->get('arrowdownwidth');
$arrowdownmargin = $params->get('arrowdownmargin');
$viewportshadowpx = $params->get('viewportshadowpx');
$viewportshadowcolor = $params->get('viewportshadowcolor');
$viewportborderpx = $params->get('viewportborderpx');
$viewportbordercolor = $params->get('viewportbordercolor');
$viewportbackgroundcolor = $params->get('viewportbackgroundcolor');

    $doc->addStyleSheet(JURI::root().'modules/mod_jfancytestimonial/assets/css/jquery.bxslider.css');
     $doc->addScript(JURI::root().'modules/mod_jfancytestimonial/assets/js/jquery.bxslider.js');
	require( JModuleHelper::getLayoutPath( 'mod_jfancytestimonial', $params->get('layout', 'slider_columns') ) );
	
endif;


?>
