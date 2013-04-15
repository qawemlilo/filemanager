<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

// Function checks if the user has permission to view this page
function isAllowed($permission = 3) {
    $user =& JFactory::getUser();
    $isAllowed = in_array($permission, $user->authorisedLevels());
    
	return $isAllowed;
}


class FileManagerViewAdminclients extends JView
{
    function display($tpl = null) {
        $this->layout = JRequest::getVar('layout', '', 'GET');
        
        if(!isAllowed()) {
            $application = JFactory::getApplication();
            $application->redirect('index.php?option=com_users&view=login', 'Restricted area, login required.');
        }
        
        if ($this->layout == 'new' || $this->layout == 'edit') {
            if ($this->layout == 'new') {
                $this->client = false;
            }
            elseif ($this->layout == 'edit') {
                $this->client = $this->get('Client');
            }
        }
        else {
            $this->clients = $this->get('Clients');
            $this->pagination = $this->get('Pagination');
        }
        
        parent::display($tpl);
    }
}
