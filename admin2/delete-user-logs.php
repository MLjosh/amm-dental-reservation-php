<?php
	require_once 'includes/dbconnection.php';
	
	if(ISSET($_REQUEST['mem_id'])){
		$id=$_REQUEST['mem_id'];
		mysqli_query($con, "DELETE FROM `tbluserlogs` WHERE `ID`='$id'") or die(mysqli_error());

		$result=mysqli_query($con,"SELECT Name FROM `tblcomments` WHERE ID='$id'");
		while ($row=mysqli_fetch_assoc($result)) {
    		$name=$row["Name"];
    	mysqli_query($con,"INSERT INTO `tbluserlogs`( `Name`, `Status`) VALUES ('ADMIN','Delete feedback from $name.'");

			}
		header("location:user-logs.php");
	}
?>