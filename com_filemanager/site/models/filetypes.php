<?php
defined('_JEXEC') or die('Restricted access');


// import Joomla modelitem library
jimport('joomla.application.component.modelitem');
require_once(dirname(__FILE__) . DS . 'tables' . DS . 'type.php');


class FileManagerModelFileTypes extends JModelItem
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
    
    
    
    
    
    public function getTable($type = 'Type', $prefix = 'FileManagerTable', $config = array()) {
        return JTable::getInstance($type, $prefix, $config);
    }
    
    
    
    
    public function addType($arr = array()) {
        
        if (is_array($arr) && count($arr) > 0) {
            $table =& $this->getTable();
            
            if (!$table->bind($arr)) {
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
    
    
    
    public function getType() {
        $id = JRequest::getInt('id');
        $table =& $this->getTable();
        
        if (!$table->load($id)) {
            JError::raiseWarning( 500, $table->getError() );
        }
        
        return $table;
    }  
    
    
    
    
    public function updateType($id, $arr) {
        $table =& $this->getTable();
        $config = JComponentHelper::getParams('com_filemanager');
        
        if (!$table->load($id)) {
            JError::raiseWarning( 500, $table->getError() . ' (id:' . $id . ')' );
            return false;
        }
        
        if (!$config->get('allow_crossediting')) {
            $user =& JFactory::getUser();
            if ((int) $table->created_by != (int) $user->get('id')) {
                JError::raiseWarning(500, 'You can only edit content created by you.');
                return false;
            }
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
    
    
    
 
    public function removeType($id) {
        $table =& $this->getTable();
        $config = JComponentHelper::getParams('com_filemanager');
        
        if (!$table->load($id)) {
            JError::raiseWarning( 500, $table->getError() . ' (id:' . $id . ')' );
            return false;
        }
        
        if (!$config->get('allow_crossediting')) {
            $user =& JFactory::getUser();
            if ((int) $table->created_by != (int) $user->get('id')) {
                JError::raiseWarning(500, 'You can only edit content created by you.');
                return false;
            }
        }
        
        if (!$table->delete($id)) {
            JError::raiseWarning( 500, $table->getError() . ' (id:' . $id . ')' );
            return false;
        }
                
        return true;
    }
    
    
    
    public function removeTypes($arr = array()) {
        $result = true;
        
        if (is_array($arr) && count($arr) > 0) {
            foreach($arr as $id) {
                if (!$this->removeType($id)) {
                    JError::raiseWarning(500, 'Failed to delete ' . $id);
                    $result = false;
                }
            }
        }
        else {
            $result = false;
        }
        
        return $result;
    }
    
    
    
    
    private function _buildQuery() {
        $query = "SELECT * FROM #__fm_types ORDER BY id ASC";
        
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
    
    
    
    
    public function getTypes() {
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

