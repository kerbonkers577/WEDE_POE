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


    $aConnection = connect();
    echo echoHostInfo($aConnection);
    

    $orderQuery = "INSERT INTO tbl_order
                    VALUES (null, ".$_SESSION["userID"].")";

    query($aConnection, $orderQuery);
    //Get last order insert id to act as order_item Order_id
    closeConnection($aConnection);
    session_destroy();
	?>