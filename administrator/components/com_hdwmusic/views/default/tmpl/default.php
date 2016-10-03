<?php
/*
 * @version		$Id: default.php 1.0 2015-05-21 $
* @package		Joomla
* @copyright   Copyright (C) 2015-2016 Appten
* @license     GNU/GPL http://www.gnu.org/licenses/gpl-2.0.html
*/

defined('_JEXEC') or die('Restricted access');

?>
<style>
.siva{
background: #FFD;
border: 1px solid #e7e7e7;
color: #333;

}
</style>
<div style="background-color:#fff; padding:50px;">
  <div style="float:left;width:60%"> <?php echo $this->loadTemplate('left'); ?>
    <div class="clr"></div>
  </div>
  <div style="float:left; background-color:#E7E7E7; width:0px; height:415px; margin-left:0px"></div>
  <div style="float:right;width:40%; color:#333333;"> <?php echo $this->loadTemplate('right'); ?> </div>
  <div class="clr"></div></div>
  <table class="siva" height="30px;" style="margin-top:368px; margin-left:50px;">
    <tr>
      <td><?php echo JText::_('DASHBOARD_NOTES'); ?></td>
    </tr>
  </table>
  
  
