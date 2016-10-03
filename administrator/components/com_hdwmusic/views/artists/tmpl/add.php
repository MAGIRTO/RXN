<?php
/*
 * @version		$Id: add.php 1.0 2015-05-21 $
* @package		Joomla
* @copyright   Copyright (C) 2015-2016 Appten
* @license     GNU/GPL http://www.gnu.org/licenses/gpl-2.0.html
*/

defined('_JEXEC') or die('Restricted access');
$editor  = JFactory::getEditor();
?>

<div id="hdwmusic">
  <p class="hdwheader"><?php echo JText::_('ADD_ARTIST'); ?></p>
  <form action="index.php?option=com_hdwmusic&task=artists" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
    <table class="admintable">
      <tr>
        <td class="hdwkey"><?php echo JText::_('ARTIST_NAME'); ?></td>
        <td><input type="text" name="artist_name" size="60" /></td>
      </tr>
      <tr>
        <td class="hdwkey"><?php echo JText::_('ARTIST_SLUG'); ?></td>
        <td><input type="text" name="artist_slug" size="60" /></td>
      </tr>
      <tr id="artist_upload_type">
        <td class="hdwkey"><?php echo JText::_('ARTIST_IMAGE'); ?></td>
        <td class="hdwkey"><input type="radio" name="artist_type" value="upload" checked="checked" onclick="changeArtistUpload('upload')" />
          <?php echo JText::_('UPLOAD'); ?>&nbsp;&nbsp;
          <input type="radio" name="artist_type" value="url" onclick="changeArtistUpload('url')" />
          <?php echo JText::_('URL'); ?></td>
      </tr>
      <tr id="artist_upload_data">
        <td class="hdwkey"></td>
        <td><input type="file" name="artist_upload_thumb" maxlength="100" /></td>
      </tr>
      <tr id="artist_url_data">
        <td class="hdwkey"></td>
        <td><input type="text" name="artist_thumb" size="60" /></td>
      </tr>
      <tr>
        <td class="hdwkey" valign="top" style="padding-top:10px;"><?php echo JText::_('ARTIST_HEADER_CONTENT'); ?></td>
        <td><?php echo $editor->display('artist_header', '', '700', '400', '60', '20', true); ?></td>
      </tr>
      <tr>
        <td class="hdwkey" valign="top" style="padding-top:10px;"><?php echo JText::_('ARTIST_FOOTER_CONTENT'); ?></td>
        <td><?php echo $editor->display('artist_footer', '', '700', '400', '60', '20', true); ?></td>
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
var imageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
var isAllowed       = true;
changeArtistUpload('upload');

if(<?php echo substr(JVERSION,0,3); ?> >= '3') {
	Joomla.submitbutton = submitbutton;
}
	
 function submitbutton(pressbutton){ 	
	if(pressbutton == 'saveartists' || pressbutton == 'applyartists') {	
		if(valArtist() == false) return;
	}
	submitform( pressbutton );	
	return;
}
 
 function valArtist() {
	if(form.artist_name.value == '') {
    	alert( "<?php echo JText::_( 'YOU_MUST_ADD_AN_ARTIST_NAME', true); ?>" );
        return false;
	}
			
	if(valButton(form.artist_type) == 'upload') {
		if(form.artist_upload_thumb.value == '') {
       		alert( "<?php echo JText::_( 'YOU_MUST_ADD_AN_ARTIST_IMAGE', true); ?>" );
       		return false;
	    } else {
			isAllowed = checkExtension('THUMB', form.artist_upload_thumb.value, imageExtensions);
			if(isAllowed == false) 	return false;
		}
	} else {
		if(form.artist_thumb.value == '') {
       		alert( "<?php echo JText::_( 'YOU_MUST_ADD_AN_ARTIST_IMAGE', true); ?>" );
       		return false;
	    } else {
			isAllowed = checkExtension('THUMB', form.artist_thumb.value, imageExtensions);
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
 
 function changeArtistUpload(typ) {
	document.getElementById('artist_upload_data').style.display="none";
   	document.getElementById('artist_url_data').style.display="none";
    switch(typ) {
		case 'upload':
			document.getElementById('artist_upload_data').style.display="";
			break;
		case 'url':
			document.getElementById('artist_url_data').style.display="";
			break;
	}	
}
</script>