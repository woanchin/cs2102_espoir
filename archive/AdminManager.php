<?php
session_start();

include("db.php");


	//Store Data input into variables
	$emailtxt = $_POST["emailtxt"];
	//Secure Credential Input
	$loginPassword = $_POST["loginPassword"];
	
//select results matching to what the user has typed	
	$sql = "SELECT * FROM user WHERE userEmail = '$emailtxt' and password = '$loginPassword'";

	//check if the sql has been execute
	if ($result=mysqli_query($mysqli,$sql))
 	{
  		// Return the number of rows in result set
 		 $rowcount=mysqli_num_rows($result);
  	}
	//if the username and password matched the database, it will show the next page if not it will prompt the user to reenter his or her credentials
	if($rowcount==1)
	{	
		$_SESSION["emailtxt"] = $emailtxt;
		$_SESSION["loginPassword"] = $loginPassword;

		//Redirect link				
		header("location:../CS2102/profile.php");
	}
	
	else 
	{
		//ERROR Message and Redirect Link
		echo '<script language="javascript">';
		echo 'alert("Wrong username/password");';
		echo 'window.location.href="../CS2102/loginreg.php";';
		echo '</script>';
		
	}

?>