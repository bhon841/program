<?php 
require "connection.php";

$id   = $_POST['id'];
$main = $_POST['main'];
		date_default_timezone_set('Asia/Manila');
		$current_time = date("m/d/y");
		$date = date("M jS, Y", strtotime($current_time));
		$time = date("h:i A");
		$val_date = $date."-".$time;
		
		$closed = "UPDATE school SET validate_status = 'close', date_validated = '$val_date' WHERE  s_id = '$main'";
		$con->query($closed);	

 ?>