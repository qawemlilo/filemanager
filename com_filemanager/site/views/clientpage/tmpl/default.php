<?php
defined('_JEXEC') or die('Restricted access');
$document = &JFactory::getDocument();
$document->addStyleSheet($this->website . 'componenents/com_filemanager/files/style.css');
echo $this->loadTemplate('head');
echo $this->loadTemplate('body');
echo $this->loadTemplate('foot');
