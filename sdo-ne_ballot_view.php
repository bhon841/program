<?php 
require "connection.php";

$type = $_POST['type'];

if($type == 'on'){
	$sql = "UPDATE ballot_type SET img = 'img/with_img.png', type = 'with_img'";
	$con->query($sql);
}else if($type == 'off'){
	$sql = "UPDATE ballot_type SET img = 'img/without_img.png', type = 'without_img'";
	$con->query($sql);
}
 ?>

