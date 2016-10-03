<?php
/**
* @Copyright Copyright (C) 2010 VTEM . All rights reserved.
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @link     	http://www.vtem.net
**/
defined( '_JEXEC' ) or die( 'Restricted access' );
$vtemslidenoteID = 'vtemslidenoteID'.$module->id;
$width = $params->get('width',550);
$height = $params->get('height',150);
$background = $params->get('background','#FBEC78');
$color = $params->get('color','#333');
$script = $params->get('script',1);
$title = $params->get('title');
$subtitle = $params->get('subtitle');
$des = $params->get('des');
$where = $params->get('where',50);
$corner = $params->get('corner','right');
$displayCount = $params->get('displayCount', 6);
$closeImage = $params->get('closeImage');

$document = JFactory::getDocument();
if($script==1)
$document->addScript( JURI::root() . 'modules/mod_vtem_slidenote/assets/jquery-1.5.min.js' );
$document->addScript( JURI::root() . 'modules/mod_vtem_slidenote/assets/js/jquery.slidenote.js' );
$document->addStyleDeclaration('.vtemslidenote{display:none;}.vtemslidenote .note-container .header{font-size:200%; font-weight:bold; padding:5px 0;}.vtemslidenote .note-container .subtitle{padding:5px 0;}.vtemslidenote .note-container .desc{font-size:100%;}.vtemslidenote img{'.($corner =="right" ? 'float:left;margin-left:-2em;margin-top:-2em;' : 'float:right;margin-right:-2em;margin-top: -2em;').'}.vtemslidenote img:hover{ margin-top: -1.95em; }.vtemslidenote{background:'.$background.'; color:'.$color.'; padding:15px; -moz-box-shadow: -0.2em -0.2em 0.7em #333; -webkit-box-shadow: -0.2em -0.2em 0.7em #333; box-shadow: -0.2em -0.2em 0.7em #333;}.slideNoteClose{cursor: pointer;}');
require(JModuleHelper::getLayoutPath('mod_vtem_slidenote','default'));
?>