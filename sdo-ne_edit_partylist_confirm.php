<?php 
	require "connection.php";
	$pname		= $_POST['pname'];
	$pid		= $_POST['pid'];

	$sql = "UPDATE partylist SET partylist_name = '".$pname."' WHERE pid = '".$pid."'";
	$con->query($sql);

 ?>

 <input type="hidden" id="plname" value="<?php echo $pid; ?>">
 <strong> Partylist Name has been Updated!</strong>