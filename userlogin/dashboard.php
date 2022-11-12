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
}else{

  header('Location: ../login.php');

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
    $doctor=$_POST['doctor'];
    $nume=$_POST['nume'];
    $remark=$_POST['remark'];
    $aptnumber = mt_rand(100000000, 999999999);



      $querydate=mysqli_query($con,"select * from tblappointment where AptDate='$adate' and Email='$email'");
      $count = mysqli_num_rows($querydate);

      if ($count  > 0){


      $msg2="You have already schedule on this date";

      echo "<script>alert('You have already schedule on this date');</script>"; 


      }else{

        $query=mysqli_query($con,"insert into tblappointment(AptNumber,Name,MobileNumber,Email,doctors,AptDate,AptTime,Services,Remark) value('$aptnumber','$name','$nume','$email','$doctor','$adate','$atime','$services','$remark')");
        mysqli_query($con,"insert into tbluserlogs (Status) value('$email - requested for an appointment.')");
            if ($query) {

      $msg="Appointment has been sent!";


      }else{
      $msg2="Problem in making an Appointment! Please try again.";

      }
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

<!--   calendar -->
<link href="../assets/css/style2.css" rel="stylesheet" />

<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

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
          <div class="col-lg-7 col-md-12">
            <div class="card">
              <div class="card-header ">
                 <h2 class="card-title">Make an appointment</h2>
                 <p class="category">Select your services.</p>
                 <?php if($msg){?>
                  <i class="fas fa-check-circle text-success" id="message_div">
                    <?php echo $msg ?>
                  </i>
                <?php } ?>
                <?php if($msg2){?>
                <i class="fa-solid fa-circle-xmark text-danger" id="message_div">
                </i><p class="text-danger"><?php echo $msg2 ?></p>
                <?php } ?>
              </div>
              <div class="card-body ">
                <div class="table-responsive">

              <div class="card-body">

                <form method="post">
                  <input type="hidden" name="name" value="<?php echo $fetch_info['Name']; ?>">
                  <input type="hidden" name="email" value="<?php echo $fetch_info['Email']; ?>">
                  <input type="hidden" name="nume" value="<?php echo $fetch_info['MobileNumber']; ?>">



                  <div class="row">
                    <div class="col-md-5 pr-md-1">
                      <div class="form-group">
                        <label>Select Date</label>

                        <input type="hidden" name="adate" id="d" />
                        <div id="z"></div>

  <script>
    $('#z').datepicker({
    inline: true,
    altField: '#d'
});

$('#d').change(function(){
    $('#z').datepicker('setDate', $(this).val());
});
  </script>
                      </div>
                    </div>

            
                  </div>

<div class="row mb-3">
                    <div class="col-md-12 pr-md-1">
                      <div class="form-group">
                        <label>Select Time</label>
<ul class="donate-now">
  <li>
    <input type="radio" id="8" name="atime" value="08:00:00" checked="checked" />
    <label for="8">8:00AM</label>
  </li>
  <li>
    <input type="radio" id="9" value="09:00:00" name="atime" />
    <label for="9">9:00AM</label>
  </li>
  <li>
    <input type="radio" id="10" value="10:00:00" name="atime" />
    <label for="10">10:00AM</label>
  </li>
  <li>
    <input type="radio" id="11" value="11:00:00" name="atime" />
    <label for="11">11:00AM</label>
  </li>
  <li>
    <input type="radio" id="1" value="13:00:00" name="atime" />
    <label for="1">1:00PM</label>
  </li>
  <li>
    <input type="radio" id="2" value="14:00:00" name="atime" />
    <label for="2">2:00PM</label>
  </li>
   <li>
    <input type="radio" id="3" value="15:00:00" name="atime" />
    <label for="3">3:00PM</label>
  </li>
   <li>
    <input type="radio" id="4" value="16:00:00" name="atime" />
    <label for="4">4:00PM</label>
  </li>
  <li>
    <input type="radio" id="5" value="17:00:00" name="atime" />
    <label for="5">5:00PM</label>
  </li>
</ul>

                      </div>
                    </div>


                  </div>




        <div class="row mb-3">
                    <div class="col-md-12 pr-md-1">
                      <div class="form-group">
                        <label>Select Doctor</label>
<ul class="donate-now">
  <li>
    <input type="radio" id="d1" name="doctor" value="ALEX BROWN" 
    checked="checked"/>
    <label for="d1">Alex Brown</label>
  </li>
  <li>
    <input type="radio" id="d2" name="doctor" value="JOY ABRIGO"/>
    <label for="d2">Joy Abrigo</label>
  </li>
  <li>
    <input type="radio" id="d3" name="doctor" value="CRISTEL AQUINO" />
    <label for="d3">Cristel Aquino</label>
  </li>
  <li>
    <input type="radio" id="d4" name="doctor" value="JONA SALAZAR"/>
    <label for="d4">Jona Salazar</label>
  </li>
  
</ul>
                      </div>
                    </div>
                  </div>



                  



                  <div class="row">
                    <div class="col-md-5 pr-md-1 ">
                      <div class="form-group">
                        <label>Select Services</label>
                        <select name="services" id="services" required="true" class="form-control">
                          <option value="">-- Select Services --</option>
                          <?php
              $query=mysqli_query($con,"select * from tblservices");
              while($row=mysqli_fetch_array($query))
              { ?>
                           <option value="<?php echo $row['ServiceName'];?>"><?php echo $row['ServiceName'];?> - P<?php echo $row['Cost'];?></option>
              <?php } ?>
                        </select>
                      </div>
                    </div>              
                  </div>

                  <div class="row">
                    <div class="col-md-7 pr-md-1 ">
                      <div class="form-group">
                        <label>Remarks: (Optional)</label>
                        <textarea class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="3" name="remark" placeholder="Your remarks here..."></textarea>
                      </div> 
                    </div>
                    
                  </div>


                  <!-- <div class="row">
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
                  </div> -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-fill btn-primary" name="submit">Make an Appointment</button>
                  
                </div>


                  
                </form>
              </div>

                </div>



              </div>




            </div>
          </div>
          <div class="col-lg-5 col-md-12">
            <div class="card ">
              <div class="card-header">
                <h2 class="card-title">AMM REMINDERS</h2>
                <h5 class="card-category">Here are all reminders for customers.</h5>
              </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-md-12 pr-md-1">
                      <div class="form-group">
                         <h5 class="card-title text-left ">Schedule Today:</h5>
                         <p>Let me remind all the customer for making an appointment
                          today is disabled. If you are free today, you can directly
                          go to our clinic and make an walk-in appointment.
                        </p>
                      </div>
                    </div>
                  </div>

               
                  
               

              </div>
            </div>

            <div class="card ">
              <div class="card-header">
                <h2 class="card-title">Contact Information</h2>
                <h5 class="card-category">You can contact us here.</h5>
              </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-md-4 pr-md-1">
                      <div class="form-group">
                         <h5 class="card-title text-right">Contact No.  :</h5>
                      </div>
                    </div>
                    <div class="col-md-8 pl-md-1">
                      <div class="form-group">
                        <p>+639123011789</p>
                      </div>
                    </div>
                  </div>

                <div class="row">
                    <div class="col-md-4 pr-md-1">
                      <div class="form-group">
                         <h5 class="card-title text-right">Place  :</h5>
                      </div>
                    </div>
                    <div class="col-md-8 pl-md-1">
                      <div class="form-group">
                        <p>3rd floor A & D Bldg. Poblacion East, Calasiao, Philippines</p>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-4 pr-md-1">
                      <div class="form-group">
                         <h5 class="card-title text-right">Email  :</h5>
                      </div>
                    </div>
                    <div class="col-md-8 pl-md-1">
                      <div class="form-group">
                        <p class="card-title text-primary">ammdentalgroup@gmail.com</p>
                      </div>
                    </div>
                  </div>

              </div>
            </div>

<div class="card ">
              <div class="card-header">
                <h2 class="card-title">AMM DENTAL CLINIC</h2>
                <h5 class="card-category">Here is the google map of our clinic.</h5>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3835.064553304042!2d120.35687781523065!3d16.01015474527014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x339142c4ebe2d4b7%3A0xbd45ec01efbb3965!2sA%26D%20Bldg%2C%20Bayan%20ng%20Calasiao%2C%20Pangasinan!5e0!3m2!1sen!2sph!4v1647574321715!5m2!1sen!2sph" width="350" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                      </div>
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
    $('#example2').DataTable();
} );
</script>

<script>
jSuites.calendar(document.getElementById('calendar'), {
    format: 'YYYY-MM-DD',
    onupdate: function(a,b) {
        document.getElementById('calendar-value').innerText = b;
    }
});
</script>





</body>



</html>
