<?php 

session_start();
include "../connection.php";

if (isset($_POST['fineid']) && isset($_POST['sectionofact'])
    && isset($_POST['provision']) && isset($_POST['fineamount'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$fineid = validate($_POST['fineid']);
	$sectionofact = validate($_POST['sectionofact']);
	$provision = validate($_POST['provision']);
	$fineamount = validate($_POST['fineamount']);

    
    $user_data = 'fineid='. $fineid. '&sectionofact='. $sectionofact. '&provision='. $provision. '&fineamount='. $fineamount;

    //Check text field empty or not
	if (empty($fineid)) {
		header("Location: fine_tickets.php?errorr=Fine ticket ID is required!&$user_data");
	    exit();
	}else if(empty($sectionofact)){
        header("Location: fine_tickets.php?errorr=Section of act is required!&$user_data");
	    exit();
	}else if(empty($provision)){
        header("Location: fine_tickets.php?errorr=Provision is required!&$user_data");
	    exit();
	}
	else if(empty($fineamount)){
        header("Location: fine_tickets.php?errorr=Fine amount is required!&$user_data");
	    exit();
	}
	else{
		$sql = "SELECT * FROM fine_tickets WHERE fine_id='$fineid' ";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			header("Location: fine_tickets.php?errorr=Fine ID already exist!");
		exit();
		}else {
        
        $query = "INSERT INTO fine_tickets(fine_id, section_of_act, provision, fine_amount) VALUES ('$fineid','$sectionofact', '$provision', '$fineamount')";
        $run = mysqli_query($conn, $query);
        if ($run) {
            header("Location: fine_tickets.php?successs=Fine ticket added successfully");
            exit();
        }else {
            header("Location: fine_tickets.php?errorr=Unknown error occurred!");
            exit();
            }
        }
	}
}else{
	header("Location: fine_tickets.php");
	exit();
}

?>