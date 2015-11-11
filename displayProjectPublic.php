<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Espoir</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/responsiveslides.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->

</head>
<?php
include("db.php");  
if (isset($_GET["id"])){
	$id = $_GET["id"];
} else {
	$id = mysqli_insert_id();
}

$sql = "SELECT * FROM project WHERE projectID = '$id'";
$donated = "SELECT SUM(`amount`) AS 'amount' FROM `donate` WHERE projectID = '$id'";
$result = mysqli_query($mysqli, $sql);

//check if the sql has been execute
	if ($result=mysqli_query($mysqli,$sql))
    {
        // Return the number of rows in result set
        $rowcount=mysqli_num_rows($result);
    }

    //if the username and password matched the database, it will show the next page if not it will prompt the user to reenter his or her credentials
	if($rowcount==1)
	{	

        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

	} else {
		echo "Fail to retrieve";
	}
	
	if ($result2=mysqli_query($mysqli,$donated))
    {
        // Return the number of rows in result set
        $rowcount2=mysqli_num_rows($result2);
    }
		if($rowcount2==1)
	{	

        $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);

	} else {
		echo "Fail to retrieve";
	}

	

?>
  <body data-responsejs='{ "create": [ { "prop": "width", "breakpoints": [0, 320, 481, 641, 961, 1025, 1281, 1400] }]}'>
  	<div class="wrapper">
  		<div class="container">
  			<nav class="navbar navbar-default">
  				<div class="container-fluid"> 
  					<div class="navbar-header">
  						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
  						<a class="navbar-brand" href="index.html">E<span>Spoir</span></a> </div>
  						<div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1">
  							<ul class="nav navbar-nav">
                            <li class="active"><a href="index.php">Discover <span class="sr-only">(current)</span></a></li>
                            <li><a href="loginreg.php">Register/Login</a></li>
                            <li>
                </ul>
  						</div> 
  					</div>
  				</nav>
  			</div>
  		</div>
  		<div class="inner-head">
  			<div class="container">
  				<div class="col-lg-12">
  					<h4 class="pull-left"><?php echo $row["title"] ?></h4>
   				</div>
  			</div>
  		</div>
  		<!-- inner-head end -->
        <div class="inner-page services">
 <div class="container">
  <div class="">
   <div class="col-md-6 no-padding-left">
	<img src="image/<?php echo $row["picName"]; ?>">
    <!--<img src="image/">-->
  </div>
  <div class="col-md-6">
    <table>
		<tr><td valign="top" width="100px" height="50px">Name: </td><td valign="top"><?php echo $row["title"] ?></td><tr>
    <tr><td valign="top" width="100px" height="50px">Description: </td><td valign="top"><?php echo $row["description"] ?></td><tr>
    <tr><td valign="top" width="100px" height="50px">Start Date: </td><td valign="top"><?php echo $row["startDate"] ?></td><tr>
    <tr><td valign="top" width="100px" height="50px">Duration of Project: </td><td valign="top"><?php echo $row["duration"] ?></td><tr>
    <tr><td valign="top" width="100px" height="50px">Categories: </td><td valign="top"><?php echo $row["categories"] ?></td><tr>
    <tr><td valign="top" width="100px" height="50px">Funds Collected: </td><td valign="top"><?php echo "\$".$row2["amount"] ?></td><tr>
   </table>   
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="testimonial main">
    </div>

    <div class="copyright">
        <div class="container">
            <p>All Rights Reserved 2015 &copy; Espoir.com</p>
        </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.js"></script>
    <script src="js/responsiveslides.min.js"></script>
    <script src="js/response.min.js"></script>
    <script>
        $('.collapse').on('shown.bs.collapse', function () {
            $(this).parent().find(".down-icon").removeClass("down-icon").addClass("up-icon");
        }).on('hidden.bs.collapse', function () {
            $(this).parent().find(".up-icon").removeClass("up-icon").addClass("down-icon");
        });
    </script>
    <script>

    </script>
</body>
</html>
