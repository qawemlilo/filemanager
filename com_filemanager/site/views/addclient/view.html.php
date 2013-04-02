<?php
defined('_JEXEC') or die('Restricted access');
 
// import Joomla view library
jimport('joomla.application.component.view');
jimport( 'joomla.environment.request' );
jimport('joomla.user.helper');
jimport('joomla.filesystem.file');

require_once('helper.php');


class FileManagerViewAddClient extends JView
{
    function display($tpl = null) {
        $currentUser =& JFactory::getUser();
        $mainframe =& JFactory::getApplication();
        $this->allowed = isAllowed(3, $currentUser->authorisedLevels());
        $this->website = JURI::base();
        
        if(!$this->allowed) {
            $mainframe->redirect("index.php");
            exit();
        }
        
        if(isset($_POST['import'])) {
            $myClas = new User();
            $a = $myClas->create();
            echo $a;
            return true;
        }
        
        // Check for errors.
        if (count($errors = $this->get('Errors')))
        {
            JError::raiseError(500, implode('<br />', $errors));
            return false;
        }
        
        // Display the view
        parent::display($tpl);
    }
}