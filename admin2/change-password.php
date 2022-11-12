<!--
=========================================================
* * Black Dashboard - v1.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/black-dashboard
* Copyright 2019 Creative Tim (https://www.creative-tim.com)


* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ODABSaid1']==0)) {
  header('location:logout.php');
  }else{

if(isset($_POST['submit']))
{
$adminid=$_SESSION['ODABSaid1'];
$cpassword=md5($_POST['currentpassword']);
$newpassword=md5($_POST['newpassword']);
$confirmpassword=md5($_POST['confirmpassword']);
$query=mysqli_query($con,"select ID from tbladmin where ID='$adminid' and  Password='$cpassword'");
$row=mysqli_fetch_array($query);
if($row>0){

 if ($cpassword==$newpassword) {
    $msg2='Please enter new password not the same as your old password';
  }elseif($confirmpassword!=$newpassword){
    $msg2='New Password and Confirm password did not match!';
  }else{
    $ret=mysqli_query($con,"update tbladmin set Password='$newpassword' where ID='$adminid'");
    $msg= "Your password successully changed"; 
    $ck=mysqli_query($con,"select UserName from tbladmin where ID='$adminid'");
    $chk=mysqli_fetch_array($ck);
    $logid=$chk['UserName'];
    mysqli_query($con,"insert into tbluserlogs (Status) value('$logid - Changed Password.')");
  }



} else {

$msg2="Your current password is wrong";
}
}
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include('extend-timesup.php'); ?>
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/images/logo/favicon.png">
  <title>
    AMM Dashboard
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="../assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />

<!--   <script type="text/javascript">
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

</script> -->
</head>

<body class="white-content">
  <div class="wrapper">
    <div class="sidebar" style="background: #0008ff;">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="./dashboard.php">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <li>
            <a href="./appointment-clients.php">
              <i class="tim-icons icon-badge"></i>
              <p>Appointment</p>
            </a>
          </li>
          <li>
            <a href="./all-clients.php">
              <i class="tim-icons icon-single-02"></i>
              <p>Clients</p>
            </a>
          </li>

          <li>
            <a href="./add-doctors.php">
              <i class="tim-icons icon-sound-wave"></i>
              <p>Doctors</p>
            </a>
          </li>


          <li>
            <a href="./add-services.php">
              <i class="tim-icons icon-spaceship"></i>
              <p>Services</p>
            </a>
          </li>

          <li>
            <a href="./feedback.php">
              <i class="tim-icons icon-chat-33"></i>
              <p>Feedback</p>
            </a>
          </li>
          


           <li>
            <a href="./user-accounts.php">
              <i class="tim-icons icon-badge"></i>
              <p>User Accounts</p>
            </a>
          </li>
          <li>
            <a href="./user-logs.php">
              <i class="tim-icons icon-molecule-40"></i>
              <p>User Logs</p>
            </a>
          </li>
        </ul>
      </div>    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <?php include('extend-navbar.php'); ?>
      <!-- End Navbar -->

      <div class="content">

<!-- make an appointment -->

        <div class="row">
          <div class="col-lg-6 col-md-12">
            <div class="card">
              <div class="card-header ">
                 <h2 class="card-title">Password</h2>
                 <p class="category">Update your password.</p>
                 <?php if ($msg2) { ?>
                  <p class="text-danger"><i class="tim-icons icon-alert-circle-exc"></i> <?php echo $msg2 ; ?></p> 
                <?php } ?>
                <?php if ($msg) { ?>
                  <p class="" style="color: limegreen;"><i class="tim-icons icon-check-2"></i> <?php echo $msg ; ?></p> 
                <?php } ?>
              </div>
              <div class="card-body ">
                <div class="table-full-width table-responsive">

  <?php
$adminid=$_SESSION['ODABSaid1'];
$ret=mysqli_query($con,"select * from tbladmin where ID='$adminid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
      

              <div class="card-body">
                <form method="post" name="changepassword" onsubmit="return checkpass();" action="">
                  <div class="row">
                    <div class="col-md-8 pr-md-1 ">
                      <div class="form-group">
                        <label>Old Password</label>
                        <input type="password" class="form-control" name="currentpassword" required ='true'>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8 pr-md-1 ">
                      <div class="form-group">
                        <label>New Password</label>
                        <input type="password" class="form-control" name="newpassword" id="pswd" required ='true'>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8 pr-md-1 ">
                      <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="confirmpassword"  required ='true'>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-md-12">
                      <label><input type="checkbox" onclick="showpassword()"> show password</label>
                    
                    </div>
                  </div>

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-fill btn-primary">Update</button>
                </div>

<?php } ?> 

                  
                </form>
              </div>

                </div>
              </div>
            </div>
          </div>

        </div>

      </div>

        <!--   footer   -->

        <?php include('extend-footer.php'); ?>

        <!--   end of footer   -->
    </div>
  </div>



  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <!-- Place this tag in your head or just before your close body tag. -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/black-dashboard.min.js?v=1.0.0"></script><!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script src="darkmode-script.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "black-dashboard-free"
      });
  </script>
   <script>
      function hideMessage() {
    document.getElementById("message_div").style.display = "none";
};
setTimeout(hideMessage, 2000);

    </script>
       <script>
function showpassword() {
  var x = document.getElementById("pswd");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</body>

</html>

<?php } ?>