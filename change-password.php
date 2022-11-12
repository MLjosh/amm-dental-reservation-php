

<?php 
error_reporting(0);
session_start();
require "connection.php";
$email = "";
$name = "";
$errors = array();
include('includes/dbconnection.php');
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM tblcustomers WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    $fetch_info = mysqli_fetch_assoc($run_Sql);




    // //if user click change password button
    // if(isset($_POST['change-password'])){
    //     $_SESSION['info'] = "";
    //     $password = mysqli_real_escape_string($con, $_POST['password']);
    //     $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    //     if($password !== $cpassword){
    //         $errors['password'] = "Confirm password not matched!";
    //     }else{
    //         $code = 0;
    //         $email = $_SESSION['email']; //getting this email using session
    //         $encpass = password_hash($password, PASSWORD_BCRYPT);
    //         $update_pass = "UPDATE usertable SET code = $code, password = '$encpass' WHERE email = '$email'";
    //         $run_query = mysqli_query($con, $update_pass);
    //         if($run_query){
    //             $info = "Your password changed successfully!";
    //             $_SESSION['info'] = $info;
    //             header('Location: change-password.php');
    //         }else{
    //             $errors['db-error'] = "Failed to change your password!";
    //         }
    //     }
    // }
    
    ?>

<!DOCTYPE HTML>
<html>
<head>
<title>AMM | Change Password</title>

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
<script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
} 

</script>
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
					<h3 class="title1">Change Password</h3>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Reset Your Password :</h4>
						</div>
						<div class="form-body">
							<form method="post" method="POST" autocomplete="off">
								<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>

  <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>



							 <div class="form-group" style="width: 50%;">
							 	<label for="exampleInputPassword1">New Password</label>
							 	<input type="password" name="password" class="form-control" value="" required="true" style="text-align: center;">
							 </div>
							 <div class="form-group" style="width: 50%;">
							 	<label for="exampleInputPassword1">Confirm Password</label>
							 	<input type="password" name="cpassword" class="form-control" value="" required="true" style="text-align: center;">
							 </div>
							  <button type="submit" name="change-password" value="Change" class="btn btn-default">Change</button>
							</form> 
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

<?php } ?>