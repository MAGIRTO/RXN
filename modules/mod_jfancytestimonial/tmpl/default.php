<?php 

defined('_JEXEC') or die;
include("style.php");
?>
<div id="j_testimonial_<?php echo $module->id; ?>" class="j_fancytestimonial">
    <div  class="carousel "  >
                <?php
                $i = 0;
                foreach ($lists as $list) {
                    $star = $list->star; ?>
                    
                    
                    <?php  if($contenttopbottom == 'down'){   ?>
                     <div class="j_list clearfix">
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
                                    
                                        <img  src="<?php echo JUri::root() . '' . $list->image; ?>" class="cont-img" >
                                   
                                    <?php } ?>
                                <p class="j_title" style="z-index:999;">
                                 <?php echo $list->title; ?>
                                </p>                     
                            </div>
                       </div> 
                       
                       <?php }else{ ?>
                       
                            <div class="j_list clearfix">
                            <div class="j_fancytcontent">
                                <?php if (isset($list->image) && $list->image != '') { ?>
                                    
                                        <img  src="<?php echo JUri::root() . '' . $list->image; ?>" class="cont-img" >
                                   
                                    <?php } ?>
                                <p class="j_title" style="z-index:999;">
                                 <?php echo $list->title; ?>
                                </p>                     
                            </div>
                            <div class="arrow-down1"></div>
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
                       
                       <?php } ?>
                <?php } ?>             
    </div>
</div>
