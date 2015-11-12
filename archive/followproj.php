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

if(isset($_GET["id"])){
	$projectID = $_GET["id"];
	$sql1 = "INSERT INTO projfollow VALUES ('$user','$projectID')";
	$success= mysqli_query($mysqli,$sql1) or die (mysqli_error($mysqli));
	if($success==1)
	{	
		echo '<script language="javascript">';
		echo 'alert("Followed Project");';
		echo 'window.location.href="../CS2102/displayProject.php?id='.$projectID.'"';
		echo '</script>';

	}
	

}

  ?>
