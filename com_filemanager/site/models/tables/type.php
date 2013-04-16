<?php
// No direct access
defined('_JEXEC') or die('Restricted access');
 
// import Joomla table library
jimport('joomla.database.table');
 

 
 
class FileManagerTableType extends JTable
{
    function __construct(&$db) 
    {
        parent::__construct('#__fm_types', 'id', $db);
    }
}