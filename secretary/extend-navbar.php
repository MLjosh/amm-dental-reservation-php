<?php
$ret1=mysqli_query($con,"select ID,Name from  tblappointment where Status=''");
$num=mysqli_num_rows($ret1);

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
            <a class="navbar-brand" href="./dashboard.php"><img src="../assets/images/logo/logo2.png">Dental RESERVATION</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>

          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
              <li class="search-bar input-item">
                <button class="btn btn-link" id="search-button" data-toggle="modal" data-target="#searchModal"><i class="tim-icons icon-zoom-split" ></i>
                  <span class="d-lg-none d-md-block">Search</span>
                </button>
              </li>


              <li class="dropdown nav-item">
                <a href="javascript:void(0)" class="dropdown-toggle nav-link" data-toggle="dropdown">

                    <?php if($num>0){ ?>
                      <div class="notification d-none d-lg-block d-xl-block"></div>
                    <?php }; ?>
                  <i class="tim-icons icon-bell-55"></i>
                  <p class="d-lg-none">
                    Notifications
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-menu-right dropdown-navbar">
                <?php if($num>0){
                        while($result=mysqli_fetch_array($ret1))
                          { ?>
                  
                  <li class="nav-link"><a href="view-notification.php" class="nav-item dropdown-item text-primary">New appointment received from <?php echo $result['Name'];?></a></li>

        
                  <?php }} else {?>
              <li class="nav-link"><a href="#" class="nav-item dropdown-item">No New Appointment Received</a></li>
                 <?php } ?>


                  <li class="dropdown-divider"></li>
                  <li class="nav-link"><a href="all-appointment.php" class="nav-item dropdown-item"><b>See All Notification</b></a></li>
                </ul>
              </li>
 <?php
$adid=$_SESSION['ODABSaid'];
$ret=mysqli_query($con,"select SecretaryName from tblsecretary where ID='$adid'");
$row=mysqli_fetch_array($ret);
$name=$row['SecretaryName'];

$ret2=mysqli_query($con,"select UserName from tblsecretary where ID='$adid'");
$row2=mysqli_fetch_array($ret2);
$name2=$row2['UserName'];

?> 
              
              <li style="margin-top: 12px;
                margin-right: -10px;
                padding-right: 0;">
                Welcome! Sec. <b><?php echo $name; ?></b>
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
                  <li class="nav-link"><a href="view-notification.php" class="nav-item dropdown-item">Notification</a></li>
                  <li class="nav-link"><a href="change-profile.php" class="nav-item dropdown-item">Profile</a></li>
                  <li class="nav-link"><a href="change-password.php" class="nav-item dropdown-item">Change password</a></li>
                  <li class="dropdown-divider"></li>
                  <li class="nav-link"><a href="logout.php?viewid=<?php echo $name2; ?>" class="nav-item dropdown-item">Log out</a></li>
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