<?php 
require "connection.php";

$check1 = "SELECT * FROM grade_level WHERE section IS NULL OR section = ''";
$result1 = $con->query($check1);
	$count1 = $result1->num_rows;
	if($count1 > 0){
	echo "nope";
	}else{
		$check2 = "SELECT * FROM paricipants";
		$result2 = $con->query($check2);
		$count2 = $result2->num_rows;
		if($count2 > 0){
		echo "nope";
		}else{
			$check3 = "SELECT * FROM partylist";
			$result3 = $con->query($check3);
			$count3 = $result3->num_rows;
			if($count3 > 0){
			echo "nope";
			}else{
				echo "ok";	
			}	
		}	
	}
 ?>
