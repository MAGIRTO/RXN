<?php
 /**
 * @package Paradigm.Extensions.Modules
 * @subpackage mod_midmenuslider
 * @version $Id:
 * @author Jason Buzzeo
 * @copyright (C) 2014-2015 Paradigm Custom Solutions, LLC
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 * Mid-Menu Slider is free software. This version may have been modified pursuant
 * to the GNU/GPLv3 License, and as distributed it includes or
 * is derivative of works licensed under the GNU/GPLv3 License or
 * other free or open source software licenses.
**/

/*** set the content type header ***/
header("Content-type: text/css");

$menus = $_GET;

echo '.clearfix:after {
     visibility: hidden;
     display: block;
     font-size: 0;
     content: " ";
     clear: both;
     height: 0;
     }
.clearfix { display: inline-block; }

#midmenu'.$menus[0].' {
	position:relative;
}
';
		 
for ($i=0; $i < count($menus[1]); $i++)
{
	if(!is_null($menus[1][$i]['image']))
	{

		$n = $i + 1;
		$imagesize = getimagesize('../../../' . $menus[1][$i]['image']);
		$oAlpha = $menus[1][$i]['opacity'];
		$o = $oAlpha * .01;

	echo '#midmenu'.$menus[0].' #item'.$n.' {
		position:relative;
		float:left;
		overflow:hidden;
		height:'.$imagesize[1].'px;
		width:'.$imagesize[0].'px; 
	}
	
	#midmenu'.$menus[0].' #item'.$n.' a {
		display:block;
		position:absolute; 
		top:0; 
		left:0; 
		width:'.$imagesize[0].'px; 
		height:'.$imagesize[1].'px;
		z-index: 1;
	}
		
	#midmenu'.$menus[0].' #item'.$n.' a:link,#midmenu #item'.$n.' a:visited {
		background: url("../../../'.$menus[1][$i]["image"].'") no-repeat;
	}
		
	#midmenu'.$menus[0].' #item'.$n.' a:hover, #midmenu #item'.$n.' a:active {
		background: url("../../../'.$menus[1][$i]["imagehover"].'") no-repeat;
		opacity:'.$o.';
		filter: alpha(opacity = '.$oAlpha.');
	}
		
	#midmenu'.$menus[0].' #item'.$n.' p {
		font-size:'.$menus[1][$i]["size"].';
		margin: 10px;
		color:'.$menus[1][$i]["color"].';
	}
		
	#midmenu'.$menus[0].' .item'.$n.'hidden {
		height:'.$imagesize[1].'px;
		position:relative;
		top:'.$imagesize[1].'px;
		background:'.$menus[1][$i]["bg"].';
	}
	
	#midmenu'.$menus[0].' .item'.$n.'hidden:after {
		clear:both;
		float:none;
	}
	';
	}
	
}

?>
