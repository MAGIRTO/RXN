<?php
/**
 * @package 	OT Client Logos Scroller Module for Joomla! 3.3
 * @version 	$Id: otclientlogosscroller.php - Aug 2014 00:00:00Z OmegaTheme
 * @author 		OmegaTheme Extensions (services@omegatheme.com) - http://omegatheme.com
 * @copyright	Copyright(C) 2014 - OmegaTheme Extensions
 * @license 	http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
**/
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.html.html');
jimport('joomla.form.formfield');

class JFormFieldOtclientlogosscroller extends JFormField
{
  protected $type = 'Otclientlogosscroller';

  protected function getInput()
  {    
    // Initialize variables.
      JFactory::getDocument()->addStyleSheet(JURI::root().'modules/mod_otclientlogosscroller/assets/css/admin_otclientlogosscroller.css');

     // JHtml::_('behavior.framework');
      //JHtml::_('behavior.modal');
        JHtml::_('jquery.framework');
        JHTML::_('behavior.modal');

      $html = array();

      $class = !empty($this->class) ? ' class="' . $this->class . '"' : '';
      $disabled = !empty($this->disabled) ? ' disabled' : '';

      // Initialize JavaScript field attributes.
      $onchange = !empty($this->onchange) ? ' onchange="' . $this->onchange . '"' : '';
	  $tabtypes = array(
		  array('value' => '1', 'text' => JText::_('MOD_OTCONTENTACCORDION_FIELD_TYPE_MODULE')),
		  array('value' => '2', 'text' => JText::_('MOD_OTCONTENTACCORDION_FIELD_TYPE_ARTICLE')),
		  array('value' => '3', 'text' => JText::_('MOD_OTCONTENTACCORDION_FIELD_TYPE_CATEGORY'))
		);  
	  if(!empty($this->value[0]['type']) && $this->value[0]['type'] == 1) {
		  $ot_style="<style>.ot_category,.ot_article { display:none;}</style>";
	  } elseif(!empty($this->value[0]['type']) && $this->value[0]['type'] == 2) {
		  $ot_style="<style>.ot_module,.ot_category { display:none;}</style>";
	  }	else {
		 $ot_style="<style>.ot_module,.ot_article { display:none;}</style>"; 
	  }
      if(!empty($this->name)) $name = $this->name;
      if(!empty($this->id)) $id = $this->id;
      if(!empty($this->value[0]['type'])) $type = $this->value[0]['type'];
      $html[] = '
	    <div class="col">
		<label class="hasTooltip" title="'.JHtml::tooltipText('MOD_OTCONTENTACCORDION_FIELD_TYPE_DESC').'">'.JText::_('MOD_OTCONTENTACCORDION_FIELD_TYPE_LABEL').'</label>
          '.$this->getInputSelect($name.'[0][type]', $id .'_0_type', $tabtypes, $type).'
         </div>
		 <div class="clearfix"></div>
        <div class="tabs">'.$this->getTabsInput().'</div>
        <div id="tabs-template" class="hidden">'.$this->getTabsInput(true).'</div>
        <div class="clearfix"></div>
        <a class="tabAdd btn button btn-success" href="#"><span class="icon-plus"></span> </a>
        ';

      JFactory::getDocument()->addScriptDeclaration($this->getScript());
      return implode($html);
  }   

  protected function getTabsInput($is_template = false)
  {
    $html = array();
    if ($is_template){
      $html[] = '
        <div class="tab">
			<div class="ot_module">
			  <div class="col">
			  <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_OTSCROLLER_FIELD_AVATAR_DESC').'">'.JText::_('MOD_OTSCROLLER_FIELD_AVATAR_LABEL').'</label>
			  '.$this->getInputMedia($this->name.'[REPLACE][avatar]', $this->id .'_REPLACE_avatar','').'
			  </div>          
			  <div class="col">
			  <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_OTSCROLLER_FIELD_WEBSITE_DESC').'">'.JText::_('MOD_OTSCROLLER_FIELD_WEBSITE_LABEL').'</label>
			  '.$this->getInputText($this->name.'[REPLACE][website]', $this->id.'_REPLACE_website', '').'
			  </div>
			  <div class="col">
			  <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_OTSCROLLER_FIELD_TITLE_DESC').'">'.JText::_('MOD_OTSCROLLER_FIELD_TITLE_LABEL').'</label>
			  '.$this->getInputText($this->name.'[REPLACE][title]', $this->id.'_REPLACE_title', '').'
			  </div>
			</div>
			<div class="ot_article">	
			  <div class="col">
			  <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_OTSCROLLER_FIELD_ARTICLE_DESC').'">'.JText::_('MOD_OTSCROLLER_FIELD_ARTICLE_LABEL').'</label>
			  '.$this->getInputArticleSelect($this->name.'[REPLACE][article]', $this->id.'_REPLACE_article', '').'
			  </div>
			  <div class="col">
			  <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_OTSCROLLER_FIELD_IMAGE_DESC').'">'.JText::_('MOD_OTSCROLLER_FIELD_IMAGE_LABEL').'</label>
			  '.$this->getInputMedia($this->name.'[REPLACE][image]', $this->id .'_REPLACE_image','').'
			  </div> 
			</div> 
			<div class="ot_category">	
			  <div class="col">
			  <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_OTSCROLLER_FIELD_CATEGORY_DESC').'">'.JText::_('MOD_OTSCROLLER_FIELD_CATEGORY_LABEL').'</label>
			  '.$this->getInputCategorySelect($this->name.'[REPLACE][category]', $this->id.'_REPLACE_category', '').'
			  </div>
			  <div class="col">
			  <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_OTSCROLLER_FIELD_CIMAGE_DESC').'">'.JText::_('MOD_OTSCROLLER_FIELD_CIMAGE_LABEL').'</label>
			  '.$this->getInputMedia($this->name.'[REPLACE][cimage]', $this->id .'_REPLACE_cimage','').'
			  </div> 
			</div>	
          <div class="clearfix"></div>
          <a class="tabRemove btn btn-small" href="#"><span class="icon-cancel"></span> </a>
        </div>
        <div class="clearfix"></div>
      ';
    } else {
      if (!empty($this->value)){
        for ($i = 0; $i < count($this->value); $i++){

          $html[] = '
        <div class="tab">
			<div class="ot_module">
			  <div class="col">
			  <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_OTSCROLLER_FIELD_AVATAR_DESC').'">'.JText::_('MOD_OTSCROLLER_FIELD_AVATAR_LABEL').'</label>
			  '.$this->getInputMedia($this->name.'['.$i.'][avatar]', $this->id .'_'.$i.'_avatar', $this->value[$i]['avatar']).'
			  </div>         
			  <div class="col">
			  <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_OTSCROLLER_FIELD_WEBSITE_DESC').'">'.JText::_('MOD_OTSCROLLER_FIELD_WEBSITE_LABEL').'</label>
			  '.$this->getInputText($this->name.'['.$i.'][website]', $this->id. '_'.$i.'_website', $this->value[$i]['website']).'
			  </div>
			  <div class="col">
			  <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_OTSCROLLER_FIELD_TITLE_DESC').'">'.JText::_('MOD_OTSCROLLER_FIELD_TITLE_LABEL').'</label>
			  '.$this->getInputText($this->name.'['.$i.'][title]', $this->id. '_'.$i.'_title', $this->value[$i]['title']).'
			  </div>
			</div>
			<div class="ot_article">	
			  <div class="col">
			  <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_OTSCROLLER_FIELD_ARTICLE_DESC').'">'.JText::_('MOD_OTSCROLLER_FIELD_ARTICLE_LABEL').'</label>
			  '.$this->getInputArticleSelect($this->name.'['.$i.'][article]', $this->id. '_'.$i.'_article', @$this->value[$i]['article']).'
			  </div>
			  <div class="col">
			  <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_OTSCROLLER_FIELD_IMAGE_DESC').'">'.JText::_('MOD_OTSCROLLER_FIELD_IMAGE_LABEL').'</label>
			  '.$this->getInputMedia($this->name.'['.$i.'][image]', $this->id .'_'.$i.'_image', $this->value[$i]['image']).'
			  </div> 
			</div>
			<div class="ot_category">	
			  <div class="col">
			  <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_OTSCROLLER_FIELD_CATEGORY_DESC').'">'.JText::_('MOD_OTSCROLLER_FIELD_CATEGORY_LABEL').'</label>
			  '.$this->getInputCategorySelect($this->name.'['.$i.'][category]', $this->id. '_'.$i.'_category', @$this->value[$i]['article']).'
			  </div>
			  <div class="col">
			  <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_OTSCROLLER_FIELD_CIMAGE_DESC').'">'.JText::_('MOD_OTSCROLLER_FIELD_CIMAGE_LABEL').'</label>
			  '.$this->getInputMedia($this->name.'['.$i.'][cimage]', $this->id .'_'.$i.'_cimage', $this->value[$i]['cimage']).'
			  </div> 
			</div>	
          <a class="tabRemove btn btn-small" href="#"><span class="icon-cancel"></span> </a>
        </div>
        <div class="clearfix"></div>
          ';
        }
      }
      else {
        $html[] = '
        <div class="tab">
			<div class="ot_module">
			  <div class="col">
			  <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_OTSCROLLER_FIELD_AVATAR_DESC').'">'.JText::_('MOD_OTSCROLLER_FIELD_AVATAR_LABEL').'</label>
			  '.$this->getInputMedia($this->name.'[0][avatar]', $this->id.'_0_avatar', '').'
			  </div>          
			  <div class="col">
			  <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_OTSCROLLER_FIELD_WEBSITE_DESC').'">'.JText::_('MOD_OTSCROLLER_FIELD_WEBSITE_LABEL').'</label>
			  '.$this->getInputText($this->name.'[0][website]', $this->id.'_0_website', '').'
			  </div> 
			  <div class="col">
			  <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_OTSCROLLER_FIELD_TITLE_DESC').'">'.JText::_('MOD_OTSCROLLER_FIELD_TITLE_LABEL').'</label>
			  '.$this->getInputText($this->name.'[0][title]', $this->id.'_0_title', '').'
			  </div> 
			</div>
			<div class="ot_article">	
			  <div class="col">
			  <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_OTSCROLLER_FIELD_ARTICLE_DESC').'">'.JText::_('MOD_OTSCROLLER_FIELD_ARTICLE_LABEL').'</label>
			  '.$this->getInputArticleSelect($this->name.'[0][article]', $this->id.'_0_article', '').'
			  </div>
			  <div class="col">
			  <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_OTSCROLLER_FIELD_IMAGE_DESC').'">'.JText::_('MOD_OTSCROLLER_FIELD_IMAGE_LABEL').'</label>
			  '.$this->getInputMedia($this->name.'[0][image]', $this->id.'_0_image', '').'
			  </div>
			</div>
			<div class="ot_category">	
			   <div class="col">
			  <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_OTSCROLLER_FIELD_CATEGORY_DESC').'">'.JText::_('MOD_OTSCROLLER_FIELD_CATEGORY_LABEL').'</label>
			  '.$this->getInputCategorySelect($this->name.'[0][category]', $this->id.'_0_category', '').'
			  </div>
			  <div class="col">
			  <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_OTSCROLLER_FIELD_CIMAGE_DESC').'">'.JText::_('MOD_OTSCROLLER_FIELD_CIMAGE_LABEL').'</label>
			  '.$this->getInputMedia($this->name.'[0][cimage]', $this->id.'_0_cimage', '').'
			  </div>
			</div>	
          <a class="tabRemove btn btn-small" href="#"><span class="icon-cancel"></span> </a>
        </div>
        <div class="clearfix"></div>
        ';
      }
    }
    return implode($html);
  }

	protected function getInputArticleSelect($name, $id, $value = '')
	{
		$options = array();
		$db	= JFactory::getDbo();

		$db->setQuery(
		  'SELECT `id` as value, `title` as text FROM #__content;'
		);

		try
		{
		  $articles = $db->loadObjectList();
		}
		catch (RuntimeException $e)
		{
		  JError::raiseWarning(500, $e->getMessage());
		}

		if (empty($articles)) $articles = array();

		return JHtml::_('select.genericlist', $articles, $name, '', 'value', 'text', $value, $id);
	}
	protected function getInputCategorySelect($name, $id, $value = '')
	{
		$options = array();
		$db	= JFactory::getDbo();

		$db->setQuery(
		  'SELECT `id` as value, `title` as text FROM #__categories WHERE extension ="com_content";'
		);

		try
		{
		  $categories = $db->loadObjectList();
		}
		catch (RuntimeException $e)
		{
		  JError::raiseWarning(500, $e->getMessage());
		}

		if (empty($categories)) $categories = array();

		return JHtml::_('select.genericlist', $categories, $name, '', 'value', 'text', $value, $id);
	}
  protected function getInputText($name, $id, $value = '')
  {
    return '<input type="text" value="'.htmlspecialchars($value, ENT_COMPAT, 'UTF-8').'" id="'.$id.'" name="'.$name.'" class="" aria-required="true" />';
  }
	protected function getInputSelect($name, $id, $values = array(), $value = '')
	  {
		if (empty($values)) return '';
		foreach($values as $v){
		  $options[] = JHtml::_('select.option', $v['value'], $v['text']);
		}
		return JHtml::_('select.genericlist', $options, $name, null, 'value', 'text', $value, $id);
	  }
  protected function getInputMedia($name, $id, $value = '')
  {

    $html = array();
    $html[] = '<div class="input-prepend input-append">';

    // The Preview.
		$showPreview = true;
		$showAsTooltip = true;
    $options = array(
      'onShow' => 'jMediaRefreshPreviewTip',
    );
    JHtml::_('behavior.tooltip', '.hasTipPreview', $options);

    if ($showPreview)
		{
			if ($value && file_exists(JPATH_ROOT . '/' . $value))
			{
				$src = JUri::root() . $value;
			}
			else
			{
				$src = '';
			}

			$width = 300;
			$height = 200;
			$style = '';
			$style .= ($width > 0) ? 'max-width:' . $width . 'px;' : '';
			$style .= ($height > 0) ? 'max-height:' . $height . 'px;' : '';

			$imgattr = array(
				'id' => $id . '_preview',
				'class' => 'media-preview',
				'style' => $style,
			);

			$img = JHtml::image($src, JText::_('JLIB_FORM_MEDIA_PREVIEW_ALT'), $imgattr);
			$previewImg = '<div id="' . $id . '_preview_img"' . ($src ? '' : ' style="display:none"') . '>' . $img . '</div>';
			$previewImgEmpty = '<div id="' . $id . '_preview_empty"' . ($src ? ' style="display:none"' : '') . '>'
				. JText::_('JLIB_FORM_MEDIA_PREVIEW_EMPTY') . '</div>';

			if ($showAsTooltip)
			{
				$html[] = '<div class="media-preview add-on">';
				$tooltip = $previewImgEmpty . $previewImg;
				$options = array(
					'title' => JText::_('JLIB_FORM_MEDIA_PREVIEW_SELECTED_IMAGE'),
					'text' => '<i class="icon-eye"></i>',
					'class' => 'hasTipPreview'
				);

				$html[] = JHtml::tooltip($tooltip, $options);
				$html[] = '</div>';
			}
			else
			{
				$html[] = '<div class="media-preview add-on" style="height:auto">';
				$html[] = ' ' . $previewImgEmpty;
				$html[] = ' ' . $previewImg;
				$html[] = '</div>';
			}
    }
    $html[] = '	<input class="" type="text" name="' . $name . '" id="' . $id . '" value="'
			. htmlspecialchars($value, ENT_COMPAT, 'UTF-8') . '" readonly="readonly" />';

    $html[] = '<a class="modal btn" title="' . JText::_('JLIB_FORM_BUTTON_SELECT') . '" href="index.php?option=com_media&amp;view=images&amp;tmpl=component&amp;fieldid=' . $id . '"'
				. ' rel="{handler: \'iframe\', size: {x: 800, y: 500}}">';
    $html[] = JText::_('JLIB_FORM_BUTTON_SELECT') . '</a><a class="btn hasTooltip" title="' . JText::_('JLIB_FORM_BUTTON_CLEAR') . '" href="#" onclick="';
    $html[] = 'jInsertFieldValue(\'\', \'' . $id . '\');';
    $html[] = 'return false;';
    $html[] = '">';
    $html[] = '<i class="icon-remove"></i></a>';
    $html[] = '</div>';
    return implode("\n", $html);
  }

  protected function getScript()
  {
    $html = array();

    $html[] = '

        jQuery(document).ready(function($){
			$("select").change(function(){
				var a = $("#jform_params_otclientlogosscroller_0_type").val();
				if(a==1) {
					$(".ot_article").css("display","none");
					$(".ot_category").css("display","none");
					$(".ot_module").css("display","block");
				} else if(a==2) {
					$(".ot_article").css("display","block");
					$(".ot_category").css("display","none");
					$(".ot_module").css("display","none");
				} else if(a==3){
					$(".ot_article").css("display","none");
					$(".ot_category").css("display","block");
					$(".ot_module").css("display","none");
				}
			});
			var a = $("#jform_params_otclientlogosscroller_0_type").val();
			if(a==1) {
					$(".ot_article").css("display","none");
					$(".ot_category").css("display","none");
					$(".ot_module").css("display","block");
				} else if(a==2) {
					$(".ot_article").css("display","block");
					$(".ot_category").css("display","none");
					$(".ot_module").css("display","none");
				} else if(a==3){
					$(".ot_article").css("display","none");
					$(".ot_category").css("display","block");
					$(".ot_module").css("display","none");
				}
          reloadValidator = function () {
            if(document.formvalidator == null) {
              document.formvalidator = new JFormValidator(jQuery.noConflict());
            }
            //document.formvalidator.initialize();
          }

          resetSelectChosen = function (clone) {
            // Chosen reset
            $(clone).find("select").removeClass("chzn-done").show();

            // Assign random id
            //$.each($(clone).find("select"), function (index, c) {
            //    c.id = c.id + "_" + (Math.random() * 10000000).toInt();
            //});

            $(clone).find(".chzn-container").remove();

            $("select").chosen({
                disable_search_threshold : 10,
                allow_single_deselect : true
            });
          };

          addTab = function () {
            var container = $(".tabs")[0];
            var count = $(container).children(".tab").length;
            var clone = $("#tabs-template").find(".tab").clone(true, true);

            clone.appendTo(container);
            var contentClone = $(clone).html();
            contentClone = contentClone.replace(/REPLACE/ig, count);
            $(clone).html(contentClone);

            resetSelectChosen(clone);
            reloadValidator();
            reInitModal();
            $(".hasTooltip").tooltip({"html": true,"container": "body"});
          }

          removeTab = function (el) {
            $(el).remove();
            updateTabs();
          }

          updateTabs = function () {
            $(".tabs .tab").each(function(index, element){
              // method 1: replace all of the string
              //var originalContent = $(element).html();
              //originalContent = originalContent.replace(/\[[0-9]\]/g, "[" + index + "]");
              //originalContent = originalContent.replace(/\_[0-9]/g, "_" + index);
              //$(element).html(originalContent);

              // method 2: replace name and id of element
              $(element).find("input, select").each(function(id, el){
                el.name = el.name.replace(/\[[0-9]\]/, "[" + index + "]");
                el.id = el.id.replace(/_[0-9]/, "_" + index);
              });

              resetSelectChosen(element);
            });
            reloadValidator();
          }

          $("#tabs-template").appendTo($("body"));

          $(document).on( "click", "a.tabAdd", function(e){
            e.preventDefault();
            addTab();
          });

          $(document).on( "click", "a.tabRemove", function(e){
            e.preventDefault();
            removeTab($(this).parent(".tab"));
          });

        });

        function reInitModal(){
          SqueezeBox.initialize({});
          SqueezeBox.assign($$("a.modal"), {
            parse: "rel"
          });
        }

        function jInsertFieldValue(value, id) {
          var old_value = document.id(id).value;
          if (old_value != value) {
            var elem = document.id(id);
            elem.value = value;
            elem.fireEvent("change");
            if (typeof(elem.onchange) === "function") {
              elem.onchange();
            }
            jMediaRefreshPreview(id);
          }
        }

        function jMediaRefreshPreview(id) {
          var value = document.id(id).value;
          var img = document.id(id + "_preview");
          if (img) {
            if (value) {
              img.src = "' . JUri::root() . '" + value;
              document.id(id + "_preview_empty").setStyle("display", "none");
              document.id(id + "_preview_img").setStyle("display", "");
            } else {
              img.src = ""
              document.id(id + "_preview_empty").setStyle("display", "");
              document.id(id + "_preview_img").setStyle("display", "none");
            }
          }
        }

        function jMediaRefreshPreviewTip(tip)
        {
          var img = tip.getElement("img.media-preview");
          tip.getElement("div.tip").setStyle("max-width", "none");
          var id = img.getProperty("id");
          id = id.substring(0, id.length - "_preview".length);
          jMediaRefreshPreview(id);
          tip.setStyle("display", "block");
        }
    ';

    return implode("\n", $html);
  }  
}
