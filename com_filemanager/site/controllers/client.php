<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controller library
jimport('joomla.application.component.controller');
jimport('joomla.filesystem.file');

class FileManagerControllerClient extends JController
{
    public function update() {
        JRequest::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        
        $application =& JFactory::getApplication();
        $model =& $this->getModel('client');
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
            $application->redirect('index.php?option=com_filemanager&view=client', 'Info successfully updated', 'success');
        }
        else {
            $application->redirect($refer, 'Error! Failed to update client info', 'error');
        }
    }
    
    
    
    
    private function updateUser() {
        $user =& JFactory::getUser();
	    $fullname = JRequest::getVar('fullname', '', 'post', 'string');
		$email = JRequest::getVar('email', '', 'post', 'string');
        
        
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
}
