<?php
  /*Name: Tristan
	Surname: Constable
	Student#: 16002749
	Title of Project
	Declaration: This is my own work and
	  any code obtained from other sources
	  will be referenced
*/
	//error_reporting(0);

	function connect()
	{
		$myConn = new mysqli("127.0.0.1", "root", "", "wede_task_2");

		if($myConn->connect_errno)
		{
			echo "<pre>Connection failed\n</pre>";
			echo $myConn->connect_error;
		}
		return $myConn;
	}

	function echoHostInfo($Conn)
	{
		return $Conn->host_info;
	}

	function query($Conn, $query)
	{
		return $Conn->query($query);
	}

	function closeConnection($Conn)
	{
		$Conn->close();
		return "Connection Closed";
	}


?>
