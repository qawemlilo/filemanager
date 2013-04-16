<?php
defined('_JEXEC') or die('Restricted access');


// import Joomla modelitem library
jimport('joomla.application.component.modelitem');
require_once(dirname(__FILE__) . DS . 'tables' . DS . 'upload.php');


class FileManagerModelAdminuploads extends JModelItem
{
    public function getTable($type = 'Upload', $prefix = 'FileManagerTable', $config = array()) {
        return JTable::getInstance($type, $prefix, $config);
    }
    
    
    
    public function getUsers() {
        $query = "SELECT clients.id, 
                         clients.title,
                         clients.userid, 
                         users.name ";
        $query .= "FROM #__fm_clients clients, #__users users ";
        $query .= "WHERE clients.userid = users.id ORDER BY users.name ASC ";
        
        $db =& JFactory::getDBO();
        $db->setQuery($query);
        $result = $db->loadObjectList();
        
        if (!$result) {
            JError::raiseWarning( 500, $db->getErrorMsg());
        }
        
        return $result;
    }  
    
    
    
    
    public function getTypes() {
        $query = "SELECT * ";
        $query .= "FROM #__fm_types ORDER BY label ASC";
        
        $db =& JFactory::getDBO();
        $db->setQuery($query);
        $result = $db->loadObjectList();
        
        if (!$result) {
            JError::raiseWarning( 500, $db->getErrorMsg());
        }
        
        return $result;
    } 
    
    
    public function addUpload($arr = array()) {
        
        if (is_array($arr) && count($arr) > 0) {
            $table = $this->getTable();
            
            if (!$table->bind( $arr )) {
                JError::raiseWarning( 500, $table->getError() );
                return false;
            }
            if (!$table->store( $arr )) {
                JError::raiseWarning( 500, $table->getError() );
                return false;
            }
                
            return $table->id;
        }
        
        return false;
    }
    
    
    public function updateUpload($arr = array()) {
        
        if (is_array($arr) && count($arr) > 0) {
            $table = $this->getTable();
            
            if (!$table->bind( $arr )) {
                JError::raiseWarning( 500, $table->getError() );
                return false;
            }
            if (!$table->store( $arr )) {
                JError::raiseWarning( 500, $table->getError() );
                return false;
            }
                
            return $table->id;
        }
        
        return false;
    }
}

