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

	<!-- custom CSS found at: https://codepen.io/andrejmlinarevic/full/NGGdVv and https://codepen.io/aperyon/full/oxzpaE -->
	<link href="CSS/CustomLogin.css" rel="stylesheet" type="text/css"/>
	<title>Register</title>
</head>
	<body>


		<?php

		function registerPage()
		{
			?>
			<form action="Register.php"method="post">
				<header>Register With The Site</header>
				<br />
				<input type="text" name="FName" placeholder="Enter Your First Name" required/><br />
				<input type="text" name="LName" placeholder="Enter Your Last Name" required/><br />
				<input type="email" name="Email" placeholder="Enter Your Email Address" required/><br />
				<input type="password" name="password" placeholder="Create a Password" required/><br />
				<button type="submit" name="submit">Register</button>
			</form>

			<?php
		}

		function registrationCompletePage()
		{
				?>
					<h1>Registration Complete!</h1>
					<a href="Index.php">Return to the Login</a>
				<?php
		}

		//include_once("includes/DBConn.php");

			if(isset($_POST["submit"]))
			{
				//$myConn = connect();
				$FName = $_POST["FName"];
				$LName = $_POST["LName"];
				$Email = $_POST["Email"];
				$Password = md5($_POST["password"]);
				/*
				$queryString = "INSERT INTO tbl_User(FName, LName, Email, Password) VALUES ('$FName','$LName', '$Email', '$Password');";
				query($myConn, $queryString);
				closeConnection($myConn);*/
				$file = file("includes/users.txt");
				$lineToAdd = "$FName,$LName,$Email,$Password\n";
				array_push($file,$lineToAdd);
				file_put_contents("includes/users.txt", $file);
				include("includes/createTable.php");
				registrationCompletePage();
			}
			else
			{
				registerPage();
			}
		?>
	</body>
</html>
