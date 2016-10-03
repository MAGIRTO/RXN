<?php
/*
 * @version		$Id: genre.php 1.0 2015-05-21 $
* @package		Joomla
* @copyright   Copyright (C) 2015-2016 Appten
* @license     GNU/GPL http://www.gnu.org/licenses/gpl-2.0.html
*/

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

class JElementGenre extends JElement
{
	var	$_name = 'Genre';

	public function fetchElement($name, $value, &$node, $control_name)
	{
		$db = JFactory::getDBO();

		$query = 'SELECT a.genre_slug, a.genre_name'
		. ' FROM #__hdwmusic_genre AS a'
		. ' WHERE a.published = 1'
		. ' ORDER BY a.genre_name';
		$db->setQuery( $query );
		$options = $db->loadObjectList();

		array_unshift($options, JHTML::_('select.option', '0', '- '.JText::_('Display all Genres').' -', 'genre_slug', 'genre_name'));

		return JHTML::_('select.genericlist',  $options, ''.$control_name.'['.$name.']', 'class="inputbox"', 'genre_slug', 'genre_name', $value, $control_name.$name );
	}
} 

?>