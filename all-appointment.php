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


  }
?>






<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['email']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>AMM || All Appointment</title>

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
			<div class="main-page">
				<div class="tables">
					<h3 class="title1">All Appointment</h3>
					
					
				
					<div class="table-responsive bs-example widget-shadow">
						<h4>Your Appointment:</h4>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>Appointment Number</th>
									<th>Appointment Service</th>
									<th>Appointment Date</th>
									<th>Appointment Time</th>
									<th>Attending Doctor</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>

						<?php
						$byname = $fetch_info['Email'];
						$ret=mysqli_query($con,"select * from  tblappointment where Email = '$byname'");

						$cnt=1;
						while ($row=mysqli_fetch_array($ret)) {

						?>

						 <tr>
						 	<th scope="row"><?php echo $cnt;?></th>
						 	<td><?php  echo $row['AptNumber'];?></td>
						 	<td><?php  echo $row['Services'];?></td>




						 	<td><?php  


						 	$aptdate=$row['AptDate'];
				    	$date=date_create("$aptdate");
							echo date_format($date,"F j, Y");


						 ?></td>



						 	<td><?php

						 	$time=$row['AptTime'];

							$newDateTime = date('h:i A', strtotime($time));

						 	 echo $newDateTime;
						 	?>

						 </td>



						 	 <?php

							    $doc=$row['doctors'];

							    if(empty($doc)){ ?>

							    	<td>pending</td>

							    <?php } else {?>

							    <td><?php  echo $row['doctors'];?></td>

							  <?php } ?>

							   <td> <?php


if(empty($row['Status']))
{
  echo "pending";
}
    
if($row['Status']=="1")
{
  echo "Accepted";
}

if($row['Status']=="2")
{
  echo "Rejected";
}

     ;?></td>




						 	</tr>
						 	<?php 
							$cnt=$cnt+1;
							}?>
					</tbody>
					</table> 
					</div>
				</div>
			</div>
		</div>
		<!--footer-->
		 <?php include_once('includes/footer.php');?>
        <!--//footer-->
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
<?php }  ?>