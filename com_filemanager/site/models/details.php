<?php
defined('_JEXEC') or die('Restricted access');


// import Joomla modelitem library
jimport('joomla.application.component.modelitem');

 

class FileManagerModelDetails extends JModelItem
{
    protected $users;
    
    
    private function combineMyArrays($arr1, $arr2) {
        $comb = array();
        $comb = array_merge($arr1, $arr2);
        $result = array();
        
        foreach($comb as $val) {
            foreach($val as $key2 => $val2) {
                $result[0][$key2] = $val2;
            }
        }
        
        return $result;
    }
    
    
    
    
    public function getUsers() {
        if (!isset($this->users)) {
            $user = JFactory::getUser();
            $id = $user->id;
            $db =& JFactory::getDBO();
            
            $query = "SELECT id, name, username, email FROM #__users WHERE jos_users.id=$id";
            $query2 = "SELECT title, cell, tel, fax, subscribe  FROM #__fm_users WHERE user_id = $id";
            
            $db->setQuery($query);
            
            $users1 = $db->loadAssocList();
            $db->setQuery($query2);
            
            $users2 = $db->loadAssocList();
            $this->users = $this->combineMyArrays($users1, $users2);
        }
        
        return $this->users;
    }
}

