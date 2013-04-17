<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla controller library
jimport('joomla.application.component.controller');
 


class FileManagerController extends JController
{
    function display($cachable = false) {
        $input = JFactory::getApplication()->input;
        $input->set('view', $input->getCmd('view', 'Clients'));

        parent::display($cachable);
    }
}
