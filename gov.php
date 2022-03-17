<!DOCTYPE html>
<html>

<head>
    <title>Government Log in | STFMS</title>

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
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
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


<body onload="loadingIcon()" class="overlay-scrollbar">

    <div id="loading">
        <table align="center">
            <tr>
                <td>
                    <div class="loadingio-spinner-dual-ball-ezjdz35ph7h">
                        <div class="ldio-1l6lp7zdq37">
                            <div></div>
                            <div></div>
                            <div></div> 
                        </div>
                    </div>   
                </td>
            </tr>
        </table>
    </div>

    <!--==================================================================================================================================SECTION_01====================================================================================================================================-->
<div id="content">

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
                            <a href="user/login.php"><span class="btn btn-md btn-danger" data-toggle="modal" data-target="#userLogdin">Log in as a driver <i class="fas fa-sign-in-alt" style="font-size: 1rem;"></i></span></a>
                        </p>
                    </div>
                </li>
            </ul>
            <!-- end topnav right -->
        </div>
        <!-- Topbar navigation end here ===================================================-->
    
    <div class="hero_area">
        <div class="container home-tiles">
            <div class="row custom-row">
                <a href="admin/index.php">
                    <div class="col-md-4 box-btn">
                        <i class="fas fa-user-shield"></i>
                            <h5>Traffic Police Admin</h5>
                    </div>
                </a>
                <a href="mtd/index.php">
                    <div class="col-md-4 box-btn">
                        <i class="fas fa-building"></i>
                            <h5>Motor Traffic Department</h5>
                    </div>
                </a>
                <a href="tpo/index.php">
                    <div class="col-md-4 box-btn">
                        <i class="fas fa-book-reader"></i>
                            <h5>Traffic Police Officer</h5>
                    </div>
                </a>    
            </div>
        </div>
    </div>

    <!--div class="hero_area">
        <div class="container home-tiles">
            <div class="row custom-row">
                <a href="admin/index.php">
                    <div class="col-md-4 box-btn">
                        <i class="fas fa-user-shield"></i>
                            <h5>Traffic Police Admin</h5>
                    </div>
                </a>
                <a href="mtd/index.php">
                    <div class="col-md-4 box-btn">
                        <i class="fas fa-building"></i>
                            <h5>Motor Traffic Department</h5>
                    </div>
                </a>
                <a href="tpo/index.php">
                    <div class="col-md-4 box-btn">
                        <i class="fas fa-book-reader"></i>
                            <h5>Traffic Police Officer</h5>
                    </div>
                </a>    
            </div>
        </div>
    </div-->


    <a href="#footer">
        <svg class="arrows">
            <path class="a1" d="M0 0 L30 32 L60 0"></path>
            <path class="a2" d="M0 20 L30 52 L60 20"></path>
            <path class="a3" d="M0 40 L30 72 L60 40"></path>
        </svg>
    </a>

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
                            <li><a style="text-transform: lowercase;" href="mailto:stfms@gmail.com" target="_blank"> <i class="fas fa-envelope"></i> stfms@gmail.com</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Navigate to</h4>
                        <ul>
                            <li><a href="index.php">User Home</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <img class="footer-logo" src="assets/img/footer_logo.svg">
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer End from here-->

</div>

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