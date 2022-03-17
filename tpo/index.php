<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login | Traffic Police Officer</title>
    <!--Meta tags start-->
    <meta charset="UTF-8">
    <meta name="description" content="Smart Traffic Fine Management System for Sri Lanka">
    <meta name="keywords" content="Traffic, Fine, System, Sri Lanka">
    <meta name="author" content="Uva Wellassa University">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <!--Meta tags end-->
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="../assets/img/logo.png">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/vendors/bootstrap/bootstrap.min.css">
    <!--===============================================================================================-->
    <!-- Import fontawesome from CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- End fontawesome from CDN -->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/vendors/animatecss/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/css/login.css">
    <!--===============================================================================================-->
</head>

<body>
    <!--Login form start here--->
    <div class="container">
        <div class="row login-section">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body animated fadeIn">
                        <h1 class="card-icon"><i class="fas fa-book-reader"></i></h1>
                        <h5 class="card-title text-center">Traffic Police Officer Log In</h5>
                        <!--Warning msg start-->
                        <?php if (isset($_GET['error'])) { ?>
						<div class="alert alert-danger" id="success-alert">
						<i class="fas fa-exclamation-circle"></i>
						<?php echo $_GET['error']; ?>
						<button type="button" class="close" data-dismiss="alert">&times;</button>
					</div>
				<?php } ?>
                <?php if (isset($_GET['success'])) { ?>
						<div class="alert alert-success" id="success-alert">
						<i class="fas fa-check-circle"></i>
						<?php echo $_GET['success']; ?>
  						<button type="button" class="close" data-dismiss="alert">&times;</button>
					</div>
				<?php } ?>
                        <form class="form-signin" action="login_action" method="POST">
                            <div class="form-label-group">
                                <input type="text" id="inputID" name="police_id" class="form-control" placeholder="Police ID" >
                            </div>
                            <div class="form-label-group">
                                <input type="password" id="inputPassword" name="officer_password" class="form-control" placeholder="Password">
                            </div>
                            <button class="btn btn-lg btn-block text-uppercase" type="submit">Log in</button>
                            <hr class="my-4">
                            <h6 style="text-align: center; text-decoration: none;"><span><a href="forgot-password.php"><i class="fas fa-unlock-alt"></i> Forget Password?</a></span> <span class="ml-2 homelink"><a href="../gov.php"><i class="fas fa-home"></i> Home</a></span></h6>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Login form end here--->

    <!--===============================================================================================-->
    <script src="../assets/vendors/jquery/jquery-3.5.1.js"></script>
    <!--===============================================================================================-->
    <script src="../assets/vendors/bootstrap/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script>
    	//To close the success & error alert with slide up animation
	$("#success-alert").delay(4000).fadeTo(2000, 500).slideUp(1000, function(){
    	$("#success-alert").slideUp(1000);
	});
    </script>

</body>

</html>