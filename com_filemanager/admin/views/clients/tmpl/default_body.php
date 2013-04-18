<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>
<?php foreach($this->clients as $i => $client): ?>
  <tr class="row<?php echo $i % 2; ?>">
    <td>
      <?php echo $client->id; ?>
    </td>
    <td>
      <?php if($client->id) echo JHtml::_('grid.id', $i, $client->id); ?>
    </td>
    <td>
      <?php if($client->title && $client->name) echo $client->title . ' ' . $client->name; ?>
    </td>
    <td>
      <?php if($client->email) echo '<a href="mailto:"' . $client->email . '">' . $client->email . '</a>'; ?>
    </td>
    <td>
      <?php if($client->phone) echo '0' . $client->phone; ?>
    </td>
    <td>
      <?php if($client->cell) echo '0' . $client->cell; ?>
    </td>
  </tr>
<?php endforeach; ?>
