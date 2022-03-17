<?php
session_start();
if (isset($_SESSION['license_id']) && isset($_SESSION['driver_email']) && isset($_SESSION['driver_name']) && isset($_SESSION['home_address'])) {
?>



<!DOCTYPE html>
<html>

<head>
    <title>Dashboard | Driver</title>

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
                <a href="pending_fine.php" class="leftsidebar-nav-link">
                    <div>
                        <i class="fas fa-hourglass-half"></i>
                    </div>
                    <span>Driver's Pending Fine</span>
                </a>
            </li>
            <li class="leftsidebar-nav-item">
                <a href="paid_fine.php" class="leftsidebar-nav-link">
                    <div>
                        <i class="fas fa-coins"></i>
                    </div>
                    <span>Driver's Paid Fine</span>
                </a>
            </li>
            <li class="leftsidebar-nav-item">
                <a href="fine_tickets.php" class="leftsidebar-nav-link">
                    <div>
                        <i class="fas fa-receipt"></i>
                    </div>
                    <span>Provision Details</span>
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
            <h6 class="mt-1 badge badge-pill badge-light tag-hover" style="padding: 10px; font-size: 0.75rem;">Account Holder : <a href="profile_details.php"><?php echo $_SESSION['license_id']; ?></a></h6>
            <!--Main four count boxes start here-->
            <div class="row p-2">
                <!--First count box start-->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-xs-12 animated fadeIn">
                    <div data-toggle="tooltip" data-placement="bottom" data-title="Number of fines you have to pay" class="dashcounter color-one p-4 box-hover">
                        <p>
                            <i class="fas fa-bullhorn"></i>
                        </p>
                        <?php
                            include "../connection.php";
                            $license_id = $_SESSION['license_id'];
                            $query = "SELECT ref_no FROM issued_fines WHERE license_id='$license_id' AND status='pending' "; 
                            $query_run = mysqli_query($conn, $query);

                            $row = mysqli_num_rows($query_run);
                            echo '<h3 class="counter">'.$row.'</h3>';
                        ?>
                        <p class="dashcount-name">Pending Fine Count</p>
                    </div>
                </div>
                <!--First count box end-->
                <!--Second count box start-->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-xs-12 animated fadeIn">
                    <div data-toggle="tooltip" data-placement="bottom" data-title="Total fine amount you have to pay" class="dashcounter color-two p-4 box-hover">
                        <p>
                            <i class="fas fa-hourglass-half"></i>
                        </p>
                        <?php
                        include ("../connection.php");
                        $license_id = $_SESSION['license_id'];
                        $query = "SELECT SUM(total_amount) From issued_fines WHERE license_id='$license_id' AND status='pending'";
                        $result = mysqli_query($conn,$query);
                        $row = mysqli_fetch_array($result);
                        $total = $row[0];
                        echo '<h3 class="counter">'.$total.'</h3>';
                        ?>     
                        <p class="dashcount-name">Pending Fine Amount (LKR)</p>
                    </div>
                </div>
                <!--Second count box end-->
                <!--Third count box start-->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-xs-12 animated fadeIn">
                    <div data-toggle="tooltip" data-placement="bottom" data-title="Number of fines you paid" class="dashcounter color-four p-4 box-hover">
                        <p>
                            <i class="fas fa-list-ol"></i>
                        </p>
                        <?php
                            include "../connection.php";
                            $license_id = $_SESSION['license_id'];
                            $query = "SELECT ref_no FROM issued_fines WHERE license_id='$license_id' AND status='paid' "; 
                            $query_run = mysqli_query($conn, $query);

                            $row = mysqli_num_rows($query_run);
                            echo '<h3 class="counter">'.$row.'</h3>';
                        ?>
                        <p class="dashcount-name">Paid Fine Count</p>
                    </div>
                </div>
                <!--Third count box end-->
                <!--Fourth count box start-->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-xs-12 animated fadeIn">
                    <div data-toggle="tooltip" data-placement="bottom" data-title="Total fine amount you paid" class="dashcounter color-three p-4 box-hover">
                        <p>
                            <i class="fas fa-coins"></i>
                        </p>
                        <?php
                        include ("../connection.php");
                        $license_id = $_SESSION['license_id'];
                        $query = "SELECT SUM(total_amount) From issued_fines WHERE license_id='$license_id' AND status='paid'";
                        $result = mysqli_query($conn,$query);
                        $row = mysqli_fetch_array($result);
                        $total = $row[0];
                        echo '<h3 class="counter">'.$total.'</h3>';
                        ?> 
                        <p class="dashcount-name">Paid Fine Amount (LKR)</p>
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
                                Fine Tickets Count <?php echo date("Y");  ?>
                            </h3>
                        </div>
                        <div class="mycard-content">
                            <canvas id="issuedFineCount" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row p-2">
                <div class="col-md-6">
                    <div class="mycard">
                        <div class="mycard-header">
                            <h3 class="mycard-heading-charts">
                                Pending Fine and Paid Fine Amount
                            </h3>
                        </div>
                        <div class="mycard-content">
                            <canvas id="PendingPaidfines" height="200"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mycard">
                        <div class="mycard-header">
                            <h3 class="mycard-heading-charts">
                                Pending Fine Count & Paid Fine Count
                            </h3>
                        </div>
                        <div class="mycard-content">
                            <canvas id="DriverAndTpoCount" height="200"></canvas>
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
            time: 500
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

<!--===========================================================================================================================Charts start here =====================================
========================================================================================-->

<!-- 01.Chart => Pending fines and Paid fines amount================================== -->
<!-- PHP Code goes here -->
<?php
    include ("../connection.php");
    $license_id = $_SESSION['license_id'];
    $result = mysqli_query($conn,"SELECT SUM(total_amount) From issued_fines WHERE license_id='$license_id' AND status='pending'");
    $row = mysqli_fetch_array($result);
    $totalPending = $row[0];
?>
<?php
    include ("../connection.php");
    $license_id = $_SESSION['license_id'];
    $result = mysqli_query($conn,"SELECT SUM(total_amount) From issued_fines WHERE license_id='$license_id' AND status='paid'");
    $row = mysqli_fetch_array($result);
    $totalPaid = $row[0];
?>
<!-- PHP Code end here -->
<!-- doughnut-chart -->
<script>
    pending = '<?php echo $totalPending ?>'
    paid = '<?php echo $totalPaid ?>'
    new Chart(document.getElementById("PendingPaidfines"), {
    type: 'doughnut',
    data: {
      labels: ["Paid Fine Amount (LKR)", "Pending Fine Amount (LKR)"],
      datasets: [
        {
          backgroundColor: ["#431374", "#d46d31"],
          data: [paid, pending]
        }
      ]
    },
    options: {
        responsive: true,
        title: {
            display: false,
        },
        animation: {
            duration: 2000,
        },
        legend: {
            onClick: (e) => e.stopPropagation(),
            position: 'top',
        }
    }
});
</script>
<!-- 01.Chart => Pending fines and Paid fines amount================================== -->


<!-- 02.Chart => Pending fines and Paid fines Count================================== -->
<!-- PHP Code goes here -->
<?php
    include ("../connection.php");
    $license_id = $_SESSION['license_id'];
    $pendingcountQuery = mysqli_query($conn, "SELECT ref_no FROM issued_fines WHERE license_id='$license_id' AND status='pending'");
    $pendingCount = mysqli_num_rows($pendingcountQuery);

    $paidcountQuery = mysqli_query($conn, "SELECT ref_no FROM issued_fines WHERE license_id='$license_id' AND status='paid'");
    $paidCount = mysqli_num_rows($paidcountQuery);
?>
<!-- PHP Code end here -->
<!-- doughnut-chart -->
<script>
    pending = '<?php echo $pendingCount ?>'
    paid = '<?php echo $paidCount ?>'
    new Chart(document.getElementById("DriverAndTpoCount"), {
    type: 'doughnut',
    data: {
      labels: ["Pending Fine Count", "Paid Fine Count"],
      datasets: [
        {
          backgroundColor: ["#e84545", "#1d9e8b"],
          data: [pending, paid]
        }
      ]
    },
    options: {
        responsive: true,
        title: {
            display: false,
        },
        animation: {
            duration: 2000,
        },
        legend: {
            onClick: (e) => e.stopPropagation(),
            position: 'top',
        }
    }
});
</script>
<!-- 02.Chart => Pending fines and Paid fines amount================================== -->


<!-- 03.Chart => Pending fines and Paid fines amount================================== -->
<!-- PHP Code goes here -->
<?php
    include "../connection.php";
    $license_id = $_SESSION['license_id'];
    $year = date("Y");
    $jan = mysqli_query($conn, "SELECT ref_no FROM issued_fines WHERE license_id='$license_id' AND MONTH(issued_date) = 01 AND YEAR(issued_date) = '$year'");
    $janVal = mysqli_num_rows($jan);

    $feb = mysqli_query($conn, "SELECT ref_no FROM issued_fines WHERE license_id='$license_id' AND MONTH(issued_date) = 02 AND YEAR(issued_date) = '$year'");
    $febVal = mysqli_num_rows($feb);

    $march = mysqli_query($conn, "SELECT ref_no FROM issued_fines WHERE license_id='$license_id' AND MONTH(issued_date) = 03 AND YEAR(issued_date) = '$year'");
    $marchVal = mysqli_num_rows($march);

    $april = mysqli_query($conn, "SELECT ref_no FROM issued_fines WHERE license_id='$license_id' AND MONTH(issued_date) = 04 AND YEAR(issued_date) = '$year'");
    $aprilVal = mysqli_num_rows($april);

    $may = mysqli_query($conn, "SELECT ref_no FROM issued_fines WHERE license_id='$license_id' AND MONTH(issued_date) = 05 AND YEAR(issued_date) = '$year'");
    $mayVal = mysqli_num_rows($may);

    $june = mysqli_query($conn, "SELECT ref_no FROM issued_fines WHERE license_id='$license_id' AND MONTH(issued_date) = 06 AND YEAR(issued_date) = '$year'");
    $juneVal = mysqli_num_rows($june);

    $july = mysqli_query($conn, "SELECT ref_no FROM issued_fines WHERE license_id='$license_id' AND MONTH(issued_date) = 07 AND YEAR(issued_date) = '$year'");
    $julyVal = mysqli_num_rows($july);

    $august = mysqli_query($conn, "SELECT ref_no FROM issued_fines WHERE license_id='$license_id' AND MONTH(issued_date) = 08 AND YEAR(issued_date) = '$year'");
    $augustVal = mysqli_num_rows($august);

    $september = mysqli_query($conn, "SELECT ref_no FROM issued_fines WHERE license_id='$license_id' AND MONTH(issued_date) = 09 AND YEAR(issued_date) = '$year'");
    $sepVal = mysqli_num_rows($september);

    $october = mysqli_query($conn, "SELECT ref_no FROM issued_fines WHERE license_id='$license_id' AND MONTH(issued_date) = 10 AND YEAR(issued_date) = '$year'");
    $octVal = mysqli_num_rows($october);

    $november = mysqli_query($conn, "SELECT ref_no FROM issued_fines WHERE license_id='$license_id' AND MONTH(issued_date) = 11 AND YEAR(issued_date) = '$year'");
    $novVal = mysqli_num_rows($november);

    $december = mysqli_query($conn, "SELECT ref_no FROM issued_fines WHERE license_id='$license_id' AND MONTH(issued_date) = 12 AND YEAR(issued_date) = '$year'");
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
    type: 'line',
    data: {
      labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
      datasets: [
        {
          label: "Issued fine count",
          backgroundColor: "#5cb85c",
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


