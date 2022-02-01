<?php

	function validTitle($title) 
	{
		$valid_title = array('Mr', 'Mrs', 'Ms', 'Dr', 'Prof');
		//Field is required
		//Submitted value must be one of the values specified in the form
		if ($title == '') {
			return false;
		}
		if (!in_array($title, $valid_title)) {
			return false;
		} else {
			return true;
		}
	}

	function validFirstName($fname) 
	{ 
	 	//Field is required
		//Length should not exceed 50 chars 
		//Not 1 character or less
		//Should be alpha chars
		if ($fname == '') {
			return false;
		}
		if (strlen($fname) > 50) {
			return false;
		}
		if (strlen($fname) <=1) {
			return false;
		}
		if (!ctype_alpha($fname)) {
			return false;
		}
		return true;
	}


	function validSurname($sname) 
	{ 
	 	//Field is required
		//Length should not exceed 50 chars 
		//Lenght Not 1 character or less
		//should be alpha chars
		if ($sname == '') {
			return false;
		}
		if (strlen($sname) > 50) {
			return false;
		}
		if (strlen($sname) <=1) {
			return false;
		}
		if (!ctype_alpha($sname)) {
			return false;
		}
		return true;
	}

	function validEmail($email) 
	{
		//Field is required
		//Should be a valid email address	
		if ($email == '') {
			return false;
		}			
		if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
			return false;
		}
		return true;
	}

	function validUserName($uname) 
	{ 
			 
		if ($uname == '') {
			return false;
		}
		if (strlen($uname) > 50) {
			return false;
		}
		if (strlen($uname) <=1) {
			return false;
		}
		if (!ctype_alpha($uname)) {
			return false;
		}
		if (!ctype_lower($uname)) {
			return false;
		}

		return true;
	}		

	function validPassword($pass) 
	{ 
	 	//Field is required
		//Needs to contain Department Code dcs, admin or staff and be larger that 01 
		$deptcode = substr($pass,0,3);
		$user = substr($pass,3,5);
		$usernumber = substr($pass,8,2);
		$passcode = 'dcs';

		$usertype = array('admin','staff');

		if ($pass == '') {
			return false;
		}

		if (strlen($pass) > 50) {
			return false;
		}

		if ($deptcode !== $passcode){
			return false;
		}			

		if (!in_array($user, $usertype)) {
			return false;
		}

		if ($usernumber <= 00) {
			return false;
		}
					
		return true;			
	}

	function startSession() {
		session_start();
		if (!isset($_SESSION['password'])){
				echo "<h5>You are logged out (login)</h5>"; #If no sesson set dispaly message.
		}		
	}

	//reloads page to the index page on logout and if session is set with pass/user
	function reloadCurrentPage() {
		header('location: index.php');  
	}

	//displays the welcome message to the user logged in.
	function displaySessionData($pageRef) {
		$name = '';
		if (isset($_SESSION['username'])) {
			$name = $_SESSION['username'];	
		}
		echo "<h2> Welcome $name to the $pageRef page</h2>";	
	}

	//destroys the session.	
	function destroySession() {
		$_SESSION = array();
		if (ini_get("session.use_cookies")) {
			echo 'session.use_cookies; ';
			$yesterday = time() - (24 * 60 * 60);
			$params = session_get_cookie_params();
			setcookie(session_name(), '', $yesterday,
			$params["path"], $params["domain"],
			$params["secure"], $params["httponly"]);
		}
		session_destroy();
	}
	
?>


