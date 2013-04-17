<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

echo $this->loadTemplate('head');
?>

<div class="row-fluid" id="ss-admin-table" style="margin-top: 20px;">
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th style="width:40px;">&nbsp;</th>
        <th>Filename</th>
        <th>Date of Upload</th>
        <th>Downloads</th>
      </tr>
    </thead>
    
    <tbody>
    <?php
    if (isset($this->files) && is_array($this->files)) :
      foreach ($this->files as $file) {
    ?>
      <tr>
        <td style="text-align: center">
          <input type="checkbox" value="<?php echo $file->id; ?>" name="files[]" />
        </td>
        <td>
          <?php echo $file->filename . '.' . $file->ext; ?>
        </td>
        <td>
          <?php echo $file->ts; ?>
        </td>
        <td>
          <a href="#">Download</a>
        </td>
      </tr>
    <?php
      }
    endif;
    ?>
    </tbody>
  </table>
</div>
