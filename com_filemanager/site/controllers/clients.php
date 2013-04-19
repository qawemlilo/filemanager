<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controller library
jimport('joomla.application.component.controller');
jimport('joomla.filesystem.file');

class FileManagerControllerClients extends JController
{
    private $refer;
    private $application;
    
    
    public function getModel($name = '', $prefix = '', $config = array('ignore_request' => true)) {
        return parent::getModel($name, $prefix, array('ignore_request' => false));
    }
    
    
    
    
    public function add() {
        JRequest::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        
        $application =& JFactory::getApplication();
        $model =& $this->getModel('clients');
        $refer = JRoute::_($_SERVER['HTTP_REFERER']);
        $user =& JFactory::getUser();
        $client = array();
        
        $id = $this->createUser();
        
        if(!$id) {
            $application->redirect($refer, 'Failed to create user ' . $id, 'error');
            exit();
        }
        
        $client['userid'] = $id;
        $client['created_by'] = (int) $user->get('id');
        $client['title'] = JRequest::getVar('title', '', 'post', 'string');
        $client['phone'] = JRequest::getVar('phone', 0, 'post', 'int');
        $client['fax'] = JRequest::getVar('fax', 0, 'post', 'int');
        $client['cell'] = JRequest::getVar('cell', 0, 'post', 'int');
        $client['address'] = JRequest::getVar('address', '', 'post', 'string');
        $client['subscribe'] = JRequest::getVar('subscribe', 0, 'post', 'int');
        
        if (($clientid = $model->addClient($client))) {
            $path = JPATH_SITE . DS . 'media' . DS . 'com_filemanager' . DS . 'clients' . DS . 'client_' . $clientid;
            
            if (!$this->createFolder($path)) {
                $application->redirect($refer, 'Error! Failed to create client folder', 'error');
            }
            else {
                $application->redirect($refer, 'Client successfully created', 'success');
            }
        }
        else {
            $application->redirect($refer, 'Error! Failed to create client', 'error');
        }
    }
    
    
    
    
    public function edit () {
        JRequest::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        
        $application =& JFactory::getApplication();
        $refer = JRoute::_($_SERVER['HTTP_REFERER']);
        $model =& $this->getModel('clients');
        $clients = JRequest::getVar('clients', null, 'post', 'array');
                
        if (is_array($clients) && !empty($clients) && count($clients) > 0) {
            if (!($id = (int)$clients[0])) {
                $application->redirect($refer, 'Error! Failed to open Listing', 'error');
            }
            else {
                $nextpage = JRoute::_('index.php?option=com_filemanager&view=clients&layout=edit&id=' . $id);
                $application->redirect($nextpage);
            }
        }
        else {
            $application->redirect($refer, 'Error! No Listing was selected', 'error');
        }
    }
    
    
    
    
    public function update() {
        JRequest::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        
        $application =& JFactory::getApplication();
        $model =& $this->getModel('clients');
        $refer = JRoute::_($_SERVER['HTTP_REFERER']);
        $client = array();
        
        $id = JRequest::getVar('id', '', 'post', 'int'); 
        
        $client['title'] = JRequest::getVar('title', '', 'post', 'string');
        $client['phone'] = JRequest::getVar('phone', 0, 'post', 'int');
        $client['fax'] = JRequest::getVar('fax', 0, 'post', 'int');
        $client['cell'] = JRequest::getVar('cell', 0, 'post', 'int');
        $client['address'] = JRequest::getVar('address', '', 'post', 'string');
        
        if (!$this->updateUser()) {
            JError::raiseWarning(500, 'Failed to update user info');
        }
        
        if ($model->updateClient($id, $client)) {
            $application->redirect('index.php?option=com_filemanager&view=clients', 'Client info successfully updated', 'success');
        }
        else {
            $application->redirect($refer, 'Error! Failed to update client info', 'error');
        }
    }
    
    
    
    
    public function remove () {
        JRequest::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        
        $application =& JFactory::getApplication();
        $refer = JRoute::_($_SERVER['HTTP_REFERER']);
        $model =& $this->getModel('clients');
        $clients = JRequest::getVar('clients', null, 'post', 'array');
        
        if (is_array($clients) && !empty($clients) && count($clients) > 0) {
            if (!$model->removeClients($clients)) {
                $application->redirect($refer, 'Error! Failed to delete Listing(s)', 'error');
            }
            else {
                $application->redirect($refer, 'Client(s) successfully deleted!', 'success');
            }
        }
        else {
            $application->redirect($refer, 'Error! No clients were selected', 'error');
        }
    }
    
    
    
    
    private function createUser() {
		$user = array();
        
	    $user['fullname'] = JRequest::getVar('fullname', '', 'post', 'string');
		$user['email'] = JRequest::getVar('email', '', 'post', 'string');
		$user['username'] = JRequest::getVar('username', '', 'post', 'string');
		$password = JRequest::getVar('password', '', 'post', 'string');
		
		$salt = JUserHelper::genRandomPassword(32);
        $crypt = JUserHelper::getCryptedPassword($password, $salt);
        $password = $crypt.':'.$salt;
		
		$instance = JUser::getInstance();		
		$config = JComponentHelper::getParams('com_users');
		$defaultUserGroup = $config->get('new_usertype', 2);
		$acl = JFactory::getACL();
		
		$instance->set('id', null);
		$instance->set('name', $user['fullname']);
		$instance->set('username', $user['username']);
		$instance->set('password', $password);
		$instance->set('email', $user['email']);
		$instance->set('usertype', 'deprecated');
		$instance->set('groups', array($defaultUserGroup));
		

        if ($instance->save()) {      
	        $newUser =& JFactory::getUser($user['username']);
			$id = $newUser->id;
            
            return $id;
		}
        else {   
	        return false;	
        }			
    }
    
    
    
    
    private function updateUser() {
        $id = JRequest::getVar('userid', '', 'post', 'int');
	    $fullname = JRequest::getVar('fullname', '', 'post', 'string');
		$email = JRequest::getVar('email', '', 'post', 'string');
        
        $user =& JFactory::getUser($id);
        
        
        if ($email != $user->email || $fullname != $user->name) {
            if ($email != $user->email) {
               $user->set('email', $email);
            }
            
            if ($fullname != $user->name) {
               $user->set('name', $fullname);
            }
        
            if (!$user->save()) {
                return false;
            }
        }
        
        return true;
    }
    
    
    
    
    private function createFolder($path) {
	    if (!JFolder::exists($path)) { 
		    if(!JFolder::create($path, 0777)) {
                return false;
		    }
            else {
                return true;
            }                    
        }
        else {
            return true;
        }
    }
    
    
    
    
    private function deleteFolders ($id) {
        $path = JPATH_SITE . DS . 'media' . DS . 'com_filemanager' . DS . 'client_' . $id;
        
        foreach ($categories as $id) {
            if (JFolder::exists($path . $id)) {
                JFolder::delete($path . $id);
            }
        }
    
        return true;
    }




    public function upload($src, $dest) {
        if (JFile::exists($dest)) {
            JFile::delete($dest);  
        }
    
        if (JFile::upload($src, $dest)) {
            return true;
        }
    
        return false;
    }
}
