<!----------------------------------------------Provision dropdown goes here ---------------------------------------------------------->
<?php
include "../connection.php";
$query= "SELECT * FROM fine_tickets";
	$result_set = mysqli_query($conn, $query);

	$province_list = "";
	while ( $result = mysqli_fetch_assoc($result_set) ) {
		$province_list .= "<option value=\"{$result['fine_id']}\">{$result['fine_id']}</option>";
	}
?>
<!----------------------------------------------Provision dropdown goes here ---------------------------------------------------------->
<?php


session_start();
if (isset($_SESSION['police_id']) && isset($_SESSION['officer_email']) && isset($_SESSION['officer_name']) && isset($_SESSION['police_station']) && isset($_SESSION['court'])) {
include "../connection.php";
error_reporting(0);

//------------------------------------------------Search function goes here -------------------------------------------------------------
if (isset($_POST['search']))
{
	$dlno=$_POST['licenseid'];
		
	if(empty($dlno)){
        header("Location: add_new_fine.php?error=License ID search required!");
        exit();
    }
    else{
        $sql=mysqli_query($conn,"select * from driver where license_id='$dlno'");
		
		if(mysqli_num_rows($sql))
		{
		$res=mysqli_fetch_assoc($sql);
		
		}
		else
		{
            header("Location: add_new_fine.php?error= Invalid License ID!");
			exit();
		} 
    }	
}
//--------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------issue fine code goes here ---------------------------------------------------------------


	if(isset($_POST['issuefine'])){


	$license = $_POST['license'];
	$drivername = $_POST['drivername'];
	$homeaddress = $_POST['homeaddress'];
	$classofvehicle = $_POST['classofvehicle'];
	$policeid = $_POST['policeid'];
	$officername = $_POST['officername'];
	$policestation = $_POST['policestation'];
    $court = $_POST['court'];
    $issuedate = $_POST['issuedate'];
    $issuetime = $_POST['issuetime'];
    $expiredate = $_POST['expiredate'];
    $courtdate = $_POST['courtdate'];
    $place = $_POST['place'];
    $vehicleno = $_POST['vehicleno'];
    $provisions = $_POST['provisions'];
    $fineamount = $_POST['district'];

    $user_data = 'license='. $license. '&drivername='. $drivername. '&homeaddress='. $homeaddress. '&classofvehicle='. $classofvehicle. '&place='. $place ;
	
	if (empty($license)) {
		header("Location: add_new_fine.php?error=Please Search Licence ID&$user_data");
	    exit();
	}else if(empty($drivername)){
        header("Location: add_new_fine.php?error=Please Search Licence ID&$user_data");
	    exit();
	}	
	else if(empty($homeaddress)){
        header("Location: add_new_fine.php?error=Please Search Licence ID&$user_data");
        exit();
    }
    else if(empty($classofvehicle)){
        header("Location: add_new_fine.php?error=Please Search Licence ID&$user_data");
        exit();
    }
    else if(empty($place)){
        header("Location: add_new_fine.php?error=Place is required!&$user_data");
        exit();
    }
    else if(empty($vehicleno)){
        header("Location: add_new_fine.php?error=Vehicle Number is required!&$user_data");
        exit();
    }
    else if(empty($provisions)){
        header("Location: add_new_fine.php?error=Provisions is required!&$user_data");
        exit();
    }
    else
     {
        // echo $license."<br>";
        // echo $drivername."<br>";
        //  echo $place."<br>";
        //  echo $vehicleno."<br>";
        //  echo $classofvehicle."<br>";
        //  echo $issuedate."<br>";
        //  echo $provisions."<br>";
        //  echo $fineamount."<br>";
        // echo $policeid."<br>";
        //  echo $issuetime."<br>";
        //  echo $courtdate."<br>";

        include "../connection.php";
		$sql2 = "INSERT INTO issued_fines(police_id, license_id, vehicle_no, class_of_vehicle, place, issued_date, issued_time, expire_date, court, court_date, provisions, total_amount, status, paid_date)VALUES('$policeid', '$license', '$vehicleno', '$classofvehicle', '$place', '$issuedate', '$issuetime', '$expiredate', '$court', '$courtdate', '$provisions', '$fineamount', 'pending', NOW())";
		$result2 = mysqli_query($conn, $sql2);
		if ($result2) {
			header("Location: add_new_fine.php?success=Added Successfully");
			exit();
		}else {
			header("Location: add_new_fine.php?error=Unknown error occurred!");
			exit();
}
		}
}
//---------------------------------------------------------------------------------------------------------------------------------
?>



<!DOCTYPE html>
<html>

<head>
    <title>Add New Fine | Traffic Police Officer</title>

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
                <a href="add_new_fine.php" class="leftsidebar-nav-link active">
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
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="container-fluid">
                <h1 class="mt-4">Add New Fine</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Add New Fine</li>
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
                        
                    <form action="" method="POST">
                    <h3>Search Driver Details</h3>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="licenseid" id="license_id" placeholder="Driving Licence No">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2" name="search"><i class="fas fa-search"></i> Search</button>

                    

                <h3 class="mt-4">Driver Details</h3>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="driver_name">Licence ID</label>
                        <input type="text" class="form-control" id="driver_name"  value="<?php echo $res['license_id']?>" name="licensed" placeholder="Licence ID" disabled>
                        <input type="hidden" class="form-control" id="driver_name"  value="<?php echo $res['license_id']?>" name="license" placeholder="Licence ID">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="home_address">Driver Full Name</label>
                        <input type="text" class="form-control" id="home_address" value="<?php echo $res['driver_name']; ?>" name="drivernamed"  placeholder="Driver Full Name" disabled>
                        <input type="hidden" class="form-control" id="home_address" value="<?php echo $res['driver_name']; ?>" name="drivername"  placeholder="Driver Full Name" >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="class_of_vehicle">Driver Address</label>
                        <input type="text" class="form-control" id="class_of_vehicle" value="<?php echo $res['home_address']; ?>" name="homeaddressd"  placeholder="Driver Address" disabled>
                        <input type="hidden" class="form-control" id="class_of_vehicle" value="<?php echo $res['home_address']; ?>" name="homeaddress"  placeholder="Driver Address">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="home_address">Class of Vehicle</label>
                        <input type="text" class="form-control" id="home_address" value="<?php echo $res['class_of_vehicle']; ?>" name="classofvehicled"  placeholder="Example: A1, A, B1, B, C1, C,...etc" disabled>
                        <input type="hidden" class="form-control" id="home_address" value="<?php echo $res['class_of_vehicle']; ?>" name="classofvehicle"  placeholder="Example: A1, A, B1, B, C1, C,...etc">
                    </div>
                </div>


                <h3 class="mt-4">Police Officer Details</h3>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="officer_id">Police Officer ID</label>
                        <input type="text" class="form-control" value="<?php echo $_SESSION["police_id"]; ?>" id="officer_id" name="policeidd" placeholder="Police Officer ID" disabled>
                        <input type="hidden" class="form-control" value="<?php echo $_SESSION["police_id"]; ?>" id="officer_id" name="policeid" placeholder="Police Officer ID">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="officer_name">Police Officer Name</label>
                        <input type="text" class="form-control" id="officer_name" value="<?php echo $_SESSION["officer_name"]; ?>" name="officernamed" placeholder="Police Officer Name" disabled>
                        <input type="hidden" class="form-control" id="officer_name" value="<?php echo $_SESSION["officer_name"]; ?>" name="officername" placeholder="Police Officer Name">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="police_station">Police Station</label>
                        <input type="text" class="form-control" id="police_station" value="<?php echo $_SESSION["police_station"]; ?>" name="policestationd" placeholder="Police Station" disabled>
                        <input type="hidden" class="form-control" id="police_station" value="<?php echo $_SESSION["police_station"]; ?>" name="policestation" placeholder="Police Station">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="court">Court</label>
                        <input type="text" class="form-control" id="court" placeholder="Courtd" value="<?php echo $_SESSION["court"]; ?>" name="court" disabled>
                        <input type="hidden" class="form-control" id="court" placeholder="Court" value="<?php echo $_SESSION["court"]; ?>" name="court">
                    </div>
                </div>

                <h3 class="mt-4">Dates & Time</h3>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="issue_date">Issue Date</label>
                        <input type="date" class="form-control" id="issue_date" value="<?php echo date('Y-m-d') ?>" name="issuedated" placeholder="Issue Date" disabled>
                        <input type="hidden" class="form-control" id="issue_date" value="<?php echo date('Y-m-d') ?>" name="issuedate" placeholder="Issue Date">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="issue_time">Issue Time</label>
                        <input type="time" class="form-control" id="issue_time" value="<?php echo date("h:i:s") ?>" name="issuetimed" placeholder="Issue Time" disabled>
                        <input type="hidden" class="form-control" id="issue_time" value="<?php echo date("h:i:s") ?>" name="issuetime" placeholder="Issue Time">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="expire_date">Expire Date</label>
                        <input type="date" class="form-control" id="expire_date" value="<?php echo date('Y-m-d', strtotime("+21 days")); ?>" name="expiredated" placeholder="Expire Date" disabled>
                        <input type="hidden" class="form-control" id="expire_date" value="<?php echo date('Y-m-d', strtotime("+21 days")); ?>" name="expiredate" placeholder="Expire Date">
                </div>
                <div class="form-group col-md-6">
                        <label for="court_date">Court Date</label>
                        <input type="date" class="form-control" id="court_date" value="<?php echo date('Y-m-d', strtotime("+21 days")); ?>" name="courtdated" placeholder="Court Date" disabled>
                        <input type="hidden" class="form-control" id="court_date" value="<?php echo date('Y-m-d', strtotime("+21 days")); ?>" name="courtdate" placeholder="Court Date">
                </div>
            </div>
            <h3 class="mt-5">Fine Information</h3>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="place">Place</label>
                            <input type="text" class="form-control" id="place" value="<?php echo (isset($_GET['place']))? $_GET['place'] : ''; ?>" name="place" placeholder="Place">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="vehicle_no">Vehicle No</label>
                            <input type="text" class="form-control" id="vehicle_no" value="<?php echo (isset($_GET['vehicleno']))? $_GET['vehicleno'] : ''; ?>" name="vehicleno" placeholder="Vehicle No">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="province">Select Provision</label>
                            <select class="form-control custom-select" name="province" id="province" onchange="fineselect();">
                            <option>Please Select Provision</option>
				                <?php echo $province_list; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="district">Total Fine Amount</label>
                            <select class="form-control custom-select" name="district" id="district">
                            <option>Amount</option>
				               
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="hidden" class="form-control" id="provision" name="provisions" value="<?php echo (isset($_GET['provisions']))? $_GET['provisions'] : ''; ?>" placeholder="Provision">  
                        </div>
                    </div>



            <!--<h3 class="mt-4">Total Fine Amount</h3>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="expire_date">Total Fine Amount</label>
                    <input type="text" class="form-control" id="fine_amount" name="total" placeholder="Amount in LKR" disabled>
                </div>
            </div>-->

                <button type="submit" class="btn btn-primary" name="issuefine"><i class="fas fa-plus-circle"></i> Issue Fine</button>
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



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
	<script>
		
	</script>
	<script>
		$(document).ready(function(){
			$("#province").on("change", function(){
				var provinceId = $("#province").val();
				var getURL     = "get-amount.php?fine_id=" + provinceId;
				$.get(getURL, function(data, status){
					$("#district").html(data);
				});
			});
/*
			$("#district").on("change", function(){
				var districtId = $("#district").val();
				var getURL     = "get-div-sec.php?district_id=" + districtId;
				$.get(getURL, function(data, status){
					$("#div_sec").html(data);
				});
			});*/
		});
        function fineselect() {
			var d=document.getElementById("province");
			var displaytext=d.options[d.selectedIndex].text;
			document.getElementById("provision").value=displaytext;
		}
		
	</script>
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
