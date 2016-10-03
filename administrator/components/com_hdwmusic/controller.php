<?php
/*
 * @version		$Id: controller.php 1.0 2015-05-21 $
 * @package		Joomla
 * @copyright   Copyright (C) 2015-2016 Appten
 * @license     GNU/GPL http://www.gnu.org/licenses/gpl-2.0.html
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

// Import Joomla! libraries
jimport( 'joomla.application.component.controller' );

class HdwMusicController extends JControllerLegacy {

   public function __construct() {
        if(JRequest::getCmd('task') == '') {
            JRequest::setVar('task', 'display');
        }
        $this->item_type = 'Default';
        parent::__construct();
    }
	
	public function display($cachable = false, $urlparams = Array())
	{
	    $document = JFactory::getDocument();
		$vType	  = $document->getType();
	    $view     = $this->getView('default', $vType);
		
        $model    = $this->getModel('default');
        $view->setModel($model, true);

		$view->setLayout('default');

		$view->display();
	}
	
	public function artists()
	{
	    $document = JFactory::getDocument();
		$vType	  = $document->getType();
	    $view     = $this->getView('artists', $vType);
		
        $model    = $this->getModel('artists');
        $view->setModel($model, true);

		$view->setLayout('default');
		
		$view->display();
	}
	
	public function addartists()
	{
		if(JRequest::checkToken( 'get' )) {
			JRequest::checkToken( 'get' ) or die( 'Invalid Token' );
		} else {
			JRequest::checkToken() or die( 'Invalid Token' );
		}
		
		JRequest::setVar( 'hidemainmenu', 1 );
		
	    $document = JFactory::getDocument();
		$vType	  = $document->getType();
	    $view     = $this->getView('artists', $vType);
		
        $model    = $this->getModel('artists');
        $view->setModel($model, true);

		$view->setLayout('add');
		
		$view->add();
	}
	
	public function editartists()
	{
		if(JRequest::checkToken( 'get' )) {
			JRequest::checkToken( 'get' ) or die( 'Invalid Token' );
		} else {
			JRequest::checkToken() or die( 'Invalid Token' );
		}
		
		JRequest::setVar( 'hidemainmenu', 1 );
		
	    $document = JFactory::getDocument();
		$vType	  = $document->getType();
	    $view     = $this->getView('artists', $vType);
		
        $model    = $this->getModel('artists');
        $view->setModel($model, true);

		$view->setLayout('edit');
		
		$view->edit();
	}
	
	public function deleteartists()
	{
	    if(JRequest::checkToken( 'get' )) {
			JRequest::checkToken( 'get' ) or die( 'Invalid Token' );
		} else {
			JRequest::checkToken() or die( 'Invalid Token' );
		}
	
		$model = $this->getModel('artists');
	 	$model->delete();
	}
	
	public function applyartists()
	{
	    $this->saveartists();
	}
	
	public function saveartists()
	{
	    if(JRequest::checkToken( 'get' )) {
			JRequest::checkToken( 'get' ) or die( 'Invalid Token' );
		} else {
			JRequest::checkToken() or die( 'Invalid Token' );
		}
		
	  	$model = $this->getModel('artists');
	  	$model->save();
	}
	
	public function cancelartists()
	{
		if(JRequest::checkToken( 'get' )) {
			JRequest::checkToken( 'get' ) or die( 'Invalid Token' );
		} else {
			JRequest::checkToken() or die( 'Invalid Token' );
		}
		
	    $model = $this->getModel('artists');
	    $model->cancel();
	}
	
	public function albums()
	{
	    $document = JFactory::getDocument();
		$vType	  = $document->getType();
	    $view     = $this->getView('albums', $vType);
		
        $model    = $this->getModel('albums');
        $view->setModel($model, true);

		$view->setLayout('default');

		$view->display();
	}	
	
	public function addalbums()
	{
		if(JRequest::checkToken( 'get' )) {
			JRequest::checkToken( 'get' ) or die( 'Invalid Token' );
		} else {
			JRequest::checkToken() or die( 'Invalid Token' );
		}
		
		JRequest::setVar( 'hidemainmenu', 1 );
		
	    $document = JFactory::getDocument();
		$vType	  = $document->getType();
	    $view     = $this->getView('albums', $vType);
		
        $model    = $this->getModel('albums');
        $view->setModel($model, true);

		$view->setLayout('add');

		$view->add();
	}
	
	public function editalbums()
	{
		if(JRequest::checkToken( 'get' )) {
			JRequest::checkToken( 'get' ) or die( 'Invalid Token' );
		} else {
			JRequest::checkToken() or die( 'Invalid Token' );
		}
		
		JRequest::setVar( 'hidemainmenu', 1 );
		
	    $document = JFactory::getDocument();
		$vType	  = $document->getType();
	    $view     = $this->getView('albums', $vType);
		
        $model    = $this->getModel('albums');
        $view->setModel($model, true);

		$view->setLayout('edit');

		$view->edit();
	}
	
	public function deletealbums()
	{
	    if(JRequest::checkToken( 'get' )) {
			JRequest::checkToken( 'get' ) or die( 'Invalid Token' );
		} else {
			JRequest::checkToken() or die( 'Invalid Token' );
		}
	
		$model = $this->getModel('albums');
	 	$model->delete();
	}
	
	public function applyalbums()
	{
	    $this->savealbums();
	}
	
	public function savealbums()
	{
	    if(JRequest::checkToken( 'get' )) {
			JRequest::checkToken( 'get' ) or die( 'Invalid Token' );
		} else {
			JRequest::checkToken() or die( 'Invalid Token' );
		}
		
	  	$model = $this->getModel('albums');
	  	$model->save();
	}
	
	public function cancelalbums()
	{
		if(JRequest::checkToken( 'get' )) {
			JRequest::checkToken( 'get' ) or die( 'Invalid Token' );
		} else {
			JRequest::checkToken() or die( 'Invalid Token' );
		}
		
	    $model = $this->getModel('albums');
	    $model->cancel();
	}
	
	public function genre()
	{
	    $document = JFactory::getDocument();
		$vType	  = $document->getType();
	    $view     = $this->getView('genre', $vType);

        $model    = $this->getModel('genre');
        $view->setModel($model, true);

		$view->setLayout('default');

		$view->display();
	}
	
	public function addgenre()
	{
		if(JRequest::checkToken( 'get' )) {
			JRequest::checkToken( 'get' ) or die( 'Invalid Token' );
		} else {
			JRequest::checkToken() or die( 'Invalid Token' );
		}
		
		JRequest::setVar( 'hidemainmenu', 1 );
		
	    $document = JFactory::getDocument();
		$vType	  = $document->getType();
	    $view     = $this->getView('genre', $vType);
		
        $model    = $this->getModel('genre');
        $view->setModel($model, true);

		$view->setLayout('add');

		$view->add();
	}
	
	public function editgenre()
	{
		if(JRequest::checkToken( 'get' )) {
			JRequest::checkToken( 'get' ) or die( 'Invalid Token' );
		} else {
			JRequest::checkToken() or die( 'Invalid Token' );
		}
		
		JRequest::setVar( 'hidemainmenu', 1 );
		
	    $document = JFactory::getDocument();
		$vType	  = $document->getType();
	    $view     = $this->getView('genre', $vType);
		
        $model    = $this->getModel('genre');
        $view->setModel($model, true);

		$view->setLayout('edit');

		$view->edit();
	}
	
	public function deletegenre()
	{
	    if(JRequest::checkToken( 'get' )) {
			JRequest::checkToken( 'get' ) or die( 'Invalid Token' );
		} else {
			JRequest::checkToken() or die( 'Invalid Token' );
		}
	
		$model = $this->getModel('genre');
	 	$model->delete();
	}
	
	public function applygenre()
	{
	    $this->savegenre();
	}
	
	public function savegenre()
	{
	    if(JRequest::checkToken( 'get' )) {
			JRequest::checkToken( 'get' ) or die( 'Invalid Token' );
		} else {
			JRequest::checkToken() or die( 'Invalid Token' );
		}
		
	  	$model = $this->getModel('genre');
	  	$model->save();
	}
	
	public function cancelgenre()
	{
		if(JRequest::checkToken( 'get' )) {
			JRequest::checkToken( 'get' ) or die( 'Invalid Token' );
		} else {
			JRequest::checkToken() or die( 'Invalid Token' );
		}
		
	    $model = $this->getModel('genre');
	    $model->cancel();
	}
	
	public function songs()
	{
	    $document = JFactory::getDocument();
		$vType	  = $document->getType();
	    $view     = $this->getView('songs', $vType);

        $model    = $this->getModel('songs');
        $view->setModel($model, true);

		$view->setLayout('default');

		$view->display();
	}
	
	public function addsongs()
	{
		if(JRequest::checkToken( 'get' )) {
			JRequest::checkToken( 'get' ) or die( 'Invalid Token' );
		} else {
			JRequest::checkToken() or die( 'Invalid Token' );
		}
		
		JRequest::setVar( 'hidemainmenu', 1 );
		
	    $document = JFactory::getDocument();
		$vType	  = $document->getType();
	    $view     = $this->getView('songs', $vType);

        $model    = $this->getModel('songs');
        $view->setModel($model, true);

		$view->setLayout('add');

		$view->add();
	}
	
	public function editsongs()
	{
		if(JRequest::checkToken( 'get' )) {
			JRequest::checkToken( 'get' ) or die( 'Invalid Token' );
		} else {
			JRequest::checkToken() or die( 'Invalid Token' );
		}
		
		JRequest::setVar( 'hidemainmenu', 1 );
		
	    $document = JFactory::getDocument();
		$vType	  = $document->getType();
	    $view     = $this->getView('songs', $vType);

        $model    = $this->getModel('songs');
        $view->setModel($model, true);

		$view->setLayout('edit');

		$view->edit();
	}
	
	public function deletesongs()
	{
	    if(JRequest::checkToken( 'get' )) {
			JRequest::checkToken( 'get' ) or die( 'Invalid Token' );
		} else {
			JRequest::checkToken() or die( 'Invalid Token' );
		}
	
		$model = $this->getModel('songs');
	 	$model->delete();
	}
	
	public function applysongs()
	{
	    $this->savesongs();
	}
	
	public function savesongs()
	{
	    if(JRequest::checkToken( 'get' )) {
			JRequest::checkToken( 'get' ) or die( 'Invalid Token' );
		} else {
			JRequest::checkToken() or die( 'Invalid Token' );
		}
		
	  	$model = $this->getModel('songs');
	  	$model->save();
	}
	
	public function cancelsongs()
	{
		if(JRequest::checkToken( 'get' )) {
			JRequest::checkToken( 'get' ) or die( 'Invalid Token' );
		} else {
			JRequest::checkToken() or die( 'Invalid Token' );
		}
		
	    $model = $this->getModel('songs');
	    $model->cancel();
	}
	
	public function saveorder()
	{
		$model = $this->getModel('songs');
	  	$model->saveorder();		
	}
	
	public function orderdown()
	{
		$model = $this->getModel('songs');
	  	$model->move(1);		
	}
	
	public function orderup()
	{
		$model = $this->getModel('songs');
	  	$model->move(-1);		
	}
	
	public function publish()
    {
		if(JRequest::checkToken( 'get' )) {
			JRequest::checkToken( 'get' ) or die( 'Invalid Token' );
		} else {
			JRequest::checkToken() or die( 'Invalid Token' );
		}
		
		$model = $this->getModel('publish');
        $model->publish(JRequest::getCmd('task'));
    }
	
    public function unpublish()
    {
        $this->publish();
    }
	
	public function settings()
	{
	    $document = JFactory::getDocument();
		$vType	  = $document->getType();
	    $view     = $this->getView('settings', $vType);
		
        $model    = $this->getModel('settings');
        $view->setModel($model, true);

		$view->setLayout('default');

		$view->display();
	}
	
	public function savesettings()
	{
	    if(JRequest::checkToken( 'get' )) {
			JRequest::checkToken( 'get' ) or die( 'Invalid Token' );
		} else {
			JRequest::checkToken() or die( 'Invalid Token' );
		}
		
	  	$model = $this->getModel('settings');
	  	$model->save();
	}
	
}

?>