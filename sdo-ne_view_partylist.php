<?php 
  require "connection.php";

  session_start();
  if(!isset($_SESSION['election_users'])){
    header("location:index.php");
  }else{
    $admin = $_SESSION['election_users'];

    $get_id = "SELECT * FROM account WHERE username = '".$admin."'";
      $result = $con->query($get_id);
      $row = $result->fetch_assoc();
        $id = $row['id'];

    $get_schl = "SELECT * FROM school WHERE id = '".$id."'";
      $res = $con->query($get_schl);
      $row = $res->fetch_assoc();
      $main_id    = $row['s_id'];
      $school_name = $row['school_name'];
      $school_id   = $row['school_id'];
      $school_type = $row['school_type'];
      $admin_name  = $row['admin_name'];
      $comelec     = $row['comelec_name'];
      $school_year = $row['school_year'];
      $status      = $row['validate_status'];
      $date        = $row['date_validated'];

  }

  $pid = $_GET['partylist'];

  $gsql = "SELECT * FROM partylist WHERE pid = '$pid'";
    $gresult = $con->query($gsql);
    $row = $gresult->fetch_assoc();
    $pname = $row['partylist_name'];

 ?>

<div style="background: lightgreen; width:100%; padding:15px">
  <?php 
    if($pid == '0'){
      ?><h3 align="center" style="font-weight: bold;"> <?php echo strtoupper($pname)." PARTICIPANTS"; ?> <?php
    }else{
      ?><h3 align="center" style="font-weight: bold;"> <?php echo strtoupper($pname)." PARTYLIST"; ?> <?php
    }
   ?>
<?php 
if($status == '1' || $status == 'close'){
}else{
  if($pname == 'independent'){

  }else{
 ?>
  <button style="vertical-align: middle" class="btn btn-primary" onclick="edit_plist('<?php echo $pid; ?>')">Edit <i class='fas fa-edit'></i></button></h3>
<?php
}
}
?>
</div>
<br>
 <div class="container">
   <a href="sdo-ne_admin.php"><button class="btn btn-success" style="width:100px;"><img src="img/back.png" width="40px"></button></a>
   <br>
   <br>
<div class="row">
<?php 
  if($pid == '0'){
    $get_participants = "SELECT * FROM participants WHERE pid = '0'";
      $res = $con->query($get_participants);
      while($row = $res->fetch_assoc()){
        $id        = $row['participant_id'];
        $name      = $row['participant_name'];
        $position = $row['participant_position'];
      ?>
      <div class="col-sm-12 col-lg-4" align="center">
     
             <div id="imgArea" style="width:200px;">
        <?php 
          $getPic = mysqli_query($con,"SELECT * FROM participants WHERE participant_id = '$id;'");
            $fetch = mysqli_fetch_assoc($getPic);
            $tmp = $fetch['image']; 
              if($tmp == "none"){
            
              ?>
              <img src="img/default.jpg" style="width: 200px;">
              <?php
              echo "<label style='font-size:16px; font-weight: bold;'>".$name."</label><br>";
              echo "<label style='font-size:16px; font-weight: bold; background:lightgreen; width: 100%'>".$position."</label>";
              echo "<br>";

              if($status == '1' || $status == 'close'){

              }else{
              ?>
                 <h4><button class="btn btn-primary btn-sm" onclick="edit_participant('<?php echo $id; ?>','<?php echo $pid; ?>')">Edit <i class='fas fa-edit'></i></button><br></h4><br>
              <?php              
              }
                }else{
              //echo "<h5>".$position."</h5>"; 
              ?>
              <img src="<?php echo $tmp; ?>" style="width: 200px;">
              <?php  
              echo "<label style='font-size:16px; font-weight: bold;'>".$name."</label><br>";
              echo "<label style='font-size:16px; font-weight: bold; background:lightgreen; width: 100%'>".$position."</label>";
              echo "<br>";

               if($status == '1' || $status == 'close'){

              }else{
              ?>
                 <h4><button class="btn btn-primary btn-sm" onclick="edit_participant('<?php echo $id; ?>','<?php echo $pid; ?>')">Edit <i class='fas fa-edit'></i></button><br></h4><br>
              <?php              
              }
              }
              ?>
              <br>
      </div>
      </div>
      <?php
    }
  }else{
  $sql = "SELECT * FROM partylist WHERE partylist_name = '".$pname."'";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    $pid = $row['pid'];


    $get_participants = "SELECT * FROM participants WHERE pid = '".$pid."'";
      $res = $con->query($get_participants);
      while($row = $res->fetch_assoc()){
        $id        = $row['participant_id'];
        $name      = $row['participant_name'];
        $position = $row['participant_position'];
      ?>
      <div class="col-sm-12 col-lg-3" align="center">
      <div id="imgArea" style="width:200px;">
        <?php 
          $getPic = mysqli_query($con,"SELECT * FROM participants WHERE participant_id = '$id;'");
            $fetch = mysqli_fetch_assoc($getPic);
            $tmp = $fetch['image']; 
              if($tmp == "none"){
            
              ?>
              <img src="img/default.jpg" style="width: 200px;">
              <?php
              echo "<label style='font-size:16px; font-weight: bold;'>".$name."</label><br>";
              echo "<label style='font-size:16px; font-weight: bold; background:lightgreen; width: 100%'>".$position."</label>";
              echo "<br>";


              if($status == '1' || $status == 'close'){

              }else{
              ?>
                 <h4><button class="btn btn-primary btn-sm" onclick="edit_participant('<?php echo $id; ?>','<?php echo $pid; ?>')">Edit <i class='fas fa-edit'></i></button><br></h4><br>
              <?php              
              }
                }else{
              //echo "<h5>".$position."</h5>"; 
              ?>
              <img src="<?php echo $tmp; ?>" style="width: 200px;">
              <?php  
              echo "<label style='font-size:16px; font-weight: bold;'>".$name."</label><br>";
              echo "<label style='font-size:16px; font-weight: bold; background:lightgreen; width: 100%'>".$position."</label>";
              echo "<br>";


               if($status == '1' || $status == 'close'){

              }else{
              ?>
                 <h4><button class="btn btn-primary btn-sm" onclick="edit_participant('<?php echo $id; ?>','<?php echo $pid; ?>')">Edit <i class='fas fa-edit'></i></button><br></h4><br>
              <?php              
              }
              }
              ?>
              <br>
      </div>
      </div> 
      <?php
      }
    }
 ?>    
</div>
</div>