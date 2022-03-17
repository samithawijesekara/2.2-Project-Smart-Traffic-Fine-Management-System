<?php
session_start();
if (isset($_SESSION['license_id']) && isset($_SESSION['driver_email']) && isset($_SESSION['driver_name']) && isset($_SESSION['home_address'])) {
?>


<!DOCTYPE html>
<html>

<head>
    <title>Thank you for payement</title>

    <!--Elements inside the head tag includes goes here-->
    <?php 
        include_once '../includes/header.php';
    ?>

    <style>
        body{
            background-color: #ebebeb;
        }
    </style>

</head>


<body class="overlay-scrollbar">

    <!--Top navigation bar includes goes here-->
    <?php 
        include 'includes/topNav.php';
    ?>


    
<div class="hero_area">
    <div class="container text-center" style="margin-top: 100px; color: #303030; min-height: 50vh;">
        <h2 class="animated fadeInDown">Thank you for payment</h2>
        <h5 class="animated fadeIn delay-250ms secondLine" style="line-height: 2rem;">Your fine payment is successfully..! You will be redirected in 8 seconds. <a href="paid_fine.php">(skip)</a></h5>
        <div class="row">
            <div class="col-12 text-center">
                <img src="../assets/img/thank_you.png" class="img-fluid animated bounceInDown delay-250ms">
            </div>
        </div>
        <h2 class="animated fadeIn delay-250ms badge badge-pill badge-warning" style="font-size: 1rem; padding: 10px 25px;">Don't do the same mistake again..!!</h2>
    </div>
</div>

    <!--Javascripts includes goes here-->
    <?php 
        include '../includes/footer.php';
    ?>

    <!-- import script -->

    <script>
        $(document).ready(function () {
            window.setTimeout(function () {
            location.href = "paid_fine.php";
            }, 8000);
        });
    </script>

</body>

</html>
<?php
}else{ 
	header("Location: login.php");
	exit();
}
?>

