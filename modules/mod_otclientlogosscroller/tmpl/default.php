
<?php
/**
 * @package 	OT Client Logos Scroller Module for Joomla! 3.3
 * @version 	$Id: default.php - Aug 2014 00:00:00Z OmegaTheme
 * @author 		OmegaTheme Extensions (services@omegatheme.com) - http://omegatheme.com
 * @copyright	Copyright(C) 2014 - OmegaTheme Extensions
 * @license 	http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
**/
// no direct access
defined('_JEXEC') or die( 'Restricted access' );
require_once( dirname(__FILE__) . '/SimpleImage.php' );
$img =new OTResizeImage();	
$url =JPATH_ROOT.DS.'modules'.DS.'mod_otclientlogosscroller'.DS.'assets'.DS.'images'.DS.'resize';
	
?>
<?php if ($ot_tooltip == 1) : ?>
<script type="text/javascript">
jQuery(function ($){
	$(".ot_row .col-ot-<?php echo $ot_number; ?>").tooltip({
		placement : '<?php echo $tooltip; ?>'
	});
	$(".ot_content").tooltip({
		placement : '<?php echo $tooltip; ?>'
	});
});
</script>
<?php endif; ?>
<?php if($ot_opacity == 1) : ?>
<style type="text/css">
.ot_row img,
.ot_content img {
	opacity: 0.6;
	filter: alpha(opacity=40);
}
.ot_row img:hover,
.ot_content img:hover {
	filter: none;
	opacity: 1;
}
</style>
<?php endif; ?>

<?php  if($lists[0]->type == 1) {
	if($ot_display == 'slider') : ?>
	<script src="<?php echo JUri::root(); ?>modules/mod_otclientlogosscroller/assets/js/jquery.carousel.js" type="text/javascript"></script>
	<style type="text/css">
		.the-carousel img .ot_image {
		width:<?php echo $ot_width_img; ?>px;
		height:<?php echo $ot_height_img; ?>px;
		}
		.the-carousel .ot_content {
		width:<?php echo $ot_width_img; ?>px;
		height:<?php echo $ot_height_img; ?>px;
		float:left;
		margin: 2px;
		}
	</style>
	<?php endif; ?> 
	<?php if($ot_display == 'slider') : ?>
		<div class="ot_logo_scroller" id="ot_logo_scroller_<?php echo $module->id; ?>">
			<div class="the-carousel">
				<?php foreach ($lists as $list) : 
					if($ot_resize_image ==1) { 
						@$image1 =end(explode("/",$list->avatar));
						@$image2= current(explode(".",$image1));
						@$image3= end(explode(".",$image1));
						$ot_image_resize=$url.'/'.$image2.'_'.$ot_type_resize.'_'.$ot_width_img.'x'.$ot_height_img.'.'.$image3.'';
						
						if(file_exists($ot_image_resize)) {			
						} else {
							$img->resize_image($ot_type_resize,$list->avatar,$ot_image_resize,$ot_width_img,$ot_height_img);
						} 
						$ot_img_resize='modules/mod_otclientlogosscroller/assets/images/resize/'.$image2.'_'.$ot_type_resize.'_'.$ot_width_img.'x'.$ot_height_img.'.'.$image3;
						?>
						<?php if(isset($list->avatar) && $list->avatar !='') : ?> 
							<?php if(isset($list->website) && $list->website !='') : ?>
								<div class="ot_content" data-toggle="tooltip"  data-original-title="<?php echo $list->title; ?>"><a  target="<?php echo $ot_target; ?>" href="<?php echo 'http://' . $list->website;  ?>"  ><img class="ot_image" src="<?php echo $ot_img_resize; ?>" /></a></div>
							<?php else : ?>
								<div class="ot_content" data-toggle="tooltip"  data-original-title="<?php echo $list->title; ?>"><img "ot_image"   src="<?php echo $ot_img_resize; ?>" /></div>
							<?php endif; ?>
						<?php endif; ?>
					<?php } else { ?>	
						<?php if(isset($list->avatar) && $list->avatar !='') : ?> 
							<?php if(isset($list->website) && $list->website !='') : ?>
								<div class="ot_content"><a  target="<?php echo $ot_target; ?>" href="<?php echo 'http://' . $list->website;  ?>"  ><img class="ot_image" src="<?php echo $list->avatar; ?>" /></a></div>
							<?php else : ?>
								<div class="ot_content"><img "ot_image"   src="<?php echo $list->avatar; ?>" /></div>
							<?php endif; ?>
						<?php endif; ?>
					<?php } ?>
				<?php endforeach; ?>
			</div>
			<?php if($ot_pn == 1) : ?>
				<a class="the-prev" href="#"></a>
				<a class="the-next" href="#"></a>
			<?php endif; ?>
			<?php if($ot_pager ==1) : ?>
			<div class="the-pager"></div>
			<?php endif; ?>
			<?php /* REMOVING Copyright warning 
			The Joomla module: OT Client Logos Scroller is free for all websites. We're welcome any developer want to contributes the module. But you must keep our credits that is the very tiny image under the module. If you want to remove it, you may visit http://www.omegatheme.com/member/signup/additional to purchase the Removing copyrights, then you can free your self to remove it. Thank you very much. Omegatheme.com
			*/?>
			<a href="http://wwww.omegatheme.com" class="omega-powered" title="Powered by Omegatheme.com">
			<img src="<?php JURI::base()?>modules/mod_otclientlogosscroller/assets/images/powered_icon.png" alt="Joomla Module OT Client Logos Scroller powered by OmegaTheme.com">
			</a>
			<?php /*********/ ?>
		</div>
	<?php elseif($ot_display =='grid') : ?>
		<div class="ot_logo_scroller_wrapper" id="ot_logo_scroller_<?php echo $module->id; ?>">
			<div class="ot_row">
				<?php foreach ($lists as $list) : 
				if($ot_resize_image ==1) { 
					@$image1 =end(explode("/",$list->avatar));
					@$image2= current(explode(".",$image1));
					@$image3= end(explode(".",$image1));
					$ot_image_resize=$url.'/'.$image2.'_'.$ot_type_resize.'_'.$ot_width_img.'x'.$ot_height_img.'.'.$image3.'';
					
					if(file_exists($ot_image_resize)) {			
					} else {
						$img->resize_image($ot_type_resize,$list->avatar,$ot_image_resize,$ot_width_img,$ot_height_img);
					} 
					$ot_img_resize='modules/mod_otclientlogosscroller/assets/images/resize/'.$image2.'_'.$ot_type_resize.'_'.$ot_width_img.'x'.$ot_height_img.'.'.$image3;
					?>
					<div class="col-ot-<?php echo $ot_number; ?>" data-toggle="tooltip"  data-original-title="<?php echo $list->title; ?>" >
					<?php if(isset($list->avatar) && $list->avatar !='') : ?>        
						<?php if(isset($list->website) && $list->website !='') : ?>
							<a target="<?php echo $ot_target; ?>" href="<?php echo 'http://' . $list->website; ?>"><img src="<?php echo $ot_img_resize; ?>" /></a>
						<?php else : ?>
							<img src="<?php echo $ot_img_resize; ?>"  />
						<?php endif; ?>
					<?php endif; ?>
					</div>
				<?php } else { ?>
				<div class="col-ot-<?php echo $ot_number; ?>" data-toggle="tooltip"  data-original-title="<?php echo $list->title; ?>" >
					<?php if(isset($list->avatar) && $list->avatar !='') : ?>        
						<?php if(isset($list->website) && $list->website !='') : ?>
							<a target="<?php echo $ot_target; ?>" href="<?php echo 'http://' . $list->website; ?>"><img src="<?php echo $list->avatar; ?>" /></a>
						<?php else : ?>
							<img src="<?php echo $list->avatar; ?>"  />
						<?php endif; ?>
					<?php endif; ?>
				</div> 
				<?php } ?>
				<?php endforeach; ?>
			</div>
			<?php /* REMOVING Copyright warning 
			The Joomla module: OT Client Logos Scroller is free for all websites. We're welcome any developer want to contributes the module. But you must keep our credits that is the very tiny image under the module. If you want to remove it, you may visit http://www.omegatheme.com/member/signup/additional to purchase the Removing copyrights, then you can free your self to remove it. Thank you very much. Omegatheme.com
			*/?>
			<a href="http://wwww.omegatheme.com" class="omega-powered" title="Powered by Omegatheme.com">
			<img src="<?php JURI::base()?>modules/mod_otclientlogosscroller/assets/images/powered_icon.png" alt="Joomla Module OT Client Logos Scroller powered by OmegaTheme.com">
			</a>
			<?php /*********/ ?>
		</div>
	<?php endif; ?>

	<div style="clear: both"></div>
	<?php if($ot_display == 'slider') : ?>
	<script type="text/javascript">
	jQuery(document).ready(function ($){
		$('#ot_logo_scroller_<?php echo $module->id; ?> .the-carousel').carouFredSel({
			width: '<?php echo $ot_width; ?>%',
			items: <?php echo $ot_item; ?>,
			scroll: 1,
			auto: {
				duration:<?php echo $ot_duration; ?>,
				timeoutDuration:<?php echo $ot_toduration; ?>
			},
			prev: '.the-prev',
			next: '.the-next'
	<?php if($ot_pager ==1) : ?>  ,
			pagination: '.the-pager'
	<?php endif; ?>
		});

	});
	</script>
	<?php endif; ?>
<?php } elseif($lists[0]->type == 2) { ?>
	<?php if($ot_display == 'slider') : ?>
		<script src="<?php echo JUri::root(); ?>modules/mod_otclientlogosscroller/assets/js/jquery.carousel.js" type="text/javascript"></script>
		<style type="text/css">
			.the-carousel img .ot_image {
			width:<?php echo $ot_width_img; ?>px;
			height:<?php echo $ot_height_img; ?>px;
			}
			.the-carousel .ot_content {
			width:<?php echo $ot_width_img; ?>px;
			height:<?php echo $ot_height_img; ?>px;
			float:left;
			margin: 2px;
			}
		</style>
		<div class="ot_logo_scroller" id="ot_logo_scroller_<?php echo $module->id; ?>">
			<div class="the-carousel">
				<?php foreach ($lists as $list) : 
					preg_match('/<img.+src=[\'"](?P<src>.+)[\'"].*>/i', $list->otcontent, $image);
					preg_match( '#(www\.|https?://)?[a-z0-9]+\.[a-z0-9]{2,4}\S*#i', $list->otcontent, $ot_url);
					preg_match('/\>(.*)<\/a>/', $list->otcontent, $ot_title);
					if($ot_resize_image ==1) {
						//var_dump(!empty($image));
						if(isset($image) && !empty($image)) :
							preg_match_all('/src= *["\']?([^"\']*)/i',$image[0],$ot_images);
							@$image1 =end(explode("/",$ot_images[1][0]));
							@$image2= current(explode(".",$image1));
							@$image3= end(explode(".",$image1));
							$ot_image_resize=$url.'/'.$image2.'_'.$ot_type_resize.'_'.$ot_width_img.'x'.$ot_height_img.'.'.$image3.'';
							
							if(file_exists($ot_image_resize)) {			
							} else {
								$img->resize_image($ot_type_resize,$ot_images[1][0],$ot_image_resize,$ot_width_img,$ot_height_img);
							} 
							$ot_img_resize='modules/mod_otclientlogosscroller/assets/images/resize/'.$image2.'_'.$ot_type_resize.'_'.$ot_width_img.'x'.$ot_height_img.'.'.$image3;
							 ?> 
							<div class="ot_content" data-toggle="tooltip"  data-original-title="<?php echo $ot_title[1]; ?>"><a  target="<?php echo $ot_target; ?>" href="<?php echo @$ot_url[0];?>><img class="ot_image" src="<?php echo $ot_img_resize; ?>" /></a></div>												
						<?php else: 
							if(empty($list->image)) { $list->image="modules/mod_otclientlogosscroller/assets/images/sampledefault.jpg"; }
							@$image1 =end(explode("/",$list->image));
							@$image2= current(explode(".",$image1));
							@$image3= end(explode(".",$image1));
							$ot_image_resize=$url.'/'.$image2.'_'.$ot_type_resize.'_'.$ot_width_img.'x'.$ot_height_img.'.'.$image3.'';
							
							if(file_exists($ot_image_resize)) {			
							} else {
								$img->resize_image($ot_type_resize,$list->image,$ot_image_resize,$ot_width_img,$ot_height_img);
							} 
							$ot_img_resize='modules/mod_otclientlogosscroller/assets/images/resize/'.$image2.'_'.$ot_type_resize.'_'.$ot_width_img.'x'.$ot_height_img.'.'.$image3;
	
							?>
							<div class="ot_content" data-toggle="tooltip"  data-original-title="<?php echo $ot_title[1]; ?>"><a  target="<?php echo $ot_target; ?>" href="<?php echo JUri::root().@$ot_url[0];?>><img class="ot_image" src="<?php echo $ot_img_resize; ?>" /></a></div>																			
						<?php endif; 
					} else {
						if(isset($image) && !empty($image)) : ?> 
							<div class="ot_content" data-toggle="tooltip"  data-original-title="<?php echo $ot_title[1]; ?>"><a  target="<?php echo $ot_target; ?>" href="<?php echo JUri::root().@$ot_url[0];?>><img class="ot_image" src="<?php echo @$image['src']; ?>" /></a></div>					
						<?php	else:
								if(empty($list->image)) { $list->image="modules/mod_otclientlogosscroller/assets/images/sampledefault.jpg"; } ?>
							<div class="ot_content" data-toggle="tooltip"  data-original-title="<?php echo $ot_title[1]; ?>"><a  target="<?php echo $ot_target; ?>" href="<?php echo JUri::root().@$ot_url[0];?>><img class="ot_image" src="<?php echo $list->image; ?>" /></a></div>					
						<?php endif; 
					} ?>
				<?php endforeach; ?>
			</div>
			<?php if($ot_pn == 1) : ?>
				<a class="the-prev" href="#"></a>
				<a class="the-next" href="#"></a>
			<?php endif; ?>
			<?php if($ot_pager ==1) : ?>
			<div class="the-pager"></div>
			<?php endif; ?>
			<?php /* REMOVING Copyright warning 
			The Joomla module: OT Client Logos Scroller is free for all websites. We're welcome any developer want to contributes the module. But you must keep our credits that is the very tiny image under the module. If you want to remove it, you may visit http://www.omegatheme.com/member/signup/additional to purchase the Removing copyrights, then you can free your self to remove it. Thank you very much. Omegatheme.com
			*/?>
			<a href="http://wwww.omegatheme.com" class="omega-powered" title="Powered by Omegatheme.com">
			<img src="<?php JURI::base()?>modules/mod_otclientlogosscroller/assets/images/powered_icon.png" alt="Joomla Module OT Client Logos Scroller powered by OmegaTheme.com">
			</a>
			<?php /*********/ ?>
		</div>
		<script type="text/javascript">
			jQuery(document).ready(function ($){

				$('#ot_logo_scroller_<?php echo $module->id; ?> .the-carousel').carouFredSel({
					width: '<?php echo $ot_width; ?>%',
					items: <?php echo $ot_item; ?>,
					scroll: 1,
					auto: {
						duration:<?php echo $ot_duration; ?>,
						timeoutDuration:<?php echo $ot_toduration; ?>
					},
					prev: '.the-prev',
					next: '.the-next'
			<?php if($ot_pager ==1) : ?>  ,
					pagination: '.the-pager'
			<?php endif; ?>
				});

			});
		</script>
		
	<?php elseif($ot_display =='grid') : ?>
		<div class="ot_logo_scroller_wrapper" id="ot_logo_scroller_<?php echo $module->id; ?>">
			<div class="ot_row">
				<?php foreach ($lists as $list) :
				preg_match('/<img.+src=[\'"](?P<src>.+)[\'"].*>/i', $list->otcontent, $image);
				preg_match( '#(www\.|https?://)?[a-z0-9]+\.[a-z0-9]{2,4}\S*#i', $list->otcontent, $ot_url);
				preg_match('/\>(.*)<\/a>/', $list->otcontent, $ot_title);
				if($ot_resize_image ==1) {
					if(isset($image) && !empty($image)) : 
						preg_match_all('/src= *["\']?([^"\']*)/i',$image[0],$ot_images);
						@$image1 =end(explode("/",$ot_images[1][0]));
						@$image2= current(explode(".",$image1));
						@$image3= end(explode(".",$image1));
						$ot_image_resize=$url.'/'.$image2.'_'.$ot_type_resize.'_'.$ot_width_img.'x'.$ot_height_img.'.'.$image3.'';
						
						if(file_exists($ot_image_resize)) {			
						} else {
							$img->resize_image($ot_type_resize,$ot_images[1][0],$ot_image_resize,$ot_width_img,$ot_height_img);
						}
						$ot_img_resize='modules/mod_otclientlogosscroller/assets/images/resize/'.$image2.'_'.$ot_type_resize.'_'.$ot_width_img.'x'.$ot_height_img.'.'.$image3;
						?>		
						<div class="col-ot-<?php echo $ot_number; ?>" data-toggle="tooltip"  data-original-title="<?php echo $ot_title[1]; ?>" >       						
							<a target="<?php echo $ot_target; ?>" href="<?php echo JUri::root().@$ot_url[0];?>><img src="<?php echo $ot_img_resize; ?>" /></a>						
						</div>
					<?php else: 
						if(empty($list->image)) { $list->image="modules/mod_otclientlogosscroller/assets/images/sampledefault.jpg"; }					
						@$image1 =end(explode("/",$list->image));
						@$image2= current(explode(".",$image1));
						@$image3= end(explode(".",$image1));
						$ot_image_resize=$url.'/'.$image2.'_'.$ot_type_resize.'_'.$ot_width_img.'x'.$ot_height_img.'.'.$image3.'';
						
						if(file_exists($ot_image_resize)) {			
						} else {
							$img->resize_image($ot_type_resize,$ot_images[1][0],$ot_image_resize,$ot_width_img,$ot_height_img);
						}
						$ot_img_resize='modules/mod_otclientlogosscroller/assets/images/resize/'.$image2.'_'.$ot_type_resize.'_'.$ot_width_img.'x'.$ot_height_img.'.'.$image3;
						?>	
						<div class="col-ot-<?php echo $ot_number; ?>" data-toggle="tooltip"  data-original-title="<?php echo $ot_title[1]; ?>" >       						
							<a target="<?php echo $ot_target; ?>" href="<?php echo JUri::root().@$ot_url[0];?>"><img src="<?php echo $ot_img_resize; ?>" /></a>						
						</div>
					<?php endif; ?>
				<?php } else { 
					$ot_url[0]=str_replace('"','',@$ot_url[0]); ?>
					<?php if(isset($image['src']) && !empty($image)) : ?>
						<div class="col-ot-<?php echo $ot_number; ?>" data-toggle="tooltip"  data-original-title="<?php echo $ot_title[1]; ?>" >       						
							<a target="<?php echo $ot_target; ?>" href="<?php echo $ot_url[0];?>"><img src="<?php echo $image['src']; ?>" /></a>						
						</div> 
					<?php else: 
						if(empty($list->image)) { $list->image="modules/mod_otclientlogosscroller/assets/images/sampledefault.jpg"; }
						$ot_url[0]=str_replace('"','',@$ot_url[0]);
					?>	
						<div class="col-ot-<?php echo $ot_number; ?>" data-toggle="tooltip"  data-original-title="<?php echo $ot_title[1]; ?>" >       						
							<a target="<?php echo $ot_target; ?>"  href="<?php echo $ot_url[0]; ?>"><img src="<?php echo $list->image; ?>" /></a>						
						</div> 
					<?php endif; ?>
				<?php } ?>	
				<?php endforeach; ?>
			</div>
			<?php /* REMOVING Copyright warning 
			The Joomla module: OT Client Logos Scroller is free for all websites. We're welcome any developer want to contributes the module. But you must keep our credits that is the very tiny image under the module. If you want to remove it, you may visit http://www.omegatheme.com/member/signup/additional to purchase the Removing copyrights, then you can free your self to remove it. Thank you very much. Omegatheme.com
			*/?>
			<a href="http://wwww.omegatheme.com" class="omega-powered" title="Powered by Omegatheme.com">
			<img src="<?php JURI::base()?>modules/mod_otclientlogosscroller/assets/images/powered_icon.png" alt="Joomla Module OT Client Logos Scroller powered by OmegaTheme.com">
			</a>
			<?php /*********/ ?>
		</div>
		
	<?php endif; ?>
<?php } else { ?>
	<?php if($ot_display == 'slider') : ?>
		<script src="<?php echo JUri::root(); ?>modules/mod_otclientlogosscroller/assets/js/jquery.carousel.js" type="text/javascript"></script>
		<style type="text/css">
			.the-carousel img .ot_image {
			width:<?php echo $ot_width_img; ?>px;
			height:<?php echo $ot_height_img; ?>px;
			}
			.the-carousel .ot_content {
			width:<?php echo $ot_width_img; ?>px;
			height:<?php echo $ot_height_img; ?>px;
			float:left;
			margin: 2px;
			}
		</style>
		<div class="ot_logo_scroller" id="ot_logo_scroller_<?php echo $module->id; ?>">
			<div class="the-carousel">
				<?php foreach ($lists as $list) : 
					
					preg_match('/<img.+src=[\'"](?P<src>.+)[\'"].*>/i', $list->otcategory, $image);
					preg_match( '#(www\.|https?://)?[a-z0-9]+\.[a-z0-9]{2,4}\S*#i', $list->otcategory, $ot_url);
					preg_match('/\>(.*)<\/a>/', $list->otcategory, $ot_title);
					if($ot_resize_image ==1) {
						//var_dump(!empty($image));
						if(isset($image) && !empty($image)) :
							preg_match_all('/src= *["\']?([^"\']*)/i',$image[0],$ot_images);
							@$image1 =end(explode("/",$ot_images[1][0]));
							@$image2= current(explode(".",$image1));
							@$image3= end(explode(".",$image1));
							$ot_image_resize=$url.'/'.$image2.'_'.$ot_type_resize.'_'.$ot_width_img.'x'.$ot_height_img.'.'.$image3.'';
							
							if(file_exists($ot_image_resize)) {			
							} else {
								$img->resize_image($ot_type_resize,$ot_images[1][0],$ot_image_resize,$ot_width_img,$ot_height_img);
							} 
							$ot_img_resize='modules/mod_otclientlogosscroller/assets/images/resize/'.$image2.'_'.$ot_type_resize.'_'.$ot_width_img.'x'.$ot_height_img.'.'.$image3;
							 ?> 
							<div class="ot_content" data-toggle="tooltip"  data-original-title="<?php echo $ot_title[1]; ?>"><a  target="<?php echo $ot_target; ?>" href="<?php echo @$ot_url[0];?>><img class="ot_image" src="<?php echo $ot_img_resize; ?>" /></a></div>												
						<?php else: 
							if(empty($list->image)) { $list->image="modules/mod_otclientlogosscroller/assets/images/sampledefault.jpg"; }
							@$image1 =end(explode("/",$list->image));
							@$image2= current(explode(".",$image1));
							@$image3= end(explode(".",$image1));
							$ot_image_resize=$url.'/'.$image2.'_'.$ot_type_resize.'_'.$ot_width_img.'x'.$ot_height_img.'.'.$image3.'';
							
							if(file_exists($ot_image_resize)) {			
							} else {
								$img->resize_image($ot_type_resize,$list->image,$ot_image_resize,$ot_width_img,$ot_height_img);
							} 
							$ot_img_resize='modules/mod_otclientlogosscroller/assets/images/resize/'.$image2.'_'.$ot_type_resize.'_'.$ot_width_img.'x'.$ot_height_img.'.'.$image3;
	
							?>
							<div class="ot_content" data-toggle="tooltip"  data-original-title="<?php echo $ot_title[1]; ?>"><a  target="<?php echo $ot_target; ?>" href="<?php echo JUri::root().@$ot_url[0];?>><img class="ot_image" src="<?php echo $ot_img_resize; ?>" /></a></div>																			
						<?php endif; 
					} else {
						if(isset($image) && !empty($image)) : ?> 
							<div class="ot_content" data-toggle="tooltip"  data-original-title="<?php echo $ot_title[1]; ?>"><a  target="<?php echo $ot_target; ?>" href="<?php echo JUri::root().@$ot_url[0];?>><img class="ot_image" src="<?php echo @$image['src']; ?>" /></a></div>					
						<?php	else:
								if(empty($list->image)) { $list->image="modules/mod_otclientlogosscroller/assets/images/sampledefault.jpg"; } ?>
							<div class="ot_content" data-toggle="tooltip"  data-original-title="<?php echo $ot_title[1]; ?>"><a  target="<?php echo $ot_target; ?>" href="<?php echo JUri::root().@$ot_url[0];?>><img class="ot_image" src="<?php echo $list->image; ?>" /></a></div>					
						<?php endif; 
					} ?>
				<?php endforeach; ?>
			</div>
			<?php if($ot_pn == 1) : ?>
				<a class="the-prev" href="#"></a>
				<a class="the-next" href="#"></a>
			<?php endif; ?>
			<?php if($ot_pager ==1) : ?>
			<div class="the-pager"></div>
			<?php endif; ?>
			<?php /* REMOVING Copyright warning 
			The Joomla module: OT Client Logos Scroller is free for all websites. We're welcome any developer want to contributes the module. But you must keep our credits that is the very tiny image under the module. If you want to remove it, you may visit http://www.omegatheme.com/member/signup/additional to purchase the Removing copyrights, then you can free your self to remove it. Thank you very much. Omegatheme.com
			*/?>
			<a href="http://wwww.omegatheme.com" class="omega-powered" title="Powered by Omegatheme.com">
			<img src="<?php JURI::base()?>modules/mod_otclientlogosscroller/assets/images/powered_icon.png" alt="Joomla Module OT Client Logos Scroller powered by OmegaTheme.com">
			</a>
			<?php /*********/ ?>
		</div>
		<script type="text/javascript">
			jQuery(document).ready(function ($){

				$('#ot_logo_scroller_<?php echo $module->id; ?> .the-carousel').carouFredSel({
					width: '<?php echo $ot_width; ?>%',
					items: <?php echo $ot_item; ?>,
					scroll: 1,
					auto: {
						duration:<?php echo $ot_duration; ?>,
						timeoutDuration:<?php echo $ot_toduration; ?>
					},
					prev: '.the-prev',
					next: '.the-next'
			<?php if($ot_pager ==1) : ?>  ,
					pagination: '.the-pager'
			<?php endif; ?>
				});

			});
		</script>
		
	<?php elseif($ot_display =='grid') : ?>
		<div class="ot_logo_scroller_wrapper" id="ot_logo_scroller_<?php echo $module->id; ?>">
			<div class="ot_row">
				<?php foreach ($lists as $list) :
				preg_match('/<img.+src=[\'"](?P<src>.+)[\'"].*>/i', $list->otcategory, $image);
				preg_match( '#(www\.|https?://)?[a-z0-9]+\.[a-z0-9]{2,4}\S*#i', $list->otcategory, $ot_url);
				preg_match('/\>(.*)<\/a>/', $list->otcategory, $ot_title);
				if($ot_resize_image ==1) {
					if(isset($image) && !empty($image)) : 
						preg_match_all('/src= *["\']?([^"\']*)/i',$image[0],$ot_images);
						@$image1 =end(explode("/",$ot_images[1][0]));
						@$image2= current(explode(".",$image1));
						@$image3= end(explode(".",$image1));
						$ot_image_resize=$url.'/'.$image2.'_'.$ot_type_resize.'_'.$ot_width_img.'x'.$ot_height_img.'.'.$image3.'';
						
						if(file_exists($ot_image_resize)) {			
						} else {
							$img->resize_image($ot_type_resize,$ot_images[1][0],$ot_image_resize,$ot_width_img,$ot_height_img);
						}
						$ot_img_resize='modules/mod_otclientlogosscroller/assets/images/resize/'.$image2.'_'.$ot_type_resize.'_'.$ot_width_img.'x'.$ot_height_img.'.'.$image3;
						?>		
						<div class="col-ot-<?php echo $ot_number; ?>" data-toggle="tooltip"  data-original-title="<?php echo $ot_title[1]; ?>" >       						
							<a target="<?php echo $ot_target; ?>" href="<?php echo JUri::root().@$ot_url[0];?>><img src="<?php echo $ot_img_resize; ?>" /></a>						
						</div>
					<?php else: 
						if(empty($list->image)) { $list->image="modules/mod_otclientlogosscroller/assets/images/sampledefault.jpg"; }					
						@$image1 =end(explode("/",$list->image));
						@$image2= current(explode(".",$image1));
						@$image3= end(explode(".",$image1));
						$ot_image_resize=$url.'/'.$image2.'_'.$ot_type_resize.'_'.$ot_width_img.'x'.$ot_height_img.'.'.$image3.'';
						
						if(file_exists($ot_image_resize)) {			
						} else {
							$img->resize_image($ot_type_resize,$ot_images[1][0],$ot_image_resize,$ot_width_img,$ot_height_img);
						}
						$ot_img_resize='modules/mod_otclientlogosscroller/assets/images/resize/'.$image2.'_'.$ot_type_resize.'_'.$ot_width_img.'x'.$ot_height_img.'.'.$image3;
						?>	
						<div class="col-ot-<?php echo $ot_number; ?>" data-toggle="tooltip"  data-original-title="<?php echo $ot_title[1]; ?>" >       						
							<a target="<?php echo $ot_target; ?>" href="<?php echo JUri::root().@$ot_url[0];?>"><img src="<?php echo $ot_img_resize; ?>" /></a>						
						</div>
					<?php endif; ?>
				<?php } else { 
					$ot_url[0]=str_replace('"','',@$ot_url[0]); ?>
					<?php if(isset($image['src']) && !empty($image)) : ?>
						<div class="col-ot-<?php echo $ot_number; ?>" data-toggle="tooltip"  data-original-title="<?php echo $ot_title[1]; ?>" >       						
							<a target="<?php echo $ot_target; ?>" href="<?php echo $ot_url[0];?>"><img src="<?php echo $image['src']; ?>" /></a>						
						</div> 
					<?php else: 
						if(empty($list->image)) { $list->image="modules/mod_otclientlogosscroller/assets/images/sampledefault.jpg"; }
						$ot_url[0]=str_replace('"','',@$ot_url[0]);
					?>	
						<div class="col-ot-<?php echo $ot_number; ?>" data-toggle="tooltip"  data-original-title="<?php echo $ot_title[1]; ?>" >       						
							<a target="<?php echo $ot_target; ?>"  href="<?php echo $ot_url[0]; ?>"><img src="<?php echo $list->image; ?>" /></a>						
						</div> 
					<?php endif; ?>
				<?php } ?>	
				<?php endforeach; ?>
			</div>
			<?php /* REMOVING Copyright warning 
			The Joomla module: OT Client Logos Scroller is free for all websites. We're welcome any developer want to contributes the module. But you must keep our credits that is the very tiny image under the module. If you want to remove it, you may visit http://www.omegatheme.com/member/signup/additional to purchase the Removing copyrights, then you can free your self to remove it. Thank you very much. Omegatheme.com
			*/?>
			<a href="http://wwww.omegatheme.com" class="omega-powered" title="Powered by Omegatheme.com">
			<img src="<?php JURI::base()?>modules/mod_otclientlogosscroller/assets/images/powered_icon.png" alt="Joomla Module OT Client Logos Scroller powered by OmegaTheme.com">
			</a>
			<?php /*********/ ?>
		</div>
		
	<?php endif; ?>
<?php } ?>
	