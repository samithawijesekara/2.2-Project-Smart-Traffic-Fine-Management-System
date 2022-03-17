<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['admin_email'])) {
?>


<!DOCTYPE html>
<html>

<head>
    <title>View All Traffic Officers | Traffic Police Admin</title>

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
                <a href="add_traffic_officer.php" class="leftsidebar-nav-link">
                    <div>
                        <i class="fas fa-address-card"></i>
                    </div>
                    <span>Add Traffic Officer</span>
                </a>
            </li>
            <li class="leftsidebar-nav-item">
                <a href="view_all_traffic_officers.php" class="leftsidebar-nav-link active">
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
    <div class="dashwrapper">
            <div class="container-fluid">
                <h1 class="mt-4">View All Traffic Officers</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">View All Traffic Officers</li>
                </ol>
                <div class="card mt-5 mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i> You can sort data here
                    </div>
					<!--View All Traffic Officers - get data to main table-->
					<?php
					   include "../connection.php";
					   $sql = "SELECT * FROM tpo";
					   $result = mysqli_query($conn, $sql);  		
					?>
					
                    <div class="card-body">
                        <div class="table-responsive" id="employee_table">
                            <!--View All Traffic Officers table view goes here-->
                            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
								<!--Alert box -->
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
								<thead>
									<tr>
										<th>Action</th>
										<th>Traffic Officer ID</th>
										<th>Traffic Officer Name</th>
										<th>Police Station</th>
										<th>Court</th>
										<th>Traffic Officer Email</th>
										<th>Registered Date</th>										
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>Action</th>
										<th>Traffic Officer ID</th>
										<th>Traffic Officer Name</th>
										<th>Police Station</th>
										<th>Court</th>
										<th>Traffic Officer Email</th>
										<th>Registered Date</th>										
									</tr>
								</tfoot>
								<tbody>
									<?php 
									  while($row = mysqli_fetch_array($result)) 
									  {
									?>
									<tr> 
										<td>
											<button type="button" name="edit" id="<?php echo $row["police_id"]; ?>" class="btn btn-success btn-xs edit_data"><i class="fas fa-pen"></i></button>											
											<button type="button" name="delete" id="<?php echo $row["police_id"]; ?>" class="btn btn-danger btn-xs delete_data"><i class="fas fa-trash-alt"></i></button>								
										</td>										
										<td><?php echo $row["police_id"] ?></td>
										<td><?php echo $row["officer_name"] ?></td>
										<td><?php echo $row["police_station"] ?></td>
										<td><?php echo $row["court"] ?></td>
										<td><?php echo $row["officer_email"] ?></td>
										<td><?php echo $row["registered_at"] ?></td>									
									</tr>
									<?php	
									  }
									?>
								</tbody>
							</table>
							
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <!-- Dashboard main content end here ========================================-->

    <!--View all Traffic Officers popup modals-->	
	
	<!-- Popup modal - Edit -->
	<div class="modal fade" id="add_data_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-success">
					<h4 class="modal-title text-white" id="exampleModalLabel"><i class="fas fa-pen"></i> Edit Traffic Officer Details</h4>
					<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="insert_form" method="POST">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="officer_id">Traffic Officer ID</label>
								<input type="text" class="form-control" id="police_id" name="police_id" placeholder="Traffic Officer ID" disabled>                            
							</div>
							<div class="form-group col-md-6">
								<label for="officer_email">Traffic Officer Email</label>
								<input type="email" class="form-control" id="officer_email" name="officer_email" placeholder="Traffic Officer Email" required autofocus>
							</div>
						</div>						
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="officer_name">Traffic Officer Name</label>
								<input type="text" class="form-control" id="officer_name" name="officer_name" placeholder="Traffic Officer Name" required autofocus>
							</div>
							<div class="form-group col-md-6">
								<label for="police_station">Police Station</label>
								<input type="text" class="form-control" id="police_station" name="police_station" placeholder="Police Station" required autofocus>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="court">Court</label>
								<input type="text" class="form-control" id="court" name="court" required autofocus>
							</div>
							<div class="form-group col-md-6">
								<label for="registered_date">Registered Date</label>
								<input type="date" class="form-control" id="registered_at" name="registered_at" required autofocus>
							</div>
						</div>
						<input type="hidden" name="did" id="did" />
                            <div class="modal-footer">				
                                <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
					</form>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Popup modal for Delete function-->
	<!--div class="modal fade" id="deleteDriverDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-danger">
					<h4 class="modal-title text-white" id="exampleModalLabel"><i class="fas fa-trash-alt"></i> Delete Driver Details</h4>
					<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" id="delete_form">  
					<h6>Are you sure want to delete this driver from the system?</h6>
					<button type="submit" name="del_confirm" id="del_confirm"  Value="Confirm" class="btn btn-danger">Confirm</button>
					</form>
				</div>
				<div class="modal-footer">					
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div-->
	

    <!--Javascripts includes goes here-->
    <?php 
        include '../includes/footer.php';
    ?>
	
	<!--Javascript external goes here-->
    <script type="text/javascript" language="javascript" src="../assets/vendors/bootstrap/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" language="javascript" src="../assets/vendors/DataTables/04_Admin_ViewAllTrafficPoliceOfficers.js"></script>


	<script>
	
	
	  
	  /*Edit function*/  
      $(document).on('click', '.edit_data', function(){  
           var did = $(this).attr("id");  
           $.ajax({  
                url:"view_all_traffic_officers_edit_modal_formdata",  
                method:"POST",  
                data:{did:did},  
                dataType:"json",  
                success:function(data){
					
					 $('#police_id').val(data.police_id);  
                     $('#officer_email').val(data.officer_email);  
                     $('#officer_name').val(data.officer_name);  
                     $('#police_station').val(data.police_station);  
                     $('#court').val(data.court);  
                     $('#registered_at').val(data.registered_at);                                       
                       
                     $('#did').val(data.police_id);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#police_id').val() == "")  
           {  
                alert("Officer ID is required");  
           }  
           else if($('#officer_email').val() == '')  
           {  
                alert("Officer Email is required");  
           }
			else if($('#officer_name').val() == '')  
           {  
                alert("Officer Name is required");  
           }           
		   
           else  
           { 
                $.ajax({  
                     url:"view_all_traffic_officers_edit_modal",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');
						  window.location = "./view_all_traffic_officers.php?success=Traffic officer details updated successfully";                          
                     }  
                });  
           }  
      });
	  	  

		/*delete test sample - workign*/
		$(".delete_data").click(function(event){
			event.preventDefault();
        //var did = $(this).parents("tr").attr("id");
		var did = $(this).attr("id");  

		
        if(confirm('Are you sure to remove this record ?'))
        {
            $.ajax({
               url:"view_all_traffic_officers_delete",  
               type: "POST",
               data:{did:did},    
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                    //$("#"+did).delete_data();
					//$('#employee_table').html(data);
					window.location = "./view_all_traffic_officers.php?error=Record delete successfully from the system";                    
               }
            });
        }
    });


	//To close the success & error alert with slide up animation
	$("#success-alert").delay(4000).fadeTo(2000, 500).slideUp(1000, function(){
    	$("#success-alert").slideUp(1000);
	});

	</script>
	
</body>

</html>
<?php
 mysqli_close($conn);
?>
<?php
}else{ 
	header("Location: index.php");
	exit();
}
?>