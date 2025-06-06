<?php 
  require "connection.php";
$glvl 		 = $_POST['glvl'];
$section 	 = $_POST['section'];
$vote_no 	 = $_POST['vno'];
$pres  		 = $_POST['pres'];
$vpres  	 = $_POST['vpres'];
$sec    	 = $_POST['sec'];
$treasurer 	 = $_POST['treasurer'];
$auditor     = $_POST['auditor'];
$pio         = $_POST['pio'];
$po          = $_POST['po'];
$grade       = $_POST['grade'];

$voter = "INSERT INTO voters (no, grade, section) VALUES ('".$vote_no."', '".$glvl."', '".$section."')";
$con->query($voter);


foreach ($grade as $key => $value1) {

	if($value1 == ""){

	}else{

	$sql = "SELECT * FROM participants WHERE participant_id = '".$value1."'";
		$result = $con->query($sql);
		$row = $result->fetch_assoc();
		$tot_vote = $row['total_votes'];
		$new_tot = $tot_vote + 1;

		$update = "UPDATE participants SET total_votes = '".$new_tot."' WHERE participant_id = '".$value1."'";
		$con->query($update);
	}

}

$array = array($pres, $vpres, $sec, $treasurer, $auditor, $pio, $po);

foreach ($array as $key => $value) {

	if($value == ""){

	}else{

	$sql = "SELECT * FROM participants WHERE participant_id = '".$value."'";
		$result = $con->query($sql);
		$row = $result->fetch_assoc();
		$tot_vote = $row['total_votes'];
		$new_tot = $tot_vote + 1;

		$update = "UPDATE participants SET total_votes = '".$new_tot."' WHERE participant_id = '".$value."'";
		$con->query($update);
	}

}




?>