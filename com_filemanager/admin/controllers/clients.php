<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla controlleradmin library
jimport('joomla.application.component.controlleradmin');
 

 

class FileManagerControllerClients extends JControllerAdmin
{
    public function getModel($name = 'Client', $prefix = 'FileManagerModel') {
        $model = parent::getModel($name, $prefix, array('ignore_request' => true));
        
        return $model;
    }
}