<?php 
 /**
 * @package Paradigm.Extensions.Modules
 * @subpackage mod_midmenuslider
 * @version $Id: 1.0.6
 * @author Jason Buzzeo
 * @copyright (C) 2014- Paradigm Custom Solutions
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 * Mid-Menu Slider is free software. This version may have been modified pursuant
 * to the GNU/GPLv3 License, and as distributed it includes or
 * is derivative of works licensed under the GNU/GPLv3 License or
 * other free or open source software licenses.
**/


$menus = $_GET;

for ($i = 0; $i < count($menus[1]); $i++)
{
	if(!is_null($menus[1][$i]['image']))
	{
		$imagesize = getimagesize('../../../' . $menus[1][$i]['image']);
		
		$height = ($menus[1][$i]["height"] > 0 ? $imagesize[1] - $menus[1][$i]["height"] : 0);
		$n = $i + 1;		
		
echo '(function ($) {
	 $(document).ready(function(){
	$("#midmenu'.$menus[0].' #item' . $n .'").mouseover(function(){
		$(".item' . $n . 'hidden").stop().animate({
			top: ' . $height . '
		}, ' . $menus[1][$i]["speed"] . ');                        
	}).mouseout(function(){
		$("#midmenu'.$menus[0].' .item' . $n . 'hidden").stop().animate({
			top: ' . $imagesize[1] . '
		}, ' . $menus[1][$i]["speed"] . ')    
	})

});
  }(jQuery));
';
	}
}
?>
