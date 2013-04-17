<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');



class FileManagerViewClient extends JView
{
    function display($tpl = null) {
        $this->layout = JRequest::getVar('layout', '', 'GET');
        $this->file = JRequest::getVar('file', 0, 'GET', 'int');
        $this->config = JComponentHelper::getParams('com_filemanager');
        $this->user =& JFactory::getUser();
        $this->menu = false;
        
        if($this->user->guest) {
            $application = JFactory::getApplication();
            $application->redirect('index.php', 'Restricted area.');
        }
        
        if ($this->layout == 'edit') {
            $this->client = $this->get('Client');
        }
        
        if ($this->layout == 'edit') {
            $this->client = $this->get('Client');
        }
        else {
            if (!$this->file) {
                JRequest::setVar('file', 1);
                $this->file = 1;
            }
            
            $filetypes = $this->get('FileTypes');
            $this->menu = $this->createMenu($filetypes);
            
            $this->files = $this->get('Files');
        }
        
        parent::display($tpl);
    }
    
    
    
    
    private function createMenu ($filetypes) {
        $ul = '<ul class="nav nav-tabs">';
        
        if (!(is_array($filetypes) && count($filetypes) > 0)) {
            return false;
        }
        
        foreach ($filetypes as $filetype) {
            if ($this->file == $filetype->id) {
                $ul .= '<li class="active"><a href="' . JRoute::_('index.php?option=com_filemanager&view=client&file=' . $filetype->id) . '">' . $filetype->label . '</a></li>';
            }
            else {
                $ul .= '<li><a href="' . JRoute::_('index.php?option=com_filemanager&view=client&file=' . $filetype->id) . '">' . $filetype->label . '</a></li>';
            }
        }
        
        $ul .= '<li class="pull-right"><button href="#" class="btn btn-success"><i class="icon-pencil"> </i> My Details</button></li>';
        
        $ul .= '</ul>';
        
        return $ul;
    }
}
