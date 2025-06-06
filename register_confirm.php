<?php 
require "connection.php";

session_start();
$admin = $_SESSION['election_users'];

$sql = "SELECT * FROM account WHERE username = '".$admin."'";
	$result = $con->query($sql);
	$row = $result->fetch_assoc();
		$id = $row['id'];
		$sname = $_POST['sname'];
		$sid   = $_POST['sid'];
		$stype = $_POST['stype'];
		$admin = $_POST['admin'];
		$comelec = $_POST['comelec'];
		$syear = $_POST['syear'];
		$rep = $_POST['rep'];

	$sql2 = "INSERT INTO school (school_name,school_id, school_type, admin_name, comelec_name, school_year, validate_status, date_validated, date_closed, id, rep) VALUES ('".$sname."','".$sid."','".$stype."','".$admin."','".$comelec."','".$syear."','0','','0','".$id."','".$rep."')";
	$result2 = $con->query($sql2);

/*     		if($stype == "Elementary (Grade 4-6)"){
		    $sql3 = "INSERT INTO grade_level (grade_level, section, number_of_voters) VALUES ('Grade 2','','0'), ('Grade 3','','0'), ('Grade 4','','0'), ('Grade 5','','0'), ('Grade 6','','0')";
		    $con->query($sql3);
     		}else if($stype == "Integrated School (Grade 7-12)"){
		    $sql3 = "INSERT INTO grade_level (grade_level, section, number_of_voters) VALUES ('Grade 7','','0'), ('Grade 8','','0'), ('Grade 9','','0'), ('Grade 10','','0'), ('Grade 11','','0'), ('Grade 12','','0')";
		    $con->query($sql3);
		    header("location: sdo-ne_admin.php");		    		    
     		}else if($stype == "Junior High School (Grade 7-10)"){
		    $sql3 = "INSERT INTO grade_level (grade_level, section, number_of_voters) VALUES ('Grade 7','','0'), ('Grade 8','','0'), ('Grade 9','','0'), ('Grade 10','','0')";
		    $con->query($sql3);
     		}else if($stype == "Senior High School (Grade 11-12)"){
		    $sql3 = "INSERT INTO grade_level (grade_level, section, number_of_voters) VALUES ('Grade 11','','0'), ('Grade 12','','0')";
		    $con->query($sql3);
     		}*/
?>