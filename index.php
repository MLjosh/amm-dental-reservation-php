<?php session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit'])){

	    $name=$_POST['name'];
    $email=$_POST['email'];
    $comments=$_POST['comments'];



	// code for check server side validation
	if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0){ 

// Captcha verification is incorrect.	
echo '<script>alert("Captcha eror! Try Again.")</script>';

	}else{// Captcha verification is Correct. Final Code Execute here!	

						$query=mysqli_query($con,"insert into tblcomments(Name,Email,Comments) value('$name','$email','$comments')");
    				if ($query) {
    				echo '<script>alert("Your message has been sent!")</script>';

			}	else{
				echo '<script>alert("Error connection to the server.")</script>';
			}

	}
}	
?>






<!doctype html>
<html class="no-js" lang="en">

    <head>
        <!-- META DATA -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		
		

        <!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">
		
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
		
		<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
		
        <!-- TITLE OF SITE -->
        <title>AMM Dental Group</title>

        <!-- for title img -->
		<link rel="shortcut icon" type="image/icon" href="assets/images/logo/favicon.png"/>
       
        <!--font-awesome.min.css-->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!--linear icon css-->
		<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
		
		<!--animate.css-->
        <link rel="stylesheet" href="assets/css/animate.css">
		
		<!--hover.css-->
        <link rel="stylesheet" href="assets/css/hover-min.css">
		
		<!--vedio player css-->
        <link rel="stylesheet" href="assets/css/magnific-popup.css">

		<!--owl.carousel.css-->
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
		<link href="assets/css/owl.theme.default.min.css" rel="stylesheet"/>


        <!--bootstrap.min.css-->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- bootsnav -->
		<link href="assets/css/bootsnav.css" rel="stylesheet"/>	
        
        <!--style.css-->
        <link rel="stylesheet" href="assets/css/style.css">
        
        <!--responsive.css-->
        <link rel="stylesheet" href="assets/css/responsive.css">


        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		
        <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->


        	        		<script type='text/javascript'>
function refreshCaptcha(){
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>

    </head>
	
	<body>
		<!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

		
		
		
		<!--menu start-->
		<section id="menu">
			<div class="container">
				<div class="menubar">
					<nav class="navbar navbar-default">
					
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="index.php">
								<img src="assets/images/logo/logo.png" alt="logo">
							</a>
						</div><!--/.navbar-header -->

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right">
								<li class="active"><a href="index.php">Home</a></li>
								<li><a href="about.php">About</a></li>
								<li><a href="service.php">Service</a></li>
								<li><a href="team.php">Team</a></li>
								<li><a href="contact.php">Contact</a></li>
								<li><a href="login.php" style="background: #ff2581; text-align: center; padding: 15px; margin-left: 10px; color: white;">RESERVE NOW</a></li>
								<li class="search">
									<form action="">
										<input type="text" name="search" placeholder="Search....">
										<a href="#">
											<span class="lnr lnr-magnifier"></span>
										</a>
									</form>
								</li>
							</ul><!-- / ul -->
						</div><!-- /.navbar-collapse -->
					</nav><!--/nav -->
				</div><!--/.menubar -->
			</div><!-- /.container -->

		</section><!--/#menu-->
		<!--menu end-->
		

		<!-- header-slider-area start -->
		<section class="header-slider-area">
			<div id="carousel-example-generic" class="carousel slide carousel-fade" data-ride="carousel">
			
			  <!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-example-generic" data-slide-to="1"></li>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<div class="single-slide-item slide-1">
							<div class="container">
								<div class="row">
									<div class="col-sm-12">
										<div class="single-slide-item-content">
											<h2>Welcome to <br> AMM Dental Group</h2>
											<p>
												We value our patient’s comfort, that’s why we strive to make every visit as relaxing and pleasant as possible for our patients
											</p>
											<button type="button" class="slide-btn" onclick="location.href='login.php';">
											Reserve Now
											</button>
											
											
										</div><!-- /.single-slide-item-content-->
									</div><!-- /.col-->
								</div><!-- /.row-->
							</div><!-- /.container-->
						</div><!-- /.single-slide-item-->
					</div><!-- /.item .active-->
					<div class="item">
						<div class="single-slide-item slide-2">
							<div class="container">
								<div class="row">
									<div class="col-sm-12">
										<div class="single-slide-item-content">
											<h2>Welcome to <br> AMM Dental Group</h2>
											<p>
												Our team of well-trained dentists and oral health care practitioners work in tandem to administer the best oral hygiene care and dental treatment that is appropriate to your current health condition.
											</p>
											<button type="button" class="slide-btn" onclick="location.href='login.php';">
											Reserve Now
											</button>
										</div><!-- /.single-slide-item-content-->
									
									</div><!-- /.col-->
								</div><!-- /.row-->
							</div><!-- /.container-->
						</div><!-- /.single-slide-item-->
					</div><!-- /.item .active-->
				</div><!-- /.carousel-inner-->

				<!-- Controls -->
				<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					<span class="lnr lnr-chevron-left"></span>
				</a>
				<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
					<span class="lnr lnr-chevron-right"></span>
				</a>
			</div><!-- /.carousel-->

		</section><!-- /.header-slider-area-->
		<!-- header-slider-area end -->
		
		<!--we-do start -->
		<?php include('extendwedo.php') ?>
		<!--we-do end-->
		

		<!--about-us start -->
		<section class="about-us">
			<div class="container">
				<div class="about-us-content">
					<div class="row">
						<div class="col-sm-6">
							<div class="single-about-us">
								<div class="about-us-txt">
									<h2>about us</h2>
									<p>
										AMM DENTAL CLINIC is committed to helping people have excellent oral health and bringing out the best in your smile by offering top-notch dental services to our patients. AMM Dental Clinic started off as a small family business. We have seen huge successes over the years through hard work, dedication, and the impeccable service we give to our clients. AMM Dental Clinic is a full-service dental clinic offering general, preventive, and cosmetic dental services. We pride ourselves in providing an advanced yet compassionate approach to oral health care.
									</p>
									<div class="project-btn">
										<a href="about.php"  class="project-view">learn more
										</a>
									</div><!--/.project-btn-->
								</div><!--/.about-us-txt-->
							</div><!--/.single-about-us-->
						</div><!--/.col-->
						<div class="col-sm-6">
							<div class="single-about-us">
								<div class="about-us-img">
									<img src="assets/images/about/about-part.jpg" alt="about images">
								</div><!--/.about-us-img-->
							</div><!--/.single-about-us-->
						</div><!--/.col-->
					</div><!--/.row-->
				</div><!--/.about-us-content-->
			</div><!--/.container-->

		</section><!--/.about-us-->
		<!--about-us end -->

		<!--service start-->
		<?php include('extendservice.php') ?>
		
		<!--service end-->



		<!--team start -->
		<?php include('extendteam.php') ?>
		<!--team end-->
	

		<!-- testemonial Start -->
		<?php include('extendtestimonials.php') ?>
		<!-- testemonial End -->



		<!--contact start-->
		<?php include('extendcontact.php') ?>
		<!--/.contact-->
		
		<!-- footer-copyright start -->
		<?php include('footer.php') ?>
		<!-- footer-copyright end -->



		<!-- jaquery link -->

		<script src="assets/js/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        
        <!--modernizr.min.js-->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		
		
		<!--bootstrap.min.js-->
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
		
		<!-- bootsnav js -->
		<script src="assets/js/bootsnav.js"></script>
		
		<!-- for manu -->
		<script src="assets/js/jquery.hc-sticky.min.js" type="text/javascript"></script>

		
		<!-- vedio player js -->
		<script src="assets/js/jquery.magnific-popup.min.js"></script>


		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

        <!--owl.carousel.js-->
        <script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
		
		<!-- counter js -->
		<script src="assets/js/jquery.counterup.min.js"></script>
		<script src="assets/js/waypoints.min.js"></script>
		
        <!--Custom JS-->
        <script type="text/javascript" src="assets/js/jak-menusearch.js"></script>
        <script type="text/javascript" src="assets/js/custom.js"></script>

        <script>
function myFunction() {
  alert("Your message has been sent!");
}
</script>
		

    </body>
	
</html>



