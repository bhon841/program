<?php 
require "connection.php";

$pn = $_POST['pn'];

$sql = "DELETE FROM partylist WHERE partylist_name  = '".$pn."'";
$con->query($sql);
 ?>