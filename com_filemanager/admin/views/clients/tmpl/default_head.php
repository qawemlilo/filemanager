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
  <th>
    <?php echo JText::_('Phone Number'); ?>
  </th>
  <th>
    <?php echo JText::_('Cell Number'); ?>
  </th>
</tr>
