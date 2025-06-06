<?php 
require "connection.php";

$id = $_POST['schl_id'];

	$sql = "SELECT * FROM school WHERE id ='".$id."'";
	$result = $con->query($sql);
	      $row = $result->fetch_assoc();
	        $s_id 	 = $row['s_id'];
	        $sname 	 = $row['school_name'];
	        $sid 	 = $row['school_id'];
	        $stype	 = $row['school_type'];
	        $admin	 = $row['admin_name'];
	        $comelec = $row['comelec_name'];
	        $syear	 = $row['school_year'];

 ?>
            SCHOOL NAME
            <input type="text" id="sname" value="<?php echo $sname; ?>" class="form-control">
            SCHOOL ID
            <input type="number" id="sid" value="<?php echo $sid; ?>" class="form-control">
            <span id="errmnull1" style="color:red"></span>
            ADMIN NAME
            <input type="text" id="admin" value="<?php echo $admin; ?>" class="form-control"> 
            <span id="errmnull2" style="color:red"></span>
            SCHOOL YEAR
            <input type="text" id="syear" value="<?php echo $syear; ?>" class="form-control"> 
            <span id="errmnull3" style="color:red"></span>
            SCHOOL COMELEC
            <input type="text" id="sc" value="<?php echo $comelec; ?>" class="form-control">   
            <span id="errmnull4" style="color:red"></span>