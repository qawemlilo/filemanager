<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla view library
jimport('joomla.application.component.view');
 



class FileManagerViewClient extends JView
{
    function display($tpl = null) {
        $this->form = $this->get('Form');
        $this->client = $this->get('Item');
        
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
        $isNew = ($this->client->id == 0);
        
        JToolBarHelper::title($isNew ? JText::_('COM_FILEMANAGER_ADMIN_CLIENT_NEW') : JText::_('COM_FILEMANAGER_ADMIN_CLIENT_EDIT'));
        JToolBarHelper::save('client.save');
        
        JToolBarHelper::cancel('client.cancel', $isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE');
    }
}
