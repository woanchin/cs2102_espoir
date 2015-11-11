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
	$id = $_GET["id"];
	$sql2 = "DELETE FROM projfollow WHERE userEmail = '$user' AND  projectID = '$id'";
	$success= mysqli_query($mysqli,$sql2) or die (mysqli_error($mysqli));
	if($success==1)
	{	
		echo '<script language="javascript">';
		echo 'alert("UnFollowed Project");';
		echo 'window.location.href="../CS2102/displayProject.php?id='.$id.'"';
		echo '</script>';

	}
	

}

  ?>
