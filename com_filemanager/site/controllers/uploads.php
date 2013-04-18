<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controller library
jimport('joomla.application.component.controller');
jimport('joomla.filesystem.file');

class FileManagerControllerUploads extends JController
{
    private $refer;
    private $application;
    
    
    public function getModel($name = '', $prefix = '', $config = array('ignore_request' => true)) {
        return parent::getModel($name, $prefix, array('ignore_request' => false));
    }
    
    
    
    
    public function add() {
        JRequest::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        
        $application =& JFactory::getApplication();
        $model =& $this->getModel('uploads');
        $refer = JRoute::_($_SERVER['HTTP_REFERER']);
        $newupload = array();

        $newupload['clientid'] = JRequest::getVar('clientid', '', 'post', 'int');
        $newupload['typeid'] = JRequest::getVar('typeid', '', 'post', 'int');
        $file =  JRequest::getVar('fileupload', null, 'files', 'array');
        
        if (!empty($file) && !empty($file['name']) && !empty($file['tmp_name'])) {
            $filename = JFile::makeSafe($file['name']);
            $ext = strtolower(JFile::getExt($filename));
            
            $newupload['ext'] = $ext;
            $newupload['filename'] = $this->parseFilename($filename, $ext);
            
            $path = JPATH_SITE . DS . 'media' . DS . 'com_filemanager' . DS . 'client_' . $newupload['clientid'] . DS . $newupload['filename'];
            
            $success = $this->upload($file['tmp_name'], $path);
                
            if (!$success) {
                $application->redirect($refer, 'Error! Failed to upload the file', 'error');
            }
            else {
                if ($model->addUpload($newupload)) {
                    $application->redirect($refer, 'File successfully uploaded', 'success');
                }
                else {
                    $application->redirect($refer, 'Database Error! Failed to save file', 'success');
                }
            }
        }
        else {
            $application->redirect($refer, 'Error! You did not include the file', 'error');
        }
    }
    
    
    
    
    public function edit () {
        JRequest::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        
        $application =& JFactory::getApplication();
        $refer = JRoute::_($_SERVER['HTTP_REFERER']);
        $model =& $this->getModel('filetypes');
        $types = JRequest::getVar('types', null, 'post', 'array');
                
        if (is_array($types) && !empty($types) && count($types) > 0) {
            if (!($id = (int)$types[0])) {
                $application->redirect($refer, 'Error! Failed to open File Type', 'error');
            }
            else {
                $nextpage = JRoute::_('index.php?option=com_filemanager&view=filetypes&layout=edit&id=' . $id);
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
        $model =& $this->getModel('filetypes');
        $refer = JRoute::_($_SERVER['HTTP_REFERER']);
        $filetype = array();

        $filetype['label'] = JRequest::getVar('label', '', 'post', 'string');
        $id = JRequest::getVar('id', '', 'post', 'int');
        
        if ($model->updateType($id, $filetype)) {
            $application->redirect('index.php?option=com_filemanager&view=filetypes', 'File type successfully updated', 'success');
        }
        else {
            $application->redirect($refer, 'Error! Failed to update file type', 'error');
        }
    }
    
    
    
    
    public function remove () {
        JRequest::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        
        $application =& JFactory::getApplication();
        $refer = JRoute::_($_SERVER['HTTP_REFERER']);
        $model =& $this->getModel('filetypes');
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
    
    
    
    private function parseFilename($name, $ext = '') {
	    $config = JComponentHelper::getParams('com_filemanager');
        $str = '';
        
        if ($config->get('og_filename')) {
            return $name;   
        }
        
        if ($pref = $config->get('filename_prefix')) {
            $str .= $pref;
        }
        
        if ($pref = $config->get('use_timestamp')) {
            $str .= time();
        }
        
        $str .= '.' . $ext;
        
        return $str;
    }
    
    
    
    
    private function createFolder($path) {
	    if (!JFolder::exists($path)) { 
		    if(!JFolder::create($path, 0777)) {
                return false;
		    }
            else {
                return true;
            }                    
        }
        else {
            return true;
        }
    }
    
    
    
    
    private function deleteFolders ($categories) {
        $path = JPATH_SITE . DS . 'media' . DS . 'com_saservice' . DS . 'categories' . DS . 'category_';
        
        foreach ($categories as $id) {
            if (JFolder::exists($path . $id)) {
                JFolder::delete($path . $id);
            }
        }
    
        return true;
    }




    private function upload($src, $dest) {
        if (JFile::exists($dest)) {
            JFile::delete($dest);  
        }
    
        if (JFile::upload($src, $dest)) {
            return true;
        }
    
        return false;
    }
}
