<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla modelform library
jimport('joomla.application.component.modeladmin');
 
/**
 * HelloWorld Model
 */
class FileManagerModelUpload extends JModelAdmin
{
    public function getTable($type = 'Upload', $prefix = 'FileManagerTable', $config = array()) {
        return JTable::getInstance($type, $prefix, $config);
    }
    
    
    
    
    public function getForm($data = array(), $loadData = true) {
        $form = $this->loadForm('com_filemanager.upload', 'upload', array('control' => 'jform', 'load_data' => $loadData));
        
        if (empty($form)) {
          return false;
        }
        
        return $form;
    }
    
    protected function loadFormData() {
        $data = JFactory::getApplication()->getUserState('com_filemanager.edit.upload.data', array());
        
        if (empty($data)) {
            $data = $this->getItem();
        }
        return $data;
    }
}