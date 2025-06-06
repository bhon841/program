<?php 
require "connection.php";

	$stype = $_POST['stype'];
	$pres = $_POST['pres'];
	$vpres = $_POST['vpres'];
	$sec = $_POST['sec'];
	$treasurer = $_POST['treasurer'];
	$auditor = $_POST['auditor'];
	$pio = $_POST['pio'];
	$peace_officer = $_POST['peace_officer'];
	$pid = $_POST['pid'];

	if($pres != ""){
	$sql1 = "INSERT INTO participants (participant_name, participant_position, pid) VALUES 
		('$pres','President','$pid')";
		$con->query($sql1);
	}
	if($vpres != ""){
	$sql2 = "INSERT INTO participants (participant_name, participant_position, pid) VALUES 
		('$vpres','Vice-President','$pid')";
		$con->query($sql2);
	}
	if($sec != ""){
	$sql3 = "INSERT INTO participants (participant_name, participant_position, pid) VALUES 
		('$sec','Secretary','$pid')";
		$con->query($sql3);		
	}
	if($treasurer != ""){
	$sql4 = "INSERT INTO participants (participant_name, participant_position, pid) VALUES 
		('$treasurer','Treasurer','$pid')";
		$con->query($sql4);		
	}
	if($auditor != ""){
	$sql5 = "INSERT INTO participants (participant_name, participant_position, pid) VALUES 
		('$auditor','Auditor','$pid')";
		$con->query($sql5);		
	}
	if($pio != ""){
	$sql6 = "INSERT INTO participants (participant_name, participant_position, pid) VALUES 
		('$pio','Public Information Officer','$pid')";
		$con->query($sql6);		
	}



	foreach ($peace_officer as $key => $value) {
		if($value != ""){
		$sql2 = "INSERT INTO participants (participant_name, participant_position, pid) VALUES ('$value','Peace Officer','$pid')";
		$con->query($sql2);
		}else{
			
		}
	}
	
	if($stype == "Elementary (Grade 4-6)"){
		$grade3 = $_POST['grade3'];
		$grade4 = $_POST['grade4'];
		$grade5 = $_POST['grade5'];
		$grade6 = $_POST['grade6'];

	$x1 = 0;
		foreach($grade3 as $g3) {
			$sql3 = "INSERT INTO participants (participant_name, participant_position,pid) VALUES ('$g3','Grade 3 Representative','$pid')";
			$con->query($sql3);
			$x1++;
		}

		$x2 = 0;
		foreach($grade4 as $g4) {
			if($g4 == ""){

			}else{
			$sql3 = "INSERT INTO participants (participant_name, participant_position,pid) VALUES ('$g4','Grade 4 Councilor','$pid')";
			$con->query($sql3);
			$x2++;
			}
		}

		$x3 = 0;
		foreach($grade5 as $g5) {
			if($g5 == ""){

			}else{
			$sql4 = "INSERT INTO participants (participant_name, participant_position,pid) VALUES ('$g5','Grade 5 Councilor','$pid')";
			$con->query($sql4);
			$x3++;
			}
		}

		$x4 = 0;
		foreach($grade6 as $g6) {
			if($g6 == ""){

			}else{
			$sql5 = "INSERT INTO participants (participant_name, participant_position,pid) VALUES ('$g6','Grade 6 Councilor','$pid')";
			$con->query($sql5);
			$x4++;
			}
		}	
	}else if($stype == "Integrated School (Grade 7-12)"){
		$grade7 = $_POST['grade7'];
		$grade8 = $_POST['grade8'];
		$grade9 = $_POST['grade9'];
		$grade10 = $_POST['grade10'];
		$grade11 = $_POST['grade11'];
		$grade12 = $_POST['grade12'];

		$x5 = 0;
		foreach($grade7 as $g7) {
			if($g7 == ""){

			}else{
			$sql6 = "INSERT INTO participants (participant_name, participant_position,pid) VALUES ('$g7','Grade 7 Representative','$pid')";
			$con->query($sql6);
			$x5++;
			}
		}

		$x6 = 0;
		foreach($grade8 as $g8) {
			if($g8 == ""){

			}else{
			$sql7 = "INSERT INTO participants (participant_name, participant_position,pid) VALUES ('$g8','Grade 8 Representative','$pid')";
			$con->query($sql7);
			$x6++;
			}
		}

		$x7 = 0;
		foreach($grade9 as $g9) {
			if($g9 == ""){

			}else{
			$sql8 = "INSERT INTO participants (participant_name, participant_position,pid) VALUES ('$g9','Grade 9 Representative','$pid')";
			$con->query($sql8);
			$x7++;
			}
		}

		$x8 = 0;
		foreach($grade10 as $g10) {
			if($g10 == ""){

			}else{
			$sql9 = "INSERT INTO participants (participant_name, participant_position,pid) VALUES ('$g10','Grade 10 Representative','$pid')";
			$con->query($sql9);
			$x8++;
			}
		}	

		$x9 = 0;
		foreach($grade11 as $g11) {
			if($g11 == ""){

			}else{
			$sql10 = "INSERT INTO participants (participant_name, participant_position, pid) VALUES ('$g11','Grade 11 Representative','$pid')";
			$con->query($sql10);
			$x9++;
			}
		}

		$x10 = 0;
		foreach($grade12 as $g12) {
			if($g12 == ""){

			}else{
			$sql11 = "INSERT INTO participants (participant_name, participant_position,pid) VALUES ('$g12','Grade 12 Representative','$pid')";
			$con->query($sql11);
			$x10++;
			}
		}

	}else if($stype == "Junior High School (Grade 7-10)"){
		$grade7 = $_POST['grade7'];
		$grade8 = $_POST['grade8'];
		$grade9 = $_POST['grade9'];
		$grade10 = $_POST['grade10'];


		$x11 = 0;
		foreach($grade7 as $g7) {
			if($g7 == ""){

			}else{
			$sql12 = "INSERT INTO participants (participant_name, participant_position,pid) VALUES ('$g7','Grade 7 Representative','$pid')";
			$con->query($sql12);
			$x11++;
			}
		}

		$x12 = 0;
		foreach($grade8 as $g8) {
			if($g8 == ""){

			}else{
			$sql13 = "INSERT INTO participants (participant_name, participant_position,pid) VALUES ('$g8','Grade 8 Representative','$pid')";
			$con->query($sql13);
			$x12++;
			}
		}			

		$x13 = 0;
		foreach($grade9 as $g9) {
			if($g9 == ""){

			}else{
			$sql14 = "INSERT INTO participants (participant_name, participant_position,pid) VALUES ('$g9','Grade 9 Representative','$pid')";
			$con->query($sql14);
			$x13++;
			}	
		}	

		$x14 = 0;
		foreach($grade10 as $g10) {
			if($g10 == ""){

			}else{
			$sql15 = "INSERT INTO participants (participant_name, participant_position,pid) VALUES ('$g10','Grade 10 Representative','$pid')";
			$con->query($sql15);
			$x14++;
			}
		}			



	}else if($stype == "Senior High School (Grade 11-12)"){
		$grade11 = $_POST['grade11'];
		$grade12 = $_POST['grade12'];

		$x15 = 0;
		foreach($grade11 as $g11) {
			if($g11 == ""){

			}else{
			$sql16 = "INSERT INTO participants (participant_name, participant_position,pid) VALUES ('$g11','Grade 11 Representative','$pid')";
			$con->query($sql16);
			$x15++;
			}
		}

		$x16 = 0;
		foreach($grade12 as $g12) {
			if($g12 == ""){

			}else{
			$sql17 = "INSERT INTO participants (participant_name, participant_position,pid) VALUES ('$g12','Grade 12 Representative','$pid')";
			$con->query($sql17);
			$x16++;
			}
		}			
	}

 ?>