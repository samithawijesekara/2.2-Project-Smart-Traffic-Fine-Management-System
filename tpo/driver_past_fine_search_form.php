<?php

if (isset($_SESSION['police_id']) && isset($_SESSION['officer_email']) && isset($_SESSION['officer_name']) && isset($_SESSION['police_station']) && isset($_SESSION['court'])) {

?>

<div class="card mt-5 mb-4">
    <div class="card-header">
        <i class="fas fa-history"></i> Search Driver Past Fines
    </div>
    <div class="card-body mobilePaading">
        <form action="" method="POST">
            <div class="form-row">
                <div class="form-group col-xs-9">
                    <input type="text" class="form-control" id="license_id" name="licenseid" placeholder="Driving License No">
                </div>
                <div class="form-group col-xs-3">
                    <button type="submit" name="search" class="btn btn-primary mb-2" name="search"><i class="fas fa-search"></i> Check</button>
                </div>
            </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Refferance No</th>
                                    <th>Provision</th>
                                    <th>Vehicle No</th>
                                    <th>Place</th>
                                    <th>Issue Date</th>   
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (isset($_POST['search']))
                            {
	                                $dlno=$_POST['licenseid'];
                                    include "../connection.php";
                                    $sql=mysqli_query($conn,"SELECT * FROM issued_fines WHERE license_id = '$dlno'");
                                    while($res=mysqli_fetch_assoc($sql))
                                    {
                                    ?>
                                    <tr>
                                        <td><?php echo $res['ref_no']; ?></td>
                                        <td><?php echo $res['provisions']; ?></td> 
                                        <td><?php echo $res['vehicle_no']; ?></td>
                                        <td><?php echo $res['place']; ?></td>
                                        <td><?php echo $res['issued_date']; ?></td>
                                        
                                    </tr>
                                    <?php 	
                                    }}?>
                            </tbody>
                        </table>
                    </div>
        </form>
    </div>
</div>
<?php
}else{ 
	header("Location: index.php");
	exit();
}
?>

