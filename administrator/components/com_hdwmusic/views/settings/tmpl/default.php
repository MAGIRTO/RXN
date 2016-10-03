<?php
/*
 * @version		$Id: default.php 1.0 2015-05-21 $
* @package		Joomla
* @copyright   Copyright (C) 2015-2016 Appten
* @license     GNU/GPL http://www.gnu.org/licenses/gpl-2.0.html
*/
if(!defined('DS')){
   define('DS',DIRECTORY_SEPARATOR);
}

defined('_JEXEC') or die('Restricted access');

$data   = $this->data;
$editor = JFactory::getEditor();

?>
<style>

.admintable2 { 
margin-top:90px;
}
</style>
<div id="hdwmusic">
  <form action="index.php?option=com_hdwmusic&task=settings" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
    <div style="float: left;">
    <table class="admintable1" cellpadding="5"	><tr>
    <th><font color="#2385E1">Player Settings</font></th></tr>
      <tr>
        <td class="hdwkey"><?php echo JText::_('PLAYER_BG_COLOR'); ?></td>
        <td><input type="text" name="bgcolor" value="<?php echo $data->bgcolor; ?>" /></td>
      </tr>
      <tr>
        <td class="hdwkey"><?php echo JText::_('PLAYER_BORDER_COLOR'); ?></td>
        <td><input type="text" name="bordercolor" value="<?php echo $data->bordercolor; ?>" /></td>
      </tr>
      <tr>
        <td class="hdwkey"><?php echo JText::_('OVERLAY_COLOR'); ?></td>
        <td><input type="text" name="overlaycolor" value="<?php echo $data->overlaycolor; ?>" /></td>
      </tr>
      <tr>
        <td class="hdwkey"><?php echo JText::_('OVERLAY_ALPHA'); ?></td>
        <td><input type="text" name="overlayalpha" value="<?php echo $data->overlayalpha; ?>" /></td>
      </tr>
      <tr>
        <td class="hdwkey"><?php echo JText::_('ICON_COLOR'); ?></td>
        <td><input type="text" name="iconcolor" value="<?php echo $data->iconcolor; ?>" /></td>
      </tr>
      <tr>
        <td class="hdwkey"><?php echo JText::_('SLIDER_BG_COLOR'); ?></td>
        <td><input type="text" name="sliderbgcolor" value="<?php echo $data->sliderbgcolor; ?>" /></td>
      </tr>
      <tr>
        <td class="hdwkey"><?php echo JText::_('SLIDER_COLOR'); ?></td>
        <td><input type="text" name="slidercolor" value="<?php echo $data->slidercolor; ?>" /></td>
      </tr>
      <tr>
        <td class="hdwkey"><?php echo JText::_('AUTOSTART'); ?></td>
        <td><input type="checkbox" name="autostart" value="1" <?php if($data->autostart == "1") echo 'checked="checked"'; ?> /></td>
      </tr>
      <tr>
        <td class="hdwkey"><?php echo JText::_('AUTO_PLAYLIST'); ?></td>
        <td><input type="checkbox" name="playlistautostart" value="1" <?php if($data->playlistautostart == "1") echo 'checked="checked"'; ?> /></td>
      </tr>
    </table>
    
    <table class="admintable2" cellpadding="5"><tr>
    <th><font color="#2385E1">Gallery Settings</font></th></tr>
      <tr>
        <td class="hdwkey"><?php echo JText::_('NO_OF_ROWS'); ?></td>
        <td><input type="text" name="rows" value="<?php echo $data->rows; ?>" /></td>
      </tr>
      <tr>
        <td class="hdwkey"><?php echo JText::_('NO_OF_COLS'); ?></td>
        <td><input type="text" name="cols" value="<?php echo $data->cols; ?>" /></td>
      </tr>
    </table>
   </div>
   <div style="float: left; margin-left:100px;">
    <table class="admintable3" cellpadding="5"><tr>
    <th><font color="#2385E1">Front-end Stylesheet</font></th></tr>
      <tr>
        <td><textarea name="styles"  rows="30" cols="146" style="width:400px;"><?php echo $data->styles; ?></textarea></td>
      </tr>
    </table>
    </div>
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="boxchecked" value="1">
    <input type="hidden" name="id" value="1">
    <?php echo JHTML::_( 'form.token' ); ?>
  </form>
</div>