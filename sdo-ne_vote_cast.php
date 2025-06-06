<?php 
  require "connection.php";

$glvl    		= $_POST['glvl'];
$glvl           = "grade ".$glvl;

if(isset($_POST['pres'])){
$pres_id  		= $_POST['pres'];	
}else{
$pres_id = '';
}

if(isset($_POST['vpres'])){
$vpres_id = $_POST['vpres'];
}else{
$vpres_id = '';
}
if(isset($_POST['sec'])){
$sec_id = $_POST['sec'];
}else{
$sec_id = '';
}
if(isset($_POST['treasurer'])){
$treasurer_id = $_POST['treasurer'];
}else{
$treasurer_id = '';
}
if(isset($_POST['auditor'])){
$auditor_id = $_POST['auditor'];
}else{
$auditor_id = '';
}
if(isset($_POST['pio'])){
$pio_id = $_POST['pio'];
}else{
$pio_id = '';
}
if(isset($_POST['po'])){
$po_id = $_POST['po'];
}else{
$po_id = '';
}
if(isset($_POST['grade'])){
$grade_id = $_POST['grade'];
}else{
$grade_id = '';
}



$sql1 = "SELECT participant_name FROM participants WHERE participant_id = '".$pres_id."'";
	$result = $con->query($sql1);
	$row = $result->fetch_assoc();
	$pres = $row['participant_name'];

$sql2 = "SELECT participant_name FROM participants WHERE participant_id = '".$vpres_id."'";
	$result2 = $con->query($sql2);
	$row = $result2->fetch_assoc();
	$vpres = $row['participant_name'];

$sql3 = "SELECT participant_name FROM participants WHERE participant_id = '".$sec_id."'";
	$result3 = $con->query($sql3);
	$row = $result3->fetch_assoc();
	$sec = $row['participant_name'];

$sql4 = "SELECT participant_name FROM participants WHERE participant_id = '".$auditor_id."'";
	$result4 = $con->query($sql4);
	$row = $result4->fetch_assoc();
	$auditor = $row['participant_name'];

$sql5 = "SELECT participant_name FROM participants WHERE participant_id = '".$treasurer_id."'";
	$result5 = $con->query($sql5);
	$row = $result5->fetch_assoc();
	$treasurer = $row['participant_name'];

$sql6 = "SELECT participant_name FROM participants WHERE participant_id = '".$pio_id."'";
	$result6 = $con->query($sql6);
	$row = $result6->fetch_assoc();
	$pio = $row['participant_name'];

$sql7 = "SELECT participant_name FROM participants WHERE participant_id = '".$po_id."'";
	$result7 = $con->query($sql7);
	$row = $result7->fetch_assoc();
	$po = $row['participant_name'];



?>

<div class="row">
	<div class="col-sm-12 col-lg-12" align="center">
	<h2><strong>YOUR VOTE</strong></h2>
		<hr>
	</div>
	<div class="col-sm-12 col-lg-12" style="font-size:20px;">
		<?php 
		$check = "SELECT * FROM participants WHERE participant_position = 'President'";
		$res = $con->query($check);
		$count = $res->num_rows;
		if($count > 0){
		?>
		<strong>PRESIDENT:</strong> <?php if($pres == ""){echo "NO VOTE"; }else{echo $pres;} ?> <br>
		<?php
		}else{

		}
		$check = "SELECT * FROM participants WHERE participant_position = 'Vice-President'";
		$res2 = $con->query($check);
		$count = $res2->num_rows;
		if($count > 0){
		?>
		<strong>VICE-PRESIDENT:</strong> <?php if($vpres == ""){echo "NO VOTE"; }else{echo $vpres;} ?> <br>
		<?php
		}else{

		}
		$check = "SELECT * FROM participants WHERE participant_position = 'secretary'";
		$res4 = $con->query($check);
		$count = $res4->num_rows;
		if($count > 0){
		?>
		<strong>SECRETARY:</strong> <?php if($sec == ""){echo "NO VOTE"; }else{echo $sec;} ?> <br>
		<?php
		}else{

		}
		$check = "SELECT * FROM participants WHERE participant_position = 'treasurer'";
		$res5 = $con->query($check);
		$count = $res5->num_rows;
		if($count > 0){
		?>
		<strong>TREASURER:</strong> <?php if($treasurer == ""){echo "NO VOTE"; }else{echo $treasurer;} ?> <br>
		<?php
		}else{

		}
		$check = "SELECT * FROM participants WHERE participant_position = 'auditor'";
		$res6 = $con->query($check);
		$count = $res6->num_rows;
		if($count > 0){
		?>
		<strong>AUDITOR:</strong>  <?php if($auditor == ""){echo "NO VOTE"; }else{echo $auditor;} ?> <br>
		<?php
		}else{

		}
		$check = "SELECT * FROM participants WHERE participant_position = 'Public Information Officer'";
		$res7 = $con->query($check);
		$count = $res7->num_rows;
		if($count > 0){
		?>
		<strong>P.I.O.:</strong>  <?php if($pio == ""){echo "NO VOTE"; }else{echo $pio;} ?> <br>
		<?php
		}else{

		}
		$check = "SELECT * FROM participants WHERE participant_position = 'Peace Officer'";
		$res8 = $con->query($check);
		$count = $res8->num_rows;
		if($count > 0){
		?>
		<strong>PEACE OFFICER:</strong>  <?php if($po == ""){echo "NO VOTE"; }else{echo $po;} ?> <br>
		<?php
		}else{

		}												

		if($glvl == 'grade 4'){

			if($grade_id != ""){
				foreach ($grade_id as $key => $value) {
					$sql8 = "SELECT participant_name FROM participants WHERE participant_id = '".$value."'";
						$result8 = $con->query($sql8);
						$row = $result8->fetch_assoc();
						$grade = $row['participant_name'];
						?>
						<strong>GRADE 5 Councilor:</strong>  <?php if($grade == ""){echo "NO VOTE"; }else{echo $grade;} ?> <br>
						<?php
				}	
			}else{
			?>
			<strong>GRADE 5 Councilor:</strong> NO VOTE<br>
			<?php	
			}

	 
		}else if($glvl == 'grade 5'){
			if($grade_id != ""){
				foreach ($grade_id as $key => $value) {
					$sql8 = "SELECT participant_name FROM participants WHERE participant_id = '".$value."'";
						$result8 = $con->query($sql8);
						$row = $result8->fetch_assoc();
						$grade = $row['participant_name'];
						?>
						<strong>GRADE 6 Councilor:</strong>  <?php if($grade == ""){echo "NO VOTE"; }else{echo $grade;} ?> <br>
						<?php
				}	
			}else{
			?>
			<strong>GRADE 6 Councilor:</strong> NO VOTE<br>
			<?php	
			}
		}else if($glvl == 'grade 6'){
			if($grade_id != ""){
				foreach ($grade_id as $key => $value) {
					$sql8 = "SELECT participant_name FROM participants WHERE participant_id = '".$value."'";
						$result8 = $con->query($sql8);
						$row = $result8->fetch_assoc();
						$grade = $row['participant_name'];
						?>
						<strong>GRADE 7 Councilor:</strong>  <?php if($grade == ""){echo "NO VOTE"; }else{echo $grade;} ?> <br>
						<?php
				}
			}else{
			?>
			<strong>GRADE 7 Councilor:</strong> NO VOTE<br>
			<?php	
			}	
		 
		}else if($glvl == 'grade 7'){
			if($grade_id != ""){
				foreach ($grade_id as $key => $value) {
					$sql8 = "SELECT participant_name FROM participants WHERE participant_id = '".$value."'";
						$result8 = $con->query($sql8);
						$row = $result8->fetch_assoc();
						$grade = $row['participant_name'];
						?>
						<strong>GRADE 8 Councilor:</strong>  <?php if($grade == ""){echo "NO VOTE"; }else{echo $grade;} ?> <br>
						<?php
				}	
			}else{
			?>
			<strong>GRADE 8 Councilor:</strong> NO VOTE<br>
			<?php	
			}	 
		}else if($glvl == 'grade 8'){
			if($grade_id != ""){
				foreach ($grade_id as $key => $value) {
					$sql8 = "SELECT participant_name FROM participants WHERE participant_id = '".$value."'";
						$result8 = $con->query($sql8);
						$row = $result8->fetch_assoc();
						$grade = $row['participant_name'];
						?>
						<strong>GRADE 9 Councilor:</strong>  <?php if($grade == ""){echo "NO VOTE"; }else{echo $grade;} ?> <br>
						<?php
				}
			}else{
			?>
			<strong>GRADE 9 Councilor:</strong> NO VOTE<br>
			<?php	
			}		 
		}else if($glvl == 'grade 9'){
			if($grade_id != ""){
				foreach ($grade_id as $key => $value) {
					$sql8 = "SELECT participant_name FROM participants WHERE participant_id = '".$value."'";
						$result8 = $con->query($sql8);
						$row = $result8->fetch_assoc();
						$grade = $row['participant_name'];
						?>
						<strong>GRADE 10 Councilor:</strong>  <?php if($grade == ""){echo "NO VOTE"; }else{echo $grade;} ?> <br>
						<?php
				}		
			}else{
			?>
			<strong>GRADE 10 Councilor:</strong> NO VOTE<br>
			<?php	
			}		 
		}else if($glvl == 'grade 10'){
			if($grade_id != ""){
				foreach ($grade_id as $key => $value) {
					$sql8 = "SELECT participant_name FROM participants WHERE participant_id = '".$value."'";
						$result8 = $con->query($sql8);
						$row = $result8->fetch_assoc();
						$grade = $row['participant_name'];
						?>
						<strong>GRADE 11 Councilor:</strong>  <?php if($grade == ""){echo "NO VOTE"; }else{echo $grade;} ?> <br>
						<?php
				}	
			}else{
			?>
			<strong>GRADE 11 Councilor:</strong> NO VOTE<br>
			<?php	
			}		 
		}else if($glvl == 'grade 11'){
			if($grade_id != ""){
			foreach ($grade_id as $key => $value) {
				$sql8 = "SELECT participant_name FROM participants WHERE participant_id = '".$value."'";
					$result8 = $con->query($sql8);
					$row = $result8->fetch_assoc();
					$grade = $row['participant_name'];
					?>
					<strong>GRADE 12 Councilor:</strong>  <?php if($grade == ""){echo "NO VOTE"; }else{echo $grade;} ?> <br>
					<?php
			}
			}else{
			?>
			<strong>GRADE 12 Councilor:</strong> NO VOTE<br>
			<?php	
			}		
		}
		?>
	</div>
</div>