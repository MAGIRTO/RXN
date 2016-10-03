<?php
/*
 * @version		$Id: default.php 1.0 2015-05-21 $
* @package		Joomla
* @copyright   Copyright (C) 2015-2016 Appten
* @license     GNU/GPL http://www.gnu.org/licenses/gpl-2.0.html
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

// Import Joomla! libraries
jimport('joomla.application.component.model');

// Import filesystem libraries.
jimport('joomla.filesystem.file');

class HdwMusicModelDefault extends JModelLegacy {

    public function __construct() {
		parent::__construct();
    }
	
	public function getdata()
    {
        $allow_fileuploads   = ini_get('file_uploads') ? JText::_('YES') : JText::_('NO');
		$upload_max_filesize = ini_get('upload_max_filesize');
		$max_input_time      = ini_get('max_input_time');
		$memory_limit        = ini_get('memory_limit');
		$max_execution_time  = ini_get('max_execution_time');
		$post_max_size       = ini_get('post_max_size');
		$upload_dir          = (is_writable(JPATH_ROOT.DS.'media'.DS)) ? JText::_('YES') : JText::_('NO');
            
		$output[0] = array( 'name' => JText::_('ALLOW_FILE_UPLOADS'),           'value' => $allow_fileuploads );
		$output[1] = array( 'name' => JText::_('UPLOAD_MAX_FILESIZE'),          'value' => $upload_max_filesize );
		$output[2] = array( 'name' => JText::_('MAX_INPUT_TIME'),               'value' => $max_input_time );
		$output[3] = array( 'name' => JText::_('MEMORY_LIMIT'),                 'value' => $memory_limit );
		$output[4] = array( 'name' => JText::_('MAX_EXECUTION_TIME'),           'value' => $max_execution_time );
		$output[5] = array( 'name' => JText::_('POST_MAX_SIZE'),                'value' => $post_max_size );
		$output[6] = array( 'name' => JText::_('UPLOAD_DIRECTORY_PERMISSION'),  'value' => $upload_dir );
          
        return $output;
	}
	
}

?>