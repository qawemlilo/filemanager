<?php
defined('_JEXEC') or die('Restricted access');
 jimport('joomla.application.component.modeladmin');
 
class FileManagerFpModelFileManager extends JModelAdmin
{    public function getTable($type = 'FileManager', $prefix = 'FileManagerTable', $config = array()) {        return JTable::getInstance($type, $prefix, $config);    }                public function getForm($data = array(), $loadData = true) {        $form = $this->loadForm('com_filemanager.filemanager', 'filemanager', array('control' => 'jform', 'load_data' => $loadData));                if (empty($form)) {            return false;        }                return $form;    }                protected function loadFormData() {        // Check the session for previously entered form data.        $data = JFactory::getApplication()->getUserState('com_filemanager.edit.filemanager.data', array());        if (empty($data)) {            $data = $this->getItem();        }                return $data;    }
}
