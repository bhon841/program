<?php 
	require "connection.php";

	$position = $_POST['position'];
	$name	  = $_POST['name'];

	$sql = "INSERT INTO participants (participant_name, participant_position, pid) VALUES ('".$name."','".$position."','0')";
	$con->query($sql);
 ?>