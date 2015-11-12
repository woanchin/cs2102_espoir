<?php

include("db.php");

	$name = $_POST["name"];
	$description= $_POST["description"];
	$id = $_POST["id"];
	if (isset($_POST["startdate"])) {
		$startdate = $_POST["startdate"];
	}

	if(isset($_POST["enddate"])) {
		$enddate = $_POST["enddate"];	
	}	
	
					// Query String
					if (isset($_POST["startdate"]) && isset($_POST["enddate"])) {
						$query = "UPDATE `project` SET `title`='$name',`description`='$description', `startDate`='$startdate', `endDate`='$enddate' WHERE `projectID`='$id'";
					} else if (isset($_POST["startdate"])) {
						$query = "UPDATE `project` SET `title`='$name',`description`='$description', `startDate`='$startdate' WHERE `projectID`='$id'";
					} else if (isset($_POST["enddate"])) {
						$query = "UPDATE `project` SET `title`='$name',`description`='$description', `endDate`='$enddate' WHERE `projectID`='$id'";
					} else {
						$query = "UPDATE `project` SET `title`='$name',`description`='$description' WHERE `projectID`='$id'";
					} 
					
					$success= mysqli_query($mysqli,$query) or die (mysqli_error($mysqli));
					// Execute Query					
					if($success == 1){
						echo '<script language="javascript">';
						echo 'alert("Project Updated");';
						echo 'window.location.href="../CS2102/viewAllProjects.php";';
						echo '</script>';
					}


?>