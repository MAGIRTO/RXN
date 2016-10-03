<?php
/*
 * @version		$Id: edit.php 1.0 2015-05-21 $
* @package		Joomla
* @copyright   Copyright (C) 2015-2016 Appten
* @license     GNU/GPL http://www.gnu.org/licenses/gpl-2.0.html
*/

defined('_JEXEC') or die('Restricted access');
$artists = $this->artists;
$genre   = $this->genre;
$data    = $this->data;
$editor  = JFactory::getEditor();
?>

<div id="hdwmusic">
  <p class="hdwheader"><?php echo JText::_('EDIT_ALBUM'); ?></p>
  <form action="index.php?option=com_hdwmusic&task=albums" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
    <table class="admintable">
      <tr>
        <td class="hdwkey"><?php echo JText::_('ALBUM_NAME'); ?></td>
        <td><input type="text" name="album_name" size="60" value="<?php echo $data->album_name; ?>" /></td>
      </tr>
      <tr>
        <td class="hdwkey"><?php echo JText::_('ALBUM_SLUG'); ?></td>
        <td><input type="text" name="album_slug" size="60" value="<?php echo $data->album_slug; ?>" /></td>
      </tr>
      <tr id="album_upload_type">
        <td class="hdwkey"></td>
        <td class="hdwkey"><input type="radio" name="album_type" value="upload" <?php if($data->album_type == "upload") echo 'checked="checked"'; ?> onclick="changeAlbumUpload('upload')" />
          <?php echo JText::_('UPLOAD'); ?>&nbsp;&nbsp;
          <input type="radio" name="album_type" value="url" <?php if($data->album_type == "url") echo 'checked="checked"'; ?> onclick="changeAlbumUpload('url')" />
          <?php echo JText::_('URL'); ?></td>
      </tr>
      <tr id="album_upload_data_thumb">
        <td class="hdwkey"><?php echo JText::_('THUMB_IMAGE'); ?></td>
        <td id="album_upload_thumb"><?php if($data->album_thumb) { ?>
          <input name="album_upload_thumb" readonly="readonly" value="<?php echo $data->album_thumb; ?>" size="47" />
          <input type="button" name="change" value="Change" onclick="changeMode('thumb')" />
          <?php } else { ?>
          <input type="file" name="album_upload_thumb" maxlength="100" />
          <?php } ?>
        </td>
      </tr>
      <tr id="album_url_data_thumb">
        <td class="hdwkey"><?php echo JText::_('THUMB_IMAGE'); ?></td>
        <td><input type="text" name="album_thumb" size="60" value="<?php echo $data->album_thumb; ?>" /></td>
      </tr>
      <tr id="album_upload_data_cover">
        <td class="hdwkey"><?php echo JText::_('COVER_IMAGE'); ?></td>
        <td id="album_upload_cover"><?php if($data->album_cover) { ?>
          <input name="album_upload_cover" readonly="readonly" value="<?php echo $data->album_cover; ?>" size="47" />
          <input type="button" name="change" value="Change" onclick="changeMode('cover')" />
          <?php } else { ?>
          <input type="file" name="album_upload_cover" maxlength="100" />
          <?php } ?>
        </td>
      </tr>
      <tr id="album_url_data_cover">
        <td class="hdwkey"><?php echo JText::_('COVER_IMAGE'); ?></td>
        <td><input type="text" name="album_cover" size="60" value="<?php echo $data->album_cover; ?>" /></td>
      </tr>
      <tr>
        <td class="hdwkey"><?php echo JText::_('SELECT_AN_ARTIST'); ?></td>
        <td><select id="album_artist" name="album_artist" >
            <?php
            $k=count( $artists);
            for ($i=0; $i < $k; $i++)
            {
               $row = $artists[$i]->artist_name;
            ?>
            <option value="<?php echo $row; ?>" id="<?php echo $row; ?>"><?php echo $row; ?></option>
            <?php } ?>
          </select>
          <?php echo '<script>document.getElementById("'.$data->album_artist.'").selected="selected"</script>'; ?>
        </td>
      </tr>
      <tr>
        <td class="hdwkey"><?php echo JText::_('SELECT_A_GENRE'); ?></td>
        <td><select id="album_genre" name="album_genre" >
            <?php
            $k=count( $genre);
            for ($i=0; $i < $k; $i++)
            {
               $row = $genre[$i]->genre_name;
            ?>
            <option value="<?php echo $row; ?>" id="<?php echo $row; ?>"><?php echo $row; ?></option>
            <?php } ?>
          </select>
          <?php echo '<script>document.getElementById("'.$data->album_genre.'").selected="selected"</script>'; ?>
        </td>
      </tr>
      <tr>
        <td class="hdwkey" valign="top" style="padding-top:10px;"><?php echo JText::_('ALBUM_HEADER_CONTENT'); ?></td>
        <td><?php echo $editor->display('album_header', $data->album_header, '700', '400', '60', '20', true); ?></td>
      </tr>
      <tr>
        <td class="hdwkey" valign="top" style="padding-top:10px;"><?php echo JText::_('ALBUM_FOOTER_CONTENT'); ?></td>
        <td><?php echo $editor->display('album_footer', $data->album_footer, '700', '400', '60', '20', true); ?></td>
      </tr>
      <tr>
        <td class="hdwkey"><?php echo JText::_('FEATURED'); ?></td>
        <td><input type="checkbox" name="album_featured" value="1" <?php if($data->album_featured == "1") echo 'checked="checked"'; ?> /></td>
      </tr>
      <tr>
        <td class="hdwkey"><?php echo JText::_('PUBLISH'); ?></td>
        <td><input type="checkbox" name="published" value="1" <?php if($data->published == "1") echo 'checked="checked"'; ?> /></td>
      </tr>
    </table>
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="boxchecked" value="1">
    <input type="hidden" name="id" value="<?php echo $data->id; ?>">
    <?php echo JHTML::_( 'form.token' ); ?>
  </form>
</div>
<script type="text/javascript">
var form            = document.adminForm;
var imageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
var isAllowed       = true;
changeAlbumUpload('<?php echo $data->album_type; ?>');

if(<?php echo substr(JVERSION,0,3); ?> == '3.0') {
	Joomla.submitbutton = submitbutton;
}
	
 function submitbutton(pressbutton){ 	
	if(pressbutton == 'savealbums' || pressbutton == 'applyalbums') {	
		if(valAlbum() == false) return;
	}
	submitform( pressbutton );	
	return;
}

 function valAlbum() {
	if(form.album_name.value == '') {
       	alert( "<?php echo JText::_( 'YOU_MUST_ADD_AN_ALBUM_NAME', true); ?>" );
       	return false;
	}
			
	if(valButton(form.album_type) == 'upload') {
		if(form.album_upload_thumb.value == '') {
       		alert( "<?php echo JText::_( 'YOU_MUST_ADD_AN_ALBUM_THUMB_IMAGE', true); ?>" );
       		return false;
	    } else {
			isAllowed = checkExtension('THUMB', form.album_upload_thumb.value, imageExtensions);
			if(isAllowed == false) 	return false;
		}
		
		if(form.album_upload_cover.value == '') {
       		alert( "<?php echo JText::_( 'YOU_MUST_ADD_AN_ALBUM_COVER_IMAGE', true); ?>" );
       		return false;
	    } else {
			isAllowed = checkExtension('THUMB', form.album_upload_cover.value, imageExtensions);
			if(isAllowed == false) 	return false;
		}
	} else {
		if(form.album_thumb.value == '') {
       		alert( "<?php echo JText::_( 'YOU_MUST_ADD_AN_ALBUM_THUMB_IMAGE', true); ?>" );
       		return false;
	    } else {
			isAllowed = checkExtension('THUMB', form.album_thumb.value, imageExtensions);
			if(isAllowed == false) 	return false;
		}
		
		if(form.album_cover.value == '') {
       		alert( "<?php echo JText::_( 'YOU_MUST_ADD_AN_ALBUM_COVER_IMAGE', true); ?>" );
       		return false;
	    } else {
			isAllowed = checkExtension('THUMB', form.album_cover.value, imageExtensions);
			if(isAllowed == false) 	return false;
		}
	}
	
	if(form.album_artist.value == '') {
		alert( "<?php echo JText::_( 'ARTIST_NAME_COULD_NOT_BE_NONE', true); ?>" );
       	return false;
	}
	
	if(form.album_genre.value == '') {
		alert( "<?php echo JText::_( 'GENRE_NAME_COULD_NOT_BE_NONE', true); ?>" );
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
 
 function changeAlbumUpload(typ) {
	document.getElementById('album_upload_data_thumb').style.display="none";
   	document.getElementById('album_url_data_thumb').style.display="none";
	document.getElementById('album_upload_data_cover').style.display="none";
   	document.getElementById('album_url_data_cover').style.display="none";
    switch(typ) {
		case 'upload':
			document.getElementById('album_upload_data_thumb').style.display="";
			document.getElementById('album_upload_data_cover').style.display="";
			break;
		case 'url':
			document.getElementById('album_url_data_thumb').style.display="";
			document.getElementById('album_url_data_cover').style.display="";
			break;
	}	
}

function changeMode(inp) {
    var mode;
    mode='<input type="file" name="album_upload_' + inp + '" maxlength="100" />';
	document.getElementById('album_upload_' + inp).innerHTML = mode;
}
	
</script>