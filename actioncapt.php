<?php 

	session_start();

	if (isset($_POST['submit'])) {

		$token = strtolower($_POST['token']);

		// validate captcha code 		
		if (isset($_SESSION['captcha_token']) && $_SESSION['captcha_token'] == $token) {

			//success your code here
			echo '<script>alert("Your Message has been sent!")</script>';
			header ("location: contact.php");

		} else {
			echo '<script>alert("error CAPTCHA code")</script>';
		}
		
	}
?>