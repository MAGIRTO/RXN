<?php
/*
 * @version		$Id: toolbar.hdwmusic.html.php 1.0 2015-05-21 $
* @package		Joomla
* @copyright   Copyright (C) 2015-2016 Appten
* @license     GNU/GPL http://www.gnu.org/licenses/gpl-2.0.html
*/
 
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class TOOLBAR_HDWMUSIC {

	public function _DEFAULT()
    {
	    JToolBarHelper::title(JText::_('COM_HDWMUSIC'), 'music');
		
		$help =  JToolBar::getInstance('toolbar');
		$help->appendButton( 'Popup', 'help', 'help', 'http://products.plestar.com/demo/musicshare/documentation.html', 900, 500 );
    }	
	
	public function _ARTISTS()
    {
	    JToolBarHelper::title(JText::_('COM_HDWMUSIC'), 'music');
		JToolBarHelper::publishList('publish', 'PUBLISH');
        JToolBarHelper::unpublishList('unpublish', 'UNPUBLISH');
        JToolBarHelper::deleteList('ARE_YOU_SURE_YOU_WANT_TO_DELETE_SELECTED_ITEMS','deleteartists', 'DELETE');
        JToolBarHelper::editList('editartists', 'EDIT');
        JToolBarHelper::addNew('addartists', 'NEW');
		
		$help =  JToolBar::getInstance('toolbar');
		$help->appendButton( 'Popup', 'help', 'help', 'http://products.plestar.com/demo/musicshare/documentation.html', 900, 500 );
    }
	
	public function _ARTISTSAE()
    {
	    JToolBarHelper::title(JText::_('COM_HDWMUSIC'), 'music');		
		JToolBarHelper::save('saveartists', 'SAVE');
        JToolBarHelper::apply('applyartists', 'APPLY');
        JToolBarHelper::cancel('cancelartists', 'CANCEL');
		
		$help =  JToolBar::getInstance('toolbar');
		$help->appendButton( 'Popup', 'help', 'help', 'http://products.plestar.com/demo/musicshare/documentation.html', 900, 500 );
    }
	
	public function _ALBUMS()
    {
	    JToolBarHelper::title(JText::_('COM_HDWMUSIC'), 'music');
		JToolBarHelper::publishList('publish', 'PUBLISH');
        JToolBarHelper::unpublishList('unpublish', 'UNPUBLISH');
        JToolBarHelper::deleteList('ARE_YOU_SURE_YOU_WANT_TO_DELETE_SELECTED_ITEMS','deletealbums', 'DELETE');
        JToolBarHelper::editList('editalbums', 'EDIT');
        JToolBarHelper::addNew('addalbums', 'NEW');
		
		$help =  JToolBar::getInstance('toolbar');
		$help->appendButton( 'Popup', 'help', 'help', 'http://products.plestar.com/demo/musicshare/documentation.html', 900, 500 );
    }
	
	public function _ALBUMSAE()
    {
	    JToolBarHelper::title(JText::_('COM_HDWMUSIC'), 'music');		
		JToolBarHelper::save('savealbums', 'SAVE');
        JToolBarHelper::apply('applyalbums', 'APPLY');
        JToolBarHelper::cancel('cancelalbums', 'CANCEL');
		
		$help =  JToolBar::getInstance('toolbar');
		$help->appendButton( 'Popup', 'help', 'help', 'http://products.plestar.com/demo/musicshare/documentation.html', 900, 500 );
    }	
	
	public function _GENRE()
    {
	    JToolBarHelper::title(JText::_('COM_HDWMUSIC'), 'music');		
		JToolBarHelper::publishList('publish', 'PUBLISH');
        JToolBarHelper::unpublishList('unpublish', 'UNPUBLISH');
        JToolBarHelper::deleteList('ARE_YOU_SURE_YOU_WANT_TO_DELETE_SELECTED_ITEMS','deletegenre', 'DELETE');
        JToolBarHelper::editList('editgenre', 'EDIT');
        JToolBarHelper::addNew('addgenre', 'NEW');
		
		$help =  JToolBar::getInstance('toolbar');
		$help->appendButton( 'Popup', 'help', 'help', 'http://products.plestar.com/demo/musicshare/documentation.html', 900, 500 );
    }
	
	public public function _GENREAE()
    {
	    JToolBarHelper::title(JText::_('COM_HDWMUSIC'), 'music');		
		JToolBarHelper::save('savegenre', 'SAVE');
        JToolBarHelper::apply('applygenre', 'APPLY');
        JToolBarHelper::cancel('cancelgenre', 'CANCEL');
		
		$help =  JToolBar::getInstance('toolbar');
		$help->appendButton( 'Popup', 'help', 'help', 'http://products.plestar.com/demo/musicshare/documentation.html', 900, 500 );
    }
	
	public function _SONGS()
    {
	    JToolBarHelper::title(JText::_('COM_HDWMUSIC'), 'music');		
		JToolBarHelper::publishList('publish', 'PUBLISH');
        JToolBarHelper::unpublishList('unpublish', 'UNPUBLISH');
        JToolBarHelper::deleteList('ARE_YOU_SURE_YOU_WANT_TO_DELETE_SELECTED_ITEMS','deletesongs', 'DELETE');
        JToolBarHelper::editList('editsongs', 'EDIT');
        JToolBarHelper::addNew('addsongs', 'NEW');
		
		$help =  JToolBar::getInstance('toolbar');
		$help->appendButton( 'Popup', 'help', 'help', 'http://products.plestar.com/demo/musicshare/documentation.html', 900, 500 );
    }
	
	public function _SONGSAE()
    {
	    JToolBarHelper::title(JText::_('COM_HDWMUSIC'), 'music');		
		JToolBarHelper::save('savesongs', 'SAVE');
        JToolBarHelper::apply('applysongs', 'APPLY');
        JToolBarHelper::cancel('cancelsongs', 'CANCEL');
		
		$help =  JToolBar::getInstance('toolbar');
		$help->appendButton( 'Popup', 'help', 'help', 'http://products.plestar.com/demo/musicshare/documentation.html', 900, 500 );
    }
	
	public function _SETTINGS()
    {
	    JToolBarHelper::title(JText::_('COM_HDWMUSIC'), 'music');		
        JToolBarHelper::save('savesettings', 'SAVE');
		
		$help =  JToolBar::getInstance('toolbar');
		$help->appendButton( 'Popup', 'help', 'help', 'http://products.plestar.com/demo/musicshare/documentation.html', 900, 500 );
    }	
	
}

?>