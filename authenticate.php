<?php 

/* This file has the logic to validate a login. This code
is executed when a user clicks on the Login button in the 
index.php page. This page gets the username and password as
POST variables, and then checks whether a username, password
combo matches it. If yes, login is successful, the session variables are
set accordingly, and the user is redirected to the appropriate page.
If not, the user is taken back to the index.php page. */

$uname = $_POST["user"];
$pass = $_POST["pass"];

$uname = trim($uname);
$pass = trim($pass);

// Read the file that stores all usernames and passwords.
$bits = "";

$file = fopen("includes/users.txt","r");
//Output lines until EOF is reached

while(!feof($file))
{
  $line = fgets($file, 1024);
  $bits = explode(',', $line); 

  $bits[0] = trim($bits[0]);
  $bits[1] = trim($bits[1]);

  if(($uname==$bits[0]) && ($pass==$bits[1]))
  {
  		session_start();
  		$_SESSION["fname"] = $uname;
  		$_SESSION["password"] = $pass;

  		// Find out what sort of a  user this is - Admin, or staff ?
  		if(strpos($pass,'admin') !==false)
  			$_SESSION["type"] = 1;	
  		else if(strpos($pass,'staff') !==false)
  			$_SESSION["type"] = 2;	

  		echo "successful login";
  		echo $_SESSION["type"] ;
  		header('location:index.php');
  }

}

fclose($file); 

// No user found with that username and password. Invalid credentials. 	

header('location:index.php');

?>