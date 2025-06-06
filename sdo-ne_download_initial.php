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

		require('fpdf/fpdf.php');
		ob_end_clean(); 
		ob_start();
		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetY(20);

		$get_schools = mysqli_query($con,"SELECT * FROM school");
			$row_schools = mysqli_fetch_array($get_schools);
			$school_id = $row_schools['school_id'];
			$school_type = $row_schools['school_type'];
			$school_name = $row_schools['school_name'];
			$admin_name = $row_schools['admin_name'];
			$comelec = $row_schools['comelec_name'];
			$school_year = $row_schools['school_year'];

		//$pdf->Image("img/letterhead.png",5,0,200,0,"");
		//$pdf->Ln(10);
		$pdf->Image("img/logo.png",35,10,40,0,"");
		$pdf->SetX('35');
		$pdf->SetFont("arial","B",11);
		$pdf->Cell(10 ,20,'SCHOOL: '.$school_name,0,0,'L');
		$pdf->Ln(10);
		$pdf->SetX('35');
		$pdf->Cell(10 ,10,'SCHOOL ID: '.$school_id,0,0,'L');
		$pdf->Ln(5);
		$pdf->SetX('35');
		$pdf->Cell(10 ,10,'SCHOOL YEAR: '.$school_year,0,0,'L');
		$pdf->Ln(5);
		$pdf->SetX('35');
		$pdf->Cell(10 ,10,'ADMIN: '.$admin_name,0,0,'L');
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
		$pdf->Cell(60 ,5,'INITIALIZATION',0,0,'C');

		$pdf->Ln(10);

		$pdf->SetX('73');
		$pdf->SetFont("arial","",12);
		$pdf->Cell(63,8,'Partylists',0,0,'C');
		$pdf->Ln(8);

		$get_partylist = mysqli_query($con,"SELECT * FROM partylist");
		$check = mysqli_num_rows($get_partylist);
		if($check > 0){
		while($row_partylist = mysqli_fetch_array($get_partylist)){
			$party_id = $row_partylist['pid'];
			$party_list = $row_partylist['partylist_name'];
				
		$pdf->Ln(5);	
		$pdf->SetX('38');
		$pdf->SetFont("arial","",10);
		$pdf->SetTextColor(300,100,100);
		$pdf->Cell(70,8,"$party_list",1,0,'C');
		$pdf->Cell(55,8,"Position",1,0,'C');
		$pdf->Cell(25,8,"vote",1,0,'C');

		$pdf->Ln(8);


				$get_participants = mysqli_query($con,"SELECT * FROM participants, partylist WHERE participants.pid = partylist.pid AND partylist.pid = '$party_id'");
						while($row_participants = mysqli_fetch_array($get_participants)){
							$p_id = $row_participants['participant_id'];
							$p_name = $row_participants['participant_name'];
							$p_position = $row_participants['participant_position'];

				$pdf->SetX('38');
				$pdf->SetTextColor(0,0,0);
				$pdf->SetFont("arial","",10);
				$pdf->Cell(70,8,"$p_name",1,0,'');
				$pdf->Cell(55,8,"$p_position",1,0,'');
				$pdf->Cell(25,8,"0",1,0,'C');
				$pdf->Ln(8);
			}
				$pdf->SetX('38');
				$pdf->SetTextColor(0,0,0);
				$pdf->SetFont("arial","",10);
				$pdf->Cell(70,8,"REPRESENTATIVE SIGNATURE",1,0,'C');
				$pdf->Cell(80,8,"",1,0,'');
				$pdf->Ln(8);
	}
	}else{
	}
		$pdf->Ln(10);

		$get_par = mysqli_query($con,"SELECT * FROM participants WHERE pid = '0'");
			
			$count = mysqli_num_rows($get_par);
			if($count > 0){
				$row_par = mysqli_fetch_array($get_par);
		$pdf->SetX('73');
		$pdf->SetFont("arial","",12);
		$pdf->Cell(63,8,'Independent Participants',0,0,'C');
		$pdf->Ln(8);

		$pdf->SetX('38');
		$pdf->SetFont("arial","",10);
		$pdf->SetTextColor(300,100,100);
		$pdf->Cell(70,8,"Independent",1,0,'C');
		$pdf->Cell(55,8,"Position",1,0,'C');
		$pdf->Cell(25,8,"vote",1,0,'C');
		$pdf->Ln(8);


				$get_participants = mysqli_query($con,"SELECT * FROM participants WHERE pid = '0'");

						while($row_participants = mysqli_fetch_array($get_participants)){
							$p_id = $row_participants['participant_id'];
							$p_name = $row_participants['participant_name'];
							$p_position = $row_participants['participant_position'];

				$pdf->SetX('38');
				$pdf->SetTextColor(0,0,0);
				$pdf->SetFont("arial","",10);
				$pdf->Cell(70,8,"$p_name",1,0,'');
				$pdf->Cell(55,8,"$p_position",1,0,'');
				$pdf->Cell(25,8,"0",1,0,'C');
				$pdf->Ln(8);

			$pdf->SetX('38');
			$pdf->SetTextColor(0,0,0);
			$pdf->SetFont("arial","",10);
			$pdf->Cell(70,8,"REPRESENTATIVE SIGNATURE",1,0,'C');
			$pdf->Cell(80,8,"",1,0,'');
			$pdf->Ln(8);	
			}
		}

		$pdf->Ln(2);
		

		$pdf->SetX('73');
		$pdf->SetFont("arial","",12);
		$pdf->Cell(63,8,'Grade & Section',0,0,'C');
		$pdf->Ln(8);

		if($school_type == "Elementary (Grade 4-6)"){	

/*		$pdf->SetX('38');
		$pdf->SetFont("arial","",10);
		$pdf->SetTextColor(300,100,100);
		$pdf->Cell(70,8,"Grade 2",1,0,'C');
		$pdf->Cell(65,8,"Number of Voters",1,0,'C');
		$pdf->Ln(8);

			$get_grade = mysqli_query($con,"SELECT * FROM grade_level WHERE grade_level.grade_level = 'Grade 2'");
				$g2 = 0;
				while($row_grade = mysqli_fetch_array($get_grade)){
					$grade_id = $row_grade['grade_id'];
					$section = $row_grade['section'];
					$number_of_voters = $row_grade['number_of_voters'];

				$pdf->SetX('38');
				$pdf->SetTextColor(0,0,0);
				$pdf->SetFont("arial","",10);
				$pdf->Cell(70,8,"$section",1,0,'');
				$pdf->Cell(65,8,"$number_of_voters",1,0,'C');
				$pdf->Ln(8);
				$g2 = $g2 + $number_of_voters;
			}

		$pdf->SetX('38');
		$pdf->SetFont("arial","",10);
		$pdf->SetTextColor(300,100,100);		
		$pdf->Cell(70,8,"Total Voters:",1,0,'C');
		$pdf->Cell(65,8,$g2,1,0,'C');
		$pdf->Ln(10);

		$pdf->SetX('38');
		$pdf->SetFont("arial","",10);
		$pdf->SetTextColor(300,100,100);
		$pdf->Cell(70,8,"Grade 3",1,0,'C');
		$pdf->Cell(65,8,"Number of Voters",1,0,'C');
		$pdf->Ln(8);*/

			$get_grade = mysqli_query($con,"SELECT * FROM grade_level WHERE grade_level.grade_level = 'Grade 3'");
				$g3 = 0;
				while($row_grade = mysqli_fetch_array($get_grade)){
					$grade_id = $row_grade['grade_id'];
					$section = $row_grade['section'];
					$number_of_voters = $row_grade['number_of_voters'];

				$pdf->SetX('38');
				$pdf->SetTextColor(0,0,0);
				$pdf->SetFont("arial","",10);
				$pdf->Cell(70,8,"$section",1,0,'');
				$pdf->Cell(65,8,"$number_of_voters",1,0,'C');
				$pdf->Ln(8);

				$g3 = $g3 + $number_of_voters;
			}

		$pdf->SetX('38');
		$pdf->SetFont("arial","",10);
		$pdf->SetTextColor(300,100,100);		
		$pdf->Cell(70,8,"Total Voters:",1,0,'C');
		$pdf->Cell(65,8,$g3,1,0,'C');
		$pdf->Ln(10);			

		$pdf->SetX('38');
		$pdf->SetFont("arial","",10);
		$pdf->SetTextColor(300,100,100);
		$pdf->Cell(70,8,"Grade 4",1,0,'C');
		$pdf->Cell(65,8,"Number of Voters",1,0,'C');
		$pdf->Ln(8);

			$get_grade = mysqli_query($con,"SELECT * FROM grade_level WHERE grade_level.grade_level = 'Grade 4'");
			$g4 = 0;
				while($row_grade = mysqli_fetch_array($get_grade)){
					$grade_id = $row_grade['grade_id'];
					$section = $row_grade['section'];
					$number_of_voters = $row_grade['number_of_voters'];

				$pdf->SetX('38');
				$pdf->SetTextColor(0,0,0);
				$pdf->SetFont("arial","",10);
				$pdf->Cell(70,8,"$section",1,0,'');
				$pdf->Cell(65,8,"$number_of_voters",1,0,'C');
				$pdf->Ln(8);

				$g4 = $g4 + $number_of_voters;
			}

		$pdf->SetX('38');
		$pdf->SetFont("arial","",10);
		$pdf->SetTextColor(300,100,100);		
		$pdf->Cell(70,8,"Total Voters:",1,0,'C');
		$pdf->Cell(65,8,$g4,1,0,'C');
		$pdf->Ln(10);			

		$pdf->SetX('38');
		$pdf->SetFont("arial","",10);
		$pdf->SetTextColor(300,100,100);
		$pdf->Cell(70,8,"Grade 5",1,0,'C');
		$pdf->Cell(65,8,"Number of Voters",1,0,'C');
		$pdf->Ln(8);

			$get_grade = mysqli_query($con,"SELECT * FROM grade_level WHERE grade_level.grade_level = 'Grade 5'");
				$g5 = 0;
				while($row_grade = mysqli_fetch_array($get_grade)){
					$grade_id = $row_grade['grade_id'];
					$section = $row_grade['section'];
					$number_of_voters = $row_grade['number_of_voters'];

				$pdf->SetX('38');
				$pdf->SetTextColor(0,0,0);
				$pdf->SetFont("arial","",10);
				$pdf->Cell(70,8,"$section",1,0,'');
				$pdf->Cell(65,8,"$number_of_voters",1,0,'C');
				$pdf->Ln(8);

				$g5 = $g5 + $number_of_voters;
			}

		$pdf->Ln(2);
		$pdf->SetX('38');
		$pdf->SetFont("arial","",10);
		$pdf->SetTextColor(300,100,100);		
		$pdf->Cell(70,8,"Total Voters:",1,0,'C');
		$pdf->Cell(65,8,$g5,1,0,'C');
		$pdf->Ln(10);

		$pdf->SetX('38');
		$pdf->SetFont("arial","",10);
		$pdf->SetTextColor(300,100,100);
		$pdf->Cell(70,8,"Grade 6",1,0,'C');
		$pdf->Cell(65,8,"Number of Voters",1,0,'C');
		$pdf->Ln(8);

			$get_grade = mysqli_query($con,"SELECT * FROM grade_level WHERE grade_level.grade_level = 'Grade 6'");
			$g6 = 0;
				while($row_grade = mysqli_fetch_array($get_grade)){
					$grade_id = $row_grade['grade_id'];
					$section = $row_grade['section'];
					$number_of_voters = $row_grade['number_of_voters'];

				$pdf->SetX('38');
				$pdf->SetTextColor(0,0,0);
				$pdf->SetFont("arial","",10);
				$pdf->Cell(70,8,"$section",1,0,'');
				$pdf->Cell(65,8,"$number_of_voters",1,0,'C');
				$pdf->Ln(8);

				$g6 = $g6 + $number_of_voters;				
			}

		$pdf->Ln(2);
		$pdf->SetX('38');
		$pdf->SetFont("arial","",10);
		$pdf->SetTextColor(300,100,100);		
		$pdf->Cell(70,8,"Total Voters:",1,0,'C');
		$pdf->Cell(65,8,$g6,1,0,'C');
		$pdf->Ln(10);
	}

	else if($school_type == "Junior High School (Grade 7-10)"){	

		$pdf->SetX('38');
		$pdf->SetFont("arial","",10);
		$pdf->SetTextColor(300,100,100);
		$pdf->Cell(70,8,"Grade 7",1,0,'C');
		$pdf->Cell(65,8,"Number of Voters",1,0,'C');
		$pdf->Ln(8);

			$get_grade = mysqli_query($con,"SELECT * FROM grade_level WHERE grade_level.grade_level = 'Grade 7'");
			$g7 = 0;
				while($row_grade = mysqli_fetch_array($get_grade)){
					$grade_id = $row_grade['grade_id'];
					$section = $row_grade['section'];
					$number_of_voters = $row_grade['number_of_voters'];

				$pdf->SetX('38');
				$pdf->SetTextColor(0,0,0);
				$pdf->SetFont("arial","",10);
				$pdf->Cell(70,8,"$section",1,0,'');
				$pdf->Cell(65,8,"$number_of_voters",1,0,'C');
				$pdf->Ln(8);
				$g7 = $g7 + $number_of_voters;				
			}

		$pdf->Ln(2);
		$pdf->SetX('38');
		$pdf->SetFont("arial","",10);
		$pdf->SetTextColor(300,100,100);		
		$pdf->Cell(70,8,"Total Voters:",1,0,'C');
		$pdf->Cell(65,8,$g7,1,0,'C');
		$pdf->Ln(10);

		$pdf->SetX('38');
		$pdf->SetFont("arial","",10);
		$pdf->SetTextColor(300,100,100);
		$pdf->Cell(70,8,"Grade 8",1,0,'C');
		$pdf->Cell(65,8,"Number of Voters",1,0,'C');
		$pdf->Ln(8);

			$get_grade = mysqli_query($con,"SELECT * FROM grade_level WHERE grade_level.grade_level = 'Grade 8'");
			$g8 = 0;
				while($row_grade = mysqli_fetch_array($get_grade)){
					$grade_id = $row_grade['grade_id'];
					$section = $row_grade['section'];
					$number_of_voters = $row_grade['number_of_voters'];

				$pdf->SetX('38');
				$pdf->SetTextColor(0,0,0);
				$pdf->SetFont("arial","",10);
				$pdf->Cell(70,8,"$section",1,0,'');
				$pdf->Cell(65,8,"$number_of_voters",1,0,'C');
				$pdf->Ln(8);
				$g8 = $g8 + $number_of_voters;				
			}

		$pdf->Ln(2);
		$pdf->SetX('38');
		$pdf->SetFont("arial","",10);
		$pdf->SetTextColor(300,100,100);		
		$pdf->Cell(70,8,"Total Voters:",1,0,'C');
		$pdf->Cell(65,8,$g8,1,0,'C');
		$pdf->Ln(10);

		$pdf->SetX('38');
		$pdf->SetFont("arial","",10);
		$pdf->SetTextColor(300,100,100);
		$pdf->Cell(70,8,"Grade 9",1,0,'C');
		$pdf->Cell(65,8,"Number of Voters",1,0,'C');
		$pdf->Ln(8);

			$get_grade = mysqli_query($con,"SELECT * FROM grade_level WHERE grade_level.grade_level = 'Grade 9'");
			$g9 = 0;
				while($row_grade = mysqli_fetch_array($get_grade)){
					$grade_id = $row_grade['grade_id'];
					$section = $row_grade['section'];
					$number_of_voters = $row_grade['number_of_voters'];

				$pdf->SetX('38');
				$pdf->SetTextColor(0,0,0);
				$pdf->SetFont("arial","",10);
				$pdf->Cell(70,8,"$section",1,0,'');
				$pdf->Cell(65,8,"$number_of_voters",1,0,'C');
				$pdf->Ln(8);
				$g9 = $g9 + $number_of_voters;				
			}

		$pdf->Ln(2);
		$pdf->SetX('38');
		$pdf->SetFont("arial","",10);
		$pdf->SetTextColor(300,100,100);		
		$pdf->Cell(70,8,"Total Voters:",1,0,'C');
		$pdf->Cell(65,8,$g9,1,0,'C');
		$pdf->Ln(10);

		$pdf->SetX('38');
		$pdf->SetFont("arial","",10);
		$pdf->SetTextColor(300,100,100);
		$pdf->Cell(70,8,"Grade 10",1,0,'C');
		$pdf->Cell(65,8,"Number of Voters",1,0,'C');
		$pdf->Ln(8);

			$get_grade = mysqli_query($con,"SELECT * FROM grade_level WHERE grade_level.grade_level = 'Grade 10'");
			$g10 = 0;
				while($row_grade = mysqli_fetch_array($get_grade)){
					$grade_id = $row_grade['grade_id'];
					$section = $row_grade['section'];
					$number_of_voters = $row_grade['number_of_voters'];

				$pdf->SetX('38');
				$pdf->SetTextColor(0,0,0);
				$pdf->SetFont("arial","",10);
				$pdf->Cell(70,8,"$section",1,0,'');
				$pdf->Cell(65,8,"$number_of_voters",1,0,'C');
				$pdf->Ln(8);
				$g10 = $g10 + $number_of_voters;				
			}

		$pdf->Ln(2);
		$pdf->SetX('38');
		$pdf->SetFont("arial","",10);
		$pdf->SetTextColor(300,100,100);		
		$pdf->Cell(70,8,"Total Voters:",1,0,'C');
		$pdf->Cell(65,8,$g10,1,0,'C');
		$pdf->Ln(10);

	}

	else if($school_type == "Integrated School (Grade 7-12)"){	

		$pdf->SetX('38');
		$pdf->SetFont("arial","",10);
		$pdf->SetTextColor(300,100,100);
		$pdf->Cell(70,8,"Grade 7",1,0,'C');
		$pdf->Cell(65,8,"Number of Voters",1,0,'C');
		$pdf->Ln(8);

			$get_grade = mysqli_query($con,"SELECT * FROM grade_level WHERE grade_level.grade_level = 'Grade 7'");
			$g7 = 0;
				while($row_grade = mysqli_fetch_array($get_grade)){
					$grade_id = $row_grade['grade_id'];
					$section = $row_grade['section'];
					$number_of_voters = $row_grade['number_of_voters'];

				$pdf->SetX('38');
				$pdf->SetTextColor(0,0,0);
				$pdf->SetFont("arial","",10);
				$pdf->Cell(70,8,"$section",1,0,'');
				$pdf->Cell(65,8,"$number_of_voters",1,0,'C');
				$pdf->Ln(8);
				$g7 = $g7 + $number_of_voters;				
			}

		$pdf->Ln(2);
		$pdf->SetX('38');
		$pdf->SetFont("arial","",10);
		$pdf->SetTextColor(300,100,100);		
		$pdf->Cell(70,8,"Total Voters:",1,0,'C');
		$pdf->Cell(65,8,$g7,1,0,'C');
		$pdf->Ln(10);

		$pdf->SetX('38');
		$pdf->SetFont("arial","",10);
		$pdf->SetTextColor(300,100,100);
		$pdf->Cell(70,8,"Grade 8",1,0,'C');
		$pdf->Cell(65,8,"Number of Voters",1,0,'C');
		$pdf->Ln(8);

			$get_grade = mysqli_query($con,"SELECT * FROM grade_level WHERE grade_level.grade_level = 'Grade 8'");
			$g8 = 0;
				while($row_grade = mysqli_fetch_array($get_grade)){
					$grade_id = $row_grade['grade_id'];
					$section = $row_grade['section'];
					$number_of_voters = $row_grade['number_of_voters'];

				$pdf->SetX('38');
				$pdf->SetTextColor(0,0,0);
				$pdf->SetFont("arial","",10);
				$pdf->Cell(70,8,"$section",1,0,'');
				$pdf->Cell(65,8,"$number_of_voters",1,0,'C');
				$pdf->Ln(8);
				$g8 = $g8 + $number_of_voters;				
			}

		$pdf->Ln(2);
		$pdf->SetX('38');
		$pdf->SetFont("arial","",10);
		$pdf->SetTextColor(300,100,100);		
		$pdf->Cell(70,8,"Total Voters:",1,0,'C');
		$pdf->Cell(65,8,$g8,1,0,'C');
		$pdf->Ln(10);

		$pdf->SetX('38');
		$pdf->SetFont("arial","",10);
		$pdf->SetTextColor(300,100,100);
		$pdf->Cell(70,8,"Grade 9",1,0,'C');
		$pdf->Cell(65,8,"Number of Voters",1,0,'C');
		$pdf->Ln(8);

			$get_grade = mysqli_query($con,"SELECT * FROM grade_level WHERE grade_level.grade_level = 'Grade 9'");
			$g9 = 0;
				while($row_grade = mysqli_fetch_array($get_grade)){
					$grade_id = $row_grade['grade_id'];
					$section = $row_grade['section'];
					$number_of_voters = $row_grade['number_of_voters'];

				$pdf->SetX('38');
				$pdf->SetTextColor(0,0,0);
				$pdf->SetFont("arial","",10);
				$pdf->Cell(70,8,"$section",1,0,'');
				$pdf->Cell(65,8,"$number_of_voters",1,0,'C');
				$pdf->Ln(8);
				$g9 = $g9 + $number_of_voters;				
			}

		$pdf->Ln(2);
		$pdf->SetX('38');
		$pdf->SetFont("arial","",10);
		$pdf->SetTextColor(300,100,100);		
		$pdf->Cell(70,8,"Total Voters:",1,0,'C');
		$pdf->Cell(65,8,$g9,1,0,'C');
		$pdf->Ln(10);

		$pdf->SetX('38');
		$pdf->SetFont("arial","",10);
		$pdf->SetTextColor(300,100,100);
		$pdf->Cell(70,8,"Grade 10",1,0,'C');
		$pdf->Cell(65,8,"Number of Voters",1,0,'C');
		$pdf->Ln(8);

			$get_grade = mysqli_query($con,"SELECT * FROM grade_level WHERE grade_level.grade_level = 'Grade 10'");
			$g10 = 0;
				while($row_grade = mysqli_fetch_array($get_grade)){
					$grade_id = $row_grade['grade_id'];
					$section = $row_grade['section'];
					$number_of_voters = $row_grade['number_of_voters'];

				$pdf->SetX('38');
				$pdf->SetTextColor(0,0,0);
				$pdf->SetFont("arial","",10);
				$pdf->Cell(70,8,"$section",1,0,'');
				$pdf->Cell(65,8,"$number_of_voters",1,0,'C');
				$pdf->Ln(8);
				$g10 = $g10 + $number_of_voters;				
			}

		$pdf->Ln(2);
		$pdf->SetX('38');
		$pdf->SetFont("arial","",10);
		$pdf->SetTextColor(300,100,100);		
		$pdf->Cell(70,8,"Total Voters:",1,0,'C');
		$pdf->Cell(65,8,$g10,1,0,'C');
		$pdf->Ln(10);

		$pdf->SetX('38');
		$pdf->SetFont("arial","",10);
		$pdf->SetTextColor(300,100,100);
		$pdf->Cell(70,8,"Grade 11",1,0,'C');
		$pdf->Cell(65,8,"Number of Voters",1,0,'C');
		$pdf->Ln(8);

			$get_grade = mysqli_query($con,"SELECT * FROM grade_level WHERE grade_level.grade_level = 'Grade 11'");
			$g11 = 0;
				while($row_grade = mysqli_fetch_array($get_grade)){
					$grade_id = $row_grade['grade_id'];
					$section = $row_grade['section'];
					$number_of_voters = $row_grade['number_of_voters'];

				$pdf->SetX('38');
				$pdf->SetTextColor(0,0,0);
				$pdf->SetFont("arial","",10);
				$pdf->Cell(70,8,"$section",1,0,'');
				$pdf->Cell(65,8,"$number_of_voters",1,0,'C');
				$pdf->Ln(8);
				$g11 = $g11 + $number_of_voters;				
			}

		$pdf->Ln(2);
		$pdf->SetX('38');
		$pdf->SetFont("arial","",10);
		$pdf->SetTextColor(300,100,100);		
		$pdf->Cell(70,8,"Total Voters:",1,0,'C');
		$pdf->Cell(65,8,$g11,1,0,'C');
		$pdf->Ln(10);

		$pdf->SetX('38');
		$pdf->SetFont("arial","",10);
		$pdf->SetTextColor(300,100,100);
		$pdf->Cell(70,8,"Grade 12",1,0,'C');
		$pdf->Cell(65,8,"Number of Voters",1,0,'C');
		$pdf->Ln(8);

			$get_grade = mysqli_query($con,"SELECT * FROM grade_level WHERE grade_level.grade_level = 'Grade 12'");
			$g12 = 0;
				while($row_grade = mysqli_fetch_array($get_grade)){
					$grade_id = $row_grade['grade_id'];
					$section = $row_grade['section'];
					$number_of_voters = $row_grade['number_of_voters'];

				$pdf->SetX('38');
				$pdf->SetTextColor(0,0,0);
				$pdf->SetFont("arial","",10);
				$pdf->Cell(70,8,"$section",1,0,'');
				$pdf->Cell(65,8,"$number_of_voters",1,0,'C');
				$pdf->Ln(8);
				$g12 = $g12 + $number_of_voters;				
			}

		$pdf->Ln(2);
		$pdf->SetX('38');
		$pdf->SetFont("arial","",10);
		$pdf->SetTextColor(300,100,100);		
		$pdf->Cell(70,8,"Total Voters:",1,0,'C');
		$pdf->Cell(65,8,$g12,1,0,'C');
		$pdf->Ln(10);


	}

	else if($school_type == "Senior High School (Grade 11-12)"){	

		$pdf->SetX('38');
		$pdf->SetFont("arial","",10);
		$pdf->SetTextColor(300,100,100);
		$pdf->Cell(70,8,"Grade 11",1,0,'C');
		$pdf->Cell(65,8,"Number of Voters",1,0,'C');
		$pdf->Ln(8);

			$get_grade = mysqli_query($con,"SELECT * FROM grade_level WHERE grade_level.grade_level = 'Grade 11'");
			$g11 = 0;
				while($row_grade = mysqli_fetch_array($get_grade)){
					$grade_id = $row_grade['grade_id'];
					$section = $row_grade['section'];
					$number_of_voters = $row_grade['number_of_voters'];

				$pdf->SetX('38');
				$pdf->SetTextColor(0,0,0);
				$pdf->SetFont("arial","",10);
				$pdf->Cell(70,8,"$section",1,0,'');
				$pdf->Cell(65,8,"$number_of_voters",1,0,'C');
				$pdf->Ln(8);
				$g11 = $g11 + $number_of_voters;				
			}

		$pdf->Ln(2);
		$pdf->SetX('38');
		$pdf->SetFont("arial","",10);
		$pdf->SetTextColor(300,100,100);		
		$pdf->Cell(70,8,"Total Voters:",1,0,'C');
		$pdf->Cell(65,8,$g11,1,0,'C');
		$pdf->Ln(10);

		$pdf->SetX('38');
		$pdf->SetFont("arial","",10);
		$pdf->SetTextColor(300,100,100);
		$pdf->Cell(70,8,"Grade 12",1,0,'C');
		$pdf->Cell(65,8,"Number of Voters",1,0,'C');
		$pdf->Ln(8);
		$g12 = 0;
			$get_grade = mysqli_query($con,"SELECT * FROM grade_level WHERE grade_level.grade_level = 'Grade 12'");
				while($row_grade = mysqli_fetch_array($get_grade)){
					$grade_id = $row_grade['grade_id'];
					$section = $row_grade['section'];
					$number_of_voters = $row_grade['number_of_voters'];

				$pdf->SetX('38');
				$pdf->SetTextColor(0,0,0);
				$pdf->SetFont("arial","",10);
				$pdf->Cell(70,8,"$section",1,0,'');
				$pdf->Cell(65,8,"$number_of_voters",1,0,'C');
				$pdf->Ln(8);
				$g12 = $g12 + $number_of_voters;				
			}

		$pdf->Ln(2);
		$pdf->SetX('38');
		$pdf->SetFont("arial","",10);
		$pdf->SetTextColor(300,100,100);		
		$pdf->Cell(70,8,"Total Voters:",1,0,'C');
		$pdf->Cell(65,8,$g12,1,0,'C');
		$pdf->Ln(10);

	}
		$pdf->Ln(10);
		$pdf->SetX('38');
		$pdf->SetTextColor(0,0,0);
				$pdf->SetFont("arial","",10);
				$pdf->Cell(70,8,"COMELEC CHAIRPERSON SIGNATURE",1,0,'C');
				$pdf->Cell(65,8,"",1,0,'');
				$pdf->Ln(8);

		$id_qr = $row_schools['school_id'];

		$school_year = preg_replace('/\s+/', '_', $school_year);

		$current_month = date("m");
		$current_day = date("d");
		$time = date("hi");

		$pdf->Output("results_initial/InitialResult-(SY$school_year)-$school_id-$current_month$current_day$time.pdf", 'F');
		$pdf->Output("InitialResult-(SY$school_year)-$school_id-$current_month$current_day$time.pdf", 'D');
		?>
</body>
</html>
</body>
</html>