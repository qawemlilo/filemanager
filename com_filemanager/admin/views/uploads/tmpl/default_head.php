<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>
<tr>
  <th width="5">
    <?php echo JText::_('ID'); ?>
  </th>
  <th width="20">
    <input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->uploads); ?>);" />
  </th>
  <th>
    <?php echo JText::_('Date of Upload'); ?>
  </th>
  <th>
    <?php echo JText::_('File Name'); ?>
  </th>

  <th>
    <?php echo JText::_('File Type'); ?>
  </th> 
  
  <th>
    <?php echo JText::_('Uploaded By'); ?>
  </th>
</tr>
