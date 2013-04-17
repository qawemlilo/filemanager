<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla view library
jimport('joomla.application.component.view');
 



class FileManagerViewClients extends JView
{
        function display($tpl = null) 
        {
                // Get data from the model
                $clients = $this->get('Clients');
                $pagination = $this->get('Pagination');
 
                // Check for errors.
                if (count($errors = $this->get('Errors'))) 
                {
                        JError::raiseError(500, implode('<br />', $errors));
                        return false;
                }
                
                // Assign data to the view
                $this->clients = $clients;
                $this->pagination = $pagination;
 
                // Display the template
                parent::display($tpl);
        }
}
