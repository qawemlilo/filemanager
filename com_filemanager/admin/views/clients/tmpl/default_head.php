<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>
<tr>
  <th width="5">
    <?php echo JText::_('ID'); ?>
  </th>
  <th width="20">
    <input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->clients); ?>);" />
  </th>
  <th>
    <?php echo JText::_('Client Name'); ?>
  </th>
  <th>
    <?php echo JText::_('Email Address'); ?>
  </th>
  
  <?php
    if($this->config->get('show_tel')) {
        $this->colspan += 1;    
  ?> 
  <th>
    <?php echo JText::_('Phone Number'); ?>
  </th> 
  <?php
    }
    if($this->config->get('show_cell')) {
        $this->colspan += 1;    
  ?>   
  <th>
    <?php echo JText::_('Cell Number'); ?>
  </th>
  <?php
    }
    if($this->config->get('show_fax')) {
        $this->colspan += 1;    
  ?> 
  <th>
    <?php echo JText::_('Fax Number'); ?>
  </th>
  <?php
    }
    if($this->config->get('show_address')) {
        $this->colspan += 1;    
  ?> 
  <th>
    <?php echo JText::_('Address'); ?>
  </th>
  <?php
    }
    if($this->config->get('show_createdby')) {
        $this->colspan += 1;    
  ?>
  <th>
    <?php echo JText::_('Created By'); ?>
  </th>
  <?php 
    }
  ?>
</tr>
