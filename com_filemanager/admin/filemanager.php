<?php
defined('_JEXEC') or die('Restricted access');

/*
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import joomla controller library
jimport('joomla.application.component.controller');
 
// Get an instance of the controller prefixed by HelloWorld
$controller = JController::getInstance('FileManager');
 
// Get the task
$jinput = JFactory::getApplication()->input;
$task = $jinput->get('task', "", 'STR' );
 
// Perform the Request task
$controller->execute($task);
 
// Redirect if set by the controller
$controller->redirect();
*/


jimport('joomla.application.component.view');
JToolBarHelper::title('Joomla! File Manager');
JToolBarHelper::preferences('com_filemanager');
?>

<h1>Joomla! File Managemer</h1> 

<p>File Managemer is a Joomla! 2.5 component that allows an administrator to log in via the front-end and create new user accounts.</p>

<p>Once a user has been created, the administrator can upload different types of files for that user.</p>

<p>When the user logs in, uploaded files are available for download.</p>

<p>&nbsp;</p>
<p><a href="http://www.ragingflame.co.za/" target="_blank">&copy;2013 RAGING FLAME</a><br />
LICENCE: <a href="http://www.ragingflame.co.za/" target="_blank" style="text-decoration:none;">Software License</a></p> 
