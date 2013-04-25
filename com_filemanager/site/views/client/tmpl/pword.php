<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

echo $this->loadTemplate('head');
?>

<div class="row-fluid">
<form class="form-validate form-horizontal well well-small" action="<?php echo JRoute::_('index.php'); ?>" name="editpassword-form" id="editpassword-form" method="post">
<fieldset>

<div class="control-group">
  <label class="control-label">Current Password</label>
  <div class="controls">
    <input id="currentpassword" name="currentpassword" required="" class="input-xlarge" type="password">
    <p class="help-block"></p>
  </div>
</div>

<div class="control-group">
  <label class="control-label">New Password</label>
  <div class="controls">
    <input id="newpassword" name="newpassword" class="input-xlarge" required="" type="password">
    <p class="help-block"></p>
  </div>
</div>

<div class="control-group">
  <label class="control-label">Re-enter New Password</label>
  <div class="controls">
    <input id="newpassword2" name="newpassword2" class="input-xlarge" required="" type="password">
    <p class="help-block"></p>
  </div>
</div>


<input type="hidden" name="option" value="com_filemanager" />
<input type="hidden" name="id" value="<?php echo $this->details->id; ?>" />
<input type="hidden" name="userid" value="<?php echo $this->details->userid; ?>" />
<input type="hidden" name="task" value="client.changepassword" />
<?php echo JHtml::_('form.token'); ?>

<!-- Button (Double) -->
<div class="control-group">
  <label class="control-label"></label>
  <div class="controls">
    <button id="submit" type="submit" name="submit" class="btn btn-success">Change Password</button>
    <a id="cancel" href="<?php echo JRoute::_('index.php?option=com_filemanager&view=client'); ?>" class="btn btn-default">Cancel</a>
  </div>
</div>

</fieldset>
</form>

<script>window.jQuery || document.write('<script src="<?php echo JURI::base() . 'components/com_filemanager/asserts/js/jquery.js' ?>"><\/script>')</script>
<script type="text/javascript">
jQuery.noConflict();

(function ($) {
    $(function () {
        $('#newpassword').on('focus', function () {
            if (!$('#currentpassword').val()) {
                $('#currentpassword').focus();
            }
        });
        
        $('#newpassword2').on('focus', function () {
            if (!$('#currentpassword').val()) {
                $('#currentpassword').focus();
            }
            if (!$('#newpassword').val()) {
                $('#newpassword').focus();
            }
        });
        
        $('#editpassword-form').on('submit', function () {
            if (!$('#newpassword2').val()) {
                $('#newpassword2').focus();
                return false;
            }
            if ($('#newpassword').val() !== $('#newpassword2').val()) {
                alert('Your new passwords do not match');
                return false;
            }
            
            return true;
        });
    });
})(jQuery);
</script>
</div>

