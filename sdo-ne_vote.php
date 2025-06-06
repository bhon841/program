<?php 
  require "connection.php";

      $get = "SELECT * FROM school";
      $result1 = $con->query($get);
      $row = $result1->fetch_assoc();
        $vs = $row['validate_status'];


  if($vs == 0 || $vs == 'close'){
    header("location:index.php");
  }
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">	
	   <title>Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">	
</head>

<style type="text/css">
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
</style>

<body>
<div class="container" align="center">
    <h1><strong>SELECT GRADE LEVEL</strong></h1>
    <hr>
    <?php 
      $check = "SELECT DISTINCT grade_level FROM grade_level";
        $res = $con->query($check);
        while($row = $res->fetch_assoc()){
          $lvl = strtoupper($row['grade_level']);
          $no = substr($lvl, -2);
          $no = str_replace(' ','',$no);
        ?>
        <button class="btn btn-primary" style="width:300px; height: 70px; font-weight:bold; font-size:25px;" onclick="vote<?php echo $no; ?>()"><?php echo $lvl; ?></button>
      <br><br>
        <?php
        }
    ?>
     <br><br>
      <a href="index.php"><button class="btn btn-success"><img src="img/back.png" width="40px"></button></a>
</div>


</body>
</html>

<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">
function vote2(){
  window.location.href = "sdo-ne_voting.php?grade=2";
}  
function vote3(){
  window.location.href = "sdo-ne_voting.php?grade=3";
}  
function vote4(){
  window.location.href = "sdo-ne_voting.php?grade=4";
}

function vote5(){
  window.location.href = "sdo-ne_voting.php?grade=5";
}

function vote6(){
  window.location.href = "sdo-ne_voting.php?grade=6";
}

function vote7(){
  window.location.href = "sdo-ne_voting.php?grade=7";
}

function vote8(){
  window.location.href = "sdo-ne_voting.php?grade=8";
}

function vote9(){
  window.location.href = "sdo-ne_voting.php?grade=9";
}

function vote10(){
  window.location.href = "sdo-ne_voting.php?grade=10";
}

function vote11(){
  window.location.href = "sdo-ne_voting.php?grade=11";
}

function vote12(){
  window.location.href = "sdo-ne_voting.php?grade=12";
}

</script>