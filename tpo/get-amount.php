<?php
	include "../connection.php";

	if ( isset($_GET['fine_id']) ) {

		$province_id = mysqli_real_escape_string($conn, $_GET['fine_id']);

		$query 		= "SELECT * FROM fine_tickets WHERE fine_id = {$province_id}";
		$result_set = mysqli_query($conn, $query);

		$district_list = "";
		while ( $result = mysqli_fetch_assoc($result_set) ) {
			$district_list .= "<option value=\"{$result['fine_amount']}\">{$result['fine_amount']}</option>";
		}
		echo $district_list;
	} else {
		echo "<option>Error</option>";
	}

	
?>