<?php
session_start();

include("db.php");

	//Store Data input into variables
    $senderEmail = $_POST["senderEmail"];
	$receiverEmail = $_POST["receiverEmail"];
    $projectID= $_POST["topic"];
    $content = $_POST["content"];
	
    // Query String
    $query = "INSERT INTO `message` (`projectID`,`senderEmail`, `receiverEmail`, `content`) VALUES ('$projectID','$senderEmail','$receiverEmail', '$content')";	
    
    
    $sucess= mysqli_query($mysqli,$query) or die (mysqli_error($mysqli));
    // Execute Query					
    if($sucess == 1){
        echo "<script language='javascript'>;
         alert('Comment added');
         window.location.href='../CS2102/addMessage.php?emailtxt=$receiverEmail';
         </script>";
    }

?>