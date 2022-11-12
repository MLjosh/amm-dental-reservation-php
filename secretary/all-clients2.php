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
if (strlen($_SESSION['ODABSaid']==0)) {
  header('location:logout.php');
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
    AMM Secretary Dashboard
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
    <!-- sidebar -->
      <div class="sidebar" style="background: #0008ff;">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper">
        <ul class="nav" id="navMenus">
          <li>
            <a href="./dashboard.php">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>Dashboard</p>
            </a>
          </li>
            <li>
            <a href="./appointment-clients.php">
              <i class="tim-icons icon-badge"></i>
              <p>Appointment</p>
            </a>
          </li>

          <li class="active">
            <a href="./all-clients.php">
              <i class="tim-icons icon-single-02"></i>
              <p>Clients</p>
            </a>
          </li>
          


          <li>
            <a href="./all-appointment.php">
              <i class="tim-icons icon-single-copy-04"></i>
              <p>All Appointment</p>
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
      <!-- End sidebar -->
    <div class="main-panel">
      <!-- Navbar -->
      <?php include('extend-navbar.php'); ?>
      <!-- End Navbar -->

<!-- start -->
<?php


            // Walk-in Clients

            $query1=mysqli_query($con,"Select * from tblappointment where Email='' ");
            $totalcust=mysqli_num_rows($query1);

            // Online Clients
            $query2=mysqli_query($con,"Select * from tblcustomers");
            $totalappointment=mysqli_num_rows($query2);
?> 


      <div class="content">
         <div class="row">
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Walk-in Clients</h5>
                <h3 class="card-title"><i class="tim-icons icon-single-02 text-warning"></i><?php echo $totalcust;?></h3>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Online Clients</h5>
                <h3 class="card-title"><i class="tim-icons icon-single-02 text-info"></i><?php echo $totalappointment;?></h3>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-5 col-md-12">
            <div class="card card-tasks">
              <div class="card-header ">
                <h6 class="title d-inline">Walk-in Clients</h6>
                <p class="card-category d-inline">(Clients without access to website)</p>
              </div>
              <div class="card-body ">
                <div class="table-full-width table-responsive">
                  <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                      <tr>
                        <th>
                          #
                        </th>
                        <th>
                          Name
                        </th>
                        <th class="text-center">
                          Action
                        </th>
                      </tr>
                    </thead>
                    <tbody>
<?php
$walkin=mysqli_query($con,"Select * from tblappointment where Email='' order by ApplyDate DESC");
$cnt1=1;
while ($walkinres=mysqli_fetch_array($walkin)) { ?>

                      <tr>
                        <th>
                          <?php echo $cnt1;  ?>
                        </th>
                        <td>
                          <?php echo $walkinres['Name'];  ?>
                        </td>
                        <td class="text-center">
                          <button class="btn btn-link"><i class="tim-icons icon-zoom-split text-primary"></i></button>
                          <button class="btn btn-link"><i class="tim-icons icon-trash-simple text-danger"></i></i></button>
                          
                        </td>
                      </tr>
<?php $cnt1=$cnt1+1; } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-7 col-md-12">
            <div class="card card-tasks">
              <div class="card-header ">
                <h6 class="title d-inline">Online Clients</h6>
                <p class="card-category d-inline">(Clients with access to website)</p>
              </div>
              <div class="card-body ">
                <div class="table-full-width table-responsive">
                  <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                      <tr>
                        <th>
                          #
                        </th>
                        <th>
                          Name
                        </th>
                        <th>
                          Email
                        </th>
                        <th class="text-center">
                          Action
                        </th>
                      </tr>
                    </thead>
                    <tbody>
<?php
$online=mysqli_query($con,"Select * from tblcustomers order by CreationDate DESC");
$cnt2=1;
while ($onlineres=mysqli_fetch_array($online)) { ?>
                      <tr>
                        <th>
                          <?php echo $cnt2; ?>
                        </th>
                        <td>
                          <?php echo $onlineres['Name']; ?>
                        </td>
                        <td>
                          <?php echo $onlineres['Email']; ?>
                        </td>
                        <td class="text-center">
                          <button class="btn btn-link"><i class="tim-icons icon-zoom-split text-primary"></i></button>
                          <button class="btn btn-link"><i class="tim-icons icon-trash-simple text-danger"></i></i></button>
                          
                        </td>
                      </tr>
                      </tr>
                    </tbody>
<?php $cnt2=$cnt2+1; } ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
<!-- end -->

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

</body>



</html>
