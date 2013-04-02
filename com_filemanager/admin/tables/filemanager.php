<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.database.table');
class FileManagerTableFilemanager extends JTable
{    function __construct(&$db) {        parent::__construct('#__fm_users', 'id', $db);    }
}
