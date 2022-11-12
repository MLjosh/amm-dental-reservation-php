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





<?php require_once "includes/controllerUserData.php"; ?>
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
  $email=$_POST['email'];
   $name=strtoupper($_POST['name']);
   $mobilenumber=$_POST['mobilenumber'];

    $query2=mysqli_query($con, "update  tblcustomers set Name='$name',MobileNumber='$mobilenumber' where email='$email' ");
    $query3=mysqli_query($con, "update  tblappointment set Name='$name',MobileNumber='$mobilenumber' where email='$email' ");
    
    header("Refresh:3");
    if ($query) {
    
    $msg="Your profile successfully Updated!";
    
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

    if ($query2) {
    
    $msg="Your profile successfully Updated!";
    mysqli_query($con,"insert into tbluserlogs (Status) value('$email - updated a profile.')");

  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  
}

  
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
            <a href="./all-appointment.php">
              <i class="tim-icons icon-badge"></i>
              <p>My Appointment</p>
            </a>
          </li>
          
            <li>
            <a href="./history-appointment.php">
              <i class="tim-icons icon-notes"></i>
              <p>History Appointment</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <?php include('extend-navbar.php'); ?>
      <!-- End Navbar -->

      <div class="content">

<!-- make an appointment -->

        <div class="row">
          <div class="col-lg-6 col-md-12">
            <div class="card card-tasks">
              <div class="card-header ">
                 <h2 class="card-title">Profile</h2>
                 <p class="category">Update your profile.</p>
              </div>
              <div class="card-body ">
                <div class="table-full-width table-responsive">

              <div class="card-body">
                <form action="change-profile.php" method="post">
                  <div class="row">
                    <div class="col-md-8 pr-md-1 ">
                      <div class="form-group">
                        <label>Your Email</label>
                        <input type="text" class="form-control" name="email" value="<?php echo $fetch_info['Email'] ?>" readonly='true' >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8 pr-md-1">
                      <div class="form-group">
                        <label>Update Name</label>
                        <input type="text" class="form-control" name="name" id="name" style="text-transform:uppercase;" value="<?php echo $fetch_info['Name'] ?>"  >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8 pr-md-1">
                      <div class="form-group">
                        <label>Update Mobile No.</label>
                        <input class="form-control" name="mobilenumber" id="mobilenumber" value="<?php echo $fetch_info['MobileNumber'] ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type = "number" maxlength = "11" >
                      </div>
                    </div>
                  </div>

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-fill btn-primary">Save</button>
                  <?php if($msg){?>
                  <i class="fas fa-check-circle text-success" id="message_div"><?php echo $msg; ?></i>
                <?php } ?>
                </div>


                  
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
</body>

</html>