 <?php  
    // create database connectivity  
	include "../connection.php";
	$output_del = ''; 
      
	  
	  if($_POST["did"] != '') 
      {  	  
            $query = "DELETE FROM fine_tickets WHERE fine_id ='".$_POST["did"]."'";
			$message = 'Delete success';
      }  
      else  
      {		
		$output = "not updated";	  
      }
	  
	  if(mysqli_query($conn, $query))  
      {  
           $output_del .= '<label class="alert alert-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM fine_tickets";  
           $result = mysqli_query($conn, $select_query);  
           $output_del .= '  
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
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output_del .= '  
                     <tr> 
						  <td>
							<input type="button" name="edit" value="Edit" id="'.$row["fine_id"] .'" class="btn btn-info btn-xs edit_data" />							
							<input type="button" name="delete" value="Delete" id="' . $row["fine_id"] . '" class="btn btn-danger btn-xs delete_data" />
						  </td>
							
						  <td>' . $row["fine_id"] . '</td>
                          <td>' . $row["section_of_act"] . '</td>						  
						  <td>' . $row["provision"] . '</td>
						  <td>' . $row["fine_amount"] . '</td>
                          
						  
                     </tr>  
                ';  
           }  
           $output_del .= '</table>';  
      }
	  echo $output_del;
	  
 ?>