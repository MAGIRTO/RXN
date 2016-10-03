<?php
 /**
 * @package Paradigm.Extensions.MidMenu
 * @subpackage Modules
 * @version $Id:
 * @author Jason Buzzeo
 * @copyright (C) 2014- Paradigm Custom Solutions
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 * mod_midMenuSlider is free software. This version may have been modified pursuant
 * to the GNU/GPLv3 License, and as distributed it includes or
 * is derivative of works licensed under the GNU/GPLv3 License or
 * other free or open source software licenses.
**/

/**
 * Helper class for MidMenuSlider module
 * 
**/
 
class modMidMenuHelper
{
    /**
     * Load all of the Module Parameters into a multi-dimensional array
     * to make it easier to iterate over later
     *
     * @param array $params An object containing the module parameters
     * @access public
     */    
	public static function GetMenus($params)
	{

		
		$item1 = array();
		$item2 = array();
		$item3 = array();
		$item4 = array();
		
		$item1['image'] = $params ->get('image1');
		if (!is_null($params ->get('imageHover1')))
			$item1['imagehover'] = $params ->get('imageHover1');
		else
			$item1['imagehover'] = $params ->get('image1');
		
		
		$text1 =  $params ->get('text1');
		$item1['text'] = (substr($text1, 0, 2) != '<p' ? '<p>' . $text1 . '</p>' : $text1);
		
		$item1['color'] = $params ->get('textColor1'); 
		$item1['size'] = $params ->get('textSize1');
		
		$link1 = JRoute::_('index.php?Itemid=' . $params ->get('link1'));
		$item1['link'] = $link1;
		
		$item1['bg'] = $params ->get('bgColor1');
		$item1['opacity'] = $params ->get('opacity1');
		$item1['height'] = $params ->get('sliderHeight1');
		$item1['speed'] = $params ->get('speed1');
		
		
		$item2['image'] = $params ->get('image2');
		if (!is_null($params ->get('imageHover2')))
			$item2['imagehover'] = $params ->get('imageHover2');
		else
			$item2['imagehover'] = $item2['image'];
		
		$text2 =  $params ->get('text2');
		$item2['text'] = (substr($text2, 0, 2) != '<p' ? '<p>' . $text2 . '</p>' : $text2);
		
		$item2['color'] = $params ->get('textColor2'); 
		$item2['size'] = $params ->get('textSize2');
		$link2 = JRoute::_('index.php?Itemid=' . $params ->get('link2'));
		$item2['link'] = $link2;
		$item2['bg'] = $params ->get('bgColor2');
		$item2['opacity'] = $params ->get('opacity2');
		$item2['height'] = $params ->get('sliderHeight2');
		$item2['speed'] = $params ->get('speed2');
		
		$item3['image'] = $params ->get('image3');
		if (!is_null($params ->get('imageHover3')))
			$item3['imagehover'] = $params ->get('imageHover3');
		else
			$item3['imagehover'] = $item3['image'];
		
		$text3 =  $params ->get('text3');
		$item3['text'] = (substr($text3, 0, 2) != '<p' ? '<p>' . $text3 . '</p>' : $text3);
		
		$item3['color'] = $params ->get('textColor3'); 
		$item3['size'] = $params ->get('textSize3');
		$link3 = JRoute::_('index.php?Itemid=' . $params ->get('link3'));
		$item3['link'] = $link3;
		$item3['bg'] = $params ->get('bgColor3');
		$item3['opacity'] = $params ->get('opacity3');
		$item3['height'] = $params ->get('sliderHeight3');
		$item3['speed'] = $params ->get('speed3');
		
		$item4['image'] = $params ->get('image4');
		if (!is_null($params ->get('imageHover4')))
			$item4['imagehover'] = $params ->get('imageHover4');
		else
			$item4['imagehover'] = $item4['image'];
		
		$text4 =  $params ->get('text4');
		$item4['text'] = (substr($text4, 0, 2) != '<p' ? '<p>' . $text4 . '</p>' : $text4);
		
		$item4['color'] = $params ->get('textColor4'); 
		$item4['size'] = $params ->get('textSize4');
		$link4 = JRoute::_('index.php?Itemid=' . $params ->get('link4'));
		$item4['link'] = $link4;
		$item4['bg'] = $params ->get('bgColor4');
		$item4['opacity'] = $params ->get('opacity4');
		$item4['height'] = $params ->get('sliderHeight4');
		$item4['speed'] = $params ->get('speed4');

		$parameters = array($item1, $item2, $item3, $item4);
		
		return $parameters;
	}
}
?>
