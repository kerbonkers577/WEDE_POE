<?php
  /*Name: Tristan
	Surname: Constable
	Student#: 16002749
	Title of Project
	Declaration: This is my own work and
  any code obtained from other sources
  will be referenced
	*/

	include("DBConn.php");

	$users = file("includes/users.txt");



	//Connection object
	$myConn = connect();
	//echo echoHostInfo($myConn);
	$selectResult = query($myConn, "SELECT * from tbl_User");

	if($selectResult !== null)
	{
		//echo "\ntable exists\n";

		query($myConn, "DROP TABLE IF EXISTS tbl_User");
		query($myConn, "CREATE TABLE tbl_User(
															ID				INT(3) NOT NULL AUTO_INCREMENT,
															FName			VARCHAR(50),
															LName			VARCHAR(50),
															Email			VARCHAR(100),
															Password	VARCHAR(100),
															PRIMARY KEY (ID)
															)");

		$recreated = query($myConn, "SELECT * from tbl_User");
		if($recreated !== null)//Checks if new database creation was successful
		{
			//echo "Recreation successful";
			foreach ($users as $value)
			{//Populates database
				echo "<pre>";
				$user = explode(",",$value);
				//echo $user[0]." ".$user[1]." ".$user[2]." ".$user[3];
				query($myConn, "INSERT INTO tbl_user(FName,LName,Email,Password)
												VALUES ('$user[0]','$user[1]','$user[2]','$user[3]');
												");
				echo "</pre>";
			}
		}
		else
		{
			echo "Recreation Unsuccessful";
			echo $myConn->error;
		}


	}
	else
	{
		query($myConn, "CREATE TABLE tbl_User(
															ID				INT(3) NOT NULL AUTO_INCREMENT,
															FName			VARCHAR(50),
															LName			VARCHAR(50),
															Email			VARCHAR(100),
															Password	VARCHAR(100),
															PRIMARY KEY (ID)
															)");

		$recreated = query($myConn, "SELECT * from tbl_User");
		if($recreated !== null)//Checks if new database creation was successful
		{
			echo "Recreation successful";
			foreach ($users as $value)
			{//Populates database
				echo "<pre>";
				$user = explode(",",$value);
				//echo $user[0]." ".$user[1]." ".$user[2]." ".$user[3]. " " .$user[4];
				query($myConn, "INSERT INTO tbl_user(ID,FName,LName,Email,Password)
												VALUES ($user[0],'$user[1]','$user[2]','$user[3]','$user[4]');
												");
				echo "</pre>";
			}
		}
	}

	closeConnection($myConn);


?>
