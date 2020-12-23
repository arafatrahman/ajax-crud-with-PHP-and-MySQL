<?php  
	$connect = mysqli_connect();
	$sql = "DELETE FROM hours_lk WHERE idhours_lk = '".$_POST["idhours_lk"]."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'Data Deleted Successfully';  
	}  
 ?>