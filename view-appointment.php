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

 if(isset($_POST['submit']))
  {
    
    $cid=$_GET['viewid'];
      // $remark=$_POST['remark'];
      // $status=$_POST['status'];
     	$view1=1;
    
     
   $query=mysqli_query($con, "update  tblappointment set View='1' where ID='$cid'");
    if ($query) {
    	echo "<script>window.location.href='all-appointment.php'</script>";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  
}


?>
<!DOCTYPE HTML>
<html>
<head>
<title>AMM || View Appointment</title>

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
    background-size: cover;">


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
					<h3 class="title1">View Appointment</h3>
					
					
				
					<div class="table-responsive bs-example widget-shadow">
						<p style="font-size:16px; color:lime;" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
			<?php
$cid=$_GET['viewid'];
$ret=mysqli_query($con,"select * from tblappointment where ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
				<h4>Hello <?php  echo $row['Name'];?> !</h4>

				<p>
					
					Thank you for requesting an appointment. We appreciate your patience and we are working very hard to reserve all appointments quickly and efficiently. Just wait for the confirmation message sent via email.
					<br><br>
					 If you need immediate assistance please call this number <a href=""> 09123011232 </a>. We will be in contact with you shortly.
			</p>
			<br>




						<table class="table table-bordered">
							<tr>
    <th>Appointment Number</th>
    <td><?php  echo $row['AptNumber'];?></td>
  </tr>
    <tr>
    <th>Services</th>
    <td><?php  echo $row['Services'];?></td>
  </tr>
   <tr>
    <th>Appointment Date</th>
    <td>
    	<?php  
    	$aptdate=$row['AptDate'];
    	$date=date_create("$aptdate");
			echo date_format($date,"F j, Y");
    	?>
    	
    </td>
  </tr>
 
<tr>
    <th>Appointment Time</th>
    <td><?php 

    $time=$row['time'];
		$newDateTime = date('h:i A', strtotime($time));
    echo $newDateTime;

  	?>
  		

  	</td>
  </tr>
  
<tr>
    <th>Doctor</th>
    <?php

    $doc=$row['doctors'];

    if(empty($doc)){ ?>

    	<td style="color:#ff6767; font-weight: bold;">pending</td>

    <?php } else {?>

    <td style="color: #00db00; font-weight: bold;"><?php  echo $row['doctors'];?></td>

  <?php } ?>
  </tr>


  <tr>
    <th>Status</th>
   <?php


if(empty($row['Status']))
{ ?>

	<td style="color:#ff6767; font-weight: bold;">pending</td>
  
  <?php
}
    
if($row['Status']=="1")
{ ?>

	<td style="color:#00db00; font-weight: bold;">Accepted</td>

<?php }

if($row['Status']=="2")
{ ?>
  
  <td style="color:#ff6767; font-weight: bold;">Rejected</td>

<?php }

     ;?></td>
  </tr>


						</table>


						<table class="table table-bordered">
							<?php if($row['Remark']==""){ ?>


<form name="submit" method="post" enctype="multipart/form-data"> 



  <tr align="center">
    <td colspan="2">
    	<button type="submit"  name="submit" class="btn btn-az-primary pd-x-20" style="width: 200px;
    background: #337ab7;
    color: white;">Ok</button></td>
  </tr>
  </form>
<?php } else { ?>
						</table>
						<table class="table table-bordered">
							<tr>
    <th>Remark</th>
    <td><?php echo $row['Remark']; ?></td>
  </tr>


<tr>
<th>Remark date</th>
<td><?php echo $row['RemarkDate']; ?>  </td></tr>

						</table>
						<?php } ?>
						<?php } ?>
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