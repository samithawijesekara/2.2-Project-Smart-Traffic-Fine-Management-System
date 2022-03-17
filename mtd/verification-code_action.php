<?php
include "../connection.php";
session_start();


if(isset($_POST['verifycode'])){
    $OTPverify = mysqli_real_escape_string($conn, $_POST['verify']);
    $verifyQuery = "SELECT * FROM mtd WHERE code = $OTPverify";
    $runVerifyQuery = mysqli_query($conn, $verifyQuery);

    if(empty($OTPverify)){
        header("Location: verification-code.php?error=Verification code is required!");
        exit();
    }else{
        if($runVerifyQuery){
            if(mysqli_num_rows($runVerifyQuery) > 0){
                $newQuery = "UPDATE mtd SET code = 0";
                $run = mysqli_query($conn,$newQuery);
                header("location: new-password.php");
            }else{
                header("Location: verification-code.php?error=Invalid Verification code!");
                exit();
            }
        }else{
            header("Location: verification-code.php?error=Invalid Verification code!");
            exit();
        }
    }
    
}else{
    header("location: verification-code.php");
    exit();
}
?>