<?php
session_start();
if (isset($_SESSION['license_id']) && isset($_SESSION['driver_email']) && isset($_SESSION['driver_name']) && isset($_SESSION['home_address'])) {
?>

<?php
 
 include("../connection.php");
 $owner= $_SESSION['license_id'];
 $sql = "SELECT * FROM driver WHERE license_id = '$owner'";
 $res = mysqli_query($conn, $sql);
 ?>
 
<!DOCTYPE html>
<html>

<head>
    <title>Profile Details | Driver</title>

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
                        <i class="fas fa-user"></i> Driver All Details
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
                                <label for="reference_no">License ID</label>
                                <input type="text" class="form-control" id="reference_no" value="<?php echo $row['license_id']; ?>" disabled placeholder="Licence ID" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="vehicle_no">Driver Email</label>
                                <input type="text" class="form-control" id="vehicle_no" placeholder="Driver Email" value="<?php echo $row['driver_email']; ?>" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="license_duration">Driver Name</label>
                                <input type="text" class="form-control" id="vehicle_type" placeholder="Driver Name" value="<?php echo $row['driver_name']; ?>" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="vehicle_owner">Home Address</label>
                                <input type="text" class="form-control" id="fuel_type" placeholder="Home Address" value="<?php echo $row['home_address']; ?>" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="payment_type">License Issue Date</label>
                                <input type="text" class="form-control" id="owner_name" placeholder="License Issue Date" value="<?php echo $row['license_issue_date']; ?>" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="amount">License Expire Date</label>
                                <input type="text" class="form-control" id="owner_address" placeholder="License Expire Date" value="<?php echo $row['license_expire_date']; ?>" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="payment_type">Class of Vehicle</label>
                                <input type="text" class="form-control" id="owner_name" placeholder="Class of Vehicle" value="<?php echo $row['class_of_vehicle']; ?>" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="amount">Registered Date in to System</label>
                                <input type="text" class="form-control" id="owner_address" placeholder="Registered Date in to Syatem" value="<?php echo $row['registered_at']; ?>" disabled>
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
	header("Location: login.php");
	exit();
}
?>

