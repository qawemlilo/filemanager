<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.controller');
class FileManagerControllerAddClient extends JController
{
	function display() {
        if(!JRequest::getVar('view')) {            JRequest::setVar('view', 'addclient');        }                parent::display();    }}
