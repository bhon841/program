<?php 
  require "connection.php";

  $id = $_POST['id'];
  $pd = $_POST['pd'];

      ?>
      <div class="row">
        <div class="col-sm-12 col-lg-12" align="center">
            <form enctype="multipart/form-data" action="sdo-ne_img_upload.php" method="POST" name="image_upload_form" id="image_upload_form">
            <div id="imgArea">
              <?php 
                $getPic = mysqli_query($con,"SELECT * FROM participants WHERE participant_id = '$id'");
                  $fetch = mysqli_fetch_assoc($getPic);
                    $tmp = $fetch['image']; 
                    $name      = $fetch['participant_name'];
                    $position  = $fetch['participant_position'];
                  if($tmp == "none"){
                  ?>
                  <img src="img/default.jpg">
                  <?php
                  }else{  
                  ?>
                   <img src="<?php echo $tmp; ?>">
                  <?php  
                  }
               ?>
              <div class="progressBar">
                <div class="bar"></div>
                <div class="percent">0%</div>
              </div>
              <div id="imgChange"><span>Change Photo</span>
                <input type="hidden" name="id" id="parid" value="<?php echo $id; ?>">
                <input type="hidden" id="plistname" value="<?php echo $pd; ?>">
                <input type="file" accept="image/*" name="image_upload_file"  id="image_upload_file">
              </div>
            </div>
          </form>
           
          
            <br>
            <h5><?php echo $position; ?></h5>
            <input type="text" id="name1" class="form-control" value="<?php echo $name; ?>">
            <input type="hidden" id="old_name" class="form-control" value="<?php echo $name; ?>">
             <span id="err_name1" style="color:red;"></span>
            <hr>
        </div>
      </div> 
      <div align="right">
        <button type="button" class="btn btn-primary" onclick="edit_participant_confirm()">Confirm</button>
        <button type="button" class="btn btn-primary" onclick="refresh_view_participants2('<?php echo $pd; ?>')">Cancel</button>
      </div>
