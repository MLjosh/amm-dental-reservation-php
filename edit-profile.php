



<?php require_once "controllerUserData.php"; ?>
<?php 
error_reporting(0);
include('includes/dbconnection.php');
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM tblcustomers WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    $fetch_info = mysqli_fetch_assoc($run_Sql);




if(isset($_POST['submit']))
  {
   $name=$_POST['name'];
    $email=$_POST['email'];
    $query=mysqli_query($con, "update  usertable set name='$name',email='$email' where email='$email' ");
    $query=mysqli_query($con, "update  tblCustomers set Name='$name',Email='$email' where email='$email' ");
    header("Refresh:5");
    if ($query) {
    
    $msg="Your profile successfully Updated!";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  
}

  }
?>



<!DOCTYPE HTML>
<html>
<head>
<title><?php echo $fetch_info['Name'] ?> | Profile</title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu-push"

style="background-image: url(banner1.jpg);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;"

>
	<div class="main-content" style="background: rgba(115,112,215,.6);">
		<!--left-fixed -navigation-->
		 <?php include_once('includes/sidebar.php');?>
		<!--left-fixed -navigation-->
		<!-- header-starts -->
	 <?php include_once('includes/header.php');?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page" style="text-align: -webkit-center;">
				<div class="forms" style="width: 50%;">
					<h3 class="title1">Profile</h3>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Update Profile</h4>
						</div>
						<div class="form-body">
							<form method="post">
								<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>


							 <div class="form-group"> <label for="exampleInputEmail1">Name</label> <input type="text" class="form-control" id="name" name="name" style="width: 50%; text-align: center;" value="<?php echo $fetch_info['Name'] ?>" required="true">
							 </div>
							 <div class="form-group"> <label for="exampleInputPassword1">Email</label> <input type="text" id="email" name="email" class="form-control" style="width: 50%; text-align: center;" value="<?php echo $fetch_info['Email'] ?>" readonly='true'>
							 </div> 
							  <button type="submit" name="submit"  class="btn btn-default">Update</button> </form> 
						</div>
					</div>
				
				
			</div>
		</div>
		 <?php include_once('includes/footer.php');?>
	</div>
	<!-- Classie -->
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.js"> </script>
<!--//Download more free projects at www.mayurik.com-->
</body>
</html>
