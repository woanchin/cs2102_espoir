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
<link href="css/flexslider.css" rel="stylesheet">
<link href="css/mixit.css" rel="stylesheet">
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
          <a class="navbar-brand">E<span>Spoir</span></a> </div>
        
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="discoverlogin.php">Discover </a></li>
            <li><a href="profile.php">Profile</a></li>
            <li class="active"> <a href="createProject.php">Create Project <span class="sr-only">(current)</span></a></li>
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
      <h4 class="pull-left">services</h4>
      <p class="pull-right pagination"><a href="index.html">home</a><span>></span><a href="">services</a></p>
    </div>
  </div>
</div>
<!-- inner-head end -->
<div class="inner-page services">
  <div class="container">
    <div class="">
      <div class="col-md-6 no-padding-left"> <img src="img/about_us.jpg"> </div>
      <div class="col-md-6">
        <h2>Our Service</h2>
        <p> Espoir helps artists, musicians, filmmakers, designers, and other creators find the resources and support they need to bring their creative ideas to life. <br />
          <br />
          We provide a platform that gives you space to work with people who support you. </p>
      </div>
      <div class="clearfix"></div>
    </div>
    <p>&nbsp;</p>
    <div class="inner-page about-us">
      <div class="container">
        <div class="col-md-6 no-padding-left">
          <h2>Start a Project</h2>
          <form name="createProjForm" action="addProject.php" method="post" enctype="multipart/form-data">
            <div>
              <label for="category">Select a Category : </label>
              <select name="category">
                <option value="">Categories...</option>
                <option value="Art">Art</option>
                <option value="Charity">Charity</option>
                <option value="Dance & Music">Dance & Music</option>
                <option value="Design & Innovation">Design & Innovation</option>
                <option value="Education">Education</option>
                <option value="Fashion">Fashion</option>
                <option value="Film">Film</option>
                <option value="Games">Games</option>
                <option value="Gourmet">Gourmet</option>
                <option value="Health">Health</option>
                <option value="Photography">Photography</option>
                <option value="Sports">Sports</option>
                <option value="Technology">Technology</option>
              </select>
            </div>
            <br />
            <div>
              <label for="projecttitle">Project Title : </label>
              <input name="projecttitle" type="text" />
            </div>
            <div>
              <label for="picSrc">Upload a Picture: </label>
              <input id="picSrc" name="test" type="file" accept="image/*" required />
            </div>
            <br />
            <div>
              <label> Description : </label>
              <textarea name="description" cols="20" rows="5"></textarea>
            </div>
            <div>
              <label for="start date">Start Date : </label>
              <input type="date" name="startdate" id="start date">
            </div>
            <br />
            <div>
              <label for="duration">Duration : </label>
              <input type="text" name="days" id="days" placeholder="Days" style="width:100px!important;height:25px" />
            </div>
            <div>
              <label for="currency">Select a Currency : </label>
              <select name="currency">
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
              </select>
            </div>
            <br />
            <div>
              <input type="submit" name="submit" id="createProjBtn" value="Create Now!">
            </div>
          </form>
        </div>
        <div class="col-md-6"> <img src="img/what_we_do.jpg"> </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
<p>&nbsp;</p>
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
<script src="js/jquery.flexslider-min.js"></script> 
<script src="js/jquery.mixitup.js"></script> 
<script>
  $('.collapse').on('shown.bs.collapse', function(){
   $(this).parent().find(".down-icon").removeClass("down-icon").addClass("up-icon");
 }).on('hidden.bs.collapse', function(){
   $(this).parent().find(".up-icon").removeClass("up-icon").addClass("down-icon");
 });
</script> 
<script>

  $('.cd-testimonials-wrapper').flexslider({
  //declare the slider items
  selector: ".cd-testimonials > li",
  animation: "slide",
  //do not add navigation for paging control of each slide
  controlNav: false,
  slideshow: false,
  //Allow height of the slider to animate smoothly in horizontal mode
  smoothHeight: true,
  start: function(){
    $('.cd-testimonials').children('li').css({
      'opacity': 1,
      'position': 'relative'
    });
  }
});
</script> 
<script>
  $(function(){

  // Instantiate MixItUp:

  $('#Container').mixItUp();

});
</script>
</body>
</html>