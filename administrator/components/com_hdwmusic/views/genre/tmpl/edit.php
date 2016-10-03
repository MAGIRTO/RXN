<?php
/*
 * @version		$Id: edit.php 1.0 2015-05-21 $
* @package		Joomla
* @copyright   Copyright (C) 2015-2016 Appten
* @license     GNU/GPL http://www.gnu.org/licenses/gpl-2.0.html
*/
defined('_JEXEC') or die('Restricted access');
$data    = $this->data;
$editor  = JFactory::getEditor();
?>

<div id="hdwmusic">
  <p class="hdwheader"><?php echo JText::_('EDIT_GENRE'); ?></p>
  <form action="index.php?option=com_hdwmusic&task=genre" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
    <table class="admintable">
      <tr>
        <td class="hdwkey"><?php echo JText::_('GENRE_NAME'); ?></td>
        <td><input type="text" name="genre_name" size="60" value="<?php echo $data->genre_name; ?>" /></td>
      </tr>
      <tr>
        <td class="hdwkey"><?php echo JText::_('GENRE_SLUG'); ?></td>
        <td><input type="text" name="genre_slug" size="60" value="<?php echo $data->genre_slug; ?>" /></td>
      </tr>
      <tr id="genre_upload_type">
        <td class="hdwkey"><?php echo JText::_('GENRE_IMAGE'); ?></td>
        <td class="hdwkey"><input type="radio" name="genre_type" value="upload" <?php if($data->genre_type == "upload") echo 'checked="checked"'; ?> onclick="changeGenreUpload('upload')"/>
          <?php echo JText::_('UPLOAD'); ?>&nbsp;&nbsp;
          <input type="radio" name="genre_type" value="url" <?php if($data->genre_type == "url") echo 'checked="checked"'; ?> onclick="changeGenreUpload('url')" />
          <?php echo JText::_('URL'); ?></td>
      </tr>
      <tr id="genre_upload_data">
        <td class="hdwkey"></td>
        <td id="genre_upload_thumb"><?php if($data->genre_thumb) { ?>
          <input name="genre_upload_thumb" readonly="readonly" value="<?php echo $data->genre_thumb; ?>" size="47" />
          <input type="button" name="change" value="Change" onclick="changeMode()" />
          <?php } else { ?>
          <input type="file" name="genre_upload_thumb" maxlength="100" />
          <?php } ?>
        </td>
      </tr>
      <tr id="genre_url_data">
        <td class="hdwkey"></td>
        <td><input type="text" name="genre_thumb" size="60" value="<?php echo $data->genre_thumb; ?>" /></td>
      </tr>
      <tr>
        <td class="hdwkey" valign="top" style="padding-top:10px;"><?php echo JText::_('GENRE_HEADER_CONTENT'); ?></td>
        <td><?php echo $editor->display('genre_header', $data->genre_header, '700', '400', '60', '20', true); ?></td>
      </tr>
      <tr>
        <td class="hdwkey" valign="top" style="padding-top:10px;"><?php echo JText::_('GENRE_FOOTER_CONTENT'); ?></td>
        <td><?php echo $editor->display('genre_footer', $data->genre_footer, '700', '400', '60', '20', true); ?></td>
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
changeGenreUpload('<?php echo $data->genre_type; ?>');

if(<?php echo substr(JVERSION,0,3); ?> == '3.0') {
	Joomla.submitbutton = submitbutton;
}
	
 function submitbutton(pressbutton){ 	
	if(pressbutton == 'savegenre' || pressbutton == 'applygenre') {	
		if(valGenre() == false) return;
	}
	submitform( pressbutton );	
	return;
}

 function valGenre() {
	if(form.genre_name.value == '') {
       	alert( "<?php echo JText::_( 'YOU_MUST_ADD_AN_GENRE_NAME', true); ?>" );
       	return false;
	}
			
	if(valButton(form.genre_type) == 'upload') {
		if(form.genre_upload_thumb.value == '') {
       		alert( "<?php echo JText::_( 'YOU_MUST_ADD_AN_GENRE_IMAGE', true); ?>" );
       		return false;
	    } else {
			isAllowed = checkExtension('THUMB', form.genre_upload_thumb.value, imageExtensions);
			if(isAllowed == false) 	return false;
		}
	} else {
		if(form.genre_thumb.value == '') {
       		alert( "<?php echo JText::_( 'YOU_MUST_ADD_AN_GENRE_IMAGE', true); ?>" );
       		return false;
	    } else {
			isAllowed = checkExtension('THUMB', form.genre_thumb.value, imageExtensions);
			if(isAllowed == false) 	return false;
		}
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
 
 function changeGenreUpload(typ) {
	document.getElementById('genre_upload_data').style.display="none";
   	document.getElementById('genre_url_data').style.display="none";
    switch(typ) {
		case 'upload':
			document.getElementById('genre_upload_data').style.display="";
			break;
		case 'url':
			document.getElementById('genre_url_data').style.display="";
			break;
	}	
}

 function changeMode() {
    var mode;
    mode='<input type="file" name="genre_upload_thumb" maxlength="100" />';
	document.getElementById('genre_upload_thumb').innerHTML = mode;
}
	
</script>