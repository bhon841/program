<?php 
require "connection.php";

		mysqli_query($con,"DELETE FROM voters");
		mysqli_query($con,"DELETE FROM grade_level");
		mysqli_query($con,"DELETE FROM participants");
		mysqli_query($con,"DELETE FROM partylist");
		mysqli_query($con,"DELETE FROM school");
?>