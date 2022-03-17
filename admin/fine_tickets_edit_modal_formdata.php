 <?php  
 
 include "../connection.php";
 if(isset($_POST["did"]))  
 {  
      $query = "SELECT * FROM fine_tickets WHERE fine_id = '".$_POST["did"]."'";  
      $result = mysqli_query($conn, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>