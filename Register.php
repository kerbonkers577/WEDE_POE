<!doctype html>
<?php
  /*Name: Tristan
	Surname: Constable
	Student#: 16002749
	Title of Project
	Declaration: This is my own work and
	  any code obtained from other sources
	  will be referenced
*/
	?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="CSS/bootstrap.min.css"/>
	<title>Register</title>
</head>
	<body>


		<?php

		function registerPage()
		{
			?>
			<h1>Welcome to the Registration Page</h1>
			<div>
				<form action="Register.php"method="post">
					<input type="text" name="FName" placeholder="Enter Your First Name" id required/>
					<input type="text" name="LName" placeholder="Enter Your Last Name" id required/>
					<input type="email" name="Email" placeholder="Enter Your Email Address" id required/>
					<input type="password" name="password" placeholder="Create a Password" id required/>
					<button type="submit" name="submit">Register</button>
				</form>
			</div>
			<?php
		}

		function registrationCompletePage()
		{
				?>
					<h1>Registration Complete!</h1>
					<a href="Login.php">Return to the Login</a>
				<?php
		}

		include_once("includes/DBConn.php");
			if(isset($_POST["submit"]))
			{
				$myConn = connect();
				$FName = $_POST["FName"];
				$LName = $_POST["LName"];
				$Email = $_POST["Email"];
				$Password = md5($_POST["password"]);
				$queryString = "INSERT INTO tbl_User(FName, LName, Email, Password) VALUES ('$FName','$LName', '$Email', '$Password');";
				query($myConn, $queryString);
				closeConnection($myConn);
				registrationCompletePage();
			}
			else
			{
				registerPage();
			}
		?>
	</body>
</html>
