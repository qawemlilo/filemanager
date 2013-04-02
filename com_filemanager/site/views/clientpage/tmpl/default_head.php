<?php
defined('_JEXEC') or die('Restricted Access');
?>

<div style="min-height:525px;" id="app-cont">

    <div class="q_logo"><span class="span">RF File Manager</span>  		

		
    <?php if(!$this->allowed) {?>  
        <div class="h-div">
		    <a class="lbox" href="<?php echo $this->website; ?>index.php?option=com_filemanager&view=details">
			    <img style="margin: 0pt auto;" src="<?php echo $this->website; ?>media/com_filemanager/images/users_details.png" title="Edit your details" alt="My Details">
				<span style="display: block; text-align: center; margin-top: 2px; font-size: 10px;">My Details</span>
			</a>
        </div> 
      
        <div class="h-div">
		    <a class="lbox" href="<?php echo $this->website; ?>index.php?option=com_filemanager&view=clientpage">
			    <img style="margin: 0pt auto;" src="<?php echo $this->website; ?>com_filemanager/images/user_files.png" title="View your files" alt="My Files">
				<span style="display: block; text-align: center; margin-top: 2px; font-size: 10px;">My Files</span>
			</a>
        </div>

		<?php } if($this->allowed) {?>
        <div class="h-div">
		    <a class="lbox" href="<?php echo $this->website; ?>index.php?option=com_content&view=form&layout=edit">
			    <img style="margin: 0pt auto;" src="<?php echo $this->website; ?>media/com_filemanager/images/article_add.png" title="Create new article" alt="Article Manager">
				<span style="display: block; text-align: center; margin-top: 2px; font-size: 10px;">Add Article</span>
			</a>
        </div>

		
        <div class="h-div">
		    <a class="lbox" href="<?php echo $this->website; ?>index.php?option=com_filemanager&view=uploadfile">
			    <img style="margin: 0pt auto;" src="<?php echo $this->website; ?>media/com_filemanager/images/file_upload.png" title="Upload client files" alt="Upload File">
				<span style="display: block; text-align: center; margin-top: 2px; font-size: 10px;">Upload File</span>
			</a>
        </div> 

        <div class="h-div">
		    <a class="lbox" href="<?php echo $this->website; ?>index.php?option=com_filemanager&view=addclient">
			    <img style="margin: 0pt auto;" src="<?php echo $this->website; ?>media/com_filemanager/images/users_add.png" title="Create client account" alt="Add Client">
				<span style="display: block; text-align: center; margin-top: 2px; font-size: 10px;">Add Client</span>
			</a>
        </div> 
		<?php } ?>
    </div>

    <div style="clear:left;">&nbsp;</div>

    <span class="span-two" style="fon-size:16px;">Hi <?php echo $this->current_user; ?>, welcome.</span>

	<p></p>

    <div style="clear:left;">&nbsp;</div>