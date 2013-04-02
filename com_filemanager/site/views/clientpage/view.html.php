<?php
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');
jimport('joomla.filesystem.file');


/*
    Functions
*/

function isAllowed($chech_perms, $user_perms) {
    $is_allowed = false;

    if (is_int($chech_perms)) {
        foreach($user_perms as $v) {
	        if($v == $chech_perms) $is_allowed = true;
        }	
	}
	
    return $is_allowed;
}


function getFile($id, $filename) {
    $file = JPATH_BASE . DS . 'media' . DS . 'com_filemanager' . DS . 'client_folders' . DS . 'user_' . $id . DS . $filename;
    
    if(JFile::exists($file)) {
        header('Content-type: application/pdf');
        header("Content-Disposition: attachment; filename=$filename");
        readfile($file);
    }
    else {
        echo '<script type="text/javascript">
			alert ("File not found!");
		    history.go(-1);
		</script>';    
    }
}



/*
    View Class
*/

class FileManagerViewClientPage extends JView
{
    function display($tpl = null) {
        $currentUser =& JFactory::getUser();
        $mainframe =& JFactory::getApplication();
        
        $this->website = JURI::base();
        $this->current_user = $currentUser->get('name');
        $this->userId = $currentUser->get('id');
        $this->allowed = isAllowed(3, $currentUser->authorisedLevels());
        
        if($currentUser->get('guest')) {
            $mainframe->redirect("index.php");
            exit();
        }
        
        if (isset($_GET['file']) && !empty($_GET['file'])) {
            getFile($this->userId, $_GET['file']);
            exit();
        }
        
        $this->correspondence = $this->get('Correspondence');
        $this->document = $this->get('Documents');
        
        if (count($errors = $this->get('Errors'))) {
            JError::raiseError(500, implode('<br />', $errors));
            exit();
        }
        
        parent::display($tpl);
    }
}

