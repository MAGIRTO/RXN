<?php
/*
 * @version		$Id: view.html.php 1.0 2015-05-21 $
* @package		Joomla
* @copyright   Copyright (C) 2015-2016 Appten
* @license     GNU/GPL http://www.gnu.org/licenses/gpl-2.0.html
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

// Import Joomla! libraries
jimport( 'joomla.application.component.view');

class HdwMusicViewSettings extends JViewLegacy {

    public function display($tpl = null) {
	    $model = $this->getModel();
		
		$data  = $model->getdata();
		$this->assignRef('data', $data);
		
		JSubMenuHelper::addEntry(JText::_('DASHBOARD'), 'index.php?option=com_hdwmusic');		
		JSubMenuHelper::addEntry(JText::_('GENRE'), 'index.php?option=com_hdwmusic&task=genre');
		JSubMenuHelper::addEntry(JText::_('ARTISTS'), 'index.php?option=com_hdwmusic&task=artists');				
		JSubMenuHelper::addEntry(JText::_('ALBUMS'), 'index.php?option=com_hdwmusic&task=albums');
		JSubMenuHelper::addEntry(JText::_('SONGS'), 'index.php?option=com_hdwmusic&task=songs');
		JSubMenuHelper::addEntry(JText::_('SETTINGS'), 'index.php?option=com_hdwmusic&task=settings', true);
		
		JToolBarHelper::title(JText::_('COM_HDWMUSIC'), 'music');
        JToolBarHelper::save('savesettings', 'Save');	
		
        parent::display($tpl);
    }
	
}

?>