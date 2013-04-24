<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

echo $this->loadTemplate('head');
?>

<div class="row-fluid">
  <form action="<?php echo JRoute::_('index.php?option=com_filemanager&view=client&file=' . $this->file); ?>" style="margin-bottom: 0px" method="post" name="pagination-form">
   <p>Display # <?php echo $this->pagination->getLimitBox() . " &nbsp; &nbsp; <span style=\"margin-left: 200px;\"> " . $this->pagination->getPagesCounter(); ?></span></p>
  </form>
</div>

<div class="row-fluid" id="ss-admin-table">
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th style="width:40px;">&nbsp;</th>
        <th>Filename</th>
        <th>Date of Upload</th>
        <th>Downloads</th>
      </tr>
    </thead>
    
    <tbody>
    <?php
    if (isset($this->files) && is_array($this->files)) :
      foreach ($this->files as $file) {
    ?>
      <tr>
        <td style="text-align: center">
          <input type="checkbox" value="<?php echo $file->id; ?>" name="files[]" />
        </td>
        <td>
          <?php echo $file->filename; ?>
        </td>
        <td>
          <?php echo $file->ts; ?>
        </td>
        <td>
          <a href="<?php echo JRoute::_('index.php?option=com_filemanager&task=client.download&fl=' . $file->filename . '&id=' . $this->details->id); ?>" target="_blank">Download</a>
        </td>
      </tr>
    <?php
      }
    endif;
    ?>
    </tbody>
  </table>
</div>
<div class="row-fluid" id="pagidiv" style="text-align: center; border-top: 0px">
    <?php echo $this->pagination->getPagesLinks(); ?>
</div>

<?php
if ($this->config->get('include_paginationjs')) :
?>
<script>window.jQuery || document.write('<script src="<?php echo JURI::base() . 'components/com_filemanager/asserts/js/jquery.js' ?>"><\/script>')</script>
<script type="text/javascript">
jQuery.noConflict();

(function ($) {
    $(function () {
        $('.edit-client-details').on('click', function () {
            window.location.href = "<?php echo JRoute::_('index.php?option=com_filemanager&view=client&layout=edit'); ?>";   
        });
        
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
    });
}(jQuery));
</script>
<?php
endif;
?>