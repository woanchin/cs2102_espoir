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

    //Store Data input into variables
	$emailtxt = $_SESSION["emailtxt"];
	
    //select results matching to what the user has typed	
	$sql = "SELECT * FROM user WHERE userEmail = '$emailtxt'";

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

	}
	
	else 
	{
		//ERROR Message and Redirect Link
		echo '<script language="javascript">';
		echo 'alert("Wrong username/password");';
		echo 'window.location.href="../CS2102/loginreg.php";';
		echo '</script>';
		
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
            <li><a><form method="post" action="search.php"><input type="Search" name="keyword"><input type="submit" value="Search"></form></a></li>
            <li><a href="discoverlogin.php">Discover</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li> <a href="createProject.php">Create Project </a></li>
            <li><a href="projfollist.php">Projects Followed</a></li>
            <li class="active"> <a href="transactions.php"> Donate History <span class="sr-only">(current)</span></a></li>
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
      <h4 class="pull-left">how much had <?php echo $row["firstName"] ?> donated? </h4>
      <form method="post" action="search.php">
        <p class="pull-right pagination">
donation history</p>
      </form>
    </div>
  </div>
</div>
<!-- inner-head end -->
<div class="inner-page services">
  <div class="container">
    <div class="">
      <?php
	  //Database Connection String
	  include("db.php");
	  
	  //Store Data input into variables
	$emailtxt = $_SESSION["emailtxt"];

	  //Query String
	  $query = "Select donate.donateDate, donate.amount, project.title FROM donate INNER JOIN project ON donate.projectID = project.projectID WHERE donate.userEmail= '$emailtxt'";
	  
	  $query2 = "SELECT SUM(amount)  FROM donate WHERE userEmail = '$emailtxt'";

	  //Execute Query
	  $reply = mysqli_query($mysqli, $query);
	      //check if the sql has been execute
	 $money=mysqli_query($mysqli,$query2) or die(mysql_error());
	 $result = mysqli_fetch_assoc($money); 
	 $total = $result['SUM(amount)'];
?>
      <div class="col-md-6">
        <h2>Transaction History</h2>
        <p>
          <?php
	if($reply){
		?>
        <table cellspacing="5" cellpadding="5" width="200%" id="formspace">
          <tr>
            <td><strong> Date / Time </strong></td>
            <td><strong> Project Name </strong></td>
            <td><strong> Amount </strong></td>
          </tr>
          <?php
              //Generate Table from Database                          
		while ($row = $reply->fetch_object())
		{
				// set up a row for each record
				echo "<tr>";
				echo "<td>" . $row->donateDate . "</td>";
				echo "<td>" . $row->title . "</td>";
				echo "<td> USD" . $row->amount . "</td></tr>";
		}
	}

?>
          <tr>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td><strong>Total: USD$ <?php echo $total; ?></strong></td>
          </tr>
        </table>
        </p>
        <br />
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
</div>
</div>
<div class="clearfix"></div>
</div>
</div>
</div>
</div>
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