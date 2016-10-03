<?php
/**
 * @package 	OT Client Logos Scroller Module for Joomla! 3.3
 * @version 	$Id: helper.php - Aug 2014 00:00:00Z OmegaTheme
 * @author 		OmegaTheme Extensions (services@omegatheme.com) - http://omegatheme.com
 * @copyright	Copyright(C) 2014 - OmegaTheme Extensions
 * @license 	http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
**/
// no direct access
defined('_JEXEC') or die( 'Restricted access' );

 class mod_otclientlogosscrollerHelper
{
    /**
    *    @return       array of tab element object(title, content) which prepared for rendering
    *    @called by    root
    */
    public static function getList($params)
    {
        $tabsarray = array();
        $tabs = $params->get('otclientlogosscroller');
        
        if (!is_array($tabs) || empty($tabs)) return array();
        
        foreach ($tabs as $idx => $tab)
        {
            $item = new StdClass();            
            $item->avatar= $tab->avatar;
            $item->website= $tab->website; 
            $item->title= $tab->title; 
			if(isset($tab->type)) {
			$item->type = $tab->type;
			}
			$item->image = $tab->image;
			$val = $item->article = $tab->article;
			$value = $item->category = $tab->category;
			$item->otcontent = mod_otclientlogosscrollerHelper::getArticle($val,$params);
			$item->otcategory = mod_otclientlogosscrollerHelper::getCategory($value,$params);
            $tabsarray[] = $item;
        }
        return $tabsarray;
    }
	 public static function getArticle($id,$params)
    {
		$number_of_article = $params->get('number_of_article', 4);
        $number_of_character = $params->get('number_of_character', 100);
        $show_link = $params->get('show_link', 1);
        $show_readmore = $params->get('show_readmore', 1);
        $show_date = $params->get('show_date', 0);
        $date_format = $params->get('date_format', 'd.m.Y');
        $show_thumbnail = $params->get('show_thumbnail', 1);
        $default_image = $params->get('default_image', 'modules/mod_otclientlogosscroll/assets/images/sampledefault.jpg');
        $thumb_width = $params->get('thumb_width', 70);
        $thumb_height = $params->get('thumb_height', 50);
        $show_view_all = $params->get('show_view_all', 1);
        $db        = JFactory::getDbo();
        $query    = $db->getQuery(true);
        $db->setQuery(
          'SELECT * FROM #__content WHERE `id` = '.(int)$id.';'
        );
        
        try
        {
          $article = $db->loadObject();
        }
        catch (RuntimeException $e)
        {
          JError::raiseWarning(500, $e->getMessage());
        }
        $article->slug = $article->id.':'.$article->alias;
		$article->catslug = $article->catid ? $article->catid .':'.$article->alias : $article->catid;
		$article->link = JRoute::_(ContentHelperRoute::getArticleRoute($article->slug, $article->catslug));
        if (!$article->id) return '';
		$html='';
        $html .='<div class="ottabs-items-wrapper">
			<div class="ottabs-item-wrapper">';
			if($show_link == 1) {
			$html .= '<h3 class="ottabs-title">
				<a href="'.$article->link.'" class="ottabs-title-link">';
			$html .=$article->title;		
			$html .='</a>
			</h3>';
			} else {
			$html .= '<h3 class="ottabs-title">'.
				$article->title.
			'</h3>';	
			}	
			$html .='<span class="created_date">';
			if($show_date == 1) {
			$html .=JHTML::_('date', $article->created, $params->get( 'date_format' ));
			}
			$html .='</span>';
			$html .='<div class="ottabs-article-introtext">';
			if($article->fulltext !='') {
				$html .=$article->fulltext;
			} else {
				$html .=$article->introtext;
			}
			$html .='</div>';
			$html .='</div>
		</div>';
        return $html;
    }
	 public static function getCategory($id,$params)
    {
		$db        = JFactory::getDbo();
        $query    = $db->getQuery(true);
        $db->setQuery(
          'SELECT * FROM #__categories WHERE `id` = '.(int)$id.';'
        );
		 try
        {
          $category = $db->loadObject();
        }
        catch (RuntimeException $e)
        {
          JError::raiseWarning(500, $e->getMessage());
        }
		$category->link  = JRoute::_(ContentHelperRoute::getCategoryRoute($category->id));
		$html = $category->description;
		$html='';
        $html .='<div class="ottabs-items-wrapper">
			<div class="ottabs-item-wrapper">';
			
			$html .= '<h3 class="ottabs-title">
				<a href="'.$category->link.'" class="ottabs-title-link">';
			$html .=$category->title;		
			$html .='</a>
			</h3>';		
			$html .='<div class="ottabs-article-introtext">';
	
			$html .=$category->description;
			
			$html .='</div>';
			$html .='</div>
		</div>';
		return $html;
	}
	
    
}