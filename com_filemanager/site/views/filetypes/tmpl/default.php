<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

echo $this->loadTemplate('head');
?>
<div class="row-fluid">
<?php if ($this->pagination) {
?>
  <form action="<?php echo JRoute::_('index.php?option=com_filemanager&view=filetypes'); ?>" style="margin-bottom: 0px" method="post" name="pagination-form">
   <p>Display #  <?php echo $this->pagination->getLimitBox(); ?> &nbsp; &nbsp; <span style="margin-left: 200px;"> <?php echo $this->pagination->getPagesCounter(); ?> </span></p>
  </form>
<?php } ?>
</div>

<div class="row-fluid" id="ss-admin-table">
<form action="<?php echo JRoute::_('index.php?option=com_filemanager&view=filetypes'); ?>" method="post" id="types-form" name="types-form">
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th style="width:40px;">&nbsp;</th>
        <th>File Type</th>
        <th>ID</th>
      </tr>
    </thead>
    
    <tbody>
    <?php
    if (isset($this->types) && is_array($this->types)) :
      foreach ($this->types as $type) {
    ?>
      <tr>
        <td style="text-align: center">
          <input type="checkbox" value="<?php echo $type->id; ?>" name="types[]" />
        </td>
        <td>
          <a href="<?php echo JRoute::_('index.php?option=com_filemanager&view=filetypes&layout=edit&id=' . $type->id ); ?>"><?php echo $type->label; ?></a>
        </td>
        <td>
          <?php echo $type->id; ?>
        </td>
      </tr>
    <?php
      }
    endif;
    ?>
    </tbody>
  </table>
<input type="hidden" id="hidden-task" name="task" value="filetypes.remove" />
<?php echo JHtml::_('form.token'); ?>
</form>
</div>
<div class="row-fluid" id="pagidiv" style="text-align: center">
    <?php if ($this->pagination) { echo $this->pagination->getPagesLinks(); } ?>
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
        $('#pagidiv').find('li.pagination-start').removeClass('pagination-start');
        
        $('#delete-type').on('click', function () {
            var yes = confirm('Are you sure you want to delete the selected item(s)?');
            
            if (yes) {
               $('#types-form').submit();
            }
            
            return false;
        });

        
        $('#edit-type').on('click', function () {
            $('#hidden-task').val('filetypes.edit');
            
            if ($('#hidden-task').val() === 'filetypes.edit') {
                $('#types-form').submit();
            }
            
            return false;
        });
    });
}(jQuery));
</script>
