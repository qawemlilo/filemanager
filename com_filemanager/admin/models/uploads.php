<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
// import the Joomla modellist library
jimport('joomla.application.component.modellist');



class FileManagerModelUploads extends JModelList
{
	protected function getListQuery()
	{ 
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
        $query->select("upload.id, 
                         upload.ts,
                         upload.filename, 
                         upload.ext, 
                         upload.clientid, 
                         upload.typeid,
                         upload.created_by,
                         type.label,
                         client.title,
                         user.name");
        $query->from("#__fm_uploads AS upload");
        $query->join("INNER", "#__fm_types AS type ON (upload.typeid = type.id)");
        $query->join("INNER", "#__fm_clients AS client ON (upload.clientid = client.id)");
        $query->join("INNER", "#__users AS user ON (client.userid = user.id)");
        $query->order("upload.ts ASC");		

		return (string)$query;
	}
    
    
    public function getModel($name = 'Upload', $prefix = 'FileManagerModel') {
        $model = parent::getModel($name, $prefix, array('ignore_request' => true));
        
        return $model;
    }
}