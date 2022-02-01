<?php 

/* This file has the logic to add a new staff member.
It gets the staff member details via the submission of the
form in the admin page. All that it does is to append the username
and password to the file users.txt. */

$uname = $_POST["user"];
$pass = $_POST["pass"];

$uname = trim($uname);
$pass = trim($pass);

if(strpos($pass,'staff')==false)
{
	echo "The password must follow the syntax dcsstaffXY";
	return;
}

// Check if a user with that name exists already

$file = fopen("includes/users.txt","r");
//Output lines until EOF is reached

while(!feof($file))
{
  $line = fgets($file, 1024);
  $bits = explode(',', $line); 

  $bits[0] = trim($bits[0]);

  if($uname==$bits[0]) 
  {
  	echo "A user with that username exists already. Please give a new username.";
  	fclose($file);
	return;
  }
}

fclose($file);

$fp = fopen("includes/users.txt","a");//opens file in append mode  
fwrite($fp,"\n".$uname.",".$pass);
fclose($fp);

header('location:admin.php');

?>