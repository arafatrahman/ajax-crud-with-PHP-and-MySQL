<?php  
	$connect = mysqli_connect();
	$idhours_lk = $_POST["idhours_lk"];  
	$text = $_POST["text"];  
	$column_name = $_POST["column_name"];  
	$sql = "UPDATE hours_lk SET ".$column_name."='".$text."' WHERE idhours_lk='".$idhours_lk."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'Data Updated Succesfully';  
	}  
 ?>