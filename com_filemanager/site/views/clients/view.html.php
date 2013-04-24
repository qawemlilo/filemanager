<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');


class FileManagerViewClients extends JView
{
    function display($tpl = null) {
        $this->layout = JRequest::getVar('layout', '', 'GET');
        $this->config = JComponentHelper::getParams('com_filemanager');
        $this->user =& JFactory::getUser();
        $this->pagination = '';
        
        if(!$this->user->authorise('core.manage', 'com_filemanager')) {
            $application = JFactory::getApplication();
            $refer = JRoute::_($_SERVER['HTTP_REFERER']);
            $application->redirect($refer, 'Restricted area, login required.');
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
            if ($this->clients) {
              $this->pagination = $this->get('Pagination');
            }
        }
        
        parent::display($tpl);
    }
}
