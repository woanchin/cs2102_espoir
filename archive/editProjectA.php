<?php
session_start();

if (!isset($_SESSION["emailtxt"]) && !isset($_SESSION["loginPassword"])){
	header("location:loginreg.php");
}
?>
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
    $emailtxt = $_SESSION["emailtxt"];
    $id = $_GET["id"];
    $sql = "SELECT * FROM project WHERE projectID = '$id'";

    if ($result=mysqli_query($mysqli,$sql)) {
      $rowcount=mysqli_num_rows($result);
    }
    	
    if($rowcount==1) {	
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

   	} else {
   		echo "Failure to retrieve";
   	}	
  ?>

  <body data-responsejs='{ "create": [ { "prop": "width", "breakpoints": [0, 320, 481, 641, 961, 1025, 1281, 1400] }]}'>
  	<div class="wrapper">
  		<div class="container">
  			<nav class="navbar navbar-default">
  				<div class="container-fluid"> 
  					<!-- Brand and toggle get grouped for better mobile display -->
  					<div class="navbar-header">
  						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
  						<a class="navbar-brand">E<span>Spoir</span></a> </div>

  						<!-- Collect the nav links, forms, and other content for toggling -->
  						<div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1">
  							<ul class="nav navbar-nav">
                    <li><a href="profile.php">Profile</a></li>
                    <li ><a href="viewAllUsers.php">View All Users</a></li>
                    <li class="active"><a href="viewAllProjects.php">View All Projects</a><span class="sr-only">(current)</span></li>
                    <li><a href="createNewAdmin.php">Create New Admin Account </a></li>
                    <li><a href="logout.php" id="logout">Logout</a></li>
				        </ul>
  						</div>
  						<!-- /.navbar-collapse --> 
  					</div>
  					<!-- /.container-fluid --> 
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
   <div class="col-md-6 no-padding-left">
	<img src="image/<?php echo $row["picName"]; ?>"><br /><br /><br />
    <!--<img src="image/">-->
  </div>
  <div class="col-md-6">
    <h2>Edit Project</h2>
    <form action="editProjectManA.php" method="post">
    Project Name: <input name="name" type="text" id="name" style="width:200px!important;height:25px" value="<?php echo $row["title"] ?>"> <br />
    Description: <br /><textarea name="description" cols="20" rows="2"><?php echo $row["description"] ?></textarea> <br />

    Old Start Date: <?php echo $row["startDate"] ?> <br />
    <?php 
      if($row["startDate"] > NOW()) {
    ?>
      New Start Date: <input type="date" name="startdate" id="start date" style="width:140px!important;height:25px" /> 
    <?php
      } else if($row["endDate"] <= NOW() ) {
    ?>
      Unable to change Start Date as project is ongoing!
    <?php
      } else {
        echo "Project has ended!";
      }
    ?>
    <br /><br />

    Old End Date: <?php echo$row["endDate"] ?> <br />
    New End Date: <input type="date" name="enddate" id="start date" style="width:140px!important;height:25px" /> 
    <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
    <input type="submit" name="edit" id="edit" value="Edit">
    </form><br />
 </div>
 <div class="clearfix"></div>
</div>
            <div class="clearfix"></div>
          </div>
        </div>
</div>
</div>
<div class="copyright"><div class="container">
<p>All Rights Reserved 2015 &copy; Espoir.com</p>
</div></div>
  			<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
  			<script src="js/jquery.min.js"></script> 
  			<!-- Include all compiled plugins (below), or include individual files as needed --> 
  			<script src="js/bootstrap.js"></script> 
  			<script src="js/responsiveslides.min.js"></script> 
  			<script src="js/response.min.js"></script> 
  			<script>
  				$('.collapse').on('shown.bs.collapse', function(){
  					$(this).parent().find(".down-icon").removeClass("down-icon").addClass("up-icon");
  				}).on('hidden.bs.collapse', function(){
  					$(this).parent().find(".up-icon").removeClass("up-icon").addClass("down-icon");
  				});
  			</script>
  			<script>

  			</script>
  		</body>
  		</html>