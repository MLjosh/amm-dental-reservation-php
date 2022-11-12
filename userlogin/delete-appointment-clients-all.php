<?php
	require_once 'includes/dbconnection.php';
	
	if(ISSET($_REQUEST['mem_id'])){
		$id=$_REQUEST['mem_id'];
		mysqli_query($con, "DELETE FROM `tblappointment` WHERE `ID`='$id'") or die(mysqli_error());
		header("location:history-appointment.php");
	}
?>