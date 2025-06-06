<?php 
	require "connection.php";

	$vno = $_POST['vno'];
	$sec = $_POST['sec'];
	$glevel = $_POST['glevel'];

	$sql = "SELECT * FROM voters WHERE grade = '".$glevel."' AND no = '".$vno."' AND section = '".$sec."'";
	$result = $con->query($sql);
	 $row_cnt = $result->num_rows;

	 if($row_cnt > 0){
	 	echo "nope";
	 }else{
	 	$glevel = "Grade ".$glevel;
	 	$sql2 = "SELECT * FROM grade_level WHERE grade_level = '".$glevel."' AND section = '".$sec."'";
	 	$result2 = $con->query($sql2);
	 	$row_cnt2 = $result2->num_rows;
	 	 if($row_cnt2 > 0){
	 	 	$row = $result2->fetch_assoc();
			$max = $row['number_of_voters'];
			if($vno > $max){
	 		echo "nope2";

		 	}else{
		 		echo "ok";
		 	}
		 }else{
		 	echo "ok";
		 }
	 }



?>