<?php
/*------------------------------------------------------------------------
# mod_scrollmenu.php (module)
# ------------------------------------------------------------------------
# version		1.0.0
# author    	Top Position
# copyright 	Copyright (c) 2011 Top Position All rights reserved.
# @license 		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL

http://mastermarketingdigital.org/open-source-joomla-extensions

This modules uses  DC jQuery Vertical Accordion Menu - jQuery vertical accordion menu plugin
 * 	Copyright (c) 2011 Design Chemical
 *	Dual licensed under the MIT and GPL licenses:
 * 	http://www.opensource.org/licenses/mit-license.php
 * 	http://www.gnu.org/licenses/gpl.html
 
-------------------------------------------------------------------------
*/
// no direct access
defined('_JEXEC') or die;
$document = JFactory::getDocument();
$document->addStyleSheet(JURI::base().'modules/mod_scrollmenu/assets/css/dcaccordion.css');
$document->addStyleSheet(JURI::base().'modules/mod_scrollmenu/assets/css/skins/'.$params->get('theme','graphite').'.css');
$document->addScript(JURI::base().'modules/mod_scrollmenu/assets/js/jquery.cookie.js');
$document->addScript(JURI::base().'modules/mod_scrollmenu/assets/js/jquery.hoverIntent.minified.js');
$document->addScript(JURI::base().'modules/mod_scrollmenu/assets/js/jquery.dcjqaccordion.2.7.min.js');

$tt = $params->get('link_title',1);

$parentlinks = 	$params->get('parentlinks','true');
$speed = 		$params->get('speed','fast');
$saveState = 	$params->get('saveState','true');
$showCount = 	$params->get('showCount','false');
$eventType = 	$params->get('eventType','click');



?>
<script type="text/javascript">
jQuery(document).ready(function($){
	jQuery('#accordion-1').dcAccordion({
		eventType: '<?php echo $eventType; ?>',
		autoClose: true,
		saveState: <?php echo $saveState; ?>,
		disableLink: <?php echo $parentlinks; ?>,
		speed: '<?php echo $speed; ?>',
		showCount: <?php echo $showCount; ?>,
		autoExpand: true,
		cookie	: 'dcjq-accordion-1',
		classExpand	 : 'dcjq-current-parent'
	});
});
</script>
<div class="<?php echo $params->get('theme','graphite'); ?> demo-container">
<?php // The menu class is deprecated. Use nav instead. ?>
<ul class="accordion" id="accordion-1">
<?php
foreach ($list as $i => &$item) :
	$class = 'item-'.$item->id;
	if ($item->id == $active_id)
	{
		$class .= ' current';
	}

	if (in_array($item->id, $path))
	{
		$class .= ' active';
	}
	elseif ($item->type == 'alias')
	{
		$aliasToId = $item->params->get('aliasoptions');
		if (count($path) > 0 && $aliasToId == $path[count($path) - 1])
		{
			$class .= ' active';
		}
		elseif (in_array($aliasToId, $path))
		{
			$class .= ' alias-parent-active';
		}
	}

	if ($item->type == 'separator')
	{
		$class .= ' divider';
	}

	if ($item->deeper)
	{
		$class .= ' deeper';
	}

	if ($item->parent)
	{
		$class .= ' parent';
	}

	if (!empty($class))
	{
		$class = ' class="'.trim($class) .'"';
	}

	echo '<li'.$class.'>';

	// Render the menu item.
	switch ($item->type) :
		case 'separator':
		case 'url':
		case 'component':
		case 'heading':
			require JModuleHelper::getLayoutPath('mod_scrollmenu', 'default_'.$item->type);
			break;

		default:
			require JModuleHelper::getLayoutPath('mod_scrollmenu', 'default_url');
			break;
	endswitch;

	// The next item is deeper.
	if ($item->deeper)
	{
		echo '<ul class="nav-child unstyled small">';
	}
	// The next item is shallower.
	elseif ($item->shallower)
	{
		echo '</li>';
		echo str_repeat('</ul></li>', $item->level_diff);
	}
	// The next item is on the same level.
	else {
		echo '</li>';
	}
endforeach;
?></ul></div>
<div style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:10px; text-align:right; display:block; padding-right:10px;"><a href="http://mastermarketingdigital.org/">Master marketing digital</a></div>
<div style="clear:both"></div>
