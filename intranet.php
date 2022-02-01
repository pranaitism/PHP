<?php 
	require 'includes/functions.php';
	session_start();
	if(!isset($_SESSION["type"]))
	{
		echo "You are not authorized to access this page.";
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
		<title>Intranet - CS Dept. Birbeck</title>
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
				<p>Welcome to the intranet page.</p>
				<p>You can see the Web Programming using PHP - P1 Results 
				<a href="p1results.php">here</a>, <br>
				the Introduction to Database Technology – DT Results 
				<a href="dtresults.php">here</a>, <br>
				and the Problem Solving for Programming – PfP Results
				<a href="pfpresults.php">here</a>.
			</td>
		</tr>
		<tr>
			<td style="font-family: calibri; min-width: 500px;">
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
				else
				{
					?>
					<form method="post" action="authenticate.php">
		                <hr>
		                <input type="text" class="form-control" name="user" placeholder="Username" style="border-radius: 5px; border-color: blue;" />
		                &nbsp; &nbsp;
		                <input type="password" class="form-control" name="pass" placeholder="Password" style="border-radius: 5px; border-color: blue;" />
		                <button class="button" style="border-radius: 90px; background-color: orange;" type="submit" name="submit"> Login </button>
	            	</form>
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
