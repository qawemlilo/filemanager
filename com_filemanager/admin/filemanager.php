<?php
defined('_JEXEC') or die('Restricted access');
 
JLoader::register('FileManagerHelper', dirname(__FILE__) . DS . 'helpers' . DS . 'filemanager.php');

// import joomla controller library
jimport('joomla.application.component.controller');
 
$controller = JController::getInstance('FileManager');
 
// Get the task
$jinput = JFactory::getApplication()->input;
$task = $jinput->get('task', "", 'STR' );
 
// Perform the Request task
$controller->execute($task);
 
// Redirect if set by the controller
$controller->redirect();

?>

