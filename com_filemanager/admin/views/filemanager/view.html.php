<?php
defined('_JEXEC') or die('Restricted access');
 
// import Joomla view library
jimport('joomla.application.component.view');
class FileManagerViewFileManagers extends JView
{    function display($tpl = null) {        $items = $this->get('Items');        $pagination = $this->get('Pagination');                if (count($errors = $this->get('Errors'))) {            JError::raiseError(500, implode('<br />', $errors));            return false;        }                $this->items = $items;        $this->pagination = $pagination;                $this->addToolBar();                parent::display($tpl);        $this->setDocument();    }                    protected function addToolBar() {        JToolBarHelper::title(JText::_('File Manager'));        JToolBarHelper::preferences('com_filemanager');    }                    protected function setDocument() {        $document = JFactory::getDocument();        $document->setTitle(JText::_('COM_FILEMANAGER'));
    }}
