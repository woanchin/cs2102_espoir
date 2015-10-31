<?php

session_start();
include("db.php");

$userEmail = $_SESSION["emailtxt"];
$projectID = $_POST["projectID"];
$currency = $_POST["currency"];
$amount = $_POST["amount"];

$query = "INSERT INTO `donate` (`userEmail`, `projectID`, `amount`, `currency`) VALUES ('$userEmail', '$projectID', '$amount', '$currency')";
$success= mysqli_query($mysqli,$query) or die (mysqli_error($mysqli)); 
if($success==1){
	echo '<script language="javascript">';
	echo 'alert("Sucessful Donation!");';
	echo 'window.location.href="../CS2102/displayProject.php?projectID=$projectID";';
	echo '</script>';
}

?>