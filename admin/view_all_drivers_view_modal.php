<?php /*  
 if(isset($_POST["did"]))  
 {  
	
      $output = '';  
      include "../connection.php";
      $query = "SELECT * FROM driver WHERE license_id = '".$_POST["did"]."'";  
      $result = mysqli_query($conn, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="35%"><label>License ID</label></td>  
                     <td width="65%">'.$row["license_id"].'</td>  
                </tr>  
                <tr>  
                     <td width="35%"><label>Driver Full Name</label></td>  
                     <td width="65%">'.$row["driver_name"].'</td>  
                </tr> 
				<tr>  
                     <td width="35%"><label>Home Address</label></td>  
                     <td width="65%">'.$row["home_address"].'</td>  
                </tr>
				<tr>  
                     <td width="35%"><label>License Issue Date</label></td>  
                     <td width="65%">'.$row["license_issue_date"].'</td>  
                </tr>
				<tr>  
                     <td width="35%"><label>License Expire Date</label></td>  
                     <td width="65%">'.$row["license_expire_date"].'</td>  
                </tr>
				<tr>  
                     <td width="35%"><label>Class of Vehicle</label></td>  
                     <td width="65%">'.$row["class_of_vehicle"].'</td>  
                </tr>
                <tr>  
                     <td width="35%"><label>Registered Date</label></td>  
                     <td width="65%">'.$row["registered_at"].'</td>  
                </tr>  
                <tr>  
                     <td width="35%"><label>Driver Email</label></td>  
                     <td width="65%">'.$row["driver_email"].'</td>  
                </tr>  
                  
           ';  
      }  
      $output .= '  
           </table>  
      </div>  
      ';  
      echo $output;  
 }  */
?>




<?php  
 if(isset($_POST["did"]))  
 {  
	
      $output = '';  
      include "../connection.php";
      $query = "SELECT * FROM driver WHERE license_id = '".$_POST["did"]."'";  
      $result = mysqli_query($conn, $query);  
      $output .= '  
        
           <table class="table table-borderless"> <tbody> ';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '
				<tr class="content">
					<td>License ID</td>
					<td>'.$row["license_id"].'</td>
				</tr>
				
				<tr class="content">
					<td>Driver Full Name</td>
					<td>'.$row["driver_name"].'</td>
				</tr>
                
				<tr class="content">
					<td>Home Address</td>
					<td>'.$row["home_address"].'</td>
				</tr>
				
				<tr class="content">
					<td>License Issue Date</td>
					<td>'.$row["license_issue_date"].'</td>
				</tr>
               
			    <tr class="content">
					<td>License Expire Date</td>
					<td>'.$row["license_expire_date"].'</td>
				</tr>
				<tr class="content">
					<td>Class of Vehicle</td>
					<td>'.$row["class_of_vehicle"].'</td>
				</tr>
				
				<tr class="content">
					<td>Registered Date</td>
					<td>'.$row["registered_at"].'</td>
				</tr>
				
				<tr class="content">
					<td>Driver Email</td>
					<td style="word-break: break-all;">'.$row["driver_email"].'</td>
				</tr>
				
           ';  
      }  
      $output .= '  
           </tbody></table>  
      
      ';  
      echo $output;  
 }  
?>

