<?php
/*
 * @version		$Id: view.html.php 1.0 2015-05-21 $
* @package		Joomla
* @copyright   Copyright (C) 2015-2016 Appten
* @license     GNU/GPL http://www.gnu.org/licenses/gpl-2.0.html
*/

// no direct access 
defined('_JEXEC') or die('Restricted access');

jimport( 'joomla.application.component.view');

class HdwMusicViewArtist extends JViewLegacy {

	function display($tpl = null) {
		$mainframe = JFactory::getApplication();
		$model     = $this->getModel();
		
		$settings  = $model->getsettings();
		$this->assignRef('settings', $settings);
		
		if(!$artist = $model->getartist()) {
			echo 'Artist Not Found.';
			return;
		} else {
			$this->assignRef('artist', $artist);
		}
		
		$albums = $model->getalbums($artist->artist_name, $settings[0]->rows * $settings[0]->cols);
		$this->assignRef('albums', $albums);
		
		$pagination = $model->getpagination($artist->artist_name);
		$this->assignRef('pagination', $pagination);
		
		// Adds parameter handling
		$params = $mainframe->getParams();
		$this->assignRef('params',	$params);
				
        parent::display($tpl);
    }
	
}

?>