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


  if(ISSET($_POST['update'])){
    $user_id = $_POST['user_id'];
    $doctors = $_POST['doctors'];
    $status = $_POST['status'];
    $work = $_POST['work'];



    $mquery=mysqli_query($con, "UPDATE `tblappointment` SET `doctors` = '$doctors',`Status` = '$status',`Mark` = '$work' WHERE `ID` = '$user_id'");
    if ($mquery) {
      

    if($status=="1"){
    $ret=mysqli_query($con,"select * from tblappointment where ID='$user_id'");
    while ($row=mysqli_fetch_array($ret)){
      $nname=$row['Name'];
      $aptdate=$row['AptDate'];
      $date=date_create("$aptdate");
      $dateapt=date_format($date,"F j, Y");

       $time=$row['AptTime'];
      $newDateTime = date('h:i A', strtotime($time));


      $customermail=$row['Email'];
      $receiver = "$customermail";
      $subject = "Reservation Accepted";
      $body = "Good day! $nname,
Your reservation in AMM Dental Group has been accepted.
Your Appointment date is $dateapt, $newDateTime.

For more information, please check our website at www.ammdentagroup@mail.com." ;
      $sender = "From:sampleammdental@gmail.com";
      if(mail($receiver, $subject, $body, $sender)){

        $msg="Appointment has been updated and
        an Email sent to $receiver";
      }else{

          $msg="Sorry, failed while sending mail!";
      }
    }
  }else{


    $ret=mysqli_query($con,"select * from tblappointment where ID='$user_id'");
    while ($row=mysqli_fetch_array($ret)){
      $nname=$row['Name'];
      $aptdate=$row['AptDate'];
      $date=date_create("$aptdate");
      $dateapt=date_format($date,"F j, Y");

       $time=$row['AptTime'];
      $newDateTime = date('h:i A', strtotime($time));


      $customermail=$row['Email'];
      $receiver = "$customermail";
      $subject = "Reservation Cancelled";
      $body = "Hello! $nname,
Your Appointment date in AMM Dental Group $dateapt, $newDateTime had been Cancelled due to unexpected events.
Please make another appointment in our scheduled time. Thank you for your consideration.

For more information, please check our website at www.ammdentagroup@mail.com." ;
      $sender = "From:sampleammdental@gmail.com";
      if(mail($receiver, $subject, $body, $sender)){

        $msg2="Cancelled appointment and
        an Email sent to $receiver";
      }else{

          $msg="Sorry, failed while sending mail!";
      }
    }


     
}

  

      }
      // end isset()
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

        

<!-- end dashboard  -->


        </ul>
      </div>

    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <?php include('extend-navbar.php'); ?>
      <!-- End Navbar -->

      <?php
            // Total Appointments Today
            $datenow=date('Y-m-d');
            $querydatenow=mysqli_query($con,"Select * from tblappointment WHERE AptDate='$datenow' && Status='1' && Mark=''  ");
            $nnow=mysqli_num_rows($querydatenow);

            // Total Clients

            $query1=mysqli_query($con,"Select * from tblcustomers");
            $totalcust=mysqli_num_rows($query1);

            // All Appointments
            $query2=mysqli_query($con,"Select * from tblappointment");
            $totalappointment=mysqli_num_rows($query2);

            $querypending=mysqli_query($con,"Select * from tblappointment where Status='1' && Mark='' ");
            $totalpending=mysqli_num_rows($querypending);
?>       


<!-- start -->
      <div class="content">

      


<?php
            // Total Appointments Today
            $datenow=date('Y-m-d');
            $querydatenow=mysqli_query($con,"Select * from tblappointment WHERE AptDate = '$datenow' and Status='1' ");
            $totaldate=mysqli_num_rows($querydatenow);

            // Total Clients

            $query1=mysqli_query($con,"Select * from tblcustomers");
            $totalcust=mysqli_num_rows($query1);

            // All Appointments
            $query2=mysqli_query($con,"Select * from tblappointment");
            $totalappointment=mysqli_num_rows($query2);
?>  





 <?php
 $tomorrow = date("Y-m-d", strtotime("+1 day"));
 $tomo = date("F j, Y D", strtotime("+1 day"));
  ?>  

        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h2 class="card-title">Confirmation Appointment</h2>
                <p class="category">Here you can see all list of confirmation appointment.</p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter " id="example4">
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
                    <tbody>
                      <?php

            $ret=mysqli_query($con,"select * from  tblappointment where Status='' order by AptTime ASC");

            $cnt=1;
            while ($row=mysqli_fetch_array($ret)) {

            ?>

                      <tr>
                        <th scope="row">
                          <?php echo $cnt;?>
                        </th>

                        <td>
                          <?php  echo $row['AptNumber'];?>
                        </td>
                        <td>
                          <?php
                          $str=$row['Name'];
                          if (strlen($str) > 15)
                          $str = substr($str, 0, 15) . '...';
                          echo $str;
                          ?>
                        </td>
                        <td>
                          <?php  echo $row['Services'];?>
                        </td>
                        <td>
              <?php  
              $aptdate=$row['AptDate'];
              $date=date_create("$aptdate");
              echo date_format($date,"F j, Y");
              ?>
                        </td>
                        <td>
                          <?php

              $time=$row['AptTime'];

              $newDateTime = date('h:i A', strtotime($time));

               echo $newDateTime;
              ?>
                        </td>
                        
                    
                         <td>
                          <?php
                      $docs=$row['doctors'];
                      if ($docs=='') {
                        echo 'PENDING';
                      }

                      ?>
                        
                        </td>
      
                        <td class="text-center">
                           <button type="button" class="btn btn-link text-warning" data-backdrop="static" data-keyboard="false" data-target="#view_modal2<?php echo $row['ID']?>" data-toggle="modal"><i class="tim-icons icon-zoom-split text-primary"></i></button>
                          <button type="button" class="btn btn-link text-warning" data-backdrop="static" data-keyboard="false" data-target="#update_modal2<?php echo $row['ID']?>" data-toggle="modal"><i class="fas fa-edit"></i></button>

                          <button class="btn btn-link" data-target="#modal_delete2<?php echo $row['ID']?>" data-toggle="modal" ><i class="tim-icons icon-trash-simple text-danger"></i></i></button>
                          
                        </td>
                      </tr>


<?php include('view-dash-tom.php'); ?>
<?php include('update-view-notification.php'); ?>

<div class="modal hide" id="modal_delete2<?php echo $row['ID']?>" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST">
        <div class="modal-header">
          <h3 class="modal-title">Delete Appointment</h3>
        </div>
        <div class="modal-body">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <div class="form-group">
              <label>Are you sure you want to delete this Appointment?</label>
          </div>
        </div>
        <div style="clear:both;"></div>
        <div class="modal-footer">
          <a type="button" class="btn btn-danger" href="delete-dash-tom.php?mem_id=<?php echo $row['ID']?>">Yes</a>
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
    $('#example2').DataTable();
} );
</script>
  <script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<script>
  $(document).ready(function() {
    $('#example3').DataTable();
} );
</script>
<script>
  $(document).ready(function() {
    $('#example4').DataTable();
} );
</script>
</body>



</html>
