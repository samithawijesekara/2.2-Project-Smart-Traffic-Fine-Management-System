<?php
if (isset($_SESSION['police_id']) && isset($_SESSION['officer_email']) && isset($_SESSION['officer_name']) && isset($_SESSION['police_station']) && isset($_SESSION['court'])) {

?>

<table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Reference No</th>
            <th>Driving License No</th>
            <th>Provision</th>
            <th>Vehicle No</th>
            <th>Total Amount</th>
            <th>Issue Date</th>          
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Reference No</th>
            <th>Driving License No</th>
            <th>Provision</th>
            <th>Vehicle No</th>
            <th>Total Amount</th>
            <th>Issue Date</th>    
        </tr>
    </tfoot>
    <tbody>
    <?php //Read officer details from tpo table
		include "../connection.php";	
        $police_id = $_SESSION['police_id'];	
		$sql=mysqli_query($conn,"select * from issued_fines where police_id = '$police_id'");
		while($res=mysqli_fetch_assoc($sql))
		{		
		?>
        <tr>
            <td><?php echo $res['ref_no']; ?></td>
            <td><?php echo $res['license_id']; ?></td>
            <td><?php echo $res['provisions']; ?></td>
            <td><?php echo $res['vehicle_no']; ?></td>
            <td><?php echo $res['total_amount']; ?></td> 
            <td><?php echo $res['issued_date']; ?></td> 
        </tr>
	    <?php 	
		}?>
    </tbody>
</table>

<?php
}else{ 
	header("Location: index.php");
	exit();
}
?>
