<?php
session_start();
include_once("includes/DBConn.php");
$conn = connect();
    if(isset($_SESSION["userID"]))
    {
        if(isset($_GET["toAdd"]))
        {
            echo "<p>Fill in the new items information</p>"

            ?>
			<form action="Admin.php"method="post">
				<header>Add New Item</header>
				<br />
				<input type="text" name="Item_Name" placeholder="Enter the Item's Name" required/><br />
				<input type="number" name="Price" placeholder="Enter the Item's Price" required/><br />
				<input type="number" name="Quantity" placeholder="Enter the Quantity of the item" required/><br />
				<button type="submit" name="submit">Add</button>
			</form>
            
            <?php
            $_GET["toAdd"] = "";
        }

        if(isset($_GET["toDelete"]))
        {
            echo "<p>Item with ID of ".$_GET["toDelete"]." Deleted</p>";
            $deleteQuery = "DELETE FROM tbl_item WHERE tbl_item.Item_ID = ".$_GET["toDelete"];
            query($conn, $deleteQuery);
            $_GET["toDelete"] = "";
        }

        if(isset($_GET["toUpdate"]))
        {
            ?>
			<form action="Admin.php"method="post">
				<header>Add New Item</header>
				<br />
				<input type="text" name="uItem_Name" placeholder="Enter the Item's Name" required/><br />
				<input type="number" name="uPrice" placeholder="Enter the Item's Price" required/><br />
				<input type="number" name="uQuantity" placeholder="Enter the Quantity of the item" required/><br />
				<button type="submit" name="uupdate">Update</button>
			</form>

			<?php
        }
        
        if(isset($_POST["submit"]))
        {

            $ItemName = $_POST["Item_Name"];
            $ItemPrice = $_POST["Price"];
            $ItemQty = $_POST["Quantity"];
            
            $InsertQuery= "INSERT INTO tbl_item (Item_ID, Item_Name, Price, Quantity, img) VALUES (null, '$ItemName', $ItemPrice, $ItemQty, 'None')";
            query($conn, $InsertQuery);
            echo $ItemName ." added";

        }

        if(isset($_POST["update"]))
        {

            $ItemName = $_POST["uItem_Name"];
            $ItemPrice = $_POST["uPrice"];
            $ItemQty = $_POST["uQuantity"];
            
            $updateQuery = "UPDATE tbl_Item
                            SET Item_Name = '$ItemName', Price = $ItemPrice, Quantity = $ItemQty
                            WHERE ".$_POST["toUpdate"];
            query($conn, $updateQuery);
            echo $ItemName ." Updated";

        }

        
        
        //User Logged on
        $query = "SELECT COUNT(*) as numOfRows from tbl_Item";
        
        $CountResult = mysqli_fetch_assoc(query($conn, $query));
        
        echo "<table>";
        echo "<tr>";
        echo "<th>Item_ID</th>";
        echo "<th>Item Name</th>";
        echo "<th>Delete</th>";
        echo "<th>Update</th>";
        echo "<tr>";
        echo "</tr>";

        for($i = 0;$i < $CountResult["numOfRows"];$i++)
        {
            $selectQuery = "SELECT * From tbl_Item where Item_ID = ".($i+1);
            $selectResult = mysqli_fetch_assoc(query($conn, $selectQuery));
            echo "<tr>";
            echo "<td>".$selectResult["Item_ID"]."</td>";
            echo "<td>".$selectResult["Item_Name"]."</td>";
            echo "<td><a href=\"Admin.php?toDelete={$selectResult["Item_ID"]}\">Delete this Item</a></td>";
            echo "<td><a href=\"Admin.php?toUpdate={$selectResult["Item_ID"]}\">Update this Item</a></td>";
            echo "</tr>";
        }
        echo "<table>";

        echo "<a href=\"Admin.php?toAdd=true\">Add an Item</a>";
    }
    else
    {
        echo "<p>Please Log in to use the Admin Page</p>";
        echo "<a href=\"Login.php\">Login</a>"; 
    }

    closeConnection($conn);

?>