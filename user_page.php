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


<html lang="en" class="table-html">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- custom CSS found at: https://codepen.io/andrejmlinarevic/full/NGGdVv and https://codepen.io/aperyon/full/oxzpaE -->
	<link href="CSS/CustomLogin.css" rel="stylesheet" type="text/css"/>

	<title>Items</title>
</head>
	<body class="table-body">


		<?php
			//TODO:Display users details
			function displayUserInfo()
			{
				?>
					<table id="table1">
						<tr>
							<th class="mainuser">UserDetails</th>
						</tr>
						<tr>
							<th class="user">First Name</th>
							<th class="user">Last Name</th>
							<th class="user">Email</th>
						</tr>
						<tr>
				<?php
				echo "<td class=\"user\">".$_SESSION["UserFName"]."</td>";
				echo "<td class=\"user\">".$_SESSION["UserLName"]."</td>";
				echo "<td class=\"user\">".$_SESSION["UserEmail"]."</td>";
				?></tr></table><?php
			}
			function populateTables()
			{
				?>
				<table id="table2">
					<tr>
						<th>Items</th>
					</tr>
					<tr>
						<th class="itemSetup">Item</th>
						<th class="itemSetup">Quantity</th>
						<th class="itemSetup">Image</th>
						<th class="itemSetup">Add to Cart</th>
					</tr>
				<?php
				$items = file("includes/Items.txt");

				foreach ($items as $item)
				{
					$itemBreakdown = explode(",",$item);
					echo "<tr>";
					echo "<td class=\"itemSetup\"> $itemBreakdown[1] </td>";
					echo "<td class=\"itemSetup\"> $itemBreakdown[3] </td>";
					echo "<td class=\"itemSetup\"><img src=\"images\\$itemBreakdown[5]\" height=\"75\" width=\"75\"/></td>";
					// button linking in form found at: https://stackoverflow.com/questions/2906582/how-to-create-an-html-button-that-acts-like-a-link
					//hidden value method found at: https://stackoverflow.com/questions/19814082/passing-a-value-through-button-to-php-function
					$hiddenSellPrice = $itemBreakdown[4];
					echo "<td class=\"itemSetup\"><form action=\"checkout.php\" method=\"post\"><input type=\"submit\" value=\"&#128722\"/><input type=\"hidden\" name=\"sellPrice\" value=\"$hiddenSellPrice\"></form></td>";
					echo "</tr>";
				}
				?></table><?php
			}
			displayUserInfo();
			populateTables();
		?>

	</body>
</html>
