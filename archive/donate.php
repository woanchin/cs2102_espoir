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
	$emailtxt = "siqi940@gmail.com"; // hardcode
	
	
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

$projectID = "200001"; // hardcode
$sql2 = "SELECT * FROM project WHERE projectID = '$projectID'";
$result2=mysqli_query($mysqli,$sql2);
$rowcount2 = mysqli_num_rows($result2);
$row2= mysqli_fetch_array($result2,MYSQLI_ASSOC);

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
                    <li class="active"><a href="index.html">Profile</a>
 <span class="sr-only">(current)</span></a></li>
                    <li><a href="create.html">My Projects</a></li>
                    <li> <a href="loginreg.html">My Settings</a></li>
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
  					<h4 class="pull-left">Donation..</h4>
  					<form method="post" action="search.php"><p class="pull-right pagination"><input type="search" name="keyword" /><input type="submit" value="Search" /> &nbsp;&nbsp;&nbsp;&nbsp;  Donate</p></form>
  				</div>
  			</div>
  		</div>
  		<!-- inner-head end -->
        <div class="inner-page services">
 <div class="container">
   <h2>Project:  <?php echo $row2["title"] ?></h2><br />
   <table><form method="post" action="submitDonation.php"><tr>
	<td>Currency: </td>
	<td><input type="hidden" value="<?php echo $projectID ?>" name="projectID" />&nbsp; &nbsp;</td>
		<td><select name="currency">
                                      <option value="">Currency...</option>
                                      <option value="AUD">AUD</option>
                                      <option value="CAD">CAD</option>
                                      <option value="CHF">CHF</option>
                                      <option value="EUR">EUR</option>
                                      <option value="GBP">GBP</option>
                                      <option value="INR">INR</option>
                                      <option value="JPY">JPY</option>
                                      <option value="KRW">KRW</option>
                                      <option value="NZD">NZD</option>
                                      <option value="RMB">RMB</option>
                                      <option value="SGD">SGD</option>
                                      <option value="USD">USD</option>
                                  </select></td></tr>
	<tr><td>Amount: </td>
	<td>&nbsp; &nbsp;</td>
	<td><input type="number" name="amount" step="any" value="0.00" />&nbsp;<input type="submit" value="Donate" /></td></tr></form></table>
 <div class="clearfix"></div>
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