 <?php  
  
 if(!empty($_POST))  
 {    
	  include "../connection.php";
      $output = '';  
      $message = '';  
      $police_id = mysqli_real_escape_string($conn, $_POST["did"]);      
	  $officer_email = mysqli_real_escape_string($conn, $_POST["officer_email"]);  
	  $officer_name = mysqli_real_escape_string($conn, $_POST["officer_name"]);      
      $police_station = mysqli_real_escape_string($conn, $_POST["police_station"]);
      $court = mysqli_real_escape_string($conn, $_POST["court"]);
      $registered_at = mysqli_real_escape_string($conn, $_POST["registered_at"]);      
      
      if($_POST["did"] != '')  
      {  
           $query = "  
           UPDATE tpo   
           SET police_id='$police_id',
		   officer_email='$officer_email',           
		   officer_name='$officer_name',
		   police_station='$police_station',
		   court='$court',		   
		   registered_at='$registered_at'
              
           WHERE police_id='".$_POST["did"]."'";  
           //$message = 'Data Updated';  
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
      {  /*
           $output .= '<label class="alert alert-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM tpo";  
           $result = mysqli_query($conn, $select_query);  
           $output .= '  
                <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">  
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
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>                      
						  <td>			
							<button type="button" name="edit" id="'.$row["police_id"] .'" class="btn btn-success btn-xs edit_data"><i class="fas fa-pen"></i></button>											
							<button type="button" name="delete" id="' . $row["police_id"] . '" class="btn btn-danger btn-xs delete_data"><i class="fas fa-trash-alt"></i></button>							
						  </td>						  
						  <td>' . $row["police_id"] . '</td>
						  <td>' . $row["officer_name"] . '</td>						  
						  <td>' . $row["police_station"] . '</td>
						  <td>' . $row["court"] . '</td>
						  <td>' . $row["officer_email"] . '</td>
						  <td>' . $row["registered_at"] . '</td>
                          
						  
                     </tr>  
                ';  
           }  
           $output .= '</table></tbody>';  
      }  
      echo $output; */ 
 }
} 
 ?>

