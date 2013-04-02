<?php
defined('_JEXEC') or die('Restricted access');


// import Joomla modelitem library
jimport('joomla.application.component.modelitem');



class FileManagerModelUploadFile extends JModelItem
{
    protected $users;
    
    
    public function getUsers() {
        if (!isset($this->users)) {
            $db =& JFactory::getDBO();
            
            $query = "SELECT DISTINCT user_id FROM #__fm_users";
            $db->setQuery($query);
            $id_arr = $db->loadResultArray();
            $id_arr = implode(",", $id_arr);
            
            $query_two = "SELECT id, name FROM #__users WHERE id in ($id_arr)";
            $db->setQuery($query_two);
            $this->users = $db->loadAssocList();
        }
        
        return $this->users;
    }
}

