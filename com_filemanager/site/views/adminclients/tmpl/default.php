<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

echo $this->loadTemplate('head');
?>
<div class="row-fluid">
  <form action="<?php echo JRoute::_('index.php?option=com_filemanager&view=adminclients'); ?>" method="post" name="pagination-form">
   Display # <?php echo $this->pagination->getLimitBox() . " &nbsp; &nbsp; <span style=\"margin-left: 200px;\"> " . $this->pagination->getPagesCounter(); ?></span>
  </form>
</div>
<br>
<div class="row-fluid" id="ss-admin-table">
<form action="<?php echo JRoute::_('index.php?option=com_filemanager&view=adminclients'); ?>" method="post" id="clients-form" name="clients-form">
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th style="width:40px;">&nbsp;</th>
        <th>Client</th>
        <th>Phone</th>
        <th>Email</th>
      </tr>
    </thead>
    
    <tbody>
    <?php
    if (isset($this->clients) && is_array($this->clients)) :
      foreach ($this->clients as $client) {
    ?>
      <tr>
        <td style="text-align: center">
          <input type="checkbox" value="<?php echo $client->id; ?>" name="clients[]" />
        </td>
        <td>
          <a href="<?php echo JRoute::_('index.php?com_filemanager&view=adminclients&layout=edit&id=' . $client->id ); ?>"><?php echo $client->title . ' ' .$client->name; ?></a>
        </td>
        <td>
          0<?php echo $client->phone; ?>
        </td>
        <td>
          <a href="mailto:<?php echo $client->email; ?>"><?php echo $client->email; ?></a>
        </td>
      </tr>
    <?php
      }
    endif;
    ?>
    </tbody>
  </table>
  
<input type="hidden" id="hidden-task" name="task" value="adminclients.remove" />
<?php echo JHtml::_('form.token'); ?>
</form>
</div>
<div class="row-fluid" style="text-align: center">
    <?php echo $this->pagination->getPagesLinks(); ?>
</div>

<script type="text/javascript">
jQuery.noConflict();

(function ($) {
    $(function () {
      if ($('.pagination').length) {
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
        
        
        $('#delete-client').on('click', function () {
            var yes = confirm('Are you sure you want to delete the selected item(s)?');
            
            if (yes) {
               $('#clients-form').submit();
            }
            
            return false;
        });

        
        $('#edit-client').on('click', function () {
            $('#hidden-task').val('adminclients.edit');
            
            if ($('#hidden-task').val() === 'adminclients.edit') {
                $('#clients-form').submit();
            }
            
            return false;
        });
    });
}(jQuery));
</script>
