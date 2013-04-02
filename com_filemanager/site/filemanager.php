<?php
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.controller');
 
// Get an instance of the controller prefixed by FileManager
// it will create a controller named FileManagerController using the controller.php file
$controller = JController::getInstance('FileManager');
 
// Perform the Request task
$controller->execute(JRequest::getCmd('task'));
$controller->redirect();
