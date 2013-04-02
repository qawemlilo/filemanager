<?php
defined('_JEXEC') or die('Restricted Access');
?>
<tr>
        <th width="20">
                <input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->items); ?>);" />
        </th>
        <th width="5">
                <?php echo JText::_('Name'); ?>
        </th>                     
        <th>
                <?php echo JText::_('Emai Address'); ?>
        </th>
        <th>
                <?php echo JText::_('Last Visited'); ?>
        </th>
</tr>