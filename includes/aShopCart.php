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
        private $userItems = array();

         function __construct()
         {

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

         function addItem($itemToAdd)//Add items to users cart
         {
            //$userItems[] = $itemToAdd;
            array_push($this->userItems, $itemToAdd);
         }

         function showUserItems()//Shows the user their cart
         {
            echo"</br>";
            print_r($this->userItems);
            echo "<table>";
            echo "<tr>";
            echo "<th>Item</th>";
            foreach ($this->userItems as $item)
            {
                echo "</tr>";
                echo "<td>".$item."</td>";
                echo "</table>";
            }
         }


     }
?>