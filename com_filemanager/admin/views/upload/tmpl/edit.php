<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

JHtml::_('behavior.tooltip');
?>

<form action="<?php echo JRoute::_('index.php?option=com_filemanager&view=uploads&layout=edit&id='.(int) $this->upload->id); ?>" method="post" name="adminForm" id="upload-form">
  <fieldset class="adminform">
    <legend><?php echo JText::_( 'COM_FILEMANAGER_ADMIN_CLIENT_DETAILS' ); ?></legend>
    <ul class="adminformlist">
      <?php
        $arr = $this->form->getFieldset();      
        if (is_array($arr) && count($arr) > 0) :
          foreach($arr as $field): 
      ?>
            <li><?php echo $field->label; echo $field->input;?></li>
      <?php 
          endforeach;
        endif;
      ?>
    </ul>
  </fieldset>
  <div>
    <input type="hidden" name="task" value="upload.edit" />
    <?php echo JHtml::_('form.token'); ?>
  </div>
</form>