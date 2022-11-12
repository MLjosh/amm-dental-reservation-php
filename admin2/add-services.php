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


if(isset($_POST['submit']))
  {
    $name=strtoupper($_POST['name']);
    $price=$_POST['price'];

  $check=mysqli_query($con,"select ID from tblservices where ServiceName='$name'");
  $ress=mysqli_fetch_array($check);
    if ($ress>0) {
      $msg2="Service Name is already exists";
    }else{

    $query=mysqli_query($con,"insert into tblservices(ServiceName,Cost) value('$name','$price')");
            if ($query) {

      $msg="Service Name has been saved";


      }else{
      $msg2="Can't save appointment! Server error!";; 

      }
    }


// end isset    
  }



  if(ISSET($_POST['update'])){
    $user_id = $_POST['user_id'];
    $firstname = strtoupper($_POST['firstname']);
    $cost = $_POST['cost'];



    $mquery=mysqli_query($con, "UPDATE `tblservices` SET `ServiceName` = '$firstname',`Cost` = '$cost' WHERE `ID` = '$user_id'");
    if ($mquery) {
      echo "<script>alert('Doctor's name updated!')</script>";
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
    AMM ADMIN Services
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

    <!-- print css -->
  <link href="../assets/css/print.css" rel="stylesheet" />


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


          <li class="active">
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
      </div>
    </div>
<!-- End sidebar -->

    <div class="main-panel">
      <!-- Navbar -->
      <?php include('extend-navbar.php'); ?>
      <!-- End Navbar -->

<!-- start -->
      <div class="content">

        <div class="row">
          <div class="col-lg-6 col-md-12">
            <div class="card">
              <div class="card-header ">
                 <h2 class="card-title">Services</h2>
                 <h5 class="card-category">Here you can Add, Update and Delete Services</h5>
                 <?php if ($msg2) { ?>
                  <p class="text-center text-danger" id="message_div"><i class="tim-icons icon-alert-circle-exc"></i> <?php echo $msg2 ; ?></p> 
                <?php } ?>
                <?php if ($msg) { ?>
                  <p class="text-center" style="color: limegreen;" id="message_div"><i class="tim-icons icon-check-2"></i> <?php echo $msg ; ?></p> 
                <?php } ?>

              </div>
            <div class="card-body">
              <div class="card-body">
                <form method="post">
                  <div class="row">
                    <div class="col-md-8 pr-md-1">
                      <div class="form-group">
                        <label>Service's Name</label>
                        <input type="text" class="form-control" placeholder="Enter Service's Name" name="name" style="text-transform:uppercase;"  required="true">
                      </div>
                    </div>

                  </div>
                  <div class="row">
                    <div class="col-md-8 pr-md-1">
                      <div class="form-group">
                        <label>Service's Price</label>
                        <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "11" class="form-control" placeholder="Enter Service's Price" name="price" required="true">
                      </div>
                    </div>
                    
                  </div>

                  <div class="row">
                <div class="card-footer">
                  <button type="submit" class="btn btn-fill btn-primary" name="submit">Add</button>
                </div>
                </div>

                </form>
              </div>
            </div>
            </div>
          </div>


        </div>




<div id="printThis">

<div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h2 class="card-title">AMM Services List</h2>
                <h5 class="card-category">Here are all Services List</h5>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter " id="example3">
                    <thead class=" text-primary">
                      <tr>
                        <th>
                          #
                        </th>
                        <th>
                          Service's Name
                        </th>
                        <th>
                          Service's Price
                        </th>
                        <th>
                          Date Created
                        </th>
                        <th class="text-center">
                          Action
                        </th>
                      </tr>
                    </thead>

            <!--         print -->
                    <div id="printservices">
            <!--         print -->

                    <tbody>
                      <?php

            $ret=mysqli_query($con,"select * from  tblservices order by CreationDate DESC");

            $cnt=1;
            while ($row=mysqli_fetch_array($ret)) {

            ?>

                      <tr>
                        <th scope="row">
                          <?php echo $cnt;?>
                        </th>

                        <td>
                          <?php  echo $row['ServiceName'];?>
                        </td>
                        <td>
                          P <?php  echo number_format($row['Cost']);?>
                        </td>
                        <td>
                           <?php  
              $aptdate=$row['CreationDate'];
              $date=date_create("$aptdate");
              echo date_format($date,"F j, Y");
              ?>
                        </td>

                     <!--    print -->
                      </div>
                       

      
                        <td class="text-center">
                          <button type="button" class="btn btn-link text-warning" data-backdrop="static" data-keyboard="false" data-target="#view_services<?php echo $row['ID']?>" data-toggle="modal"><i class="tim-icons icon-zoom-split text-primary"></i></button>

                         <button type="button" class="btn btn-link text-warning" data-backdrop="static" data-keyboard="false" data-target="#update_modal<?php echo $row['ID']?>" data-toggle="modal"><i class="fas fa-edit"></i></button>
                          <button class="btn btn-link" data-target="#modal_delete<?php echo $cnt?>" data-toggle="modal" ><i class="tim-icons icon-trash-simple text-danger"></i></i></button>
                        </td>
                      </tr>



                      <?php include('update-services.php'); ?>
                      <?php include('view-services.php'); ?>

<div class="modal hide" id="modal_delete<?php echo $cnt?>" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST">
        <div class="modal-header">
          <h3 class="modal-title">Delete Service</h3>
        </div>
        <div class="modal-body">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <div class="form-group">
              <label>Are you sure you want to delete this Service?</label>
          </div>
        </div>
        <div style="clear:both;"></div>
        <div class="modal-footer">
          <a type="button" class="btn btn-danger" href="delete-services.php?mem_id=<?php echo $row['ID']?>">Yes</a>
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
<button type="button" class="btn btn-secondary" id="btnPrint"><i class="fa fa-print" aria-hidden="true"></i></button>



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
   <script language="javascript">
    // $date = date('Y-m-d', strtotime("+1 day"));
        var today = new Date();
        //disable date today
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        $('#date_picker').attr('min',today);
    </script>
    <script>
      function hideMessage() {
    document.getElementById("message_div").style.display = "none";
};
setTimeout(hideMessage, 5000);

    </script>

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
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
  
document.getElementById("btnPrint").onclick = function () {
    printElement(document.getElementById("printThis"));
}

function printElement(elem) {
    var domClone = elem.cloneNode(true);
    
    var $printSection = document.getElementById("printSection");
    
    if (!$printSection) {
        var $printSection = document.createElement("div");
        $printSection.id = "printSection";
        document.body.appendChild($printSection);
    }
    
    $printSection.innerHTML = "";
    $printSection.appendChild(domClone);
    window.print();
}

</script>

<script>
  
document.getElementById("btnPrintservices").onclick = function () {
    printElement(document.getElementById("printservice"));
}

function printElement(elem) {
    var domClone = elem.cloneNode(true);
    
    var $printSection = document.getElementById("printSection");
    
    if (!$printSection) {
        var $printSection = document.createElement("div");
        $printSection.id = "printSection";
        document.body.appendChild($printSection);
    }
    
    $printSection.innerHTML = "";
    $printSection.appendChild(domClone);
    window.print();
}

</script>


</body>



</html>
