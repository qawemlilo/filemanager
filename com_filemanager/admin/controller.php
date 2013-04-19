<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla controller library
jimport('joomla.application.component.controller');
 


class FileManagerController extends JController
{
    function display($cachable = false) {
        JRequest::setVar('view', JRequest::getCmd('view', 'Clients'));

        parent::display($cachable);
    }
}
