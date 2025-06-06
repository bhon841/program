<?php 
require "connection.php";
 ?>
	<div class="row">
 		<div class="col-sm-12 col-lg-6" align="center">
		 		<table style="border:solid 2px; width: 500px; font-size:14px;">
		 			<tr align="center" style="background: silver">
		 				<th></th>
		 				<th width="200px">PRESIDENT</th>
		 				
		 				<th>TOTAL VOTE</th>
		 			</tr>
				<?php
				$get_participant = "SELECT * FROM participants, partylist WHERE participants.pid = partylist.pid AND participants.participant_position = 'President'";
				$result2 = $con->query($get_participant);
				while($row = $result2->fetch_assoc()){
					$name     = $row['participant_name'];
					
					$total    = $row['total_votes'];
					$img      = $row['image'];
				?>
	 				<tr align="center" style="background: white">
	 					<td>
	 						<?php 
	 						if($img == "none"){
	 						?>
	 						<img src="img/default.jpg" width='30px'>
	 						<?php
	 						}else{
	 						?>
	 						<img src="<?php echo $img; ?>" width="30">
	 						<?php
	 						} 
	 						?>
	 					</td>
	 					<td><?php echo $name; ?></td>
	 					
	 					<td><?php echo $total; ?></td>
	 				</tr>
	 			
				<?php
				}
				$get_participant2 = "SELECT * FROM participants WHERE participant_position = 'President' AND pid = '0'";
				$result3 = $con->query($get_participant2);
				while($row = $result3->fetch_assoc()){
					$name     = $row['participant_name'];
					
					$total    = $row['total_votes'];
					$img      = $row['image'];
				?>
	 				<tr align="center" style="background: white">
	 					<td>
	 						<?php 
	 						if($img == "none"){
	 						?>
	 						<img src="img/default.jpg" width='30px'>
	 						<?php
	 						}else{
	 						?>
	 						<img src="<?php echo $img; ?>" width="30">
	 						<?php
	 						} 
	 						?>
	 					</td>
	 					<td><?php echo $name; ?></td>
	 					
	 					<td><?php echo $total; ?></td>
	 				</tr>
	 			
				<?php
				}				
				?>
			</table>
		 		<table style="border:solid 2px; width: 500px; font-size:14px;">
		 			<tr align="center" style="background: silver">
		 				<th></th>
		 				<th width="200px">VICE PRESIDENT</th>
		 				
		 				<th>TOTAL VOTE</th>
		 			</tr>
				<?php
				$get_participant = "SELECT * FROM participants, partylist WHERE participants.pid = partylist.pid AND participants.participant_position = 'Vice-President'";
				$result2 = $con->query($get_participant);
				while($row = $result2->fetch_assoc()){
					$name     = $row['participant_name'];
					
					$total    = $row['total_votes'];
					$img      = $row['image'];
				?>
	 				<tr align="center" style="background: white">
	 					<td>
	 						<?php 
	 						if($img == "none"){
	 						?>
	 						<img src="img/default.jpg" width='30px'>
	 						<?php
	 						}else{
	 						?>
	 						<img src="<?php echo $img; ?>" width="30">
	 						<?php
	 						} 
	 						?>
	 					</td>
	 					<td><?php echo $name; ?></td>
	 					
	 					<td><?php echo $total; ?></td>
	 				</tr>
	 			
				<?php
				}
				$get_participant2 = "SELECT * FROM participants WHERE participant_position = 'Vice President' AND pid = '0'";
				$result3 = $con->query($get_participant2);
				while($row = $result3->fetch_assoc()){
					$name     = $row['participant_name'];
					
					$total    = $row['total_votes'];
					$img      = $row['image'];
				?>
	 				<tr align="center" style="background: white">
	 					<td>
	 						<?php 
	 						if($img == "none"){
	 						?>
	 						<img src="img/default.jpg" width='30px'>
	 						<?php
	 						}else{
	 						?>
	 						<img src="<?php echo $img; ?>" width="30">
	 						<?php
	 						} 
	 						?>
	 					</td>
	 					<td><?php echo $name; ?></td>
	 					
	 					<td><?php echo $total; ?></td>
	 				</tr>
	 			
				<?php
				}				
				?>	
			</table>
		 		<table style="border:solid 2px; width: 500px; font-size:14px;">
		 			<tr align="center" style="background: silver">
		 				<th></th>
		 				<th width="200px">SECRETARY</th>
		 				
		 				<th>TOTAL VOTE</th>
		 			</tr>
				<?php
				$get_participant = "SELECT * FROM participants, partylist WHERE participants.pid = partylist.pid AND participants.participant_position = 'secretary'";
				$result2 = $con->query($get_participant);
				while($row = $result2->fetch_assoc()){
					$name     = $row['participant_name'];
					
					$total    = $row['total_votes'];
					$img      = $row['image'];
				?>
	 				<tr align="center" style="background: white">
	 					<td>
	 						<?php 
	 						if($img == "none"){
	 						?>
	 						<img src="img/default.jpg" width='30px'>
	 						<?php
	 						}else{
	 						?>
	 						<img src="<?php echo $img; ?>" width="30">
	 						<?php
	 						} 
	 						?>
	 					</td>
	 					<td><?php echo $name; ?></td>
	 					
	 					<td><?php echo $total; ?></td>
	 				</tr>
	 			
				<?php
				}
				$get_participant2 = "SELECT * FROM participants WHERE participant_position = 'secretary' AND pid = '0'";
				$result3 = $con->query($get_participant2);
				while($row = $result3->fetch_assoc()){
					$name     = $row['participant_name'];
					
					$total    = $row['total_votes'];
					$img      = $row['image'];
				?>
	 				<tr align="center" style="background: white">
	 					<td>
	 						<?php 
	 						if($img == "none"){
	 						?>
	 						<img src="img/default.jpg" width='30px'>
	 						<?php
	 						}else{
	 						?>
	 						<img src="<?php echo $img; ?>" width="30">
	 						<?php
	 						} 
	 						?>
	 					</td>
	 					<td><?php echo $name; ?></td>
	 					
	 					<td><?php echo $total; ?></td>
	 				</tr>
	 			
				<?php
				}				
				?>			 
				</table>
						<table style="border:solid 2px; width: 500px; font-size:14px;">
		 			<tr align="center" style="background: silver">
		 				<th></th>
		 				<th width="200px">TREASURER</th>
		 				
		 				<th>TOTAL VOTE</th>
		 			</tr>
				<?php
				$get_participant = "SELECT * FROM participants, partylist WHERE participants.pid = partylist.pid AND participants.participant_position = 'treasurer'";
				$result2 = $con->query($get_participant);
				while($row = $result2->fetch_assoc()){
					$name     = $row['participant_name'];
					
					$total    = $row['total_votes'];
					$img      = $row['image'];
				?>
	 				<tr align="center" style="background: white">
	 					<td>
	 						<?php 
	 						if($img == "none"){
	 						?>
	 						<img src="img/default.jpg" height="25px">
	 						<?php
	 						}else{
	 						?>
	 						<img src="<?php echo $img; ?>" width="30">
	 						<?php
	 						} 
	 						?>
	 					</td>
	 					<td><?php echo $name; ?></td>
	 					
	 					<td><?php echo $total; ?></td>
	 				</tr>
	 			
				<?php
				}
				$get_participant2 = "SELECT * FROM participants WHERE participant_position = 'treasurer' AND pid = '0'";
				$result3 = $con->query($get_participant2);
				while($row = $result3->fetch_assoc()){
					$name     = $row['participant_name'];
					
					$total    = $row['total_votes'];
					$img      = $row['image'];
				?>
	 				<tr align="center" style="background: white">
	 					<td>
	 						<?php 
	 						if($img == "none"){
	 						?>
	 						<img src="img/default.jpg" height="25px">
	 						<?php
	 						}else{
	 						?>
	 						<img src="<?php echo $img; ?>" width="30">
	 						<?php
	 						} 
	 						?>
	 					</td>
	 					<td><?php echo $name; ?></td>
	 					
	 					<td><?php echo $total; ?></td>
	 				</tr>
	 			
				<?php
				}				
				?>	 
			</table>
		
		 		<table style="border:solid 2px; width: 500px; font-size:14px;">
		 			<tr align="center" style="background: silver">
		 				<th></th>
		 				<th width="200px">AUDITOR</th>
		 				
		 				<th>TOTAL VOTE</th>
		 			</tr>
				<?php
				$get_participant = "SELECT * FROM participants, partylist WHERE participants.pid = partylist.pid AND participants.participant_position = 'auditor'";
				$result2 = $con->query($get_participant);
				while($row = $result2->fetch_assoc()){
					$name     = $row['participant_name'];
					
					$total    = $row['total_votes'];
					$img      = $row['image'];
				?>
	 				<tr align="center" style="background: white">
	 					<td>
	 						<?php 
	 						if($img == "none"){
	 						?>
	 						<img src="img/default.jpg" width='30px'>
	 						<?php
	 						}else{
	 						?>
	 						<img src="<?php echo $img; ?>" width="30">
	 						<?php
	 						} 
	 						?>
	 					</td>
	 					<td><?php echo $name; ?></td>
	 					
	 					<td><?php echo $total; ?></td>
	 				</tr>
	 			
				<?php
				}
				$get_participant2 = "SELECT * FROM participants WHERE participant_position = 'auditor' AND pid = '0'";
				$result3 = $con->query($get_participant2);
				while($row = $result3->fetch_assoc()){
					$name     = $row['participant_name'];
					
					$total    = $row['total_votes'];
					$img      = $row['image'];
				?>
	 				<tr align="center" style="background: white">
	 					<td>
	 						<?php 
	 						if($img == "none"){
	 						?>
	 						<img src="img/default.jpg" width='30px'>
	 						<?php
	 						}else{
	 						?>
	 						<img src="<?php echo $img; ?>" width="30">
	 						<?php
	 						} 
	 						?>
	 					</td>
	 					<td><?php echo $name; ?></td>
	 					
	 					<td><?php echo $total; ?></td>
	 				</tr>
	 			
				<?php
				}				
				?>	
			</table>
		 		<table style="border:solid 2px; width: 500px; font-size:14px;">
		 			<tr align="center" style="background: silver">
		 				<th></th>
		 				<th width="200px">P.I.O.</th>
		 				
		 				<th>TOTAL VOTE</th>
		 			</tr>
				<?php
				$get_participant = "SELECT * FROM participants, partylist WHERE participants.pid = partylist.pid AND participants.participant_position = 'Public Information Officer'";
				$result2 = $con->query($get_participant);
				while($row = $result2->fetch_assoc()){
					$name     = $row['participant_name'];
					
					$total    = $row['total_votes'];
					$img      = $row['image'];
				?>
	 				<tr align="center" style="background: white">
	 					<td>
	 						<?php 
	 						if($img == "none"){
	 						?>
	 						<img src="img/default.jpg" width='30px'>
	 						<?php
	 						}else{
	 						?>
	 						<img src="<?php echo $img; ?>" width="30">
	 						<?php
	 						} 
	 						?>
	 					</td>
	 					<td><?php echo $name; ?></td>
	 					
	 					<td><?php echo $total; ?></td>
	 				</tr>
	 			
				<?php
				}
				$get_participant2 = "SELECT * FROM participants WHERE participant_position = 'Public Information Officer' AND pid = '0'";
				$result3 = $con->query($get_participant2);
				while($row = $result3->fetch_assoc()){
					$name     = $row['participant_name'];
					
					$total    = $row['total_votes'];
					$img      = $row['image'];
				?>
	 				<tr align="center" style="background: white">
	 					<td>
	 						<?php 
	 						if($img == "none"){
	 						?>
	 						<img src="img/default.jpg" width='30px'>
	 						<?php
	 						}else{
	 						?>
	 						<img src="<?php echo $img; ?>" width="30">
	 						<?php
	 						} 
	 						?>
	 					</td>
	 					<td><?php echo $name; ?></td>
	 					
	 					<td><?php echo $total; ?></td>
	 				</tr>
	 			
				<?php
				}				
				?>	 
			</table>
		 		<table style="border:solid 2px; width: 500px; font-size:14px;">
		 			<tr align="center" style="background: silver">
		 				<th></th>
		 				<th width="200px">PEACE OFFICER</th>
		 				
		 				<th>TOTAL VOTE</th>
		 			</tr>
				<?php
				$get_participant = "SELECT * FROM participants, partylist WHERE participants.pid = partylist.pid AND participants.participant_position = 'Peace Officer'";
				$result2 = $con->query($get_participant);
				while($row = $result2->fetch_assoc()){
					$name     = $row['participant_name'];
					
					$total    = $row['total_votes'];
					$img      = $row['image'];
				?>
	 				<tr align="center" style="background: white">
	 					<td>
	 						<?php 
	 						if($img == "none"){
	 						?>
	 						<img src="img/default.jpg" width='30px'>
	 						<?php
	 						}else{
	 						?>
	 						<img src="<?php echo $img; ?>" width="30">
	 						<?php
	 						} 
	 						?>
	 					</td>
	 					<td><?php echo $name; ?></td>
	 					
	 					<td><?php echo $total; ?></td>
	 				</tr>
	 			
				<?php
				}
				$get_participant2 = "SELECT * FROM participants WHERE participant_position = 'Peace Officer' AND pid = '0'";
				$result3 = $con->query($get_participant2);
				while($row = $result3->fetch_assoc()){
					$name     = $row['participant_name'];
					
					$total    = $row['total_votes'];
					$img      = $row['image'];
				?>
	 				<tr align="center" style="background: white">
	 					<td>
	 						<?php 
	 						if($img == "none"){
	 						?>
	 						<img src="img/default.jpg" width='30px'>
	 						<?php
	 						}else{
	 						?>
	 						<img src="<?php echo $img; ?>" width="30">
	 						<?php
	 						} 
	 						?>
	 					</td>
	 					<td><?php echo $name; ?></td>
	 					
	 					<td><?php echo $total; ?></td>
	 				</tr>
	 			
				<?php
				}				
				?> 
			</table>
 		</div>
 		<div class="col-sm-12 col-lg-6">
		 		<table style="border:solid 2px; width: 500px; font-size:14px;">
		 			<tr align="center" style="background: silver">
		 				<th></th>
		 				<th width="200px">GRADE 7 Councilor</th>
		 				
		 				<th>TOTAL VOTE</th>
		 			</tr>
				<?php
				$get_participant = "SELECT * FROM participants, partylist WHERE participants.pid = partylist.pid AND participants.participant_position = 'Grade 7 Representative'";
				$result2 = $con->query($get_participant);
				while($row = $result2->fetch_assoc()){
					$name     = $row['participant_name'];
					
					$total    = $row['total_votes'];
					$img      = $row['image'];
				?>
	 				<tr align="center" style="background: white">
	 					<td>
	 						<?php 
	 						if($img == "none"){
	 						?>
	 						<img src="img/default.jpg" width='30px'>
	 						<?php
	 						}else{
	 						?>
	 						<img src="<?php echo $img; ?>" width="30">
	 						<?php
	 						} 
	 						?>
	 					</td>
	 					<td><?php echo $name; ?></td>
	 					
	 					<td><?php echo $total; ?></td>
	 				</tr>
	 			
				<?php
				}
				$get_participant2 = "SELECT * FROM participants WHERE participant_position = 'Grade 7 Representative' AND pid = '0'";
				$result3 = $con->query($get_participant2);
				while($row = $result3->fetch_assoc()){
					$name     = $row['participant_name'];
					
					$total    = $row['total_votes'];
					$img      = $row['image'];
				?>
	 				<tr align="center" style="background: white">
	 					<td>
	 						<?php 
	 						if($img == "none"){
	 						?>
	 						<img src="img/default.jpg" width='30px'>
	 						<?php
	 						}else{
	 						?>
	 						<img src="<?php echo $img; ?>" width="30">
	 						<?php
	 						} 
	 						?>
	 					</td>
	 					<td><?php echo $name; ?></td>
	 					
	 					<td><?php echo $total; ?></td>
	 				</tr>
	 			
				<?php
				}				
				?>
				</table> 
		 		<table style="border:solid 2px; width: 500px; font-size:14px;">
		 			<tr align="center" style="background: silver">
		 				<th></th>
		 				<th width="200px">GRADE 8 Councilor</th>
		 				
		 				<th>TOTAL VOTE</th>
		 			</tr>
				<?php
				$get_participant = "SELECT * FROM participants, partylist WHERE participants.pid = partylist.pid AND participants.participant_position = 'Grade 8 Representative'";
				$result2 = $con->query($get_participant);
				while($row = $result2->fetch_assoc()){
					$name     = $row['participant_name'];
					
					$total    = $row['total_votes'];
					$img      = $row['image'];
				?>
	 				<tr align="center" style="background: white">
	 					<td>
	 						<?php 
	 						if($img == "none"){
	 						?>
	 						<img src="img/default.jpg" width='30px'>
	 						<?php
	 						}else{
	 						?>
	 						<img src="<?php echo $img; ?>" width="30">
	 						<?php
	 						} 
	 						?>
	 					</td>
	 					<td><?php echo $name; ?></td>
	 					
	 					<td><?php echo $total; ?></td>
	 				</tr>
	 			
				<?php
				}
				$get_participant2 = "SELECT * FROM participants WHERE participant_position = 'Grade 8 Representative' AND pid = '0'";
				$result3 = $con->query($get_participant2);
				while($row = $result3->fetch_assoc()){
					$name     = $row['participant_name'];
					
					$total    = $row['total_votes'];
					$img      = $row['image'];
				?>
	 				<tr align="center" style="background: white">
	 					<td>
	 						<?php 
	 						if($img == "none"){
	 						?>
	 						<img src="img/default.jpg" width='30px'>
	 						<?php
	 						}else{
	 						?>
	 						<img src="<?php echo $img; ?>" width="30">
	 						<?php
	 						} 
	 						?>
	 					</td>
	 					<td><?php echo $name; ?></td>
	 					
	 					<td><?php echo $total; ?></td>
	 				</tr>
	 			
				<?php
				}				
				?>
				</table> 
		 		<table style="border:solid 2px; width: 500px; font-size:14px;">
		 			<tr align="center" style="background: silver">
		 				<th></th>
		 				<th width="200px">GRADE 9 Councilor</th>
		 				
		 				<th>TOTAL VOTE</th>
		 			</tr>
				<?php
				$get_participant = "SELECT * FROM participants, partylist WHERE participants.pid = partylist.pid AND participants.participant_position = 'Grade 9 Representative'";
				$result2 = $con->query($get_participant);
				while($row = $result2->fetch_assoc()){
					$name     = $row['participant_name'];
					
					$total    = $row['total_votes'];
					$img      = $row['image'];
				?>
	 				<tr align="center" style="background: white">
	 					<td>
	 						<?php 
	 						if($img == "none"){
	 						?>
	 						<img src="img/default.jpg" width='30px'>
	 						<?php
	 						}else{
	 						?>
	 						<img src="<?php echo $img; ?>" width="30">
	 						<?php
	 						} 
	 						?>
	 					</td>
	 					<td><?php echo $name; ?></td>
	 					
	 					<td><?php echo $total; ?></td>
	 				</tr>
	 			
				<?php
				}
				$get_participant2 = "SELECT * FROM participants WHERE participant_position = 'Grade 9 Representative' AND pid = '0'";
				$result3 = $con->query($get_participant2);
				while($row = $result3->fetch_assoc()){
					$name     = $row['participant_name'];
					
					$total    = $row['total_votes'];
					$img      = $row['image'];
				?>
	 				<tr align="center" style="background: white">
	 					<td>
	 						<?php 
	 						if($img == "none"){
	 						?>
	 						<img src="img/default.jpg" width='30px'>
	 						<?php
	 						}else{
	 						?>
	 						<img src="<?php echo $img; ?>" width="30">
	 						<?php
	 						} 
	 						?>
	 					</td>
	 					<td><?php echo $name; ?></td>
	 					
	 					<td><?php echo $total; ?></td>
	 				</tr>
	 			
				<?php
				}				
				?>
				</table> 

		 		<table style="border:solid 2px; width: 500px; font-size:14px;">
		 			<tr align="center" style="background: silver">
		 				<th></th>
		 				<th width="200px">GRADE 10 Councilor</th>
		 				
		 				<th>TOTAL VOTE</th>
		 			</tr>
				<?php
				$get_participant = "SELECT * FROM participants, partylist WHERE participants.pid = partylist.pid AND participants.participant_position = 'Grade 10 Representative'";
				$result2 = $con->query($get_participant);
				while($row = $result2->fetch_assoc()){
					$name     = $row['participant_name'];
					
					$total    = $row['total_votes'];
					$img      = $row['image'];
				?>
	 				<tr align="center" style="background: white">
	 					<td>
	 						<?php 
	 						if($img == "none"){
	 						?>
	 						<img src="img/default.jpg" width='30px'>
	 						<?php
	 						}else{
	 						?>
	 						<img src="<?php echo $img; ?>" width="30">
	 						<?php
	 						} 
	 						?>
	 					</td>
	 					<td><?php echo $name; ?></td>
	 					
	 					<td><?php echo $total; ?></td>
	 				</tr>
	 			
				<?php
				}
				$get_participant2 = "SELECT * FROM participants WHERE participant_position = 'Grade 10 Representative' AND pid = '0'";
				$result3 = $con->query($get_participant2);
				while($row = $result3->fetch_assoc()){
					$name     = $row['participant_name'];
					
					$total    = $row['total_votes'];
					$img      = $row['image'];
				?>
	 				<tr align="center" style="background: white">
	 					<td>
	 						<?php 
	 						if($img == "none"){
	 						?>
	 						<img src="img/default.jpg" width='30px'>
	 						<?php
	 						}else{
	 						?>
	 						<img src="<?php echo $img; ?>" width="30">
	 						<?php
	 						} 
	 						?>
	 					</td>
	 					<td><?php echo $name; ?></td>
	 					
	 					<td><?php echo $total; ?></td>
	 				</tr>
	 			
				<?php
				}				
				?>
				</table> 			
 		</div>
 	</div>