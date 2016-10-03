<?php
/*
 * @version		$Id: default.php 1.0 2015-05-21 $
* @package		Joomla
* @copyright   Copyright (C) 2015-2016 Appten
* @license     GNU/GPL http://www.gnu.org/licenses/gpl-2.0.html
*/

defined('_JEXEC') or die('Restricted access');
$data = $this->data;
?>

<div id="hdwmusic">
  <form action="index.php?option=com_hdwmusic&task=genre" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
    <table style="padding-bottom:10px;">
      <tr>
        <td align="left" width="100%"><strong><?php echo JText::_('FILTER'); ?> : </strong>
          <input type="text" name="search" id="search" value="<?php echo $this->lists['search']; ?>" class="text_area" title="<?php echo JText::_('FILTER_BY_NAME'); ?>"/>
          <button onclick="this.form.submit();"><?php echo JText::_('GO'); ?></button>
          <button onclick="document.getElementById('search').value='';this.form.getElementById('filter_state').value='-1';this.form.submit();"><?php echo JText::_('RESET'); ?> </button></td>
        <td nowrap="nowrap"><?php echo $this->lists['state']; ?> </td>
      </tr>
    </table>
    <table class="adminlist">
      <thead>
        <tr>
          <th width="5%">#</th>
          <th width="5%"><input type="checkbox" name="toggle"  value="" onClick="checkAll(<?php echo count( $data ); ?>);" /></th>
          <th width="25%"><?php echo JText::_('GENRE_NAME'); ?></th>
          <th><?php echo JText::_('GENRE_IMAGE'); ?></th>
          <th width="8%"><?php echo JText::_('VIEWS'); ?></th>
          <th width="8%"><?php echo JText::_('PUBLISHED'); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php
		$k = 0;
		for ($i=0, $n=count($data); $i < $n; $i++) {
			$row = $data[$i];

			$link 		= JRoute::_( 'index.php?option=com_hdwmusic&task=editgenre&'. JSession::getFormToken() .'=1&'.'cid[]='. $row->id );
			$checked 	= JHTML::_('grid.id', $i, $row->id );
			$published 	= JHTML::_('grid.published', $row, $i );
		?>
        <tr class="<?php echo "row$k"; ?>">
          <td align="center"><?php echo $i+1;?> </td>
          <td align="center"><?php echo $checked; ?> </td>
          <td align="center"><a href="<?php echo $link; ?>"> <?php echo $row->genre_name;?> </a> </td>
          <td align="center"><?php echo $row->genre_thumb;?> </td>
          <td align="center"><?php echo $row->genre_views;?> </td>
          <td align="center"><?php echo $published; ?> </td>
        </tr>
        <?php } ?>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="15"><?php echo $this->pagination->getListFooter(); ?></td>
        </tr>
      </tfoot>
    </table>
    <input type="hidden" name="task" value="genre" />
    <input type="hidden" name="boxchecked" value="0">
    <?php echo JHTML::_( 'form.token' ); ?>
  </form>
</div>