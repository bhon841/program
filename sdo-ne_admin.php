<?php 
  require "connection.php";

  session_start();
  date_default_timezone_set('Asia/Manila');
  if(!isset($_SESSION['election_users'])){
    header("location:index.php");
  }else{
    $admin = $_SESSION['election_users'];

    $get_id = "SELECT * FROM account WHERE username = '".$admin."'";
      $result = $con->query($get_id);
      $row = $result->fetch_assoc();
        $id = $row['id'];
  }

  $check_count = "SELECT * FROM school";
      $res_check = $con->query($check_count);
          $row = $res_check->fetch_assoc();
          $rep = $row['rep'];
?>
<!DOCTYPE html>
 <html>
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">   
   <title>e-vote</title>

    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png" />
    <link href="css/bootstrap.min.css" rel="stylesheet">  
    <link href="fontawesome/css/fontawesome.css" rel="stylesheet" type="text/css" />
    <link href="fontawesome/css/regular.css" rel="stylesheet" type="text/css" />
    <link href="fontawesome/css/solid.css" rel="stylesheet" type="text/css" />   
    <link href="css/style.css" rel="stylesheet" type="text/css" />  

<style type="text/css">
  a{
    color:white;
  }
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

.onoffswitch2 {
    position: relative; width: 110px;
    -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
}

.onoffswitch2-checkbox {
    display: none;
}

.onoffswitch2-label {
    display: block; overflow: hidden; cursor: pointer;
    border: 2px solid #999999; border-radius: 5px;
}

.onoffswitch2-inner {
    display: block; width: 200%; margin-left: -100%;
    -moz-transition: margin 0.3s ease-in 0s; -webkit-transition: margin 0.3s ease-in 0s;
    -o-transition: margin 0.3s ease-in 0s; transition: margin 0.3s ease-in 0s;
}

.onoffswitch2-inner:before, .onoffswitch2-inner:after {
    display: block; float: left; width: 50%; height: 30px; padding: 0; line-height: 30px;
    font-size: 14px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;
    -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box;
}

.onoffswitch2-inner:before {
    content: "Picture";
    padding-left: 10px;
    background-color: #2FCCFF; color: #FFFFFF;
}

.onoffswitch2-inner:after {
    content: "No Picture";
    padding-right: 10px;
    background-color: #EEEEEE; color: #999999;
    text-align: right;
}

.onoffswitch2-switch {
    display: block; width: 18px; margin: 0px;
    background: #FFFFFF;
    border: 2px solid #999999; border-radius: 5px;
    position: absolute; top: 0; bottom: 0; right: 92px;
    -moz-transition: all 0.3s ease-in 0s; -webkit-transition: all 0.3s ease-in 0s;
    -o-transition: all 0.3s ease-in 0s; transition: all 0.3s ease-in 0s; 
    background-image: -moz-linear-gradient(center top, rgba(0,0,0,0.1) 0%, rgba(0,0,0,0) 100%);
    background-image: -webkit-linear-gradient(center top, rgba(0,0,0,0.1) 0%, rgba(0,0,0,0) 100%);
    background-image: -o-linear-gradient(center top, rgba(0,0,0,0.1) 0%, rgba(0,0,0,0) 100%);
    background-image: linear-gradient(center top, rgba(0,0,0,0.1) 0%, rgba(0,0,0,0) 100%);
}

.onoffswitch2-checkbox:checked + .onoffswitch2-label .onoffswitch2-inner {
    margin-left: 0;
}

.onoffswitch2-checkbox:checked + .onoffswitch2-label .onoffswitch2-switch {
    right: 0px; 
}
</style>        
 </head>
 <body>
    <div class="div-header"></div>
    <div class="div-container"></div>
    <!-- Add Party List -->
    <div class="modal fade" id="party_list" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title">Add Partlist</h4>
          </div>

          <div class="modal-body">
            <h5>PARTYLIST NAME</h5>
            <div class="row">
              <div class="col-sm-12 col-lg-6" align="right">
                <input type="text" id="pname" class="form-control">
                <span id="errlist" style="color:red"></span>   
                <span id="errlist2" style="color:red"></span> 
              </div>
              <div class="col-sm-12 col-lg-5" align="left">
                <h3 style="margin-left:-20px;">- Partylist</h3>
              </div>
            </div>
                      
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="add_partylist()">Add</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>   

    <!-- Add Section List -->
    <div class="modal fade" id="section_list" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title">Add Section</h4>
          </div>

          <div class="modal-body">
           <strong>GRADE LEVEL</strong>
            <select id="glvl" class="form-control">
              <?php 
              $qs = "SELECT * FROM school WHERE id = '".$id."'";
                $result2 = $con->query($qs);
                  $row = $result2->fetch_assoc();
                  $stype = $row['school_type'];

                  if($stype == "Elementary (Grade 4-6)"){
                  ?> 
                  <option>Grade 3</option>
                  <option>Grade 4</option>
                  <option>Grade 5</option>
                  <option>Grade 6</option>
                  <?php
                  }else if($stype == "Integrated School (Grade 7-12)"){
                  ?>
                  <option>Grade 7</option>
                  <option>Grade 8</option>
                  <option>Grade 9</option>
                  <option>Grade 10</option>
                  <option>Grade 11</option>
                  <option>Grade 12</option>                 
                  <?php                  
                  }else if($stype == "Junior High School (Grade 7-10)"){
                  ?>
                  <option>Grade 7</option>
                  <option>Grade 8</option>
                  <option>Grade 9</option>
                  <option>Grade 10</option>
                  <?php
                  }else if($stype == "Senior High School (Grade 11-12)"){
                  ?>
                  <option>Grade 11</option>
                  <option>Grade 12</option>  
                  <?php
                  }
               ?>
            </select>
            <br>
            <strong>SECTION</strong> 
            <input type="text" id="section" class="form-control">
            <span id="err_section1" style="color:red;"></span>
            <br>
            <strong>NUMBER OF VOTERS</strong> 
            <input type="number" name="no_voters" id="no_voters" class="form-control">
            <span id="err_section2" style="color:red;"></span>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="add_section()">Add</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>    

    <!-- Edit School -->
    <div class="modal fade" id="edit_school" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title">Edit</h4>
          </div>
          <div class="modal-body edit_result" style="font-weight: bold;">
                            
          </div>
          <span id="err_input" style="color:red; text-align: center"></span>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="edit_confirm()">Confirm</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>  

     <div class="modal fade" id="edit_partylist" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title">Update Partylist Name</h4>
          </div>
          <div class="modal-body edit_plist" style="font-weight: bold;">
                            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="update_pname_confirm()">Confirm</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="edit_section" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title">Update Section</h4>
          </div>
          <div class="modal-body edit_section" style="font-weight: bold;">
                            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="edit_section_confirm()">Confirm</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>    

    <div class="modal fade" id="view_ballot" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title">Select Voting Type</h4>
          </div>
          <div class="modal-body " style="font-weight: bold;">
                    <div class="view_ballot" align="center"></div> 

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>    


    <div class="modal fade" id="view_p_list" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="background: white">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title">Update Info</h4>
          </div>          
          <div class="modal-body plist_result" style="font-weight: bold;">
                          
          </div>
        </div>
      </div>
    </div>  

    <div class="modal fade" id="validate" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title">Confirm Validation</h4>
          </div>          
          <div class="modal-body" style="font-weight: bold;">
            <h4>Voting will commence once validated</h4>                  
         <input type="hidden" id="main">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="validate_confirm()">Confirm</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          </div>          
        </div>
      </div>
    </div>   

    <div class="modal fade" id="close_election" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title">Confirmation</h4>
          </div>          
          <div class="modal-body" style="font-weight: bold;">
         Confirm Closing the Election?                   
         <input type="hidden" id="main2">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="close_confirm()">Confirm</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          </div>          
        </div>
      </div>
    </div> 

    <div class="modal fade" id="reset_election" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title">Confirmation</h4>
          </div>          
          <div class="modal-body" style="font-weight: bold;">
         Confirm Reset Election System?                   
         <input type="hidden" id="main">
         <input type="hidden" id="stype">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="reset_confirm()">Confirm</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          </div>          
        </div>
      </div>
    </div>   

    <div class="modal fade" id="indipendent" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title">Register Participants</h4>
          </div>          
          <div class="modal-body" style="font-weight: bold;">
         <div class="row">
              <div class="col-sm-12 col-lg-12">
               <h5>SELECT POSITION</h5>
               <select id="position" class="form-control">
                <option>President</option>
                <option>Vice-President</option>
                <option>Secretary</option>
                <option>Treasurer</option>
                <option>Auditor</option>
                <option>Public Information Officer</option>
                <option>Peace Officer</option>
                <?php $get_pos = "SELECT * FROM school";
                    $get_res = $con->query($get_pos);
                    $row = $get_res->fetch_assoc();
                    $type = $row['school_type'];
                    if($type == "Elementary (Grade 4-6)"){
                    ?>
                    <option>Grade 4 Councilor</option>
                    <option>Grade 5 Councilor</option>
                    <option>Grade 6 Councilor</option>
                    <?php

                    }else if($type == "Integrated School (Grade 7-12)"){
                    ?>
                    <option>Grade 7 Representative</option>
                    <option>Grade 8 Representative</option>
                    <option>Grade 9 Representative</option>
                    <option>Grade 10 Representative</option>
                    <option>Grade 11 Representative</option>
                    <option>Grade 12 Representative</option>
                    <?php

                    }else if($type == "Junior High School (Grade 7-10)"){
                    ?>
                    <option>Grade 7 Representative</option>
                    <option>Grade 8 Representative</option>
                    <option>Grade 9 Representative</option>
                    <option>Grade 10 Representative</option>
                    <?php
                    }else if($type == "Senior High School (Grade 11-12)"){
                    ?>
                    <option>Grade 11 Representative</option>
                    <option>Grade 12 Representative</option>
                    <?php
                    }

                 ?>
               </select>
               <br>
               <h5>Candidate Name</h5>
               <input type="text" id="name" onkeyup='this.value = this.value.toUpperCase();' class="form-control">
               <span id="err_add2" style="color:red; text-align:center"></span>
              </div>
            </div>
            <br>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="independent_confirm()">Register</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          </div>          
        </div>
      </div>
    </div>    

    <div class="modal fade" id="edit_participant" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="background: white;">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title">Update Participant</h4>
          </div>          
          <div class="modal-body edit_participant" style="font-weight: bold;">

          </div>       
        </div>
      </div>
    </div>                  

    <!-- Add Participants -->
    <div class="modal fade" id="participants" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content ">
          <div class="modal-header">
          <h4 class="modal-title">Register Participants</h4>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </div>          
          <div class="modal-body" style="font-weight: bold;">
            <div class="row">
              <div class="col-sm-12 col-lg-12">
                <h5> SELECT PARTYLIST</h5>
                  <select id="plist" class="form-control">
                   <?php 
                      $sql = "SELECT * FROM partylist";
                        $result = $con->query($sql);

                        while($row = $result->fetch_assoc()){
                          $pid   = $row['pid'];

                          $check = "SELECT * FROM participants WHERE pid = '".$pid."'";
                          $res = $con->query($check);
                          $count = $res->num_rows;
                          if($count > 0){

                          }else{
                            $pname = $row['partylist_name'];
                          ?>
                          <option value="<?php echo $pid; ?>"><?php echo $pname; ?></option>
                        <?php
                          }
                        }
                    ?>
                  </select>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-12 col-lg-12">
                President <input type="text" id="pres" onkeyup="this.value = this.value.toUpperCase();" class="form-control">
              </div>
            </div><br>
            <div class="row">
              <div class="col-sm-12 col-lg-12">
                Vice-President <input type="text" id="vpres" onkeyup="this.value = this.value.toUpperCase();" class="form-control">
              </div>
            </div><br>   
            <div class="row">
              <div class="col-sm-12 col-lg-12">
                Secretary <input type="text" id="sec" onkeyup="this.value = this.value.toUpperCase();" class="form-control">
              </div>
            </div><br> 
            <div class="row">
              <div class="col-sm-12 col-lg-12">
                Treasurer <input type="text" id="treasurer" onkeyup="this.value = this.value.toUpperCase();" class="form-control">
              </div>
            </div><br>  
            <div class="row">
              <div class="col-sm-12 col-lg-12">
                Auditor <input type="text" id="audit" onkeyup="this.value = this.value.toUpperCase();" class="form-control">
              </div>
            </div> <br>            
            <div class="row">
              <div class="col-sm-12 col-lg-12">
                P.I.O <input type="text" id="pio" onkeyup="this.value = this.value.toUpperCase();" class="form-control">
              </div>
            </div><br>   
            <div class="input_fields_wrap">
            <div class="row">
              <div class="col-sm-12 col-lg-12">
                <button class="add_field_button btn btn-success btn-sm"><i class="fas fa-user-plus"></i></button> Peace Officer <input type="text" name="peace_officer[]" id="peace_officer[]" onkeyup="this.value = this.value.toUpperCase();" class="form-control" >
              </div>
            </div>              
            </div> 
            <?php 
            $get_level = "SELECT * FROM school";
              $get_res = $con->query($get_level);
              $row = $get_res->fetch_assoc();
              $stype = $row['school_type'];

              ?>
              <input type="hidden" id="styp" value="<?php echo $stype; ?>">
              <?php
              if($stype == 'Elementary (Grade 4-6)'){
              ?><br>
            <div class="input_fields_wrap2">
            <div class="row">
              <div class="col-sm-12 col-lg-12">
                <button class="add_field_button2 btn btn-success btn-sm"><i class="fas fa-user-plus"></i></button> Grade 4 Councilor <input type="text" name="grade4[]" id="grade4[]" onkeyup="this.value = this.value.toUpperCase();" class="form-control" >
              </div>
            </div>              
            </div><br>
            <div class="input_fields_wrap3">
            <div class="row">
              <div class="col-sm-12 col-lg-12">
                <button class="add_field_button3 btn btn-success btn-sm"><i class="fas fa-user-plus"></i></button> Grade 5 Councilor <input type="text" name="grade5[]" id="grade5[]" onkeyup="this.value = this.value.toUpperCase();" class="form-control" >
              </div>
            </div>              
            </div><br>
            <div class="input_fields_wrap4">
            <div class="row">
              <div class="col-sm-12 col-lg-12">
                <button class="add_field_button4 btn btn-success btn-sm"><i class="fas fa-user-plus"></i></button> Grade 6 Councilor <input type="text" name="grade6[]" id="grade6[]" onkeyup="this.value = this.value.toUpperCase();" class="form-control" >
              </div>
            </div>              
            </div>

              <?php
              }else if($stype == 'Integrated School (Grade 7-12)'){
              ?><br>
            <div class="input_fields_wrap5">
            <div class="row">
              <div class="col-sm-12 col-lg-12">
                <button class="add_field_button5 btn btn-success btn-sm"><i class="fas fa-user-plus"></i></button> Grade 7 Representative <input type="text" name="grade7[]" id="grade7[]" onkeyup="this.value = this.value.toUpperCase();" class="form-control" >
              </div>
            </div>              
            </div><br>
            <div class="input_fields_wrap6">
            <div class="row">
              <div class="col-sm-12 col-lg-12">
                <button class="add_field_button6 btn btn-success btn-sm"><i class="fas fa-user-plus"></i></button> Grade 8 Representative <input type="text" name="grade8[]" id="grade8[]" onkeyup="this.value = this.value.toUpperCase();" class="form-control" >
              </div>
            </div>              
            </div><br>
            <div class="input_fields_wrap7">
            <div class="row">
              <div class="col-sm-12 col-lg-12">
                <button class="add_field_button7 btn btn-success btn-sm"><i class="fas fa-user-plus"></i></button> Grade 9 Representative <input type="text" name="grade9[]" id="grade9[]" onkeyup="this.value = this.value.toUpperCase();" class="form-control" >
              </div>
            </div>              
            </div><br>
            <div class="input_fields_wrap8">
            <div class="row">
              <div class="col-sm-12 col-lg-12">
                <button class="add_field_button8 btn btn-success btn-sm"><i class="fas fa-user-plus"></i></button> Grade 10 Representative <input type="text" name="grade10[]" id="grade10[]" onkeyup="this.value = this.value.toUpperCase();" class="form-control" >
              </div>
            </div>              
            </div><br>
            <div class="input_fields_wrap9">
            <div class="row">
              <div class="col-sm-12 col-lg-12">
                <button class="add_field_button9 btn btn-success btn-sm"><i class="fas fa-user-plus"></i></button> Grade 11 Representative <input type="text" name="grade11[]" id="grade11[]" onkeyup="this.value = this.value.toUpperCase();" class="form-control" >
              </div>
            </div>              
            </div><br>
            <div class="input_fields_wrap10">
            <div class="row">
              <div class="col-sm-12 col-lg-12">
                <button class="add_field_button10 btn btn-success btn-sm"><i class="fas fa-user-plus"></i></button> Grade 12 Representative <input type="text" name="grade12[]" id="grade12[]" onkeyup="this.value = this.value.toUpperCase();" class="form-control" >
              </div>
            </div>              
            </div>

              <?php
              }else if($stype == 'Junior High School (Grade 7-10)'){
              ?><br>
            <div class="input_fields_wrap11">
            <div class="row">
              <div class="col-sm-12 col-lg-12">
                <button class="add_field_button11 btn btn-success btn-sm"><i class="fas fa-user-plus"></i></button> Grade 7 Representative <input type="text" name="grade71[]" id="grade71[]" onkeyup="this.value = this.value.toUpperCase();" class="form-control" >
              </div>
            </div>              
            </div><br>
            <div class="input_fields_wrap12">
            <div class="row">
              <div class="col-sm-12 col-lg-12">
                <button class="add_field_button12 btn btn-success btn-sm"><i class="fas fa-user-plus"></i></button> Grade 8 Representative <input type="text" name="grade81[]" id="grade81[]" onkeyup="this.value = this.value.toUpperCase();" class="form-control" >
              </div>
            </div>              
            </div><br>
            <div class="input_fields_wrap13">
            <div class="row">
              <div class="col-sm-12 col-lg-12">
                <button class="add_field_button13 btn btn-success btn-sm"><i class="fas fa-user-plus"></i></button> Grade 9 Representative <input type="text" name="grade91[]" id="grade91[]" onkeyup="this.value = this.value.toUpperCase();" class="form-control" >
              </div>
            </div>              
            </div><br>
            <div class="input_fields_wrap14">
            <div class="row">
              <div class="col-sm-12 col-lg-12">
                <button class="add_field_button14 btn btn-success btn-sm"><i class="fas fa-user-plus"></i></button> Grade 10 Representative <input type="text" name="grade101[]" id="grade101[]" onkeyup="this.value = this.value.toUpperCase();" class="form-control" >
              </div>
            </div>              
            </div>

              <?php
              }else if($stype == 'Senior High School (Grade 11-12)'){
              ?><br>
            <div class="input_fields_wrap15">
            <div class="row">
              <div class="col-sm-12 col-lg-12">
                <button class="add_field_button15 btn btn-success btn-sm"><i class="fas fa-user-plus"></i></button> Grade 11 Representative <input type="text" name="grade11[]" id="grade11[]" onkeyup="this.value = this.value.toUpperCase();" class="form-control" >
              </div>
            </div>              
            </div><br>
            <div class="input_fields_wrap16">
            <div class="row">
              <div class="col-sm-12 col-lg-12">
                <button class="add_field_button16 btn btn-success btn-sm"><i class="fas fa-user-plus"></i></button> Grade 12 Representative <input type="text" name="grade12[]" id="grade12[]" onkeyup="this.value = this.value.toUpperCase();" class="form-control" >
              </div>
            </div>              
            </div>

              <?php
              }
             ?>
             <br>
          <span id="err_add" style="color:red; text-align:center"></span>                                                                             
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="register_participant()">Register</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          </div>          
        </div>
      </div>
    </div>            

    <div class="modal fade" id="about" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title">About</h4>
          </div>          
          <div class="modal-body">
            <strong  style="text-decoration: underline;">PROPOSED BY:</strong> <br>
            <strong>Roxer Erwin Garcia</strong> - PDO I Youth Development Officer <br>
            <strong>Ciara Faye Mangulabnan</strong> - PDO I Youth Development Officer <br>
           <strong> Sherry Ann Palasigue</strong> - PDO I Youth Development Officer
            <hr>
            <strong style="text-decoration: underline;">CONCEPT, ANALYSIS & DESIGN:</strong> <br>
           <strong> Roderic S. Elegado</strong> - IT Officer I <br>
            <strong>Ricomar G. Sindanum</strong> - Administrative Assistant III
            <hr>
            <strong style="text-decoration: underline;">PROGRAMMER:</strong> <br>
            <strong>Joseph Ross F. Balite</strong> - Administrative Assistant II <br>
            <strong>Mike Ahren M. Rances</strong> - Administrative Assistant III
          </div>
          <div class="modal-footer">
            <table align="center">
              <tr>
                <td width="40px"><img src="img/sdo.png" width="40"></td>
                <td width="290px" align="center" style="font-weight: bold; font-size: 14px;">
                SCHOOLS DIVISION OF NUEVA ECIJA
          
                <i class="fas fa-copyright" style="vertical-align: top; font-size: 11px;"> COPYRIGHT 2020</i> 
              </td>
               <td width="40px"><img src="img/isologo.png" width="40"></td>
               <td width="40px"><img src="img/child.png" width="40"></td>
              </tr>
            </table>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div> 

    <div class="modal fade" id="add_section_success" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document" style="margin-top: 10%">
        <div class="modal-content">
          <div class="modal-body">
            Section has been added!
          </div>
          <div class="modal-footer">
             <button type="button" class="btn btn-secondary" onclick="refresh()">Close</button>
          </div>
        </div>
      </div>
    </div>    

    <div class="modal fade" id="add_partylist_success" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document" style="margin-top: 10%">
        <div class="modal-content">
          <div class="modal-body">
            Partylist has been added!
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="refresh3()">Close</button>
          </div>
        </div>
      </div>
    </div>  

    <div class="modal fade" id="update_partylist_success" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document" style="margin-top: 10%">
        <div class="modal-content">
          <div class="modal-body pl">
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="refresh2()">Close</button>
          </div>
        </div>
      </div>
    </div>      

    <div class="modal fade" id="edit_section_success" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document" style="margin-top:10%">
        <div class="modal-content">
          <div class="modal-body">
            <strong>Section has been Updated!</strong>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="refresh()">Close</button>
          </div>
        </div>
      </div>
    </div>     

    <div class="modal fade" id="disable" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document" style="margin-top: 10%">
        <div class="modal-content alert alert-danger" style="background: pink">
          <div class="modal-body" align="center">
        
              <strong>Voting is now initialized! Adding is now prohibited!</strong>
      
          </div>
        </div>
      </div>
    </div>      

     <div class="modal fade" id="disable2" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document" style="margin-top: 10%">
        <div class="modal-content alert alert-danger" style="background: pink">
          <div class="modal-body" align="center">
        
              <strong>Voting is now initialized! Changing the Voting Appearance is now prohibited!</strong>
      
          </div>
        </div>
      </div>
    </div>         

    <div class="modal fade" id="edit_school_success" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            School Info has been Updated!
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="refresh()">Close</button>
          </div>
        </div>
      </div>
    </div> 

    <div class="modal fade" id="register_participant_success" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document" style="margin-top: 10%">
        <div class="modal-content">
          <div class="modal-body">
            New Participants has been Added!
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="refresh3()">Close</button>
          </div>
        </div>
      </div>
    </div>  

    <div class="modal fade" id="independent_success" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document" style="margin-top: 10%">
        <div class="modal-content">
          <div class="modal-body">
            New Participants has been Added!
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="refresh3()">Close</button>
          </div>
        </div>
      </div>
    </div>       

    <div class="modal fade" id="edit_participant_success" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="background: white">
      <div class="modal-dialog" role="document" style="margin-top: 10%">
        <div class="modal-content">
          <div class="modal-body par_name">
           
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="refresh_view_participants()">Close</button>
          </div>
        </div>
      </div>
    </div>    

    <div class="modal fade" id="delete_partylist" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document" style="margin-top:10%">
        <div class="modal-content">
          <div class="modal-body">
            <input type="hidden" id="pn">
              <h5>Are you sure you want to delete partylist?</h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="delete_partylist_confirm()">Confirm</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>   

    <div class="modal fade" id="delete_independent" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document" style="margin-top:10%">
        <div class="modal-content">
          <div class="modal-body">
            <input type="hidden" id="indep">
              <h5>Are you sure you want to delete Participant?</h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="delete_participant_confirm()">Confirm</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div> 

    <div class="modal fade" id="delete_section" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document" style="margin-top:10%">
        <div class="modal-content">
          <div class="modal-body">
            <input type="hidden" id="sec">
            <input type="hidden" id="g">
              <h5>Are you sure you want to delete Section?</h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="delete_section_confirm()">Confirm</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>            

    <div class="modal fade" id="delete_partylist_success" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document" style="margin-top:10%">
        <div class="modal-content">
          <div class="modal-body">
            <input type="hidden" id="pn">
              <h5>Partylist has been deleted</h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" onclick="refresh()">Close</button>
          </div>
        </div>
      </div>
    </div>     

    <div class="modal fade" id="delete_independent_success" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document" style="margin-top:10%">
        <div class="modal-content">
          <div class="modal-body">
            <input type="hidden" id="pn">
              <h5>Participant has been deleted</h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" onclick="refresh()">Close</button>
          </div>
        </div>
      </div>
    </div>    

    <div class="modal fade" id="delete_section_success" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document" style="margin-top:10%">
        <div class="modal-content">
          <div class="modal-body">
            <input type="hidden" id="pn">
              <h5>Section has been deleted</h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" onclick="refresh()">Close</button>
          </div>
        </div>
      </div>
    </div>        

    <div class="modal fade" id="validate_success" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document" style="margin-top: 10%;">
        <div class="modal-content">
          <div class="modal-body pname" align="center">

           <h2>VOTING IS NOW OFFICALLY OPEN!</h2>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="refresh3()">Close</button>
          </div>          
        </div>
      </div>
    </div> 

    <div class="modal fade" id="not_validate" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document" style="margin-top: 10%;">
        <div class="modal-content">
          <div class="modal-body pname" align="center">

           <h4>
              Please check if you have the following:
            </h4>
              <br>
              <h4 align="left">*PARTYLIST <br>
              *PARTICIPANTS <br>
              *SECTIONS</h4>
          </div>
        </div>
      </div>
    </div>     

      <div class="modal fade" id="reset" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog" role="document" style="margin-top: 8%">
        <div class="modal-content">
          <div class="modal-body" align="center">
            <br><br>
            <h1><div id="countdown"></div></h1>
            <br><br>
          </div>
        </div>
      </div>
    </div> 

    <div class="modal fade" id="close_success" data-backdrop="static" data-keyboard="false" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document" style="margin-top: 10%;">
        <div class="modal-content">
          <div class="modal-body pname" align="center">

           <h3>VOTING IS NOW OFFICALLY CLOSED!</h3><br>
           <?php 

           $current_time = date("m/d/y");
            $date = date("M jS, Y", strtotime($current_time));
            $time = date("h:i A");
            $val_date = $date."-".$time;
            echo "<h4 style='color:red; font-weight:bold;'>".$val_date."</h4>";
            ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="refresh3()">Close</button>
          </div>          
        </div>
      </div>
    </div>           

    <div class="modal fade" id="reset_success" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog" role="document" style="margin-top: 10%;">
        <div class="modal-content">
          <div class="modal-body pname" align="center">

           <h2>E-VOTE HAS BEEN RESET!</h2>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="logout()">Close</button>
          </div>
        </div>
      </div>
    </div>              

    <div class="modal fade" id="edit_partylist_success" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="background: white">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body pname">
           
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="edit_participant_redirect()">Close</button>
          </div>
        </div>
      </div>
    </div>  
 </body>
 <footer>
<table align="center">
  <tr>
    <td width="40px"><img src="img/sdo.png" width="50"></td>
    <td width="290px" align="center" style="font-weight: bold;">
    SCHOOLS DIVISION OF NUEVA ECIJA
    <label style="font-size: 11px; vertical-align: top;">Brgy. Rizal, Santa Rosa, Nueva Ecija</label><br>
    <i class="fas fa-copyright" style="vertical-align: top; font-size: 12px;"> COPYRIGHT 2020</i> 
  </td>
   <td width="40px"><img src="img/isologo.png" width="50"></td>
   <td width="40px"><img src="img/child.png" width="50"></td>
  </tr>
</table>
 </footer>
 </html> 

 <script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery.form.js"></script>   
 
<script type="text/javascript">


$('.div-header').load("sdo-ne_header.php");
$('.div-container').load("sdo-ne_main.php");

function partylist(){
  $('#party_list').modal("show");
}

function add_partylist(){
  var pname = $('#pname').val();
  if(pname != ""){
    $('#party_list').modal("hide");
     $.ajax({url: "sdo-ne_add_partylist.php", data: { pname:pname }, type: "POST", success: function(result){
    $('#add_partylist_success').modal("show");
    }});
  }else{
    alert('Please Insert Partylist');
  }

}

function participants(){
      $('#participants').modal("show");
}

function independent(){
  $('#indipendent').modal("show");
}

function section(){
  $('#section_list').modal("show");
}

function edit_school(schl_id){
 $.ajax({url: "sdo-ne_edit_school.php", data: { schl_id:schl_id }, type: "POST", success: function(result){
  $('#edit_school').modal("show");
  $('.edit_result').html(result);
  }});  

}

var auto_refresh = setInterval(
function ()
{
$('.view_ballot').load('sdo-ne_ballot_type.php').fadeIn("slow");
}, 1000); // refresh every 1000 milliseconds   



function add_section(){
  var glvl      = $('#glvl').val();
  var section   = $('#section').val();
  var no_voters = $('#no_voters').val();

    if(section != ""){
      if(no_voters != ""){
      $('#section_list').modal("hide");
      $.ajax({url: "sdo-ne_add_section.php", data: { glvl:glvl, section:section, no_voters:no_voters }, type: "POST", success: function(result){
        $('#add_section_success').modal("show");
        }});
      }else{
        $('#err_section2').text("Please add number of voters.").show(); 
        $('#err_section1').hide();         

      }
    }else{
      $('#err_section1').text("Please add a section.").show();

      $('#err_section2').hide();

    }
}

function tallyboard(){
  $('.div-container').load("sdo-ne_tallyboard.php");
}

function aboutus(){
  $('#about').modal("show");
}

function disable(){
  $('#disable').modal("show");
}

function disable2(){
  $('#disable2').modal("show");
}

function refresh3(){
  location.reload();
}

function refresh(){
  $('#delete_independent_success').modal("hide");
  $('#delete_section_success').modal("hide");
  $('#delete_partylist_success').modal("hide");
  $('#delete_participant_success').modal("hide");
  $('#add_section_success').modal("hide");
  $('#edit_section_success').modal("hide");
  $('.div-container').load("sdo-ne_main.php");
}

function refresh2(){
  $('#update_partylist_success').modal("hide");
   var pname = $('#plname').val();
  $('.div-container').load("sdo-ne_view_partylist.php?partylist="+pname);
}

function edit_plist(pname){
  $.ajax({url: "sdo-ne_edit_partylist.php", data: { pname:pname }, type: "POST", success: function(result){
         $('#edit_partylist').modal("show");
         $('.edit_plist').html(result);
  }});
 
}

function edit_grade(section, gl){
$.ajax({url: "sdo-ne_edit_section.php", data: { section:section, gl:gl }, type: "POST", success: function(result){
         $('#edit_section').modal("show");
         $('.edit_section').html(result);
  }});
}

function validate(main){
  $('#main').val(main);
  $('#validate').modal("show");
}

function edit_confirm(){
  var sname = $('#sname').val();
  var sid = $('#sid').val();
  var admin = $('#admin').val();
  var syear = $('#syear').val();
  var sc = $('#sc').val();

  if(sname != "" && sid != "" && admin != "" && syear != "" && sc != ""){
    $('#edit_school').modal("hide");
  $.ajax({url: "sdo-ne_edit_school_confirm.php", data: { sname:sname, sid:sid, admin:admin, syear:syear, sc:sc }, type: "POST", success: function(result){
    $('#edit_school_success').modal("show");
    }}); 
  }else{
 $('#err_input').text("Please fill out empty field.").show();
  }

 
}

function validate_confirm(){
  var main = $('#main').val();
  var id = '<?php echo $id ?>';
  $('#validate').modal("hide");
  $.ajax({url: "sdo-ne_validate_confirm.php", data: { main:main, id:id }, type: "POST", success: function(result){
     $('#validate_success').modal("show");
  }});  
}

function close_election(main2){
  $('#main2').val(main2);
  $('#close_election').modal("show");
}

function close_confirm(){
  var main = $('#main2').val();
  var id = '<?php echo $id ?>';
 $('#close_election').modal("hide");
  $.ajax({url: "sdo-ne_close_confirm.php", data: { main:main, id:id }, type: "POST", success: function(result){
     $('#close_success').modal("show");
  }});  
  
}

function reset_election(main3,stype){
  $('#main2').val(main3);
  $('#stype').val(stype);

  $('#reset_election').modal("show");
}

function reset_confirm(){
  var main = $('#main3').val();
  var stype = $('#stype').val();
  var id = '<?php echo $id ?>';
  $('#reset_election').modal("hide");
  window.open('sdo-ne_download_'+stype,'_blank');
  $('#reset').modal("show");
  var timeleft = 10;
  var downloadTimer = setInterval(function(){
  document.getElementById("countdown").innerHTML = "Resetting System in " + timeleft;
  timeleft -= 1;
  if(timeleft <= 0){
    clearInterval(downloadTimer);
    $(this).scrollTop(0);
  $('#reset').modal("hide");
 
  $.ajax({url: "sdo-ne_reset_confirm.php", data: { main:main, id:id }, type: "POST", success: function(result){
     $('#reset_success').modal("show");
  }});  

  }
}, 1000);
   
}

function logout(){
  window.location.href = "sdo-ne_logout.php";
}


function edit_section_confirm(){
  var old_section = $('#section_old').val();
  var nsection = $('#nsection').val();
   var lvl = $('#lvl').val();
  var voters = $('#voters').val();
  if(nsection != ""){
    if(voters != ""){
    $('#edit_section').modal("hide");
    $.ajax({url: "sdo-ne_edit_section_confirm.php", data: { old_section:old_section, nsection:nsection, voters:voters,lvl:lvl }, type: "POST", success: function(result){
             $('#edit_section_success').modal("show");
    }});  
  }else{
    $('#err_voter').text("Please add Number of Voters.").show();
    $('#err_sec1').text("Please add a section.").hide();
  }
  }else{
    $('#err_sec1').text("Please add a section.").show();
  }
}

function update_pname_confirm(){
  var pname = $('#prtyname').val();
  var pid   = $('#pid').val();
  $('#edit_partylist').modal("hide");
  $.ajax({url: "sdo-ne_edit_partylist_confirm.php", data: { pname:pname, pid:pid }, type: "POST", success: function(result){
    $('#update_partylist_success').modal("show");
     $('.pl').html(result);
  }});
}


function edit_participant(id, pd){
 $.ajax({url: "sdo-ne_edit_participant.php", data: { id:id, pd:pd }, type: "POST", success: function(result){
    $('#edit_participant').modal("show");
     $('.edit_participant').html(result);
  }});
}

function view_partylist(pid){
  $('.div-container').load("sdo-ne_view_partylist.php?partylist="+pid);
}

function  delete_partylist(pn){
  $('#pn').val(pn);
  $('#delete_partylist').modal("show");
}

function  delete_independent(indep){
  $('#indep').val(indep);
  $('#delete_independent').modal("show");
}

function  delete_section(sec,g){
  $('#sec').val(sec);
  $('#g').val(g);
  $('#delete_section').modal("show");
}

function delete_participant_confirm(){
  var inde   = $('#indep').val();
  $('#delete_independent').modal("hide");
 $.ajax({url: "sdo-ne_delete_participant_confirm.php", data: { inde:inde }, type: "POST", success: function(result){
    $('#delete_independent_success').modal("show");
  }});  
}

function delete_section_confirm(){
  var sec   = $('#sec').val();
  var g   = $('#g').val();

  $('#delete_section').modal("hide");
 $.ajax({url: "sdo-ne_delete_section_confirm.php", data: { sec:sec, g:g }, type: "POST", success: function(result){
    $('#delete_section_success').modal("show");
  }});  
}

function delete_partylist_confirm(){
  var pn   = $('#pn').val();
  $('#delete_partylist').modal("hide");
 $.ajax({url: "sdo-ne_delete_partylist_confirm.php", data: { pn:pn }, type: "POST", success: function(result){
    $('#delete_partylist_success').modal("show");
  }});  
}

function refresh_view_participants(pname){
  var pname      = $('#plname').val();
  $('#edit_participant').modal("hide");
  $('#edit_participant_success').modal("hide");
  $('.div-container').load("sdo-ne_view_partylist.php?partylist="+pname);
}

function refresh_view_participants2(pname2){
  $('#edit_participant').modal("hide");
  $('#edit_participant_success').modal("hide");
  $('.div-container').load("sdo-ne_view_partylist.php?partylist="+pname2);
}

function edit_participant_confirm(){
  $('#err_name1').text("Please add a name.").hide();
  var name       = $('#name1').val();
  var old_name   = $('#old_name').val();
  var pid      = $('#plistname').val();
  var parid      = $('#parid').val();

if(name != ""){
  $.ajax({url: "sdo-ne_edit_participant_confirm.php", data: { name:name, old_name:old_name, pid:pid, parid:parid }, type: "POST", success: function(result){
      $('#edit_participant_success').modal("show");
       $('.par_name').html(result);

    }}); 
}else{
   $('#err_name').text("Please add a section.").show();
} 
}

function independent_confirm(){
  var position  = $('#position').val();
  var name      = $('#name').val();

  if(name != ""){
    $('#indipendent').modal("hide");
  $.ajax({url: "sdo-ne_independent_confirm.php", data: { position:position, name:name }, type: "POST", success: function(result){
      $('#independent_success').modal("show");
    }}); 
  }else{
 $  ('#err_add2').text("Please fill out empty field!").show();
  }
}

function register_participant(){
  var pres      = $('#pres').val();
  var vpres     = $('#vpres').val();
  var sec       = $('#sec').val();
  var treasurer = $('#treasurer').val();
  var auditor   = $('#audit').val();
  var pio       = $('#pio').val();
  var stype     = $('#styp').val();
  var pid       = $('#plist').val();
 

  var peace_officer = $("input[name='peace_officer[]']")
              .map(function(){return $(this).val();}).get();
  console.log(peace_officer); 

  if(stype == "Elementary (Grade 4-6)"){

  var grade4 = $("input[name='grade4[]']")
              .map(function(){return $(this).val();}).get();
  console.log(grade4);

  var grade5 = $("input[name='grade5[]']")
              .map(function(){return $(this).val();}).get();
  console.log(grade5);


  var grade6 = $("input[name='grade6[]']")
              .map(function(){return $(this).val();}).get();
  console.log(grade6);



 $('#participants').modal("hide");
 $.ajax({url: "sdo-ne_register_participant_confirm.php", data: { stype:stype, pres:pres, vpres:vpres, sec:sec, treasurer:treasurer, auditor:auditor, pio:pio, peace_officer:peace_officer, pid:pid, grade4:grade4, grade5:grade5, grade6:grade6 }, type: "POST", success: function(result){
    $('#register_participant_success').modal("show");
  }});   


  }else if(stype == "Integrated School (Grade 7-12)"){
 var grade7 = $("input[name='grade7[]']")
              .map(function(){return $(this).val();}).get();
  console.log(grade7);

  var grade8 = $("input[name='grade8[]']")
              .map(function(){return $(this).val();}).get();
  console.log(grade8);

  var grade9 = $("input[name='grade9[]']")
              .map(function(){return $(this).val();}).get();
  console.log(grade9);

  var grade10 = $("input[name='grade10[]']")
              .map(function(){return $(this).val();}).get();
  console.log(grade10);

var grade11 = $("input[name='grade11[]']")
              .map(function(){return $(this).val();}).get();
  console.log(grade11);

  var grade12 = $("input[name='grade12[]']")
              .map(function(){return $(this).val();}).get();
  console.log(grade12);


 $('#participants').modal("hide");
 $.ajax({url: "sdo-ne_register_participant_confirm.php", data: { stype:stype, pres:pres, vpres:vpres, sec:sec, treasurer:treasurer, auditor:auditor, pio:pio, peace_officer:peace_officer, pid:pid, grade7:grade7, grade8:grade8, grade9:grade9, grade10:grade10, grade11:grade11, grade12:grade12 }, type: "POST", success: function(result){
  $('#register_participant_success').modal("show");
  }}); 


  }else if(stype == "Junior High School (Grade 7-10)"){
 var grade7 = $("input[name='grade71[]']")
              .map(function(){return $(this).val();}).get();
  console.log(grade7);

  var grade8 = $("input[name='grade81[]']")
              .map(function(){return $(this).val();}).get();
  console.log(grade8);

  var grade9 = $("input[name='grade91[]']")
              .map(function(){return $(this).val();}).get();
  console.log(grade9);

  var grade10 = $("input[name='grade101[]']")
              .map(function(){return $(this).val();}).get();
  console.log(grade10);
 
 $('#participants').modal("hide");
 $.ajax({url: "sdo-ne_register_participant_confirm.php", data: { stype:stype, pres:pres, vpres:vpres, sec:sec, treasurer:treasurer, auditor:auditor, pio:pio, peace_officer:peace_officer, pid:pid, grade8:grade8, grade9:grade9, grade10:grade10 }, type: "POST", success: function(result){
  $('#register_participant_success').modal("show");
  }});


  }else if(stype == "Senior High School (Grade 11-12)"){
  var grade11 = $("input[name='grade11[]']")
              .map(function(){return $(this).val();}).get();
  console.log(grade11);

  var grade12 = $("input[name='grade12[]']")
              .map(function(){return $(this).val();}).get();
  console.log(grade12);


 $('#participants').modal("hide");
 $.ajax({url: "sdo-ne_register_participant_confirm.php", data: { stype:stype, pres:pres, vpres:vpres, sec:sec, treasurer:treasurer, auditor:auditor, pio:pio, peace_officer:peace_officer, pid:pid, grade11:grade11, grade12:grade12 }, type: "POST", success: function(result){
  $('#register_participant_success').modal("show");
  }});

  }

}


$(document).ready(function() {
  var max_fields      = '<?php echo $rep; ?>'; //maximum input boxes allowed
  var wrapper       = $(".input_fields_wrap"); //Fields wrapper
  var add_button      = $(".add_field_button"); //Add button ID
  
  var x = 1; //initlal text box count
  $(add_button).click(function(e){ //on add input button click
    e.preventDefault();
    if(x < max_fields){ //max input box allowed
      x++; //text box increment
      $(wrapper).append('<div><a href="#" class="remove_field"><button class="btn btn-sm btn-danger"><i class="fas fa-user-times"></i></button></a> Peace Officer &emsp; &emsp; &emsp;&emsp;<input type="text" class="form-control" name="peace_officer[]" id="peace_officer[]" onkeyup="this.value = this.value.toUpperCase();"  style="padding:6px; border-radius:4px; margin-top:5px;" ></div>'); //add input box
    }
  });
  
  $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('div').remove(); x--;
  })
});

//Grade 3-6
$(document).ready(function() {
  var max_fields1      = 5; //maximum input boxes allowed
  var wrapper1       = $(".input_fields_wrap1"); //Fields wrapper
  var add_button1      = $(".add_field_button1"); //Add button ID
  
  var x = 1; //initlal text box count
  $(add_button1).click(function(e){ //on add input button click
    e.preventDefault();
    if(x < max_fields1){ //max input box allowed
      x++; //text box increment
     var y = "<div><a href='#' class='remove_field1'><button class='btn btn-sm btn-danger'><i class='fas fa-user-times'></i></button></a>Grade 3 Councilor "+x+" &emsp; &emsp; &emsp;&emsp;<input type='text' class='form-control' name='grade3[]' id='grade3[]' onkeyup='this.value = this.value.toUpperCase();'style='padding:1px; border-radius:4px; margin-top:5px;'></div>";
      $(wrapper1).append(y); //add input box
    }
  });
  
  $(wrapper1).on("click",".remove_field1", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('div').remove(); x--;
  })
});

$(document).ready(function() {
  var max_fields2    = '<?php echo $rep; ?>'; //maximum input boxes allowed
  var wrapper2       = $(".input_fields_wrap2"); //Fields wrapper
  var add_button2     = $(".add_field_button2"); //Add button ID
  
  var x = 1; //initlal text box count
  $(add_button2).click(function(e){ //on add input button click
    e.preventDefault();
    if(x < max_fields2){ //max input box allowed
      x++; //text box increment
     var y = "<div><a href='#' class='remove_field2'><button class='btn btn-sm btn-danger'><i class='fas fa-user-times'></i></button></a>Grade 4 Councilor "+x+" &emsp; &emsp; &emsp;&emsp;<input type='text' class='form-control' name='grade4[]' id='grade4[]' onkeyup='this.value = this.value.toUpperCase();'style='padding:2px; border-radius:4px; margin-top:5px;'></div>";
      $(wrapper2).append(y); //add input box
    }
  });
  
  $(wrapper2).on("click",".remove_field2", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('div').remove(); x--;
  })
});

$(document).ready(function() {
  var max_fields3    = '<?php echo $rep; ?>';; //maximum input boxes allowed
  var wrapper3       = $(".input_fields_wrap3"); //Fields wrapper
  var add_button3      = $(".add_field_button3"); //Add button ID
  
  var x = 1; //initlal text box count
  $(add_button3).click(function(e){ //on add input button click
    e.preventDefault();
    if(x < max_fields3){ //max input box allowed
      x++; //text box increment
     var y = "<div><a href='#' class='remove_field3'><button class='btn btn-sm btn-danger'><i class='fas fa-user-times'></i></button></a>Grade 5 Councilor "+x+" &emsp; &emsp; &emsp;&emsp;<input type='text' class='form-control' name='grade5[]' id='grade5[]' onkeyup='this.value = this.value.toUpperCase();'style='padding:2px; border-radius:4px; margin-top:5px;'></div>";
      $(wrapper3).append(y); //add input box
    }
  });
  
  $(wrapper3).on("click",".remove_field3", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('div').remove(); x--;
  })
});

$(document).ready(function() {
  var max_fields4      = '<?php echo $rep; ?>'; //maximum input boxes allowed
  var wrapper4       = $(".input_fields_wrap4"); //Fields wrapper
  var add_button4      = $(".add_field_button4"); //Add button ID
  
  var x = 1; //initlal text box count
  $(add_button4).click(function(e){ //on add input button click
    e.preventDefault();
    if(x < max_fields4){ //max input box allowed
      x++; //text box increment
     var y = "<div><a href='#' class='remove_field4'><button class='btn btn-sm btn-danger'><i class='fas fa-user-times'></i></button></a>Grade 6 Councilor "+x+" &emsp; &emsp; &emsp;&emsp;<input type='text' class='form-control' name='grade6[]' id='grade6[]' onkeyup='this.value = this.value.toUpperCase();'style='padding:2px; border-radius:4px; margin-top:5px;'></div>";
      $(wrapper4).append(y); //add input box
    }
  });
  
  $(wrapper4).on("click",".remove_field4", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('div').remove(); x--;
  })
});
//end

//Grade 7-12
$(document).ready(function() {
  var max_fields5      = '<?php echo $rep; ?>'; //maximum input boxes allowed
  var wrapper5       = $(".input_fields_wrap5"); //Fields wrapper
  var add_button5      = $(".add_field_button5"); //Add button ID
  
  var x = 1; //initlal text box count
  $(add_button5).click(function(e){ //on add input button click
    e.preventDefault();
    if(x < max_fields5){ //max input box allowed
      x++; //text box increment
     var y = "<div><a href='#' class='remove_field5'><button class='btn btn-sm btn-danger'><i class='fas fa-user-times'></i></button></a>Grade 7 Representative "+x+" &emsp; &emsp; &emsp;&emsp;<input type='text' class='form-control' name='grade7[]' id='grade7[]' onkeyup='this.value = this.value.toUpperCase();'style='padding:2px; border-radius:5px; margin-top:5px;'></div>";
      $(wrapper5).append(y); //add input box
    }
  });
  
  $(wrapper5).on("click",".remove_field5", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('div').remove(); x--;
  })
});

$(document).ready(function() {
  var max_fields6      = '<?php echo $rep; ?>'; //maximum input boxes allowed
  var wrapper6       = $(".input_fields_wrap6"); //Fields wrapper
  var add_button6      = $(".add_field_button6"); //Add button ID
  
  var x = 1; //initlal text box count
  $(add_button6).click(function(e){ //on add input button click
    e.preventDefault();
    if(x < max_fields6){ //max input box allowed
      x++; //text box increment
     var y = "<div><a href='#' class='remove_field6'><button class='btn btn-sm btn-danger'><i class='fas fa-user-times'></i></button></a>Grade 8 Representative "+x+" &emsp; &emsp; &emsp;&emsp;<input type='text' class='form-control' name='grade8[]' id='grade8[]' onkeyup='this.value = this.value.toUpperCase();'style='padding:2px; border-radius:6px; margin-top:6px;'></div>";
      $(wrapper6).append(y); //add input box
    }
  });
  
  $(wrapper6).on("click",".remove_field6", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('div').remove(); x--;
  })
});

$(document).ready(function() {
  var max_fields7      = '<?php echo $rep; ?>'; //maximum input boxes allowed
  var wrapper7       = $(".input_fields_wrap7"); //Fields wrapper
  var add_button7      = $(".add_field_button7"); //Add button ID
  
  var x = 1; //initlal text box count
  $(add_button7).click(function(e){ //on add input button click
    e.preventDefault();
    if(x < max_fields7){ //max input box allowed
      x++; //text box increment
     var y = "<div><a href='#' class='remove_field7'><button class='btn btn-sm btn-danger'><i class='fas fa-user-times'></i></button></a>Grade 9 Representative "+x+" &emsp; &emsp; &emsp;&emsp;<input type='text' class='form-control' name='grade9[]' id='grade9[]' onkeyup='this.value = this.value.toUpperCase();'style='padding:2px; border-radius:7px; margin-top:7px;'></div>";
      $(wrapper7).append(y); //add input box
    }
  });
  
  $(wrapper7).on("click",".remove_field7", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('div').remove(); x--;
  })
});

$(document).ready(function() {
  var max_fields8      = '<?php echo $rep; ?>'; //maximum input boxes allowed
  var wrapper8       = $(".input_fields_wrap8"); //Fields wrapper
  var add_button8      = $(".add_field_button8"); //Add button ID
  
  var x = 1; //initlal text box count
  $(add_button8).click(function(e){ //on add input button click
    e.preventDefault();
    if(x < max_fields8){ //max input box allowed
      x++; //text box increment
     var y = "<div><a href='#' class='remove_field8'><button class='btn btn-sm btn-danger'><i class='fas fa-user-times'></i></button></a>Grade 10 Representative "+x+" &emsp; &emsp; &emsp;&emsp;<input type='text' class='form-control' name='grade10[]' id='grade10[]' onkeyup='this.value = this.value.toUpperCase();'style='padding:2px; border-radius:8px; margin-top:8px;'></div>";
      $(wrapper8).append(y); //add input box
    }
  });
  
  $(wrapper8).on("click",".remove_field8", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('div').remove(); x--;
  })
});

$(document).ready(function() {
  var max_fields9      = '<?php echo $rep; ?>'; //maximum input boxes allowed
  var wrapper9       = $(".input_fields_wrap9"); //Fields wrapper
  var add_button9      = $(".add_field_button9"); //Add button ID
  
  var x = 1; //initlal text box count
  $(add_button9).click(function(e){ //on add input button click
    e.preventDefault();
    if(x < max_fields9){ //max input box allowed
      x++; //text box increment
     var y = "<div><a href='#' class='remove_field9'><button class='btn btn-sm btn-danger'><i class='fas fa-user-times'></i></button></a>Grade 11 Representative "+x+" &emsp; &emsp; &emsp;&emsp;<input type='text' class='form-control' name='grade11[]' id='grade11[]' onkeyup='this.value = this.value.toUpperCase();'style='padding:2px; border-radius:9px; margin-top:9px;'></div>";
      $(wrapper9).append(y); //add input box
    }
  });
  
  $(wrapper9).on("click",".remove_field9", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('div').remove(); x--;
  })
});

$(document).ready(function() {
  var max_fields10      = '<?php echo $rep; ?>'; //maximum input boxes allowed
  var wrapper10       = $(".input_fields_wrap10"); //Fields wrapper
  var add_button10      = $(".add_field_button10"); //Add button ID
  
  var x = 1; //initlal text box count
  $(add_button10).click(function(e){ //on add input button click
    e.preventDefault();
    if(x < max_fields10){ //max input box allowed
      x++; //text box increment
     var y = "<div><a href='#' class='remove_field10'><button class='btn btn-sm btn-danger'><i class='fas fa-user-times'></i></button></a>Grade 12 Representative "+x+" &emsp; &emsp; &emsp;&emsp;<input type='text' class='form-control' name='grade12[]' id='grade12[]' onkeyup='this.value = this.value.toUpperCase();'style='padding:2px; border-radius:10px; margin-top:10px;'></div>";
      $(wrapper10).append(y); //add input box
    }
  });
  
  $(wrapper10).on("click",".remove_field10", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('div').remove(); x--;
  })
});
//end


//Junior High School (Grade 7-10)
$(document).ready(function() {
  var max_fields11      = '<?php echo $rep; ?>'; //maximum input boxes allowed
  var wrapper11       = $(".input_fields_wrap11"); //Fields wrapper
  var add_button11      = $(".add_field_button11"); //Add button ID
  
  var x = 1; //initlal text box count
  $(add_button11).click(function(e){ //on add input button click
    e.preventDefault();
    if(x < max_fields11){ //max input box allowed
      x++; //text box increment
     var y = "<div><a href='#' class='remove_field11'><button class='btn btn-sm btn-danger'><i class='fas fa-user-times'></i></button></a>Grade 7 Representative "+x+" &emsp; &emsp; &emsp;&emsp;<input type='text' class='form-control' name='grade71[]' id='grade71[]' onkeyup='this.value = this.value.toUpperCase();'style='padding:2px; border-radius:10px; margin-top:10px;'></div>";
      $(wrapper11).append(y); //add input box
    }
  });
  
  $(wrapper11).on("click",".remove_field11", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('div').remove(); x--;
  })
});

$(document).ready(function() {
  var max_fields12      = '<?php echo $rep; ?>'; //maximum input boxes allowed
  var wrapper12       = $(".input_fields_wrap12"); //Fields wrapper
  var add_button12      = $(".add_field_button12"); //Add button ID
  
  var x = 1; //initlal text box count
  $(add_button12).click(function(e){ //on add input button click
    e.preventDefault();
    if(x < max_fields12){ //max input box allowed
      x++; //text box increment
     var y = "<div><a href='#' class='remove_field12'><button class='btn btn-sm btn-danger'><i class='fas fa-user-times'></i></button></a>Grade 8 Representative "+x+" &emsp; &emsp; &emsp;&emsp;<input type='text' class='form-control' name='grade81[]' id='grade81[]' onkeyup='this.value = this.value.toUpperCase();'style='padding:2px; border-radius:10px; margin-top:10px;'></div>";
      $(wrapper12).append(y); //add input box
    }
  });
  
  $(wrapper12).on("click",".remove_field12", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('div').remove(); x--;
  })
});

$(document).ready(function() {
  var max_fields13      = '<?php echo $rep; ?>'; //maximum input boxes allowed
  var wrapper13       = $(".input_fields_wrap13"); //Fields wrapper
  var add_button13      = $(".add_field_button13"); //Add button ID
  
  var x = 1; //initlal text box count
  $(add_button13).click(function(e){ //on add input button click
    e.preventDefault();
    if(x < max_fields13){ //max input box allowed
      x++; //text box increment
     var y = "<div><a href='#' class='remove_field13'><button class='btn btn-sm btn-danger'><i class='fas fa-user-times'></i></button></a>Grade 9 Representative "+x+" &emsp; &emsp; &emsp;&emsp;<input type='text' class='form-control' name='grade91[]' id='grade91[]' onkeyup='this.value = this.value.toUpperCase();'style='padding:2px; border-radius:10px; margin-top:10px;'></div>";
      $(wrapper13).append(y); //add input box
    }
  });
  
  $(wrapper13).on("click",".remove_field13", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('div').remove(); x--;
  })
});


$(document).ready(function() {
  var max_fields14      = '<?php echo $rep; ?>'; //maximum input boxes allowed
  var wrapper14       = $(".input_fields_wrap14"); //Fields wrapper
  var add_button14      = $(".add_field_button14"); //Add button ID
  
  var x = 1; //initlal text box count
  $(add_button14).click(function(e){ //on add input button click
    e.preventDefault();
    if(x < max_fields14){ //max input box allowed
      x++; //text box increment
     var y = "<div><a href='#' class='remove_field14'><button class='btn btn-sm btn-danger'><i class='fas fa-user-times'></i></button></a>Grade 10 Representative "+x+" &emsp; &emsp; &emsp;&emsp;<input type='text' class='form-control' name='grade101[]' id='grade101[]' onkeyup='this.value = this.value.toUpperCase();'style='padding:2px; border-radius:10px; margin-top:10px;'></div>";
      $(wrapper14).append(y); //add input box
    }
  });
  
  $(wrapper14).on("click",".remove_field14", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('div').remove(); x--;
  })
});


//Senior High School Grade 11-12

$(document).ready(function() {
  var max_fields15      = '<?php echo $rep; ?>'; //maximum input boxes allowed
  var wrapper15       = $(".input_fields_wrap15"); //Fields wrapper
  var add_button15      = $(".add_field_button15"); //Add button ID
  
  var x = 1; //initlal text box count
  $(add_button15).click(function(e){ //on add input button click
    e.preventDefault();
    if(x < max_fields15){ //max input box allowed
      x++; //text box increment
     var y = "<div><a href='#' class='remove_field15'><button class='btn btn-sm btn-danger'><i class='fas fa-user-times'></i></button></a>Grade 11 Representative "+x+" &emsp; &emsp; &emsp;&emsp;<input type='text' class='form-control' name='grade11[]' id='grade11[]' onkeyup='this.value = this.value.toUpperCase();'style='padding:2px; border-radius:10px; margin-top:10px;'></div>";
      $(wrapper15).append(y); //add input box
    }
  });
  
  $(wrapper15).on("click",".remove_field15", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('div').remove(); x--;
  })
});

$(document).ready(function() {
  var max_fields16      = '<?php echo $rep; ?>'; //maximum input boxes allowed
  var wrapper16       = $(".input_fields_wrap16"); //Fields wrapper
  var add_button16      = $(".add_field_button16"); //Add button ID
  
  var x = 1; //initlal text box count
  $(add_button16).click(function(e){ //on add input button click
    e.preventDefault();
    if(x < max_fields16){ //max input box allowed
      x++; //text box increment
     var y = "<div><a href='#' class='remove_field16'><button class='btn btn-sm btn-danger'><i class='fas fa-user-times'></i></button></a>Grade 12 Representative "+x+" &emsp; &emsp; &emsp;&emsp;<input type='text' class='form-control' name='grade12[]' id='grade12[]' onkeyup='this.value = this.value.toUpperCase();'style='padding:2px; border-radius:10px; margin-top:10px;'></div>";
      $(wrapper16).append(y); //add input box
    }
  });
  
  $(wrapper16).on("click",".remove_field16", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('div').remove(); x--;
  })
});

//end

$(document).on('change', '#image_upload_file', function () {
var progressBar = $('.progressBar'), bar = $('.progressBar .bar'), percent = $('.progressBar .percent');

$('#image_upload_form').ajaxForm({
    beforeSend: function() {
    progressBar.fadeIn();
        var percentVal = '0%';
        bar.width(percentVal)
        percent.html(percentVal);
    },
    uploadProgress: function(event, position, total, percentComplete) {
        var percentVal = percentComplete + '%';
        bar.width(percentVal)
        percent.html(percentVal);
    },
    success: function(html, statusText, xhr, $form) {   
    obj = $.parseJSON(html);  
    if(obj.status){   
      var percentVal = '100%';
      bar.width(percentVal)
      percent.html(percentVal);
      $("#imgArea>img").prop('src',obj.image_medium);     
    }else{
      alert(obj.error);
    }
    },
  complete: function(xhr) {
    progressBar.fadeOut();      
  } 
}).submit();    

});
</script>