<?php
    // Connection Created Successfully
    include "../connection.php";
    
    session_start();
    // if forgot button will clicked
    if (isset($_POST['forgot_password'])) {
        $email = $_POST['email'];
        $_SESSION['email'] = $email;

        $emailCheckQuery = "SELECT * FROM mtd WHERE mtd_email = '$email'";
        $emailCheckResult = mysqli_query($conn, $emailCheckQuery);

        if(empty($email)){
            header("Location: forgot-password.php?error=Email Address is required!");
            exit();
        }else{
              // if query run
        if ($emailCheckResult) {
            // if email matched
            if (mysqli_num_rows($emailCheckResult) > 0) {
                $code = rand(999999, 111111);
                $updateQuery = "UPDATE mtd SET code = $code WHERE mtd_email = '$email'";
                $updateResult = mysqli_query($conn, $updateQuery);
                if ($updateResult) {
                    $subject = "Email Verification Code";
                    $message = "Your verification code is $code";
                    $sender = "From: stfms@techbirdlabs.com";

                    if (mail($email, $subject, $message, $sender)) {
                        header("location: verification-code.php?success= We've sent a verification code to your Email <br> $email");
                        exit();
                    } else {
                        header("location: forgot-password.php?error= Failed while sending code!");
                        exit();
                    }
                } else {
                    header("location: forgot-password.php?error=Failed while inserting data into database!");
                    exit();
                }
            }else{
                header("Location: forgot-password.php?error= Incorrect Email Address!");
                exit();
            }
        }else {
            header("location: forgot-password.php?error= Failed while checking email from database!");
            exit();
        }

        }
    }else{
        header("location: forgot-password.php");
        exit();
    }

?>
