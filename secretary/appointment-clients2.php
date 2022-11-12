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


if(isset($_POST['submit']))
  {
    $name=strtoupper($_POST['name']);
     $anum=$_POST['number'];
    $services=$_POST['services'];
    $adate=$_POST['adate'];
    $atime=$_POST['atime'];
    $doctor=$_POST['doctor'];
    $status=$_POST['status'];
    $aptnumber = mt_rand(100000000, 999999999);


    $adid=$_SESSION['ODABSaid'];
    $logquery=mysqli_query($con,"Select UserName from tblsecretary where ID='$adid'");
    $reslog=mysqli_fetch_array($logquery);
    $logname=$reslog['UserName'];


     mysqli_query($con,"insert into tbluserlogs (Status) value('$logname - made an appointment for $name ')");




    $checkquery=mysqli_query($con,"select * from tblappointment where Name='$name'");
    $resk=mysqli_num_rows($checkquery);
    $checkquery2=mysqli_query($con,"select * from tblappointment where MobileNumber='$anum'");
    $resk2=mysqli_num_rows($checkquery2);
    if ($resk>0) {
      $msg2="Name is Already exist!";
    }elseif ($resk2>0) {
      $msg2="Mobile Number is Already exist!";
    }else{




    $query=mysqli_query($con,"insert into tblappointment(AptNumber,Name,MobileNumber,Services,AptDate,AptTime,doctors,Status) value('$aptnumber','$name','$anum','$services','$adate','$atime','$doctor','$status')");
            if ($query) { 
      $querycust=mysqli_query($con,"insert into tblcustomers(Name,MobileNumber) value('$name','$anum')");


      $msg="Appointment has been saved";


      }else{
      $msg2="Can't save appointment! Server error!";; 

      }
    }


// end isset    
  }

if(ISSET($_POST['update'])){
    $user_id = $_POST['user_id'];
    $doctors = $_POST['doctors'];
    $status = $_POST['status'];
    $work = $_POST['work'];


$adid=$_SESSION['ODABSaid'];
    $logquery=mysqli_query($con,"Select UserName from tblsecretary where ID='$adid'");
    $reslog=mysqli_fetch_array($logquery);
    $logname=$reslog['UserName'];

    $logquery2=mysqli_query($con,"Select Name from tblappointment where ID='$user_id'");
    $reslog2=mysqli_fetch_array($logquery2);
    $logname2=$reslog2['Name'];


    mysqli_query($con,"insert into tbluserlogs (Status) value('$logname - Updated an appointment for $logname2 ')");


    $mquery=mysqli_query($con, "UPDATE `tblappointment` SET `doctors` = '$doctors',`Status` = '$status',`Mark` = '$work' WHERE `ID` = '$user_id'");
    if ($mquery) {
      
  
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

  <!-- jquery table. -->
  <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet" />
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
            <li class="active ">
            <a href="./appointment-clients2.php">
              <i class="tim-icons icon-badge"></i>
              <p>Appointment</p>
            </a>
          </li>

          <li>
            <a href="./appointment-clients.php">
              <i class="tim-icons icon-single-copy-04"></i>
              <p>All Appointment</p>
            </a>
          </li>


          <li>
            <a href="./all-clients.php">
              <i class="tim-icons icon-single-02"></i>
              <p>Clients</p>
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
          <div class="col-lg-7 col-md-12">
            <div class="card">
              <div class="card-header ">
                 <h2 class="card-title">Client's appointment</h2>
                 <h5 class="card-category">Select your Client's services.</h5>
                 <?php if ($msg) {  ?>
                   <h3 class="card-title text-center text-success" id="message_div"><?php echo $msg ; ?></h3>
                 <?php }elseif ($msg2) { ?>
                   <h3 class="card-title text-center text-danger" id="message_div"><?php echo $msg2 ; ?></h3>
                 <?php } ?>

              </div>
            <div class="card-body">
              <div class="card-body">
                <form method="post">
                  <div class="row">
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>Client's Name</label>
                        <input type="text" class="form-control" placeholder="Client's Name" name="name" style="text-transform:uppercase;"  required="true">
                      </div>
                    </div>
                    <div class="col-md-6 pl-md-1">
                      <div class="form-group">
                        <label>Client's Mobile Number</label>
                        <input type="number" class="form-control" placeholder="Client's Number" name="number" id="mobilenumber" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type = "number" maxlength = "11"  required="true" style="text-transform:uppercase;" >
                      </div>
                    </div>

                    

                  </div>

                  <div class="row">

                    <div class="col-md-6 pr-md-1 ">
                      <div class="form-group">
                        <label>Select Services</label>
                        <select name="services" id="services" required="true" class="form-control">
                          <option value="">-- Select Services --</option>
                          <?php
              $query=mysqli_query($con,"select * from tblservices");
              while($row=mysqli_fetch_array($query))
              { ?>
                           <option value="<?php echo $row['ServiceName'];?>"><?php echo $row['ServiceName'];?></option>
              <?php } ?>
                        </select>
                      </div>
                    </div>


                    <div class="col-md-6 pl-md-1">
                      <div class="form-group">
                        <label>Select Date</label>
                        <input type="date" class="form-control" placeholder="Date" name="adate" id='date_picker' required="true">
                      </div>
                    </div>

            
                  </div>

                  <div class="row">
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>Select Time</label>
                        <select class="form-control" placeholder="Time" name="atime" required="true">
                          <option value="">-- Select Time --</option>
                           <<?php
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


                    <div class="col-md-6 pl-md-1 ">
                      <div class="form-group">
                        <label>Select Doctor</label>
                        <select name="doctor" id="doctor" required="true" class="form-control">
                          <option value="">-- Select Doctor --</option>
                          <?php
              $query=mysqli_query($con,"select * from tbldoctors");
              while($row=mysqli_fetch_array($query))
              { ?>
                           <option value="<?php echo $row['doctors'];?>"><?php echo $row['doctors'];?></option>
              <?php } ?>
                        </select>
                      </div>
                    </div>
                        <input type="hidden" class="form-control" placeholder="Accepted" value="1" name="status">

                  </div>


                  <div class="row">
                <div class="card-footer">
                  <button type="submit" class="btn btn-fill btn-primary" name="submit">Save</button>
                </div>
                </div>



                  
                </form>
              </div>
            </div>
            </div>
          </div>


<!-- AMM Services -->

                    <div class="col-lg-5 col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">AMM Services</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                      <tr>
                        <th>
                          #
                        </th>
                        <th>
                          Services
                        </th>
                        <th>
                          Price
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
$ret=mysqli_query($con,"select *from  tblservices");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

                      <tr>
 
                          <th><?php  echo $cnt ; ?></th>
      
                        <td><?php  echo $row['ServiceName'];?></td>
                        <td>P<?php  echo $row['Cost']; $cnt=$cnt+1; } ?></td>

                      </tr>


                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

<!-- end AMM Services -->


        </div>



<div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h2 class="card-title">Pending Clients Appointment</h2>
                <p class="category">Here you can see all pending appointment.</p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter " id="examples">
                    <thead class=" text-primary">
                      <tr>
                        <th>
                          #
                        </th>
                        <th>
                          Apt No.
                        </th>
                        <th>
                          Name
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
            $ret=mysqli_query($con,"select * from  tblappointment where Email='' && Mark='' && Status='1' ORDER BY ApplyDate DESC");

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
              ?>                        </td>
                        <td>
                          <?php  echo $row['doctors'];?>
                        </td>

      
                        <td class="text-center">

                          <button type="button" class="btn btn-link text-warning" data-backdrop="static" data-keyboard="false" data-target="#view_modale<?php echo $row['ID']?>" data-toggle="modal"><i class="tim-icons icon-zoom-split text-primary"></i></button>

                          <button type="button" class="btn btn-link text-warning" data-backdrop="static" data-keyboard="false" data-target="#update_modal3<?php echo $row['ID']?>" data-toggle="modal"><i class="fas fa-edit"></i></button>

                          <button class="btn btn-link" data-target="#modal_delete2<?php echo $row['ID']?>" data-toggle="modal" ><i class="tim-icons icon-trash-simple text-danger"></i></i></button>
                          
                        </td>
                      </tr>

<?php include('view-appointment-clients.php'); ?>
<?php include('update-appointment-client2.php'); ?>

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
          <a type="button" class="btn btn-danger" href="delete-dash-today.php?mem_id=<?php echo $row['ID']?>">Yes</a>
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

    <!-- jquery table. -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready(function() {
    $('#examples').DataTable();
} );
</script>
<script>
  $(document).ready(function() {
    $('#example2').DataTable();
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
