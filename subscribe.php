<?php
session_start();

if (!isset($_SESSION["emailtxt"]) && !isset($_SESSION["loginPassword"])){
	header("location:loginreg.php");
}
?>
<?php 
    include("db.php");  
	
	$emailtxt = $_SESSION["emailtxt"];
	$user = $emailtxt;

if(isset($_GET["userEmail"])){
	$userEmail = $_GET["userEmail"];
	$sql2 = "INSERT INTO subscription VALUES ('$user','$userEmail')";
	$success= mysqli_query($mysqli,$sql2) or die (mysqli_error($mysqli));
	if($success==1)
	{	
		echo '<script language="javascript">';
		echo 'alert("Followed User");';
		echo 'window.location.href="../CS2102/viewProfile.php?userEmail='.$userEmail.'"';
		echo '</script>';

	}
	

}

  ?>
