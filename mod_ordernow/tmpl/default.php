<?php 
defined('_JEXEC') or die('Restricted access'); // no direct access 

?>
    <!-- Button to trigger modal -->
<a href="#myModal" style="margin-top:5px; color:#fff" role="button" class="btn btn-large btn-warning" data-toggle="modal">Order Now</a>
     
    <!-- Modal -->
<div id="myModal" style="width:260px; text-align: left; margin-left: -130px" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel">Order Form</h3>
  </div>
  
  <form method="post" name="contactusform"  id="contactusform">
  <div class="modal-body"> 
       <div class="progress progress-striped active" style="display:none">
         <div class="bar" style="width: 100%;"></div>
       </div>
 
       <div id="responseD" class="alert" style="display:none">
       </div>
       
       
       <p>Fill in this form and a download link will be email to you.</p>
         
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
       <?php echo JHtml::_('form.token'); ?>
  </div>
  
  <div class="modal-footer" style="text-align: left">
    <button type="submit" class="btn btn-primary">Order Now</button>
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
  </form>
</div>

<script>window.jQuery || document.write('<script src="<?php echo JURI::base() . 'modules/mod_ordernow/asserts/js/jquery.js' ?>"><\/script>')</script>
<script src="<?php echo JURI::base() . 'modules/mod_ordernow/asserts/js/bootstrap-transition.js'; ?>"></script>
<script src="<?php echo JURI::base() . 'modules/mod_ordernow/asserts/js/bootstrap-modal.js'; ?>"></script>
<script>
jQuery.noConflict();
    
(function ($) {
    $('#myModal').modal({
        show: false
    });
    
    
    $("#contactusform").on('submit', function () {   
        var self = this,
            progress = $('.progress'),
            responseD = $('#responseD');
            
        progress.slideDown('slow', function () {
            $.post('index.php?option=filemanager&task=client.order', $(self).serialize())
            .done(function(data) {
                progress.slideUp('slow', function () {
                    responseD.addClass('alert-success').html($('<strong>Order sent!</strong>')).slideDown('slow');
                });
                  
                window.setTimeout(function () { 
                    responseD.slideUp('slow', function () {
                        responseD.removeClass('alert-success');
                        $('#myModal').modal('hide');
                    }); 
                }, 10 * 1000);
            })
            .fail(function(data) {
                progress.slideUp('slow', function () {
                    responseD.addClass('alert-error').html($('<strong>Error, Order not sent!</strong><br>Contact: <a href="mailto:qawemlilo@gmail.com">qawemlilo@gmail.com</a>')).slideDown();
                });
                  
                window.setTimeout(function () { 
                    responseD.slideUp('slow', function () {
                        responseD.removeClass('alert-error');
                    }); 
                }, 10 * 1000);
            });
        });
            
            return false;
    });
})(jQuery);

</script>
