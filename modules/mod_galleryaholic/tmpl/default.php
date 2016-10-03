<?php
/*-------------------------------------------------------------------------------
# mod_galleryaholic - GalleryAholic for Joomla 3.x v1.5.2-PRO
# -------------------------------------------------------------------------------
# author    GraphicAholic
# copyright Copyright (C) 2011-2015 GraphicAholic.com. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://www.graphicaholic.com
--------------------------------------------------------------------------------*/
// No direct access
defined('_JEXEC') or die('Restricted access');
$document =& JFactory::getDocument();
$path			= $params->get('path');
$showTitle	= $params->get('showTitle', 1);
$gridLayout	= $params->get('gridLayout');
if($gridLayout == "1") $gridLayout = "grid";
if($gridLayout == "2") $gridLayout = "gridempty";
$flickrAPI	= $params->get('flickrAPI');
$flickrSecret	= $params->get('flickrSecret', '');
$flickrToken	= $params->get('flickrToken', '');
$flickrPrivate	= $params->get('flickrPrivate', 0);
$flickrSet	= $params->get('flickrSet');
$flickrNumber	= $params->get('flickrNumber', '');
$flickrThumb	= $params->get('flickrThumb');
if($flickrThumb == "1") $flickrThumb = "small";
if($flickrThumb == "2") $flickrThumb = "medium";
if($flickrThumb == "3") $flickrThumb = "large";
$flickrTitle	= $params->get('flickrTitle', 1);
$flickrDesc	= $params->get('flickrDesc', 1);
$flickrCache	= $params->get('flickrCache', 1);
$picasaUser	= $params->get('picasaUser', "");
$user_albumid	= $params->get('user_albumid');
$photoSize	= $params->get('photoSize');
$picasaPhoto	= $params->get('picasaPhoto');
$picasaTitle	= $params->get('picasaTitle', 1);
$picasaDesc	= $params->get('picasaDesc', 1);
$folderCache	= $params->get('folderCache', 0);
$downloadImage	= $params->get('downloadImage');
if($downloadImage == "0") $downloadImage = "caption";
if($downloadImage == "1") $downloadImage = "title";
$imgGrayscale	= $params->get('imgGrayscale');
if($imgGrayscale == "0") $imgGrayscale = "nograyscale";
if($imgGrayscale == "1") $imgGrayscale = "grayscale";
$lightbox		= $params->get('lightbox');
if($lightbox == "0") $lightbox = "";
if($lightbox == "1") $lightbox = "a ";
$metaTag	= $params->get('metaTag');
$index=0;
?>
<script type="text/javascript">
jQuery(document).ready(function() {
	//blocksit define
	jQuery(window).load( function() {
		jQuery('#container<?php echo $moduleID ?>').BlocksIt({
			numOfCol: <?php echo $params->get('numberCol') ?>,
			offsetX: <?php echo $params->get('LRoffset') ?>,
			offsetY: <?php echo $params->get('TBoffset') ?>,
			blockElement: '.<?php echo $gridLayout ?>'
		});
	});
	//window resize
	var currentWidth = 1100;
	jQuery(window).resize(function() {
		var winWidth = jQuery(window).width();
		var conWidth;
		if(winWidth < 660) {
			conWidth = 440;
			col = <?php echo $params->get('smallCol') ?>;
		} 
		else if(winWidth < 880) {
			conWidth = 660;
			col = <?php echo $params->get('medCol') ?>;
		} else if(winWidth < 1100) {
			conWidth = 880;
			col = <?php echo $params->get('largeCol') ?>;
		} else {
			conWidth = 1100;
			col = <?php echo $params->get('numberCol') ?>;
		}
		if(conWidth != currentWidth) {
			currentWidth = conWidth;
			jQuery('#container<?php echo $moduleID ?>').width(conWidth);
			jQuery('#container<?php echo $moduleID ?>').BlocksIt({
			numOfCol: col,
			offsetX: <?php echo $params->get('LRoffset') ?>,
			offsetY: <?php echo $params->get('TBoffset') ?>
			});
		}
	});
	//window load for small screen devices
	var currentWidth = 1100;
	jQuery(window).load(function() {
		var winWidth = jQuery(window).width();
		var conWidth;
		if(winWidth < 660) {
			conWidth = 440;
			col = <?php echo $params->get('smallCol') ?>;
		} else if(winWidth < 880) {
			conWidth = 660;
			col = <?php echo $params->get('medCol') ?>;
		} else if(winWidth < 1100) {
			conWidth = 880;
			col = <?php echo $params->get('largeCol') ?>;
		} else {
			conWidth = 1100;
			col = <?php echo $params->get('numberCol') ?>;
		}
		if(conWidth != currentWidth) {
			currentWidth = conWidth;
			jQuery('#container<?php echo $moduleID ?>').width(conWidth);
			jQuery('#container<?php echo $moduleID ?>').BlocksIt({
			numOfCol: col,
			offsetX: <?php echo $params->get('LRoffset') ?>,
			offsetY: <?php echo $params->get('TBoffset') ?>
			});
		}
	});
});
</script>
<script type="text/javascript">
<?php if ($downloadImage == "caption") : ?>
jQuery(".fancybox")
    .attr('rel', 'gallery')
    .fancybox({
        beforeLoad: function() {
            this.title = jQuery(this.element).attr('caption');
        }
    });
<?php elseif ($downloadImage == "title") : ?>
jQuery(".fancybox").fancybox({
    afterLoad: function() {
        this.title = '<a href="' + this.href + '" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a> ' + this.title;
    },
    helpers : {
        title: {
            type: 'inside'
        }
    }
});
<?php endif ; ?>
</script>
<!-- Content -->
<style type="text/css">
<?php if ($gridLayout == "grid") : ?>
#container<?php echo $moduleID ?>{position: relative; margin-bottom:<?php echo $params->get('bottomMargin') ?>px !important;}
.grid<?php echo $moduleID ?>{background: <?php echo $params->get('gridColor') ?> !important; padding: <?php echo $params->get('LRoffset') ?>px;}
.grid .desc<?php echo $moduleID ?> p{font-size: 12px; color:<?php echo $params->get('descColor') ?> !important; margin-bottom: 0px;}
.grid strong<?php echo $moduleID ?>{margin:10px 0; padding:0 0 5px; font-size:<?php echo $params->get('fontSize') ?>; font-weight: bold; color:<?php echo $params->get('titleColor') ?> !important;}
.grid .meta<?php echo $moduleID ?> {border-top:1px solid #ccc; text-align: right; font-size: 10px; color:<?php echo $params->get('metaColor') ?> !important;}
@media only screen and (max-width: 660px) {
#container<?php echo $moduleID ?>,.imgholder img<?php echo $moduleID ?> {
	position: relative !important;
	max-width: 100%;
}
	float: left;
	width: auto !important;
}
<?php elseif ($gridLayout == "gridempty") : ?>
#container<?php echo $moduleID ?>{position: relative; margin-bottom:<?php echo $params->get('bottomMargin') ?>px !important;}
.gridempty<?php echo $moduleID ?>{padding: <?php echo $params->get('LRoffset') ?>px; margin: <?php echo $params->get('TBoffset') ?>px;}
.gridempty strong<?php echo $moduleID ?>{line-height: 22px; padding:0 0 5px; font-size:<?php echo $params->get('fontSize') ?>; font-weight: bold; color:<?php echo $params->get('titleColor') ?> !important;}
.gridempty .desc<?php echo $moduleID ?> p{color:<?php echo $params->get('descColor') ?> !important;}
.gridempty .meta<?php echo $moduleID ?> {text-align: right; font-size: 10px; color:<?php echo $params->get('metaColor') ?> !important;}
@media only screen and (max-width: 660px) {
#container<?php echo $moduleID ?>, .imgholder img<?php echo $moduleID ?> {
	position: relative !important;
	max-width: 100% !important;
}
	
	width: auto !important;
}
<?php endif ; ?>
</style>
	<!--Flickr Photos-->
	<?php if ($imageFeed == "2"): ?>
		<div style="position:relative" id="container<?php echo $moduleID ?>">
		<?php
 		require_once("flickr/phpFlickr.php");
		if($flickrPrivate =="1") {			
 			$f = new phpFlickr("$flickrAPI", "$flickrSecret");
 			$f->setToken("$flickrToken");				
			}
		if($flickrPrivate =="0") {
 			$f = new phpFlickr("$flickrAPI");
			}
 			$ph_sets = $f->photosets_getList();
		if($flickrCache =="1") {
			$cacheFolderPath = JPATH_SITE.DS.'cache'.DS.'GalleryAholic-'.$moduleTitle.'';
			if (file_exists($cacheFolderPath) && is_dir($cacheFolderPath))
			{
			// all OK
			}
			else
			{
			mkdir($cacheFolderPath);
			}
			$lifetime = 860 * 860; // 60 * 60=One hour
			$f->enableCache("fs", "$cacheFolderPath", "$lifetime");
			}
		?>
			<?php $photos = $f->photosets_getPhotos($flickrSet, NULL, NULL, $flickrNumber); ?>
			<?php foreach ($photos['photoset']['photo'] as $photo): $d = $f->photos_getInfo($photo['id']); ?>
		<div class="<?php echo $gridLayout ?>">
			<div class="imgholder">
			<<?php echo $lightbox; ?>class="fancybox" <?php echo $downloadImage; ?>='<?= $photo['title'] ?>' rel="gallery" href="<?= $f->buildPhotoURL($photo, 'large') ?>"><img class="<?php echo $imgGrayscale ?>" src="<?= $f->buildPhotoURL($photo, ''.$flickrThumb.'') ?>" /></a>
			</div>
		<?php if ($flickrTitle == "1") : ?>
		<strong<?php echo $moduleID ?>><?= $photo['title'] ?></strong<?php echo $moduleID ?>>
		<?php elseif ($flickrTitle == "0") : ?>
		<blank></blank>
		<?php endif ; ?>
		<?php if ($flickrDesc == "1") : ?>
		<div class="desc<?php echo $moduleID ?>"><p><?= $d['photo']['description']['_content'] ?></p></div>
			<?php elseif ($flickrDesc == "0") : ?>
		<blank></blank>
		<?php endif ; ?>		
		<div class="meta<?php echo $moduleID ?>"><?php echo $params->get('flickrTag') ?></div>
		</div>
  		<?php endforeach; ?>
		</div>
	<?php endif ; ?>
	<!--Google+ Photos-->
	<?php if ($imageFeed == "3"): ?>
	<div style="position:relative" id="container<?php echo $moduleID ?>">
        <?php
        require_once dirname(__FILE__) . '/picasa/phpPicasahelper.php';
        $gallery=new phpPicasahelper();
        $user_picasaweb="$picasaUser";
        $useralbumid="$user_albumid";
        if (isset($_GET['pic']) AND $_GET['pic']!="") {
            echo "<img src=\"" . $_GET['pic'] . "\" alt=\"\"/>";
        }
        else {
            $albums=$gallery->getPictures($user_picasaweb,$useralbumid, "".$photoSize."".$picasaPhoto."", "".$photoSize."".$picasaPhoto."");
            foreach ($albums AS $key=>$value) {
                if ($value['title'] != "") {
                echo "<div class='<?php echo $gridLayout ?>'>";
                echo "<div class='imgholder'>";
                echo "<".$lightbox."class='fancybox' caption='" . $value['title'] . "' rel='group' href=\"" . $value['thumbnail'] . "\" alt=\"" . $value['title'] . "\"><img class=" . $imgGrayscale . " src=\"" . $value['thumbnail'] . "\" alt=\"" . $value['title'] . "\"></a>";
            echo "</div>";
        ?>
	<?php if ($picasaTitle == "1"): ?>
            <strong<?php echo $moduleID ?>><?php echo $value['title'] ?></strong<?php echo $moduleID ?>>
            <?php if ($value['caption'] != "") { ?>
            <?php if ($picasaDesc == "1") { ?>
            <div class="desc<?php echo $moduleID ?>"><p><?php echo $value['caption'] ?></p></div>
            <?php } ?>
            <?php } ?>
            <div class="meta<?php echo $moduleID ?>"><?php echo $params->get('picasaTag') ?></div>
            </div>
	<?php endif ; ?>
	<?php if ($picasaTitle == "0"): ?>
            <strong></strong>
            <?php if ($value['caption'] != "") { ?>
            <?php if ($picasaDesc == "1") { ?>
            <div class="desc<?php echo $moduleID ?>"><p><?php echo $value['caption'] ?></p></div>
            <?php } ?>
            <?php } ?>
            <div class="meta<?php echo $moduleID ?>"><?php echo $params->get('picasaTag') ?></div>
            </div>
	<?php endif ; ?>
        <?php
                }
            }
        }
	echo "</div>"; ?>
	<?php endif ; ?>
	<!--Joomla Category-->
	<?php if ($imageFeed == "5"): ?>
	<?php
		if(!empty($list)){
		$readmore_display		= (int)$params->get('item_readmore_display');
	?>	
			<div style="position:relative" id="container<?php echo $moduleID ?>">
			<?php  $j= 0; 
			foreach($list as $item){  $j++;  ?>
			<div class="<?php echo $gridLayout ?>" data-size="<?php echo $item->created_by_alias; ?><?php if($item->featured) { echo $params->get('catFeatured'); } ?>">
				<div class="imgholder">
					<?php
					$imgattr = '';
					$imgsrc = $item->image_src;
					if($imgsrc) { ?>
					<<?php echo $lightbox ?>class="fancybox" class="image" <?php echo $downloadImage; ?>="<?php echo $item->title ?>" rel="gallery" href="<?php echo $imgsrc ?>"><img class="<?php echo $imgGrayscale ?>" img class="span.rollover" src="<?php echo $imgsrc ?>" alt="<?php echo $item->title ?>" <?php echo $imgattr.' '.$item->image_attr ?> /></a>
					<?php if($item->n != '' || $item->h != '') { ?>	
					</div>
						<?php } ?>
					<?php } ?>
					<?php
					$show_infor = $item->sub_title != '' ||  $item->_description != '' || $item->tags != '' || $readmore_display;
					if($show_infor) {	?>
						<?php if($item->sub_title != '') {?>
							<a href="<?php echo $item->link ?>" title="<?php echo $item->title; ?>" <?php echo $item->link_target; ?>>
								<strong<?php echo $moduleID ?>><?php echo $item->sub_title; ?></strong<?php echo $moduleID ?>>
							</a>
						<?php }
						if($item->_description != '') {?>
						<div class="desc<?php echo $moduleID ?>">
							<?php echo $item->_description; ?>
						</div>
						<?php }
						if($item->tag_id != ''){?>
						<div class="gridjtags">
							<?php echo $item->tag_id; ?>
						</div>	
						<?php }
						if($readmore_display){?>
						<a href="<?php echo $item->link ?>" title="<?php echo $item->title; ?>"  <?php echo $item->link_target; ?>>
							<?php echo JText::_('Read more...'); ?>
						</a>
						<?php }
						?>
						<div class="meta<?php echo $moduleID ?>">
							<?php if ($metaTag == "1") : ?>
							<?php echo $params->get('jCategoryTag') ?>
							<?php endif ; ?>
							<?php if ($metaTag == "2") : ?>
							<?php echo $params->get('prefixTag') ?>&nbsp;<?php echo $item->author; ?>
							<?php endif ; ?>
						</div>						
					<?php } ?>
				</div>
			</div>
			 <?php
			$clear = 'clr1';
			if ($j % 2 == 0) $clear .= ' clr2';
			if ($j % 3 == 0) $clear .= ' clr3';
			if ($j % 4 == 0) $clear .= ' clr4';
			if ($j % 5 == 0) $clear .= ' clr5';
			if ($j % 6 == 0) $clear .= ' clr6';
			?>
			<div class="<?php echo $clear; ?>"></div>
			<?php } ?>
		</div>
	<?php 
	}else{
	//	Do not display this message for guest.
	$user = JFactory::getUser();
	if(	$user->id ){
		echo JText::_('WARNING_LABEL');	
	}
	} ?>
	<?php endif ; ?>	
	<!--Joomla Folder Plus-->
	<?php if ($imageFeed == "6"): ?>	
	<div style="position:relative" id="container<?php echo $moduleID ?>">	
	<?php 
	$imagesJSON = new stdClass();
	if ($params->get('data_source.images')){
		$imagesJSON = json_decode($params->get('data_source.images'));
	}
	$folder = $params->get('data_source.folder');
	$images = array();
	foreach ($imagesJSON as $img){
		$images[$img->position] = $img;
	}
	ksort($images);
	foreach ($images as $k=>$image){	
		if ($params->get('thumbnail_mode') != 'none'){
			$imageCache = modGAprofileHelper::renderImage($folder.'/'.$image->image, $params);
		}else{
			$imageCache = JUri::base(true).'/'.$folder.'/'.$image->image;
		}		
	?>	
            <div class="<?php echo $gridLayout ?>" data-size="<?php echo $image->link; ?>">
            <div class="imgholder">
			<<?php echo $lightbox; ?>class="fancybox" <?php echo $downloadImage; ?>="<?php echo $image->title ?>" rel="gallery" href="<?php echo $imageCache ?>"><img class="<?php echo $image->gagray ?>" img src="<?php echo $imageCache ?>" alt="<?php echo $image->title ?>" /></a>
			</div>		
			<?php if($image->title != ""):?>			
		        <strong<?php echo $moduleID ?>><?php echo $image->title;?></strong<?php echo $moduleID ?>>
				<?php endif;?>	
			<?php if($image->description != ""):?>	
		        <div class="desc<?php echo $moduleID ?>"><p><?php echo htmlspecialchars_decode($image->description);?></p></div>
				<?php endif ?>	
			<?php if($image->tag != ""):?>
            <div class="meta<?php echo $moduleID ?>"><?php echo $image->tag ?></div>
			<?php endif ?>	
            </div>	
	<?php } ?>	
	</div>	
	<?php endif ; ?>	