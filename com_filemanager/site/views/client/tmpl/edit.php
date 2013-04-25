<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

echo $this->loadTemplate('head');
?>

<div class="row-fluid">
<form class="form-validate form-horizontal well well-small" action="<?php echo JRoute::_('index.php'); ?>" name="editclient-form" id="editclient-form" method="post">
<fieldset>

<?php
if ($this->config->get('show_title')) {
?>
<div class="control-group">
  <label class="control-label">Title</label>
  <div class="controls">
      <select name="title">
        <option value="">Select Title</option>
        <option <?php if($this->details->title == 'Mr') echo 'selected="selected"'; ?> value="Mr">Mr</option>
        <option <?php if($this->details->title == 'Mrs') echo 'selected="selected"'; ?> value="Mrs">Mrs</option>
        <option <?php if($this->details->title == 'Miss') echo 'selected="selected"'; ?> value="Miss">Miss</option>
        <option <?php if($this->details->title == 'Dr') echo 'selected="selected"'; ?> value="Dr">Dr</option>
      </select>
      <p class="help-block"></p>
  </div>
</div>
<?php
}
?>


<div class="control-group">
  <label class="control-label">Full name</label>
  <div class="controls">
    <input id="fullname" name="fullname" value="<?php if($this->details->name) echo $this->details->name; ?>" placeholder="Full Name" class="input-xlarge" required="" type="text">
    <p class="help-block"></p>
  </div>
</div>


<div class="control-group">
  <label class="control-label">Username</label>
  <div class="controls">
    <input id="username" readonly="readonly" name="username" value="<?php if($this->details->username) echo $this->details->username; ?>" placeholder="Username" class="input-xlarge" required="" type="text">
    <p class="help-block"></p>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label">Email Address</label>
  <div class="controls">
    <input id="email" name="email" placeholder="Enter Email Address" value="<?php if($this->details->email) echo $this->details->email; ?>" class="input-xlarge" required="" type="text">
    <p class="help-block"></p>
  </div>
</div>


<?php
if ($this->config->get('show_tel')) {
?>
<div class="control-group">
  <label class="control-label">Tel Number</label>
  <div class="controls">
    <input id="phone" name="phone" placeholder="Telephone Number" value="<?php if($this->details->phone) echo '0' . $this->details->phone; ?>"class="input-xlarge" required="" type="text">
    <p class="help-block"></p>
  </div>
</div>


<?php
}


if ($this->config->get('show_cell')) {
?>
<div class="control-group">
  <label class="control-label">Cell Number</label>
  <div class="controls">
    <input id="cell" name="cell" placeholder="Cellphone Number" value="<?php if($this->details->cell) echo '0' . $this->details->cell; ?>" class="input-xlarge" required="" type="text">
    <p class="help-block"></p>
  </div>
</div>
<?php
}


if ($this->config->get('show_fax')) {
?>
<div class="control-group">
  <label class="control-label">Fax Number</label>
  <div class="controls">
    <input id="fax" name="fax" placeholder="Fax Number" value="<?php if($this->details->fax) echo '0' . $this->details->fax; ?>" class="input-xlarge" type="text">
    <p class="help-block"></p>
  </div>
</div>
<?php
}


if ($this->config->get('show_address')) {
?>
<div class="control-group">
  <label class="control-label">Address</label>
  <div class="controls">                     
    <textarea name="address" class="input-xlarge" rows="5" placeholder="..."><?php if($this->details->address) echo $this->details->address; ?></textarea>
    <p class="help-block"><a href="<?php echo JRoute::_('index.php?option=com_filemanager&view=client&layout=pword'); ?>">Change your password.</a></p>
  </div>
</div>
<?php
} else {
?>
<div class="control-group">
  <label class="control-label">&nbsp;</label>
  <div class="controls">
    <input type="hidden">
    <p class="help-block"><a href="<?php echo JRoute::_('index.php?option=com_filemanager&view=client&layout=pword'); ?>">Change your password.</a></p>
  </div>
</div>
<?php
}
?>
<input type="hidden" name="option" value="com_filemanager" />
<input type="hidden" name="id" value="<?php echo $this->details->id; ?>" />
<input type="hidden" name="userid" value="<?php echo $this->details->userid; ?>" />
<input type="hidden" name="task" value="client.update" />
<?php echo JHtml::_('form.token'); ?>

<!-- Button (Double) -->
<div class="control-group">
  <label class="control-label"></label>
  <div class="controls">
    <button id="submit" type="submit" name="submit" class="btn btn-success">Update</button>
    <a id="cancel" href="<?php echo JRoute::_('index.php?option=com_filemanager&view=client'); ?>" class="btn btn-default">Cancel</a>
  </div>
</div>

</fieldset>
</form>
</div>
