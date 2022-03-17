<?php
session_start();
if (isset($_SESSION['police_id']) && isset($_SESSION['officer_email']) && isset($_SESSION['officer_name']) && isset($_SESSION['police_station']) && isset($_SESSION['court'])) {

?>


<?php


include "../connection.php";
error_reporting(0);
if (isset($_POST['search']))
{
	$dlno=$_POST['vehicle'];
		
	if(empty($dlno)){
        header("Location: check_revenue_license.php?error=Vehicle Number is required!");
        exit();
    }
    else{
        $sql=mysqli_query($conn,"select * from revenue_license where vehicle_no='$dlno'");
		
		if(mysqli_num_rows($sql))
		{
		$res=mysqli_fetch_assoc($sql);
		
		}
		else
		{
            header("Location: check_revenue_license.php?error= Invalid Vehicle Number!");
			exit();
		} 
    }	
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Revenue License | Traffic Police Officer</title>

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
                <a href="check_revenue_license.php" class="leftsidebar-nav-link active">
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
                <h1 class="mt-4">Revenue License</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Revenue License</li>
                </ol>
                <!--Warning msg goes here-->
				<?php if (isset($_GET['error'])) { ?>
						<div class="alert alert-danger" id="success-alert">
						<i class="fas fa-exclamation-circle"></i>
						<?php echo $_GET['error']; ?>
						<button type="button" class="close" data-dismiss="alert">&times;</button>
					</div>
				<?php } ?>
                <!--Warning msg end-->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i> Details related to the vehicle
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <!--View all drivers table includes goes here-->
                            <div class="card-body mobilePaading">

                            <form action="" method="POST">
                            <h3>Search Vehicle Details</h3>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="vehicle" id="license_id" placeholder="Vehicle No">
                                </div>
                            </div>
                                <button type="submit" class="btn btn-primary mb-2" name="search"><i class="fas fa-search"></i> Search</button>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="reference_no">Reference No</label>
                                <input type="text" class="form-control" id="reference_no" value="<?php echo $res['reference_no']; ?>" disabled placeholder="Reference No" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="vehicle_no">Vehicle No</label>
                                <input type="text" class="form-control" id="vehicle_no" placeholder="Vehicle No" value="<?php echo $res['vehicle_no']; ?>" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="license_duration">Vehicle Type</label>
                                <input type="text" class="form-control" id="vehicle_type" placeholder="Vehicle Type" value="<?php echo $res['vehicle_type']; ?>" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="vehicle_owner">Fuel Type</label>
                                <input type="text" class="form-control" id="fuel_type" placeholder="Fuel Type" value="<?php echo $res['fuel_type']; ?>" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="payment_type">Owner Name</label>
                                <input type="text" class="form-control" id="owner_name" placeholder="Owner Name" value="<?php echo $res['owner_name']; ?>" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="amount">Owner Address</label>
                                <input type="text" class="form-control" id="owner_address" placeholder="Owner Address" value="<?php echo $res['owner_address']; ?>" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="payment_type">Issue Date</label>
                                <input type="text" class="form-control" id="issue_date" placeholder="Issue Date" value="<?php echo $res['issue_date']; ?>" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="amount">Expire Date</label>
                                <input type="text" class="form-control" id="expire_date" placeholder="Expire Date" value="<?php echo $res['expire_date']; ?>" disabled>
                            </div>
                        </div>
                        
                                </form>
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

