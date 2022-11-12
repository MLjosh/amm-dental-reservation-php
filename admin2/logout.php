<?php

include('includes/dbconnection.php');
 $cid1=$_GET['viewid'];
 mysqli_query($con,"insert into tbluserlogs (Status) value('$cid1 - is already logout.')");

session_start();
session_unset();
session_destroy();
header('location:index.php');

?>