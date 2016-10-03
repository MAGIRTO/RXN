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

class HdwMusicViewArtists extends JViewLegacy {

    function display($tpl = null) {
	    $model = $this->getModel();
		
		$data = $model->getdata();
		$this->assignRef('data', $data);
		
		$pagination = $model->getpagination();
		$this->assignRef('pagination', $pagination);
		
		$lists = $model->getlists();
		$this->assignRef('lists', $lists);
		
		JSubMenuHelper::addEntry(JText::_('DASHBOARD'), 'index.php?option=com_hdwmusic');
		JSubMenuHelper::addEntry(JText::_('GENRE'), 'index.php?option=com_hdwmusic&task=genre');
		JSubMenuHelper::addEntry(JText::_('ARTISTS'), 'index.php?option=com_hdwmusic&task=artists', true);		
		JSubMenuHelper::addEntry(JText::_('ALBUMS'), 'index.php?option=com_hdwmusic&task=albums');
		JSubMenuHelper::addEntry(JText::_('SONGS'), 'index.php?option=com_hdwmusic&task=songs');
		JSubMenuHelper::addEntry(JText::_('SETTINGS'), 'index.php?option=com_hdwmusic&task=settings');
		
    		JToolBarHelper::title(JText::_('COM_HDWMUSIC'), 'music');
		JToolBarHelper::publishList('publish', 'PUBLISH');
        JToolBarHelper::unpublishList('unpublish', 'UNPUBLISH');
        JToolBarHelper::deleteList('ARE_YOU_SURE_YOU_WANT_TO_DELETE_SELECTED_ITEMS','deleteartists', 'DELETE');
        JToolBarHelper::editList('editartists', 'EDIT');
        JToolBarHelper::addNew('addartists', 'NEW');
		
		$help = JToolBar::getInstance('toolbar');
		$help->appendButton( 'Popup', 'help', 'help', 'http://products.plestar.com/demo/musicshare/documentation.html', 900, 500 );
		JToolBarHelper::custom( '', '', '', '<style>#google_translate_element{margin-top:-19px;}#google_translate_element span{display:inline;}#google_translate_element img{padding:0;}</style>
		<div id="google_translate_element"></div><script type="text/javascript">
		document.getElementById("toolbar-").getElementsByTagName("button")[0].onclick = function(){};
		function googleTranslateElementInit() {
  		new google.translate.TranslateElement({pageLanguage: "en", layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, "google_translate_element");
		}
		</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>',false);
        
        parent::display($tpl);
    }
    
	public function add($tpl = null) {
	    $model = $this->getModel();
		
        //$data  = $model->getrow();
		//$this->assignRef('data', $data);
		
		JSubMenuHelper::addEntry(JText::_('DASHBOARD'), 'index.php?option=com_hdwmusic');
		JSubMenuHelper::addEntry(JText::_('GENRE'), 'index.php?option=com_hdwmusic&task=genre');
		JSubMenuHelper::addEntry(JText::_('ARTISTS'), 'index.php?option=com_hdwmusic&task=artists', true);
		JSubMenuHelper::addEntry(JText::_('ALBUMS'), 'index.php?option=com_hdwmusic&task=albums');
		JSubMenuHelper::addEntry(JText::_('SONGS'), 'index.php?option=com_hdwmusic&task=songs');
		JSubMenuHelper::addEntry(JText::_('SETTINGS'), 'index.php?option=com_hdwmusic&task=settings');
		
		JToolBarHelper::title(JText::_('COM_HDWMUSIC'), 'music');
        JToolBarHelper::save('saveartists', 'Save');
        JToolBarHelper::apply('applyartists', 'Apply');
        JToolBarHelper::cancel('cancelartists','cancel');
        $help = JToolBar::getInstance('toolbar');
		$help->appendButton( 'Popup', 'help', 'Help', 'http://hdwplayer.com/', 900, 500 );
		JToolBarHelper::custom( '', '', '', '<style>#google_translate_element{margin-top:-19px;}#google_translate_element span{display:inline;}#google_translate_element img{padding:0;}</style>
		<div id="google_translate_element"></div><script type="text/javascript">
		document.getElementById("toolbar-").getElementsByTagName("button")[0].onclick = function(){};
		function googleTranslateElementInit() {
 		new google.translate.TranslateElement({pageLanguage: "en", layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, "google_translate_element");
		}
		</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>',false);
		
		
        parent::display($tpl);
    }
	
	public function edit($tpl = null) {
	    $model = $this->getModel();
		
        $data  = $model->getrow();
		$this->assignRef('data', $data);
		
		JSubMenuHelper::addEntry(JText::_('DASHBOARD'), 'index.php?option=com_hdwmusic');
		JSubMenuHelper::addEntry(JText::_('GENRE'), 'index.php?option=com_hdwmusic&task=genre');
		JSubMenuHelper::addEntry(JText::_('ARTISTS'), 'index.php?option=com_hdwmusic&task=artists', true);
		JSubMenuHelper::addEntry(JText::_('ALBUMS'), 'index.php?option=com_hdwmusic&task=albums');
		JSubMenuHelper::addEntry(JText::_('SONGS'), 'index.php?option=com_hdwmusic&task=songs');
		JSubMenuHelper::addEntry(JText::_('SETTINGS'), 'index.php?option=com_hdwmusic&task=settings');
		
		JToolBarHelper::title(JText::_('COM_HDWMUSIC'), 'music');
        JToolBarHelper::save('saveartists', 'Save');
        JToolBarHelper::apply('applyartists', 'Apply');
        JToolBarHelper::cancel('cancelartists','cancel');
        $help = JToolBar::getInstance('toolbar');
		$help->appendButton( 'Popup', 'help', 'Help', 'http://hdwplayer.com/', 900, 500 );
		JToolBarHelper::custom( '', '', '', '<style>#google_translate_element{margin-top:-19px;}#google_translate_element span{display:inline;}#google_translate_element img{padding:0;}</style>
		<div id="google_translate_element"></div><script type="text/javascript">
		document.getElementById("toolbar-").getElementsByTagName("button")[0].onclick = function(){};
		function googleTranslateElementInit() {
 		new google.translate.TranslateElement({pageLanguage: "en", layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, "google_translate_element");
		}
		</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>',false);
		
		
        parent::display($tpl);
    }
	
}
?>