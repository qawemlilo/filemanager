<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

echo $this->loadTemplate('head');
?>

<div class="row-fluid">
<form class="form-validate form-horizontal well well-small" action="<?php echo JRoute::_('index.php'); ?>" name="newfiletype-form" id="newfiletype-form" method="post">
<fieldset>

<!-- Text input-->
<div class="control-group">
  <label class="control-label">Type Label</label>
  <div class="controls">
    <input id="label" name="label" value="<?php if($this->type->label) echo $this->type->label; ?>" placeholder="Name of the type of file" class="input-xlarge" required="" type="text">
    <p class="help-block"></p>
  </div>
</div>

<input type="hidden" name="id" value="<?php echo $this->type->id; ?>" />
<input type="hidden" name="option" value="com_filemanager" />
<input type="hidden" name="task" value="filetypes.update" />
<?php echo JHtml::_('form.token'); ?>

<!-- Button (Double) -->
<div class="control-group">
  <label class="control-label"></label>
  <div class="controls">
    <button id="submit" type="submit" name="submit" class="btn btn-success">Update</button>
    <a id="cancel" href="<?php echo JRoute::_('index.php?option=com_filemanager&view=uploads'); ?>" class="btn btn-default">Cancel</a>
  </div>
</div>

</fieldset>
</form>

<script type="text/javascript">
</script>
</div>
