<?php
/*
 * @version		$Id: hdwmusicsettings.php 1.0 2015-05-21 $
* @package		Joomla
* @copyright   Copyright (C) 2015-2016 Appten
* @license     GNU/GPL http://www.gnu.org/licenses/gpl-2.0.html
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

// Include library dependencies
jimport('joomla.filter.input');

class TableHdwMusicSettings extends JTable {

	var $id                = null;
	var $bgcolor           = null;
  	var $bordercolor       = null;
  	var $overlaycolor      = null;
  	var $overlayalpha      = null;
  	var $iconcolor         = null;
  	var $sliderbgcolor     = null;
  	var $slidercolor       = null;
	var $autostart         = 0;
	var $playlistautostart = 0;
	var $styles            = 0;
	var $rows              = 3;
	var $cols              = 3;

	public function __construct( $db) {
		parent::__construct('#__hdwmusic_settings', 'id', $db);
	}

	public function check() {
		return true;
	}
	
}

?>