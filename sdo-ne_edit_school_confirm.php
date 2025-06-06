<?php 
	require "connection.php";

	$sname  = $_POST['sname'];
	$sid 	= $_POST['sid'];
	$admin  = $_POST['admin'];
	$syear  = $_POST['syear'];
	$sc 	= $_POST['sc'];

	$sql = "UPDATE school SET school_name = '".$sname."', school_id = '".$sid."', admin_name = '".$admin."', comelec_name = '".$sc."', school_year = '".$syear."'";
	$con->query($sql);

 ?>