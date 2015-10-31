<?php
//File Description:  PHP Process for Database connection string

//session_start();
	 $username = "root";
     $password = "";
     $hostname = "localhost";
	 
	//connect to database ["hostingweb","hostname","password","databasename"
	$mysqli=mysqli_connect($hostname,$username,$password,"crowdfunding");
	
	// Check connection
	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
 	}
	
?>
