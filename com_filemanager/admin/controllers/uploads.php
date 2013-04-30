<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla controlleradmin library
jimport('joomla.application.component.controlleradmin');
 

 

class FileManagerControllerUploads extends JControllerAdmin
{
    public function getModel($name = 'Upload', $prefix = 'FileManagerModel') {
        $model = parent::getModel($name, $prefix, array('ignore_request' => true));
        
        return $model;
    }
}