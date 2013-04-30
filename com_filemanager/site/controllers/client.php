<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controller library
jimport('joomla.application.component.controller');

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
        $id = JRequest::getVar('id', '', 'post', 'int');
        
        
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
    
    
    
    public function changepassword() {
        JRequest::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        
        $application =& JFactory::getApplication();
        $refer = JRoute::_($_SERVER['HTTP_REFERER']);
        $user =& JFactory::getUser();
        
	    $originalPassword = JRequest::getVar('currentpassword', '', 'post', 'string');
		$p_1 = JRequest::getVar('newpassword', '', 'post', 'string');
        $p_2 = JRequest::getVar('newpassword2', '', 'post', 'string');
        $id = JRequest::getVar('userid', 0, 'post', 'int');
        
        
        if ((int)$id != (int)$user->get('id')) {
            $application->redirect($refer, 'Unauthorised user', 'error');
        }
        
        $password = $user->get('password');
        $salt = $this->getSalt($password);
        $currentpassword = $this->makeCrypt($originalPassword, $salt);
        
        if ($currentpassword != $password || $p_1 != $p_2) {
            $application->redirect($refer, 'Password could not be verified', 'error');
        }
        
        $newpassword = $this->makeCrypt($p_1);
        
        $user->set('password', $newpassword);
        
        if (!$user->save()) {
            $application->redirect($refer, 'Password could not be updated', 'error');
        }
        
        $application->redirect('index.php?option=com_filemanager&view=client', 'Password updated', 'success');
    }
    
    

    
    private function getSalt($password) {  
        $passwordarray = explode(":", $password);
		
		if (is_array($passwordarray)) {
            return $passwordarray[1];
        }
        
        return false;
    }
    
    
    
    
    private function makeCrypt($password, $salt = false) {
    
		if (!$salt) {
            $salt = JUserHelper::genRandomPassword(32);
        }
        
        $crypt = JUserHelper::getCryptedPassword($password, $salt);
        $crypted = $crypt.':'.$salt;
        
        return $crypted;
    }
    
    
    
    
    public function download() {
        header("Content-Type: application/octet-stream");
        
        $user =& JFactory::getUser();
        
        if ($user->guest) {
            die('Unauthorised user');
        }
        
        $id = JRequest::getVar('id', 0, 'get', 'int');
        $filename = JRequest::getVar('fl', '', 'get', 'string');
        $file = JPATH_SITE . DS . 'media' . DS . 'com_filemanager' . DS . 'client_' . $id . DS . $filename;
        
        if (!file_exists($file)) {
            die('File not found');   
        }
        
        header("Content-Disposition: attachment; filename=" . urlencode($filename));
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Description: File Transfer");
        header("Content-Length: " . filesize($file));
        
        ob_clean();
        flush();
        readfile($file);
        exit();
    }
    
    
    public function order() {
        $name = JRequest::getVar('name', '', 'post', 'string');
        $email = JRequest::getVar('email', '', 'post', 'string');
        
        $subject = "New order for File Manager component";

        if (!empty($name) && !empty($email)) {
            JUtility::sendMail($email, $name, "qawemlilo@gmail.com", $subject, $subject);
            
            $this->orderSuccessful('Order sent');
        }
        else {
            $this->orderFailed('Order not sent');
        }
    }
    

    
    private function orderSuccessful($msg) {
        header("Content-type: application/json");
        echo '{"error":"false","message":"' . $msg .'"}';
        exit();
    }
    
    
    
    
    private function orderFailed($msg) {
        header($_SERVER['SERVER_PROTOCOL'] . ' 400 Bad Request', true, 400);
        echo '{"error":"true","message":"' . $msg .'"}';
        exit();
    }
}
