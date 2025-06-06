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
    <link href="fontawesome/css/fontawesome.css" rel="stylesheet" type="text/css" />
    <link href="fontawesome/css/regular.css" rel="stylesheet" type="text/css" />
    <link href="fontawesome/css/solid.css" rel="stylesheet" type="text/css" />     
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
<div class="container">
<div class="row">
    
<div align="center" class="col-12" style="margin-top: -70px"><img src="img/evote.png" style="width: 500px; height: 400px"></div>
<div class="row"></div>
	<div align="center" class="col-12">
    <?php 
    require "connection.php";
      $sql = "SELECT * FROM school";
      $result = $con->query($sql);
      $row = $result->fetch_assoc();
        $status = $row['validate_status'];

        if($status == '1'){
        ?>
        <button class="btn btn-danger btn-lg" style="width: 400px; height: 100px; font-size: 60px; vertical-align: middle;"><a href="sdo-ne_vote.php" style="color:white; font-weight: bold;">VOTE <i class="fas fa-vote-yea"></i></a></button> <br><br>
         <button class="btn btn-success btn-lg" style="width: 200px;" data-toggle="modal" data-target="#myModal"><i class="fas fa-sign-in-alt"></i> ADMIN LOGIN</button>      
         
        <?php  
        }else{
         ?>
        <button class="btn btn-danger btn-lg" style="width: 200px" data-toggle="modal" data-target="#myModal"><i class="fas fa-sign-in-alt"></i> ADMIN LOGIN</button>         
         <?php 
        }
     ?>
 
    <br><br>
    <?php 
          if(isset($_GET['error_id'])){ 
            if($_GET['error_id'] == md5(1)){ 
                  echo "<div class='alert alert-danger' role='alert' >
                         Username or Password Incorrect!
                        </div>";
            }
          }
     ?>
	</div></div>
  <div>
    <?php 
     $localIP = getHostByName(getHostName());
     ?>
  <div class="alert alert-secondary" role="alert" style="vertical-align: top; color:black;" align="center">
    For Network/Client Computer:
    <strong><?php echo $localIP."/deped_election"; ?></strong> <br>
        For Standalone Computer:
    <strong><?php echo "localhost/deped_election"; ?></strong>     
  </div>

<!-- 
<div class="row"><br>
<div class="col-12" align="center">
    <img src="img/youthformation.png" width="200">

</div></div></div> 
<div>
		<button class="btn btn-secondary btn-lg">ANSWER</button>
		<br>
		<button class="btn btn-primary btn-sm">ADMIN LOGIN</button>
	</div> -->


  <!-- The Modal -->




  <div class="modal fade" id="myModal" style="margin-top:70px;">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header" align="center">
          <h4 class="modal-title text-center" style="margin: 0 auto;"><strong>Admin Login <i class="fas fa-user"></i></strong></h4>
        </div>
        <form  action="sdo-ne_check_user.php" method="POST"> 
        <div class="modal-body">
    		<div class="container">
    			<div class="row">
    				<div class="col-2">
    				</div>
      				<div class="col-8">
        				<div >
          	  
          					<label>Username</label>  
            					<input id="username" name="username" class="floating-input form-control form-control-md" type="text" placeholder=" ">
            					<span class="highlight"></span>
          				     
	          					<label>Password</label>    
	            				<input class="floating-input form-control  form-control-md" id="password" name="password"  type="password" placeholder=" ">
	            				<span class="highlight"></span>
	          			
        				</div>   
    				</div>
    			</div>
  			</div>
        </div>
        <hr>
        <div class="footer" align="center">
        	<input type="submit" name="button" class="btn btn-success" value="Login" style="width:250px; margin:10px;"><br><br>
        </div>
    	</form>      
      </div>
    </div>
  </div>
</body>
</html>

<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">

</script>