<?php
include "../connection.php";

	if(isset($_POST['add-tpo-submit'])){

	$officerid = $_POST['officerid'];
	$officeremail = $_POST['officeremail'];
	$officerpassword = $_POST['officerpassword'];
	$officerpasswordconfirm = $_POST['officerpasswordconfirm'];
	$officername = $_POST['officername'];
	$policestation = $_POST['policestation'];
	$tpocourt = $_POST['tpocourt'];

	//Get time
	//date_default_timezone_set('Asia/Colombo');
	$date = date('d-m-Y');
	//$registereddate = $date;
	
	$user_data = 'officerid='. $officerid. '&officeremail='. $officeremail. '&officerpassword='. $officerpassword. '&officerpasswordconfirm='. $officerpasswordconfirm. '&officername='. $officername. '&policestation='. $policestation. '&tpocourt='. $tpocourt;
	
	if (empty($officerid)) {
		header("Location: add_traffic_officer.php?error=Officer ID is required!&$user_data");
	    exit();
	}else if(empty($officeremail)){
        header("Location: add_traffic_officer.php?error=Officer Email is required!&$user_data");
	    exit();
	}
	
	else if(empty($officerpassword)){
        header("Location: add_traffic_officer.php?error=Officer Password is required!&$user_data");
        exit();
    }

    else if(empty($officerpasswordconfirm)){
        header("Location: add_traffic_officer.php?error=Officer Password Confirm is required!&$user_data");
        exit();
    }

    else if(empty($officername)){
        header("Location: add_traffic_officer.php?error=Officer Name is required!&$user_data");
        exit();
    }
	
	else if(empty($policestation)){
        header("Location: add_traffic_officer.php?error=Police Station is required!&$user_data");
        exit();
    }

    else if(empty($tpocourt)){
        header("Location: add_traffic_officer.php?error=Court is required!&$user_data");
        exit();
    }
	
	else if ($officerpassword !== $officerpasswordconfirm) {
		header("Location: add_traffic_officer.php?error=Password does not match!&$user_data");
        exit();
	}else{
		// hashing the password
        $officerpassword = md5($officerpassword);

	    $sql = "SELECT * FROM tpo WHERE police_id='$officerid'";
		$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
				header("Location: add_traffic_officer.php?error=Traffic police officer already exist!");
				exit();
			}else {
			   $sql2 = "INSERT INTO tpo(police_id, officer_email, officer_password, officer_name, police_station, court, registered_at, code, status) VALUES('$officerid', '$officeremail', '$officerpassword', '$officername', '$policestation', '$tpocourt', NOW(), '0', 'verified')";
			   $result2 = mysqli_query($conn, $sql2);
			   if ($result2) {
				 header("Location: add_traffic_officer.php?success=Traffic police officer details added successfully");
				 exit();
			   }else {
					header("Location: add_traffic_officer.php?error=Email already exist!");
					exit();
			   }
			}
		}
} else {
	echo "submit not set";
}

?>