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
        <option <?php if($this->client->title == 'Mr') echo 'selected="selected"'; ?> value="Mr">Mr</option>
        <option <?php if($this->client->title == 'Mrs') echo 'selected="selected"'; ?> value="Mrs">Mrs</option>
        <option <?php if($this->client->title == 'Miss') echo 'selected="selected"'; ?> value="Miss">Miss</option>
        <option <?php if($this->client->title == 'Dr') echo 'selected="selected"'; ?> value="Dr">Dr</option>
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
    <input id="fullname" name="fullname" value="<?php if($this->client->name) echo $this->client->name; ?>" placeholder="Full Name" class="input-xlarge" required="" type="text">
    <p class="help-block"></p>
  </div>
</div>


<div class="control-group">
  <label class="control-label">Username</label>
  <div class="controls">
    <input id="username" readonly="readonly" name="username" value="<?php if($this->client->username) echo $this->client->username; ?>" placeholder="Username" class="input-xlarge" required="" type="text">
    <p class="help-block"></p>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label">Email Address</label>
  <div class="controls">
    <input id="email" name="email" placeholder="Enter Email Address" value="<?php if($this->client->email) echo $this->client->email; ?>" class="input-xlarge" required="" type="text">
    <p class="help-block"></p>
  </div>
</div>


<?php
if ($this->config->get('show_tel')) {
?>
<div class="control-group">
  <label class="control-label">Tel Number</label>
  <div class="controls">
    <input id="phone" name="phone" placeholder="Telephone Number" value="<?php if($this->client->phone) echo '0' . $this->client->phone; ?>"class="input-xlarge" required="" type="text">
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
    <input id="cell" name="cell" placeholder="Cellphone Number" value="<?php if($this->client->cell) echo '0' . $this->client->cell; ?>" class="input-xlarge" required="" type="text">
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
    <input id="fax" name="fax" placeholder="Fax Number" value="<?php if($this->client->fax) echo '0' . $this->client->fax; ?>" class="input-xlarge" type="text">
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
    <textarea name="address" class="input-xlarge" rows="5" placeholder="..."><?php if($this->client->address) echo $this->client->address; ?></textarea>
    <p class="help-block"></p>
  </div>
</div>
<?php
}
?>


<input type="hidden" name="option" value="com_filemanager" />
<input type="hidden" name="id" value="<?php echo $this->client->id; ?>" />
<input type="hidden" name="userid" value="<?php echo $this->client->userid; ?>" />
<input type="hidden" name="task" value="adminclients.update" />
<?php echo JHtml::_('form.token'); ?>

<!-- Button (Double) -->
<div class="control-group">
  <label class="control-label"></label>
  <div class="controls">
    <button id="submit" type="submit" name="submit" class="btn btn-success">Update</button>
    <a id="cancel" href="<?php echo JRoute::_('index.php?option=com_filemanager&view=adminclients'); ?>" class="btn btn-default">Cancel</a>
  </div>
</div>

</fieldset>
</form>

<script type="text/javascript">
</script>
</div>