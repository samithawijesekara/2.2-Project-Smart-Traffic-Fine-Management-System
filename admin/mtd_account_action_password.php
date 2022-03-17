<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['admin_email'])) {
?>




<?php
include "../connection.php";

	if(isset($_POST['change-password'])){
		
	$newpassword = $_POST['newpassword'];
	$passwordconfirm =	$_POST['passwordconfirm'];
	
	$user_data = 'newpassword='. $newpassword. '&passwordconfirm='. $passwordconfirm;
	
		if (empty($newpassword)) {
			header("Location: mtd_account.php?error=New Password is required!&$user_data");
			exit();
		}		
		else if(empty($passwordconfirm)){
			header("Location: mtd_account.php?error=Confirm Password is required!&$user_data");
			exit();
		}	
		else {	
			$newpassword = md5($newpassword);	
			
			$sql = "SELECT * FROM mtd WHERE mtd_password='$newpassword' ";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
				header("Location: mtd_account.php?error=You have entered old password.");
				exit(); 
			} 
			else {
				$passwordconfirm = md5($passwordconfirm);
				if($newpassword == $passwordconfirm){
					mysqli_query($conn,"update mtd set mtd_password='$newpassword' ");
					header("Location: mtd_account.php?success=Password changed successfully.");
					exit();
				} 
				else{
					header("Location: mtd_account.php?error=New password and confirm password doesn't match.");
					exit();
				}		
			}		
		}	
	}	
	else {
		header("Location: mtd_account.php?error=Error Occured.");
	    exit();
	}
?>
<?php
}else{ 
	header("Location: index.php");
	exit();
}
?>
	