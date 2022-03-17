 <?php  
  
 if(!empty($_POST))  
 {    
	  include "../connection.php";
      $output = '';  
      $message = '';  
      $license_id = mysqli_real_escape_string($conn, $_POST["did"]);  
      $address = mysqli_real_escape_string($conn, $_POST["daddress"]);
	  $driver_email = mysqli_real_escape_string($conn, $_POST["driver_email"]);  
	  $driver_name = mysqli_real_escape_string($conn, $_POST["driver_name"]);  
      
      $license_issue_date = mysqli_real_escape_string($conn, $_POST["license_issue_date"]);
      $license_expire_date = mysqli_real_escape_string($conn, $_POST["license_expire_date"]);
      $registered_date = mysqli_real_escape_string($conn, $_POST["registered_date"]);
      $class_of_vehicle = mysqli_real_escape_string($conn, $_POST["class_of_vehicle"]);
      
      if($_POST["did"] != '')  
      {  
           $query = "  
           UPDATE driver   
           SET license_id='$license_id',
			driver_email='$driver_email',
           home_address='$address',
		   driver_name='$driver_name',
		   license_issue_date='$license_issue_date',
		   license_expire_date='$license_expire_date',
		   class_of_vehicle='$class_of_vehicle',
			registered_at='$registered_date'
              
           WHERE license_id='".$_POST["did"]."'";  
           $message = 'Data Updated';  
      }  
      else  
      {		$output = "not updated";
	  /*  
           $query = "  
           INSERT INTO tbl_employee(name, address, gender, designation, age)  
           VALUES('$name', '$address', '$gender', '$designation', '$age');  
           ";  
           $message = 'Data Inserted';  */
      }
	  
      if(mysqli_query($conn, $query))  
      { 
			//header("Location: ./view_all_drivers.php");
			
			
	  }
			/*
           $output .= '<label class="alert alert-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM driver";  
           $result = mysqli_query($conn, $select_query);  
           $output .= '  
                <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">  
                     <tr>  
                          <th>Action</th>  
                          <th>License ID</th>  
                          <th>Driver Full Name</th>
						  <th>License Issue Date</th>  
                          <th>License Expire Date</th>                           
                     </tr>  
					 <tfoot>
						<tr>
							<th>Action</th>										
							<th>License ID</th>
							<th>Driver Full Name</th>
							<th>License Issue Date</th>
							<th>License Expire Date</th> 
						</tr>
					</tfoot>
					<tbody>
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>                      
						  <td>
							<input type="button" name="edit" value="Edit" id="'.$row["license_id"] .'" class="btn btn-info btn-xs edit_data" /> 
							<input type="button" name="view" value="view" id="' . $row["license_id"] . '" class="btn btn-warning btn-xs view_data" />
							<input type="button" name="delete" value="Delete" id="' . $row["license_id"] . '" class="btn btn-danger btn-xs delete_data" />
						  </td>
						  
						  <td>' . $row["license_id"] . '</td>
						  <td>' . $row["driver_name"] . '</td>						  
						  <td>' . $row["license_issue_date"] . '</td>
						  <td>' . $row["license_expire_date"] . '</td>
                          
						  
                     </tr>  
                ';  
           }  
           $output .= '</table></tbody>';  
      }  
      echo $output;  */
 }  
 ?>
 
 