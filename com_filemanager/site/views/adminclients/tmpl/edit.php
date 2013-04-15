<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

echo $this->loadTemplate('head');
?>

<div class="row-fluid">
<form class="form-validate form-horizontal well well-small" action="<?php echo JRoute::_('index.php'); ?>" enctype="multipart/form-data" name="admin" id="admin" method="post">
<fieldset>
<h2 style="margin-top: 0px">General Info</h2>
<!-- Text input-->
<div class="control-group">
  <label class="control-label">Service Provider</label>
  <div class="controls">
    <input id="service_provider" name="service_provider" value="<?php if($this->listing) echo $this->listing->name; ?>" placeholder="Name of Service Provider" class="input-xxlarge" required="" type="text">
    <p class="help-block"></p>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label">Email Address</label>
  <div class="controls">
    <input id="email" name="email" value="<?php if($this->listing) echo $this->listing->email; ?>"placeholder="Enter Email Address" class="input-xxlarge" required="" type="text">
    <p class="help-block"></p>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label">Website</label>
  <div class="controls">
    <input id="og_website" name="og_website" value="<?php if($this->listing) echo $this->listing->website; ?>"placeholder="Enter Email Address" class="input-xxlarge" type="text">
    <p class="help-block"></p>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label">Tel Number</label>
  <div class="controls">
    <input id="phone" name="phone" value="<?php if($this->listing) echo $this->listing->phone; ?>"placeholder="Telephone Number" class="input-xxlarge" required="" type="text">
    <p class="help-block"></p>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label">Cell Number</label>
  <div class="controls">
    <input id="cell" name="cell" value="<?php if($this->listing) echo $this->listing->cell; ?>" placeholder="Cellphone Number" class="input-xxlarge" required="" type="text">
    <p class="help-block"></p>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label">Fax Number</label>
  <div class="controls">
    <input id="fax" name="fax" value="<?php if($this->listing) echo $this->listing->fax; ?>" placeholder="Fax Number" class="input-xxlarge" type="text">
    <p class="help-block"></p>
  </div>
</div>
<h2> Social Pages</h2>
<!-- Prepended text-->
<div class="control-group">
  <label class="control-label">Twitter Handle</label>
  <div class="controls">
    <div class="input-prepend">
      <span class="add-on">@</span>
      <input id="twitter" name="twitter" value="<?php if($this->listing) echo $this->listing->twitter; ?>" class="span12" placeholder="Twitter Name" type="text">
    </div>
    <p class="help-block"></p>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label">Facebook Page</label>
  <div class="controls">
    <input id="facebook" name="facebook" value="<?php if($this->listing) echo $this->listing->facebook; ?>" placeholder="Facebook Page" class="input-xxlarge" type="text">
    <p class="help-block"></p>
  </div>
</div>


<h2>Location Info</h2>
<!-- Select Basic -->


<!-- Textarea -->
<div class="control-group">
  <label class="control-label">Physical Address</label>
  <div class="controls">                     
    <input id="physical_address" name="physical_address" value="<?php if($this->listing) echo $this->listing->formatted_address; ?>" placeholder="Enter address here..." class="input-xxlarge" required="" type="text"> 
    <input class="btn" type="button" value="find" id="find" />
    <input id="formatted_address" value="<?php if($this->listing) echo $this->listing->formatted_address; ?>" name="formatted_address" class="input-xxlarge" type="hidden">
  </div>
</div>


<div class="control-group">
  <label class="control-label">Province</label>
  <div class="controls">
    <input id="administrative_area_level_1" name="administrative_area_level_1" value="<?php if($this->listing) echo $this->listing->province; ?>" readonly="readonly" class="input-xxlarge" required="" type="text">
  </div>
</div>

<!-- Password input-->
<div class="control-group">
  <label class="control-label">City / Town</label>
  <div class="controls">
    <input id="locality" name="locality" value="<?php if($this->listing) echo $this->listing->locality; ?>" readonly="readonly" class="input-xxlarge" required="" type="text">
    <p class="help-block"></p>
  </div>
</div>

<!-- Password input-->
<div class="control-group">
  <label class="control-label">Sublocality</label>
  <div class="controls">
    <input id="sublocality" name="sublocality" value="<?php if($this->listing) echo $this->listing->sublocality; ?>" readonly="readonly" class="input-xxlarge" required="" type="text">
    <p class="help-block"></p>
  </div>
</div>

<!-- Password input-->
<div class="control-group">
  <label class="control-label">Latitude</label>
  <div class="controls">
    <input id="lat" name="lat" value="<?php if($this->listing) echo $this->listing->lat; ?>" readonly="readonly" class="input-xxlarge" required="" type="text">
    <p class="help-block"></p>
  </div>
</div>


<!-- Password input-->
<div class="control-group">
  <label class="control-label">Longitude</label>
  <div class="controls">
    <input id="lng" name="lng" value="<?php if($this->listing) echo $this->listing->lng; ?>" readonly="readonly" class="input-xxlarge" required="" type="text">
    <p class="help-block"></p>
  </div>
</div>


<h2>Business Info</h2>

<!-- File Button --> 
<div class="control-group">
  <label class="control-label">Upload Logo</label>
  <div class="controls">
    <input name="logo" class="input-file" type="file">
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label">Slogan</label>
  <div class="controls">
    <input name="slogan" value="<?php if($this->listing) echo $this->listing->slogan; ?>" placeholder="Slogan" class="input-xxlarge" type="text">
    <p class="help-block"></p>
  </div>
</div>


<!-- Text input-->
<div class="control-group">
  <label class="control-label">Categories</label>
  <div class="controls">
    <?php echo $this->categoriesHTML; ?>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label">Services Offered</label>
  <div class="controls">
    <input name="services" value="<?php if($this->listing) echo $this->listing->services_offered; ?>" placeholder="e.g Mobile websites, Joomla custom development, Website optimisation" class="input-xxlarge" type="text">
  </div>
</div>

<!-- Textarea -->
<div class="control-group">
  <label class="control-label">About Us</label>
  <div class="controls">                     
    <textarea name="aboutus" class="input-xxlarge" rows="5" placeholder="..."><?php if($this->listing) echo $this->listing->aboutus; ?></textarea>
  </div>
</div>

<h2>Showcase Images</h2>
<!-- File Button --> 
<div class="control-group">
  <label class="control-label">Image 1</label>
  <div class="controls">
    <input name="slide1" class="input-file" type="file">
  </div>
</div>
<div class="control-group">
  <label class="control-label">Image 2</label>
  <div class="controls">
    <input name="slide2" class="input-file" type="file">
  </div>
</div>
<div class="control-group">
  <label class="control-label">Image 3</label>
  <div class="controls">
    <input name="slide3" class="input-file" type="file">
  </div>
</div>
<div class="control-group">
  <label class="control-label">Image 4</label>
  <div class="controls">
    <input name="slide4" class="input-file" type="file">
  </div>
</div>

<?php 
if($this->listing) {
?> 
<input type="hidden" name="listingid" value="<?php echo $this->listing->id; ?>" />
<?php 
}
?>
<input type="hidden" name="option" value="com_saservice" />
<input type="hidden" name="task" value="adminlistings.update" />
<?php echo JHtml::_('form.token'); ?>

<!-- Button (Double) -->
<div class="control-group">
  <label class="control-label"></label>
  <div class="controls">
    <button id="submit" type="submit" name="submit" class="btn btn-success">Update Listing</button>
    <a id="cancel" href="<?php echo JRoute::_('index.php?option=com_saservice&view=adminlistings'); ?>" class="btn btn-default">Cancel</a>
  </div>
</div>

</fieldset>
</form>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
<script type="text/javascript" src="<?php echo JURI::base() . 'components/com_saservice/asserts/js/jquery.geocomplete.js'; ?>"></script>
<script type="text/javascript">
(function ($) {
    $(function () {
        $('#physical_address').geocomplete({
            details: '#admin',
            componentRestrictions: {country: 'za'}
        })
        $('#find').on('click', function () {
            $('#physical_address').trigger('geocode');
        });
    });
}(jQuery));
</script>
</div>

