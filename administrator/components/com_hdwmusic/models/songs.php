<?php
/*
 * @version		$Id: songs.php 1.0 2015-05-21 $
* @package		Joomla
* @copyright   Copyright (C) 2015-2016 Appten
* @license     GNU/GPL http://www.gnu.org/licenses/gpl-2.0.html
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

// Import Joomla! libraries
jimport('joomla.application.component.model');

class HdwMusicModelSongs extends JModelLegacy {

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
		 $filter_album     = $mainframe->getUserStateFromRequest($option.$task.'filter_album', 'filter_album', '', 'string');
		 $search           = $mainframe->getUserStateFromRequest($option.$task.'search', 'search', '', 'string');
		 $search           = JString::strtolower($search);
		 	 
         $db               = JFactory::getDBO();
         $query            = "SELECT * FROM #__hdwmusic_songs";
		 $where            = array();
		 
		 if ($filter_state > - 1) {
			$where[]       = "published={$filter_state}";
		 }
		
		 if ( $search ) {
		 	$where[] = 'LOWER(song_title) LIKE '.$db->Quote('%'.$search);
		
			}
		 
		 if ($filter_album && $filter_album != JText::_('SELECT_BY_ALBUM')) {
		    $filter_album  = $filter_album; 
			$where[]       = 'song_album='.$db->Quote($filter_album);
		 }

		 $where 		   = ( count( $where ) ? ' WHERE '. implode( ' AND ', $where ) : '' );
		 
		 $query           .= $where;
		 $query           .= " ORDER BY song_album,ordering";
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
		 $filter_album     = $mainframe->getUserStateFromRequest($option.$task.'filter_album', 'filter_album', '', 'string');
		 $search           = $mainframe->getUserStateFromRequest($option.$task.'search', 'search', '', 'string');
		 $search           = JString::strtolower($search);
		 
         $db               = JFactory::getDBO();
         $query            = "SELECT COUNT(*) FROM #__hdwmusic_songs";
		 $where            = array();
		 
		 if ($filter_state > - 1) {
			$where[]       = "published={$filter_state}";
		 }
		
		 if ( $search ) {
			$where[]       = 'LOWER(song_title) LIKE '.$db->Quote( '%'.$search.'%', false );
		 }
		 
		 if ($filter_album && $filter_album != JText::_('SELECT_BY_ALBUM')) {
		    $filter_album  = $filter_album; 
			$where[]       = 'song_album='.$db->Quote($filter_album);
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
		 $filter_album           = $mainframe->getUserStateFromRequest($option.$task.'filter_album', 'filter_album','', 'string');
		 $search                 = $mainframe->getUserStateFromRequest($option.$task.'search','search','','string');
		 $search                 = JString::strtolower ( $search );
     
    	 $lists                  = array ();
		 $lists ['search']       = $search;
		 
		 $album_options[]        = JHTML::_('select.option', '', JText::_('SELECT_BY_ALBUM'));
		 $albums                 = $this->getalbums();
		 for ($i=0; $i < count( $albums ); $i++)
         {
           $album_options[]      = JHTML::_('select.option', $albums[$i]->id, $albums[$i]->album_name);
	     }
		 $lists['albums']        = JHTML::_('select.genericlist', $album_options, 'filter_album', 'onchange="this.form.submit();"', 'text', 'text', $filter_album);
            
		 $filter_state_options[] = JHTML::_('select.option', -1, JText::_('SELECT_PUBLISHING_STATE'));
		 $filter_state_options[] = JHTML::_('select.option', 1, JText::_('PUBLISHED'));
		 $filter_state_options[] = JHTML::_('select.option', 0, JText::_('UNPUBLISHED'));
		 $lists['state']         = JHTML::_('select.genericlist', $filter_state_options, 'filter_state', 'onchange="this.form.submit();"', 'value', 'text', $filter_state);
		 
         return($lists);
	}
	
	public function getrow()
    {
         $db  = JFactory::getDBO();
         $row = JTable::getInstance('hdwmusicsongs', 'Table');
         $cid = JRequest::getVar( 'cid', array(0), '', 'array' );
         $id  = $cid[0];
         $row->load($id);

         return $row;
	}
	
	public function getalbums()
    {
         $mainframe = JFactory::getApplication();		 
         $db        = JFactory::getDBO();
         $query     = "SELECT id,album_name,album_artist FROM #__hdwmusic_albums WHERE published=1";

         $db->setQuery( $query );
         $output = $db->loadObjectList();
		 
         return($output);
	}
	
	public function save()
	{
	  $mainframe = JFactory::getApplication();
	  $row       = JTable::getInstance('hdwmusicsongs', 'Table');
	  $cid       = JRequest::getVar( 'cid', array(0), '', 'array' );
      $id        = $cid[0];
      $row->load($id);

      if(!$row->bind(JRequest::get('post')))
	  {
		JError::raiseError(500, $row->getError() );
	  }
	
	  $row->song_title  = JString::trim($row->song_title);
	  $row->song_lyrics = JRequest::getVar('song_lyrics', '', 'post', 'string', JREQUEST_ALLOWRAW);
	  
	  if($row->song_type == 'upload')
	  {
	  	jimport ( 'joomla.filesystem.folder' );
	    jimport('joomla.filesystem.file');
		
		if(!JFolder::exists(HDWMUSIC_UPLOAD_BASE_SONG)) {
			JFolder::create(HDWMUSIC_UPLOAD_BASE_SONG);
		}
		
	  	$row->song_file  = $this->upload('song_upload_file');
		$row->song_thumb = $this->upload('song_upload_thumb');
	  }
	  
	  if(!$row->store()){
		JError::raiseError(500, $row->getError() );
	  }

	  $task = JRequest::getCmd('task');
	  
	  switch ($task) {
        case 'applysongs':
             $msg  = 'Changes Saved';
             $link = 'index.php?option=com_hdwmusic&task=editsongs&'. JSession::getFormToken() .'=1&'.'cid[]='.$row->id;
             break;
        case 'savesongs':
        default:
              $msg  = 'Saved';
              $link = 'index.php?option=com_hdwmusic&task=songs';
              break;
      }
	  
	  $mainframe->redirect($link, $msg);
	}	
	
	public function upload($filename)
	{
	  $temp = $_FILES[$filename]['tmp_name'];
	  $ran  = rand();
	  $file = $_FILES[$filename]['name'];	 
	 /* $ext  = end(explode(".", $file));
	  $file = $this->RemoveExtension($file);
	  $file = JFile::makeSafe($file.$ran.$ext);*/
	  
      if($file != "") {
     	 if(JFile::upload($temp, HDWMUSIC_UPLOAD_BASE_SONG.$file)) {
		 	return HDWMUSIC_UPLOAD_BASEURL_SONG.$file;
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
            $query = "DELETE FROM #__hdwmusic_songs WHERE id IN ( $cids )";
            $db->setQuery( $query );
            if (!$db->query())
            {
                echo "<script> alert('".$db->getErrorMsg()."');window.history.go(-1); </script>\n";
            }
        }

        $mainframe->redirect( 'index.php?option=com_hdwmusic&task=songs' );
	}
	
	public function cancel()
	{
	  $mainframe = JFactory::getApplication();
	  $link      = 'index.php?option=com_hdwmusic&task=songs';
	  $mainframe->redirect($link);
	}
	
	public function saveorder()
	{
		$mainframe  = JFactory::getApplication();

		// Initialize variables
		$db	        = JFactory::getDBO();
		$cid        = JRequest::getVar( 'cid', array(0), '', 'array' );
		$total      = count( $cid );
		$order      = JRequest::getVar( 'order', array(0), '', 'array' );
		JArrayHelper::toInteger($order, array(0));
		 
		$row        = JTable::getInstance('hdwmusicsongs', 'Table');
		$groupings  = array();
		// update ordering values
		for( $i=0; $i < $total; $i++ ) {
			$row->load( (int) $cid[$i] );
			$groupings[] = $row->song_album;
 			if ($row->ordering != $order[$i]) {
				$row->ordering  = $order[$i];
				if (!$row->store()) {
					JError::raiseError(500, $db->getErrorMsg() );
				}
			}
		}
 
		$groupings = array_unique($groupings);
		foreach ($groupings as $group) {
			$row->reorder('song_album = "'.$group.'"');
		}
 
		$mainframe->redirect('index.php?option=com_hdwmusic&task=songs', 'New ordering saved');
	}
	
	public function move($direction)
	{
		$mainframe  = JFactory::getApplication();
		$cid        = JRequest::getVar( 'cid', array(0), '', 'array' );
		$row        = JTable::getInstance('hdwmusicsongs', 'Table');
		$row->load($cid[0]);
		$row->move($direction, 'song_album = "'.$row->song_album.'"');
		$row->reorder('song_album = "'.$row->song_album.'"');
	  	$mainframe->redirect('index.php?option=com_hdwmusic&task=songs', 'New ordering saved');		
	}

}

?>