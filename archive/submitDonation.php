<?php

session_start();
include("db.php");

$userEmail = $_SESSION["emailtxt"];
$projectID = $_POST["projectID"];
$currency = $_POST["currency"];
$amount1 = $_POST["amount"];
$conversion = "1";

if($currency=="AUD")
$conversion="0.71";

if($currency=="CAN")
$conversion="0.76";

if($currency=="CHF")
$conversion="1.01";

if($currency=="EUR")
$conversion="1.10";

if($currency=="GBP")
$conversion="1.55";

if($currency=="INR")
$conversion="0.015";

if($currency=="JPY")
$conversion="0.0083";

if($currency=="KRW")
$conversion="0.00088";

if($currency=="NZD")
$conversion="0.68";

if($currency=="RMB")
$conversion="0.16";

if($currency=="SGD")
$conversion="0.71";

if($currency=="USD")
$conversion="1";

$amount2 = $amount1*$conversion;

$query = "INSERT INTO `donate` (`userEmail`, `projectID`, `amount`) VALUES ('$userEmail', '$projectID', '$amount2')";
$success= mysqli_query($mysqli,$query) or die (mysqli_error($mysqli)); 
if($success==1){
		echo "<script language='javascript'>";
		echo "alert('Successful Donation!');";
		echo "window.location.href='../CS2102/displayProject.php?id=".$projectID."';";
		echo "</script>"
;
}

?>