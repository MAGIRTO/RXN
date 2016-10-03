<?php 
/*
 * @version		$Id: default.php 1.0 2015-05-21 $
* @package		Joomla
* @copyright   Copyright (C) 2015-2016 Appten
* @license     GNU/GPL http://www.gnu.org/licenses/gpl-2.0.html
*/

defined('_JEXEC') or die('Restricted access'); 

$style      = '';
$settings   = $this->settings;
$songs      = $this->songs;
$row        = 0;
$column     = 0;

$flashvars = '';
if($settings[0]->bgcolor != '0x333333') $flashvars .= '&bgColor='.$settings[0]->bgcolor;
if($settings[0]->bordercolor != '0x222222') $flashvars .= '&borderColor='.$settings[0]->bordercolor;
if($settings[0]->overlaycolor != '0xCCCCCC') $flashvars .= '&overlayColor='.$settings[0]->overlaycolor;
if($settings[0]->overlayalpha != '15') $flashvars .= '&overlayAlpha='.$settings[0]->overlayalpha;
if($settings[0]->iconcolor != '0xFFFFFF') $flashvars .= '&iconColor='.$settings[0]->iconcolor;
if($settings[0]->sliderbgcolor != '0x444444') $flashvars .= '&sliderBgColor='.$settings[0]->sliderbgcolor;
if($settings[0]->slidercolor != '0x666666') $flashvars .= '&sliderColor='.$settings[0]->slidercolor;
if($settings[0]->autostart == 0) $flashvars .= '&autoStart=false';
if($settings[0]->playlistautostart == 0) $flashvars .= '&PlayListAutoStart=false';

?>
<style type="text/css">
<?php echo $settings[0]->styles;
?>
</style>
<script type="text/javascript" src="<?php echo JURI::root(); ?>components/com_hdwmusic/js/swfobject.js"></script>
<script>
var preIndex  = 0;
var currIndex = 0;
var params = { allowScriptAccess: "always", allowFullScreen: "true", wmode: "transparent", flashvars:"baseJ=<?php echo JURI::root(); ?>&id=userdata<?php echo $flashvars; ?>" };
var atts   = { id: 'player'};
swfobject.embedSWF('<?php echo JURI::root(); ?>components/com_hdwmusic/player.swf?rand=' + Math.floor(Math.random()*11), 'player', '100%', '26', "9", null, null, params, atts);

function onMediaStart(inp, id) {
	preIndex  = currIndex;
	currIndex = id;
	onPause(preIndex);
	onPlay(currIndex);
	var _lyrics = document.getElementById('_lyrics');
	_lyrics.innerHTML = inp;
}

function onPlay(id) 
{
	document.getElementById("play" + id).style.display  = "none";
	document.getElementById("pause" + id).style.display = "block";
}

function onPause(id) 
{
	document.getElementById("play" + id).style.display  = "block";
	document.getElementById("pause" + id).style.display = "none";
}

function removeFromFavourites(id, ele) 
{
	var answer = confirm("<?php echo JText::_('THIS_SONG_HAS_BEEN_REMOVED_FROM_YOUR_FAVOURITES'); ?>", true);
	if (!answer) return;
	url = "<?php echo 'index.php?option=com_hdwmusic&view=updateuser&task=remove&'.JSession::getFormToken().'=1&id='; ?>" + id;
	updateFavourites(url);
	document.getElementById(ele).style.display = "none";
	document.getElementById('player').pauseMedia();;
}

function updateFavourites(url) {
	var xmlhttp;
	if (window.XMLHttpRequest) {
  		xmlhttp = new XMLHttpRequest();
	} else  {
  		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  	}
	xmlhttp.open("GET",url,true);
	xmlhttp.send();
}
</script>
<?php if ($this->params->get( 'show_page_title', 1)) : ?>
<div class="componentheading<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>"> <?php echo $this->escape($this->params->get('page_title')); ?> </div>
<?php endif; ?>
<?php
   echo JHtml::_('tabs.start', 'tab_group_id', '');
echo JHtml::_('tabs.panel', JText::_('MY_FAVOURITES'), 'myfavourites' );
	
?>
<div id="hdw_grid<?php echo  $this->escape($this->params->get('pageclass_sfx')); ?>">
  <div id="player<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>"></div>
  <br />
  <br />
  <table border="0" cellpadding="0" cellspacing="1" width="100%">
    <tbody>
      <?php 
      $user = JFactory::getUser();  
      if($user->name == ''){
      	echo "You must Login";
      }
      else {
      
  		if(!count($songs)) echo JText::_('ITEM_NOT_FOUND');
  		for ($i=0, $n=count($songs); $i < $n; $i++) { 
  			$cls = ($i % 2) > 0 ? 'hdw_grid_row1' : 'hdw_grid_row0'; 
      ?>
      <tr class="<?php echo $cls; ?>" id="hdw_grid_row<?php echo $i; ?>">
        <td width="5%"><?php echo $i + 1 . '.'; ?></td>
        <td><?php echo $songs[$i]->song_title; ?></td>
        <td width="8%" align="center"><a id="play<?php echo $i; ?>" href="javascript:document.getElementById('player').loadPlayList('<?php echo $i; ?>');" ><img src="components/com_hdwmusic/assets/play.png" alt="<?php echo JText::_('PLAY'); ?>" title="<?php echo JText::_('PLAY'); ?>"></a><a id="pause<?php echo $i; ?>" style="display:none;" href="javascript:document.getElementById('player').pauseMedia();" ><img src="components/com_hdwmusic/assets/pause.png" alt="<?php echo JText::_('PAUSE'); ?>" title="<?php echo JText::_('PAUSE'); ?>"></a> </td>
        <td width="8%" align="center"><a href="javascript:removeFromFavourites('<?php echo $songs[$i]->id; ?>', 'hdw_grid_row<?php echo $i; ?>');"> <img src="components/com_hdwmusic/assets/remove.png" alt="<?php echo JText::_('REMOVE_THIS_SONG_FROM_MY_FAVOURITES'); ?>" title="<?php echo JText::_('REMOVE_THIS_SONG_FROM_MY_FAVOURITES'); ?>"> </a> </td>
        <td width="8%" align="center"><a href="<?php echo $songs[$i]->song_file; ?>" target="_blank"><img src="components/com_hdwmusic/assets/music.png" alt="<?php echo JText::_('DOWNLOAD_THIS_SONG'); ?>" title="<?php echo JText::_('DOWNLOAD_THIS_SONG'); ?>"></a> </td>
      </tr>
      <?php }} ?>
    </tbody>
  </table>
</div>
<div id="hdw_lyrics<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
  <div id="_lyrics"></div>
</div>
<div style="clear:both"></div>
<?php echo JHtml::_('tabs.end');
?>
      