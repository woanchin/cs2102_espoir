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
<body data-responsejs='{ "create": [ { "prop": "width", "breakpoints": [0, 320, 481, 641, 961, 1025, 1281, 1400] }]}'>
    <div class="wrapper">
        <div class="container">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                        <a class="navbar-brand" href="#">E<span>Spoir</span></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="index.html">Home <span class="sr-only">(current)</span></a></li>
                            <li><a href="loginreg.php">Register/Login</a></li>
                            <li><a href="discover.php">Discover</a>
                            <li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>
        </div>
    </div>
    <div class="slider">
        <div class="rslides_container">
            <ul class="rslides">
                <li>
                    <img src="img/slider_medium.jpg" data-min-width-1400="img/slider.jpg" alt="">
                    <div class="container">
                        <div class="caption">
                            <h1>everything</h1>
                            <h1><span>that is real was</span></h1>
                            <h1>imagined firsted</h1>
                        </div>
                    </div>
                </li>
                <li>
                    <img src="img/slider1_medium.jpg" data-min-width-1400="img/slider1.jpg" alt="">
                    <div class="container">
                        <div class="caption">
                            <h1>The power of</h1>
                            <h1><span>Imagination</span></h1>
                            <h1>make us infinite</h1>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- slider end -->
    <div class="container">
        <div class="our-works">
            <div class="header-intro">
                <h2>Discover Project</h2>
                <p>Things do not happen things are made to happen</p>
            </div>

            <?php
            include("db.php");

            $sql = "SELECT title, projectID, categories FROM project";
            $result = mysqli_query($mysqli, $sql);

            if (mysqli_num_rows($result)>0) {
            $i = 1;
            	while($row = mysqli_fetch_assoc($result) && $i<=3) {
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
	        }
        } else {
	
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