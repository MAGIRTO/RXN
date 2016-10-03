<?php


defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.html.html');
jimport('joomla.form.formfield');

class JFormFieldJfancytestimonial extends JFormField
{
  protected $type = 'Jfancytestimonial';

  protected function getInput()
  {
    
      JFactory::getDocument()->addStyleSheet(JURI::root().'modules/mod_jfancytestimonial/assets/css/jfancytestimonial.css');

      JHtml::_('behavior.framework');
      JHtml::_('behavior.modal');


      $html = array();

      $class = !empty($this->class) ? ' class="' . $this->class . '"' : '';
      $disabled = $this->disabled ? ' disabled' : '';

      $onchange = $this->onchange ? ' onchange="' . $this->onchange . '"' : '';

      $html[] = '
        <div class="tabs">'.$this->getTabsInput().'</div>
        <div id="tabs-template" class="hidden">'.$this->getTabsInput(true).'</div>
        <div class="clearfix"></div>
        <a class="tabAdd btn button btn-primary" href="#"><span class="icon-plus"></span> </a>
        ';

      JFactory::getDocument()->addScriptDeclaration($this->getjavaScript());
      return implode($html);
  }

  protected function getTabsInput($is_template = false)
  {
    $star = array(
      array('value' => '1', 'text' => JText::_('1')),
      array('value' => '2', 'text' => JText::_('2')),
      array('value' => '3', 'text' => JText::_('3')),
      array('value' => '4', 'text' => JText::_('4')),
      array('value' => '5', 'text' => JText::_('5')),
      
      
    );
    $html = array();
    if ($is_template){
      $html[] = '
        <div class="tab">
		  <div class="col">
          <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_JFANCYTESTIMONIAL_FIELD_IMAGE_DESC').'">'.JText::_('MOD_JFANCYTESTIMONIAL_FIELD_IMAGE_LABEL').'</label>
          '.$this->getInputMedia($this->name.'[REPLACE][image]', $this->id .'_REPLACE_image','').'
          </div> 
          <div class="col">
          <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_JFANCYTESTIMONIAL_FIELD_NAME_DESC').'">'.JText::_('MOD_JFANCYTESTIMONIAL_FIELD_NAME_LABEL').'</label>
          '.$this->getInputText($this->name.'[REPLACE][name]', $this->id.'_REPLACE_name', '').'
          </div>
          <div class="col">
          <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_JFANCYTESTIMONIAL_FIELD_WORK_DESC').'">'.JText::_('MOD_JFANCYTESTIMONIAL_FIELD_WORK_LABEL').'</label>
          '.$this->getInputText($this->name.'[REPLACE][work]', $this->id.'_REPLACE_work', '').'
          </div>
           <div class="col">
          <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_JFANCYTESTIMONIAL_FIELD_STAR_DESC').'">'.JText::_('MOD_JFANCYTESTIMONIAL_FIELD_STAR_LABEL').'</label>
          '.$this->getInputSelect($this->name.'[REPLACE][star]', $this->id.'_REPLACE_star', $star, '').'
          </div>
		  <div class="clearfix"></div>
		  <div class="col">
          <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_JFANCYTESTIMONIAL_FIELD_TITLE_DESC').'">'.JText::_('MOD_JFANCYTESTIMONIAL_FIELD_TITLE_LABEL').'</label>
          '.$this->getInputTextarea($this->name.'[REPLACE][title]', $this->id.'_REPLACE_title', '').'
          </div>
          
          <div class="clearfix"></div>
          <a class="tabRemove btn btn-small" href="#"><span class="icon-cancel"></span> </a>
        </div>
        <div class="clearfix"></div>
      ';
    } else {
      if (!empty($this->value)){
          
           $i=0;
            $v = $this->value;
        foreach ($v as $vs){
          if (!empty($vs->title)){
          $html[] = '
        <div class="tab">
		  <div class="col">
          <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_JFANCYTESTIMONIAL_FIELD_IMAGE_DESC').'">'.JText::_('MOD_JFANCYTESTIMONIAL_FIELD_IMAGE_LABEL').'</label>
          '.$this->getInputMedia($this->name.'['.$i.'][image]', $this->id .'_'.$i.'_image', $vs->image).'
          </div> 
          <div class="col">
          <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_JFANCYTESTIMONIAL_FIELD_NAME_DESC').'">'.JText::_('MOD_JFANCYTESTIMONIAL_FIELD_NAME_LABEL').'</label>
          '.$this->getInputText($this->name.'['.$i.'][name]', $this->id. '_'.$i.'name', $vs->name).'
          </div>
          <div class="col">
          <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_JFANCYTESTIMONIAL_FIELD_WORK_DESC').'">'.JText::_('MOD_JFANCYTESTIMONIAL_FIELD_WORK_LABEL').'</label>
          '.$this->getInputText($this->name.'['.$i.'][work]', $this->id.'_'.$i.'_work', $vs->work).'
          </div>
          <div class="col">
          <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_JFANCYTESTIMONIAL_FIELD_STAR_DESC').'">'.JText::_('MOD_JFANCYTESTIMONIAL_FIELD_STAR_LABEL').'</label>
          '.$this->getInputSelect($this->name.'['.$i.'][star]', $this->id.'_'.$i.'_star', $star, $vs->star).'
          </div>
          <div class="clearfix"></div>
		  <div class="col">
          <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_JFANCYTESTIMONIAL_FIELD_TITLE_DESC').'">'.JText::_('MOD_JFANCYTESTIMONIAL_FIELD_TITLE_LABEL').'</label>
          '.$this->getInputTextarea($this->name.'['.$i.'][title]', $this->id .'_'.$i.'_title', $vs->title).'
          </div>       
          <div class="clearfix"></div>
          <a class="tabRemove btn btn-small" href="#"><span class="icon-cancel"></span> </a>
        </div>
        <div class="clearfix"></div>
          ';
           $i++;
        }else{
            
            $html[] = '
        <div class="tab">
		  <div class="col">
          <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_JFANCYTESTIMONIAL_FIELD_IMAGE_DESC').'">'.JText::_('MOD_JFANCYTESTIMONIAL_FIELD_IMAGE_LABEL').'</label>
          '.$this->getInputMedia($this->name.'['.$i.'][image]', $this->id .'_'.$i.'_image', $vs['image']).'
          </div> 
          <div class="col">
          <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_JFANCYTESTIMONIAL_FIELD_NAME_DESC').'">'.JText::_('MOD_JFANCYTESTIMONIAL_FIELD_NAME_LABEL').'</label>
          '.$this->getInputText($this->name.'['.$i.'][name]', $this->id. '_'.$i.'name', $vs['name']).'
          </div>
          <div class="col">
          <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_JFANCYTESTIMONIAL_FIELD_WORK_DESC').'">'.JText::_('MOD_JFANCYTESTIMONIAL_FIELD_WORK_LABEL').'</label>
          '.$this->getInputText($this->name.'['.$i.'][work]', $this->id.'_'.$i.'_work', $vs['work']).'
          </div>
          <div class="col">
          <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_JFANCYTESTIMONIAL_FIELD_STAR_DESC').'">'.JText::_('MOD_JFANCYTESTIMONIAL_FIELD_STAR_LABEL').'</label>
          '.$this->getInputSelect($this->name.'['.$i.'][star]', $this->id.'_'.$i.'_star', $star, $vs['star']).'
          </div>
          <div class="clearfix"></div>
		  <div class="col">
          <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_JFANCYTESTIMONIAL_FIELD_TITLE_DESC').'">'.JText::_('MOD_JFANCYTESTIMONIAL_FIELD_TITLE_LABEL').'</label>
          '.$this->getInputTextarea($this->name.'['.$i.'][title]', $this->id .'_'.$i.'_title', $vs['title']).'
          </div>       
          <div class="clearfix"></div>
          <a class="tabRemove btn btn-small" href="#"><span class="icon-cancel"></span> </a>
        </div>
        <div class="clearfix"></div>
          ';
            $i++; 
        }
            
        }
      }
      else {
        $html[] = '
        <div class="tab">
		  <div class="col">
          <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_JFANCYTESTIMONIAL_FIELD_IMAGE_DESC').'">'.JText::_('MOD_JFANCYTESTIMONIAL_FIELD_IMAGE_LABEL').'</label>
          '.$this->getInputMedia($this->name.'[0][image]', $this->id.'_0_image', '').'
          </div>
          <div class="col">
          <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_JFANCYTESTIMONIAL_FIELD_NAME_DESC').'">'.JText::_('MOD_JFANCYTESTIMONIAL_FIELD_NAME_LABEL').'</label>
          '.$this->getInputText($this->name.'[0][name]', $this->id.'_0_name', '').'
          </div>
          <div class="col">
          <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_JFANCYTESTIMONIAL_FIELD_WORK_DESC').'">'.JText::_('MOD_JFANCYTESTIMONIAL_FIELD_WORK_LABEL').'</label>
          '.$this->getInputText($this->name.'[0][work]', $this->id.'_0_work', '').'
          </div>
          <div class="col">
          <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_JFANCYTESTIMONIAL_FIELD_STAR_DESC').'">'.JText::_('MOD_JFANCYTESTIMONIAL_FIELD_STAR_LABEL').'</label>
          '.$this->getInputSelect($this->name.'[0][star]', $this->id.'_0_star', $star, '').'
          </div>
          <div class="clearfix"></div>
		   <div class="col">
          <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_JFANCYTESTIMONIAL_FIELD_TITLE_DESC').'">'.JText::_('MOD_JFANCYTESTIMONIAL_FIELD_TITLE_LABEL').'</label>
          '.$this->getInputTextarea($this->name.'[0][title]', $this->id.'_0_title', '').'
          </div>
          <div class="clearfix"></div>

          <a class="tabRemove btn btn-small" href="#"><span class="icon-cancel"></span> </a>
        </div>
        <div class="clearfix"></div>
        ';
      }
    }
    return implode($html);
  }

  protected function getInputSelect($name, $id, $values = array(), $value = '')
  {
    if (empty($values)) return '';
    foreach($values as $v){
      $options[] = JHtml::_('select.option', $v['value'], $v['text']);
    }
    return JHtml::_('select.genericlist', $options, $name, null, 'value', 'text', $value, $id);
  }
  protected function getInputText($name, $id, $value = '')
  {
    return '<input type="text" value="'.htmlspecialchars($value, ENT_COMPAT, 'UTF-8').'" id="'.$id.'" name="'.$name.'" class="" aria-required="true" />';
  }

  protected function getInputTextarea($name, $id, $value = '')
  {
    return '<textarea id="'.$id.'" name="'.$name.'"  rows="6" cols="120" class="">'.htmlspecialchars($value, ENT_COMPAT, 'UTF-8').'</textarea>';
  }


  protected function getInputMedia($name, $id, $value = '')
  {

    $html = array();
    $html[] = '<div class="input-prepend input-append">';

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

  protected function getjavaScript()
  {
    $html = array();

    $html[] = '

        jQuery(document).ready(function($){

          reloadValidator = function () {
            if(document.formvalidator == null) {
              document.formvalidator = new JFormValidator(jQuery.noConflict());
            }
           
          }

          resetSelectChosen = function (clone) {
            $(clone).find("select").removeClass("chzn-done").show();
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
