<?php 

defined('_JEXEC') or die;
include("style.php");
?>
<div id="j_fancytestimonial_<?php echo $module->id; ?>" class="j_fancytestimonial">
    
<ul class="bxslider">
<?php if ($contenttopbottom == 'down'){ ?>
                <?php
                foreach ($lists as $list) {
                    $star = $list->star; ?>
                    <li > <div class="j_list">
                            <div class="j_info">
                            <?php if (isset($list->image) && $list->image != '') { ?>
                                    <div class="j_image">
                                        <img  src="<?php echo JUri::root() . '' . $list->image; ?>" class="cont-img">
                                    </div>
                                    <?php } ?>
                                <div class="">
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
                                <div class="j_title">
                                <?php echo $list->title; ?>
                                </div>                     
                            </div>
                       </div> </li>
                <?php } ?> 
                 
                <?php }else{ ?>
                <?php
                foreach ($lists as $list) {
                    $star = $list->star; ?>
                    <li > <div class="j_list">
                            <div class="j_fancytcontent">
                                <div class="j_title">
                                <?php echo $list->title; ?>
                                </div>                     
                            </div>
                            <div class="arrow-down1"></div>
                            <div class="j_info">
                            <?php if (isset($list->image) && $list->image != '') { ?>
                                    <div class="j_image">
                                        <img  src="<?php echo JUri::root() . '' . $list->image; ?>" class="cont-img">
                                    </div>
                                    <?php } ?>
                                <div class="">
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
                       </div> </li>
                <?php } ?> 
                
                <?php } ?>             
   
</ul>
          
                       </div>
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
