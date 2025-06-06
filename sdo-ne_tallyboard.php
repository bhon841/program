
<?php 
	require "connection.php";

	$sql = "SELECT * FROM school";
	$result = $con->query($sql);
	$row = $result->fetch_assoc();
		$stype = $row['school_type'];
		$status = $row['validate_status'];

		if($stype == "Elementary (Grade 4-6)"){
		?>
		<script type="text/javascript">
			$(document).ready(function(){
			setInterval(function(){
				$('.load_page').load('sdo-ne_tallyboard_elem.php').fadeIn('fast');
			}, 500);

		});
		</script>
		<?php if($status == 'close'){
		?>
		<!-- <div align="center"><a href = "sdo-ne_download_elementary.php"><button style="width:300px" class = "btn btn-success btn-md" onclick="window.open('sdo-ne_sdo-ne_sdo-ne_print_elementary.php');">DOWNLOAD RESULTS</button></a></div>	 -->
		<br>		
		<?php	
		} ?>
		<?php
		}else if($stype == "Integrated School (Grade 7-12)"){
		?>
		<script type="text/javascript">
			$(document).ready(function(){
			setInterval(function(){
				$('.load_page').load('sdo-ne_tallyboard_integrated.php').fadeIn('fast');
			}, 500);

		});
		</script>
		<?php if($status == 'close'){
		?>
		<!-- <div align="center"><a href = "sdo-ne_download_integrated.php"><button style="width:300px" class = "btn btn-success btn-md" onclick="window.open('sdo-ne_print_integrated.php');">DOWNLOAD RESULTS</button></a></div>	 -->
		<br>
		<?php	
		} ?>
		<?php
		}else if($stype == "Junior High School (Grade 7-10)"){
		?>
		<script type="text/javascript">
			$(document).ready(function(){
			setInterval(function(){
				$('.load_page').load('sdo-ne_tallyboard_junior.php').fadeIn('fast');
			}, 500);

		});
		</script>
		<h3 align="center">TALLY BOARD</h3>
		<?php if($status == 'close'){
		?>
		<!-- <div align="center"><a href = "sdo-ne_download_junior.php"><button style="width:300px" class = "btn btn-success btn-md" onclick="window.open('print_junior.php');">DOWNLOAD RESULTS</button></a></div>	 -->
		<br>
		<?php	
		} ?>

		<?php
		}else if($stype == "Senior High School (Grade 11-12)"){
		?>
		<script type="text/javascript">
			$(document).ready(function(){
			setInterval(function(){
				$('.load_page').load('sdo-ne_tallyboard_senior.php').fadeIn('fast');
			}, 500);

		});
		</script>
		<?php if($status == 'close'){
		?>
		<!-- <div align="center"><a href = "sdo-ne_download_senior.php"><button style="width:300px" class = "btn btn-success btn-md" onclick="window.open('sdo-ne_print_senior.php');">DOWNLOAD RESULTS</button></a></div> -->	
		<br>		
		<?php	
		} ?>		
		<?php
		}
 ?>

 <div class="container">
 	<div class="load_page"></div>
 
 </div>