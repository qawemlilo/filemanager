<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla view library
jimport('joomla.application.component.view');
 



class FileManagerViewUpload extends JView
{
    function display($tpl = null) {
        $this->form = $this->get('Form');
        $this->upload = $this->get('Item');
        
        if (count($errors = $this->get('Errors'))) {
            JError::raiseError(500, implode('<br />', $errors));
            return false;
        }
        
        $this->addToolBar();
        
        parent::display($tpl);
    }
    
    
    
    protected function addToolBar() {
        $input = JFactory::getApplication()->input;
        $input->set('hidemainmenu', true);
        $isNew = ($this->upload->id == 0);
        
        JToolBarHelper::title($isNew ? JText::_('COM_FILEMANAGER_ADMIN_CLIENT_NEW') : JText::_('COM_FILEMANAGER_ADMIN_CLIENT_EDIT'));
        JToolBarHelper::save('upload.save');
        
        JToolBarHelper::cancel('upload.cancel', $isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE');
    }
}
