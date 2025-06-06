<?php 
  require "connection.php";
  // date_default_timezone_set('Asia/Manila');
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
?> 
    <div class="container">
      <?php 
        if($status == '1'){
          ?>
      <div class="alert alert-danger" role="alert">
        <i class="fas fa-exclamation-triangle"> Voting has been initialized! Any form of Updating has been disabled!</i>
      </div>
          <?php
        }
       ?>
      <div style = "background-image:url('img/13.jpg');margin-left:auto;margin-right:auto;margin-top:30px;border-radius:10px;border-style:solid;border-color:none;border-width:0px; z-index: 1;">
        <div class="row">
          <div class="col-lg-6" align="center">
            <img src = "img/2logo.png" width = "500" align="center" style="margin-top:10px;border-radius:10px;border-color:black;border-style:solid;border-color:white;border-width:0px; margin-left:auto;margin-right:auto;">        
          </div>
          <div class="col-lg-6">
            <div style = "background-color:#046b54;margin-right:50px;margin-left:30px;height:430px;width:510px;border-style:solid;border-width:1px;border-color:none;border-radius:0px 10px 10px 0px">
              <div style = "float:right;margin-right:17px;cursor:pointer;font-size:25px;margin-top:17px">
                <?php
                  if($status == '1' || $status == "close"){
                    echo "";
                  }
                  else{
                ?>
                <a>
                  <span class = "edit" onclick="edit_school(<?php echo $id; ?>)"><i class="fa fa-edit" aria-hidden="true" style="color: white; margin-right:25px; font-size: 30px"></i>
                  </span>
                </a>
                <?php
                  }
                ?>
              </div>
              <div style = "font-family:tw cen mt;font-size:20px;margin-top:15px;margin-left:15px;margin-right:20px;text-transform:uppercase; color: skyblue; font-weight: bold"><?php echo $school_name; ?>
              </div>
              <br/>
              <div style = "margin-left:50px;font-family:tw cen mt">
                <span style = "text-transform:uppercase;color:#ffde9f;">School id</span><br/>
                <span style = "font-size:25px;  color:white"><?php echo $school_id; ?></span>
                <span style = "font-size:30px;float:right;margin-right:50px;color:white; margin-top: -10px;"><i class="fa fa-id-card"></i></span>
              </div>
              <div style="border-bottom: solid 1px; margin:5px;"></div>
              <div style = "margin-left:50px;font-family:tw cen mt">
                <span style = "text-transform:uppercase;color:#ffde9f;">Admin name</span><br/>
                <span style = "font-size:25px;  color:white"><?php echo $admin_name; ?></span>
                <span style = "font-size:30px;float:right;margin-right:50px;color:white; margin-top: -10px;"><i class="fa fa-user"></i></span>
              </div>
              <div style="border-bottom: solid 1px; margin:5px;"></div>
              <div style = "margin-left:50px;font-family:tw cen mt">
                <span style = "text-transform:uppercase;color:#ffde9f;">School year</span><br/>
                <span style = "font-size:25px;  color:white"><?php echo $school_year; ?></span>
                <span style = "font-size:30px;float:right;margin-right:47px;color:white; margin-top: -10px;"><i class="fa fa-calendar"></i></span>
              </div>
              <div style="border-bottom: solid 1px; margin:5px;"></div>
              <div style = "margin-left:50px;font-family:tw cen mt">
                <span style = "text-transform:uppercase;color:#ffde9f;">School Comelec Chairperson</span><br/>
                <span style = "font-size:25px; color:white"><?php echo $comelec; ?></span>
                <span style = "font-size:30px;float:right;margin-right:47px;color:white; margin-top: -10px;"><i class="fa fa-university"></i></span>
              </div>
              <div style="border-bottom: solid 1px; margin:5px;"></div>            
              <div style = "margin-left:50px;font-family:tw cen mt">
                <span style = "text-transform:uppercase;color:#ffde9f;">STATUS</span><br/>
                <?php
                  if($status == '1'){
                ?>
                  <span style = "font-size:20px;color:orange;font-weight:bold" align="center">Voting Session: OPEN - <span style = "font-size:20px">(<?php echo $date; ?>)</span>
                <?php
                  }
                  else if($status == '0'){
                ?>
                  <span style = "font-size:25px;color:yellow">Voting Session: NOT YET INITIALIZED</span></span>
                <?php
                  }
                  else if($status == "close"){
                ?>
                  <span style = "font-size:20px;color:orange;font-weight:bold">Voting Session: CLOSED - <span style = "font-size:20px">(<?php echo $date; ?>)</span></span>
                <?php
                  }
                ?>
              </div>              
            </div>            
          </div>
        </div>
    </div>

    <br>
    <div class="row">
      <div class="col-sm-12 col-lg-6">
        <div class="container">
          
          <h4 align="center"><strong>PARTYLIST</strong></h4>
              <?php 
              require "connection.php";
                $get_pl = "SELECT * FROM partylist";
                  $pl_result = $con->query($get_pl);
                  $count = $pl_result->num_rows;
                  if($count > 0){
                  while($row = $pl_result->fetch_assoc()){
                    $pid   = $row['pid'];
                    $pname = $row['partylist_name'];
                ?>
              <div id="accordion" style="vertical-align: top; color:black;">                
                <div class="card">
                  <button class="btn" data-toggle="collapse" data-target="#a<?php echo $pid; ?>" aria-expanded="true" aria-controls="collapseOne">
                    <div class="mb-0">
                      <strong><?php echo $pname." Partylist"; ?> </strong>
                    </div>
                  </button>
                </div>
                <div id="a<?php echo $pid; ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordion" style="vertical-align: top; color:black;">
                  <div class="alert alert-success" role="alert" style="vertical-align: top; color:black;">
     
                    <div align="right">
                      <button onclick="view_partylist('<?php echo $pid; ?>')"><i class="fas fa-eye"></i></button>
                       <?php 
                     if($status == '1' || $status == 'close'){
                     
                      }else{
                        ?>
                       <button onclick="delete_partylist('<?php echo $pname; ?>')"><i class="fas fa-trash-alt"></i></button>
                       <!-- <button onclick="edit_plist('<?php echo $pname; ?>')">Edit <i class="fas fa-edit"></i></button> -->
                       <?php
                      }
                       ?>
                      
                    </div>
                    <div class="row">
                    <?php 
                      $get_participant = "SELECT * FROM participants WHERE pid = '".$pid."'";
                        $participant_result = $con->query($get_participant);
                        while($row = $participant_result->fetch_assoc()){
                          $participant_position = $row['participant_position'];
                          $participant_name     = $row['participant_name'];
                          $participant_id       = $row['participant_id'];
                        ?>
                          <div class="col-sm-12 col-lg-12" align="left" style="border-bottom:solid 1px white;">
                            <?php echo "<strong>".$participant_position."</strong>".": ".$participant_name; ?>
                          </div>
                        <?php
                        }
                     ?>
                      </div>
   
                </div>
                </div>

              </div> 
                <?php
                }
              ?>
          <div id="accordion" style="vertical-align: top; color:black;">                
                <div class="card">
                  <button class="btn" data-toggle="collapse" data-target="#inde" aria-expanded="true" aria-controls="collapseOne">
                    <div class="mb-0">
                     <strong>Independent Candidates</strong>
                    </div>
                  </button>
                </div>
                <div id="inde" class="collapse" aria-labelledby="headingOne" data-parent="#accordion" style="vertical-align: top; color:black;">
                  <div class="alert alert-success" role="alert" style="vertical-align: top; color:black;">
     
                    <div align="right">
                      <button onclick="view_partylist('independent')"><i class="fas fa-eye"></i></button>
                       <!-- <button onclick="edit_plist('<?php echo $pname; ?>')">Edit <i class="fas fa-edit"></i></button> -->
                    </div>
                    <div class="row">
                    <?php 
                      $get_independent = "SELECT * FROM participants WHERE pid = '0'";
                      $get_res = $con->query($get_independent);
                      while($row = $get_res->fetch_assoc()){
                          $participant_position = $row['participant_position'];
                          $participant_name     = $row['participant_name'];
                          $participant_id       = $row['participant_id'];
                        ?>
                          <div class="col-sm-12 col-lg-12" align="left" style="border-bottom:solid 1px white;">
                            <?php echo "<strong>".$participant_position."</strong>".": ".$participant_name; ?>
                             <?php 
                             if($status == '1' || $status == 'close'){
                             
                              }else{
                                 ?>
                             <button onclick="delete_independent('<?php echo $participant_id; ?>')"><i class="fas fa-trash-alt"></i></button>
                             <?php
                              }
                             ?>
                          </div>
                        <?php
                        }
                     ?>
                      </div>
   
                </div>
                </div>
              </div>
              <?php
              }else{
                 $get_independent1 = "SELECT * FROM participants WHERE pid = '0'";
                      $get_res1 = $con->query($get_independent1);
                      $count1 = $get_res1->num_rows;
                      if($count1 > 0){
              ?>

          <div id="accordion" style="vertical-align: top; color:black;">                
                <div class="card">
                  <button class="btn" data-toggle="collapse" data-target="#inde" aria-expanded="true" aria-controls="collapseOne">
                    <div class="mb-0">
                     <strong>Independent Candidates</strong>
                    </div>
                  </button>
                </div>
                <div id="inde" class="collapse" aria-labelledby="headingOne" data-parent="#accordion" style="vertical-align: top; color:black;">
                  <div class="alert alert-success" role="alert" style="vertical-align: top; color:black;">
     
                    <div align="right">
                      <button onclick="view_partylist('independent')"><i class="fas fa-eye"></i></button>
                       <!-- <button onclick="edit_plist('<?php echo $pname; ?>')">Edit <i class="fas fa-edit"></i></button> -->
                    </div>
                    <div class="row">
                    <?php 
                      $get_independent = "SELECT * FROM participants WHERE pid = '0'";
                      $get_res = $con->query($get_independent);
                      while($row = $get_res->fetch_assoc()){
                          $participant_position = $row['participant_position'];
                          $participant_name     = $row['participant_name'];
                          $participant_id       = $row['participant_id'];
                        ?>
                          <div class="col-sm-12 col-lg-12" align="left" style="border-bottom:solid 1px white;">
                            <?php echo "<strong>".$participant_position."</strong>".": ".$participant_name; ?>
                              <?php 
                             if($status == '1' || $status == 'close'){
                             
                              }else{
                                 ?>
                             <button onclick="delete_independent('<?php echo $participant_id; ?>')"><i class="fas fa-trash-alt"></i></button>
                             <?php
                              }
                              ?>
                          </div>
                        <?php
                        }
                     ?>
                      </div>
   
                </div>
                </div>
              </div>

              <?php  
             
              }else{
              ?>
              <div class="alert alert-secondary" role="alert" style="vertical-align: top; color:black;" align="center">
                NONE
              </div>
              <?php
              }
            }
               ?>          
        </div>
      </div>
      <div class="col-sm-12 col-lg-6">
        <div class="container">
          <h4 align="center"><strong>GRADE SECTION</strong></h4>

        <?php 
          $qs = "SELECT * FROM school WHERE id = '".$id."'";
          $result2 = $con->query($qs);
            $row = $result2->fetch_assoc();
            $stype = $row['school_type'];


              $get_grade = "SELECT * FROM grade_level GROUP BY grade_level";
                $grade_result = $con->query($get_grade);
                $num = $grade_result->num_rows;
                if($num > 0){
                  while($row = $grade_result->fetch_assoc()){ 
                    $gid       = $row['grade_id'];
                    $glevel    = $row['grade_level'];

                
              ?>
                <div class="alert alert-success" style="color:black" role="alert">
                 <strong> <?php echo $glevel; ?></strong>
                  <hr style="margin-top: 4px;">
                  <?php 
                        $get_section = "SELECT * FROM grade_level WHERE grade_level = '".$glevel."'";
                         $section_result = $con->query($get_section);
                         $row_cnt = $section_result->num_rows;
 
                            
                         if($row_cnt > 0){
                         
                         $sum = 0;
                        while($row = $section_result->fetch_assoc()){
                          $section = $row['section'];
                          $num_voter = $row['number_of_voters']; 
                          $gl = $row['grade_level'];

                          
                    ?>   
                  <div class="row">       
                    <div class="col-7">
                      <strong><?php echo $section; ?></strong>
                    </div>
                    <div class="col-5" align="right">
                    <?php 

                          if(strlen($gl == 7)){
                            $gl = substr($gl, -2);
                          }else{
                            $gl = substr($gl, -2);
                          }
                         $gl = str_replace(' ', '',$gl);

                          $get_voted = "SELECT * FROM voters WHERE section = '".$section."' AND grade ='".$gl."'";
                            $get_result = $con->query($get_voted);
                            $count = $get_result->num_rows;
                     ?>
                   <strong> voters: <?php echo $num_voter." /voted: ".$count;  ?></strong>
                     <?php 
                    if($status == '1' || $status == 'close'){
                      ?>

                    </div>
                      <?php
                     }else{
                      ?>
                
                      <button style="text-align: center; border-radius:4px" onclick="edit_grade('<?php echo $section; ?>','<?php echo $glevel; ?>')"><i class="fas fa-edit"></i></button>
                       <button onclick="delete_section('<?php echo $section; ?>','<?php echo $glevel; ?>')"><i class="fas fa-trash-alt"></i></button>

                    </div>
                      <?php
                     }
                      ?>
                  </div>
                  <?php
                  
                  $sum = $sum+$num_voter;
                }
              }else{
                
              }
              //$lvl = substr($glevel, -1);

              if(strlen($glevel == 7)){
                $lvl = substr($glevel, -1);
              }else{
                $lvl = substr($glevel, -2);
              }
              $lvl = str_replace(' ', '',$lvl);


               $get_allvoted = "SELECT * FROM voters WHERE grade = '$lvl'";
                            $get_allresult = $con->query($get_allvoted);
                            $allcount = $get_allresult->num_rows;
              
              ?>
              <div align="right">
                <?php echo "<strong>TOTAL: ".$sum."/ TOTAL: ".$allcount."</strong>"; ?>
              </div>
              <?php

            
                  ?>

                </div>                  
                <?php
                }
              }else{
                ?>
              <div class="alert alert-secondary" role="alert" style="vertical-align: top; color:black;" align="center">
               <strong> NONE</strong>
              </div>
                <?php
              }

          if($status == '0'){
          ?>
          <button class="btn btn-warning" style="font-weight: bold; padding:2%; width:100%; color:white" onclick="validate('<?php echo $main_id; ?>')">VALIDATE INITIALIZATION</button>
            <br><br>
          <a href = "sdo-ne_download_initial.php"><button class="btn btn-primary" style="font-weight: bold; padding:2%; width:100%">DOWNLOAD & PREVIEW OF INITIALIZATION</button></a>  
          <?php
          }else if($status == '1'){
          ?>
          <button class="btn btn-warning" style="font-weight: bold; padding:2%; width:100%; color:white" onclick="close_election('<?php echo $main_id; ?>')">CLOSE ELECTION</button>
          <?php
          }else if($status == 'close'){
            if($stype == "Elementary (Grade 4-6)"){
              $stype = 'elementary.php';
            }else if($stype == "Integrated School (Grade 7-12)"){
              $stype = 'integrated.php';
            }else if($stype == "Junior High School (Grade 7-10)"){
              $stype = 'junior.php';
            }else if($stype == "Senior High School (Grade 11-12)"){
              $stype = 'senior.php';
            }
          ?>
          <button class="btn btn-warning" style="font-weight: bold; padding:2%; width:100%; color:white" onclick="reset_election('<?php echo $main_id; ?>','<?php echo $stype; ?>')">RESET ELECTION</button>
          <?php
          }


    $sql1 = "SELECT * FROM school";
  $result1 = $con->query($sql1);
  $row = $result1->fetch_assoc();
    $stype = $row['school_type'];
    $status = $row['validate_status'];

    if($stype == "Elementary (Grade 4-6)"){
    ?>

    <?php if($status == 'close'){
    ?>
    <br><br>
    <div align="center"><a href = "sdo-ne_download_elementary.php"><button style="font-weight: bold; padding:2%; width:100%; color:white" class = "btn btn-success btn-md" onclick="window.open('sdo-ne_print_elementary.php');">DOWNLOAD ELECTION RESULTS</button></a></div> 
    <br>    
    <?php 
    } ?>
    <?php
    }else if($stype == "Integrated School (Grade 7-12)"){
    ?>
    <?php if($status == 'close'){
    ?>
    <br><br>
    <div align="center"><a href = "sdo-ne_download_integrated.php"><button style="font-weight: bold; padding:2%; width:100%; color:white" class = "btn btn-success btn-md" onclick="window.open('sdo-ne_print_integrated.php');">DOWNLOAD ELECTION RESULTS</button></a></div> 
    <br>
    <?php 
    } ?>
    <?php
    }else if($stype == "Junior High School (Grade 7-10)"){
    ?>
    <?php if($status == 'close'){
    ?>
    <br><br>
    <div align="center"><a href = "sdo-ne_download_junior.php"><button style="font-weight: bold; padding:2%; width:100%; color:white" class = "btn btn-success btn-md" onclick="window.open('sdo-ne_print_junior.php');">DOWNLOAD ELECTION RESULTS</button></a></div> 
    <br>
    <?php 
    } ?>

    <?php
    }else if($stype == "Senior High School (Grade 11-12)"){
    ?>
    <?php if($status == 'close'){
    ?>
    <br><br>
    <div align="center"><a href = "sdo-ne_download_senior.php"><button style="font-weight: bold; padding:2%; width:100%; color:white" class = "btn btn-success btn-md" onclick="window.open('sdo-ne_print_senior.php');">DOWNLOAD ELECTION RESULTS</button></a></div> 
    <br>    
    <?php 
    } ?>    
    <?php
    }
 ?>
          <br><br>    
        </div>      
      </div>      
    </div>
    <hr>
     