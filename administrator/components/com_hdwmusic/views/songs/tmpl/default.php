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
  <form action="index.php?option=com_hdwmusic&task=songs" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
    <table style="padding-bottom:10px;">
      <tr>
        <td align="left" width="100%"><strong><?php echo JText::_('FILTER'); ?> : </strong>
          <input type="text" name="search" id="search" value="<?php echo $this->lists['search'] ?>" class="text_area" title="<?php echo JText::_('FILTER_BY_NAME'); ?>"/>
          <button onclick="this.form.submit();"><?php echo JText::_('GO'); ?></button>
          <button onclick="document.getElementById('search').value='';this.form.getElementById('filter_state').value='-1';this.form.submit();"><?php echo JText::_('RESET'); ?> </button></td>
        <td nowrap="nowrap"><?php echo $this->lists['albums']; ?> <?php echo $this->lists['state']; ?> </td>
      </tr>
    </table>
    <table class="adminlist">
      <thead>
        <tr>
          <th width="5%">#</th>
          <th width="5%"><input type="checkbox" name="toggle"  value="" onClick="checkAll(<?php echo count( $data ); ?>);" /></th>
          <th><?php echo JText::_('SONG_TITLE'); ?></th>
          <th width="8%" style="color:#666"><?php echo JText::_('Position'); ?>&nbsp;&nbsp; <?php echo JHTML::_('grid.order',  $data ); ?> </th>
          <th width="8%"><?php echo JText::_('ALBUM_NAME'); ?></th>
          <th width="8%"><?php echo JText::_('TIMES_PLAYED'); ?></th>
          <th width="8%"><?php echo JText::_('PUBLISHED'); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php
		$k = 0;
		for ($i=0, $n=count($data); $i < $n; $i++) {
			$row = $data[$i];

			$link 		= JRoute::_( 'index.php?option=com_hdwmusic&task=editsongs&'. JSession::getFormToken() .'=1&'.'cid[]='. $row->id );
			$checked 	= JHTML::_('grid.id', $i, $row->id );
			$published 	= JHTML::_('grid.published', $row, $i );
		?>
        <tr class="<?php echo "row$k"; ?>">
          <td align="center"><?php echo $i+1;?> </td>
          <td align="center"><?php echo $checked; ?> </td>
          <td align="center"><a href="<?php echo $link; ?>"> <?php echo $row->song_title;?> </a> </td>
          <td class="order"><span><?php echo $this->pagination->orderUpIcon( $i, ($row->song_album == @$data[$i-1]->song_album), 'orderup', 'Move Up'); ?></span> <span><?php echo $this->pagination->orderDownIcon( $i, $n, ($row->song_album == @$data[$i+1]->song_album), 'orderdown', 'Move Down'); ?></span>
            <input type="text" name="order[]" size="10" value="<?php echo $row->ordering; ?>" class="text_area" style="text-align: center" />
          </td>
          <td align="center"><?php echo $row->song_album;?> </td>
          <td align="center"><?php echo $row->song_views;?> </td>
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
    <input type="hidden" name="task" value="songs" />
    <input type="hidden" name="boxchecked" value="0">
    <input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
    <input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_Dir']; ?>" />
    <?php echo JHTML::_( 'form.token' ); ?>
  </form>
</div>