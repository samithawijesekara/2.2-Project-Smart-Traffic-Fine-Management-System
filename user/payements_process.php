<?php
session_start();
if (isset($_SESSION['license_id']) && isset($_SESSION['driver_email']) && isset($_SESSION['driver_name']) && isset($_SESSION['home_address'])) {
?>


<?php

	$ref_id = $_GET['ref_no'];  
	include("../connection.php");
    $sql = "SELECT * FROM issued_fines WHERE ref_no = '$ref_id'";
    $res = mysqli_query($conn, $sql);

 ?>


<!DOCTYPE html>
<html>

<head>
    <title>Fine Payment Process</title>

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


    <!--==================================================================================================================================SECTION_03====================================================================================================================================-->

    <!-- Dashboard main content start here =================================================-->
    <div class="reciptwrapper animated fadeIn mt-2">
        <div class="container-fluid d-flex align-items-center justify-content-center">
            <div class="col-md-6">
                <div class="mycard">
                    <div class="mycard-header">
                        <h3 class="mt-4 recipt-head" style="text-transform: uppercase; font-size: 26px; font-weight: 700; text-align: center; letter-spacing: 2px;">
                            Pay your fine ticket through online
                        </h3>
                        <hr>
                        <?php while($row = mysqli_fetch_array($res)){
                            ?>
                        <h6 class="mycard-heading-charts mt-4" style="font-size: 14px; float: left;">
                            Reference No : <span style="font-weight: 600;"><?php echo $row['ref_no']; ?></span>
                        </h6>
                        <div class="table-responsive-md">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="ExtraPaading">License ID</td>
                                        <td><?php echo $row['license_id']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="ExtraPaading">Driver Name</td>
                                        <td><?php echo $_SESSION['driver_name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="ExtraPaading">Class of Vehicle</td>
                                        <td><?php echo $row['class_of_vehicle']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="ExtraPaading">Provision</td>
                                        <td><?php echo $row['provisions']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="ExtraPaading">Vehicle No</td>
                                        <td><?php echo $row['vehicle_no']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="ExtraPaading">Place</td>
                                        <td><?php echo $row['place']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="ExtraPaading">Issue Date</td>
                                        <td><?php echo $row['issued_date']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="ExtraPaading">Issue Time</td>
                                        <td><?php echo $row['issued_time']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="ExtraPaading">Expire Date</td>
                                        <td><?php echo $row['expire_date']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="ExtraPaading">Court Date</td>
                                        <td><?php echo $row['court_date']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="ExtraPaading">Court</td>
                                        <td><?php echo $row['court']; ?></td>
                                    </tr>
                                    <tfooter>
                                        <tr style="font-weight: 700; background-color: #c2c2c2;">
                                            <td class="ExtraPaading">Total Amount</td>
                                            <td><?php echo $row['total_amount']; ?> LKR</td>
                                        </tr>
                                    </tfooter>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <form method="post" action="https://sandbox.payhere.lk/pay/checkout">
                        <div class="model-footer text-right mr-4 mt-4">
                            <a href="pending_fine.php"><span class="btn btn-secondary">Cancel</span></a>		
                            <input type="submit" value="Confirm Pay" class="btn btn-primary">
                        </div> 
                    <input type="hidden" name="merchant_id" value="1217671">    <!-- Replace your Merchant ID -->
                    <input type="hidden" name="return_url" value="https://www.stfms.techbirdlabs.com/user/payements_thankyou">
                    <input type="hidden" name="cancel_url" value="https://www.stfms.techbirdlabs.com/user/pending_fine">
                    <input type="hidden" name="notify_url" value="https://www.stfms.techbirdlabs.com/user/notify">  
                    <input type="hidden" name="order_id" value="<?php echo $ref_id; ?>">
                    <input type="hidden" name="items" value="<?php echo $row['provisions']; ?>"><br>
                    <input type="hidden" name="currency" value="LKR">
                    <input type="hidden" name="amount" value="<?php echo $row['total_amount']; ?>">  
                    <input type="hidden" name="first_name" value="Driver">
                    <input type="hidden" name="last_name" value="<?php echo $row['license_id']; ?>"><br>
                    <input type="hidden" name="email" value="<?php echo $row['license_id']; ?>@gmail.com">
                    <input type="hidden" name="phone" value="0714590249"><br>
                    <input type="hidden" name="address" value="Smart Traffic Fine Management System">
                    <input type="hidden" name="city" value="Colombo">
                    <input type="hidden" name="country" value="Sri Lanka"><br><br>      
                </form>
                <?php
                }?>
            </div>
        </div>
    </div>
    <!-- Dashboard main content end here ========================================-->


    <!--Javascripts includes goes here-->
    <?php 
        include '../includes/footer.php';
    ?>


</body>

</html>

<?php
}else{ 
	header("Location: login.php");
	exit();
}
?>


