<?php
	
	/**
	* @copyright		(C)2013 DM Digital S.r.l
	* @author 			DM Digital <support@dmjoomlaextensions.com>
	* @link				http://www.dmjoomlaextensions.com
	* @license 			GNU/LGPL http://www.gnu.org/copyleft/gpl.html
	**/

	defined('_JEXEC') or die('Restricted access');
	
	class DMControllerpanel extends DMController {
		
		public function display($cachable = false, $urlparams = array()) {
            JRequest::setVar('view', 'panel');
            parent::display();
		}
	}
	
?>