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

    <style type="text/css">
        .auto-style1 {
            height: 45px;
        }
        .auto-style2 {
            width: 70%;
            height: 45px;
        }
    </style>

</head>

<?php 
    include("db.php");  

    //Store Data input into variables
    $emailtxt = $_SESSION["emailtxt"];
    $messageEmail = $_GET["emailtxt"];
	
    //select results matching to what the user has typed	
    $sql = "SELECT * FROM user WHERE userEmail = '$emailtxt'";
    $message = mysqli_query($mysqli, "SELECT * FROM message WHERE (senderEmail = '$emailtxt' AND receiverEmail = '$messageEmail') OR (receiverEmail = '$emailtxt' AND senderEmail = '$messageEmail') ORDER BY projectID, dateTime ASC ");
    $topic = mysqli_query($mysqli, "SELECT projectID FROM message WHERE (senderEmail = '$emailtxt' AND receiverEmail = '$messageEmail') OR (receiverEmail = '$emailtxt' AND senderEmail = '$messageEmail') GROUP BY projectID");

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
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"><span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                        <a class="navbar-brand" href="index.html">E<span>Spoir</span></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="index.html">Profile</a>
                                <span class="sr-only">(current)</span></a></li>
                            <li><a href="create.html">My Projects</a></li>
                            <li><a href="loginreg.html">My Settings</a></li>
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
                <form method="post" action="search.php">
                    <p class="pull-right pagination">
                        <input type="search" name="keyword" /><input type="submit" value="Search" />
                        &nbsp;&nbsp;&nbsp;&nbsp;
                    </p>
                </form>
            </div>
        </div>
    </div>
    <!-- inner-head end -->
    <div class="inner-page services">
        <div class="container">
                <div class="inner-page contact-us">
                    <div class="header-intro">
                    <h2>Send Message</h2>
                        </div>
                    <table style="width: 80%; margin:0 auto; height: 85px;">
                        <thead>
                            <tr>
                                <td class="auto-style1">Topic</td>
                                <td class="auto-style1">Time</td>
                                <td class="auto-style2">Message</td>
                                <td class="auto-style1">Message By</td>
                            </tr>
                        </thead>
                        <tbody style="padding: 10px; margin: 10px">
                            <?php 
                            if($message == FALSE){
                                    die(mysqli_error());
                                }
                            while($row = mysqli_fetch_array($message,MYSQLI_ASSOC)) { 
                            ?>
                            <tr>
                                <?php 
                                $project = $row['projectID'];
                                $pjt = mysqli_query($mysqli,"SELECT * FROM project WHERE projectID = '$project'");
                                $projectDetail = mysqli_fetch_array($pjt,MYSQLI_ASSOC);
                                ?>
                                <td style="padding-top: 10px; padding-bottom: 10px; margin-top: 10px; margin-bottom: 10px;"><?php echo $projectDetail['title']?></td>
                                <td style="padding-top: 10px; padding-bottom: 10px; margin-top: 10px; margin-bottom: 10px;"><?php echo $row['dateTime']?></td>
                                <td style="padding-top: 10px; padding-bottom: 10px; margin-top: 10px; margin-bottom: 10px;"><?php echo $row['content']?></td>
                                <?php 
                                    $email = $row['senderEmail'];
                                    $user = mysqli_query($mysqli,"SELECT * FROM user WHERE userEmail = '$email'");
                                    $userDetail = mysqli_fetch_array($user,MYSQLI_ASSOC);
                                ?>
                                <td style="padding-top: 10px; padding-bottom: 10px; margin-top: 10px; margin-bottom: 10px;"><?php echo $userDetail["lastName"]." ".$userDetail["firstName"]?></td>
                            </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                    <br />
                    <div class="clearfix"></div><br />
                    <form action="messageManager.php" method="post" style="width: 80%; margin:0 auto">
                        <input name="senderEmail" type="hidden" value="<?php echo $_SESSION["emailtxt"]?>"/>
                        <input name="receiverEmail" type="hidden" value="<?php echo $_GET["emailtxt"]?>"/>
                        Topic: <select name="topic">
                            <?php 
                            if($topic == FALSE){
                                    die(mysqli_error());
                                }
                            while($row = mysqli_fetch_array($topic,MYSQLI_ASSOC)) { 
                                $project = $row['projectID'];
                                $pjt = mysqli_query($mysqli,"SELECT * FROM project WHERE projectID = '$project'");
                                $projectDetail = mysqli_fetch_array($pjt,MYSQLI_ASSOC);
                                ?>
                                <option value="<?php echo $row['projectID']?>"> <?php echo $projectDetail['title']?></option>
                            <?php } ?>
                        </select> 
                        <br />
                        <br />
                        <textarea name="content" cols="30" rows="10" placeholder="Message"></textarea><br />
                        <input type="submit" name="submitBtn" id="submitBtn" value="Send!">
                    </form>
                    <br />
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>

    <!---->
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
                    <h6>- Joyce He </h6>
                    <br>
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
