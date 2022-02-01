<?php 
	require 'includes/functions.php';
	session_start();
	if(!isset($_SESSION["type"]))
	{
		echo "You are not authorized to access this page.";
		return;
	}
	if($_SESSION["type"]!=1)	// The user is not an admin
	{
		echo "Only admins authorized to access this page.";
		return;
	}
?>

<style type="text/css">
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  font-family: calibri;
  border-radius: 15px;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-weight: bold;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>Admin - CS Dept. Birbeck</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</head>

<body style="background-color: white;">
	<div class="nav">
		<?php 
			// require the menu and related code
			require 'includes/menu.php';
		?>
	</div>

	<table style="border-width: 0; background-color: white;">
		<tr>
			<td style="font-family: calibri;">
				<h1 style="color: blue;">Department of Computer Science, Birkbeck University</h1>
				<hr>
				<p>Welcome to the admin page.</p>
				<p>You can add a new staff member by filling this form: </p>
			</td>
		</tr>
		<tr>
			<td style="font-family: calibri; min-width: 500px;">
				<form method="post" action="addstaff.php">
	                <hr>
	                <select name="title">
					  <option value="1">Mr.</option>
					  <option value="2">Mrs.</option>
					  <option value="2">Ms.</option>
					</select>
	                <input type="text"name="user" placeholder="username"
	                style="height:30px; border-radius: 5px; border-color: blue"/>
	                &nbsp; &nbsp;
	                <input type="password"name="pass" placeholder="password"
	                style="height:30px; border-radius: 5px; border-color: blue;" />
	                <br><br>
	                <input type="text"name="fname" placeholder="first name"
	                style="height:30px; border-radius: 5px; border-color: blue"/>
	                &nbsp; &nbsp;
	                <input type="password"name="lname" placeholder="last name"
	                style="height:30px; border-radius: 5px; border-color: blue;" />
	                <br><br>
	                <input type="text"name="phone" placeholder="phone number"
	                style="height:30px; border-radius: 5px; border-color: blue"/>
	                &nbsp; &nbsp;
	                <input type="password"name="email" placeholder="email id"
	                style="height:30px; border-radius: 5px; border-color: blue;" />
	                <br><br>
	                <button class="button" style="border-radius: 90px; background-color: violet;"
	                type="submit" name="submit">Add staff</button>
            	</form>
	            <?php
				if(isset($_SESSION["type"]))
				{
					?>
					<hr>
					<?php echo "You are logged in as ".$_SESSION["fname"]; ?>
					<a href="logout.php">
						<button class="button" style="border-radius: 90px; background-color: red;">LogOut</button>
					</a>
					<?php
				}
				?>
			</td>
		</tr>
	</table>
	<?php
		// require the footer
		include 'includes/footer.php';
	?>
</body>
</html>
