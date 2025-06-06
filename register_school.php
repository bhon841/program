<?php
session_start();
$admin = $_SESSION['election_users'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">	
	<title>Register</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">	
    <link href="fontawesome/css/fontawesome.css" rel="stylesheet" type="text/css" />
    <link href="fontawesome/css/regular.css" rel="stylesheet" type="text/css" />
    <link href="fontawesome/css/solid.css" rel="stylesheet" type="text/css" />  
</head>
<style type="text/css">
	 .radial-gradient {
        width: 100%;
        height: 100%;
      }

 .gradient {
    background-image: radial-gradient(farthest-corner at 0% 100%,#4e99bc 0%, #c2f6ce 100%);}
    html {
    height: 100%;
}
body {

background-image: url("img/lightblue.jpg");
    background-repeat: no-repeat;
    background-attachment: fixed;
}
</style>
<body>



	<div class="container" align="center" style="margin-top: 20%">
		<div align="center" class="col-12" style="z-index: 1"><img src="img/logo.png" style="width: 375px; height: 150px"></div>
		<h2 style="font-family:tw cen mt;font-weight: bold">REGISTER SCHOOL</h2>
		<hr>
		<div class="row">
			<div class="col-3">
			</div>
			<div class="col-6">
				<input type="text" id="sname" class="form-control form-control-sm" style="text-align: center" placeholder="Name of School">
				<label style="font-weight: bold; font-size: 13px; margin-bottom:20px;">SCHOOL NAME <i class="fas fa-school"></i></label>
			</div>
			<div class="col-3">
			</div>
		</div>
		<div class="row">
			<div class="col-3">
			</div>
			<div class="col-6">
				<input type="number" id="sid" class="form-control form-control-sm" style="text-align: center" placeholder="School ID No. ex. 102318">
				<label style="font-weight: bold; font-size: 13px; margin-bottom:20px;">SCHOOL ID <i class="fas fa-school"></i></label>
			</div>
			<div class="col-3">
			</div>
		</div>
		<div class="row">
			<div class="col-3">
			</div>
			<div class="col-6">
				<select id="stype" class="form-control form-control-sm" style="text-indent:40%">
					<option>Elementary (Grade 4-6)</option>
					<option>Integrated School (Grade 7-12)</option>
					<option>Junior High School (Grade 7-10)</option>
					<option>Senior High School (Grade 11-12)</option>
				</select>
				<label style="font-weight: bold; font-size: 13px; margin-bottom:20px;">SCHOOL TYPE <i class="fas fa-chalkboard-teacher"></i></label>
			</div>
			<div class="col-3">
			</div>
		</div>
		<div class="row">
			<div class="col-3">
			</div>
			<div class="col-6">
				<input type="text" id="admin"  class="form-control form-control-sm" style="text-align: center" placeholder="Name of the Administrator ex. Pedro G. Santiago">
				<label style="font-weight: bold; font-size: 13px; margin-bottom:20px;">ADMIN NAME <i class="fas fa-user-shield"></i></label>
			</div>
			<div class="col-3">
			</div>	
		</div>
		<div class="row">
			<div class="col-3">
			</div>
			<div class="col-6">
				<input type="text" id="comelec" class="form-control form-control-sm" style="text-align: center" placeholder="Name of the Comelec ex. Juan P. Dela Cruz">
				<label style="font-weight: bold; font-size: 13px; margin-bottom:20px;">COMELEC CHAIRPERSON</label>
			</div>
			<div class="col-3">
			</div>
		</div>
		<div class="row">
			<div class="col-3">
			</div>
			<div class="col-6">
				<input type="text" id="syear" class="form-control form-control-sm" style="text-align: center" placeholder="School Year. ex. 2019-2020">
				<label style="font-weight: bold; font-size: 13px; margin-bottom:20px;">SCHOOL YEAR <i class="fas fa-calendar-week"></i></label>
			</div>
			<div class="col-3">
			</div>	
		</div>	
		<div class="row">
			<div class="col-3">
			</div>
			<div class="col-6">
				<input type="number" id="rep" class="form-control form-control-sm" style="text-align: center">
				<label style="font-weight: bold; font-size: 13px; margin-bottom:20px;">NO. OF REPRESENTATIVE/Councilor  <i class="fas fa-chalkboard-teacher"></i></label>
			</div>
			<div class="col-3">
			</div>	
		</div>			
		<hr>	
		<div class="row">		
			<div class="col-3">
			</div>
			<div class="col-6">
				<button class="btn btn-primary" style="width:300px;" onclick="check_register()">REGISTER <i class="fas fa-registered"></i></button>
			</div>
			<div class="col-3">
			</div>			
		</div>	
		<br><br>										
	</div>

	<!-- Confirmation -->
	<div class="modal fade" id="confirmation" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" style="padding-top: 5%;" role="document">
        <div class="modal-content">
          <div class="modal-body register_details">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="confirm_register()" >Confirm</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
          </div>
        </div>
      </div>
    </div>
</body>

<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">
	function check_register(){
	var sname = $('#sname').val();
	var sid = $('#sid').val();
	var stype = $('#stype').val();
	var admin = $('#admin').val();
	var comelec = $('#comelec').val();
	var syear = $('#syear').val();
	var rep = $('#rep').val();

	if(sname != "" && sid != "" && admin != "" && comelec != "" && syear != ""){
      $.ajax({url: "sdo-ne_register_check.php", data: { sname:sname, sid:sid, stype:stype, admin:admin, comelec:comelec, syear:syear, rep:rep }, type: "POST", success: function(result){
        $('#confirmation').modal("show");
         $('.register_details').html(result);
      }});	
	}else{
		alert("Please complete all required details!");
	}	
	}

	function confirm_register(){
	var sname = $('#sname').val();
	var sid = $('#sid').val();
	var stype = $('#stype').val();
	var admin = $('#admin').val();
	var comelec = $('#comelec').val();
	var syear = $('#syear').val();
	var rep = $('#rep').val();

      $.ajax({url: "sdo-ne_register_confirm.php", data: { sname:sname, sid:sid, stype:stype, admin:admin, comelec:comelec, syear:syear, rep:rep }, type: "POST", success: function(result){
        window.location.href = "sdo-ne_admin.php";
      }});		
	}	
</script>