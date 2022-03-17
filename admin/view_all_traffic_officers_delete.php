 <?php  
    // create database connectivity  
	include "../connection.php";
	$output_del = ''; 
      
	  
	  if($_POST["did"] != '') 
      {  	  
            $query = "DELETE FROM tpo WHERE police_id ='".$_POST["did"]."'";
			$message = 'Delete success';
      }  
      else  
      {		
		$output = "not updated";	  
      }
	  
	  if(mysqli_query($conn, $query))  
      {  }
	  /*
           $output_del .= '<label class="alert alert-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM tpo";  
           $result = mysqli_query($conn, $select_query);  
           $output_del .= '  
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
                $output_del .= '  
                     <tr> 
						  <td>
							<input type="button" name="edit" value="Edit" id="'.$row["police_id"] .'" class="btn btn-info btn-xs edit_data" />							
							<input type="button" name="delete" value="Delete" id="' . $row["police_id"] . '" class="btn btn-danger btn-xs delete_data" />
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
           $output_del .= '</tbody></table>';  
      }
	  echo $output_del; */
	  
 ?>
 