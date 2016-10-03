<?php 
/*
 * @version		$Id: default.php 1.0 2015-05-21 $
 * @package		Joomla
 * @subpackage	com_hdwmusic
 * @copyright  	Copyright (C) 2015-2016 Appten
 * @license    	GNU/GPL http://www.gnu.org/licenses/gpl-2.0.html
*/

defined('_JEXEC') or die('Restricted access'); 

$link    = 'index.php?option=com_hdwmusic&view=album';
$gallery = $items['data'];
$more    = true;
$count   = $items['columns'] * $items['rows'];
if(count($gallery) < $count) {
	$more  = false;
	$count = count($gallery);
}
$row     = 0;
$column  = 0;

?>
<style type="text/css">
<?php echo $styles; ?>
</style>
<?php 
  	if(!count($gallery)) echo JText::_('ITEM_NOT_FOUND');
  	for ($i=0, $n=$count; $i < $n; $i++) { 
		$clear = '';  
  		if($column >= $items['columns']) {
			$clear  = '<div style="clear:both;"></div>';
			$column = 0;
			$row++;		
		}
		$column++;
		echo $clear;
  ?>
<?php echo $clear; ?>
<div class="mod_hdwmusic">
  <a href="<?php echo JRoute::_($link.'&id='.$gallery[$i]->album_slug); ?>">
  <img src="<?php echo $gallery[$i]->album_thumb; ?>" width="75" height="60" title="<?php echo JText::_('CLICK_TO_VIEW').$gallery[$i]->album_name; ?>" border="0" />
  <span><label class="album"><strong><?php echo $gallery[$i]->album_name; ?></strong></label>
  	<label class="artist"><strong><?php echo JText::_('ARTIST'); ?></strong><?php echo $gallery[$i]->album_artist; ?></label>
  	<label class="views"><strong><?php echo JText::_('VIEWS'); ?></strong><?php echo $gallery[$i]->album_views; ?></label>
 </span>
 </a>
</div>
<?php } ?>
<?php if($more == true) { ?>
<div class="hdwmore"><a href="<?php echo JRoute::_($link.'&orderby='.$items['type']); ?>"><?php echo JText::_('MORE'); ?></a></div>
<?php } ?>