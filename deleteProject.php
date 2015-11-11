<?php

session_start();
include("db.php");

$id = $_GET["id"];
$sql = "DELETE FROM project WHERE projectID = '$id'";
mysqli_query($mysqli,$sql);
header("location:../CS2102/viewAllProjects.php");




?>