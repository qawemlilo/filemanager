<?php
defined('_JEXEC') or die('Restricted access');


// import Joomla modelitem library
jimport('joomla.application.component.modelitem');
require_once(dirname(__FILE__) . DS . 'tables' . DS . 'client.php');


class FileManagerModelAdminclients extends JModelItem
{
    private $_total = null;    
    private $_pagination = null;   
    
    
    function __construct() {
        parent::__construct();
 
        $mainframe = JFactory::getApplication();
 
        // Get pagination request variables
        $limit = $mainframe->getUserStateFromRequest('global.list.limit', 'limit', 10, 'int');
        $limitstart = JRequest::getVar('limitstart', 0, '', 'int');
        
        // In case limit has been changed, adjust it
        $limitstart = ($limit != 0 ? (floor($limitstart / $limit) * $limit) : 0);
        $this->setState('limit', $limit);
        $this->setState('limitstart', $limitstart);
    }
    
    
    
    
    
    public function getTable($type = 'Client', $prefix = 'FileManagerTable', $config = array()) {
        return JTable::getInstance($type, $prefix, $config);
    }
    
    
    
    
    public function addClient($arr = array()) {
        
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
    
    
    
    
    public function getClient() {
        $id = JRequest::getInt('id');
        $query = "SELECT clients.id, clients.userid, clients.title, clients.phone, clients.cell, clients.address, clients.fax, clients.subscribe, users.name, users.email ";
        $query .= "FROM #__fm_clients clients ";
        $query .= "FULL OUTER JOIN #__users users ON clients.userid = users.id ";
        $query .= "WHERE clients.id = $id";
        $db->setQuery($query);
        $result = $db->loadObject();
        
        return $result;
    }  
    
    
    
    
    public function updateClient($id, $arr) {
        $table = $this->getTable();
        
        if (!$table->load($id)) {
            JError::raiseWarning( 500, $table->getError() . ' (id:' . $id . ')' );
            return false;
        }
        
        if (!$table->bind($arr)) {
            JError::raiseWarning( 500, $table->getError() . ' (id:' . $id . ')' );
            return false;
        }
        
        if (!$table->store($arr)) {
            JError::raiseWarning( 500, $table->getError() . ' (id:' . $id . ')' );
            return false;
        }
                
        return true;
    }
    
    
    
 
    public function removeClients($clients) {
        if (is_array($clients) && count($clients) > 0) {
            $ids = '(' . implode(",", $clients) . ')';
            
            $db =& JFactory::getDBO();
            $query = "DELETE FROM #__users WHERE id IN (SELECT userid FROM #__ss_clients WHERE id IN $ids)";
            $query2 = "DELETE FROM #__ss_clients WHERE id IN $ids";
            $db->setQuery($query);
            $result = $db->query();
            
            if ($result) {
                $db->setQuery($query2);
                $result = $db->query();
                
                return $result;
            }
                
            return false;
        }
        
        return false;
    }
    
    
    
    
    private function _buildQuery() {
        $query = "SELECT #__fm_clients.id, 
                         #__fm_clients.userid, 
                         #__fm_clients.phone, 
                         #__fm_clients.cell, 
                         #__fm_clients.fax, 
                         #__fm_clients.address, 
                         #__fm_clients.subscribe,
                         #__users.name,
                         #__users.email,
                         #__users.username ";
        $query .= "FROM #__fm_clients, #__users ";
        $query .= "WHERE #__fm_clients.userid = #__users.id";
        
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
    
    
    
    
    public function getClients() {
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

