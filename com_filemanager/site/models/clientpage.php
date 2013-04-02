<?php
defined('_JEXEC') or die('Restricted access');

// import Joomla modelitem library
jimport('joomla.application.component.modelitem');


class FileManagerModelClientPage extends JModelItem
{
    protected $t, $c, $d;
    
    
    private function qUserId() {
        $user =& JFactory::getUser();
        return $user->get('id');
    }
    
    
    
    
    public function getTracker() {
        $id = $this->qUserId();
        
        if (!isset($this->t)) {
            $db =& JFactory::getDBO();
            $query = 'SELECT * FROM #__fm_files WHERE user_id="'.$id.'" AND file_type="tracker"';
            $db->setQuery($query);
            $this->t = $db->loadAssocList();
        }
        
        return $this->t;
    }
    
    
    
    
    public function getCorrespondence() { 
        $id = $this->qUserId();
        
        if (!isset($this->c)) {
            $db =& JFactory::getDBO();
            
            $query = 'SELECT name, ts FROM #__fm_files WHERE user_id="'.$id.'" AND file_type="corresp"';
            $db->setQuery($query);
            $this->c = $db->loadAssocList();
        }
        
        return $this->c;
    }
    
    
    
    public function getDocuments() {
        $id = $this->qUserId();
        
        if (!isset($this->d)) {
            $db =& JFactory::getDBO();
            $query = 'SELECT name,ts FROM #__fm_files WHERE user_id="'.$id.'" AND file_type="doc"';
            $db->setQuery($query);
            $this->d = $db->loadAssocList();
        }
        
        return $this->d;
    }
}

