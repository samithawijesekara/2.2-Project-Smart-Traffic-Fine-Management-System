<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['admin_email'])) {
?>


<!DOCTYPE html>
<html>

<head>
    <title>Add Traffic Officer | Traffic Police Admin</title>

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
                <a href="add_traffic_officer.php" class="leftsidebar-nav-link active">
                    <div>
                        <i class="fas fa-address-card"></i>
                    </div>
                    <span>Add Traffic Officer</span>
                </a>
            </li>
            <li class="leftsidebar-nav-item">
                <a href="view_all_traffic_officers.php" class="leftsidebar-nav-link">
                    <div>
                        <i class="fas fa-users-cog"></i>
                    </div>
                    <span>View All Traffic Officers</span>
                </a>
            </li>
            <li class="leftsidebar-nav-item">
                <a href="mtd_account.php" class="leftsidebar-nav-link">
                    <div>
                        <i class="fas fa-building"></i>
                    </div>
                    <span>MTD Account</span>
                </a>
            </li>
            <li class="leftsidebar-nav-item">
                <a href="fine_tickets.php" class="leftsidebar-nav-link">
                    <div>
                        <i class="fas fa-receipt"></i>
                    </div>
                    <span>Provisions Details</span>
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
            <li class="leftsidebar-nav-item">
                <a href="paid_fine_tickets.php" class="leftsidebar-nav-link">
                    <div>
                        <i class="fas fa-check-double"></i>
                    </div>
                    <span>Paid Fine Tickets</span>
                </a>
            </li>
            <li class="leftsidebar-nav-item">
                <a href="pending_fine_tickets.php" class="leftsidebar-nav-link">
                    <div>
                        <i class="fas fa-pause"></i>
                    </div>
                    <span>Pending Fine Tickets</span>
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
                <h1 class="mt-4">Add Traffic Officer</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Add Traffic Officer</li>
                </ol>
				
				<!--Add driver form status goes here, success or error-->
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
                
				<!--Add driver form includes goes here-->
				<div class="card mb-4">
					<div class="card-body p-lg-5">
						<form action="add_traffic_officer_action" method="POST">
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="officer_id">Traffic Officer ID</label>
									<input type="text" class="form-control" id="officer_id" name="officerid" value="<?php echo (isset($_GET['officerid']))? $_GET['officerid'] : ''; ?>" placeholder="Traffic Officer ID" >
								</div>
								<div class="form-group col-md-6">
									<label for="officer_email">Traffic Officer Email</label>
									<input type="email" class="form-control" id="officer_email" name="officeremail" value="<?php echo (isset($_GET['officeremail']))? $_GET['officeremail'] : ''; ?>" placeholder="Traffic Officer Email" >
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="officer_password">Traffic Officer Password</label>
									<input type="password" class="form-control" id="officer_password" name="officerpassword" value="" placeholder="Driver Password" >
								</div>
								<div class="form-group col-md-6">
									<label for="officer_password_confirm">Confirm Password</label>
									<input type="password" class="form-control" id="officer_password_confirm" name="officerpasswordconfirm" value="" placeholder="Confirm Password" >
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="officer_name">Traffic Officer Name</label>
									<input type="text" class="form-control" id="officer_name" name="officername" value="<?php echo (isset($_GET['officername']))? $_GET['officername'] : ''; ?>" placeholder="Traffic Officer Name" >
								</div>
								<div class="form-group col-md-6">
									<label for="police_station">Police Station</label>
									<input type="text" class="form-control" id="police_station" name="policestation" value="<?php echo (isset($_GET['policestation']))? $_GET['policestation'] : ''; ?>" placeholder="Police Station" >
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="court">Court</label>
									<input type="text" class="form-control" id="court" name="tpocourt" value="<?php echo (isset($_GET['tpocourt']))? $_GET['tpocourt'] : ''; ?>" placeholder="Court" >
								</div>
								<div class="form-group col-md-6">
									<label for="registered_date">Registered Date</label>
									<input type="date" class="form-control" id="registered_date" value="<?php echo date("Y-m-d") ?>" disabled >
								</div>
							</div>
							<button type="submit" name="add-tpo-submit" class="btn btn-primary">Add Traffic Officer</button>
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