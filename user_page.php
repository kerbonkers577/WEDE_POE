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
	<!--Bootstap template acquired at:https://getbootstrap.com/docs/4.0/getting-started/introduction/ -->
	<link rel="stylesheet" href="CSS/bootstrap.min.css"/>
	<title>Items</title>
</head>
	<body>


		<?php
			//TODO:Display users details
			function displayUserInfo()
			{
				?>
					<table>
						<tr>
							<th>UserDetails</th>
						</tr>
						<tr>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email</th>
						</tr>
						<tr>
				<?php
				echo "<td>".$_SESSION["UserFName"]."</td>";
				echo "<td>".$_SESSION["UserLName"]."</td>";
				echo "<td>".$_SESSION["UserEmail"]."</td>";
				?></tr></table><?php
			}
			function populateTables()
			{
				?>
				<table>
					<tr>
						<th>Items</th>
					</tr>
					<tr>
						<th>Item</th>
						<th>Quantity</th>
						<th>Image</th>
						<th>Add to Cart</th>
					</tr>
				<?php
				$items = file("includes/Items.txt");

				foreach ($items as $item)
				{
					$itemBreakdown = explode(",",$item);
					echo "<tr>";
					echo "<td> $itemBreakdown[1] </td>";
					echo "<td> $itemBreakdown[3] </td>";
					echo "<td><img src=\"images\\$itemBreakdown[5]\" height=\"75\" width=\"75\"/></td>";
					// button linking in form found at: https://stackoverflow.com/questions/2906582/how-to-create-an-html-button-that-acts-like-a-link
					//hidden value method found at: https://stackoverflow.com/questions/19814082/passing-a-value-through-button-to-php-function
					$hiddenSellPrice = $itemBreakdown[4];
					echo "<td><form action=\"checkout.php\" method=\"post\"><input type=\"submit\" value=\"&#128722\"/><input type=\"hidden\" name=\"sellPrice\" value=\"$hiddenSellPrice\"></form></td>";
					echo "</tr>";
				}
				?></table><?php
			}
			displayUserInfo();
			populateTables();
		?>

	</body>
</html>
