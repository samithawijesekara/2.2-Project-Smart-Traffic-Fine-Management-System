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
			header("Location: profile.php?error=Admin Email is required!&$user_data");
			exit();
		}
		else {
			$sql = "SELECT * FROM admins WHERE admin_email='$changeemail' ";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
				header("Location: profile.php?error=You entered old admin email; Nothing to change.");
				exit();
			}
			else {
				mysqli_query($conn,"update admins set admin_email='$changeemail' ");
				header("Location: profile.php?success=Admin email changed successfully.");
				exit();
			}			
		}	
	} 
	else {
		header("Location: profile.php?error=Error Occured.");
	    exit();
	}
?>
<?php
}else{ 
	header("Location: index.php");
	exit();
}
?>
	