<?php
/*
 * @version		$Id: controller.php 1.0 2015-05-21 $
* @package		Joomla
* @copyright   Copyright (C) 2015-2016 Appten
* @license     GNU/GPL http://www.gnu.org/licenses/gpl-2.0.html
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.controller');

class HdwMusicController extends JControllerLegacy {

    public function __construct() {
		parent::__construct();
    }
	
	public function display($cachable = false, $urlparams = Array()) {
		$this->artist();	
	}
	
	public function artist() {
	    $obj      = JRequest::getCmd('id') ? 'artist' : 'artists';
	
	    $document = JFactory::getDocument();
		$vType	  = $document->getType();
	    $view     = $this->getView($obj, $vType);
		
        $model    = $this->getModel($obj);		
		if($obj == 'artist') $model->updateviews();
		
        $view->setModel($model, true);
		$view->display();
	}
	
	public function album() {
		$obj      = JRequest::getCmd('id') ? 'album' : 'albums';
		
		$document = JFactory::getDocument();
		$vType	  = $document->getType();
	    $view     = $this->getView($obj, $vType);
		
        $model    = $this->getModel($obj);
		if($obj == 'album') $model->updateviews();
		
        $view->setModel($model, true);
		$view->display();

	}
	
	public function genre() {
		$obj      = JRequest::getCmd('id') ? 'genre' : 'genres';
		
		$document = JFactory::getDocument();
		$vType	  = $document->getType();
	    $view     = $this->getView($obj, $vType);
		
        $model    = $this->getModel($obj);
		if($obj == 'genre') $model->updateviews();
		
        $view->setModel($model, true);
		$view->display();
	}
	
	public function playlist() {
        $model = $this->getModel('playlist');
        $model->getdata();
	}
	
	function updatesongsplayed() {
        $model = $this->getModel('songs');
        $model->updateviews();
	}
	
	public function user() {
		$document = JFactory::getDocument();
		$vType	  = $document->getType();
	    $view     = $this->getView('user', $vType);
		
        $model    = $this->getModel('user');
		
        $view->setModel($model, true);
		$view->display();
	}
	
	public function updateuser() {
	  	$model = $this->getModel('user');
		if(JRequest::getCmd('task') == 'add') {
			$model->add();
		} else {
			$model->delete();
		}
	}
	
}
?>