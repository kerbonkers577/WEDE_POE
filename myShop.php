<?php
    /*Name: Tristan
	Surname: Constable
	Student#: 16002749
	Title of Project
	Declaration: This is my own work and
    any code obtained from other sources
    will be referenced
    */

    //This will load the aShopCart.php and its functions
    //This script will manage layout and navigation


    //Session should start on condition that user has logged in
    session_start();
    if(isset($_SESSION['shopCart']) == false)
    {
        $_SESSION['shopCart'] = array();
    }

?>
<!DOCTYPE html>
<html>
    <body>
        <?php
        include_once("includes/aShopCart.php");
        include_once("includes/DBConn.php");
        //Unsearilze object as to not destroy it
        $shopCart = new aShopCart();
        //Object serilization source: http://php.net/manual/en/language.oop5.serialization.php
        //Add check to see if user has logged in
        $unserializedCart = file_get_contents('includes/cart.txt');
        $shopCart = unserialize($unserializedCart);
        
        if($shopCart == null)
        {
            $shopCart = new aShopCart();
        }
        else
        {
            $_SESSION['shopCart'] = $shopCart->getItemArray();
        }
        
        if(isset($_POST["pickedUserItem"]))
        {
            $shopCart->addItem($_POST["pickedUserItem"]);
            array_push($_SESSION['shopCart'], $_POST["pickedUserItem"]);
            $_POST["pickedUserItem"] = "";
        }
        else
        {
            echo "No new item added";
        }

        if(isset($_SESSION["userID"]))
        {
            echo "User has ID of ". $_SESSION["userID"];
            echo "User has ID of ". $_SESSION["UserFName"];
        }
        else
        {
            echo "<p>No one logged in</p>";
        }


        
        //$shopCart->addItem("Sock");
        $shopCart->showUserItems();
        ?>

        <a href="Login.php">Login</a>

        <!--Builds the table from the items-->
        <table id="table2">
                <tr>
                    <th>Items</th>
                </tr>
                <tr>
                    <th class="itemSetup">Item</th>
                    <thclass="itemSetup">Price</th>
                    <th class="itemSetup">Quantity</th>
                    <th class="itemSetup">Image</th>
                    <th class="itemSetup">Add to Cart</th>
                </tr>
            <?php
            $items = file("includes/Items.txt");

                $itemColumnCount = "SELECT COUNT(*) as numOfRows from tbl_Item"; 
                $itemFillConn = connect();
                $CountResult = mysqli_fetch_assoc(query($itemFillConn, $itemColumnCount));
                print_r($CountResult);

                for($i = 0; $i < $CountResult["numOfRows"]; $i++)
                {
                    $itemFetch = "SELECT Item_ID, Item_Name, Price, Quantity, img from tbl_Item where Item_ID = ".($i+1); 
                    $itemResult = mysqli_fetch_assoc(query($itemFillConn, $itemFetch));

                    //Button linking in form found at: https://stackoverflow.com/questions/2906582/how-to-create-an-html-button-that-acts-like-a-link
                    //hidden value method found at: https://stackoverflow.com/questions/19814082/passing-a-value-through-button-to-php-function
                    //TODO:Add checks to see the quantity is not 0 otherwise remove it from list
                    echo "<tr>";
                    echo "<td class=\"itemSetup\">". $itemResult["Item_Name"]."</td>";
                    echo "<td class=\"itemSetup\"> ". $itemResult["Price"]." </td>";
                    echo "<td class=\"itemSetup\"> ". $itemResult["Quantity"]." </td>";
                    echo "<td class=\"itemSetup\"><img src=\"images\\". $itemResult["img"]."\" height=\"75\" width=\"75\"/></td>";
                    echo "<td class=\"itemSetup\"><form action=\"myShop.php\" method=\"post\"><input type=\"submit\" value=\"&#128722\"/><input type=\"hidden\" name=\"pickedUserItem\" value=\"". $itemResult["Item_ID"]."\"></form></td>";
                    echo "</tr>";
                }

                $itemFillConn->close();
            ?></table>
        
        
        <a href="userCart.php">Show Cart</a>

        
    </body>
</html>
<?php
//Add conditional to see if the user has logged in
    $serializedCart = serialize($shopCart);
    file_put_contents('includes/cart.txt', $serializedCart);
?>