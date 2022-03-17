<?php
include "../connection.php";

session_start();
if (isset($_SESSION['mtd_id']) && isset($_SESSION['mtd_email'])) {
?>


<!DOCTYPE html>
<html>

<head>
    <title>Add Driver | Motor Traffic Department</title>

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
                <a href="add_driver.php" class="leftsidebar-nav-link active">
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
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="container-fluid">
                <h1 class="mt-4">Add Driver</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Add Driver</li>
                </ol>
                <!--Warning msg goes here-->
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
                <div class="card mb-4">
                    <div class="card-body p-lg-5">
                    <form action="add_driver_action" method="POST">
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="license_id">License ID</label>

                                <!--If fill this textbox when click submit button this not erase -->
                                <?php if (isset($_GET['licenseid'])) { ?>
                                <input type="text"
		                                class="form-control" 
		                                id="license_id"
                                        name="licenseid" 
                                        placeholder="License ID"
                                        value="<?php echo $_GET['licenseid']; ?>"><br>
                                <?php }else{ ?>
                                        <input type="text" 
		                                class="form-control" 
		                                id="license_id"
                                        name="licenseid" 
                                        placeholder="License ID"><br>
                                <?php }?>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="driver_email">Driver Email</label>
                                <?php if (isset($_GET['driveremail'])) { ?>
                                <input type="text"
		                                class="form-control" 
		                                id="driver_email"
                                        name="driveremail" 
                                        placeholder="Driver Email"
                                        value="<?php echo $_GET['driveremail']; ?>"><br>
                                <?php }else{ ?>
                                        <input type="text" 
		                                class="form-control" 
		                                id="driver_email"
                                        name="driveremail" 
                                        placeholder="Driver Email"><br>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="driver_password">Driver Password</label>
                                <input type="password" class="form-control" id="driver_password" name="driverpassword" placeholder="Driver Password">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="driver_password_confirm">Confirm Password</label>
                                <input type="password" class="form-control" id="driver_password_confirm" name="cdriverpassword" placeholder="Confirm Password">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="driver_name">Driver Full Name</label>
                                <!-- Already added data get back when click submit button -->
                                <?php if (isset($_GET['drivername'])) { ?>
                                <input type="text"
		                                class="form-control" 
		                                id="driver_name"
                                        name="drivername" 
                                        placeholder="Driver Full Name"
                                        value="<?php echo $_GET['drivername']; ?>"><br>
                                <?php }else{ ?>
                                        <input type="text" 
		                                class="form-control" 
		                                id="driver_name"
                                        name="drivername" 
                                        placeholder="Driver Full Name"><br>
                                <?php }?>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="class_of_vehicle">Class of Vehicle</label>
                                <!-- Already added data get back when click submit button -->
                                <?php if (isset($_GET['classofvehicle'])) { ?>
                                <input type="text"
		                                class="form-control" 
		                                id="class_of_vehicle"
                                        name="classofvehicle" 
                                        placeholder="Example: A1, A, B1, B, C1, C,...etc"
                                        value="<?php echo $_GET['classofvehicle']; ?>"><br>
                                <?php }else{ ?>
                                        <input type="text" 
		                                class="form-control" 
		                                id="class_of_vehicle"
                                        name="classofvehicle" 
                                        placeholder="Example: A1, A, B1, B, C1, C,...etc"><br>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="home_address">Driver Address</label>
                            <!-- Already added data get back when click submit button -->
                            <?php if (isset($_GET['homeaddress'])) { ?>
                                <input type="text"
		                                class="form-control" 
		                                id="home_address"
                                        name="homeaddress" 
                                        placeholder="Driver Address"
                                        value="<?php echo $_GET['homeaddress']; ?>"><br>
                                <?php }else{ ?>
                                        <input type="text" 
		                                class="form-control" 
		                                id="home_address"
                                        name="homeaddress" 
                                        placeholder="Driver Address"><br>
                                <?php }?>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="license_issue_date">License Issue Date</label>
                                <!-- Already added data get back when click submit button -->
                                <?php if (isset($_GET['licenseissuedate'])) { ?>
                                <input type="date"
		                                class="form-control" 
		                                id="license_issue_date"
                                        name="licenseissuedate" 
                                        value="<?php echo $_GET['licenseissuedate']; ?>"><br>
                                <?php }else{ ?>
                                        <input type="date" 
		                                class="form-control" 
		                                id="license_issue_date"
                                        name="licenseissuedate"><br>
                                <?php }?>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="license_expire_date">License Expire Date</label>
                                <!-- Already added data get back when click submit button -->
                                <?php if (isset($_GET['licenseexpiredate'])) { ?>
                                <input type="date"
		                                class="form-control" 
		                                id="license_expire_date"
                                        name="licenseexpiredate" 
                                        value="<?php echo $_GET['licenseexpiredate']; ?>"><br>
                                <?php }else{ ?>
                                        <input type="date" 
		                                class="form-control" 
		                                id="license_expire_date"
                                        name="licenseexpiredate"><br>
                                <?php }?>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="registered_date">Registered Date</label>
                                <input type="date" class="form-control" id="registered_date" name="registereddate" value="<?php echo date("Y-m-d") ?>" disabled>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-user-plus"></i> Add Driver</button>
                    </form>
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
