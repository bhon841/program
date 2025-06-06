<?php 
	require "connection.php";

	$id = $_POST['uid'];

	$sql = "UPDATE participants SET image = 'none' WHERE participant_id = '$id'";
	$con->query($sql);
 ?>