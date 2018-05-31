<?php
    /*Name: Tristan
	Surname: Constable
	Student#: 16002749
	Title of Project
	Declaration: This is my own work and
    any code obtained from other sources
    will be referenced
    */
    
    //This will manage the items that the user has selected to buy.
    //This object will hold what the user has selected and hold a method to load the page with these selections
     class aShopCart
     {
         function __construct()
         {

         }

         function showItems()//Will load all items from items table
         {
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
				?></table>
                <?php
                populateTables();
			}
         }
     }
?>