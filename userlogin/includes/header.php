




<div class="sticky-header header-section ">
      <div class="header-left">
        <!--toggle button start-->
        <button id="showLeftPush"><i class="fa fa-bars"></i></button>
        <!--toggle button end-->
        <!--logo -->
        <a class="navbar-brand" href="add-appointment.php">
                <img src="assets/images/logo/logo.png" alt="logo">
              </a>
        <!--//logo-->
       
      
      </div>
      <div class="header-right">
        <div class="profile_details_left"><!--notifications of menu start -->
          <ul class="nofitications-dropdown">



        <?php
            $byname = $fetch_info['Email'];
            $ret1=mysqli_query($con,"select * from  tblappointment where Email = '$byname' and View=''");
            $retview=mysqli_query($con,"select * from  tblappointment where View = '$byname'");
            $num=mysqli_num_rows($ret1);
            $numview=mysqli_num_rows($retview);
            ?> 


            <li class="dropdown head-dpdn">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i>
                <?php if($num>0){?>
                <span class="badge blue"><?php echo $num;?></span>
              <?php } ?>

              </a>
              
              <ul class="dropdown-menu">
                <li>
                  <div class="notification_header">
                    <h3>You have <?php echo $num;?> new notification</h3>
                  </div>
                </li>
                <li>
            
                   <div class="notification_desc">
                     <?php if($num>0){
                    while($result=mysqli_fetch_array($ret1)){?>
                 <a class="dropdown-item" href="view-appointment.php?viewid=<?php echo $result['ID'];?>">
                  You have new appointment <?php echo $result['Name'];?>
                  </a><br />
            <?php }} else {?>
            <a class="dropdown-item" href="all-appointment.php">No New Appointment Received</a>
           <?php } ?>
                           
                  </div>
                  <div class="clearfix"></div>  
                 </a></li>
                 
                
                 <li>
                  <div class="notification_bottom">
                    <a href="all-appointment.php">See all notifications</a>
                  </div> 
                </li>
              </ul>
            </li> 
          
          </ul>
          <div class="clearfix"> </div>
        </div>
        <!--notification menu end -->
        <div class="profile_details">  
      
          <ul>
            <li class="dropdown profile_details_drop">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <div class="profile_img"> 
                  <span class="prfil-img"><img src="images/logo2.png" alt="" width="50" height="50"> </span> 
                  <div class="user-name">
          
                    <span>Welcome!</span>
                    <p><?php echo $fetch_info['Name'] ?></p>

                  </div>
                  <i class="fa fa-angle-down lnr"></i>
                  <i class="fa fa-angle-up lnr"></i>
                  <div class="clearfix"></div>  
                </div>  
              </a>
              <ul class="dropdown-menu drp-mnu">
                <li> <a href="change-password-otp.php"><i class="fa fa-cog"></i> Settings</a> </li> 
                <li> <a href="edit-profile.php"><i class="fa fa-user"></i> Profile</a> </li> 
                <li> <a href="index.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
              </ul>
            </li>
          </ul>
        </div>  
        <div class="clearfix"> </div> 
      </div>
      <div class="clearfix"> </div> 
    </div>