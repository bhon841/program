<?php 
  require "connection.php";

  $pid = $_POST['pname'];


  $sql = "SELECT * FROM partylist WHERE pid ='".$pid."'";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    $pname = $row['partylist_name'];
  ?>

<input type="text" class="form-control" id="prtyname" value="<?php echo $pname; ?>">
<input type="hidden" class="form-control" id="pid" value="<?php echo $pid; ?>">