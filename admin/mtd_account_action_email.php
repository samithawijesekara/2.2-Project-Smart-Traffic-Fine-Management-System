<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['admin_email'])) {
?>




<?php
include "../connection.php";

	if(isset($_POST['change-email'])){		
	$changeemail = $_POST['changeemail'];
	
	$user_data = 'changeemail='. $changeemail;	
	
		if (empty($changeemail)) {
			header("Location: mtd_account.php?error=MTD Email is required!&$user_data");
			exit();
		}
		else {
			$sql = "SELECT * FROM mtd WHERE mtd_email='$changeemail' ";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
				header("Location: mtd_account.php?error=You entered old MTD email; Nothing to change.");
				exit();
			}
			else {
				mysqli_query($conn,"update mtd set mtd_email='$changeemail' ");
				header("Location: mtd_account.php?success=MTD email changed successfully.");
				exit();
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
	