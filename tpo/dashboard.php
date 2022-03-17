<?php
session_start();
if (isset($_SESSION['police_id']) && isset($_SESSION['officer_email']) && isset($_SESSION['officer_name']) && isset($_SESSION['police_station']) && isset($_SESSION['court'])) {

?>



<!DOCTYPE html>
<html>

<head>
    <title>Dashboard | Traffic Police Officer</title>

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
                <a href="add_new_fine.php" class="leftsidebar-nav-link">
                    <div>
                        <i class="fas fa-plus-circle"></i>
                    </div>
                    <span>Add New Fine</span>
                </a>
            </li>
            <li class="leftsidebar-nav-item">
                <a href="driver_past_fine.php" class="leftsidebar-nav-link">
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
    <div class="dashwrapper animated fadeIn">
        <div class="container-fluid">
            <h6 class="mt-1 badge badge-pill badge-light tag-hover" style="padding: 10px; font-size: 0.75rem;">Police Officer ID : <a href="profile_details.php"><?php echo $_SESSION['police_id']; ?></a></h6>
            <div class="row">
                <div class="col-12 p-3 d-lg-none d-md-block d-sm-block">
                    <a class="btn btn-secondary btn-lg btn-block" href="add_new_fine.php"><span><i style="font-size: 2rem;" class="fas fa-plus-circle"></i> <br>Add New Fine</span></a>
                </div>
                <div class="col-12 p-3 d-lg-none d-md-block d-sm-block">
                    <a class="btn btn-secondary btn-lg btn-block"  href="driver_past_fine.php"><span><i style="font-size: 2rem;" class="fas fa-history"></i> <br>View driver's Past Fine</span></a>
                </div>
                <div class="col-12 p-3 d-lg-none d-md-block d-sm-block">
                    <a class="btn btn-secondary btn-lg btn-block"  href="check_revenue_license.php"><span><i style="font-size: 2rem;" class="fas fa-file-invoice"></i> <br>Check Revenue License</span></a>
                </div>
            </div>    
            <!--Main four count boxes start here-->
            <div class="row p-2">
                <!--First count box start-->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-xs-12 animated fadeIn">
                    <div data-toggle="tooltip" data-placement="bottom" data-title="Reported fine count by you" class="dashcounter color-one p-4 box-hover">
                        <p>
                            <i class="fas fa-flag-checkered"></i>
                        </p>
                        <!--Reported fine count goes here-->
                        <?php
                            include "../connection.php";
                            $police_id = $_SESSION['police_id'];
                            $query = "SELECT ref_no FROM issued_fines WHERE police_id = '$police_id'"; 
                            $query_run = mysqli_query($conn, $query);

                            $row = mysqli_num_rows($query_run);
                            echo '<h3 class="counter">'.$row.'</h3>';
                        ?>
                        <p class="dashcount-name">Reported Fine Count</p>
                    </div>
                </div>
                <!--First count box end-->
                <!--Second count box start-->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-xs-12 animated fadeIn">
                    <div data-toggle="tooltip" data-placement="bottom" data-title="Reported fine amount by you" class="dashcounter color-two p-4 box-hover">
                        <p>
                            <i class="fas fa-coins"></i>
                        </p>
                        <!--Reported fine Total goes here-->
                        <?php
                        include ("../connection.php");
                        $police_id = $_SESSION['police_id'];
                        $query = "SELECT SUM(total_amount) From issued_fines WHERE police_id='$police_id'";
                        $result = mysqli_query($conn,$query);
                        $row = mysqli_fetch_array($result);
                        $total = $row[0];
                        echo '<h3 class="counter">'.$total.'</h3>';
                        ?>       
                        <p class="dashcount-name">Reported Fine Amount (LKR)</p>
                    </div>
                </div>
                <!--Second count box end-->
                <!--Third count box start-->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-xs-12 animated fadeIn">
                    <div data-toggle="tooltip" data-placement="bottom" data-title="Your police station" class="dashcounter color-four p-4 box-hover">
                        <p>
                            <i class="fas fa-warehouse"></i>
                        </p>
                        <h3><?php echo $_SESSION['police_station'] ?></h3>
                        <p class="dashcount-name">Police Station</p>
                    </div>
                </div>
                <!--Third count box end-->
                <!--Fourth count box start-->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-xs-12 animated fadeIn">
                    <div data-toggle="tooltip" data-placement="bottom" data-title="Your court" class="dashcounter color-three p-4 box-hover">
                        <p>
                            <i class="fas fa-balance-scale"></i>
                        </p>
                        <h3><?php echo $_SESSION['court'] ?></h3>
                        <p class="dashcount-name">Court</p>
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
                                Reported Fine Count <?php echo date("Y"); ?>
                            </h3>
                        </div>
                        <div class="mycard-content">
                            <canvas id="reportedFineCount" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row p-2">
                <div class="col-md-12">
                    <div class="mycard">
                        <div class="mycard-header">
                            <h3 class="mycard-heading-charts">
                                Reported Fine Amount <?php echo date("Y"); ?>
                            </h3>
                        </div>
                        <div class="mycard-content">
                            <canvas id="reportedFineAmount" height="300"></canvas>
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
    $police_id = $_SESSION['police_id'];
    $year = date("Y");
    $jan = mysqli_query($conn, "SELECT ref_no FROM issued_fines WHERE police_id = '$police_id' AND MONTH(issued_date) = 01 AND YEAR(issued_date) = '$year'");
    $janVal = mysqli_num_rows($jan);

    $feb = mysqli_query($conn, "SELECT ref_no FROM issued_fines WHERE police_id = '$police_id' AND MONTH(issued_date) = 02 AND YEAR(issued_date) = '$year'");
    $febVal = mysqli_num_rows($feb);

    $march = mysqli_query($conn, "SELECT ref_no FROM issued_fines WHERE police_id = '$police_id' AND MONTH(issued_date) = 03 AND YEAR(issued_date) = '$year'");
    $marchVal = mysqli_num_rows($march);

    $april = mysqli_query($conn, "SELECT ref_no FROM issued_fines WHERE police_id = '$police_id' AND MONTH(issued_date) = 04 AND YEAR(issued_date) = '$year'");
    $aprilVal = mysqli_num_rows($april);

    $may = mysqli_query($conn, "SELECT ref_no FROM issued_fines WHERE police_id = '$police_id' AND MONTH(issued_date) = 05 AND YEAR(issued_date) = '$year'");
    $mayVal = mysqli_num_rows($may);

    $june = mysqli_query($conn, "SELECT ref_no FROM issued_fines WHERE police_id = '$police_id' AND MONTH(issued_date) = 06 AND YEAR(issued_date) = '$year'");
    $juneVal = mysqli_num_rows($june);

    $july = mysqli_query($conn, "SELECT ref_no FROM issued_fines WHERE police_id = '$police_id' AND MONTH(issued_date) = 07 AND YEAR(issued_date) = '$year'");
    $julyVal = mysqli_num_rows($july);

    $august = mysqli_query($conn, "SELECT ref_no FROM issued_fines WHERE police_id = '$police_id' AND MONTH(issued_date) = 08 AND YEAR(issued_date) = '$year'");
    $augustVal = mysqli_num_rows($august);

    $september = mysqli_query($conn, "SELECT ref_no FROM issued_fines WHERE police_id = '$police_id' AND MONTH(issued_date) = 09 AND YEAR(issued_date) = '$year'");
    $sepVal = mysqli_num_rows($september);

    $october = mysqli_query($conn, "SELECT ref_no FROM issued_fines WHERE police_id = '$police_id' AND MONTH(issued_date) = 10 AND YEAR(issued_date) = '$year'");
    $octVal = mysqli_num_rows($october);

    $november = mysqli_query($conn, "SELECT ref_no FROM issued_fines WHERE police_id = '$police_id' AND MONTH(issued_date) = 11 AND YEAR(issued_date) = '$year'");
    $novVal = mysqli_num_rows($november);

    $december = mysqli_query($conn, "SELECT ref_no FROM issued_fines WHERE police_id = '$police_id' AND MONTH(issued_date) = 12 AND YEAR(issued_date) = '$year'");
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

    new Chart(document.getElementById("reportedFineCount"), {
    type: 'line',
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
<!-- 01.Chart => Pending fines and Paid fines amount================================== -->

<!-- 02.Chart => Pending fines and Paid fines amount================================== -->
<!-- PHP Code goes here -->
<?php
    include "../connection.php";
    $police_id = $_SESSION['police_id'];
    $year = date("Y");
    $jan = mysqli_query($conn, "SELECT SUM(total_amount) From issued_fines WHERE police_id='$police_id' AND MONTH(issued_date) = 01 AND YEAR(issued_date) = '$year'");
    $janVal = mysqli_fetch_array($jan);
    $janTotal = $janVal[0];

    $feb = mysqli_query($conn, "SELECT SUM(total_amount) From issued_fines WHERE police_id='$police_id' AND MONTH(issued_date) = 02 AND YEAR(issued_date) = '$year'");
    $febVal = mysqli_fetch_array($feb);
    $febTotal = $febVal[0];

    $march = mysqli_query($conn, "SELECT SUM(total_amount) From issued_fines WHERE police_id='$police_id' AND MONTH(issued_date) = 03 AND YEAR(issued_date) = '$year'");
    $marchVal = mysqli_fetch_array($march);
    $marchTotal = $marchVal[0];

    $april = mysqli_query($conn, "SELECT SUM(total_amount) From issued_fines WHERE police_id='$police_id' AND MONTH(issued_date) = 04 AND YEAR(issued_date) = '$year'");
    $aprilVal = mysqli_fetch_array($april);
    $aprilTotal = $aprilVal[0];

    $may = mysqli_query($conn, "SELECT SUM(total_amount) From issued_fines WHERE police_id='$police_id' AND MONTH(issued_date) = 05 AND YEAR(issued_date) = '$year'");
    $mayVal = mysqli_fetch_array($may);
    $mayTotal = $mayVal[0];

    $june = mysqli_query($conn, "SELECT SUM(total_amount) From issued_fines WHERE police_id='$police_id' AND MONTH(issued_date) = 06 AND YEAR(issued_date) = '$year'");
    $juneVal = mysqli_fetch_array($june);
    $juneTotal = $juneVal[0];

    $july = mysqli_query($conn, "SELECT SUM(total_amount) From issued_fines WHERE police_id='$police_id' AND MONTH(issued_date) = 07 AND YEAR(issued_date) = '$year'");
    $julyVal = mysqli_fetch_array($july);
    $julyTotal = $julyVal[0];

    $august = mysqli_query($conn, "SELECT SUM(total_amount) From issued_fines WHERE police_id='$police_id' AND MONTH(issued_date) = 08 AND YEAR(issued_date) = '$year'");
    $augustVal = mysqli_fetch_array($august);
    $augustTotal = $augustVal[0];

    $september = mysqli_query($conn, "SELECT SUM(total_amount) From issued_fines WHERE police_id='$police_id' AND MONTH(issued_date) = 09 AND YEAR(issued_date) = '$year'");
    $sepVal = mysqli_fetch_array($september);
    $sepTotal = $sepVal[0];

    $october = mysqli_query($conn, "SELECT SUM(total_amount) From issued_fines WHERE police_id='$police_id' AND MONTH(issued_date) = 10 AND YEAR(issued_date) = '$year'");
    $octVal = mysqli_fetch_array($october);
    $octTotal = $octVal[0];

    $november = mysqli_query($conn, "SELECT SUM(total_amount) From issued_fines WHERE police_id='$police_id' AND MONTH(issued_date) = 11 AND YEAR(issued_date) = '$year'");
    $novVal = mysqli_fetch_array($november);
    $novTotal = $novVal[0];

    $december = mysqli_query($conn, "SELECT SUM(total_amount) From issued_fines WHERE police_id='$police_id' AND MONTH(issued_date) = 12 AND YEAR(issued_date) = '$year'");
    $decVal = mysqli_fetch_array($december);
    $decTotal = $decVal[0];
?>

<!-- PHP Code end here -->
<!-- bar chart -->
<Script>
    jan = '<?php echo $janTotal; ?>';
    feb = '<?php echo $febTotal; ?>';
    march = '<?php echo $marchTotal; ?>';
    april = '<?php echo $aprilTotal; ?>';
    may = '<?php echo $mayTotal; ?>';
    june = '<?php echo $juneTotal; ?>';
    july = '<?php echo $julyTotal; ?>';
    aug = '<?php echo $augustTotal; ?>';
    sep = '<?php echo $sepTotal; ?>';
    oct = '<?php echo $octTotal; ?>';
    nov = '<?php echo $novTotal; ?>';
    dec = '<?php echo $decTotal; ?>';

    new Chart(document.getElementById("reportedFineAmount"), {
    type: 'bar',
    data: {
      labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
      datasets: [
        {
          label: "Issued fine count",
          backgroundColor: "#d46d31",
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
<!-- 02.Chart => Pending fines and Paid fines amount================================== -->
