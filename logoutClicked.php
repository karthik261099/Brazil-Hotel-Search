<?php
/*
Template Name: logoutClicked.php
*/
?>
<?php
	session_start();

	session_unset();//deletes all session

	header("Location: adminlogin.php")
?>