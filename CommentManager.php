<?php
session_start();

include("db.php");

	//Store Data input into variables
	$emailtxt = $_POST["emailtxt"];
	$projectID = $_POST["projectId"];
    $content = $_POST["content"];
	
    // Query String
    $query = "INSERT INTO `comment` (`projectID`,`userEmail`, `content`) VALUES ('$projectID','$emailtxt','$content')";	
    
    
    $sucess= mysqli_query($mysqli,$query) or die (mysqli_error($mysqli));
    // Execute Query					
    if($sucess == 1){
        echo '<script language="javascript">';
        echo 'alert("Account Created");';
        echo 'window.location.href="../CS2102/comment.php";';
        echo '</script>';
    }

?>