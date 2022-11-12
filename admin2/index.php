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

if(isset($_POST['login']))
  {

    $adminuser=$_POST['username'];
    $password2=md5($_POST['password']);
    $password=$_POST['password'];
    $creds='ADMIN';
    $creds2='admin';
 

$checktime=mysqli_query($con,"select * from tbltime");
$check=mysqli_fetch_array($checktime);
if ($check=='') {
  mysqli_query($con,"insert into tbltime (time) VALUES ('08:00:00'),('09:00:00'),('10:00:00'),('11:00:00'),('13:00:00'),('14:00:00'),('15:00:00'),('16:00:00'),('17:00:00');");
}


    $query=mysqli_query($con,"select ID from tbladmin");
    if(mysqli_num_rows($query)==0){
      if ($adminuser==$creds && $password==$creds2) {
      $insertquery=mysqli_query($con,"insert into  tbladmin(Username,Password) value('$adminuser','$password2')");
      if ($insertquery) {
        $userquery=mysqli_query($con,"select ID from  tbladmin where UserName='$adminuser' && Password='$password2' ");
        $ress=mysqli_fetch_array($userquery);
        if ($ress>0) {
          $_SESSION['ODABSaid1']=$ress['ID'];
          mysqli_query($con,"insert into tbluserlogs (Status) value('$adminuser - Log in Sucessfully')");
          header('location:index2.php'); 
        }else{
        $msg=" Incorrect Credentials";
        }
      }
    }else{
      $msg=" Invalid Credentials";
    }
  }elseif (mysqli_num_rows($query)>0) {

    $userquery2=mysqli_query($con,"select ID from tbladmin where  UserName='$adminuser' && Password='$password2' ");
        $ress=mysqli_fetch_array($userquery2);
        if ($ress>0) {
          $_SESSION['ODABSaid1']=$ress['ID'];
          mysqli_query($con,"insert into tbluserlogs (Status) value('$adminuser - Log in Sucessfully')");
          header('location:dashboard.php'); 
        }else{
        $msg=" Incorrect Credentials";
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
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    ADMIN Login
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
    <div class="main-panel">
      <div class="container" style="margin-top: 12%;">
        <div class="row justify-content-center">
            <div class="col-md-4">
            <div class="card">
              <div class="card-header">
                <div class="card-body">
                <h3 class="card-title text-center"> Admin Login</h3>
                <?php if ($msg) { ?>
                  <p class="text-center text-danger"><i class="tim-icons icon-alert-circle-exc"></i><?php echo $msg ; ?></p> 
                <?php } ?>
                
                </div>
              </div>
              <div class="card-body">
                <div class="row justify-content-center">
                <div class="col-md-10">
                <form action="" method="post">
                  <div class="row">
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Enter Admin Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username">
                      </div>
                    </div>
                  </div>
                  <div class="row ">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Enter Admin Password</label>
                        <input type="password" class="form-control" name="password" id="pswd" placeholder="Password">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-md-12">
                      <label ><input type="checkbox" onclick="showpassword()"> show password</label>
                      <label style="float: right;"><a href="forgot-password-confirm.php">forgot password</a></label>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                <div class="card-footer">
                  <button type="submit" name="login" class="btn btn-fill btn-primary">Login</button>
                

                </div>

              </div>
                </form>
              </div>

            </div>
            </div>
          </div>
        </div>
    </div>



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
function showpassword() {
  var x = document.getElementById("pswd");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
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