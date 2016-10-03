<style>
.j_fancytcontent{ background:<?php echo $background; ?>;padding:<?php echo $padding; ?>px;margin:<?php echo $margin; ?>px;}
.j_fancytestimonial .j_name {font-weight: <?php echo $nameweight; ?>; font-size:<?php echo $namesize; ?>px; color:<?php echo $namecolor; ?>;}
.j_fancytestimonial .j_work {font-weight: <?php echo $workweight; ?>; font-size:<?php echo $worksize; ?>px; color:<?php echo $workcolor; ?>;}
.j_title {
	border-radius: 0;
	margin<?php echo $contenttextmargin; ?>px;
	position: relative;
	font-style:<?php echo $contenttextstyle; ?>;
	padding:<?php echo $contenttextpadding; ?>px;
	font-size:<?php echo $contenttextsize; ?>;
	color:<?php echo $contenttextcolor; ?>;
	}
.arrow-down {
	border-left:<?php echo $arrowwidth; ?>px solid transparent;
	border-right:<?php echo $arrowwidth; ?>px solid transparent;
	border-bottom:<?php echo $arrowwidth; ?>px solid <?php echo $arrowbackground; ?>;
	height: 0;
	margin: 0 0 0 <?php echo $arrowmargin; ?>px;
	width: 0;}

.arrow-down1{
	border-left:<?php echo $arrowdownwidth; ?>px solid transparent;
	border-right:<?php echo $arrowdownwidth; ?>px solid transparent;
	border-top:<?php echo $arrowdownwidth; ?>px solid <?php echo $arrowdownbackground; ?>;
	height: 0;
	margin: 0 0 0 <?php echo $arrowdownmargin; ?>px;
	width: 0;}

.cont-img{width:<?php echo $contentimagewidth; ?>px; height:<?php echo $contentimageheight; ?>px;position:<?php if($contentimagevisible == 'Yes'){echo "absolute";}else{ echo "relative";}; ?>;opacity:<?php echo $contentimageopacity; ?>; float:left; margin-right:10px;}

.bx-pager{ display:<?php if ($autorun == 'no' ){echo 'none';} ?>}
.bx-wrapper .bx-viewport{ box-shadow: 0 0 <?php echo $viewportshadowpx; ?>px <?php echo $viewportshadowcolor; ?>;border:  <?php echo $viewportborderpx; ?>px solid <?php echo $viewportbordercolor; ?>;left: -5px;background: <?php echo $viewportbackgroundcolor; ?>;/*fix other elements on the page moving (on Chrome)*/-webkit-transform: translatez(0);-moz-transform: translatez(0);-ms-transform: translatez(0);-o-transform: translatez(0);transform: translatez(0);}
.bx-wrapper{}
</style>