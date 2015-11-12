<?php

include("db.php");

	$Lname = $_POST["Lname"];
	$Fname= $_POST["Fname"];
	$userEmail= $_POST["userEmail"];
	$bio = $_POST["bio"];
	
					// Query String
					$query = "UPDATE `user` SET `firstName`='$Fname',`lastName`='$Lname',`bio`='$bio' WHERE `userEmail`='$userEmail'";
					
					
					$sucess= mysqli_query($mysqli,$query) or die (mysqli_error($mysqli));
					// Execute Query					
					if($sucess == 1){
						echo '<script language="javascript">';
						echo 'alert("Profile Updated");';
						echo 'window.location.href="../CS2102/profileA.php";';
						echo '</script>';
					}


?>