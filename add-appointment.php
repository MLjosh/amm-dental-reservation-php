

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
}else{

	header('Location: login.php');
}


?>







<?php 
// session_start();
// error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
  {


    $name=$_POST['name'];
    $email=$_POST['email'];
    $services=$_POST['services'];
    $adate=$_POST['adate'];
    $atime=$_POST['atime'];
    $aptnumber = mt_rand(100000000, 999999999);



    	$querydate=mysqli_query($con,"select * from tblappointment where AptDate='$adate' and Email='$email'");
    	$count = mysqli_num_rows($querydate);

			if ($count  > 0){


			$msg2="You have already schedule on this date";

			}else{

				$query=mysqli_query($con,"insert into tblappointment(AptNumber,Name,Email,AptDate,AptTime,Services) value('$aptnumber','$name','$email','$adate','$atime','$services')");
    				if ($query) {

    	$msg="Appointment has been sent!";


			}

// $ret=mysqli_query($con,"select AptNumber from tblappointment where Email='$email'");
// $result=mysqli_fetch_array($ret);
// $_SESSION['aptno']=$result['AptNumber']; 
// echo "<script>window.location.href='add-appointment.php'</script>";
  }
}
  
?>


<!DOCTYPE HTML>
<html>
<head>
<title>AMM Dental Group</title>

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
			<div class="main-page" style="text-align: -webkit-center;">
				<div class="tables" style="width: 50%;">
					<h3 class="title1">Add Appointment</h3>
				
					<div class="table-responsive bs-example widget-shadow">


							<?php if($msg){?>

								<p style="
						font-size:16px;
						background-color: #029302;
				    color: white;
				    padding: 10px;
				    margin-bottom: 20px;

						" align="center">

								<?php
								echo $msg; 
								?>

							</p>

							 <?php } ?>


							 <?php if($msg2){?>

								<p style="
						font-size:16px;
						background-color: #e16262;
				    color: white;
				    padding: 10px;
				    margin-bottom: 20px;

						" align="center">

								<?php
								echo $msg2; 
								?>

							</p>

							 <?php } ?>

						<h4>Make an Appointment </h4>
						    <section class="ftco-section ftco-no-pt ftco-booking">
    	<div class="container-fluid px-0">
    		<div class="row no-gutters d-md-flex justify-content-end">
    			<div class="one-forth d-flex align-items-end">
    				<div class="text">
    					<div class="overlay"></div>
    					<div class="appointment-wrap">
    						
		    				<form action="#" method="post" class="appointment-form">
		    					
			            <div class="row">
			              <div class="col-sm-12">
			             <div class="form-group">
					              
					              <input type="hidden" name="name" value="<?php echo $fetch_info['Name']; ?>">
					              <input type="hidden" name="email" value="<?php echo $fetch_info['Email']; ?>">
		
					            <select name="services" id="services" required="true" class="form-control">
		                      	<option value="">Select Services</option>

		          <?php
		          $query=mysqli_query($con,"select * from tblservices");
              while($row=mysqli_fetch_array($query))
              { ?>
		                       <option value="<?php echo $row['ServiceName'];?>"><?php echo $row['ServiceName'];?></option>
		         	<?php } ?> 
		                      </select>
</div> 


			              </div>
			           
				    




			              <div class="col-sm-12">
			                <div class="form-group">
			                  <input type="date" class="form-control appointment_date" placeholder="Date" name="adate" id='date_picker' required="true" >
			                </div>    
			              </div>



			              <div class="col-sm-12">
			                <div class="form-group">
												<select name="atime" class="form-control" required="true" > 
													<option value="">Select Time</option>
													<?php
		          $query=mysqli_query($con,"select * from tbltime");
              while($row=mysqli_fetch_array($query))
              { 

              	$time=$row['time'];

				$newDateTime = date('h:i A', strtotime($time));

				



              	?>
		                       <option value="<?php echo $row['time'];?>"><?php echo $newDateTime;?></option>
		         	<?php } ?> 
		                      </select>




			                </div>
			              </div>
				          </div>
				          <div class="form-group">
			              <input type="submit" name="submit" value="Make an Appointment" class="btn btn-primary">
			            </div>
			          </form>

		          </div>
						</div>
    			</div>
					<div class="one-third">
						<div class="img" style="background-image: url(images/bg-1.jpg);">
						</div>
					</div>
    		</div>
    	</div>
    </section>




					</div>


						<div class="table-responsive bs-example widget-shadow">
						<h4>Services:</h4>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>Service Name</th>
									<th>Service Price</th>
								</tr>
							</thead>
							<tbody>
<?php
$ret=mysqli_query($con,"select *from  tblservices");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

						 <tr>
						 	<th scope="row"><?php echo $cnt;?></th>
						 	<td><?php  echo $row['ServiceName'];?></td>
						 	<td><?php  echo $row['Cost'];?></td>
						 	</td>
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



<script>
function myFunction() {
  document.getElementById("demo").innerHTML = "0";
}
</script>

<script>
							function myFunction(){
							  alert("Your Appointment has been sent!");
							}
							</script>


</body>

<script language="javascript">
		// $date = date('Y-m-d', strtotime("+1 day"));
        var today = new Date();
        //disable date today
        var dd = String(today.getDate() + 1).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        $('#date_picker').attr('min',today);
    </script>
			


</html>