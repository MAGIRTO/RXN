<?php
/*------------------------------------------------------------------------
# mod_smetwittersidebar - SME Twitter Sidebar
# ------------------------------------------------------------------------
# @author - Social Media Extensions
# @copyright - All rights reserved by Social Media Extensions
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://www.socialmediaextensions.com/
# Technical Support:  admin@socialmediaextensions.com
-------------------------------------------------------------------------*/
// no direct access
defined( '_JEXEC' ) or die;
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_smetwittersidebar/assets/style.css');
//all parameters
$userName = $params->get('userName');
$widgetId = $params->get('widgetId');
$width = $params->get('width');
$height = $params->get('height');
$widgetTheme = $params->get('widgetTheme');
$linkColor = $params->get('linkColor');
$borderColor = $params->get('borderColor');
$count = $params->get('count');
$border = $params->get('border');
$scrollbar = $params->get('scrollbar');
$footer = $params->get('footer');
$marginTop = trim($params->get('marginTop'));
$sidebarImage = $params->get('sidebarImage');
$jQuery = trim($params->get('jQuery'));
if ($jQuery == 1){
$document->addScript("http://code.jquery.com/jquery-latest.min.js");}
$print_twitter = '';
$print_twitter .= '<a class="twitter-timeline" data-theme="'.$widgetTheme.'" data-link-color="'.$linkColor.'" data-border-color="'.$borderColor.'"  data-chrome="'.$footer.$border.$scrollbar.'"  '.$count.'  href="https://twitter.com/'.$userName.'" data-widget-id="'.$widgetId.'" width="'.$width.'" height="'.$height.'">Tweets by @'.$userName.'</a>
<script type="text/javascript">!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';
$print_twitter .= '<div style="font-size: 9px; color: #808080; font-weight: normal; font-family: tahoma,verdana,arial,sans-serif; line-height: 1.28; text-align: right; direction: ltr;"><a href="http://employersinfosource.com/" target="_blank" style="color: #808080;" title="Visit the website">Seattle Employment Verification</a></div>';
?>
<div id="sme_twitter_sidebar" class="<?php echo $params->get('moduleclass_sfx');?>">
	<div id="twbox1" style="right: -<?php echo trim($width+10);?>px; top: <?php echo $marginTop;?>px; z-index: 10000; height:<?php echo trim($height);?>px;">
		<div id="twbox2" style="text-align: left;width:<?php echo trim($width);?>px;height:<?php echo trim($height);?>;">
			<a class="open" id="twlink" href="#"></a><img style="top: 0px;left:-40px;" src="modules/mod_smetwittersidebar/assets/<?php echo $sidebarImage;?>.png" alt="">
			<?php echo $print_twitter; ?>
		</div>
	</div>
</div>
<script type="text/javascript">
jQuery.noConflict();
jQuery(function (){
jQuery(document).ready(function()
{
jQuery.noConflict();
jQuery(function (){
jQuery("#twbox1").hover(function(){ 
jQuery('#twbox1').css('z-index',101009);
jQuery(this).stop(true,false).animate({right:  0}, 500); },
function(){ 
	jQuery('#twbox1').css('z-index',10000);
	jQuery("#twbox1").stop(true,false).animate({right: -<?php echo trim($width+10); ?>}, 500); });
});}); });
jQuery.noConflict();
</script>