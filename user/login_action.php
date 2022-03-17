<!--Login Action here--->
<?php

session_start();
include "../connection.php";

if (isset($_POST['license_id']) && isset($_POST['driver_password'])) {

	function validate($data){
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$license_id = validate($_POST['license_id']);
	$driver_password = validate($_POST['driver_password']);

	if (empty($license_id)) {
		header("Location: login.php?error=License ID is required!");
		exit();
	}else if (empty($driver_password)) {
		header("Location: login.php?error=Password is required!");
		exit();
		
	}else{
 
		$driver_password = md5($driver_password);

		$sql = "SELECT * FROM driver WHERE license_id='$license_id' AND driver_password='$driver_password'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
			if ($row['license_id'] === $license_id && $row['driver_password'] === $driver_password) {
				$_SESSION['license_id'] = $row['license_id'];
				$_SESSION['driver_name'] = $row['driver_name'];
				$_SESSION['driver_email'] = $row['driver_email'];
				$_SESSION['home_address'] = $row['home_address'];
				header("Location: dashboard.php");
				exit();
				
			}else{
				header("Location: login.php?error= Incorrect License ID or Password!");
				exit();
			}

		}else{
			header("Location: login.php?error= Incorrect License ID or Password!");
			exit();
		} 
	}


}else{
	header("Location: login.php");
	exit();
}



?>