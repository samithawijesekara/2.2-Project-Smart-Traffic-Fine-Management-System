 <?php  
  
 if(!empty($_POST))  
 {    
	  include "../connection.php";
      $output = '';  
      $message = '';  
      $fine_id = mysqli_real_escape_string($conn, $_POST["did"]);  
      $section_of_act = mysqli_real_escape_string($conn, $_POST["section_of_actm"]);
	  $provision = mysqli_real_escape_string($conn, $_POST["provisionm"]);  
	  $fine_amount = mysqli_real_escape_string($conn, $_POST["fine_amountm"]);  
      
      
      
      if($_POST["did"] != '')  
      {  
           $query = "  
           UPDATE fine_tickets   
           SET fine_id='$fine_id',section_of_act='$section_of_act',provision='$provision',fine_amount='$fine_amount' WHERE fine_id='".$_POST["did"]."'";  
           $message = 'Data Updated';  
      }  
      else  
      {		$output = "not updated";
	  /*  
           $query = "  
           INSERT INTO tbl_employee(name, provision, gender, designation, age)  
           VALUES('$name', '$provision', '$gender', '$designation', '$age');  
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
							<input type="button" name="edit" value="Edit" id="'.$row["fine_id"] .'" class="btn btn-info btn-xs edit_data" /> 
							<input type="button" name="view" value="view" id="' . $row["fine_id"] . '" class="btn btn-warning btn-xs view_data" />
							<input type="button" name="delete" value="Delete" id="' . $row["fine_id"] . '" class="btn btn-danger btn-xs delete_data" />
						  </td>
						  
						  <td>' . $row["fine_id"] . '</td>
						  <td>' . $row["fine_amount"] . '</td>						  
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
 
 