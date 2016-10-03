<?php
/*
 * @version		$Id: default_left.php 1.0 2015-05-21 $
* @package		Joomla
* @copyright   Copyright (C) 2015-2016 Appten
* @license     GNU/GPL http://www.gnu.org/licenses/gpl-2.0.html
*/

// no direct access
defined('_JEXEC') or die('Restricted access');
$data = $this->data;
?>

<div class="hdwicon"> <a title="Genre" href="index.php?option=com_hdwmusic&amp;task=genre"> <img alt="<?php echo JText::_('GENRE'); ?>" src="components/com_hdwmusic/assets/genre.png" /> <span><?php echo JText::_('GENRE'); ?></span> </a> </div>
<div class="hdwicon"> <a title="Artists" href="index.php?option=com_hdwmusic&amp;task=artists"> <img alt="<?php echo JText::_('ARTISTS'); ?>" src="components/com_hdwmusic/assets/artists.png" /> <span><?php echo JText::_('ARTISTS'); ?></span> </a> </div>
<div class="hdwicon"> <a title="Albums" href="index.php?option=com_hdwmusic&amp;task=albums"> <img alt="<?php echo JText::_('ALBUMS'); ?>" src="components/com_hdwmusic/assets/albums.png" /> <span><?php echo JText::_('ALBUMS'); ?></span> </a> </div>
<div class="hdwicon"> <a title="Songs" href="index.php?option=com_hdwmusic&amp;task=songs"> <img alt="<?php echo JText::_('SONGS'); ?>" src="components/com_hdwmusic/assets/songs.png" /> <span><?php echo JText::_('SONGS'); ?></span> </a> </div>
<div class="hdwicon"> <a title="Support Forum" href="index.php?option=com_hdwmusic&amp;task=settings"> <img alt="<?php echo JText::_('SETTINGS'); ?>" src="components/com_hdwmusic/assets/settings.png" /> <span><?php echo JText::_('SETTINGS'); ?></span> </a> </div>
<div style=" clear:both"></div>
<div style="margin-top:30px;">
  <p style="font-size:15px; font-weight:bold; color:#0B55C4;"><?php echo JText::_('SERVER_INFORMATION'); ?></p>
  <table class="adminlist" style="color:#333;">
    <thead>
      <tr>
        <th width="10%" style="padding-left:10px; text-align:left;"><?php echo JText::_('CHECK'); ?></th>
        <th width="10%"><?php echo JText::_('RESULT'); ?></th>
      </tr>
    </thead>
    <?php
		$k = 0;
		for ($i=0, $n=count($data); $i < $n; $i++) {
			$row    = $data[$i];
			
			$color  = ($row['value'] == JText::_('NO')) ? '#FF0000' : '#339900';
			$status = $row['value'];
		?>
    <tr class="<?php echo "row$k"; ?>">
      <td style="padding-left:10px;"><strong><?php echo $row['name']; ?></strong></td>
      <td  align="center" style="color:<?php echo $color; ?>"><?php echo $status; ?></td>
    </tr>
    <?php } ?>
  </table>
</div>