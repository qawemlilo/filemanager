<?php
defined('_JEXEC') or die('Restricted access');


// import Joomla modelitem library
jimport('joomla.application.component.modelitem');
require_once(dirname(__FILE__) . DS . 'tables' . DS . 'upload.php');


class FileManagerModelUploads extends JModelItem
{
    private $_total = null;    
    private $_pagination = null;   
    
    
    function __construct() {
        parent::__construct();
 
        $mainframe = JFactory::getApplication();
 
        // Get pagination request variables
        $limit = $mainframe->getUserStateFromRequest('global.list.limit', 'limit', 5, 'int');
        $limitstart = JRequest::getVar('limitstart', 0, '', 'int');
        
        // In case limit has been changed, adjust it
        $limitstart = ($limit != 0 ? (floor($limitstart / $limit) * $limit) : 0);
        $this->setState('limit', $limit);
        $this->setState('limitstart', $limitstart);
    }
    
    
    
    private function _buildQuery() {
        $query = "SELECT upload.id, 
                         upload.ts,
                         upload.filename, 
                         upload.ext, 
                         upload.clientid, 
                         upload.typeid, 
                         type.label,
                         client.title,
                         user.name ";
        $query .= "FROM #__fm_uploads upload ";
        $query .= "INNER JOIN #__fm_types type ON upload.typeid = type.id ";
        $query .= "INNER JOIN #__fm_clients client ON upload.clientid = client.id ";
        $query .= "INNER JOIN #__users user ON client.userid = user.id ";
        $query .= "ORDER BY ts ASC";
        
        return $query;        
    }
    
    
    
    
    private function getTotal() {
        // Load the content if it doesn't already exist
        if (empty($this->_total)) {
            $query = $this->_buildQuery();
 	        $this->_total = $this->_getListCount($query);	
 	    }
        return $this->_total;
    }
    
    
    
    
    public function getPagination() {
 	    $total = $this->getTotal();
 	    
        // Load the content if it doesn't already exist
 	    if (empty($this->_pagination)) {
 	        jimport('joomla.html.pagination');
 	        $this->_pagination = new JPagination($total, $this->getState('limitstart'), $this->getState('limit') );
        }
 	
        return $this->_pagination;
    }
    
    

    
    public function getTable($type = 'Upload', $prefix = 'FileManagerTable', $config = array()) {
        return JTable::getInstance($type, $prefix, $config);
    }
    
    
    
    
    public function getUploads() {
        $query = $this->_buildQuery();
        $this->_data = $this->_getList($query, $this->getState('limitstart'), $this->getState('limit'));
        
        return $this->_data;
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

