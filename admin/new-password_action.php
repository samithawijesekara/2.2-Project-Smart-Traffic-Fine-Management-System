<?php
include "../connection.php";
session_start();

if(isset($_POST['changePassword'])){
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    
    if(empty($_POST['password'])){
        header("Location: new-password.php?error=Password is required!");
        exit();
    }else if(empty($_POST['cpassword'])){
        header("Location: new-password.php?error=Confirm password is required!");
        exit();
    }else if(strlen($_POST['password']) < 8){
        header("Location: new-password.php?error=Use 8 or more characters with a mix of letters, numbers & symbols!");
        exit();
    }else if($_POST['password'] !== $_POST['cpassword']){
        header("Location: new-password.php?error=Password does not match!");
        exit();   
    }else{
        $email = $_SESSION['email'];
        $updatePassword = "UPDATE admins SET admin_password = '$password' WHERE admin_email = '$email'";
        $updatePass = mysqli_query($conn, $updatePassword) or die("Query Failed");
        //session_unset($email);
        session_destroy();
        header("location: index.php?success=Password changed successfully");
        exit();
    }



}else{
    header("location: verification-code.php");
    exit();
}
?>