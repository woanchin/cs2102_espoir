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
  <?php
  
  	$sql2 = "SELECT COUNT(following) FROM subscription WHERE following ='$emailtxt'";
	 $count=mysqli_query($mysqli,$sql2) or die('Error: ' . mysqli_error($mysqli));
	 $result = mysqli_fetch_assoc($count); 
	 $total = $result['COUNT(following)'];
  ?>
  
  <?php
  
  	$sql3 = "SELECT COUNT(userEmail) FROM subscription WHERE userEmail ='$emailtxt'";
	 $count3=mysqli_query($mysqli,$sql3) or die('Error: ' . mysqli_error($mysqli));
	 $result3 = mysqli_fetch_assoc($count3); 
	 $total3 = $result3['COUNT(userEmail)'];
  ?>

  <body data-responsejs='{ "create": [ { "prop": "width", "breakpoints": [0, 320, 481, 641, 961, 1025, 1281, 1400] }]}'>
  	<div class="wrapper">
  		<div class="container">
  			<nav class="navbar navbar-default">
  				<div class="container-fluid"> 
  					<!-- Brand and toggle get grouped for better mobile display -->
  					<div class="navbar-header">
  						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
  						<a class="navbar-brand" href="index.html">E<span>Spoir</span></a> </div>

  						<!-- Collect the nav links, forms, and other content for toggling -->
  						<div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1">
  							<ul class="nav navbar-nav">
                            <li><a href="discoverlogin.php">Discover</a></li>
                    <li class="active"><a href="profile.php">Profile
 <span class="sr-only">(current)</span></a></li>
                    <li> <a href="createProject.php">Create Project </a></li>
                    <li> <a href="transactions.php"> Donate History </a></li>
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
  					<h4 class="pull-left">welcome <?php echo $row["firstName"] ?></h4>
  					<form method="post" action="search.php"><p class="pull-right pagination"><input type="Search" name="keyword"><input type="submit" value="Search"> &nbsp;&nbsp;&nbsp;&nbsp;  Profile</p></form>
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
    <h2>My Profile</h2>
    <p>
     			Name: <?php echo $row["lastName"]." ".$row["firstName"] ?>
                <br /><br/>
                Email: <?php echo $row["userEmail"] ?>
                <br /><br/>
                Nationality: <?php echo $row["nationality"] ?>
                <br /><br />
                Birthday: <?php echo $row["birthday"] ?>
                <br /> <br />
                Gender: <?php echo $row["gender"] ?>
                <br /><br />
                Bio: <?php echo $row["bio"] ?>
                <br />  <br />
                Followers: <a href="followers.php"><?php echo $total?></a>
                <br/><br/>
                Following: <a href="following.php"><?php echo $total3?></a>
                <br/><br/>
                <a href="editProfile.php">Edit</a>
   </p>
 </div>
 <div class="clearfix"></div>
</div>
            <div class="clearfix"></div>
          </div>
        </div>
        <div class="testimonial main">
              </div>

            </div>
          </div>
                 <div class="clearfix"></div>
               </div>
             </div>
           </div>
         </div>
       </div>

  		<div class="footer">
  			<div class="container">
  				<div class="col-sm-2">
  					<h5>Site Map</h5>
  					<ul>
  						<li><a href="">Home</a></li>
  						<li><a href="">About Us</a></li>
  						<li><a href="">Services</a></li>
  						<li><a href="">Pricing</a></li>
  						<li><a href="">Contact Us</a></li>
  					</ul>
  				</div>
  				<div class="col-sm-4 col-md-3 twitter">
  					<h5>Twitter Feed</h5>
  					<ul>
  						<li><i class="fa  fa-twitter"></i>Hello. Welcome to our Crowdfunding website. <span>http://uibrush.com</span></li>
  						<li><i class="fa  fa-twitter"></i>Hello. Welcome to our Crowdfunding website. <span>http://uibrush.com</span></li>
  					</ul>
  				</div>
  				<div class="col-md-4 testimonial">
  					<h5>Testimonial</h5>
  					<ul>
  						<li><i class="fa  fa-quote-left"></i>Lorem ipsum dolor sit amet,  adipiscing elit, sed 
  							diam  nibh euismod tincidunt ut laoreet dolore magna erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.  </li>

  						</ul>
  						<div class="t-image">
  							<img src="img/testimonial.png">
  							<h6>- Joyce He </h6><br>
  							<p>Team Lead</p>
  						</div>
  					</div>
  					<div class="col-md-3 contact-footer">
  						<div class="footer-form">
  							<h5>Contact Us</h5>
  							<input type="text" placeholder="Name">
  							<input type="text" placeholder="E-Mail">
  							<textarea placeholder="Message" rows="3"></textarea>
  							<button class="submit-bt">Send</button>
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