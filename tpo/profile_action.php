<?php 
session_start();
include "../connection.php";

if (isset($_POST['oldpassword']) && isset($_POST['newpassword'])
    && isset($_POST['passwordconfirm'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$oldpassword = validate($_POST['oldpassword']);
	$newpassword = validate($_POST['newpassword']);
	$passwordconfirm = validate($_POST['passwordconfirm']);
    
	//check text fields
    if(empty($oldpassword)){
      header("Location: profile.php?error=Old Password is required!");
	  exit();
    }else if(empty($newpassword)){
      header("Location: profile.php?error=New Password is required!");
	  exit();
    }else if(empty($passwordconfirm)){
	  header("Location: profile.php?error=Confirm Password is required!");
	  exit();
	}else if($newpassword !== $passwordconfirm){
      header("Location: profile.php?error=Password  does not match!");
	  exit();
    }else {
    	// hashing the password
    	$oldpassword = md5($oldpassword);
    	$newpassword = md5($newpassword);
        $policeid = $_SESSION['police_id'];

		//check old password
        $sql = "SELECT officer_password
                FROM tpo WHERE 
                police_id='$policeid' AND officer_password='$oldpassword'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1){
        	
			//update new password
        	$sql_2 = "UPDATE tpo
        	          SET officer_password='$newpassword'
        	          WHERE police_id='$policeid'";
        	mysqli_query($conn, $sql_2);
        	header("Location: profile.php?success=Your password has been changed successfully");
	        exit();

        }else {
        	header("Location: profile.php?error=Old Password is Invalid!");
	        exit();
        } 
    }   
}

else{
     header("Location: profile.php");
     exit();      
}