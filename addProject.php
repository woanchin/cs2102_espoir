<?php

session_start();
include("db.php");

$emailtxt = $_SESSION["emailtxt"];
$userEmail = $emailtxt;
$title = $_POST["projecttitle"];
$description = $_POST["description"];
$startDate = $_POST["startdate"];
$duration = $_POST["days"];
$categories = $_POST["category"];
$currency = $_POST["currency"];
$fundsCollected = 0;

// prepare the image for insertion
$imgData =addslashes (file_get_contents($_FILES['test']['tmp_name']));
$filename = "img_post" . rand(1, 9) . date("YmdHis") . rand(25, 125) . rand(256, 850);
$allowed  = array(
    "image/jpeg",
    "image/pjpeg",
    "image/jpg",
    "image/png",
    "image/JPEG",
    "image/bmp",
    "image/PNG"
);

$result= UploadFile("test", $allowed, 10000000);
if ($result[0] == 0) {
    // Put Photo uploaded into sever folder
    file_put_contents("image/" . $filename . ".jpg", $result[2]);
    $date  = (String) date("Y-M-d-H:i:s");

    // Query String
    $query = "INSERT INTO `project` (`userEmail`, `title`, `description`, `fileSrc`, `startDate`, `duration`, `categories`, `currency`, fundsCollected, `picName`) VALUES ('$userEmail', '$title', '$description', '{$imgData}', '$startDate', '$duration', '$categories', '$currency', '$fundsCollected',  '$filename.jpg')";
    
    $success= mysqli_query($mysqli,$query) or die (mysqli_error($mysqli));
    // Execute Query					
    if($success == 1){
        echo '<script language="javascript">';
        echo 'alert("Project Created");';
        echo 'window.location.href="../CS2102/displayProject.php";';
        echo '</script>';
    }


} else {
    if ($result[0] == "-1")
        echo "wrong";
    if ($result[0] == "-2")
        echo "wrong file type";
    if ($result[0] == "-3")
        echo "MAximum length exceeded";
    if ($result[0] > 0)
        echo "Error due to $result";
    echo $result[0];
    echo $result;
    echo "<br/>File Upload Error!";
    
}


function UploadFile($name, $filetype, $maxlen)
{
	if (!isset($_FILES[$name]['name']))
		return array(-1,NULL,NULL);
		if (!isset($_FILES[$name]['type'], $filetype))
			return array(-2,NULL,NULL);
		if ($_FILES[$name]['size'] > $maxlen)
			return array(-3,NULL,NULL);
		if ($_FILES[$name]['error'] > 0)
			return array($_FILES[$name]['error'],NULL,NULL);
		
		$temp = file_get_contents($_FILES[$name]['tmp_name']);
		return array(0,$_FILES[$name]['type'],$temp);
	}


?>