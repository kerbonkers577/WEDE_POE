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
     include_once("includes/DBConn.php");
    
    class aShopCart
    {
        private $userItems = array();

         function __construct()
         {

         }

         function setItemArray($newUserItems)
         {
            $this->userItems = $newUserItems;
         }

         function getItemArray()
         {
             return $this->userItems;
         }

         function showItems()//Will load all items from items table
         {
            
            ?>
            
            <?php
            if(isset($_POST["pickedUserItem"]))
            {
                addItem($_POST["pickedUserItem"]);
            }
            else
            {
                echo "Nope";
            }
            print_r($this->userItems);
         }

         function addItem($itemToAdd, $quantity)//Add items to users cart
         {
            $flag = false;
            $key = 0;
            foreach($this->userItems as $item => $quantity)
            {

                if($item == $itemToAdd)
                {
                    $flag = true;
                    $key = $item;
                }
            }
            if($flag == true)
            {
                $currentQty = $this->userItems[$key];
                $newQty = $currentQty + 1; 
                $this->userItems[$key] = $newQty;
                $flag = false;
                $key = 0;
                $newQty = 0;
            }
            else
            {
                $this->userItems[$itemToAdd] = $quantity;
            }
            
         }

         function showUserItems()//Shows the user their cart
         {

            $conn = connect();

            echo"</br>";
            print_r($this->userItems);
            echo "<table>";
            echo "<tr>";
            echo "<th>Item</th>";
            echo "<th>Quantity Ordered</th>";
            echo "</tr>";
            foreach ($this->userItems as $item => $quantity)
            {
                $query = "SELECT * FROM tbl_Item where Item_ID = " .$item;
                $result = mysqli_fetch_assoc(query($conn, $query));
                echo "<tr>";
                echo "<td>".$result["Item_Name"]."</td>";
                echo "<td>".$quantity."</td>";
                echo "</tr>";
            }
            echo "</table>";
         }


     }
?>