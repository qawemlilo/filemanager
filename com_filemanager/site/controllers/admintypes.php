<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controller library
jimport('joomla.application.component.controller');
jimport('joomla.filesystem.file');

class FileManagerControllerAdmintypes extends JController
{
    private $refer;
    private $application;
    
    
    public function getModel($name = '', $prefix = '', $config = array('ignore_request' => true)) {
        return parent::getModel($name, $prefix, array('ignore_request' => false));
    }
    
    
    
    
    public function add() {
        JRequest::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        
        $application =& JFactory::getApplication();
        $model =& $this->getModel('admintypes');
        $refer = JRoute::_($_SERVER['HTTP_REFERER']);
        $filetype = array();

        $filetype['label'] = JRequest::getVar('label', '', 'post', 'string');
        
        if ($model->addType($filetype)) {
            $application->redirect('index.php?option=com_filemanager&view=admintypes', 'File type successfully created', 'success');
        }
        else {
            $application->redirect($refer, 'Error! Failed to create file type', 'error');
        }
    }
    
    
    
    
    public function edit () {
        JRequest::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        
        $application =& JFactory::getApplication();
        $refer = JRoute::_($_SERVER['HTTP_REFERER']);
        $model =& $this->getModel('admintypes');
        $types = JRequest::getVar('types', null, 'post', 'array');
                
        if (is_array($types) && !empty($types) && count($types) > 0) {
            if (!($id = (int)$types[0])) {
                $application->redirect($refer, 'Error! Failed to open File Type', 'error');
            }
            else {
                $nextpage = JRoute::_('index.php?option=com_filemanager&view=admintypes&layout=edit&id=' . $id);
                $application->redirect($nextpage);
            }
        }
        else {
            $application->redirect($refer, 'Error! No File Type was selected', 'error');
        }
    }
    
    
    
    
    public function update() {
        JRequest::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        
        $application =& JFactory::getApplication();
        $model =& $this->getModel('admintypes');
        $refer = JRoute::_($_SERVER['HTTP_REFERER']);
        $filetype = array();

        $filetype['label'] = JRequest::getVar('label', '', 'post', 'string');
        $id = JRequest::getVar('id', '', 'post', 'int');
        
        if ($model->updateType($id, $filetype)) {
            $application->redirect('index.php?option=com_filemanager&view=admintypes', 'File type successfully updated', 'success');
        }
        else {
            $application->redirect($refer, 'Error! Failed to update file type', 'error');
        }
    }
    
    
    
    
    public function remove () {
        JRequest::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        
        $application =& JFactory::getApplication();
        $refer = JRoute::_($_SERVER['HTTP_REFERER']);
        $model =& $this->getModel('admintypes');
        $types = JRequest::getVar('types', null, 'post', 'array');
        
        if (is_array($types) && !empty($types) && count($types) > 0) {
            if (!$model->removeTypes($types)) {
                $application->redirect($refer, 'Error! Failed to delete File Type(s)', 'error');
            }
            else {
                $application->redirect($refer, 'File Type(s) successfully deleted!', 'success');
            }
        }
        else {
            $application->redirect($refer, 'Error! No file types were selected', 'error');
        }
    }
}
