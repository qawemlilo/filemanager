<?php
defined('_JEXEC') or die('Restricted Access'); 

jimport('joomla.filesystem.file');


$tracker = JPATH_BASE . DS . 'media' . DS . 'com_filemanager' . DS . 'client_folders' . DS . "user_" . $this->userId . DS . "tracker.pdf";
?>

    <table class="adminlist" id="tracker">
		 <caption>Investment Tracker</caption>
      <thead>
				<tr>
                    <th scope="col">
                        File Name
                    </th>

                    <th scope="col">

                        Date of Upload

                    </th>                     

                    <th scope="col">

                        Downloads

                    </th>

                </tr>

			</thead>

			

            <tbody>
                <tr>

                    <td>
                        <?php
                          if(JFile::exists($tracker)) echo "tracker.pdf"; 
                          else echo "Not available";
                        ?>                                             
                    </td>

                    <td> 
                        <?php
                          if(JFile::exists($tracker)) echo date('Y-m-d H:i:s', filemtime($tracker)); 
                          else echo "Not available";
                        ?>

                    </td>
                    <td>
                        <?php 
                            if(JFile::exists($tracker)) echo "<a href=\"index.php?option=com_filemanager&view=clientpage&file=tracker.pdf\"> Download </a>";                            else echo "Not available";
                        ?>
                    </td>                     

                </tr>

			</tbody>

        </table>

		

	    <table class="adminlist" id="correspondence">

		    <caption>Correspondence</caption>

            <thead>

				<tr>

                    <th>

                        File Name

                    </th>

                    <th>

                        Date of Upload

                    </th>                     

                    <th>

                        Downloads

                    </th>

                </tr>

			</thead>

			

            <tbody>
               <?php   if (!(count($this->correspondence) > 0)) { ?>
                <tr>

                    <td>

                       Not Available

                    </td>

                    <td>

                        Not Available

                    </td>

                    <td>

                         Not Available

                    </td>                     

                </tr>

			    <?php }  foreach($this->correspondence as $i=>$row) { ?>

                <tr>

                    <td class="<?php if ($i % 2 == 0) echo 'alt'; ?>">

                        <?php if(!empty($row['name'])) echo $row['name']; else echo "Not Available"; ?>

                    </td>

                    <td class="<?php if ($i % 2 == 0) echo 'alt'; ?>">

                        <?php if(!empty($row['ts'])) echo $row['ts']; else echo "Not Available"; ?>

                    </td>

                    <td class="<?php if ($i % 2 == 0) echo 'alt'; ?>">

                        <a href="index.php?option=com_filemanager&view=clientpage&file=<?php echo $row['name']; ?>"> Download </a>

                    </td>                     

                </tr>

				<?php } ?>

			</tbody>

        </table>

        <table class="adminlist" id="documents">

		   <caption>Documents</caption>

            <thead>

				<tr>

                    <th>

                        File Name

                    </th>

                    <th>

                        Date of Upload

                    </th>                     

                    <th>

                        Downloads

                    </th>

                </tr>

			</thead>

			

            <tbody>
               <?php   if (!(count($this->document) > 0)) { ?>
                <tr>

                    <td>

                       Not Available

                    </td>

                    <td>

                        Not Available

                    </td>

                    <td>

                         Not Available

                    </td>                     

                </tr>

			    <?php } foreach($this->document as $c=>$row) { ?>

                <tr>

                    <td class="<?php if ($c % 2 == 0) echo 'alt'; ?>">

                        <?php echo $row['name']; ?>

                    </td>

                    <td class="<?php if ($c % 2 == 0) echo 'alt'; ?>">

                        <?php echo $row['ts']; ?>

                    </td>

                    <td class="<?php if ($c % 2 == 0) echo 'alt'; ?>">

                        <a href="index.php?option=com_filemanager&view=clientpage&file=<?php echo $row['name']; ?>"> Download </a>

                    </td>                     

                </tr>

				<?php } ?>

			</tbody>

        </table> 