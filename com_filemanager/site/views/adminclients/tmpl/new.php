<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

echo $this->loadTemplate('head');
?>

<div class="row-fluid">
<form class="form-validate form-horizontal well well-small" action="<?php echo JRoute::_('index.php'); ?>" name="newclient-form" id="newclient-form" method="post">
<fieldset>
<!-- Text input-->
<div class="control-group">
  <label class="control-label">Title</label>
  <div class="controls">
      <select name="title">
        <option value="">Select Title</option>
        <option value="Mr">Mr</option>
        <option value="Mrs">Mrs</option>
        <option value="Miss">Miss</option>
        <option value="Dr">Dr</option>
      </select>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label">Full name</label>
  <div class="controls">
    <input id="fullname" name="fullname" placeholder="Full Name" class="input-xlarge" required="" type="text">
    <p class="help-block"></p>
  </div>
</div>


<div class="control-group">
  <label class="control-label">Username</label>
  <div class="controls">
    <input id="username" name="username" placeholder="Username" class="input-xlarge" required="" type="text">
    <p class="help-block"></p>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label">Email Address</label>
  <div class="controls">
    <input id="email" name="email" placeholder="Enter Email Address" class="input-xlarge" required="" type="text">
    <p class="help-block"></p>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label">Tel Number</label>
  <div class="controls">
    <input id="phone" name="phone" placeholder="Telephone Number" class="input-xlarge" required="" type="text">
    <p class="help-block"></p>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label">Cell Number</label>
  <div class="controls">
    <input id="cell" name="cell" placeholder="Cellphone Number" class="input-xlarge" required="" type="text">
    <p class="help-block"></p>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label">Fax Number</label>
  <div class="controls">
    <input id="fax" name="fax" placeholder="Fax Number" class="input-xlarge" type="text">
    <p class="help-block"></p>
  </div>
</div>


<div class="control-group">
  <label class="control-label">Address</label>
  <div class="controls">                     
    <textarea name="address" class="input-xlarge" rows="5" placeholder="..."></textarea>
  </div>
</div>


<div class="control-group">
  <label class="control-label">Password</label>
  <div class="controls">
    <input id="password" name="password" placeholder="Password" class="input-xlarge" required="" type="password">
    <p class="help-block"></p>
  </div>
</div>


<input type="hidden" name="option" value="com_filemanager" />
<input type="hidden" name="view" value="adminclients" />
<input type="hidden" name="task" value="adminclients.add" />
<?php echo JHtml::_('form.token'); ?>

<!-- Button (Double) -->
<div class="control-group">
  <label class="control-label"></label>
  <div class="controls">
    <button id="submit" type="submit" name="submit" class="btn btn-success">Create Client</button>
    <a id="cancel" href="<?php echo JRoute::_('index.php?option=com_filemanager&view=adminclients'); ?>" class="btn btn-default">Cancel</a>
  </div>
</div>

</fieldset>
</form>

<script type="text/javascript">
</script>
</div>

