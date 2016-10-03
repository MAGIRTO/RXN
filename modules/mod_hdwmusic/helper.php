<?php
/*
 * @version		$Id: helper.php 1.0 2015-05-21 $
* @package		Joomla
* @subpackage	com_hdwmusic
* @copyright   Copyright (C) 2015-2016 Appten
* @license     GNU/GPL http://www.gnu.org/licenses/gpl-2.0.html
*/
 
// no direct access
defined('_JEXEC') or die('Restricted access');

class modhdwmusicHelper
{

 public   function getItems( $params )
    {
		$itm             = array();
		$itm["type"]     = $params->get('type');
		$itm["rows"]     = $params->get('rows');
		$itm["columns"]  = $params->get('columns');
		$db = JFactory::getDBO();		
		$query =  "SELECT * FROM #__hdwmusic_albums WHERE published=1";		
		if($itm["type"] == 'latest') {
			$query .=  ' ORDER BY id DESC';
		} else if($itm["type"] == 'popular') {
			$query .=  ' ORDER BY album_views DESC';
		} else if($itm["type"] == 'featured') {
			$query .=  ' AND album_featured=1';
		} else if($itm["type"] == 'random') {
			$query .=  ' ORDER BY RAND()';
		}
		
		$db->setQuery( $query );
       	$output              = $db->loadObjectList();
		$itm["data"]         = $output;
			
        return $itm;
    }
	
	public  function getstyles()
    {
         $db     = JFactory::getDBO();
         $query  = "SELECT styles FROM #__hdwmusic_settings WHERE id=1";
         $db->setQuery( $query );
         $output = $db->loadObjectList();
         return($output[0]->styles);
	}
		
}

?>
