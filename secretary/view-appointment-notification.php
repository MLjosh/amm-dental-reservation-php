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

 if(isset($_POST['submit']))
  {
    
    $cid=$_GET['viewid'];
      // $remark=$_POST['remark'];
      // $status=$_POST['status'];
      $view1=1;
    
     
   $query=mysqli_query($con, "update  tblappointment set View='1' where ID='$cid'");
    if ($query) {
      echo "<script>window.location.href='all-appointment.php'</script>";
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
    <!-- sidebar -->
      <?php include('extend-sidebar.php'); ?>
<!-- End sidebar -->
    <div class="main-panel">
      <!-- Navbar -->
      <?php include('extend-navbar.php'); ?>
      <!-- End Navbar -->

      <div class="content">

<!-- Your appointment status -->

        <div class="row">
            <div class="col-md-7">
              <div class="card ">
              <div class="card-header">
                <h2 class="card-title">View Appointment</h2>
                <p class="category">Here is your appointment.</p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter " id="">

                           <?php
            $byname = $fetch_info['Email'];
            $ret1=mysqli_query($con,"select * from  tblappointment where Email = '$byname' and View=''");
            $retview=mysqli_query($con,"select * from  tblappointment where View = '$byname'");
            $num=mysqli_num_rows($ret1);
            $numview=mysqli_num_rows($retview);
            ?> 
            
                    <thead class=" text-primary">
                      <tr>
                        <th>
                          
                        </th>
                        <th>
                         
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <?php
$cid=$_GET['viewid'];
$ret=mysqli_query($con,"select * from tblappointment where ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) { ?>
                        <td>
                          Appointment No.
                        </td>
                        <td>
                          <?php  echo $row['AptNumber'];?>
                        </td>  
                      </tr>
                      <tr>
                        <td>
                          Services
                        </td>
                        <td>
                          <?php  echo $row['Services'];?>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Date
                        </td>
                        <td>
                          <?php  
      $aptdate=$row['AptDate'];
      $date=date_create("$aptdate");
      echo date_format($date,"F j, Y");
      ?>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Time
                        </td>
                        <td>
                          <?php 

    $time=$row['time'];
    $newDateTime = date('h:i A', strtotime($time));
    echo $newDateTime;

    ?>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Doctor
                        </td>
                        <?php

    $doc=$row['doctors'];

    if(empty($doc)){ ?>

      <td style="color:#ff6767; font-weight: bold;"-
      >pending</td>

    <?php } else {?>

    <td style="color: #00db00; font-weight: bold;"><?php  echo $row['doctors'];?></td>

  <?php } ?>
                      </tr>

                        <td>
                          Status
                        </td>
                        <?php


if(empty($row['Status']))
{ ?>

  <td style="color:#ff6767; font-weight: bold;">pending</td>
  
  <?php
}
    
if($row['Status']=="1")
{ ?>

  <td style="color:#00db00; font-weight: bold;">Accepted</td>

<?php }

if($row['Status']=="2")
{ ?>
  
  <td style="color:#ff6767; font-weight: bold;">Rejected</td>

<?php }}

     ;?></td>
                      </tr>

              
                    </tbody>
                  </table>
                  <div class="card-footer">
                    <form action="history-appointment.php">
                  <button type="submit" class="btn btn-fill btn-primary" >Okay</button>
                      </div>
                      </form>
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
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');
        $navbar = $('.navbar');
        $main_panel = $('.main-panel');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');
        sidebar_mini_active = true;
        white_color = false;

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();



        $('.fixed-plugin a').click(function(event) {
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .background-color span').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data', new_color);
          }

          if ($main_panel.length != 0) {
            $main_panel.attr('data', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data', new_color);
          }
        });

        $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            sidebar_mini_active = false;
            blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
          } else {
            $('body').addClass('sidebar-mini');
            sidebar_mini_active = true;
            blackDashboard.showSidebarMessage('Sidebar mini activated...');
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);
        });

        $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (white_color == true) {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').removeClass('white-content');
            }, 900);
            white_color = false;
          } else {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').addClass('white-content');
            }, 900);

            white_color = true;
          }


        });

        $('.light-badge').click(function() {
          $('body').addClass('white-content');
        });

        $('.dark-badge').click(function() {
          $('body').removeClass('white-content');
        });
      });
    });
  </script>
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
// Add active class to the current button (highlight it)
$(function() {
    $('#nav').find('a').click(function(e) {
        e.preventDefault();
        $(this.hash).show().siblings().hide();
        $('#nav').find('a').parent().removeClass('active')
        $(this).parent().addClass('active')
    }).filter(':first').click();
});
</script>
</body>

</html>