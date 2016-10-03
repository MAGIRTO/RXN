<?php 
/*
 * @version		$Id: default.php 1.0 2015-05-21 $
* @package		Joomla
* @copyright   Copyright (C) 2015-2016 Appten
* @license     GNU/GPL http://www.gnu.org/licenses/gpl-2.0.html
*/

defined('_JEXEC') or die('Restricted access');

$chars    = array('All', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '0-9');
$style    = '';
$settings = $this->settings;
$albums   = $this->albums;
$link     = 'index.php?option=com_hdwmusic&view=album&id=';
$row      = 0;
$column   = 0;

$qs  = '';
$qs .= JRequest::getVar('show_letter_bar') ? '&show_letter_bar=' . JRequest::getVar('show_letter_bar') : '';
$qs .= JRequest::getVar('Itemid') ? '&Itemid=' . JRequest::getVar('Itemid') : '';

?>
<style type="text/css">
<?php echo $settings[0]->styles;
?>
</style>
<?php if ($this->params->get( 'show_page_title', 1)) : ?>
<div class="componentheading<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>"> <?php echo $this->escape($this->params->get('page_title')); ?> </div>
<?php endif; ?>
<div id="hdw_letterbar<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>" <?php if (JRequest::getVar('show_letter_bar') == 0) echo 'style="display:none;"'; ?> >
  <?php 
	for ($i=0, $n=count($chars); $i < $n; $i++) { 
		if($chars[$i] == strtoupper(JRequest::getCmd('char'))) {
			$style = 'class="active"';
		} else {
			$style = '';
		}
		$char = ($chars[$i] == '0-9') ? 'num' : strtolower($chars[$i]);
  ?>
  <a href="<?php echo JRoute::_('index.php?option=com_hdwmusic&view=album&char='.$char.$qs); ?>" <?php echo $style; ?>><?php echo $chars[$i]; ?></a>
  <?php } ?>
</div>
<div id="hdw_gallery<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
  <?php 
  	if(!count($albums)) echo JText::_('ITEM_NOT_FOUND');
  	for ($i=0, $n=count($albums); $i < $n; $i++) { 
		$clear = '';  
  		if($column >= $settings[0]->cols) {
			$clear  = '<div style="clear:both;"></div>';
			$column = 0;
			$row++;		
		}
		$column++;
		echo $clear;
  ?>
  <div class="hdw_thumb"> <a href="<?php echo JRoute::_($link.$albums[$i]->album_slug.$qs); ?>">
    <h3><?php echo $albums[$i]->album_name; ?></h3>
    <img src="<?php echo $albums[$i]->album_thumb; ?>" width="218" height="150" title="<?php echo 'Click to View : '.$albums[$i]->album_name; ?>" border="0" onmouseover="this.style.opacity=0.7" onmouseout="this.style.opacity=1"/> <span class="views"><strong>views : </strong><?php echo $albums[$i]->album_views; ?></span> </a> </div>
  <?php } ?>
</div>
<div style="clear:both"></div>
<div id="hdw_pagination<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>"><?php echo $this->pagination->getPagesLinks(); ?></div>