<?php 
	require "connection.php";

	session_start();
	$admin = $_SESSION['election_users'];

	$pname = $_POST['pname'];

	$check = "SELECT * FROM partylist WHERE partylist_name = '".$pname."'";
	$res = $con->query($check);
	$row_cnt = $res->num_rows;
	if($row_cnt > 0){
		echo "nope";
	}else{
	$sql = "SELECT * FROM account WHERE username = '".$admin."'";
		$result = $con->query($sql);
		$row = $result->fetch_assoc();
			$id = $row['id'];

	$sql2 = "INSERT INTO partylist (partylist_name, id) VALUES ('".$pname."','".$id."')";
	$result2 = $con->query($sql2);
	}


?>