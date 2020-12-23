<?php  
$connect = mysqli_connect();
$sql = "INSERT INTO hours_lk_val (idhours_lk,lk_val, lk_val_desc) VALUES('".$_POST["idhours_lk"]."','".$_POST["lk_val"]."', '".$_POST["lk_val_desc"]."')";  
if(mysqli_query($connect, $sql))  
{  
     echo 'Data Inserted';  
}  
 ?>