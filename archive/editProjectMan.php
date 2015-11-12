<?php

include("db.php");

	$name = $_POST["name"];
	$description= $_POST["description"];
	$id = $_POST["id"];
	
					// Query String
					$query = "UPDATE `project` SET `title`='$name',`description`='$description' WHERE `projectID`='$id'";
					
					
					$success= mysqli_query($mysqli,$query) or die (mysqli_error($mysqli));
					// Execute Query					
					if($success == 1){
						echo '<script language="javascript">';
						echo 'alert("Project Updated");';
						echo 'window.location.href="../CS2102/displayProject.php?id='.$id.'";';
						echo '</script>';
					}


?>