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
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"><span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                        <a class="navbar-brand">E<span>Spoir</span></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="discoverlogin.php">Discover</a></li>
                            <li><a href="profile.php">Profile<span class="sr-only">(current)</span></a></li>
                            <li><a href="createProject.php">Create Project </a></li>
                            <li class="active"><a href="viewOwnProject.php">My Project </a></li>
                            <li><a href="projfollist.php">Projects Followed</a></li>
                            <li><a href="transactions.php">Donate History </a></li>
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
                <form method="post" action="search.php">
                    <h4 class="pull-right pagination">&nbsp Project</h4>
                    <p class="pull-right pagination">
                        <input type="Search" name="keyword"><input type="submit" value="Search"></p>

                </form>
            </div>
        </div>
    </div>
    <!-------->
    <div class="container">
        <div class="our-works">
            <div class="header-intro">
                <h2>My Project</h2>
                <p>Things do not happen things are made to happen</p>
            </div>
            <?php


include("db.php"); 

$sql = "SELECT title, projectID, categories FROM project WHERE userEmail = '$emailtxt' ";
$result = mysqli_query($mysqli, $sql);

if (mysqli_num_rows($result)>0) {
	$i = 1;
	while($row = mysqli_fetch_assoc($result)) {
		echo "<div class="."col-sm-4".">
        <div class="."portfolio-img-wrap".">
          <img src="."img/portfolio$i.jpg".">
          <div class="."caption-container".">
           <div class="."portfolio-caption".">
               <h5><a href="."displayProject.php?id=".$row["projectID"].">".$row["title"]."</a></h5>
               <p>- &nbsp; ".$row["categories"]."</p>
           </div>
       </div>
       </div>
		</div>";
		$i++;
        if($i == 8){$i = 1;}
	}
} else {
	?>
            <a href='createProject.php' style="font-size: large; text-decoration: underline; text-transform: uppercase;">You do not have any project! Create one now!</a>
            <?php
}
?>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- works end -->
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
        $(function () {
            $(".rslides").responsiveSlides();
        });
    </script>
</body>
</html>
