<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');


class FileManagerViewUploads extends JView
{
    function display($tpl = null) {
        $this->layout = JRequest::getVar('layout', '', 'GET');
        $this->config = JComponentHelper::getParams('com_filemanager');
        $this->user =& JFactory::getUser();
        $application = JFactory::getApplication();
        $this->pagination = '';
        
        if(!$this->user->authorise('core.manage', 'com_filemanager')) {
            $application = JFactory::getApplication();
            $refer = JRoute::_($_SERVER['HTTP_REFERER']);
            $application->redirect($refer, 'Restricted area, login required.');
        }
        
        if ($this->layout != 'new') {
            $this->uploads = $this->get('Uploads');
            $this->pagination = $this->get('Pagination');
        }
        else {
            $users = $this->get('Users');
            $filetypes = $this->get('Types');
            
            $this->filetypes = $this->createFiletypeDropDown($filetypes);
            $this->users = $this->createUsersDropDown($users);        
        } 
        
        parent::display($tpl);
    }
    
    
    
    
    function createUsersDropDown ($users) {
        $select = '<select name="clientid" required="" class="input-xlarge">';
        $select .= '<option value="0">Select Client</option>';
        
        if (!(is_array($users) && count($users) > 0)) {
            return false;
        }
        
        foreach ($users as $user) {
            $select .= '<option value="' . $user->id . '">' . $user->title . ' ' . $user->name . '</option>'; 
        }
        
        $select .= '</select>';
        
        return $select;
    }
    
    
    
    
    function createFiletypeDropDown ($filetypes) {
        $select = '<select name="typeid" required="" class="input-xlarge">';
        $select .= '<option value="0">Select File Type</option>';
        
        if (!(is_array($filetypes) && count($filetypes) > 0)) {
            return false;
        }
        
        foreach ($filetypes as $filetype) {
            $select .= '<option value="' . $filetype->id . '">' . $filetype->label . '</option>';
        }
        
        $select .= '</select>';
        
        return $select;
    }
}
