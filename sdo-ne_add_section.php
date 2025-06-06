<?php 
require "connection.php";

$glvl 	  = $_POST['glvl'];
$section  = $_POST['section'];
$no_voters = $_POST['no_voters'];

/*$sql = "UPDATE grade_level SET section = '".$section."', number_of_voters = '".$no_voters."' WHERE grade_level = '".$glvl."'"*/;

$sql = "INSERT INTO grade_level (grade_level, section, number_of_voters) VALUES ('".$glvl."','".$section."','".$no_voters."')";
	$con->query($sql);
?>