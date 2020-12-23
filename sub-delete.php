<?php  
	$connect = mysqli_connect();
	$sql = "DELETE FROM hours_lk_val WHERE idhours_lk_val = '".$_POST["idhours_lk_val"]."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'Sub Data Deleted Successfully';  
	}  
 ?>