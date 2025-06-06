<?php 
  require "connection.php";

    $get = "SELECT * FROM school";
      $result1 = $con->query($get);
      $row = $result1->fetch_assoc();
        $vs = $row['validate_status'];


  if($vs == 0 || $vs == 'close'){
    header("location:index.php");
  }

  $grade = $_GET['grade'];
  $grade = "grade ".$grade;

	$check_type = "SELECT * FROM ballot_type";
	$get_res = $con->query($check_type);
	$row = $get_res->fetch_assoc();
	$type = $row['type'];
	if($type == 'with_img'){
 ?>
<br>
	<div class="row" align="left">
		<div class="col-sm-12 col-lg-2">
		<a href="sdo-ne_vote.php"><button class="btn btn-success"><img src="img/back.png" width="40px"></button></a>
		</div>
	</div>
	<div class="row" align="left">
		<div class="col-sm-12 col-lg-2">
		</div>
		<div class="col-sm-12 col-lg-7">
		<?php 
			$p = "SELECT * FROM participants WHERE participant_position = 'President'";
				$p_res = $con->query($p);
				$countp = $p_res->num_rows;
					if($countp > 0){
					?>
							<h1 style="background:skyblue; width:100%; border-radius:3px; padding:3px;">PRESIDENT</h1>
					<?php	
					}else{
					
					}
		 ?>
		<div class="row">
		<?php 
		$get_pres = "SELECT * FROM participants WHERE participant_position = 'President'";
			$pres_res = $con->query($get_pres);

			while($row = $pres_res->fetch_assoc()){
				$participant = $row['participant_name'];
				$img = $row['image'];
				$par_id = $row['participant_id'];
			?>

				<div class="col-4">
				<div align="center">
					<label>
						<input type="radio" name="pres" id="pres" value="<?php echo $par_id; ?>">
						<?php 
						if($img == 'none'){
						 ?>
						 <img src="img/default.jpg" width="150px">
						 <?php
						}else{
						?>
						<img src="<?php echo $img; ?>" width="150px">

						<input type="hidden" id="pres" value="<?php echo $participant; ?>">
						<?php	
						}
						?>
						<br>
						<strong style="font-size: 18px;"><?php echo $participant; ?></strong>
					</label>
					 <br>
				</div>
				</div>
			
			<?php
			}
		 ?>
		</div>
		</div>
		<div class="col-sm-12 col-lg-3">

		</div>	
	</div>

	<div class="row" >
		<div class="col-sm-12 col-lg-2">

		</div>
		<div class="col-sm-12 col-lg-7"align="left">
		<?php 
			$vp = "SELECT * FROM participants WHERE participant_position = 'Vice-President'";
				$vp_res = $con->query($vp);
				$countvp = $vp_res->num_rows;
					if($countvp > 0){
					?>
							<h1 style="background:skyblue; width:100%; border-radius:3px; padding:3px;">VICE PRESIDENT</h1>
					<?php	
					}else{
					
					}
		 ?>
		<div class="row" align="center">
		<?php 
		$get_vpres = "SELECT * FROM participants WHERE participant_position = 'Vice-President'";
			$vpres_res = $con->query($get_vpres);
			while($row = $vpres_res->fetch_assoc()){
				$participant = $row['participant_name'];
				$img = $row['image'];
				$par_id = $row['participant_id'];
			?>

				<div class="col-4" align="center">
				<div align="center" align="center">
					<label>
						<input type="radio" name="vpres" id="vpres" value="<?php echo $par_id; ?>">
						<?php 
						if($img == 'none'){
						 ?>
						 <img src="img/default.jpg" width="150px">
						 <?php
						}else{
						?>
						<img src="<?php echo $img; ?>" width="150px">
						<input type="hidden" id="vpres" value="<?php echo $participant; ?>">
						<?php	
						}
						?>
						<br>
						<strong><?php echo $participant; ?></strong>
					</label>
					 <br>
				</div>
				</div>
			
			<?php
			}
		 ?>
		</div>
		</div>	
		<div class="col-sm-12 col-lg-3">

		</div>	
	</div>

	<div class="row" align="left">
		<div class="col-sm-12 col-lg-2">

		</div>
		<div class="col-sm-12 col-lg-7">
		<?php 
			$sec = "SELECT * FROM participants WHERE participant_position = 'secretary'";
				$sec_res = $con->query($sec);
				$countsec = $sec_res->num_rows;
					if($countsec > 0){
					?>
						<h1 style="background:skyblue; width:100%; border-radius:3px; padding:3px;">SECRETARY</h1>
					<?php	
					}else{
					
					}
		 ?>		<div class="row">
		<?php 
		$get_sec = "SELECT * FROM participants WHERE participant_position = 'secretary'";
			$sec_res = $con->query($get_sec);
			while($row = $sec_res->fetch_assoc()){
				$participant = $row['participant_name'];
				$img = $row['image'];
				$par_id = $row['participant_id'];
			?>

				<div class="col-4">
				<div align="center">
					<label>
						<input type="radio" name="sec" id="sec" value="<?php echo $par_id; ?>">
						<?php 
						if($img == 'none'){
						 ?>
						 <img src="img/default.jpg" width="150px">
						 <?php
						}else{
						?>
						<img src="<?php echo $img; ?>" width="150px">
						
						<?php	
						}
						?>
						<br>
						<input type="hidden" id="sec" value="<?php echo $participant; ?>">
						<strong><?php echo $participant; ?></strong>
					</label>
					 <br>
				</div>
				</div>
			
			<?php
			}
		 ?>
		</div>
		</div>	
		<div class="col-sm-12 col-lg-2">

		</div>	
	</div>	
	<div class="row" align="left">
		<div class="col-sm-12 col-lg-2">

		</div>
		<div class="col-sm-12 col-lg-7">
		<?php 
			$tres = "SELECT * FROM participants WHERE participant_position = 'treasurer'";
				$tres_res = $con->query($tres);
				$counttres = $tres_res->num_rows;
					if($counttres > 0){
					?>
							<h1 style="background:skyblue; width:100%; border-radius:3px; padding:3px;">TREASURER</h1>
					<?php	
					}else{
					
					}
		 ?>
		<div class="row">
		<?php 
		$get_treasurer = "SELECT * FROM participants WHERE participant_position = 'treasurer'";
			$treasurer_res = $con->query($get_treasurer);
			while($row = $treasurer_res->fetch_assoc()){
				$participant = $row['participant_name'];
				$img = $row['image'];
				$par_id = $row['participant_id'];
			?>

				<div class="col-4">
				<div align="center">
					<label>
						<input type="radio" name="treasurer" id="treasurer" value="<?php echo $par_id; ?>">
						<?php 
						if($img == 'none'){
						 ?>
						 <img src="img/default.jpg" width="150px">
						 <?php
						}else{
						?>
						<img src="<?php echo $img; ?>" width="150px">
						
						<?php	
						}
						?>
						<br>
						<input type="hidden" id="treasurer" value="<?php echo $participant; ?>">
						<strong><?php echo $participant; ?></strong>
					</label>
					 <br>
				</div>
				</div>
			
			<?php
			}
		 ?>
		</div>
		</div>	
		<div class="col-sm-12 col-lg-2">

		</div>	
	</div>

	<div class="row" align="left">
		<div class="col-sm-12 col-lg-2">

		</div>
		<div class="col-sm-12 col-lg-7">
		<?php 
			$au = "SELECT * FROM participants WHERE participant_position = 'auditor'";
				$au_res = $con->query($au);
				$countau = $au_res->num_rows;
					if($countau > 0){
					?>
							<h1 style="background:skyblue; width:100%; border-radius:3px; padding:3px;">AUDITOR</h1>
					<?php	
					}else{
					
					}
		 ?>
		<div class="row">
		<?php 
		$get_auditor = "SELECT * FROM participants WHERE participant_position = 'auditor'";
			$auditor_res = $con->query($get_auditor);
			while($row = $auditor_res->fetch_assoc()){
				$participant = $row['participant_name'];
				$img = $row['image'];
				$par_id = $row['participant_id'];
			?>

				<div class="col-4">
				<div align="center">
					<label>
						<input type="radio" name="auditor" id="auditor" value="<?php echo $par_id; ?>">
						<?php 
						if($img == 'none'){
						 ?>
						 <img src="img/default.jpg" width="150px">
						 <?php
						}else{
						?>
						<img src="<?php echo $img; ?>" width="150px">
						
						<?php	
						}
						?>
						<br>
						<input type="hidden" id="auditor" value="<?php echo $participant; ?>">
						<strong><?php echo $participant; ?></strong>
					</label>
					 <br>
				</div>
				</div>
			
			<?php
			}
		 ?>
		</div>
		</div>	
		<div class="col-sm-12 col-lg-2">

		</div>	
	</div>	

	<div class="row" align="left">
		<div class="col-sm-12 col-lg-2">

		</div>
		<div class="col-sm-12 col-lg-7">
		<?php 
			$pio = "SELECT * FROM participants WHERE participant_position = 'Public Information Officer'";
				$pio_res = $con->query($pio);
				$countpio = $pio_res->num_rows;
					if($countpio > 0){
					?>
							<h1 style="background:skyblue; width:100%; border-radius:3px; padding:3px;">PUBLIC INFORMATION OFFICER</h1>
					<?php	
					}else{
					
					}
		 ?>
		<div class="row">
		<?php 
		$get_pio = "SELECT * FROM participants WHERE participant_position = 'Public Information Officer'";
			$pio_res = $con->query($get_pio);
			while($row = $pio_res->fetch_assoc()){
				$participant = $row['participant_name'];
				$img = $row['image'];
				$par_id = $row['participant_id'];
			?>

				<div class="col-4">
				<div align="center">
					<label>
						<input type="radio" name="pio" id="pio" value="<?php echo $par_id; ?>">
						<?php 
						if($img == 'none'){
						 ?>
						 <img src="img/default.jpg" width="150px">
						 <?php
						}else{
						?>
						<img src="<?php echo $img; ?>" width="150px">
						
						<?php	
						}
						?>
						<br>
						<input type="hidden" id="pio" value="<?php echo $participant; ?>">
						<strong><?php echo $participant; ?></strong>
					</label>
					 <br>
				</div>
				</div>
			
			<?php
			}
		 ?>
		</div>
		</div>	
		<div class="col-sm-12 col-lg-2">

		</div>	
	</div>	

	<div class="row" align="left">
		<div class="col-sm-12 col-lg-2">

		</div>
		<div class="col-sm-12 col-lg-7">
		<?php 
			$po = "SELECT * FROM participants WHERE participant_position = 'Peace Officer'";
				$po_res = $con->query($po);
				$countpo = $po_res->num_rows;
					if($countpo > 0){
					?>
							<h1 style="background:skyblue; width:100%; border-radius:3px; padding:3px;">PEACE OFFICER</h1>
					<?php	
					}else{
					
					}
		 ?>
		
		<div class="row">
		<?php 
		$get_po = "SELECT * FROM participants WHERE participant_position = 'Peace Officer'";
			$po_res = $con->query($get_po);
			while($row = $po_res->fetch_assoc()){
				$participant = $row['participant_name'];
				$img = $row['image'];
				$par_id = $row['participant_id'];
			?>

				<div class="col-4">
				<div align="center">
					<label>
						<input type="radio" name="po" id="po" value="<?php echo $par_id; ?>">
					<?php 
						if($img == 'none'){
						 ?>
						 <img src="img/default.jpg" width="150px">
						 <?php
						}else{
						?>
						<img src="<?php echo $img; ?>" width="150px">
						
						<?php	
						}
						?>
						<br>
						<input type="hidden" id="po" value="<?php echo $participant; ?>">
						<strong><?php echo $participant; ?></strong>
					</label>
					 <br>
				</div>
				</div>
			
			<?php
			}
		 ?>
		</div>
		</div>	
		<div class="col-sm-12 col-lg-2">

		</div>	
	</div>

	<div class="row" align="left">
		<div class="col-sm-12 col-lg-2">

		</div>
		<div class="col-sm-12 col-lg-7">
		<h1 style="background:skyblue; width:100%; border-radius:3px; padding:3px;">
			<?php 
			if($grade == "grade 3"){ 
				$grade = "Grade 4 Councilor";
				$c = "SELECT * FROM participants WHERE participant_position = '$grade'";
					$c_res = $con->query($c);
					$count = $c_res->num_rows;
					if($count > 0){
						echo strtoupper($grade);
					}else{
						
					}	
			}else if($grade == "grade 4"){
				$grade = "Grade 5 Councilor";
				$c = "SELECT * FROM participants WHERE participant_position = '$grade'";
					$c_res = $con->query($c);
					$count = $c_res->num_rows;
					if($count > 0){
						echo strtoupper($grade);
					}else{
						
					}	
			}else if($grade == "grade 5"){
				$grade = "Grade 6 Councilor";	
				$c = "SELECT * FROM participants WHERE participant_position = '$grade'";
					$c_res = $con->query($c);
					$count = $c_res->num_rows;
					if($count > 0){
						echo strtoupper($grade);
					}else{
						
					}								
			}else if($grade == "grade 6"){
				$grade = "Grade 7 Representative";
				$c = "SELECT * FROM participants WHERE participant_position = '$grade'";
					$c_res = $con->query($c);
					$count = $c_res->num_rows;
					if($count > 0){
						echo strtoupper($grade);
					}else{
						
					}				
			}else if($grade == "grade 7"){
				$grade = "Grade 8 Representative";				
				$c = "SELECT * FROM participants WHERE participant_position = '$grade'";
					$c_res = $con->query($c);
					$count = $c_res->num_rows;
					if($count > 0){
						echo strtoupper($grade);
					}else{
						$grade = "Grade 7 Representative";
						echo strtoupper($grade);	
					}	
			}else if($grade == "grade 8"){
				$grade = "Grade 9 Representative";				
				$c = "SELECT * FROM participants WHERE participant_position = '$grade'";
					$c_res = $con->query($c);
					$count = $c_res->num_rows;
					if($count > 0){
					 echo strtoupper($grade);
					}else{

					}	
			}else if($grade == "grade 9"){
				$grade = "Grade 10 Representative";				
				$c = "SELECT * FROM participants WHERE participant_position = '$grade'";
					$c_res = $con->query($c);
					$count = $c_res->num_rows;
					if($count > 0){
						echo strtoupper($grade);
					}else{
						
					}	
			}else if($grade == "grade 10"){
				$grade = "Grade 11 Representative";
				$c = "SELECT * FROM participants WHERE participant_position = '$grade'";
					$c_res = $con->query($c);
					$count = $c_res->num_rows;
					if($count > 0){
						echo strtoupper($grade);
					}else{
					
					}			
				
			}else if($grade == "grade 11"){
				$grade = "Grade 12 Representative";
				$c = "SELECT * FROM participants WHERE participant_position = '$grade' AND pid != 0";
					$c_res = $con->query($c);
					$count = $c_res->num_rows;
					if($count > 0){
						echo strtoupper($grade);
					}else{
					$grade = "Grade 11 Representative";	
					echo strtoupper($grade);
					}
			}else if($grade == "grade 12"){
				$grade = "";				
				echo strtoupper($grade);
			}

		?>
		</h1>
		<div class="row">
		<?php 
		$get_grade = "SELECT * FROM participants WHERE participant_position = '$grade'";
			$grade_res = $con->query($get_grade);
			while($row = $grade_res->fetch_assoc()){
				$participant = $row['participant_name'];
				$img = $row['image'];
				$par_id = $row['participant_id'];
			?>

				<div class="col-4">
				<div align="center">
					<label>

						<input class="single-checkbox" type="checkbox" name="grades[]" id="grades[]" value="<?php echo $par_id; ?>">
											<?php 
						if($img == 'none'){
						 ?>
						 <img src="img/default.jpg" width="150px">
						 <?php
						}else{
						?>
						<img src="<?php echo $img; ?>" width="150px">
						
						<?php	
						}
						?>
						<br>
						<input type="hidden" id="grades" value="<?php echo $participant; ?>">
						<strong><?php echo $participant; ?></strong>
					</label>
					 <br>
				</div>
				</div>
			
			<?php
			}
		$check_count = "SELECT * FROM school";
			$res_check = $con->query($check_count);
					$row = $res_check->fetch_assoc();
					$rep = $row['rep'];
				
		 ?>
		 <script type="text/javascript">
			$('.single-checkbox').on('change', function() {
			   if($('.single-checkbox:checked').length > <?php echo $rep; ?>) {
			       this.checked = false;
			   }
			});
	 </script>
		</div>
		</div>	
		<div class="col-sm-12 col-lg-2">
		</div>	
	</div>
	<?php 
	}else{
	?>
	<div class="row" align="left">
		<div class="col-sm-12 col-lg-2">
		</div>
		<div class="col-sm-12 col-lg-7">
		<h1 style="background:skyblue; width:100%; border-radius:3px; padding:3px;">PRESIDENT</h1>
		<div class="row" align="center">
		<?php 
		$get_pres = "SELECT * FROM participants WHERE participant_position = 'President'";
			$pres_res = $con->query($get_pres);

			while($row = $pres_res->fetch_assoc()){
				$participant = $row['participant_name'];
				
				$par_id = $row['participant_id'];
			?>

				<div class="col-4" align="center">

					<strong style="font-size: 18px;"><?php echo $participant; ?></strong><br>
					<input type="radio" name="pres" id="pres" value="<?php echo $par_id; ?>"><br><br>
				</div>
			
			<?php
			}
		 ?>
		</div>
		</div>
		<div class="col-sm-12 col-lg-3">

		</div>	
	</div>

	<div class="row" >
		<div class="col-sm-12 col-lg-2">

		</div>
		<div class="col-sm-12 col-lg-7"align="left">
		<h1 style="background:skyblue; width:100%; border-radius:3px; padding:3px;">VICE-PRESIDENT</h1>
		<div class="row" align="center">
		<?php 
		$get_vpres = "SELECT * FROM participants WHERE participant_position = 'Vice-President'";
			$vpres_res = $con->query($get_vpres);
			while($row = $vpres_res->fetch_assoc()){
				$participant = $row['participant_name'];
				
				$par_id = $row['participant_id'];
			?>

				<div class="col-4" align="center">
					<strong><?php echo $participant; ?></strong><br>
					<input type="radio" name="vpres" id="vpres" value="<?php echo $par_id; ?>"><br><br>
					 <br>
				</div>
			
			<?php
			}
		 ?>
		</div>
		</div>	
		<div class="col-sm-12 col-lg-3">

		</div>	
	</div>

	<div class="row" align="left">
		<div class="col-sm-12 col-lg-2">

		</div>
		<div class="col-sm-12 col-lg-7">
		<h1 style="background:skyblue; width:100%; border-radius:3px; padding:3px;">SECRETARY</h1>
		<div class="row" align="center">
		<?php 
		$get_sec = "SELECT * FROM participants WHERE participant_position = 'secretary'";
			$sec_res = $con->query($get_sec);
			while($row = $sec_res->fetch_assoc()){
				$participant = $row['participant_name'];
				
				$par_id = $row['participant_id'];
			?>

				<div class="col-4">
					<strong><?php echo $participant; ?></strong><br>
					<input type="radio" name="sec" id="sec" value="<?php echo $par_id; ?>"><br><br>
				</div>
			
			<?php
			}
		 ?>
		</div>
		</div>	
		<div class="col-sm-12 col-lg-2">

		</div>	
	</div>	
	<div class="row" align="left">
		<div class="col-sm-12 col-lg-2">

		</div>
		<div class="col-sm-12 col-lg-7">
		<h1 style="background:skyblue; width:100%; border-radius:3px; padding:3px;">TREASURER</h1>
		<div class="row" align="center">
		<?php 
		$get_treasurer = "SELECT * FROM participants WHERE participant_position = 'treasurer'";
			$treasurer_res = $con->query($get_treasurer);
			while($row = $treasurer_res->fetch_assoc()){
				$participant = $row['participant_name'];
				
				$par_id = $row['participant_id'];
			?>

				<div class="col-4">
					<strong><?php echo $participant; ?></strong><br>
					<input type="radio" name="treasurer" id="treasurer" value="<?php echo $par_id; ?>"><br><br>
				</div>
			
			<?php
			}
		 ?>
		</div>
		</div>	
		<div class="col-sm-12 col-lg-2">

		</div>	
	</div>

	<div class="row" align="left">
		<div class="col-sm-12 col-lg-2">

		</div>
		<div class="col-sm-12 col-lg-7">
		<h1 style="background:skyblue; width:100%; border-radius:3px; padding:3px;">AUDITOR</h1>
		<div class="row" align="center">
		<?php 
		$get_auditor = "SELECT * FROM participants WHERE participant_position = 'auditor'";
			$auditor_res = $con->query($get_auditor);
			while($row = $auditor_res->fetch_assoc()){
				$participant = $row['participant_name'];
				
				$par_id = $row['participant_id'];
			?>

				<div class="col-4">
					<strong><?php echo $participant; ?></strong><br>
					<input type="radio" name="auditor" id="auditor" value="<?php echo $par_id; ?>"><br><br>
				</div>
			
			<?php
			}
		 ?>
		</div>
		</div>	
		<div class="col-sm-12 col-lg-2">

		</div>	
	</div>	

	<div class="row" align="left">
		<div class="col-sm-12 col-lg-2">

		</div>
		<div class="col-sm-12 col-lg-7">
		<h1 style="background:skyblue; width:100%; border-radius:3px; padding:3px;">PUBLIC INFORMATION OFFICER</h1>
		<div class="row" align="center">
		<?php 
		$get_pio = "SELECT * FROM participants WHERE participant_position = 'Public Information Officer'";
			$pio_res = $con->query($get_pio);
			while($row = $pio_res->fetch_assoc()){
				$participant = $row['participant_name'];
				
				$par_id = $row['participant_id'];
			?>

				<div class="col-4">
					<strong><?php echo $participant; ?></strong><br>
					<input type="radio" name="pio" id="pio" value="<?php echo $par_id; ?>"><br><br>
				</div>
			
			<?php
			}
		 ?>
		</div>
		</div>	
		<div class="col-sm-12 col-lg-2">

		</div>	
	</div>	

	<div class="row" align="left">
		<div class="col-sm-12 col-lg-2">

		</div>
		<div class="col-sm-12 col-lg-7">
		<h1 style="background:skyblue; width:100%; border-radius:3px; padding:3px;">PEACE OFFICER</h1>
		<div class="row" align="center">
		<?php 
		$get_po = "SELECT * FROM participants WHERE participant_position = 'Peace Officer'";
			$po_res = $con->query($get_po);
			while($row = $po_res->fetch_assoc()){
				$participant = $row['participant_name'];
				
				$par_id = $row['participant_id'];
			?>

				<div class="col-4">
					<strong><?php echo $participant; ?></strong><br>
					<input type="radio" name="po" id="po" value="<?php echo $par_id; ?>"><br><br>
				</div>
			
			<?php
			}
		 ?>
		</div>
		</div>	
		<div class="col-sm-12 col-lg-2">

		</div>	
	</div>

	<div class="row" align="left">
		<div class="col-sm-12 col-lg-2">

		</div>
		<div class="col-sm-12 col-lg-7">
		<h1 style="background:skyblue; width:100%; border-radius:3px; padding:3px;">
			<?php 
			if($grade == "grade 4"){ 
				$grade = "Grade 4 Councilor";
				echo strtoupper($grade);
			}else if($grade == "grade 5"){
				$grade = "Grade 5 Councilor";				
				echo strtoupper($grade);
			}else if($grade == "grade 6"){
				$grade = "Grade 6 Councilor";				
				echo strtoupper($grade);
			}/*else if($grade == "grade 7"){
				$grade = "Grade 7 Representative";				
				echo strtoupper($grade);
			}*/else if($grade == "grade 8"){
				$grade = "Grade 8 Representative";				
				echo strtoupper($grade);
			}else if($grade == "grade 9"){
				$grade = "Grade 9 Representative";				
				echo strtoupper($grade);
			}else if($grade == "grade 10"){
				$grade = "Grade 10 Representative";				
				echo strtoupper($grade);
			}/*else if($grade == "grade 11"){
				$grade = "Grade 11 Representative";				
				echo strtoupper($grade);
			}*/else if($grade == "grade 12"){
				$grade = "Grade 12 Representative";				
				echo strtoupper($grade);
			}

		?>
		</h1>
		<div class="row" align="center">
		<?php 
		$get_grade = "SELECT * FROM participants WHERE participant_position = '$grade'";
			$grade_res = $con->query($get_grade);
			while($row = $grade_res->fetch_assoc()){
				$participant = $row['participant_name'];
				
				$par_id = $row['participant_id'];
			?>

				<div class="col-4">
					<strong><?php echo $participant; ?></strong><br>
					<input type="checkbox" name="grades[]" id="grades[]" value="<?php echo $par_id; ?>"><br><br>
				</div>
			
			<?php
			}
		 ?>
		</div>
		</div>	
		<div class="col-sm-12 col-lg-2">

		</div>	
	</div>
	<?php
	}
	 ?>	

	<br><br>
	<button class="btn btn-primary" id="vote_now" onclick="vote_now()" style="width:350px; height: 70px; font-size:25px;"><strong>CAST VOTE</strong></button>
	<br><br><br><br>			
</div>