<?php
// No direct access
defined('_JEXEC') or die('Restricted access');
 
// import Joomla table library
jimport('joomla.database.table');
 
/**
 * Hello Table class
 */
class FileManagerTableUpload extends JTable
{
	function __construct(&$db) 
	{
		parent::__construct('#__fm_uploads', 'id', $db);
	}
}
