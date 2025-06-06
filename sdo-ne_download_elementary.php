<?php 
  require "connection.php";

  session_start();
  if(!isset($_SESSION['election_users'])){
    header("location:index.php");
  }else{
    $admin = $_SESSION['election_users'];
    date_default_timezone_set('Asia/Manila');
    $get_id = "SELECT * FROM account WHERE username = '".$admin."'";
      $result = $con->query($get_id);
      $row = $result->fetch_assoc();
        $id = $row['id'];

        $sql1 = "SELECT * FROM school";
      	$res1 = $con->query($sql1);
      	$row = $res1->fetch_assoc();
      	$sname   = $row['school_name'];
      	$sid     = $row['school_id'];
      	$admin   = $row['admin_name'];
      	$comelec = $row['comelec_name'];
      	$syear   = $row['school_year'];
  }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8"/>
	<title>DepEd</title>
	<link rel = "icon" href = "design_pictures/final-logo.png">
</head>
<body>
	<?php
		date_default_timezone_set('Asia/Manila');
        $current_time = date("m/d/y");
        $date = date("M jS, Y", strtotime($current_time));
        $time = date("h:i A");
        $val_date = $date."-".$time;

        $check = mysqli_query($con,"SELECT * FROM school");
		$row = mysqli_fetch_assoc($check);
		$rep = $row['rep'];



		require('fpdf/fpdf.php');
		ob_end_clean(); 
		ob_start();
		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetY(20);
		$pdf->Image("img/logo.png",35,10,40,0,"");
		$pdf->SetX('35');
		$pdf->SetFont("arial","B",11);
		$pdf->Cell(10 ,20,'SCHOOL: '.$sname,0,0,'L');
		$pdf->Ln(10);
		$pdf->SetX('35');
		$pdf->Cell(10 ,10,'SCHOOL ID: '.$sid,0,0,'L');
		$pdf->Ln(5);
		$pdf->SetX('35');
		$pdf->Cell(10 ,10,'SCHOOL YEAR: '.$syear,0,0,'L');
		$pdf->Ln(5);
		$pdf->SetX('35');
		$pdf->Cell(10 ,10,'ADMIN: '.$admin,0,0,'L');
		$pdf->Ln(5);
		$pdf->SetX('35');
		$pdf->Cell(10 ,10,'COMELEC: '.$comelec,0,0,'L');
		$pdf->Ln(5);
		$pdf->SetX('35');
		$pdf->Cell(10 ,10,'DATE: '.$val_date,0,0,'L');
		$pdf->Ln(5);
		$pdf->SetX('35');
		$pdf->Image("img/letterhead.png",12,60,200,0,"");
		$pdf->Ln(20);	

		$pdf->SetX('73');
		$pdf->SetFont("arial","B",14);
		$pdf->Cell(60 ,5,'Election Result',0,0,'C');

		$pdf->Ln(10);

		$sql = "SELECT * FROM participants GROUP BY participant_position ORDER BY participant_id";
		$res = $con->query($sql);
		while($row = $res->fetch_assoc()){
			$pos = $row['participant_position'];
		

		$pdf->SetX('29');
		$pdf->SetFont("arial","",10);
		$pdf->SetTextColor(300,100,100);
		$pdf->Cell(120,8,$pos,1,0,'C');
		$pdf->Cell(30,8,'Votes',1,0,'C');
		$pdf->Ln(8);

		$max = mysqli_query($con,"SELECT MAX(total_votes) FROM participants WHERE participant_position = '".$pos."'");
		$row_max = mysqli_fetch_array($max);
		$max_votes = $row_max['MAX(total_votes)'];

		$result = mysqli_query($con,"SELECT * FROM participants WHERE participant_position = '".$pos."'");
		while($row_result = mysqli_fetch_array($result)){
			$president = $row_result['participant_name'];
			$total_votes = $row_result['total_votes'];
				$pdf->SetX('29');
				$pdf->SetTextColor(0,0,0);
				$pdf->Cell(120,8,"$president",1,0,'');
				$pdf->SetFont("arial","",10);
				$pdf->SetTextColor(0,150);
				if($total_votes == $max_votes){
					$pdf->Cell(30,8,"$total_votes (winner)",1,0,'C');
				}
				else{
					$pdf->SetFont("arial","",10);
					$pdf->SetTextColor(0,0,0);
					$pdf->Cell(30,8,"$total_votes",1,0,'C');
				}
				$pdf->Ln(8);
			}

		$pdf->Ln(2);

		}


/*		$max_g3 = mysqli_query($con,"SELECT MAX(total_votes) FROM participants WHERE participant_position = 'Grade 3 Councilor'");
		$row_max_g3 = mysqli_fetch_array($max_g3);
		$max_votes_g3 = $row_max_g3['MAX(total_votes)'];

		$result = mysqli_query($con,"SELECT * FROM participants WHERE participant_position = 'Grade 3 Councilor'");
		while($row_result = mysqli_fetch_array($result)){
			$g10r = $row_result['participant_name'];
			$total_votes = $row_result['total_votes'];
				$pdf->SetX('29');
				$pdf->SetTextColor(0,0,0);
				$pdf->Cell(120,8,"$g10r",1,0,'');
				$pdf->SetFont("arial","",10);
				$pdf->SetTextColor(0,150);
				if($total_votes == $max_votes_g3){
					$pdf->Cell(30,8,"$total_votes (winner)",1,0,'C');
				}
				else{
					$pdf->SetFont("arial","",10);
					$pdf->SetTextColor(0,0,0);
					$pdf->Cell(30,8,"$total_votes",1,0,'C');
				}
				$pdf->Ln(8);
			}

			$pdf->Ln(2);*/

/*			$pdf->SetX('29');
		$pdf->SetTextColor(300,100,100);
		$pdf->Cell(120,8,'Grade 4 Councilor',1,0,'C');
		$pdf->Cell(30,8,'Votes',1,0,'C');
		$pdf->Ln(8);

		$max_g4 = mysqli_query($con,"SELECT * FROM participants WHERE participant_position = 'Grade 4 Councilor' ORDER BY total_votes DESC LIMIT ".$rep);
		$pid = array();
		while($row_max_g4 = mysqli_fetch_array($max_g4)){
			$pid[] = $row_max_g4['total_votes'];

		}

		$result = mysqli_query($con,"SELECT * FROM participants WHERE participant_position = 'Grade 4 Councilor'");
		while($row_result = mysqli_fetch_array($result)){
			$g10r = $row_result['participant_name'];
			$total_votes = $row_result['total_votes'];
				$pdf->SetX('29');
				$pdf->SetTextColor(0,0,0);
				$pdf->Cell(120,8,"$g10r",1,0,'');
				$pdf->SetFont("arial","",10);
				$pdf->SetTextColor(0,150);
				if(in_array($total_votes,$pid)){
					$pdf->Cell(30,8,"$total_votes (winner)",1,0,'C');
				}
				else{
					$pdf->SetFont("arial","",10);
					$pdf->SetTextColor(0,0,0);
					$pdf->Cell(30,8,"$total_votes",1,0,'C');
				}
				$pdf->Ln(8);
			}

			$pdf->Ln(2);

			$pdf->SetX('29');
		$pdf->SetTextColor(300,100,100);
		$pdf->Cell(120,8,'Grade 5 Councilor',1,0,'C');
		$pdf->Cell(30,8,'Votes',1,0,'C');
		$pdf->Ln(8);

		$max_g5 = mysqli_query($con,"SELECT * FROM participants WHERE participant_position = 'Grade 5 Councilor' ORDER BY total_votes DESC LIMIT ".$rep);
		$pid2 = array();
		while($row_max_g5 = mysqli_fetch_array($max_g5)){
			$pid2[] = $row_max_g5['total_votes'];

		}
		$result = mysqli_query($con,"SELECT * FROM participants WHERE participant_position = 'Grade 5 Councilor'");
		while($row_result = mysqli_fetch_array($result)){
			$g11r = $row_result['participant_name'];
			$total_votes = $row_result['total_votes'];
				$pdf->SetX('29');
				$pdf->SetTextColor(0,0,0);
				$pdf->Cell(120,8,"$g11r",1,0,'');
				$pdf->SetFont("arial","",10);
				$pdf->SetTextColor(0,150);
				if(in_array($total_votes,$pid2)){
					$pdf->Cell(30,8,"$total_votes (winner)",1,0,'C');
				}
				else{
					$pdf->SetFont("arial","",10);
					$pdf->SetTextColor(0,0,0);
					$pdf->Cell(30,8,"$total_votes",1,0,'C');
				}
				$pdf->Ln(8);
			}	
			$pdf->Ln(2);

		$pdf->SetX('29');
		$pdf->SetTextColor(300,100,100);
		$pdf->Cell(120,8,'Grade 6 Councilor',1,0,'C');
		$pdf->Cell(30,8,'Votes',1,0,'C');
		$pdf->Ln(8);

		$max_g6 = mysqli_query($con,"SELECT * FROM participants WHERE participant_position = 'Grade 6 Councilor' ORDER BY total_votes DESC LIMIT ".$rep);
		$pid3 = array();
		while($row_max_g6 = mysqli_fetch_array($max_g6)){
			$pid3[] = $row_max_g6['total_votes'];

		}
		$result = mysqli_query($con,"SELECT * FROM participants WHERE participant_position = 'Grade 6 Councilor'");
		while($row_result = mysqli_fetch_array($result)){
			$g12r = $row_result['participant_name'];
			$total_votes = $row_result['total_votes'];
				$pdf->SetX('29');
				$pdf->SetTextColor(0,0,0);
				$pdf->Cell(120,8,"$g12r",1,0,'');
				$pdf->SetFont("arial","",10);
				$pdf->SetTextColor(0,150);
				if(in_array($total_votes,$pid3)){
					$pdf->Cell(30,8,"$total_votes (winner)",1,0,'C');
				}
				else{
					$pdf->SetFont("arial","",10);
					$pdf->SetTextColor(0,0,0);
					$pdf->Cell(30,8,"$total_votes",1,0,'C');
				}
				$pdf->Ln(8);
			}

			$pdf->Ln(2);*/

			$pdf->SetX('29');
		$pdf->SetTextColor(300,100,100);
		$pdf->SetFont("arial","",12);
		$pdf->Cell(90,10,'Comelec Chairperson',1,0,'C');
		$pdf->Cell(30,10,'Sign',1,0,'C');
		$pdf->Cell(3.5,8,'',0,0,'C');

		$for_qr = mysqli_query($con,"SELECT * FROM school");
		$row_qr = $row_qr = mysqli_fetch_array($for_qr);
		$school_qr = $row_qr['school_name'];

		$school_qr = preg_replace('/\s+/', '_', $school_qr);

		$id_qr = $row_qr['school_id'];
		$sy_qr = $row_qr['school_year'];

		$sy_qr = preg_replace('/\s+/', '_', $sy_qr);

		$current_month = date("m");
		$current_day = date("d");
		$time = date("hi");

		$pdf->Cell(90,8,$pdf->Image("http://localhost/deped_election/qrcode/php/qr_img.php?d=Schools_Division_of_Nueva_Ecija.$school_qr.$id_qr.$sy_qr.($current_month$current_day$time)",$pdf->GetX(),$pdf->GetY(),25,25,"PNG"),0,0,'C');
		$pdf->Ln(10);
		$result = mysqli_query($con,"SELECT school.comelec_name FROM school");
		$row_result = mysqli_fetch_array($result);
			$comelec = $row_result['comelec_name'];
				$pdf->SetX('29');
				$pdf->SetTextColor(0,0,0);
				$pdf->Cell(90,10,"$comelec",1,0,'');
				$pdf->Cell(30,10,"",1,0,'');				
				$pdf->Ln(10);
		$pdf->Output("results_final/elementaryResult-(SY$sy_qr)-$id_qr-$current_month$current_day$time.pdf", 'F');
		$pdf->Output("elementaryResult-(SY$sy_qr)-$id_qr-$current_month$current_day$time.pdf", 'D');
		ob_end_flush();
		header("location:sdo-ne_tallyboard.php");
	?>
</body>
</html>