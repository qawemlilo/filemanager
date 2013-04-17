<?php
defined('_JEXEC') or die('Restricted access');


// import Joomla modelitem library
jimport('joomla.application.component.modelitem');
require_once(dirname(__FILE__) . DS . 'tables' . DS . 'type.php');
require_once(dirname(__FILE__) . DS . 'tables' . DS . 'client.php');


class FileManagerModelClient extends JModelItem
{
    public function getTable($type = 'Type', $prefix = 'FileManagerTable', $config = array()) {
        return JTable::getInstance($type, $prefix, $config);
    }

    
    
    public function getFileTypes() {
        $user =& JFactory::getUser();
        $db =& JFactory::getDBO();
        
        $query = "SELECT * FROM #__fm_types ORDER BY id ASC";
        $db->setQuery($query);
        $result = $db->loadObjectList();
        
        return $result;
    }
    
    
    
    
    public function getFiles() {
        $user =& JFactory::getUser();
        $typeID = JRequest::getVar('file', 0, 'GET', 'int');
        $db =& JFactory::getDBO();
        
        $query = "SELECT * FROM #__fm_uploads WHERE clientid = (SELECT id FROM #__fm_clients WHERE userid = $user->id) AND typeid = $typeID ORDER BY ts ASC";
        $db->setQuery($query);
        $result = $db->loadObjectList();
        
        return $result;
    }
}

