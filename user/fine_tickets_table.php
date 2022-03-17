<?php
if (isset($_SESSION['license_id']) && isset($_SESSION['driver_email']) && isset($_SESSION['driver_name']) && isset($_SESSION['home_address'])) {
?>


<table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
			<th>Fine ID</th>
            <th>Section of Act</th>
            <th>Provision</th>
            <th>Fine Amount</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
			<th>Fine ID</th>
            <th>Section of Act</th>
            <th>Provision</th>
            <th>Fine Amount</th>
        </tr>
    </tfoot>
    <tbody>
		<?php //get data from fine_tickets table
		include "../connection.php";		
		$sql=mysqli_query($conn,"select * from fine_tickets");
		while($res=mysqli_fetch_assoc($sql))
		{		
		?>
		<tr>
		<td><?php echo $res['fine_id']; ?></td>
	    <td><?php echo $res['section_of_act']; ?></td>
		<td><?php echo $res['provision']; ?></td>
		<td><?php echo $res['fine_amount']; ?></td>
		</tr>
	    <?php 	
		}?>
	</tbody>
</table>

<?php
}else{ 
	header("Location: login.php");
	exit();
}
?>

