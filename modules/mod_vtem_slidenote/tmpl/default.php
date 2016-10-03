<?php
/**
* @Copyright Copyright (C) 2010 VTEM . All rights reserved.
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @link     	http://www.vtem.net
**/
defined('_JEXEC') or die('Restricted access');
?>
<script type="text/javascript">
var vtemslidenote = jQuery.noConflict();
(function($){
	$(document).ready(function(){ 
	   $('#<?php echo $vtemslidenoteID;?>').slideNote({
		width:'<?php echo $width;?>',
		height:'<?php echo $height;?>',
		where: <?php echo $where;?>,
		corner: '<?php echo $corner;?>',
		closeImage: '<?php echo JURI::root()."modules/mod_vtem_slidenote/assets/images/".$closeImage;?>',
		displayCount: <?php echo $displayCount;?>,
		useCookie: false,
		cookieDay: 7
		});
	});
})(jQuery);
</script>
<div id="<?php echo $vtemslidenoteID;?>" class="vtemslidenote">
 <div class="note-container">
	<div class="header"><?php echo $title;?></div>
	<div class="subtitle"><em><?php echo $subtitle;?></em></div>
	<div class="desc"><?php echo $des;?></div>
 </div>	
</div>
