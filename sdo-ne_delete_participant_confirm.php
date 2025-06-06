<?php 
require "connection.php";

$inde = $_POST['inde'];

$sql = "DELETE FROM participants WHERE participant_id  = '".$inde."'";
$con->query($sql);
 ?>