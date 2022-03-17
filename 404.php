<!DOCTYPE html>
<html>

<head>
    <title>Oops something went wrong..!!</title>

    <!--Meta tags start-->
    <meta charset="UTF-8">
    <meta name="description" content="Smart Traffic Fine Management System for Sri Lanka">
    <meta name="keywords" content="Traffic, Fine, System, Sri Lanka">
    <meta name="author" content="Uva Wellassa University">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <!--Meta tags end-->

    <!--Favicon start-->
    <link rel="icon" type="image/png" href="assets/img/logo.png">
    <!--Favicon end-->

    <!-- Import lib -->
    <link rel="stylesheet" type="text/css" href="assets/vendors/animatecss/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/bootstrap/bootstrap.min.css">
    <!-- End import lib -->
    <!-- Import fonts -->
    <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Dosis:400,600,700|Poppins:400,600,700&display=swap" rel="stylesheet" />
    <!-- End fonts -->
    <!-- Import styles -->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="assets/css/home.css">
    <!-- End styles -->
    <!-- Import fontawesome from CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- End fontawesome from CDN -->

</head>


<body class="overlay-scrollbar">



    <!--==================================================================================================================================SECTION_01====================================================================================================================================-->

    <!-- Topbar navigation start here ===================================================-->
    <div class="topnavbar animated fadeIn">
        <!-- topnav left -->
        <ul class="topnavbar-nav">
            <li class="topnav-item">
                <a href="index.php"><img src="assets/img/logo_text.svg" alt="STFMS logo" class="logo logo-light"></a>            
            </li>
        </ul>
        <!-- end topnav left -->
        <!-- topnav right -->
        <ul class="topnavbar-nav topnav-right">
            <li class="topnav-item">
                <div class="mydropdown">
                    <p class="mt-3 mr-4">
                        <a href="user/login.php"><span class="btn btn-md btn-danger" data-toggle="modal" data-target="#userLogdin">Log In <i class="fas fa-sign-in-alt" style="font-size: 1rem;"></i></span></a>
                    </p>
                </div>
            </li>
        </ul>
        <!-- end topnav right -->
    </div>
    <!-- Topbar navigation end here ===================================================-->


    <!--==================================================================================================================================SECTION_02====================================================================================================================================-->

    <!-- Main content start here =================================================-->
    <div class="hero_area">
        <div class="container text-center" style="margin-top: 100px; color: #cfcfcf; min-height: 50vh;">
            <h1 class="animated fadeInDown">Oopz, Something went wrong..!!</h1>
            <h4 class="animated fadeIn delay-250ms" style="line-height: 2rem; color: #bfbfbf;">The requested URL or page was not found in this server.</h4>
            <div class="row">
                <div class="col-12 text-center">
                    <img src="assets/img/404.svg" class="img-fluid animated bounceInUp delay-250ms">
                </div>
            </div>
        </div>
    </div>
    <!-- Main content end here ========================================-->


        <!-- Footer start from here-->
        <footer class="footer" id="footer">
            <div class="container animated fadeIn">
                <div class="row">
                    <div class="footer-col">
                        <h4>Inquiry via telephone</h4>
                        <ul>
                            <li><a href="tel:+94714590249"><i class="fas fa-phone"></i> +94 714590249</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Inquiry via email</h4>
                        <ul>
                            <li><a style="text-transform: lowercase;" href="mailto:stfms@gmail.com" target="_blank"> <i class="fas fa-envelope"></i>stfms@gmail.com</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Other Links</h4>
                        <ul>
                            <li><a href="help.php">How to use?</a></li>
                        </ul>
                        <ul>
                            <li><a href="gov.php">Government Log in</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <img class="footer-logo" src="assets/img/footer_logo.svg">
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer End from here-->


    <!--==================================================================================================================================JS_FILES======================================================================================================================================-->
    <script src="//code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script type="text/javascript" language="javascript" src="assets/vendors/bootstrap/popper.min.js"></script>
    <script type="text/javascript" language="javascript" src="assets/vendors/jquery/jquery-3.5.1.js"></script>
    <script type="text/javascript" language="javascript" src="assets/vendors/bootstrap/bootstrap.min.js"></script>

    <script>
        window.onload = function loadingIcon() {
            setTimeout(function() {
                document.getElementById("content").style.display = "block";
                document.getElementById("loading").style.display = "none";
            }, 2000);
        };
    </script>


</body>

</html>