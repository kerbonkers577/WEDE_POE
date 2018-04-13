<!--Name: Tristan
Surname: Constable
Student#: 16002749
Title of Project
Declaration: This is my own work and
any code obtained from other sources
will be referenced -->

<!--Bootstap template acquired at:https://getbootstrap.com/docs/4.0/getting-started/introduction/ -->
<!doctype html>
	<html lang="en">
	  <head>
	    <!-- Required meta tags -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	    <!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="CSS/bootstrap.min.css"/>

	    <title>Login</title>
	  </head>
		<body>
			<?php
			include("includes/DBConn.php");
			function login()
			{
				?>
				<div class="container">
					<form action="<?php $_SERVER['SCRIPT_FILENAME']?>" method="post">
					<input type="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>" name="email" placeholder="Please Enter Your Email" required/>
					<input type="password" name="password" placeholder="Enter your password" required/>
					<input type="submit" name="submit" value="Login"/>
				</div>
				<?php
			}

			if(isset($_POST["submit"]))
			{
				//print_r($_POST);
				$myConn = connect();
				$result = mysqli_fetch_assoc(query($myConn, "SELECT Password FROM tbl_User where Email like '".$_POST["email"]."'"));
				//print_r($result);

				if(strcmp($result["Password"],md5($_POST['password'])) == 0)
				{
					$user = mysqli_fetch_assoc(query($myConn, "SELECT FName,LName,Email FROM tbl_User where Email like '".$_POST["email"]."'"));
					//print_r($user);
					$_SESSION["UserFName"] = $user["FName"];
					$_SESSION["UserLName"] = $user["LName"];
					$_SESSION["UserEmail"] = $user["Email"];
					include("user_page.php");
				}
				else
				{
					echo "entered";
					login();
				}
				closeConnection($myConn);
			}
			else {
				login();
			}
			?>

  </body>
	</html>
