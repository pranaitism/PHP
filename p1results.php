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
		<title>Home - CS Dept. Birbeck</title>
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
				<p>Welcome to the P1 results page.</p>
			</td>
		</tr>
		<tr>
			<td style="font-family: calibri; min-width: 500px;">
				<table>
				  <tr>
					<th>Year</th>
					<th>Students</th>
					<th>Pass</th>
					<th>Fail (no resit)</th>
					<th>Resit</th>
					<th>Withdrawn</th>
				  </tr>
				  <tr>
					<td>2012/13</td>
					<td>50</td>
					<td>30</td>
					<td>5</td>
					<td>5</td>
					<td>10</td>
				  </tr>
				  <tr>
					<td>2013/14</td>
					<td>60</td>
					<td>35</td>
					<td>5</td>
					<td>12</td>
					<td>8</td>
				  </tr>
				  <tr>
					<td>2014/15</td>
					<td>45</td>
					<td>20</td>
					<td>3</td>
					<td>7</td>
					<td>15</td>
				  </tr>
				  <tr>
					<td>2015/16</td>
					<td>40</td>
					<td>25</td>
					<td>3</td>
					<td>5</td>
					<td>7</td>
				  </tr>
				</table>	
			</td>
		</tr>
		<tr>
			<td>
				<hr>
				<?php echo "You are logged in as ".$_SESSION["fname"]; ?>
				<a href="logout.php">
					<button class="button" style="border-radius: 90px; background-color: red;">LogOut</button>
				</a>
			</td>
		</tr>
	</table>
	<?php
		// require the footer
		include 'includes/footer.php';
	?>
</body>
</html>
