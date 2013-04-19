<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

echo $this->loadTemplate('head');
?>

<div class="row-fluid">
<form class="form-validate form-horizontal well well-small" action="<?php echo JRoute::_('index.php'); ?>" enctype="multipart/form-data" name="fileupload-form" id="fileupload-form" method="post">
<fieldset>

<!-- Text input-->
<div class="control-group">
  <label class="control-label">Client</label>
  <div class="controls">
    <?php
        if ($this->users) {
            echo $this->users; 
        }
    ?>
    <p class="help-block"></p>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label">File Type</label>
  <div class="controls">
    <?php
        if ($this->filetypes) {
            echo $this->filetypes; 
        }
    ?>
    <p class="help-block"></p>
  </div>
</div>

<div class="control-group">
  <label class="control-label">File</label>
  <div class="controls">
    <input name="fileupload" class="input-file" type="file" />
  </div>
</div>

<input type="hidden" name="option" value="com_filemanager" />
<input type="hidden" name="task" value="uploads.add" />
<?php echo JHtml::_('form.token'); ?>

<!-- Button (Double) -->
<div class="control-group">
  <label class="control-label"></label>
  <div class="controls">
    <button id="submit" type="submit" name="submit" class="btn btn-success">Upload</button>
    <a id="cancel" href="<?php echo JRoute::_('index.php?option=com_filemanager&view=uploads'); ?>" class="btn btn-default">Cancel</a>
  </div>
</div>

</fieldset>
</form>

<script type="text/javascript">
</script>
</div>

