<?php 
require "connection.php";

$id   = $_POST['id'];
$main = $_POST['main'];

	$sql = "SELECT * FROM school WHERE s_id = '".$main."'";
	$result = $con->query($sql);

	
	$row = $result->fetch_assoc();
		$status = $row['validate_status'];

		if($status == 'close'){
			echo "nope";
		}else{
		date_default_timezone_set('Asia/Manila');	
		$current_time = date("m/d/y");
		$date = date("M jS, Y", strtotime($current_time));
		$time = date("h:i A");
		$val_date = $date."-".$time;
		
		$update = "UPDATE school SET validate_status = '1', date_validated = '$val_date' WHERE  s_id = '".$main."'";
			$con->query($update);	
		}
 ?>