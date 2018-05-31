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

    include_once("includes/aShopCart.php");
    $shopCart = new aShopCart();
    $shopCart->showItems();
?>