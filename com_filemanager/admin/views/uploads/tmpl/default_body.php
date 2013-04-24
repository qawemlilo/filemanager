<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>
<?php foreach($this->uploads as $i => $upload): ?>
  <tr class="row<?php echo $i % 2; ?>">
    <td>
      <?php echo $upload->id; ?>
    </td>
    
    <td>
      <?php if($upload->id) echo JHtml::_('grid.id', $i, $upload->id); ?>
    </td>

    <td style="text-align: center">
      <?php if($upload->ts) echo $upload->ts; ?>
    </td>

    <td style="text-align: center">
      <?php if($upload->filename) echo $upload->filename; ?>
    </td>

    <td style="text-align: center">
      <?php if($upload->label) echo $upload->label; ?>
    </td>    

    <td style="text-align: center">
      <?php 
          // this is a hack and has to be fixed
          // a good join can fetch all the required data.
          if($upload->created_by) {
              $user = JFactory::getUser($upload->created_by);
              echo $user->get('name');
          }
      ?>
    </td>
  </tr>
<?php endforeach; ?>
