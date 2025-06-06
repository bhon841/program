<?php 
	require "connection.php";

	$name		= $_POST['name'];
	$old_name   = $_POST['old_name'];
	$pid      = $_POST['pid'];
	$parid      = $_POST['parid'];

	$sql = "UPDATE participants SET participant_name = '".$name."' WHERE participant_id = '".$parid."'";
	$con->query($sql);

 ?>

 <input type="hidden" id="plname" value="<?php echo $pid; ?>">
 <strong> Participant details has been Updated!</strong>