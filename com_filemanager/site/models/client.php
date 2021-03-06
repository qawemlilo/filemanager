<?php
defined('_JEXEC') or die('Restricted access');


// import Joomla modelitem library
jimport('joomla.application.component.modelitem');
require_once(dirname(__FILE__) . DS . 'tables' . DS . 'type.php');
require_once(dirname(__FILE__) . DS . 'tables' . DS . 'client.php');


class FileManagerModelClient extends JModelItem
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
    
    
    
    
    public function getTable($type = 'Client', $prefix = 'FileManagerTable', $config = array()) {
        return JTable::getInstance($type, $prefix, $config);
    }
    
    
    
    
    public function getDetails() {
        $user =& JFactory::getUser();
        $db =& JFactory::getDBO();
        
        $query = $db->getQuery(true);
        
        $query->select("clients.id, clients.userid, clients.title, clients.phone, clients.cell, clients.address, clients.fax, users.name, users.username, users.email")
              ->from("#__fm_clients AS clients, #__users AS users")
              ->where("clients.userid = users.id AND clients.userid = $user->id");
        
        $db->setQuery((string)$query);
        $result = $db->loadObject();
        
        return $result;
    }




    public function updateClient($id, $arr) {
        $table = $this->getTable();
        
        if (!$table->load($id)) {
            JError::raiseWarning(500, $table->getError());
            return false;
        }
        
        if (!$table->bind($arr)) {
            JError::raiseWarning(500, $table->getError());
            return false;
        }
        
        if (!$table->store($arr)) {
            JError::raiseWarning(500, $table->getError());
            return false;
        }
                
        return true;
    }    
    
    
    
    
    private function _buildQuery() {
        $user =& JFactory::getUser();
        $typeID = JRequest::getVar('file', 0, 'GET', 'int');
        
        $query = "SELECT * FROM #__fm_uploads ";
        $query .= "WHERE clientid = (SELECT id FROM #__fm_clients WHERE userid = $user->id) ";
        $query .= "AND typeid = $typeID ORDER BY ts ASC";
        
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

    

    
    public function getFileTypes() {
        $user =& JFactory::getUser();
        $db =& JFactory::getDBO();
        
        $query = $db->getQuery(true);
        $query->select("*")
              ->from("#__fm_types") 
              ->order("id ASC");
        $db->setQuery($query);
        $result = $db->loadObjectList();
        
        return $result;
    }
    
    
    
    
    public function getFiles() {
        $query = $this->_buildQuery();
        $this->_data = $this->_getList($query, $this->getState('limitstart'), $this->getState('limit'));
        
        return $this->_data;
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
}

