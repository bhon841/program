<?php 
require "connection.php";

$sec = $_POST['sec'];
$g = $_POST['g'];

$sql = "DELETE FROM grade_level WHERE section  = '".$sec."' AND grade_level = '".$g."'";
$con->query($sql);
 ?>