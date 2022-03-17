<!--Login Action here--->
<?php

session_start();
include "../connection.php";

if (isset($_POST['mtd_email']) && isset($_POST['mtd_password'])) {

	function validate($data){
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$mtd_email = validate($_POST['mtd_email']);
	$mtd_password = validate($_POST['mtd_password']);

	// Check field empty or not
	if (empty($mtd_email)) {
		header("Location: index.php?error=Email is required!");
		exit();
	}else if (empty($mtd_password)) {
		header("Location: index.php?error=Password is required!");
		exit();
		
	}else{
		//Password hashing using Md5
		$mtd_password = md5($mtd_password);
		//Get data from mtd table
		$sql = "SELECT * FROM mtd WHERE mtd_email='$mtd_email' AND mtd_password='$mtd_password'";

		$result = mysqli_query($conn, $sql);
		//Check database data 
		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
			if ($row['mtd_email'] === $mtd_email && $row['mtd_password'] === $mtd_password) {
				$_SESSION['mtd_email'] = $row['mtd_email'];
				$_SESSION['mtd_id'] = $row['mtd_id'];
				header("Location: dashboard.php");
				exit();
				
			}else{
				header("Location: index.php?error= Incorrect Email or Password!");
				exit();
			}

		}else{
			header("Location: index.php?error= Incorrect Email or Password!");
			exit();
		}
	}


}else{
	header("Location: index.php");
	exit();
}



?>