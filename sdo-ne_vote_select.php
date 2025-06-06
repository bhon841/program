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

 ?>
<div class="row">
	<div class="col-sm-12 col-lg-4" align="left">

	</div>
	<div class="col-sm-12 col-lg-4">
	 <h1><strong style="text-decoration: underline;">GRADE <?php echo $grade; ?></strong></h1>
	 <br>
	 <h3>SELECT SECTION</h3>
		<select id="section" class="form-control" style="height: 50px; font-size: 25px;">
		<?php 
			$grade = 'grade '.$grade;
			$sql = "SELECT * FROM grade_level WHERE grade_level = '$grade'";
				$result = $con->query($sql);
				while($row = $result->fetch_assoc()){
					$section = $row['section'];
					$vn      = $row['number_of_voters'];
					if($section != ""){
				?>
				<option value="<?php echo $section.','.$vn; ?>"><?php echo $section; ?></option>
				<?php
				}
				}
		 ?>		
		</select>
		<input type="hidden" id="glvl" value="<?php echo $grade; ?>">
		
		<br>
		<h3>VOTER NUMBER</h3>
		<input type="number" min="0" style="height: 100px; width: 150px; text-align: center; font-size: 60px; font-weight: bold;" id="vote_no">
	</div>
</div>
<br><br>
<button onclick="vote_start()" class="btn btn-primary btn-lg" style="width:300px; height: 80px; font-size: 40px; font-weight: bold;">START</button><br><br>

		<a href="sdo-ne_vote.php"><button class="btn btn-success"><img src="img/back.png" width="40px"></button></a>