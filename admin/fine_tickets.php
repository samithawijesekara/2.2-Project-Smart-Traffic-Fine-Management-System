<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['admin_email'])) {
?>




<!DOCTYPE html>
<html>

<head>
    <title>Fine Tickets | Traffic Police Admin</title>

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
                <a href="fine_tickets.php" class="leftsidebar-nav-link active">
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
                <h1 class="mt-4">Provisions Details</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Provisions Details</li>
                </ol>
                            <!--Alert box -->
                            <?php if (isset($_GET['errorr'])) { ?>
									<div class="alert alert-danger" id="success-alert">
										<i class="fas fa-exclamation-circle"></i>
										<?php echo $_GET['errorr']; ?>
										<button type="button" class="close" data-dismiss="alert">&times;</button>
									</div>
								<?php } ?>
								<?php if (isset($_GET['successs'])) { ?>
									<div class="alert alert-success" id="success-alert">
										<i class="fas fa-check-circle"></i>
										<?php echo $_GET['successs']; ?>
  										<button type="button" class="close" data-dismiss="alert">&times;</button>
									</div>
								<?php } ?>

                <!--Add fine tickets form includes goes here-->
                <div class="card mt-5 mb-4">
                <div class="card-header">
                    <i class="fas fa-receipt"></i> Add a Provision Details
                </div>
                <div class="card-body" style="margin:0 2rem 1rem 2rem;">
                <form action="fine_tickets_action" method="POST">

                <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="section_of_act">Provision ID</label>
                    <input type="text" class="form-control" id="fine_id" value="<?php echo (isset($_GET['fineid']))? $_GET['fineid'] : ''; ?>" name="fineid" placeholder="Provision ID">
                </div>
                <div class="form-group col-md-6">
                    <label for="section_of_act">Section of Act</label>
                    <input type="text" class="form-control" id="section_of_act" value="<?php echo (isset($_GET['sectionofact']))? $_GET['sectionofact'] : ''; ?>" name="sectionofact" placeholder="Section of Act">
                </div>
                <div class="form-group col-md-6">
                    <label for="provision">Provision</label>
                    <input type="text" class="form-control" id="provision" value="<?php echo (isset($_GET['provision']))? $_GET['provision'] : ''; ?>" name="provision" placeholder="Provision">
                </div>
                <div class="form-group col-md-6">
                    <label for="fine_amount">Fine Amount</label>
                    <input type="number" class="form-control" id="fine_amount" value="<?php echo (isset($_GET['fineamount']))? $_GET['fineamount'] : ''; ?>" name="fineamount" placeholder="Fine Amount">
                </div>
                
            </div>

            <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add Fine Ticket</button>
        </form>
    </div>
</div>  

                <div class="card mt-5 mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i> All Fine Tickets Details
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <!--Fine tickets table includes goes here-->
                            <?php 
                                //include 'fine_tickets_table.php';
                            ?>
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
							<table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Action</th>
										<th>Fine ID</th>
										<th>Section of Act</th>
										<th>Provision</th>
										<th>Fine Amount</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>Action</th>
										<th>Fine ID</th>
										<th>Section of Act</th>
										<th>Provision</th>
										<th>Fine Amount</th>
									</tr>
								</tfoot>
								<tbody>
									<?php //Read officer details from tpo table
									include "../connection.php";		
									$sql=mysqli_query($conn,"select * from fine_tickets");
									while($res=mysqli_fetch_assoc($sql))
									{		
									?>
									<tr>
									<td class="d-flex justify-content-around">	<!--consider about row and res when edit button add-->									
										<button type="button" name="edit" value="Edit" id="<?php echo $res["fine_id"]; ?>" class="btn btn-success btn-xs edit_data"><i class="fas fa-pen"></i></button>
										<button type="button" name="delete" value="Delete" id="<?php echo $res["fine_id"]; ?>" class="btn btn-danger btn-xs delete_data"><i class="fas fa-trash-alt"></i></button>
									</td>
									<td><?php echo $res['fine_id']; ?></td>
									<td><?php echo $res['section_of_act']; ?></td>
									<td><?php echo $res['provision']; ?></td>
									<td><?php echo $res['fine_amount']; ?></td>
									</tr>
									<?php 	
									}?>
								</tbody>
							</table>
							
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <!-- Dashboard main content end here ========================================-->
	
	
	<!-- Popup modal for Edit fine details-->
	<div class="modal fade" id="editFineDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-success">
					<h4 class="modal-title text-white" id="exampleModalLabel"><i class="fas fa-pen"></i> Edit Fine Ticket Details</h4>
					<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="insert_form" method="POST">
						<div class="form-row">
							<div class="form-row">
								<div class="form-group col-md-12">
									<label for="fineid">Fine ID</label>
									<!--extra m added #fine_idm to unique from add fineticket form input-->
									<input type="text" class="form-control" name="fine_idm" id="fine_idm" placeholder="Section of Act" >
								</div>
							</div>
							<div class="form-group col-md-12">
								<label for="sectionofact">Section of Act</label>
								<input type="text" class="form-control" name="section_of_actm" id="section_of_actm" placeholder="Section of Act" >
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-12">
								<label for="provisionn">Provision</label>
								<input type="text" class="form-control" name="provisionm" id="provisionm" placeholder="Provision" >
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-12">
								<label for="fineamount">Fine Amount</label>
								<input type="number" class="form-control" name="fine_amountm" id="fine_amountm" placeholder="Fine Amount" >
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
	
	
	<!-- Popup modal for Delete fine details-->
	<div class="modal fade" id="deleteFineDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-danger">
					<h4 class="modal-title text-white" id="exampleModalLabel"><i class="fas fa-trash-alt"></i> Delete Fine Ticket Details</h4>
					<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<h6>Are you sure want to delete this fine ticket details from the system?</h6>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger">Confirm</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>


    <!--Javascripts includes goes here-->
    <?php 
        include '../includes/footer.php';
    ?>
	
	<!--Javascript external goes here-->
    <script type="text/javascript" language="javascript" src="../assets/vendors/bootstrap/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" language="javascript" src="../assets/vendors/DataTables/04_Admin_ProvisionDetails.js"></script>

	
	<script>
	
	 /*Delete function*/
	  /*$(document).on('click', '.delete_data', function(){  
           var did = $(this).attr("id");  
           $.ajax({  
                url:"view_all_drivers_delete_modal.php",  
                method:"POST",  
                data:{did:did},                
                success:function(data){
					$('#deleteDriverDetails').modal('show');
                    //$('#driver_detail').html(data);
					 
					 //$('#deleteDriverDetails').modal('hide');  
                     //$('#employee_table').html(data);
					 
					 //$('#insert').val("Confirm");
                       
                }  
           });   
      }); 
		$('#delete_form').on("submit", function(event){  
			event.preventDefault(); /*re-writing permission to table*/
/*			var did = $(this).attr("id");
			$.ajax({  
				url:"view_all_drivers_delete_modal.php",  
				method:"POST",
				data:{did:did},
				/*data:$('#insert_form').serialize(),  
				beforeSend:function(){  
					$('#insert').val("Inserting");  
				}, */ 
/*				success:function(data){ 					
					$('#deleteDriverDetails').modal('hide');  
					$('#employee_table').html(data);  
				}  
			}); 
		});
	  
	  /*Edit function*/  
      $(document).on('click', '.edit_data', function(){  
           var did = $(this).attr("id");  
           $.ajax({  
                url:"fine_tickets_edit_modal_formdata",  
                method:"POST",  
                data:{did:did},  
                dataType:"json",  
                success:function(data){ 
					//extra m added #fine_idm to unique from add fineticket form input
                     $('#fine_idm').val(data.fine_id);  
                     $('#section_of_actm').val(data.section_of_act);  
                     $('#provisionm').val(data.provision);  
                     $('#fine_amountm').val(data.fine_amount);                                          
                       
                     $('#did').val(data.fine_id);  
                     $('#insert').val("Update");  
                     $('#editFineDetails').modal('show');  
                }  
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#fine_idm').val() == "")  
           {  
                alert("Fine Id is required");  
           }  
           else if($('#section_of_actm').val() == '')  
           {  
                alert("Section of Act is required");  
           }
			else if($('#provisionm').val() == '')  
           {  
                alert("Provision is required");  
           }           
		   else if($('#fine_amountm').val() == '')  
           {  
                alert("Fine Amount is required");  
           }           
           else  
           { 
                $.ajax({  
                     url:"fine_tickets_edit_modal",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#editFineDetails').modal('hide');
						  window.location = "./fine_tickets.php?success=Fine details updated successfully";
						  //alert("Record removed successfully");
						  
                          //$('#employee_table').html(data);  
                     }  
                });  
           }  
      }); 
		 
		
		/*delete test sample*/
		$(".delete_data").click(function(event){
			event.preventDefault();
        //var did = $(this).parents("tr").attr("id");
		var did = $(this).attr("id");  

		
        if(confirm('Are you sure to remove this record ?'))
        {
            $.ajax({
               url:"fine_tickets_delete_modal.php",  
               type: "POST",
               data:{did:did},    
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                    //$("#"+did).delete_data();
					//$('#employee_table').html(data);
					window.location = "./fine_tickets.php?success=Record delete successfully from the system";                    
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