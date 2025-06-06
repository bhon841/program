<?php 
	require "connection.php";

	$sql = "SELECT * FROM ballot_type";
	$result = $con->query($sql);
	$row = $result->fetch_assoc();
	$img = $row['img'];
	$type = $row['type'];

	if($type == 'with_img'){
	?>
    <div class="onoffswitch2" align="left">
        <input type="checkbox" name="onoffswitch2" class="onoffswitch2-checkbox" id="myonoffswitch2" checked="">
            <label class="onoffswitch2-label" for="myonoffswitch2">
                <span class="onoffswitch2-inner"></span>
                <span class="onoffswitch2-switch"></span>
            </label>
    </div>
	<?php
	}else if($type == 'without_img'){
	?>
    <div class="onoffswitch2" align="left">
        <input type="checkbox" name="onoffswitch2" class="onoffswitch2-checkbox" id="myonoffswitch2">
            <label class="onoffswitch2-label" for="myonoffswitch2">
                <span class="onoffswitch2-inner"></span>
                <span class="onoffswitch2-switch"></span>
            </label>

    </div>
	<?php
	}
 ?>

 <img width="500" style="border: solid 2px;" src="<?php echo $img; ?>">

 <script type="text/javascript">
 	function view_ballot(){
  $('#view_ballot').modal("show");
}

$('input[type=checkbox]').change(function () {
  if($(this).is(":checked")) {
 var type = 'on';
  $.ajax({url: "sdo-ne_ballot_view.php", data: { type:type }, type: "POST", success: function(result){

    }});   
   }else{
 var type = 'off';
   $.ajax({url: "sdo-ne_ballot_view.php", data: { type:type }, type: "POST", success: function(result){
 
    }}); 
    } 
});
 </script>

 <br><br>
 <?php 
if($type == 'with_img'){
?>
 <div>
 	Voting with Picture
 </div>
<?php
}else{
?>
 <div>
 	Voting without Picture
 </div>
<?php
}
  ?>
