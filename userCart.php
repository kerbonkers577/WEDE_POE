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
	session_start();
	include_once("includes/aShopCart.php");
	?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="CSS/bootstrap.min.css"/>
	<title>UserCart</title>
</head>
	<body>
		<h1>Cart</h1>
		<?php
			include_once("includes/aShopCart.php");
			//session_start();
			//Check for login to write to database
			//Have conditional that if user says checkout then session ends
			//Should do so with sticky form
			//Should also clear contents of cart.txt
			//Need to write to database when user runs checkout
			
			$tempArray = $_SESSION['shopCart'];
			$userShopCart = new aShopCart();
			$userShopCart->setItemArray($tempArray);
			$userShopCart->showUserItems();
			
			if(isset($_SESSION["userID"]))
			{
				echo "<a href=\"checkout.php\">Checkout</a>";
			}
			else
			{
				echo "<p>Please login to checkout your cart</p>";
				echo "<a href=\"Login.php\">Login</a>";
			}
			
			echo "<a href=\"myShop.php\">Continue Browsing</a>";
			
		?>
	</body>
</html>
