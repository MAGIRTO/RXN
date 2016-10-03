<?php

defined('_JEXEC') or die( 'Restricted access' );

require_once JPATH_SITE.'/components/com_content/helpers/route.php';
jimport('joomla.application.component.model');
JModelLegacy::addIncludePath(JPATH_SITE . '/components/com_content/models', 'ContentModel');
jimport('joomla.utilities.string');
jimport( 'joomla.application.module.helper' );
abstract class ModJFancytestimonialHelper
{
  
    public static function getInput($params)
    {
        $tabsarray = array();
        $tabs = $params->get('jfancytestimonial');
        
        if (!is_array($tabs) || empty($tabs)) return array();
        
        foreach ($tabs as $idx => $tab)
        {
            $item = new StdClass();
            $item->title = $tab->title;
            $item->image= $tab->image;
            $item->name= $tab->name;
            $item->work= $tab->work;
            $item->star = $tab->star;
            $tabsarray[] = $item;
        }
        return $tabsarray;
    }
}