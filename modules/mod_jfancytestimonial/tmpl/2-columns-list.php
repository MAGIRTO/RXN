<?php 

defined('_JEXEC') or die;
include("style.php");
?>
<ul class="bxslider">
<div id="j_fancytestimonial_<?php echo $module->id; ?>" class="j_fancytestimonial">
    <div  class="carousel clearfix"  >
                <?php
                $i = 0;
                foreach ($lists as $list) {
                    $i++;
                    $star = $list->star; ?>
                    
                  <?php  if($contenttopbottom == 'down'){   ?>
                    
        <?php if($i%2==1){ ?>
        <li > <div style='width:100%;float: left;'>
        <?php } ?>
                     <div class="j_list" style="width:49%;float: left;padding-left: 5px;">
                            <div class="j_info">
                            
                                        <div class="j_fancyaditional">
                                        <?php if (isset($list->name) && $list->name != '') { ?>
                                        <div class="j_name">
                                        <?php echo $list->name; ?>
                                        </div>
                                        <?php } ?>
                                        <?php if (isset($list->work) && $list->work != '') { ?>
                                        <div class="j_work">
                                        <?php echo $list->work; ?>
                                        </div>
                                        <?php } ?>
                                        <div class="j_ratting">
                                        <?php for ($j = 0; $j < $star; $j++) { ?>
                                        <i class="glyphicon glyphicon-star"></i> 
                                        <?php } ?>
                                        </div>       
                                    </div>
                            </div>
                            <div class="arrow-down"></div>
                            <div class="j_fancytcontent">
                                <?php if (isset($list->image) && $list->image != '') { ?>
                                    <div class="j_image">
                                        <img  src="<?php echo JUri::root() . '' . $list->image; ?>" class="cont-img" >
                                    </div>
                                    <?php } ?>
                                <p class="j_title" style="z-index:999;">
                                <?php echo $list->title; ?>
                                </p>                     
                            </div>
                     </div> 
            <?php if($i%2==0){ ?>
        </div></li>
        <?php } ?>
        
        
        <?php }else{ ?>
        
        
         <?php if($i%2==1){ ?>
        <li > <div style='width:100%;float: left;'>
        <?php } ?>
                     <div class="j_list clearfix" style="width:49%;float: left;padding-left: 5px;">
						<div style="position:relative" class="clearfix">
                        <div class="j_fancytcontent">
                                <?php if (isset($list->image) && $list->image != '') { ?>
                                    <div class="j_image">
                                        <img  src="<?php echo JUri::root() . '' . $list->image; ?>" class="cont-img" >
                                    </div>
                                    <?php } ?>
                                <p class="j_title" style="z-index:999;">
                                <?php echo $list->title; ?>
                                </p>                     
                            </div>
                        <div class="arrow-down1"></div>
                        </div>
						<div class="j_info">
                            
                                        <div class="j_fancyaditional">
                                        <?php if (isset($list->name) && $list->name != '') { ?>
                                        <div class="j_name">
                                        <?php echo $list->name; ?>
                                        </div>
                                        <?php } ?>
                                        <?php if (isset($list->work) && $list->work != '') { ?>
                                        <div class="j_work">
                                        <?php echo $list->work; ?>
                                        </div>
                                        <?php } ?>
                                        <div class="j_ratting">
                                        <?php for ($j = 0; $j < $star; $j++) { ?>
                                        <i class="glyphicon glyphicon-star"></i> 
                                        <?php } ?>
                                        </div>       
                                    </div>
                            </div>
						
                     </div> 
            <?php if($i%2==0){ ?>
        </div></li>
        <?php } ?>
        
        
        <?php } ?>
        
        
        
                <?php } ?>             
    </div>
</div>
</ul>
<script>
    
    jQuery(document).ready(function(){
    jQuery('.bxslider').bxSlider({
    slideWidth: 870,
    minSlides: 1,
    maxSlides: 1,
   
  });
	    var autorun = '<?php echo $autorun ?>';
           if( autorun == 'yes' ){
           setInterval(function(){ 
           jQuery(".bx-next").click();
           },5000);
           }
});
    
</script>
