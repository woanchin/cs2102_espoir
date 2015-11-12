<?php

session_start();
include("db.php");

$id = $_GET["id"];
$sql = "DELETE FROM user WHERE userEmail = '$id'";
mysqli_query($mysqli,$sql);
header("location:../CS2102/viewAllUsers.php");




?>