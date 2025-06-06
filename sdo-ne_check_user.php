<?php 
	require "connection.php";
	session_start();
  	date_default_timezone_set("Asia/Manila");

  $user_name = $_POST['username'];
  if(preg_match('/[A-Z]$/',$user_name)==true){
    header("location:index.php?error_id=".md5(1));
  }

  $password = md5($_POST['password']);

  $sql1 = "SELECT * FROM account WHERE username = '$user_name' AND password = '$password'";
  $query = $con->query($sql1);
  $check = mysqli_num_rows($query);

  if($check > 0) {


  	$sql = "SELECT * FROM school";
  	$result = $con->query($sql);
	if($result->num_rows > 0){
      session_start();
      $_SESSION['election_users'] = $user_name;
		header("location:sdo-ne_admin.php");
	}else{
    $_SESSION['election_users'] = $user_name;
    header("location:register_school.php");
	}
  }else{
  	header("location:index.php?error_id=".md5(1));
  }    		
 ?>