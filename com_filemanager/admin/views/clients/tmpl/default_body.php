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
    <?php if($this->config->get('show_title')) { ?>
    <td style="text-align: center">
      <?php if($client->title && $client->name) echo $client->title . ' ' . $client->name; ?>
    </td>
    <?php 
        }
        else { 
    ?>
    <td style="text-align: center">
      <?php if($client->name) echo $client->name; ?>
    </td>
    <?php 
        }
    ?>
    <td style="text-align: center">
      <?php if($client->email) echo '<a href="mailto:"' . $client->email . '">' . $client->email . '</a>'; ?>
    </td>    
    <?php
        if($this->config->get('show_tel')) { 
    ?>
    <td style="text-align: center">
      <?php if($client->phone) echo '0' . $client->phone; ?>
    </td>
    <?php 
        }
        if($this->config->get('show_cell')) { 
    ?>
    <td style="text-align: center">
      <?php if($client->cell) echo '0' . $client->cell; ?>
    </td>
    <?php 
        }
        if($this->config->get('show_fax')) { 
    ?>
    <td style="text-align: center">
      <?php if($client->fax) echo '0' . $client->fax; ?>
    </td>
    <?php 
        }
        if($this->config->get('show_address')) { 
    ?>
    <td style="text-align: center">
      <?php if($client->address) echo $client->address; ?>
    </td>
    <?php 
        }
        if($this->config->get('show_createdby')) { 
    ?>
    <td style="text-align: center">
      <?php 
          // this is a hack and has to be fixed
          // a good join can fetch all the required data.
          if($client->created_by) {
              $user = JFactory::getUser($client->created_by);
              echo $user->get('name');
          }
      ?>
    </td>
    <?php 
        }
    ?>
  </tr>
<?php endforeach; ?>
