<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla view library
jimport('joomla.application.component.view');
 



class FileManagerViewClients extends JView
{
    function display($tpl = null) {
        $this->clients = $this->get('Items');
        $this->pagination = $this->get('Pagination');
        
        jimport('joomla.application.component.view');
        JToolBarHelper::title(JText::_('COM_FILEMANAGER'));
        JToolBarHelper::preferences('com_filemanager');
        
        if (count($errors = $this->get('Errors'))) {
            JError::raiseError(500, implode('<br />', $errors));
            return false;
        }
        
        parent::display($tpl);
    }
}
