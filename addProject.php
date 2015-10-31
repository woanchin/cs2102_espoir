<?php
//session_start();
//Database Connection String
include("db.php");

$userEmail = "siqi940@gmail.com";
$title = $_POST["projecttitle"];
$description = $_POST["description"];
$startDate = $_POST["startdate"];
$duration = $_POST["days"];
$categories = $_POST["category"];
$currency = $_POST["currency"];
$fundsCollected = 0;
$picSrcData = "";

/* not able to read the uploaded image successfully
$uploadOk = 1;

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["picSrc"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check file size
if ($_FILES["picSrc"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

if ($_FILES["picSrc"]["size"] == 0) {
    echo "Sorry, your file is empty.";
    $uploadOk = 0;
}

// Allow certain file formats
$picSrcName = $_FILES["picSrc"]["name"];
$imageFileType = end(explode(".", $picSrcName));
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} 
else { // if everything is ok, try to upload file
  $picSrcData = mysql_read_escape_string(file_get_contents($_FILES["picSrc"]["tmp_name"]));
  echo "got file content...";
}


$sql = "INSERT INTO project (userEmail, title, description, fileSrc, startDate, duration, categories, currency, fundsCollected) VALUES ('$userEmail', '$title', '$description', '$picSrcData', '$startDate', $duration, '$categories', '$currency', $fundsCollected)";
*/

$sql = "INSERT INTO project (userEmail, title, description, startDate, duration, categories, currency, fundsCollected) VALUES ('$userEmail', '$title', '$description', '$startDate', $duration, '$categories', '$currency', $fundsCollected)";

if ($mysqli->query($sql) === TRUE) {
    //Redirect link				
    header("location:addSuccess.html");
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$mysqli->close();
    ?>