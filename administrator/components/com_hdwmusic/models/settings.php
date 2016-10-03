<?php
/*
 * @version		$Id: settings.php 1.0 2015-05-21 $
* @package		Joomla
* @copyright   Copyright (C) 2015-2016 Appten
* @license     GNU/GPL http://www.gnu.org/licenses/gpl-2.0.html
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

// Import Joomla! libraries
jimport('joomla.application.component.model');

// Import filesystem libraries.
jimport('joomla.filesystem.file');

class HdwMusicModelSettings extends JModelLegacy {

    public function __construct() {
		parent::__construct();
    }
	
	public function getdata()
    {
        $mainframe = JFactory::getApplication();		 
        $db        = JFactory::getDBO();
        $query     = "SELECT * FROM #__hdwmusic_settings WHERE id=1";

        $db->setQuery( $query );
        $output = $db->loadObjectList();
		 
        return($output[0]);
	}
	
	public function save()
	{
	  $mainframe = JFactory::getApplication();
	  $row       = JTable::getInstance('hdwmusicsettings', 'Table');
	  $cid       = JRequest::getVar( 'cid', array(0), '', 'array' );
      $id        = $cid[0];
      $row->load($id);

      if(!$row->bind(JRequest::get('post')))
	  {
		JError::raiseError(500, $row->getError() );
	  }
	
	  $row->styles = JRequest::getVar('styles', '', 'post', 'string', JREQUEST_ALLOWRAW);
	  
	  if(!$row->store()){
		JError::raiseError(500, $row->getError() );
	  }

      $msg  = 'Saved';
      $link = 'index.php?option=com_hdwmusic&task=settings';
  
	  $mainframe->redirect($link, $msg);
	}
	
}

?>