<?php
session_start();

include("db.php");

	//Store Data input into variables
	$emailtxt = $_POST["emailtxt"];
	$projectID = $_POST["projectID"];
    $content = $_POST["content"];
	
    // Query String
	echo $projectID;
    $query = "INSERT INTO `comment` (`projectID`,`userEmail`, `content`) VALUES ($projectID,'$emailtxt','$content')";	
    
    
    $sucess= mysqli_query($mysqli,$query) or die (mysqli_error($mysqli));
    // Execute Query					
    if($sucess == 1){
        echo "<script language='javascript'>;
         alert('Comment added');
         window.location.href='../CS2102/comment.php?projectID=$projectID';
         </script>";
    }

?>