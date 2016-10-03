<?php
/**
 * @package     Joomla.Site
 * @subpackage  plg_system_prianimation
 * @version     1.5
 *
 * @copyright   Copyright (C) 2010 - 2014 Devpri. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
 
// no direct access
defined('_JEXEC') or die ;

jimport('joomla.plugin.plugin');

//Mobile Detect
class plgSystemPRIAnimation extends JPlugin
{

	function plgSystemPRIAnimation($subject, $config)
	{
		parent::__construct($subject, $config);
	}

	function onAfterDispatch()
	{
		if(!class_exists('Mobile_Detect_PRI_Animation')){
			require_once JPATH_SITE . '/plugins/system/prianimation/libraries/Mobile_Detect.php';
		}
		$detect = new Mobile_Detect_PRI_Animation;
		$document = JFactory::getDocument();
		$js = '
			wow = new WOW(
				{
					boxClass:     "prianimation",
					animateClass: "prianimated",
					offset:       '. $this->params->get('animation_offset').'
				}
			);
			wow.init();
		';
		$css = '
			.prianimated {
				  -webkit-animation-duration: '. $this->params->get('animation_duration').'ms;
				  animation-duration: '. $this->params->get('animation_duration').'ms;
			}	
		';
		//Disable / Enable Mobile
		if ($this->params->get('disable_animation_on_mobile')=="1") {
			if ($detect->isMobile() or $detect->isTablet()) { 
			} else {
				$document->addScript(JURI::root(true).'/plugins/system/prianimation/assets/js/wow.min.js');
				$document->addStyleSheet(JURI::root(true).'/plugins/system/prianimation/assets/css/animate.css');
				$document->addScriptDeclaration($js);
				$document->addStyleDeclaration($css);
			}
		} else {
			$document->addScript(JURI::root(true).'/plugins/system/prianimation/assets/js/wow.min.js');
			$document->addStyleSheet(JURI::root(true).'/plugins/system/prianimation/assets/css/animate.css');
			$document->addScriptDeclaration($js);
			$document->addStyleDeclaration($css);
		}

	}
}
