<?php
/*
 * A plugin for a parallax background scroll
 * Plugin for Joomla 2.5 and 3.x Version 1.1
 * License: http://www.gnu.org/copyleft/gpl.html
 * Authors: marco maria leoni
 * Copyright (c) 2010 - 2014 marco maria leoni web consulting - http: www.mmleoni.net
 * Project page at http://www.mmleoni.net/buy-me-a-beer-for-joomla
 * *** Last update: Feb 3rd, 2014 ***
*/


// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class plgContentMarcoparallaxbground extends JPlugin{
	protected static $itemCount = 0;
	protected $contentID = '';
	
	public function __construct(&$subject, $config)
	{
		parent::__construct($subject, $config);
		$this->loadLanguage();
	}

	public function onContentPrepare($context, &$row, &$params, $page = 0){
		if (is_object($row)){
			return $this->renderImageLayer($row->text, $params);
		}
		return $this->renderImageLayer($row, $params);
	}

	protected function renderImageLayer(&$text, &$params){
		/*
		 * Check for presence of {marcoparallaxbground ... } 
		 */
		
		if (JString::strpos($text, '{marcoparallaxbground') === false) {
			return true;
		}

		$obj = new stdClass();

		$obj->count = 0;

		// Load plugin default params info
		//BG image
		$obj->image = $this->params->get('image');
		
		$obj->image_path = trim($this->params->get('image_path'));
		
		// image caption
		$obj->image_caption = $this->params->get('image_caption', '');
		
		// image_height
		$obj->image_height = trim($this->params->get('image_height', '400'));
		$obj->auto_size=false;

		// fixed css id
		$obj->css_id = trim($this->params->get('css_id'));
		
		$obj->useCss = (bool) $this->params->get('useCss');
		if ($obj->useCss){
			JFactory::getDocument()->addStyleSheet('plugins/content/marcoparallaxbground/assets/marcoparallaxbground.css');
		}
		
		// fixed css id
		$obj->css_additional = $this->params->get('css_additional');
	
		$placeholders = array();
		preg_match_all( '/{marcoparallaxbground\s*([^}]*)}/i', $text, $placeholders, PREG_SET_ORDER );

		foreach ($placeholders as $placeholder){
			$mpb = clone $obj;
			$mpb->count = ++self::$itemCount;
			$pattern = "/(\w+)(\s*=\s*(?:\".*?\"|'.*?'|[^'\">\s]+))?/i"; // get attributes
			$attribs = array();
			preg_match_all ( $pattern, $placeholder[1], $attribs, PREG_SET_ORDER );
			
			$atlist = array();
			foreach ($attribs as $attrib){
				//relaxed
				//$atlist[strtolower($attrib[1])] = preg_replace("/=\s*[\"']?([^'\"]*)[\"']?/", "$1", $attrib[2]);
				//strict
				$atlist[strtolower($attrib[1])] = preg_replace("/=\s*(?:\"([^\"]*)\")|(?:'([^']*)')/", "$1", $attrib[2]);
			}
			
			// parameters override
			if(isset($atlist['image'])){
				$mpb->image = $atlist['image'];
			}
			if(JString::strpos($mpb->image, 'http')!==0){
				if(JString::strpos($mpb->image, '/')!==0){
					$mpb->image = $obj->image_path . $mpb->image;
				}
				//$mpb->image =  JPATH_SITE . $mpb->image;
			}
			
			//image caption
			if(isset($atlist['caption'])){
				$mpb->image_caption = $atlist['caption'];
			}

			//getting size
			if(isset($atlist['height'])){
				$mpb->image_height = $atlist['height'];
			}

			
			//getting id
			if(isset($atlist['cssid'])){
				$mpb->css_id = $atlist['cssid'];
			}
			if(!$mpb->css_id) $mpb->css_id = "mmlParallaxID_".$this->contentID.$mpb->count;

			
			$tmpl =
"
<div class=\"mmlParallax\" id=\"{$mpb->css_id}\">
	<div class=\"mmlEmbeddedNode\">
		<div class=\"mmlParallaxWrap\">
			<div style=\"background-image: url('{$mpb->image}')\" class=\"mmlParallaxImage\"></div>
			<div class=\"mmlImageInfoWrap\">
				<div class=\"mmlImageInfo\">
					<div class=\"mmlImageInfoCaption\">{$mpb->image_caption}</div>
				</div>
			</div>
		</div>
	</div>
</div>
";
			// replace ONLY the first occurrence
			$pos = strpos($text,$placeholder[0]);
			if ($pos !== false) {
				$text = substr_replace($text,$tmpl,$pos,strlen($placeholder[0]));
			}
			
			if ($mpb->useCss){
				JFactory::getDocument()->addStyleDeclaration("#{$mpb->css_id}.mmlParallax, #{$mpb->css_id}.mmlParallax .mmlParallaxImage{height: {$mpb->image_height}px;}");
			}
			
		}
		
		if ($obj->useCss){
			JFactory::getDocument()->addStyleDeclaration($obj->css_additional);			
		}
		
		return true;
	}
	
	
}	
?>