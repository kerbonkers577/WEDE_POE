<?php
  /*Name: Tristan
	Surname: Constable
	Student#: 16002749
	Title of Project
	Declaration: This is my own work and
    any code obtained from other sources
    will be referenced
    */
    
    //write to database here
    session_start();
  
    
    include_once("includes/DBConn.php");
    include_once("includes/aShopCart.php");

    $aConnection = connect();
    
    

    $orderQuery = "INSERT INTO tbl_order
                    VALUES (null, ".$_SESSION["userID"].")";

    //Get last order insert id to act as order_item Order_id
    query($aConnection, $orderQuery);
    $orderID = $aConnection->insert_id;
    echo "<p> Your Order ID is ".$orderID."</p>";

    $userCartArray = $_SESSION['shopCart'];
    $userCart = new aShopCart();
    $userCart->setItemArray($userCartArray);
    $userCart->checkout($orderID);

    
    file_put_contents("includes/cart.txt", "");
    closeConnection($aConnection);
    session_destroy();
	?>