<?php  
	$connect = mysqli_connect();
    $idhours_lk_val = $_POST["idhours_lk_val"];  
    
	$text = $_POST["text"];  
	$column_name = $_POST["column_name"];  
	$sql = "UPDATE hours_lk_val SET ".$column_name."='".$text."' WHERE idhours_lk_val='".$idhours_lk_val."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'Sub Data Updated Succesfully';  
	}  
 ?>