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


if(isset($_POST['submitdelete'])){

  $password=md5($_POST['password']);
$adminid=$_SESSION['ODABSaid1'];
$query=mysqli_query($con,"select ID from tbladmin where ID='$adminid' and  Password='$password'");
$row=mysqli_fetch_array($query);
if($row>0){

  mysqli_query($con,"TRUNCATE TABLE tbluserlogs");

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

    <!-- jquery table. -->
  <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet" />
<!--   select all tables -->
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

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
          <li class="active">
            <a href="./user-logs.php">
              <i class="tim-icons icon-molecule-40"></i>
              <p>User Logs</p>
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

<!-- Your appointment status -->

        <div class="row">

          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h2 class="card-title">User Logs</h2>
                <p class="category">Here are all the User Logs</p>
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
                          Date Created
                        </th>
                        <th>
                          Status
                        </th>
                      
                        <th class="text-center">
                          Action
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

            $ret=mysqli_query($con,"select * from  tbluserlogs order by CreationDate DESC");

            $cnt=1;
            while ($row=mysqli_fetch_array($ret)) {

            ?>

                      <tr>
                    
                        <th scope="row">
                          <?php echo $cnt;?>
                        </th>
              
                        <td>
              <?php  
              $aptdate=$row['CreationDate'];
              $date=date_create("$aptdate");
              echo date_format($date,"F j, Y - D h:i:s A  :");
              ?>
                        </td>
                        <td>
                          <?php
                          $str=$row['Status'];
                          if (strlen($str) > 50)
                          $str = substr($str, 0, 50) . '...';
                          echo $str;
                          ?>
                        </td>

      
                        <td class="text-center">
                          <button type="button" class="btn btn-link text-warning" data-target="#view_modal22<?php echo $row['ID']?>" data-toggle="modal"><i class="tim-icons icon-zoom-split text-primary"></i></button>
                        

                          <button class="btn btn-link" data-target="#modal_delete12<?php echo $row['ID']?>" data-toggle="modal" ><i class="tim-icons icon-trash-simple text-danger"></i></button>
                          
                        </td>
                      </tr>

<?php include('view-user-logs.php'); ?>

<div class="modal hide" id="modal_delete12<?php echo $row['ID']?>" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST">
        <div class="modal-header">
          <h3 class="modal-title">Delete User Logs</h3>
        </div>
        <div class="modal-body">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <div class="form-group">
              <label>Are you sure you want to delete this Delete User Logs?</label>
          </div>
        </div>
        <div style="clear:both;"></div>
        <div class="modal-footer">
          <a type="button" class="btn btn-danger" href="delete-user-logs.php?mem_id=<?php echo $row['ID']?>">Yes</a>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
        </div>
      </form>
    </div>
  </div>
</div>


                      <?php 
              $cnt=$cnt+1;
              }?>
                    </tbody>
                  </table>

                  <button type="button" class="btn btn-danger" data-backdrop="static" data-keyboard="false" data-target="#modal_deletelog" data-toggle="modal">Delete All</button>



                </div>
              </div>
            </div>
          </div>


          
        </div>
      </div>



<div class="modal hide" id="modal_deletelog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST">
        <div class="modal-header">
          <h3 class="modal-title">Delete All User Logs</h3>
        </div>
        <div class="modal-body">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <div class="form-group">
              <label>Please Enter Admin Password to Delete All User Logs</label>

              <input type="hidden" name="user_id" value="<?php echo $row['ID']?>"/>
              <input type="password" name="password" placeholder="Enter Your Password" class="form-control" required="required"/>
            </div>
          </div>
        </div>
        <div style="clear:both;"></div>
        <div class="modal-footer">
          <button name="submitdelete" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span>Delete All User Logs</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Close</button>
        </div>
        </div>
      </form>
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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
</body>

</html>
