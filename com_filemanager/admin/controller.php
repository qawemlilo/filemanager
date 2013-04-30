<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla controller library
jimport('joomla.application.component.controller');
 


class FileManagerController extends JController
{
    function display($cachable = false) {
        $view = JRequest::getCmd('view', 'Clients');
        JRequest::setVar('view', $view);

        parent::display($cachable);
        
        		// Set the submenu
		FileManagerHelper::addSubmenu($view);
    }
}
