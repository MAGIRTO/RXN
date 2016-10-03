<?php
/*
 * @version		$Id: add.php 1.0 2015-05-21 $
* @package		Joomla
* @copyright   Copyright (C) 2015-2016 Appten
* @license     GNU/GPL http://www.gnu.org/licenses/gpl-2.0.html
*/

defined('_JEXEC') or die('Restricted access');
$albums = $this->albums;
$editor = JFactory::getEditor();
?>

<div id="hdwmusic">
  <p class="hdwheader"><?php echo JText::_('ADD_SONG'); ?></p>
  <form action="index.php?option=com_hdwmusic&task=songs" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
    <table class="admintable">
      <tr>
        <td class="hdwkey"><?php echo JText::_('SONG_TITLE'); ?></td>
        <td><input type="text" name="song_title" size="60" /></td>
      </tr>
      <tr>
        <td class="hdwkey"></td>
        <td class="hdwkey"><input type="radio" name="song_type" value="upload" checked="checked" onclick="changeType('upload')" />
          <?php echo JText::_('UPLOAD'); ?>&nbsp;&nbsp;
          <input type="radio" name="song_type" value="url" onclick="changeType('url')" />
          <?php echo JText::_('URL'); ?></td>
      </tr>
      <tr id="upload_music_data">
        <td class="hdwkey"><?php echo JText::_('UPLOAD_MUSIC_FILE'); ?></td>
        <td><input type="file" name="song_upload_file" maxlength="100" /></td>
      </tr>
      <tr id="upload_thumb_data">
        <td class="hdwkey"><?php echo JText::_('UPLOAD_THUMB_IMAGE'); ?></td>
        <td><input type="file" name="song_upload_thumb" maxlength="100" /></td>
      </tr>
      <tr id="music_url_data">
        <td class="hdwkey"><?php echo JText::_('MUSIC_FILE_PATH'); ?></td>
        <td><input type="text" name="song_file" size="60" /></td>
      </tr>
      <tr id="thumb_url_data">
        <td class="hdwkey"><?php echo JText::_('THUMB_IMAGE'); ?></td>
        <td><input type="text" name="song_thumb" size="60" /></td>
      </tr>
      <tr>
        <td class="hdwkey"><?php echo JText::_('SELECT_AN_ALBUM'); ?></td>
        <td><select id="song_album" name="song_album">
            <?php
            $k=count( $albums);
            for ($i=0; $i < $k; $i++)
            {
               $row = $albums[$i];
            ?>
            <option value="<?php echo $row->album_name; ?>" id="<?php echo $row->album_name; ?>"><?php echo $row->album_name; ?></option>
            <?php } ?>
          </select>
        </td>
      </tr>
      <tr>
        <td class="hdwkey" valign="top" style="padding-top:10px;"><?php echo JText::_('SONG_LYRICS'); ?></td>
        <td><?php echo $editor->display('song_lyrics', '', '700', '400', '60', '20', true); ?></td>
      </tr>
      <tr>
        <td class="hdwkey"><?php echo JText::_('PUBLISH'); ?></td>
        <td><input type="checkbox" name="published" value="1" checked="checked" /></td>
      </tr>
    </table>
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="boxchecked" value="1">
    <?php echo JHTML::_( 'form.token' ); ?>
  </form>
</div>
<script type="text/javascript">
var form            = document.adminForm;
var audioExtensions = ['mp3'];
var imageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
var isAllowed       = true;
changeType('upload'); 

if(<?php echo substr(JVERSION,0,3); ?> >= '3') {
	Joomla.submitbutton = submitbutton;
}
	
 function submitbutton(pressbutton){ 	
	if(pressbutton == 'savesongs' || pressbutton == 'applysongs') {	
		if(valSongs()  == false) return;
	}
	submitform( pressbutton );	
	return;
}
 
 function valSongs() {
	if(valButton(form.song_type) == 'upload') {
		if (form.song_upload_file.value == "") {
        	alert( "<?php echo JText::_( 'YOU_MUST_ADD_AN_AUDIO', true); ?>" );
         	return false;
     	} else {
			isAllowed = checkExtension('SONG', form.song_upload_file.value, audioExtensions);
			if(isAllowed == false) 	return false;
		}
	} else {			
		if (form.song_file.value == "") {
    		alert( "<?php echo JText::_( 'YOU_MUST_ADD_AN_AUDIO', true); ?>" );
			return false;
     	} else {
			isAllowed = checkExtension('SONG', form.song_file.value, audioExtensions);
			if(isAllowed == false) 	return false;
		}
	}

	if(form.song_upload_thumb.value) {
		isAllowed = checkExtension('THUMB', form.song_upload_thumb.value, imageExtensions);
		if(isAllowed == false) 	return false;
	} 
		
	if(form.song_thumb.value) {
		isAllowed = checkExtension('THUMB', form.song_thumb.value, imageExtensions);
		if(isAllowed == false) 	return;
	} 		
	
	if (form.song_title.value == "") {
       	alert( "<?php echo JText::_( 'YOU_MUST_ENTER_A_TITLE_FOR_THE_AUDIO', true); ?>" );
       	return false;
    }
	
	if(form.song_album.value == '') {
		alert( "<?php echo JText::_( 'ALBUM_NAME_COULD_NOT_BE_NONE', true); ?>" );
       	return false;
	}
}

 function valButton(btn) {
	var cnt = -1;
    for (var i=btn.length-1; i > -1; i--) {
        if (btn[i].checked) {cnt = i; i = -1;}
    }
    if (cnt > -1) return btn[cnt].value;
    else return null;
}

 function checkExtension(type, filePath, validExtensions) {
	var ext = filePath.substring(filePath.lastIndexOf('.') + 1).toLowerCase();

    for(var i = 0; i < validExtensions.length; i++) {
        if(ext == validExtensions[i]) return true;
    }

    alert(type + ' :   The file extension ' + ext.toUpperCase() + ' is not allowed!');
    return false;	
}

 function changeType(typ) {
	document.getElementById('upload_music_data').style.display="none";
	document.getElementById('upload_thumb_data').style.display="none";
   	document.getElementById('music_url_data').style.display="none";
	document.getElementById('thumb_url_data').style.display="none";			
    switch(typ) {
		case 'upload':
			document.getElementById('upload_music_data').style.display="";
			document.getElementById('upload_thumb_data').style.display="";
			break;
		case 'url':
			document.getElementById('music_url_data').style.display="";
			document.getElementById('thumb_url_data').style.display="";
			break;
	}	
}

</script>