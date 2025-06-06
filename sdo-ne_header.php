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

  if($status == '1'){
?>
     <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
      <a class="navbar-brand" href="sdo-ne_admin.php"><img src="img/logo.png" width="120"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" style="opacity: 0;"><i class="fa fa-list-alt"></i> INSERT PARTYLIST<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="opacity: 0;"><i class="fa fa-user"></i> INSERT PARTICIPANTS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="opacity: 0;"><i class="fa fa-users"></i> INSERT SECTION</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" onclick="tallyboard()" style="cursor: pointer;color:white;"><i class="fa fa-list-alt"></i> TALLY BOARD</a>
          </li>  
          <li class="nav-item">
           <a class="nav-link" style="opacity: 0;"><i class="fa fa-list-alt"></i> BALLOT VIEW</a>
          </li>                  
        </ul>
        <div class="form-inline mt-2 mt-md-0">
            
           <a class="nav-link" style="cursor: pointer; color: white">Version.2.06</a>
   
          <a class="nav-link" onclick="aboutus()" style="cursor: pointer; color: white" ><i class="fa fa-exclamation-circle"></i> ABOUT</a>
          <button class="btn btn-danger my-2 my-sm-0" type="submit" onclick="logout()">Logout</button>
        </div>
      </div>
    </nav>
<?php
  }else if($status == 'close'){
?>
     <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
      <a class="navbar-brand" href="sdo-ne_admin.php"><img src="img/logo.png" width="120"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" style="opacity: 0;"><i class="fa fa-list-alt"></i> INSERT PARTYLIST<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="opacity: 0;"><i class="fa fa-user"></i> INSERT PARTICIPANTS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="opacity: 0;"><i class="fa fa-users"></i> INSERT SECTION</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" onclick="tallyboard()" style="cursor: pointer;color:white;"><i class="fa fa-list-alt"></i> TALLY BOARD</a>
          </li>  
          <li class="nav-item">
           <a class="nav-link" style="opacity: 0;"><i class="fa fa-list-alt"></i> BALLOT VIEW</a>
          </li>                          
        </ul>
        <div class="form-inline mt-2 mt-md-0">
      
           <a class="nav-link" style="cursor: pointer; color: white">Version.2.06</a>
                
          <a class="nav-link" onclick="aboutus()" style="cursor: pointer; color: white" ><i class="fa fa-exclamation-circle"></i> ABOUT</a>
          <button class="btn btn-danger my-2 my-sm-0" type="submit" onclick="logout()">Logout</button>
        </div>
      </div>
    </nav>
<?php
  }else{
?>

     <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
      <a class="navbar-brand" href="sdo-ne_admin.php"><img src="img/logo.png" width="120"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" onclick="partylist()" style="cursor: pointer;color:white;"><i class="fa fa-list-alt"></i> INSERT PARTYLIST<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
          <div class="dropdown show nav-link">
            <a class="dropdown-toggle" style="cursor: pointer;color:white;" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              INSERT PARTICIPANTS
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" onclick="participants()"  style="cursor: pointer">PARTICIPANT WITH PARTYLIST</a>
              <a class="dropdown-item" onclick="independent()" style="cursor: pointer">INDEPENDENT PARTICIPANT</a>
            </div>
          </div>              
          </li>
          <li class="nav-item">
            <a class="nav-link" onclick="section()" style="cursor: pointer;color:white;"><i class="fa fa-users"></i> INSERT SECTION</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" onclick="tallyboard()" style="cursor: pointer;color:white;"><i class="fa fa-list-alt"></i> TALLY BOARD</a>
          </li>  
          <li class="nav-item">
           <a class="nav-link" onclick="view_ballot()" style="cursor: pointer;color:white;"><i class="fa fa-list-alt"></i> BALLOT VIEW</a>
          </li>                          
        </ul>
        <div class="form-inline mt-2 mt-md-0">
     
           <a class="nav-link" style="cursor: pointer; color: white">Version.2.06</a>
   
          <a class="nav-link" onclick="aboutus()" style="cursor: pointer; color: white" ><i class="fa fa-exclamation-circle"></i> ABOUT</a>
          <button class="btn btn-danger my-2 my-sm-0" type="submit" onclick="logout()">Logout</button>
        </div>
      </div>
    </nav>
<?php
}
?>