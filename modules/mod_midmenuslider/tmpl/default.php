<?php

 /**
 * @package Paradigm.Extensions.Modules
 * @subpackage mod_midmenuslider
 * @version $Id:
 * @author Jason Buzzeo
 * @copyright (C) 2014-2015 Paradigm Custom Solutions
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 * Mid-Menu Slider is free software. This version may have been modified pursuant
 * to the GNU/GPLv3 License, and as distributed it includes or
 * is derivative of works licensed under the GNU/GPLv3 License or
 * other free or open source software licenses.
**/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' ); ?>

<?php 
$document = JFactory::getDocument();

$document->addStyleSheet(JURI::base() . 'modules/mod_midmenuslider/css/midmenuslider.css.php?' . http_build_query($menus));

$document->addScript(JURI::base() . 'modules/mod_midmenuslider/js/jquery-1.11.0.min.js');
$document->addScript(JURI::base() . 'modules/mod_midmenuslider/js/midmenuslider.js.php?' . http_build_query($menus));

echo '<div id="midmenu'.$menus[0].'" class="clearfix pcs-midmenu">';

 for ($i = 0; $i < count($menus[1]); $i++)
{
	$n = $i + 1;
	
	if(!is_null($menus[1][$i]['image']))
	{
				
		echo '	<div id="item' . $n . '">
			<a href="'. $menus[1][$i]["link"] . '"></a>
			<div class="item'.$n.'hidden">' .
			$menus[1][$i]["text"] . '
			</div></div>';
	}
}



echo '</div>';
?>
	
