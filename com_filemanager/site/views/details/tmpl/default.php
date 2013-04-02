<?php

defined('_JEXEC') or die('Restricted access');
   
$document = &JFactory::getDocument();      
$document->addStyleSheet($this->website . 'componenents/com_filemanager/files/style.css');
$session =& JFactory::getSession();
?>

<div style="min-height:525px;" id="app-cont">

    <div class="q_logo"><span class="span">QuantumFP Client File Management System</span>  		

		
       <?php if(!$this->allowed) { ?> 
        <div class="h-div">
		    <a class="lbox" href="<?php echo $this->website; ?>index.php?option=com_filemanager&view=details">
			    <img style="margin: 0pt auto;" src="<?php echo $this->website; ?>media/com_filemanager/images/users_details.png" alt="Article Manager">
				<span style="display: block; text-align: center; margin-top: 2px; font-size: 10px;">My Details</span>
			</a>
        </div>
        
        
        <div class="h-div">
		    <a class="lbox" href="<?php echo $this->website; ?>index.php?option=com_filemanager&view=clientpage">
			    <img style="margin: 0pt auto;" src="<?php echo $this->website; ?>media/com_filemanager/images/user_files.png" title="View your files" alt="My Files">
				<span style="display: block; text-align: center; margin-top: 2px; font-size: 10px;">My Files</span>
			</a>
        </div> 

		<?php } if($this->allowed) {?>

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
		<?php } ?>
    </div>

    <div style="clear:left;">&nbsp;</div>

   

<?php 
  $details = $this->q_users[0];

?>

  <div id="add_user"> 
  <form action="index.php?option=com_filemanager&view=details&task=update" method="post">

   <fieldset style="-moz-border-radius: 4px;"> 

   <legend>My Details</legend>

    <input type="hidden" name="import" value="1" />



    <table cellpadding="4px">

      <tr>



        <td>Title:



          <span style="color:red">*</span></td>

            <td>

            <select name="title" style="height:20px; line-height: 5px">

                <option value="">Select Title</option>

                <option value="mr" <?php if($details['title'] == "mr") echo 'selected="selected"'?>>Mr</option>

                <option value="mrs" <?php if($details['title'] == "mrs") echo 'selected="selected"'?>>Mrs</option>

                <option value="miss" <?php if($details['title'] == "miss") echo 'selected="selected"'?>>Miss</option>

                <option value="dr" <?php if($details['title'] == "dr") echo 'selected="selected"'?>>Dr</option>
                
                <option value="prof" <?php if($details['title'] == "prof") echo 'selected="selected"'?>>Prof</option>

            </select>

            </td>



      </tr>

      <tr>



        <td>Full Name:



          <span style="color:red">*</span><br /><br /> </td>



        <td>

            <input type="text" name="fullname" value="<?php $session->set('cUser', $details['name']); echo $details['name']; ?>" style="width: 250px; padding:4px; -moz-border-radius: 4px;" />

                <div style="margin: 0px; width: 255px; color: #A8A8A8; padding:2px; font-size: 10px;">

                   e.g. John Dow

                 </div>

        </td>



      </tr>

	  

      <tr>



        <td>Username: 



          <span style="color:red">*</span><br /><br /> </td>



        <td>

            <input type="text" name="username" value="<?php echo $details['username']; ?>" style="width: 250px; padding:4px; -moz-border-radius: 4px;" />

                <div style="margin: 0px; width: 255px; color: #A8A8A8; padding:2px; font-size: 10px;">

                   e.g. JohnDow

                 </div>

        </td>



      </tr>

       <tr>

        <td>Password: <span style="color:red">*</span></td>

        <td style="padding:10px 10px 15px 10px"><a href="<?php echo $this->website; ?>index.php/reset-password">Click here to Reset Password</a>
        </td>


      </tr>

      <tr>



        <td>Email: <span style="color:red">*</span><br /><br /> 

        </td>



        <td><input type="text" name="email" value="<?php $session->set('cEmail', $details['email']); echo $details['email'] ?>" style="width: 250px; padding:4px; -moz-border-radius: 4px;" />

            <div style="margin: 0px; width: 255px; color: #A8A8A8;padding:2px; font-size: 10px;">

               e.g. john_dow@gmail.com

             </div>

        </td>







      </tr>

      <tr>

            <td>Cell: <span style="color:red">*</span><br /><br /> 

            </td>

            

            <td><input type="text" name="cell" value="0<?php $session->set('cCell', $details['cell']); echo $details['cell'] ?>" style="width: 250px; padding:4px; -moz-border-radius: 4px;" />

                <div style="margin:0px; width: 255px; color: #A8A8A8;padding:2px; font-size: 10px;" > 

                e.g. 0741437468

                </div>

            </td>



      </tr>

      <tr>

            <td>Tel: <span style="color:red">*</span><br /><br />

            </td>

            

            <td><input type="text" name="tel" value="0<?php $session->set('cTel', $details['tel']); echo $details['tel']; ?>" style="width: 250px; padding:4px; -moz-border-radius: 4px;" />

                <div style="margin:0px; width: 255px; color: #A8A8A8; padding:2px; font-size: 10px;">

                e.g. 0127858000

                </div>

            </td>



      </tr>
      
      <tr>

      <td>Fax: <span style="color:red">*</span>

          <br /><br /> </td>

            <td><input type="text" name="fax" value="0<?php $session->set('cFax', $details['fax']); echo $details['fax']; ?>" style="width: 250px; padding:4px; -moz-border-radius: 4px;" />

                <div style="margin:0px; width: 255px; color: #A8A8A8; padding:2px; font-size: 10px;" >

                    e.g. 0127858080

                </div>

            </td>



      </tr>  
      <tr>



        <td></td>



        <td><input type="checkbox" name="subscribe" <?php if ($details['subscribe'] == 1) echo 'checked="checked"'; ?>  value="yes" /> Subscribe for correspondence </td>



      </tr>

      <tr>



        <td></td>



        <td><input type="submit" name="submit" style="padding:4px; font-size:15px" value="Update Info" /></td>



      </tr>



    </table>

    </fieldset>

  </form>

  </div><br />

    &copy;2011 Raging Flame

</div>