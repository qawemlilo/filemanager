<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
// import the Joomla modellist library
jimport('joomla.application.component.modellist');



class FileManagerModelClients extends JModelList
{
	protected function getListQuery()
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
        $query->select("clients.id, 
                         clients.title,
                         clients.userid, 
                         clients.phone, 
                         clients.cell, 
                         clients.fax, 
                         clients.address,
                         clients.created_by,
                         users.name,
                         users.email,
                         users.username");
        $query->from("#__fm_clients AS clients, #__users AS users");
        $query->where("clients.userid = users.id");		

		return (string)$query;
	}
    
    
    public function getModel($name = 'Client', $prefix = 'FileManagerModel') {
        $model = parent::getModel($name, $prefix, array('ignore_request' => true));
        
        return $model;
    }
}