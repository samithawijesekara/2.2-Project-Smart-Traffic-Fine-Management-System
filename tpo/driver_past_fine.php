<?php
session_start();
if (isset($_SESSION['police_id']) && isset($_SESSION['officer_email']) && isset($_SESSION['officer_name']) && isset($_SESSION['police_station']) && isset($_SESSION['court'])) {

?>

<!DOCTYPE html>
<html>

<head>
    <title>Driver's Past Fine | Traffic Police Officer</title>

    <!--Elements inside the head tag includes goes here-->
    <?php 
        include_once '../includes/header.php';
    ?>

</head>


<body class="overlay-scrollbar">

    <!--Top navigation bar includes goes here-->
    <?php 
        include 'includes/topNav.php';
    ?>


    <!--==================================================================================================================================SECTION_02====================================================================================================================================-->

    <!-- Left sidebar navigation start here =============================================-->
    <div class="leftsidebar overlay-scrollbar scrollbar-hover">
        <ul class="leftsidebar-nav overlay-scrollbar scrollbar-hover">
            <!--Left sidebar navigation items-->
            <li class="leftsidebar-nav-item">
                <a href="dashboard.php" class="leftsidebar-nav-link">
                    <div>
                        <i class="fas fa-tachometer-alt"></i>
                    </div>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="leftsidebar-nav-item">
                <a href="add_new_fine.php" class="leftsidebar-nav-link">
                    <div>
                        <i class="fas fa-plus-circle"></i>
                    </div>
                    <span>Add New Fine</span>
                </a>
            </li>
            <li class="leftsidebar-nav-item">
                <a href="driver_past_fine.php" class="leftsidebar-nav-link active">
                    <div>
                        <i class="fas fa-history"></i>
                    </div>
                    <span>Driver's Past Fine</span>
                </a>
            </li>
            <li class="leftsidebar-nav-item">
                <a href="check_revenue_license.php" class="leftsidebar-nav-link">
                    <div>
                        <i class="fas fa-file-invoice"></i>
                    </div>
                    <span>Revenue License</span>
                </a>
            </li>
            <li class="leftsidebar-nav-item">
                <a href="view_reported_fine.php" class="leftsidebar-nav-link">
                    <div>
                        <i class="fas fa-flag-checkered"></i>
                    </div>
                    <span>View Reported Fine</span>
                </a>
            </li>
            <!--Left sidebar navigation items-->
        </ul>
    </div>
    <!-- Left sidebar navigation end here ========================================-->


    <!--==================================================================================================================================SECTION_03====================================================================================================================================-->

    <!-- Dashboard main content start here =================================================-->
    <div class="dashwrapper">
            <div class="container-fluid">
                <h1 class="mt-4">Driver's Past Fine</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Driver's Past Fine</li>
                </ol>
                <!--Driver past fine search form includes goes here-->
                <?php 
                    include 'driver_past_fine_search_form.php';
                ?>                
            </div>
    </div>
    <!-- Dashboard main content end here ========================================-->


    <!--Javascripts includes goes here-->
    <?php 
        include '../includes/footer.php';
    ?>


    <script type="text/javascript" language="javascript" src="../assets/vendors/bootstrap/bootstrap.min.js"></script>

    <script type="text/javascript" language="javascript" src="../assets/vendors/DataTables/02_TPO_ViewReportedFine.js"></script>


</body>

</html>

<?php
}else{ 
	header("Location: index.php");
	exit();
}
?>

