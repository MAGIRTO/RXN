<?php
/*
 * @version		$Id: router.php 1.0 2015-05-21 $
* @package		Joomla
* @copyright   Copyright (C) 2015-2016 Appten
* @license     GNU/GPL http://www.gnu.org/licenses/gpl-2.0.html
*/

 function HdwMusicBuildRoute( $query )
{
	$segments = array();
	
	if(isset($query['show_letter_bar'])) {
    	unset( $query['show_letter_bar'] );	
	}
   
    if(isset($query['view'])) {
    	$segments[] = $query['view'];
        unset( $query['view'] );
    }
	
    if(isset($query['id'])) {
    	$segments[] = $query['id'];
        unset( $query['id'] );
    }
	
	if(isset($query['char'])) {
       $segments[] = $query['char'];
       unset( $query['char'] );
    }
	
	if(isset($query['orderby'])) {
		$segments[] = $query['orderby'];
    	unset( $query['orderby'] );	
	}
	
    return $segments;
}

function HdwMusicParseRoute( $segments )
{
	$vars  = array();
	$chars = array('all', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'num');
	$order = array('latest', 'popular', 'random', 'featured');
	
	$app   = JFactory::getApplication();
    $menu  = $app->getMenu();
    $item  = $menu->getActive();
    $count = count( $segments );
	
	if($item && isset($item->query['show_letter_bar'])) {
		$vars['show_letter_bar'] = $item->query['show_letter_bar'];
	}

    switch($segments[0]) {
    	case 'artist':
        	$vars['view'] = 'artist';
            break;
        case 'album':
            $vars['view'] = 'album';
            break;
        case 'genre':
            $vars['view'] = 'genre';
            break;
		default :
			$vars['view'] = $item->query['view'];
    }
	
	if($count == 2 && in_array($segments[1], $chars)) {
		$vars['char'] = $segments[1];
	} else if($count == 2 && in_array($segments[1], $order)) {
		$vars['orderby'] = $segments[1];
	} else if($count == 2) {
    	$vars['id'] = $segments[1];
	}
	
    return $vars;
}

?>