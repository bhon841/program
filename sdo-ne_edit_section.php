<?php 
	require "connection.php";

	$section = $_POST['section'];
	$g       = $_POST['gl'];

	$sql = "SELECT * FROM grade_level WHERE section = '".$section."' AND grade_level = '".$g."'";
	$result = $con->query($sql);
	$row = $result->fetch_assoc();
	$glvl 	= $row['grade_level'];
	$sec  	= $row['section'];
	$voters = $row['number_of_voters'];
	
 ?>
 <h4 align="center"><?php echo $glvl; ?></h4>
Section
<input type="hidden" id="lvl" class="form-control" value="<?php echo $glvl; ?>">
 <input type="hidden" id="section_old" class="form-control" value="<?php echo $section; ?>">
 <input type="text" id="nsection" class="form-control" value="<?php echo $section; ?>">
  <span id="err_sec1" style="color:red;"></span>
 <br>
Number of Voters
 <input type="number" id="voters" class="form-control" value="<?php echo $voters; ?>">
 <span id="err_voter" style="color:red;"></span>