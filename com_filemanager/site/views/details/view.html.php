<?php
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');
jimport( 'joomla.environment.request' );
jimport('joomla.user.helper');

function isAllowed($chech_perms, $user_perms) {
    $is_allowed = false;

    if (is_int($chech_perms)) {
        foreach($user_perms as $v) {
	        if($v == $chech_perms) $is_allowed = true;
        }	

	}
	return $is_allowed;
}

function sendMail($email, $tel, $cell, $fax) {
    $session =& JFactory::getSession();
    $user = $session->get('cUser');
    $cemail = $session->get('cEmail');
    $ccell = $session->get('cCell');
    $ctel = $session->get('cTel');
    $cfax = $session->get('cFax');
    $flag = false;

    $to = $email;

    $time = date('Y-m-d H:i:s',time());

    $message = "
    <html>
      <head>
        <title></title>
      </head>
    <body>
      <h1 style=\"color: #4B3F34\">Quantum Financial Planning</h1>
      <p>{$session->get('cUser')}'s Details Were Updated</p>
      <table width=\"400\">
      <tbody>
        <tr>
	      <td width=\"120\">
	        <strong>Client:</strong>
	      </td>
	      <td>
	        {$session->get('cUser')}
	      </td>	   
	    </tr>";

    if($cemail != $email) {
        $flag = true;
        $message .= " <tr>
	      <td width=\"120\">
	        <strong>New email:</strong>
	      </td>
	      <td>
	        {$email}
	      </td>
	    </tr>";
    }

    if($tel != $ctel) {
        $flag = true;
        $message .= " <tr>
	      <td width=\"120\">
	        <strong>New tel:</strong>
	      </td>
	      <td>
	        0{$tel}
	      </td>
	    </tr>";
    }

    if($cell != $ccell) {
        $flag = true;
        $message .= " <tr>
	      <td width=\"120\">
	        <strong>New cell:</strong>
	      </td>
	      <td>
	        0{$cell}
	      </td>
	    </tr>";
    }

    if($fax != $cfax) {
        $flag = true;
        $message .= "<tr>
	      <td width=\"120\">
	        <strong>New fax:</strong>
	      </td>
	      <td>
	        0{$fax}
	      </td>
	    </tr>";
    }

    $message .= "<tr>
	   <td width=\"120\">
	    <strong>Time:</strong>
	   </td>
	   <td>
	       {$time}
	   </td>
	   </tr>
      </tbody>
      </table> 

      <p><i>JM Shelf 2 cc T/A Quantum Financial Planning<br />
      CK 2000/064134/23<br />
      Member N.H CAIRNS, C.IVINS <br />
      An Authorised Financial Services Provider<br />
      FSP 7596<br />
      </i></p>
      </body>
    </html>";

    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    $headers .= "From: QuantumFP <no-reply@quantumfp.co.za>\r\n";
    $headers .= "Bcc: details@quantumfp.co.za\r\n";
    $headers .= "X-Priority: 1(Highest)\r\n";
    $headers .= "X-MSMail-Priority: High\r\n";
    $headers .= "Importance: High\r\n";

    if($flag) mail($to, "{$session->get('cUser')}'s Details Were Updated", $message, $headers);
}




class User {

    private $myarr, $id, $db;
    
    
    function __construct($id) {
        $this->id = $id;
        $this->db =& JFactory::getDBO();
    }


	
    
    private function processForm() {
        $arr = array();
	    $arr['title'] = JRequest::getWord('title', '', 'POST');
	    $arr['fullname'] = JRequest::getString('fullname', '', 'POST');
	    $arr['email'] = JRequest::getString('email', '', 'POST');
	    $arr['username'] = JRequest::getWord('username', '', 'POST'); 
	    $arr['cell'] = JRequest::getInt('cell', '', 'POST');
	    $arr['tel'] = JRequest::getInt('tel', '', 'POST');
	    $arr['fax'] = JRequest::getInt('fax', '', 'POST' ); 
        $arr['subscribe'] = JRequest::getString('subscribe', '', 'POST'); 	   
     
        foreach($arr as $k=>$v) {
	       if (!$v && !($k == 'subscribe' || $k == 'tel' || $k == 'fax' || $k == 'cell')) {
               echo '<script language="text/javascript">
			            alert ("Please fill in all the feilds");
					    history.go(-1);
				     </script>';
               return;		   
		     }
	    }
	   
	   
	    if(!preg_match("/^[\.A-z0-9_\-\+]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z]{1,4}$/", $arr['email'])) {
            echo '<script language="text/javascript">
			        alert ("Invalid Email");
					history.go(-1);
				 </script>';
            return;	   
	    }
	   
        $this->myarr = $arr;	 
        return true;	   
	}
    
    
    
	
    public function create() {
	    $output='';
		$home = "index.php?option=com_quantumfp&view=details";
	    $this->processForm();
	  
        $checkusername = $this->checkusername();
    
        if ($checkusername && $checkusername != $this->id) {		
            echo "<script language=\"text/javascript\">
			          alert (\"Error! That username({$this->myarr['username']}) is already taken.\");
					      history.go(-1);
				     </script>";
            exit();
        }
    
        if ($this->addInfo()) {
            sendMail($this->myarr['email'], $this->myarr['tel'], $this->myarr['cell'], $this->myarr['fax']);
        
			$output .= "-----------------------------------------";			
			$output .= '<h2 style="color:green; margin-top:5px">Details Updated Successfully!</h2>';
			$output .= "<br /> -----------------------------------------";
			
			$output .= "<p><a href=\"$home\">Go Back</a></p>";
		
			return $output;
		}
        else {   
	        return JError::raiseWarning('SOME_ERROR_CODE', $instance->getError());	
        }			
    }
    
    
    
	
    private function addInfo() {
	    if (isset($this->id)) {
	        $id = $this->id;
	        $fullname = $this->myarr['fullname'];
		    $email= $this->myarr['email'];
		    $username = $this->myarr['username'];
	        $title = $this->myarr['title'];
		    $cell = $this->myarr['cell'];
		    $tel = $this->myarr['tel'];
		    $fax = $this->myarr['fax'];
		    
            if ($this->myarr['subscribe'] == 'yes') {
		        $subscribe = 1;
		    }
		    else {
                $subscribe = 0;
            }
            
            $db = $this->db;
            $query_one = "UPDATE jos_users
		        SET name='$fullname', username='$username', email='$email'
		        WHERE id='$id'";
            $query_two = "UPDATE jos_quantum_users
		        SET title='$title', cell='$cell', tel='$tel', fax='$fax', subscribe='$subscribe' 
		        WHERE user_id='$id'";
		
            $db->setQuery($query_one);
            
		    if($db->query()) {
		        $db->setQuery($query_two);
			    return $db->query(); 
		    }
		    else {
                echo "<script language=\"text/javascript\">
			            alert (\"Error! $db->getErrorMsg Details not updated\");
					    history.go(-1);
				     </script>";
                exit();	
            }		
	    }
    }
    
    
    
    
    private function checkusername() {
		$username = $this->myarr['username'];
        $db = $this->db;
    
        $query = "SELECT id FROM #__users
		   WHERE username='$username'";   
        $db->setQuery($query);
        $result = $db->loadResult();
        
		if($result) {
		    return $result;
		}
		else {
            return false;
        }		
    }
}




class FileManagerViewDetails extends JView
{
    // Overwriting JView display method
    function display($tpl = null) {
        $currentUser =& JFactory::getUser();
        $mainframe =& JFactory::getApplication();
        
        $this->website = JURI::base();
        $this->q_users = $this->get('Users');
        $this->allowed = isAllowed(3, $currentUser->authorisedLevels());
        
        if ($currentUser->get('guest')) {
            $mainframe->redirect("index.php");
            exit();
        }
        
        if (isset($_POST['import'])) {
            $newUser = new User($currentUser->get('id'));
            $a = $newUser->create();
            echo $a;
            return true;
        }
        
        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            JError::raiseError(500, implode('<br />', $errors));
            return false;
        }
        
        // Display the view
        parent::display($tpl);
    }

}
