<?php
// No direct access to this file
defined('_JEXEC') or die;
 
/**
 * HelloWorld component helper.
 */
abstract class FileManagerHelper
{
	/**
	 * Configure the Linkbar.
	 */
	public static function addSubmenu($submenu) 
	{
        $submenu = strtolower($submenu);
		JSubMenuHelper::addEntry(JText::_('COM_FILEMANAGER_SUBMENU_CLIENTS'), 'index.php?option=com_filemanager', $submenu == 'clients');
		JSubMenuHelper::addEntry(JText::_('COM_FILEMANAGER_SUBMENU_UPLOADS'), 'index.php?option=com_filemanager&view=uploads', $submenu == 'uploads');
	}
	/**
	 * Get the actions
	 */
	public static function getActions($messageId = 0)
	{
		$user	= JFactory::getUser();
		$result	= new JObject;
 
		if (empty($messageId)) {
			$assetName = 'com_helloworld';
		}
		else {
			$assetName = 'com_helloworld.message.'.(int) $messageId;
		}
 
		$actions = array(
			'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.delete'
		);
 
		foreach ($actions as $action) {
			$result->set($action,	$user->authorise($action, $assetName));
		}
 
		return $result;
	}
}
