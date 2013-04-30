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
        $this->config = JComponentHelper::getParams('com_filemanager');
        $this->colspan = 4;
        
        if (count($errors = $this->get('Errors'))) {
            JError::raiseError(500, implode('<br />', $errors));
            return false;
        }
        
        $this->addToolBar();
        
        parent::display($tpl);
        $this->setDocument();
    }
    
    
    
    protected function addToolBar() {
        JToolBarHelper::title(JText::_('COM_FILEMANAGER'));
        JToolBarHelper::addNew('client.add');
        JToolBarHelper::editList('client.edit');
        JToolBarHelper::deleteList('', 'clients.delete');
        JToolBarHelper::preferences('com_filemanager');
    }
    
    
    
    
    protected function setDocument() {
        $document = JFactory::getDocument();
        $document->setTitle(JText::_('COM_FILEMANAGER'));
    }
}
