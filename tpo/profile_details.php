<?php
session_start();
if (isset($_SESSION['police_id']) && isset($_SESSION['officer_email']) && isset($_SESSION['officer_name']) && isset($_SESSION['police_station']) && isset($_SESSION['court'])) {

?>
<?php
 
include("../connection.php");
$owner= $_SESSION['police_id'];
$sql = "SELECT * FROM tpo WHERE police_id = '$owner'";
$res = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Profile Details | Traffic Police Officer</title>

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
    <div class="dashwrapper">
            <div class="container-fluid">
            <h1 class="mt-4">Account Holder Details</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Profile Details</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-user"></i> Police Officer All Details
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <!--View all drivers table includes goes here-->
                            <div class="card-body">
                            <?php while($row = mysqli_fetch_array($res)){
                            ?>
                            <form action="" method="POST">
                            <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="reference_no">Police ID</label>
                                <input type="text" class="form-control" id="reference_no" value="<?php echo $row['police_id']; ?>" disabled placeholder="Officer ID" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="vehicle_no">Office Name</label>
                                <input type="text" class="form-control" id="vehicle_no" placeholder="Officer Name" value="<?php echo $row['officer_name']; ?>" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="license_duration">Email</label>
                                <input type="text" class="form-control" id="vehicle_type" placeholder="Officer Email" value="<?php echo $row['officer_email']; ?>" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="vehicle_owner">Police Station</label>
                                <input type="text" class="form-control" id="fuel_type" placeholder="Police Station" value="<?php echo $row['police_station']; ?>" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="payment_type">Court</label>
                                <input type="text" class="form-control" id="owner_name" placeholder="Court" value="<?php echo $row['court']; ?>" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="amount">Registered Date</label>
                                <input type="text" class="form-control" id="owner_address" placeholder="Registered Date" value="<?php echo $row['registered_at']; ?>" disabled>
                            </div>
                        </div>
                                </form>
                                <?php
                                }?>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- Dashboard main content end here ========================================-->


    <!--Javascripts includes goes here-->
    <?php 
        include '../includes/footer.php';
    ?>


    <script type="text/javascript" language="javascript" src="../assets/vendors/bootstrap/bootstrap.min.js"></script>
    <script>
    	//To close the success & error alert with slide up animation
	$("#success-alert").delay(4000).fadeTo(2000, 500).slideUp(1000, function(){
    	$("#success-alert").slideUp(1000);
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

