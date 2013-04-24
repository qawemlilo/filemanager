<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

class FileManagerViewFileTypes extends JView
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
                $this->type = false;
            }
            elseif ($this->layout == 'edit') {
                $this->type = $this->get('Type');
            }
        }
        else {
            $this->types = $this->get('Types');
            $this->pagination = $this->get('Pagination');
        }
        
        parent::display($tpl);
    }
}
