


        <?php
            $byname = $fetch_info['Email'];
            $ret1=mysqli_query($con,"select * from  tblappointment where Email = '$byname' && View=''");
            $ret2=mysqli_query($con,"select * from  tblappointment where Email = '$byname' && ViewNotification=''");





            $retview=mysqli_query($con,"select * from  tblappointment where View = '$byname'");
            $notifview=mysqli_query($con,"select * from  tblappointment where Email = '$byname' && Status='1'");
            $num=mysqli_num_rows($ret1);
            $num2=mysqli_num_rows($ret2);
            $numview=mysqli_num_rows($retview);
            $notif=mysqli_num_rows($notifview);

            ?> 



      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="./dashboard.php"><img src="../assets/images/logo/logo2.png"> Dental Reservation</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>

          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
              <li class="dropdown nav-item">
                <a href="javascript:void(0)" class="dropdown-toggle nav-link" data-toggle="dropdown">

                  <?php if($num>0){?>
                      <div class="notification d-none d-lg-block d-xl-block"></div>
                  <?php } ?>
                  <i class="tim-icons icon-bell-55"></i>
                  <p class="d-lg-none">
                    Notifications
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-menu-right dropdown-navbar">
                  <?php if($num>0){
                    while($result=mysqli_fetch_array($ret1)){?>
                  <li class="nav-link"><a href="view-appointment.php?viewid=<?php echo $result['ID'];?>" class="nav-item dropdown-item" tabindex='1'>You have new message.</a></li>

            <?php }} else {?>

              <li class="nav-link"><a href="#" class="nav-item dropdown-item">No new message.</a></li>

           <?php } ?>

                  <li class="dropdown-divider"></li>
                  <li class="nav-link"><a href="all-appointment.php" class="nav-item dropdown-item"><b>See All Notification</b></a></li>
                </ul>
              </li>

              
              <li style="margin-top: 12px;
                margin-right: -10px;
                padding-right: 0;">
                Welcome! <b><?php echo $fetch_info['Name'] ?></b>
              </li>
              <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="photo">
                    <img src="../assets/img/anime3.png" alt="Profile Photo">
                  </div>
                  <b class="caret d-none d-lg-block d-xl-block"></b>
                  <p class="d-lg-none">
                    Log out
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-navbar">
                  <li class="nav-link"><a href="all-appointment.php" class="nav-item dropdown-item">Notification</a></li>
                  <li class="nav-link"><a href="change-profile.php" class="nav-item dropdown-item">Profile</a></li>
                  <li class="nav-link"><a href="change-password.php" class="nav-item dropdown-item">Change password</a></li>
                  <li class="dropdown-divider"></li>
                  <li class="nav-link"><a href="logout.php?viewid=<?php echo $fetch_info['Email'] ?>" class="nav-item dropdown-item">Log out</a></li>
                </ul>
              </li>
                <li class="separator d-lg-none"></li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- End Navbar -->