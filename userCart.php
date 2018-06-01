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
			
			//Have conditional that if user says checkout then session ends
			//Should do so with sticky form
			//Should also clear contents of cart.txt

			$tempArray = $_SESSION['shopCart'];
			
		?>
	</body>
</html>
