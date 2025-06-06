<?php 
	require "connection.php";

	$old_section = $_POST['old_section'];
	$section = $_POST['nsection'];
	$voters  = $_POST['voters'];
	$lvl  = $_POST['lvl'];

	$sql = "UPDATE grade_level SET section = '".$section."', number_of_voters = '".$voters."' WHERE section = '".$old_section."' AND grade_level = '".$lvl."'";
	$con->query($sql);
 ?>
