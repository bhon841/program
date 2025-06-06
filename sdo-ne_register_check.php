<?php 
require "connection.php";

	$sname = $_POST['sname'];
	$sid   = $_POST['sid'];
	$stype = $_POST['stype'];
	$admin = $_POST['admin'];
	$comelec = $_POST['comelec'];
	$syear = $_POST['syear'];
	$rep = $_POST['rep'];

?>

<table width="100%">
	<tr><td colspan="2" align="center" bgcolor="silver" style="padding:8px; margin:5px;"><h5>CONFIRM SCHOOL DETAILS <i class="fas fa-info-circle"></i></h5></td></tr>
	<tr style="margin:2%">
		<th width="140px">SCHOOL NAME:</th>
		<td><?php echo $sname; ?></td>
	</tr>
	<tr>
		<th>SCHOOL ID:</th>
		<td><?php echo $sid; ?></td>
	</tr>	
	<tr>
		<th>SCHOOL TYPE:</th>
		<td><?php echo $stype; ?></td>
	</tr>
	<tr>
		<th>ADMIN NAME:</th>
		<td><?php echo $admin; ?></td>
	</tr>	
	<tr>
		<th>COMELEC NAME:</th>
		<td><?php echo $comelec; ?></td>
	</tr>	
	<tr>
		<th>SCHOOL YEAR:</th>
		<td><?php echo $syear; ?></td>
	</tr>	
	<tr>
		<th>NO. OF REPRESENTATIVE/Councilor:</th>
		<td><?php echo $rep; ?></td>
	</tr>		
</table>