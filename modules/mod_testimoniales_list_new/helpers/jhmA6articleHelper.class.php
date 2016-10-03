<?php
/**
* @title		testimoniales list new
* @website		http://www.joomhome.com
* @copyright	Copyright (C) 2015 joomhome.com. All rights reserved.
* @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

    // no direct access
    defined('_JEXEC') or die('Restricted access');
	
    class jhmA6articleHelper
    {
        public $name = 'Article';
        public $uniqid   = 'a6article';
        public $fieldname;
        public $params;
        public function setOptions()
        {
            $html = array();
            $html[] = array(
                'title'=>'Article <span style="display: initial;color:red;">(* Required field)</span>',
                'tip'=>'Select an article',
                'tipdesc'=>'Choose an article from source',
                'class'=>'select-'.$this->uniqid,
                'attrs'=>'',
                'html'=>'
                <input readonly="readonly" type="text" value="'.$this->params['title'].'" ref="title" id="'.$this->uniqid.'-slider-article-item-%index%" 
                name="jform[params]['.$this->fieldname.']['.$this->uniqid.'][title][]" class="'.$this->uniqid.'-slider-item">

                <input type="hidden"  value="'.$this->params['id'].'" id="'.$this->uniqid.'-slider-articleid-item-%index%" 
                name="jform[params]['.$this->fieldname.']['.$this->uniqid.'][id][]" class="'.$this->uniqid.'-slider-item">

                <a class="model btn" ref="{article: \\\''.$this->uniqid.'-slider-article-item-%index%\\\', id: \\\''.$this->uniqid.'-slider-articleid-item-%index%\\\'}" class="'.$this->uniqid.'-slide-item-select" title="Select" href="index.php?option=com_content&view=articles&layout=modal&tmpl=component&function=spSelectArticle" rel="{handler: \\\'iframe\\\', size: {x: 800, y: 500}}">Select</a>'
            );

            $html[] = array(
                'title'=>'Text Limit',
                'tip'=>'Text limit type',
                'tipdesc'=>'Choose text limit type',
                'class'=>$this->uniqid.'-slider-title-type-li',
                'attrs'=>'',
                'html'=>'
                <select class="'.$this->uniqid.'-slider-textlimit" name="jform[params]['.$this->fieldname.']['.$this->uniqid.'][textlimit][]">
                <option value="no" '.(($this->params['textlimit']=='no')?'selected':'').'>No limit</option>
                <option value="word" '.(($this->params['textlimit']=='word')?'selected':'').'>Word</option>
                <option value="char" '.(($this->params['textlimit']=='char')?'selected':'').'>Character</option>
                </select>'
            );


            $html[] = array(
                'title'=>'Limit Count',
                'tip'=>'Text limit count',
                'tipdesc'=>'Text limit count',
                'class'=>''.$this->uniqid.'-slider-title-li',
                'attrs'=>(($this->params['textlimit']=='no' or !isset($this->params['textlimit']))?' style="display: none;"':'  style="display: block;"'),
                'html'=>'
                <input type="text" value="'.$this->params['limitcount'].'" name="jform[params]['.$this->fieldname.']['.$this->uniqid.'][limitcount][]">'
            );

            $html[] = array(
                'title'=>'Readmore Text',
                'tip'=>'Readmore text',
                'tipdesc'=>'Write readmore text',
                'class'=>''.$this->uniqid.'-slider-title-li',
                'attrs'=>'',
                'html'=>'
                <input type="text" value="'.$this->params['readmore'].'"   
                name="jform[params]['.$this->fieldname.']['.$this->uniqid.'][readmore][]">'
            );

            $html[] = array(
                'title'=>'State',
                'tip'=>'Set State',
                'tipdesc'=>'Published or unpublished slide item',
                'class'=>''.$this->uniqid.'-slider-item-li',
                'attrs'=>'',
                'fieldname'=>'text',
                'html'=>'
                <select class="jhm-state" name="jform[params]['.$this->fieldname.']['.$this->uniqid.'][state][]">
                <option value="published" '.(($this->params['state']=='unpublished')?'selected':'').'>Published</option>
                <option value="unpublished" '.(($this->params['state']=='unpublished')?'selected':'').'>UnPublished</option>
                </select>'
            );
            return $html;
        }


        public function styleSheet()
        {
            return '';
        }




        private function JS3()
        {




            return 'var jhm_item_opened;

            function spSelectArticle(id, title, cid, $null, url){
                var data = jQuery("body").data("article");
                jQuery("#"+data.id).val(id);
                jQuery("#"+data.article).val(title).focus();
                SqueezeBox.close();
            }

            jQuery(document).ready(function(){

            //Joomla 3.1
            jQuery("#moduleOptions").delegate("a.model", "mouseenter", function(event){
                eval( "var $callerData=(" + jQuery(this).attr("ref") + ")" );
                jQuery("body").data("article", $callerData );
            });

            //Joomla 3.2
            jQuery("#attrib-sliders").delegate("a.model", "mouseenter", function(event){
                eval( "var $callerData=(" + jQuery(this).attr("ref") + ")" );
                jQuery("body").data("article", $callerData );
            });

            });


            window.addEvent("domready",function(){

            $(document.body).addEvent("change:relay(.'.$this->uniqid.'-slider-title-custom)", function(event, element) {
            if( this.get("value")=="custom" )
            {
            this.getParent().getPrevious().getChildren("[ref=\'title\']").set("readonly","readonly");
            this.getParent().getNext().setStyle("display","block");
            } else {
            this.getParent().getPrevious().getChildren("[ref=\'title\']").set("readonly","");
            this.getParent().getNext().setStyle("display","none");
            }
            });

            $(document.body).addEvent("change:relay(.'.$this->uniqid.'-slider-image-type-custom)", function(event, element) {

            if( this.get("value")=="yes" )
            {
            this.getParent().getNext().setStyle("display","block");
            this.getParent().getNext().getNext().setStyle("display","block");
            } else {
            this.getParent().getNext().setStyle("display","none");
            this.getParent().getNext().getNext().setStyle("display","none");
            }


            });

            $(document.body).addEvent("change:relay(.'.$this->uniqid.'-slider-textlimit)", function(event, element) {

            if( this.get("value")=="no" )
            {
            this.getParent().getNext().setStyle("display","none");
            } else {
            this.getParent().getNext().setStyle("display","block");
            }
            });


            $(document.body).addEvent("change:relay(.'.$this->uniqid.'-slider-striphtml)", function(event, element)
            {

            if( this.get("value")=="no" )
            {
            this.getParent().getNext().setStyle("display","none");
            } else {
            this.getParent().getNext().setStyle("display","block");
            }


            });



            $(document.body).addEvent("change:relay(.'.$this->uniqid.'-slider-showlink)", function(event, element)
            {
            if( this.get("value")=="custom" )
            {
            this.getParent().getNext().setStyle("display","block");
            } else {
            this.getParent().getNext().setStyle("display","none");
            }
            });

            });';

        }


        private function JS2()
        {



            return 'var jhm_item_opened;

            function spSelectArticle(id, title, cid, $null, url)
            {

            var data = jQuery("body").data("article");

            $(data.article).set("value", title);
            $(data.id).set("value", id);
            $(data.article).focus();
            SqueezeBox.close();
            }



            jQuery(function($){


            $("ul.adminformlist").delegate("a.model", "mouseenter", function()
            {


            eval( "var $callerData=(" + $(this).attr("ref") + ")" );
            $("body").data("article", $callerData );


            });


            });


            window.addEvent("domready",function() {

            $(document.body).addEvent("change:relay(.'.$this->uniqid.'-slider-title-custom)", function(event, element) {
            if( this.get("value")=="custom" )
            {
            this.getParent().getPrevious().getChildren("[ref=\'title\']").set("readonly","readonly");
            this.getParent().getNext().setStyle("display","block");
            } else {
            this.getParent().getPrevious().getChildren("[ref=\'title\']").set("readonly","");
            this.getParent().getNext().setStyle("display","none");
            }
            });

            $(document.body).addEvent("change:relay(.'.$this->uniqid.'-slider-image-type-custom)", function(event, element) {

            if( this.get("value")=="yes" )
            {
            this.getParent().getNext().setStyle("display","block");
            this.getParent().getNext().getNext().setStyle("display","block");
            } else {
            this.getParent().getNext().setStyle("display","none");
            this.getParent().getNext().getNext().setStyle("display","none");
            }


            });

            $(document.body).addEvent("change:relay(.'.$this->uniqid.'-slider-textlimit)", function(event, element) {

            if( this.get("value")=="no" )
            {
            this.getParent().getNext().setStyle("display","none");
            } else {
            this.getParent().getNext().setStyle("display","block");
            }
            });


            $(document.body).addEvent("change:relay(.'.$this->uniqid.'-slider-striphtml)", function(event, element)
            {

            if( this.get("value")=="no" )
            {
            this.getParent().getNext().setStyle("display","none");
            } else {
            this.getParent().getNext().setStyle("display","block");
            }


            });



            $(document.body).addEvent("change:relay(.'.$this->uniqid.'-slider-showlink)", function(event, element)
            {
            if( this.get("value")=="custom" )
            {
            this.getParent().getNext().setStyle("display","block");
            } else {
            this.getParent().getNext().setStyle("display","none");
            }
            });

            });


            ';

        }

        public function JavaScript()
        {
            return ( JVERSION < 3 ) ? $this->JS2() : $this->JS3() ;
        }


        public function display($helper)
        {

            $article = $helper->getArticle($this->params['id']);

  //          $article['title'] = ($this->params['titletype']=='yes')?$this->params['customtitle']:$article['title'];
            if( isset($article['images']) and !empty($article['images']) )
            {
                $artimages = json_decode($article['images'],true);
                $image = $artimages['image_intro'];
                $thumb = $artimages['image_fulltext'];
            }  else { $image=''; $thumb=''; }

            $this->params['image'] = $image;
            $this->params['thumb'] = $thumb;

     //       if($this->params['showlink'] =='custom'){
     //           $article['link'] = $this->params['link'];
      //      }

            return $article+$this->params;
        }
}