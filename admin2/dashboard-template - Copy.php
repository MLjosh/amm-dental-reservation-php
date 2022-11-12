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
    AMM ADMIN Dashboard
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
      <!-- jquery table. -->
  <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet" />
</head>

<body class="white-content">
  <div class="wrapper">
    <div class="sidebar" style="background: #0008ff;">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
            <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
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
    <div class="main-panel">
      <!-- Navbar -->
      <?php include('extend-navbar.php'); ?>
      <!-- End Navbar -->

      <?php
            // Total Appointments Today
            $querydatenow=mysqli_query($con,"Select * from tbldoctors");
            $totaldate=mysqli_num_rows($querydatenow);

            // Total Clients

            $query1=mysqli_query($con,"Select * from tblcustomers");
            $totalcust=mysqli_num_rows($query1);

            // All Appointments
            $query2=mysqli_query($con,"Select * from tblappointment");
            $totalappointment=mysqli_num_rows($query2);

            $querypending=mysqli_query($con,"Select * from tblappointment where Status='' ");
            $totalpending=mysqli_num_rows($querypending);
?>       


<!-- start -->
      <div class="content">

        <div class="row">

          <div class="col-lg-3">
            <a href="">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Total Clients</h5>
                <h3 class="card-title"><i class="tim-icons icon-single-02 text-info"></i><?php echo $totalcust;?></h3>
              </div>
            </div>
            </a>
          </div>

          <div class="col-lg-3">
            <a href="">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Total Doctors</h5>
                <h3 class="card-title"><i class="tim-icons icon-heart-2 text-success"></i><?php echo $totaldate ;?> </h3>
              </div>
            </div>
            </a>
          </div>

        
          <div class="col-lg-3">
            <a href="">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">All Appointments</h5>
                <h3 class="card-title"><i class="tim-icons icon-single-copy-04 text-primary"></i><?php echo $totalappointment;?></h3>
              </div>
            </div>
            </a>
          </div>
          <div class="col-lg-3">
            <a href="">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Pending Appointments</h5>
                <h3 class="card-title"><i class="tim-icons icon-paper text-danger"></i><?php echo $totalpending;?></h3>
              </div>
            </div>
            </a>
          </div>
          
        </div>



        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h2 class="card-title">Total Appointment Today</h2>
                <h5 class="card-category"><?php echo $today = date("F j, Y (D g:i A)"); ?></h5>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter " id="example">
                    <thead class=" text-primary">
                      <tr>
                        <th>
                          #
                        </th>
                        <th>
                          Apt No.
                        </th>
                        <th>
                          Client Name
                        </th>
                        <th>
                          Service
                        </th>
                        <th>
                          Date
                        </th>
                        <th>
                          Time
                        </th>
                        <th>
                          Doctor
                        </th>
                        <th class="text-center">
                          Action
                        </th>
                      </tr>
                    </thead>
                    <?php
                    $retdate=mysqli_query($con,"Select * from tblappointment WHERE AptDate = '$datenow' and Status='1' order by AptTime ASC ");
                    $cntt=1;
                    while ($rowdate=mysqli_fetch_array($retdate)) {

                      // time
                      $time=$rowdate['AptTime'];
                      $newDateTime = date('h:i A', strtotime($time));
                      
                      //date
                          $aptdate=$rowdate['AptDate'];
                          $date=date_create("$aptdate");
                                                    

                    ?>   
                    <tbody>
                      <tr>
                        <td style="font-weight: bold;"><?php echo $cntt;?>
                        </td>
                        <td>
                          <?php  echo $rowdate['AptNumber'];?>
                        </td>
                        <td>
                          <?php  echo $rowdate['Name'];?>
                        </td>
                        <td>
                          <?php  echo $rowdate['Services'];?>
                        </td>

                        <td>
                          <?php  echo date_format($date,"F j, Y"); ?>
                        </td>

                        <td>
                          <?php  echo $newDateTime;?>
                        </td>
                        <td>
                          <?php  echo $rowdate['doctors'];?>
                        </td>

                        <td class="text-center">
                          <button class="btn btn-link"><i class="tim-icons icon-zoom-split text-primary"></i></button>
                          <button class="btn btn-link"><i class="tim-icons icon-trash-simple text-danger"></i></i></button>
                          
                        </td>
                      </tr>
                    </tbody>
<?php $cntt=$cntt+1; }?>
                  </table>
                </div>
              </div>
            </div>
          </div>

           <?php
 $tomorrow = date("Y-m-d", strtotime("+1 day"));
 $tomo = date("F j, Y D", strtotime("+1 day"));
  ?> 



          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">Scheduled Tomorrow</h4>
                <p class="category"><?php  echo $tomo; ?></p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter " id="example2">
                    <thead class=" text-primary">
                      <tr>
                        <th>
                          #
                        </th>
                        <th>
                          Apt No.
                        </th>
                        <th>
                          Client Name
                        </th>
                        <th>
                          Service
                        </th>
                        <th>
                          Date
                        </th>
                        <th>
                          Time
                        </th>
                        <th>
                          Doctor
                        </th>
                        <th class="text-center">
                          Action
                        </th>
                      </tr>
                    </thead>

                     <?php
$ret=mysqli_query($con,"select * from  tblappointment where Status='1' && AptDate='$tomorrow' order by AptTime ASC");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

  // time
  $time=$row['AptTime'];
  $newDateTime = date('h:i A', strtotime($time));
  
  //date
      $aptdate=$row['AptDate'];
      $date=date_create("$aptdate");
      


?>  
                    <tbody>
                      <tr>
                        <th scope="row"><?php echo $cnt;?>
                        </th>
                        <td>
                          <?php  echo $row['AptNumber'];?>
                        </td>
                        <td>
                          <?php  echo $row['Name'];?>
                        </td>
                        <td>
                          <?php  echo $row['Services'];?>
                        </td>

                        <td>
                          <?php  echo date_format($date,"F j, Y");?>
                        </td>

                        <td>
                          <?php  echo $newDateTime;?>
                        </td>
                        <td>
                          <?php  echo $row['doctors'];?>
                        </td>

                        <td class="text-center">
                          <button class="btn btn-link"><i class="tim-icons icon-zoom-split text-primary"></i></button>
                          <button class="btn btn-link"><i class="tim-icons icon-trash-simple text-danger"></i></i></button>                    
                        </td>
                      </tr>
                    </tbody>

                  
<?php 
$cnt=$cnt+1;
}?>
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


        <!-- jquery table. -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
  <script>
  $(document).ready(function() {
    $('#example2').DataTable();
} );
</script>
</body>



</html>
