<?php
/*
 * @version		$Id: genre.php 1.0 2015-05-21 $
* @package		Joomla
* @copyright   Copyright (C) 2015-2016 Appten
* @license     GNU/GPL http://www.gnu.org/licenses/gpl-2.0.html
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

// Import Joomla! libraries
jimport('joomla.application.component.model');

class HdwMusicModelGenre extends JModelLegacy {

    public function __construct() {
		parent::__construct();
    }
	
	public function getdata()
    {
		 $mainframe        = JFactory::getApplication();	
		 $option           = JRequest::getCmd('option');
		 $task             = JRequest::getCmd('task');
		 
		 $limit            = $mainframe->getUserStateFromRequest('global.list.limit', 'limit', $mainframe->getCfg('list_limit'), 'int');
		 $limitstart       = $mainframe->getUserStateFromRequest($option.$task.'.limitstart', 'limitstart', 0, 'int');
		 $filter_state     = $mainframe->getUserStateFromRequest($option.$task.'filter_state', 'filter_state', -1, 'int');
		 $search           = $mainframe->getUserStateFromRequest($option.$task.'search', 'search', '', 'string');
		 $search           = JString::strtolower($search);
		 	 
         $db               = JFactory::getDBO();
         $query            = "SELECT * FROM #__hdwmusic_genre";
		 $where            = array();
		 
		 if ($filter_state > - 1) {
			$where[]       = "published={$filter_state}";
		 }
		
		 if ( $search ) {
			$where[]       = 'LOWER(genre_name) LIKE '.$db->Quote('%'.$search);
		 }

		 $where 		   = ( count( $where ) ? ' WHERE '. implode( ' AND ', $where ) : '' );
		 
		 $query           .= $where;
         $db->setQuery( $query, $limitstart, $limit );
         $output = $db->loadObjectList();
		 
         return($output);
	}

	public function gettotal()
    {
		 $mainframe        = JFactory::getApplication();	
		 $option           = JRequest::getCmd('option');
		 $task             = JRequest::getCmd('task');
		 
		 $filter_state     = $mainframe->getUserStateFromRequest($option.$task.'filter_state', 'filter_state', -1, 'int');
		 $search           = $mainframe->getUserStateFromRequest($option.$task.'search', 'search', '', 'string');
		 $search           = JString::strtolower($search);
		 
         $db               = JFactory::getDBO();
         $query            = "SELECT COUNT(*) FROM #__hdwmusic_genre";
		 $where            = array();
		 
		 if ($filter_state > - 1) {
			$where[]       = "published={$filter_state}";
		 }
		
		 if ( $search ) {
			$where[]       = 'LOWER(genre_name) LIKE '.$db->Quote( '%'.$search.'%', false );
		 }

		 $where 		   = ( count( $where ) ? ' WHERE '. implode( ' AND ', $where ) : '' );
		 
		 $query           .= $where;
         $db->setQuery( $query );
         $output = $db->loadResult();
         return($output);
	}
	
	public function getpagination()
    {
		 $mainframe  = JFactory::getApplication();	
		 $option     = JRequest::getCmd('option');
		 $task       = JRequest::getCmd('task');
		 
		 $total      = $this->gettotal();
		 $limit      = $mainframe->getUserStateFromRequest('global.list.limit', 'limit', $mainframe->getCfg('list_limit'), 'int');
		 $limitstart = $mainframe->getUserStateFromRequest($option.$task.'.limitstart', 'limitstart', 0, 'int');
     
    	 jimport( 'joomla.html.pagination' );
		 $pageNav    = new JPagination($total, $limitstart, $limit);
         return($pageNav);
	}
	
	public function getlists()
    {
		 $mainframe              = JFactory::getApplication();	
		 $option                 = JRequest::getCmd('option');
		 $task                   = JRequest::getCmd('task');
		 
		 $filter_state           = $mainframe->getUserStateFromRequest( $option.$task.'filter_state','filter_state',-1,'int' );
		 $search                 = $mainframe->getUserStateFromRequest($option.$task.'search','search','','string');
		 $search                 = JString::strtolower ( $search );
     
    	 $lists                  = array ();
		 $lists ['search']       = $search;
            
		 $filter_state_options[] = JHTML::_('select.option', -1, JText::_('SELECT_PUBLISHING_STATE'));
		 $filter_state_options[] = JHTML::_('select.option', 1, JText::_('PUBLISHED'));
		 $filter_state_options[] = JHTML::_('select.option', 0, JText::_('UNPUBLISHED'));
		 $lists['state']         = JHTML::_('select.genericlist', $filter_state_options, 'filter_state', 'onchange="this.form.submit();"', 'value', 'text', $filter_state);
		 
         return($lists);
	}
	
	public function getrow()
    {
         $db  = JFactory::getDBO();
         $row = JTable::getInstance('hdwmusicgenre', 'Table');
         $cid = JRequest::getVar( 'cid', array(0), '', 'array' );
         $id  = $cid[0];
         $row->load($id);

         return $row;
	}
	
	public function save()
	{
	  $mainframe = JFactory::getApplication();
	  $row       = JTable::getInstance('hdwmusicgenre', 'Table');
	  $cid       = JRequest::getVar( 'cid', array(0), '', 'array' );
      $id        = $cid[0];
      $row->load($id);

      if(!$row->bind(JRequest::get('post')))
	  {
		JError::raiseError(500, $row->getError() );
	  }
	
	  jimport( 'joomla.filter.output' );
	  $row->genre_name   = JString::trim($row->genre_name);
	  if(!$row->genre_slug) $row->genre_slug = $row->genre_name;
	  $row->genre_slug   = JFilterOutput::stringURLSafe($row->genre_slug);
	  $row->genre_header = JRequest::getVar('genre_header', '', 'post', 'string', JREQUEST_ALLOWRAW);
	  $row->genre_footer = JRequest::getVar('genre_footer', '', 'post', 'string', JREQUEST_ALLOWRAW);
	  
	  if($row->genre_type == 'upload')
	  {
	  	jimport ( 'joomla.filesystem.folder' );
	    jimport('joomla.filesystem.file');
		
		if(!JFolder::exists(HDWMUSIC_UPLOAD_BASE_GENRE)) {
			JFolder::create(HDWMUSIC_UPLOAD_BASE_GENRE);
		}
		
	  	$row->genre_thumb = $this->upload('genre_upload_thumb');
	  }
	  
	  if(!$row->store()){
		JError::raiseError(500, $row->getError() );
	  }

	  $task = JRequest::getCmd('task');
	  
	  switch ($task)
      {
        case 'applygenre':
             $msg  = 'Changes Saved';
             $link = 'index.php?option=com_hdwmusic&task=editgenre&'. JSession::getFormToken() .'=1&'.'cid[]='.$row->id;
             break;
        case 'savegenre':
        default:
              $msg  = 'Saved';
              $link = 'index.php?option=com_hdwmusic&task=genre';
              break;
      }
	  
	  $mainframe->redirect($link, $msg);
	}
	
	public function upload($filename)
	{
	  $temp = $_FILES[$filename]['tmp_name'];
	  $ran  = rand();
	  $file = $_FILES[$filename]['name'];	 
	  /*$ext  = end(explode(".", $file));
	  $file = $this->RemoveExtension($file);
	  $file = JFile::makeSafe($file.$ran.$ext);*/
	  
      if($file != "") {
     	 if(JFile::upload($temp, HDWMUSIC_UPLOAD_BASE_GENRE.$file)) {
		 	return HDWMUSIC_UPLOAD_BASEURL_GENRE.$file;
		 } else {
		 	JError::raiseWarning(21, 'Error Occured While Uploading!');
			return false;
		 }
	  }	
		
	}
	
	public function RemoveExtension($strName)  
	{  
     	$ext = strrchr($strName, '.');  
     	if($ext !== false) $strName = substr($strName, 0, -strlen($ext));  
     	return $strName;  
	}
	
	public function delete()
	{
	    $mainframe = JFactory::getApplication();
        $cid       = JRequest::getVar( 'cid', array(), '', 'array' );
        $db        = JFactory::getDBO();
        $cids       = implode( ',', $cid );
        if(count($cid))
        {
            $query = "DELETE FROM #__hdwmusic_genre WHERE id IN ( $cids )";
            $db->setQuery( $query );
            if (!$db->query())
            {
                echo "<script> alert('".$db->getErrorMsg()."');window.history.go(-1); </script>\n";
            }
        }
		
        $mainframe->redirect( 'index.php?option=com_hdwmusic&task=genre' );
	}
	
	public function cancel()
	{
	  $mainframe = JFactory::getApplication();
	  $link      = 'index.php?option=com_hdwmusic&task=genre';
	  $mainframe->redirect($link);
	}
	
}

?>