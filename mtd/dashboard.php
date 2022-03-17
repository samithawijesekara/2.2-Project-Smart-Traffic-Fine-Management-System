<!--Mtd login session goes here-->

<?php
include "../connection.php";

session_start();
if (isset($_SESSION['mtd_id']) && isset($_SESSION['mtd_email'])) {
?>


<!DOCTYPE html>
<html>

<head>
    <title>Dashboard | Motor Traffic Department</title>

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
                <a href="dashboard.php" class="leftsidebar-nav-link active">
                    <div>
                        <i class="fas fa-tachometer-alt"></i>
                    </div>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="leftsidebar-nav-item">
                <a href="add_driver.php" class="leftsidebar-nav-link">
                    <div>
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <span>Add Driver</span>
                </a>
            </li>
            <li class="leftsidebar-nav-item">
                <a href="view_all_drivers.php" class="leftsidebar-nav-link">
                    <div>
                        <i class="fas fa-users"></i>
                    </div>
                    <span>View All Drivers</span>
                </a>
            </li>
            <!--Left sidebar navigation items-->
        </ul>
    </div>
    <!-- Left sidebar navigation end here ============================================-->


    <!--==================================================================================================================================SECTION_03====================================================================================================================================-->

    <!-- Dashboard main content start here =================================================-->
    <div class="dashwrapper animated fadeIn">
        <div class="container-fluid">
            <h6 class="mt-1 badge badge-pill badge-light tag-hover" style="padding: 10px; font-size: 0.75rem;">Account Holder : <span>Motor Traffic Department<span></h6>
            <!--Main four count boxes start here-->
            <div class="row p-2">
                <!--First count box start-->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-xs-12 animated fadeIn">
                    <div data-toggle="tooltip" data-placement="bottom" data-title="All the number of users already registered" class="dashcounter color-one p-4 box-hover">
                        <p>
                            <i class="fas fa-users"></i>
                        </p>
                        <!-- Get Registered Drivers count here -->
                        <?php
                            include "../connection.php";
                            $query = "SELECT license_id FROM driver"; 
                            $query_run = mysqli_query($conn, $query);

                            $row = mysqli_num_rows($query_run);
                            echo '<h3 class="counter">'.$row.'</h3>';
                        ?>
                        <p class="dashcount-name">Registered Drivers</p>
                    </div>
                </div>
                <!--First count box end-->
                <!--Second count box start-->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-xs-12 animated fadeIn">
                    <div data-toggle="tooltip" data-placement="bottom" data-title="Number of users registered in last 7 days" class="dashcounter color-two p-4 box-hover">
                        <p>
                            <i class="far fa-list-alt"></i>
                        </p>
                        <!-- Get Last 7 Days Registered count here -->
                        <?php
                            include "../connection.php";
                            $query = "SELECT license_id FROM driver WHERE registered_at > now() - interval 7 day"; 
                            $query_run = mysqli_query($conn, $query);

                            $row = mysqli_num_rows($query_run);
                            echo '<h3 class="counter">'.$row.'</h3>';
                        ?>
                        <p class="dashcount-name">Last 7 Days Registered</p>
                    </div>
                </div>
                <!--Second count box end-->
                <!--Third count box start-->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-xs-12 animated fadeIn">
                    <div data-toggle="tooltip" data-placement="bottom" data-title="Number of users registered in last month" class="dashcounter color-four p-4 box-hover">
                        <p>
                            <i class="far fa-calendar-alt"></i>
                        </p>
                        <!-- Get Last Month Registered count here -->
                        <?php
                            include "../connection.php";
                            $query = "SELECT license_id FROM driver WHERE month(registered_at)=month(now())-1"; 
                            $query_run = mysqli_query($conn, $query);

                            $row = mysqli_num_rows($query_run);
                            echo '<h3 class="counter">'.$row.'</h3>';
                        ?>
                        <p class="dashcount-name">Last Month Registered</p>
                    </div>
                </div>
                <!--Third count box end-->
                <!--Fourth count box start-->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-xs-12 animated fadeIn">
                    <div data-toggle="tooltip" data-placement="bottom" data-title="Number of users registered in last year" class="dashcounter color-three p-4 box-hover">
                        <p>
                        <i class="far fa-calendar-check"></i>
                        </p>
                        <!-- Get Last Year Registered count here -->
                        <?php
                            include "../connection.php";
                            $query = "SELECT license_id FROM driver WHERE year(registered_at)=year(now())-1"; 
                            $query_run = mysqli_query($conn, $query);

                            $row = mysqli_num_rows($query_run);
                            echo '<h3 class="counter">'.$row.'</h3>';
                        ?>
                        <p class="dashcount-name">Last Year Registered</p>
                    </div>
                </div>
                <!--Fourth count box end-->
            </div>
            <!--Main four count boxes end here-->

            <!--Charts start here-->
            <div class="row p-2">
                <div class="col-md-12">
                    <div class="mycard">
                        <div class="mycard-header">
                            <h3 class="mycard-heading-charts">
                                Registered Drivers Count <?php echo date("Y"); ?>
                            </h3>
                        </div>
                        <div class="mycard-content">
                            <canvas id="issuedFineCount" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!--Charts end here-->

        </div>
    </div>
    <!-- Dashboard main content end here ========================================-->


    <!--Javascripts includes goes here-->
    <?php 
        include '../includes/footer.php';
    ?>

    <script type="text/javascript" language="javascript" src="../assets/vendors/bootstrap/bootstrap.min.js"></script>

    <!--Dashboard number counter settings goes here-->
    <script>
        $('.counter').counterUp({
            delay: 10,
            time: 1500
        });
    </script>

</body>

</html>

<?php
}else{ 
	header("Location: index.php");
	exit();
}
?>


<!--===========================================================================================================================Charts start here =====================================
========================================================================================-->

<!-- 01.Chart => Pending fines and Paid fines amount================================== -->
<!-- PHP Code goes here -->
<?php
    include "../connection.php";
    $year = date("Y");
    $jan = mysqli_query($conn, "SELECT license_id FROM driver WHERE MONTH(registered_at) = 01 AND YEAR(registered_at) = '$year'");
    $janVal = mysqli_num_rows($jan);

    $feb = mysqli_query($conn, "SELECT license_id FROM driver WHERE MONTH(registered_at) = 02 AND YEAR(registered_at) = '$year'");
    $febVal = mysqli_num_rows($feb);

    $march = mysqli_query($conn, "SELECT license_id FROM driver WHERE MONTH(registered_at) = 03 AND YEAR(registered_at) = '$year'");
    $marchVal = mysqli_num_rows($march);

    $april = mysqli_query($conn, "SELECT license_id FROM driver WHERE MONTH(registered_at) = 04 AND YEAR(registered_at) = '$year'");
    $aprilVal = mysqli_num_rows($april);

    $may = mysqli_query($conn, "SELECT license_id FROM driver WHERE MONTH(registered_at) = 05 AND YEAR(registered_at) = '$year'");
    $mayVal = mysqli_num_rows($may);

    $june = mysqli_query($conn, "SELECT license_id FROM driver WHERE MONTH(registered_at) = 06 AND YEAR(registered_at) = '$year'");
    $juneVal = mysqli_num_rows($june);

    $july = mysqli_query($conn, "SELECT license_id FROM driver WHERE MONTH(registered_at) = 07 AND YEAR(registered_at) = '$year'");
    $julyVal = mysqli_num_rows($july);

    $august = mysqli_query($conn, "SELECT license_id FROM driver WHERE MONTH(registered_at) = 08 AND YEAR(registered_at) = '$year'");
    $augustVal = mysqli_num_rows($august);

    $september = mysqli_query($conn, "SELECT license_id FROM driver WHERE MONTH(registered_at) = 09 AND YEAR(registered_at) = '$year'");
    $sepVal = mysqli_num_rows($september);

    $october = mysqli_query($conn, "SELECT license_id FROM driver WHERE MONTH(registered_at) = 10 AND YEAR(registered_at) = '$year'");
    $octVal = mysqli_num_rows($october);

    $november = mysqli_query($conn, "SELECT license_id FROM driver WHERE MONTH(registered_at) = 11 AND YEAR(registered_at) = '$year'");
    $novVal = mysqli_num_rows($november);

    $december = mysqli_query($conn, "SELECT license_id FROM driver WHERE MONTH(registered_at) = 12 AND YEAR(registered_at) = '$year'");
    $decVal = mysqli_num_rows($december);
?>

<!-- PHP Code end here -->
<!-- bar chart -->
<Script>
    jan = '<?php echo $janVal; ?>';
    feb = '<?php echo $febVal; ?>';
    march = '<?php echo $marchVal; ?>';
    april = '<?php echo $aprilVal; ?>';
    may = '<?php echo $mayVal; ?>';
    june = '<?php echo $juneVal; ?>';
    july = '<?php echo $julyVal; ?>';
    aug = '<?php echo $augustVal; ?>';
    sep = '<?php echo $sepVal; ?>';
    oct = '<?php echo $octVal; ?>';
    nov = '<?php echo $novVal; ?>';
    dec = '<?php echo $decVal; ?>';

    new Chart(document.getElementById("issuedFineCount"), {
    type: 'bar',
    data: {
      labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
      datasets: [
        {
          label: "Issued fine count",
          backgroundColor: "#d9534f",
          data: [jan,feb,march,april,may,june,july,aug,sep,oct,nov,dec]
        }
      ]
    },
    options: {
        legend: { display: false },
        responsive: true,
        title: {
            display: false,
        },
        animation: {
            duration: 2000,
        },
        maintainAspectRatio: false,
        bezierCurve: false
    }
});
</script>
<!-- 03.Chart => Pending fines and Paid fines amount================================== -->
