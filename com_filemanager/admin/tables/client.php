<?php
// No direct access
defined('_JEXEC') or die('Restricted access');
 
// import Joomla table library
jimport('joomla.database.table');
 
/**
 * Hello Table class
 */
class FileManagerTableClient extends JTable
{
	function __construct(&$db) 
	{
		parent::__construct('#__fm_client', 'id', $db);
	}
}
