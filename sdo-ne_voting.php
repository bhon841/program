<?php 
  require "connection.php";

  session_start();
    $get = "SELECT * FROM school";
      $result1 = $con->query($get);
      $row = $result1->fetch_assoc();
        $vs = $row['validate_status'];


  if($vs == 0 || $vs == 'close'){
    header("location:index.php");
  }


  $grade = $_GET['grade'];
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">	
	   <title>Vote</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

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

<?php 
  $check_type = "SELECT * FROM ballot_type";
  $get_res = $con->query($check_type);
  $row = $get_res->fetch_assoc();
  $type = $row['type'];
  if($type == 'with_img'){
 ?>
/* HIDE RADIO */
[type=radio] { 
  position: absolute;
  opacity: 0;
  width: 0;
  height: 0;
}

/* IMAGE STYLES */
[type=radio] + img {
  cursor: pointer;
  opacity: .5px;
}

/* CHECKED STYLES */
[type=radio]:checked + img {
  border: 5px solid green;
  height: 200px;
  width: 200px;
}

[type=checkbox] { 
  position: absolute;
  opacity: 0;
  width: 0;
  height: 0;
}

/* IMAGE STYLES */
[type=checkbox] + img {
  cursor: pointer;
  opacity: .5px;
}

/* CHECKED STYLES */
[type=checkbox]:checked + img {
  border: 5px solid green;
  height: 200px;
  width: 200px;
}

<?php
}else if($type == 'without_img'){
?>
input[type=radio] {
    border: 0px;
    width: 50%;
    height: 2em;
}
<?php
}
?>


</style>

<body>
<br><br>
<div class="container" align="center">
<div class="div-vote"></div>
</div>

    <div class="modal fade" id="vote_check" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body vote_check">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="vote_confirm()">Confirm Vote</button>
             <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div> 

    <div class="modal fade" id="vote_success" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document" style="margin-top: 8%">
        <div class="modal-content">
          <div class="modal-body" align="center">
          	<br><br>
          		<h2>Your vote has been recorded!</h2><br>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="next_voter()">Confirm</button>
          </div>
        </div>
      </div>
    </div>   

    <div class="modal fade" id="voter_invalid" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document" style="margin-top: 8%">
        <div class="modal-content">
          <div class="modal-header">
           <h3> Attention!</h3>
          </div>
          <div class="modal-body" align="center">
          	<br>
          		<h3>Voter Number has already been used!</h3><br>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Confirm</button>
          </div>
        </div>
      </div>
    </div>  

    <div class="modal fade" id="voter_invalid2" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document" style="margin-top: 8%">
        <div class="modal-content">
          <div class="modal-header">
           <h3> Attention!</h3>
          </div>
          <div class="modal-body" align="center">
            <br>
              <h3>Section have <label id="vn"></label> Voters Only!</h3><br>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Confirm</button>
          </div>
        </div>
      </div>
    </div>        

    <div class="modal fade" id="next_voter" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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

    <div class="modal fade" id="voter_empty" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document" style="margin-top: 8%">
        <div class="modal-content">
          <div class="modal-body" align="center">
            <br>
            <h4>Please enter Voter Number</h4>
            <br>
          </div>
        </div>
      </div>
    </div>  

    <div class="modal fade" id="voter_empty2" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document" style="margin-top: 8%">
        <div class="modal-content">
          <div class="modal-body" align="center">
            <br>
            <h4>Please select Section</h4>
            <br>
          </div>
        </div>
      </div>
    </div>    

    <div class="modal fade" id="voter_empty3" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document" style="margin-top: 8%">
        <div class="modal-content">
          <div class="modal-body" align="center">
            <br>
            <h4>Invalid Input Voter Number</h4>
            <br>
          </div>
        </div>
      </div>
    </div>              

</body>
</html>

<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">	
$('.div-vote').load("sdo-ne_vote_select.php?grade=" +<?php echo $grade; ?>);

function vote_start(){
	var vno = $("#vote_no").val();
	var section = $("#section").val();
  var vn = $("#vnum").val();
  var resu = section.split(",");
  var sec = resu[0];
  var vn = resu[1];
	var glevel = '<?php echo $grade; ?>';
  if(!vno.match(/^-\d+$/)){
  if(section != null){
    if(vno != ""){
       $.ajax({url: "sdo-ne_vote_check.php", data: { sec:sec, vno:vno, glevel:glevel }, type: "POST", success: function(result){
       		if(result == "ok"){
       			$('.div-vote').load("sdo-ne_vote_start.php?grade=" +<?php echo $grade; ?>);
            localStorage.setItem('no',vno);
            localStorage.setItem('section',sec);
       			
          }else if(result == 'nope2'){
            $('#voter_invalid2').modal("show");
            $("#vn").html(vn);
          }else if(result == 'nope'){
       			$('#voter_invalid').modal("show");
       		}
          }}); 
    }else{
      $('#voter_empty').modal("show");
    }
  }else{
     $('#voter_empty2').modal("show");
  }
  }else{
    $('#voter_empty3').modal("show");
  }
}

$(document).on("click", "input[name='pres']", function(){
    thisRadio = $(this);
    if (thisRadio.hasClass("imChecked")) {
        thisRadio.removeClass("imChecked");
        thisRadio.prop('checked', false);
    } else { 
        thisRadio.prop('checked', true);
        thisRadio.addClass("imChecked");
    };
})


$(document).on("click", "input[name='vpres']", function(){
    thisRadio = $(this);
    if (thisRadio.hasClass("imChecked")) {
        thisRadio.removeClass("imChecked");
        thisRadio.prop('checked', false);
    } else { 
        thisRadio.prop('checked', true);
        thisRadio.addClass("imChecked");
    };
})

$(document).on("click", "input[name='sec']", function(){
    thisRadio = $(this);
    if (thisRadio.hasClass("imChecked")) {
        thisRadio.removeClass("imChecked");
        thisRadio.prop('checked', false);
    } else { 
        thisRadio.prop('checked', true);
        thisRadio.addClass("imChecked");
    };
})

$(document).on("click", "input[name='treasurer']", function(){
    thisRadio = $(this);
    if (thisRadio.hasClass("imChecked")) {
        thisRadio.removeClass("imChecked");
        thisRadio.prop('checked', false);
    } else { 
        thisRadio.prop('checked', true);
        thisRadio.addClass("imChecked");
    };
})

$(document).on("click", "input[name='auditor']", function(){
    thisRadio = $(this);
    if (thisRadio.hasClass("imChecked")) {
        thisRadio.removeClass("imChecked");
        thisRadio.prop('checked', false);
    } else { 
        thisRadio.prop('checked', true);
        thisRadio.addClass("imChecked");
    };
})

$(document).on("click", "input[name='pio']", function(){
    thisRadio = $(this);
    if (thisRadio.hasClass("imChecked")) {
        thisRadio.removeClass("imChecked");
        thisRadio.prop('checked', false);
    } else { 
        thisRadio.prop('checked', true);
        thisRadio.addClass("imChecked");
    };
})

$(document).on("click", "input[name='po']", function(){
    thisRadio = $(this);
    if (thisRadio.hasClass("imChecked")) {
        thisRadio.removeClass("imChecked");
        thisRadio.prop('checked', false);
    } else { 
        thisRadio.prop('checked', true);
        thisRadio.addClass("imChecked");
    };
})


function next_voter(){
	$('#vote_success').modal("hide");
	$('#next_voter').modal("show");

var timeleft = 10;
var downloadTimer = setInterval(function(){
  document.getElementById("countdown").innerHTML = "Next Voter can vote in " + timeleft;
  timeleft -= 1;
  if(timeleft <= 0){
    clearInterval(downloadTimer);
    $(this).scrollTop(0);
    location.reload();
  }
}, 1000);
}

function vote_now(){

  var pres = $("input[name='pres']:checked").val();
  var vpres = $("input[name='vpres']:checked").val();
  var sec = $("input[name='sec']:checked").val();  
  var treasurer = $("input[name='treasurer']:checked").val();
  var auditor = $("input[name='auditor']:checked").val();
  var pio = $("input[name='pio']:checked").val();
  var po = $("input[name='po']:checked").val();
  var glvl = '<?php echo $grade; ?>';

  var grade = $("input[name='grades[]']:checked")
              .map(function(){return $(this).val();}).get();
  console.log(grade); 

 $.ajax({url: "sdo-ne_vote_cast.php", data: { glvl:glvl, pres:pres, vpres:vpres, sec:sec, treasurer:treasurer, auditor:auditor, pio:pio, po:po, grade:grade }, type: "POST", success: function(result){
      $('#vote_check').modal("show");
       $('.vote_check').html(result);
    }}); 
}

function vote_confirm(){
  var pres = $("input[name='pres']:checked").val();
  var vpres = $("input[name='vpres']:checked").val();
  var sec = $("input[name='sec']:checked").val();  
  var treasurer = $("input[name='treasurer']:checked").val();
  var auditor = $("input[name='auditor']:checked").val();
  var pio = $("input[name='pio']:checked").val();
  var po = $("input[name='po']:checked").val();
  var section = localStorage.getItem('section');
  var vno = localStorage.getItem('no');
  var glvl = '<?php echo $grade; ?>';

    var grade = $("input[name='grades[]']:checked")
              .map(function(){return $(this).val();}).get();
  console.log(grade); 


 	  $('#vote_check').modal("hide");
 $.ajax({url: "sdo-ne_vote_cast_confirm.php", data: { glvl:glvl, section:section, vno:vno, pres:pres, vpres:vpres, sec:sec, treasurer:treasurer, auditor:auditor, pio:pio, po:po, grade:grade }, type: "POST", success: function(result){
 	$('#vote_success').modal("show");
    }}); 
}
</script>