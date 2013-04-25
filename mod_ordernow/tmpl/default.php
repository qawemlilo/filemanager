<?php 
defined('_JEXEC') or die('Restricted access'); // no direct access 

?>
    <!-- Button to trigger modal -->
<a href="#myModal" style="margin-top:5px; color:#fff" role="button" class="btn btn-large btn-warning" data-toggle="modal">Order Now</a>
     
    <!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel">Order Form</h3>
  </div>
  
  <div class="modal-body">
    <form method="post" name="contactusform"  id="contactusform">
       <div class="progress progress-striped active" style="display:none">
         <div class="bar" style="width: 100%;"></div>
       </div>
       
       <div id="responseD" class="alert" style="display:none">
       </div>
         
       <div class="control-group">
         <label class="control-label" for="name"> <i class="icon-user"> </i> Name</label>
        
         <div class="controls controls-row">
           <input type="text" style="margin-left: 0px" required="" placeholder="Your name" name="name">
         </div>
       </div>
       
       <div class="control-group">
         <label class="control-label" for="email"> <i class="icon-envelope"> </i> Email</label>
        
         <div class="controls">
           <input type="text" style="margin-left: 0px" required="" placeholder="Your email address" name="email">
         </div>
       </div>
       
       <div class="control-group">
         <label class="control-label" for="message"> <i class="icon-pencil"> </i> Message </label>
        
         <div class="controls">
           <textarea style="margin-left: 0px" required="" placeholder="Your message..." name="message" rows="3"></textarea>
         </div>
       </div>
    </form>
  </div>
  
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary">Order Now</button>
  </div>
</div>

<script>window.jQuery || document.write('<script src="<?php echo JURI::base() . 'modules/mod_ordernow/asserts/js/jquery.js' ?>"><\/script>')</script>
<script src="<?php echo JURI::base() . 'modules/mod_ordernow/asserts/js/bootstrap-modal.js'; ?>"></script>
<script>
jQuery.noConflict();
    
(function ($) {
    $('#myModal').modal({
        show: false
    });
})(jQuery);

</script>
