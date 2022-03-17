<?php 

session_start();
include "../connection.php";

if (isset($_POST['licenseid']) && isset($_POST['driveremail'])
    && isset($_POST['driverpassword']) && isset($_POST['cdriverpassword'])
    && isset($_POST['drivername']) && isset($_POST['classofvehicle'])
    && isset($_POST['homeaddress']) && isset($_POST['licenseissuedate'])
    && isset($_POST['licenseexpiredate'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$licenseid = validate($_POST['licenseid']);
	$driveremail = validate($_POST['driveremail']);
	$driverpassword = validate($_POST['driverpassword']);
	$cdriverpassword = validate($_POST['cdriverpassword']);
    $drivername = validate($_POST['drivername']);
    $classofvehicle = validate($_POST['classofvehicle']);
    $homeaddress = validate($_POST['homeaddress']);
    $licenseissuedate = validate($_POST['licenseissuedate']);
    $licenseexpiredate = validate($_POST['licenseexpiredate']);
    
    $user_data = 'licenseid='. $licenseid. '&driveremail='. $driveremail. '&drivername='. $drivername. '&classofvehicle='. $classofvehicle. '&homeaddress='. $homeaddress. '&licenseissuedate='. $licenseissuedate. '&licenseexpiredate='. $licenseexpiredate;

    //Check text field empty or not
	if (empty($licenseid)) {
		header("Location: add_driver.php?error=License ID is required!&$user_data");
	    exit();
	}else if(empty($driveremail)){
        header("Location: add_driver.php?error=Driver Email is required!&$user_data");
	    exit();
	}
	else if(empty($driverpassword)){
        header("Location: add_driver.php?error=Driver Password is required!&$user_data");
	    exit();
	}

	else if(empty($cdriverpassword)){
        header("Location: add_driver.php?error=Confirm password is required!&$user_data");
	    exit();
	}

    else if(empty($drivername)){
        header("Location: add_driver.php?error=Driver Full Name is required!&$user_data");
        exit();
    }

    else if(empty($classofvehicle)){
        header("Location: add_driver.php?error=Class Of Vehicle is required!&$user_data");
        exit();
    }

    else if(empty($homeaddress)){
        header("Location: add_driver.php?error=Driver Address is required!&$user_data");
        exit();
    }

    else if(empty($licenseissuedate)){
        header("Location: add_driver.php?error=License Issue Date is required!&$user_data");
        exit();
    }

    else if(empty($licenseexpiredate)){
        header("Location: add_driver.php?error=License Expire Date is required!&$user_data");
        exit();
    }

	else if($driverpassword !== $cdriverpassword){
        header("Location: add_driver.php?error=Password  does not match!&$user_data");
	    exit();
	}

	else{
        // hashing the password
        $driverpassword = md5($driverpassword);

        $sql = "SELECT * FROM driver WHERE license_id ='$licenseid' ";
        $result = mysqli_query($conn, $sql);
    
        if (mysqli_num_rows($result) > 0) {
            header("Location: add_driver.php?error=License ID already exist!");
            exit();
        }else {

            //Insert driver data into database
            $sql2 = "INSERT INTO driver(license_id, driver_email, driver_password, driver_name, home_address, license_issue_date, license_expire_date, class_of_vehicle, registered_at, code, status) VALUES('$licenseid', '$driveremail', '$driverpassword', '$drivername', '$homeaddress', '$licenseissuedate', '$licenseexpiredate', '$classofvehicle', NOW(), '0', 'verified')";
            $result2 = mysqli_query($conn, $sql2);
            if ($result2) {
                header("Location: add_driver.php?success=Added Successfully");
                 exit();
            }else {
                header("Location: add_driver.php?error=Unknown error occurred!");
                exit();
            }
        }
		
	}
	
}else{
	header("Location: add_driver.php");
	exit();
}

?>