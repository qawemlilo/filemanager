<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

echo $this->loadTemplate('head');
?>

<div class="row-fluid">
  <form action="<?php echo JRoute::_('index.php?option=com_filemanager&view=uploads'); ?>" method="post" name="pagination-form">
   <p>Display # <?php echo $this->pagination->getLimitBox() . " &nbsp; &nbsp; <span style=\"margin-left: 200px;\"> " . $this->pagination->getPagesCounter(); ?></span></p>
  </form>
</div>

<div class="row-fluid" id="ss-admin-table">
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th style="width:40px;">&nbsp;</th>
        <th>Date of Upload</th>
        <th>Filename</th>
        <th>File Type</th>
        <th>Client Name</th>
      </tr>
    </thead>
    
    <tbody>
    <?php
    if (isset($this->uploads) && is_array($this->uploads)) :
      foreach ($this->uploads as $upload) {
    ?>
      <tr>
        <td style="text-align: center">
          <input type="checkbox" value="<?php echo $upload->id; ?>" name="types[]" />
        </td>
        <td>
          <?php echo $upload->ts; ?></a>
        </td>
        <td>
          <?php echo $upload->filename; ?>
        </td>
        <td>
          <?php echo $upload->label; ?>
        </td>
        <td>
          <?php echo $upload->title . ' ' . $upload->name ; ?>
        </td>
      </tr>
    <?php
      }
    endif;
    ?>
    </tbody>
  </table>
</div>

<div class="row-fluid" id="pagidiv" style="text-align: center">
    <?php echo $this->pagination->getPagesLinks(); ?>
</div>


<script>window.jQuery || document.write('<script src="<?php echo JURI::base() . 'components/com_filemanager/asserts/js/jquery.js' ?>"><\/script>')</script>
<script type="text/javascript">
jQuery.noConflict();

(function ($) {
    $(function () {
    <?php
      if ($this->config->get('include_paginationjs')) :
    ?>
        if ($('.pagination').length && !$('.pagination li').length) {
            var pgnDiv = $('.pagination')[0],
            ul = $('<ul>'),
            li, child;
        
            $(pgnDiv).children().each(function () {
                child = $(this);
                li = $('<li>');
            
                if (child.prop("tagName") === 'STRONG') {
                    li.addClass('disabled');
              
                    child = $('<a>', {
                        href: "#",
                        html: child.text()
                    });
                }
                
                li.append(child);
                ul.append(li);
            });
        
            $(pgnDiv).empty().append(ul)
        }
        else {
            $('#pagidiv').addClass('pagination');
        } 
    <?php
      endif;
    ?>
        
        $('#delete-client').on('click', function () {
            var yes = confirm('Are you sure you want to delete the selected item(s)?');
            
            if (yes) {
               $('#clients-form').submit();
            }
            
            return false;
        });

        
        $('#edit-client').on('click', function () {
            $('#hidden-task').val('clients.edit');
            
            if ($('#hidden-task').val() === 'clients.edit') {
                $('#clients-form').submit();
            }
            
            return false;
        });
    });
}(jQuery));
</script>
