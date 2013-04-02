<?php
defined('_JEXEC') or die('Restricted access');

$document = &JFactory::getDocument();
$document->addStyleSheet($this->website . 'componenents/com_filemanager/files/style.css');
?>

<div style="min-height:525px;" id="app-cont">
    <div class="q_logo"><span class="span">File Manager</span>   
        <div class="h-div">
		    <a class="lbox" href="<?php echo $this->website; ?>index.php?option=com_content&view=form&layout=edit">
			    <img style="margin: 0pt auto;" src="<?php echo $this->website; ?>media/com_filemanager/images/article_add.png" alt="Article Manager">
				<span style="display: block; text-align: center; margin-top: 2px; font-size: 10px;">Add Article</span>
			</a>
        </div> 

        <div class="h-div">
		    <a class="lbox" href="<?php echo $this->website; ?>index.php?option=com_filemanager&view=uploadfile">
			    <img style="margin: 0pt auto;" src="<?php echo $this->website; ?>media/com_filemanager/images/file_upload.png" alt="Article Manager">
				<span style="display: block; text-align: center; margin-top: 2px; font-size: 10px;">Upload File</span>
			</a>
        </div> 
		
        <div class="h-div">
		    <a class="lbox" href="<?php echo $this->website; ?>index.php?option=com_filemanager&view=addclient">
			    <img style="margin: 0pt auto;" src="<?php echo $this->website; ?>media/com_filemanager/images/users_add.png" alt="Article Manager">
				<span style="display: block; text-align: center; margin-top: 2px; font-size: 10px;">Add Client</span>
			</a>
        </div> 
    </div>

    <div style="clear:left;">&nbsp;</div>

<div id="file_upload"> 
  <form enctype="multipart/form-data" method="post" action="index.php?option=com_filemanager&view=uploadfile">
   <fieldset style="-moz-border-radius: 4px 4px 4px 4px;"> 
   <legend>Upload Document</legend>
    <input type="hidden" value="1" name="import">
    <table cellpadding="4px">
      <tbody><tr>
        <td>Select Client
          : <span style="color: red;">*</span></td>
            <td>
            <select style="height: 20px; width: 230px; line-height: 5px;" name="client">
               <option value="">Select Client</option>
                <?php
                if(count($this->users)) {
                   foreach($this->users as $user) {
                       echo '<option value="' . $user['id'] . '">' . $user['name'] . '</option>';
                   }
                }
                ?>
            </select>
            </td>
      </tr>
      <tr>
        <td> File Type
          : <span style="color: red;">*</span> </td>
        <td>
            <select style="height: 20px; width: 230px; line-height: 5px;" name="filetype">
                <option value="">Select File Type</option>
                <option value="tracker">Investment Tracker</option>
                <option value="corresp">Correspondence</option>
                <option value="doc">Document</option>
            </select>
        </td>
      </tr>
      <tr>
        <td>File Name
          : <span style="color: red;">*</span></td>
        <td><input type="file" size="40" name="file_upload"></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" value="Upload File" style="padding: 4px; font-size: 14px;" name="submit"></td>
      </tr>
    </tbody></table>
    </fieldset>
  </form>
</div><br />

&copy;2011 Raging Flame

</div>