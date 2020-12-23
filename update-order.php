<?php

$connect = mysqli_connect();
//$page_id = $_POST["page_id_array"];
for($i=0; $i<count($_POST["idhours_lk"]); $i++)
{
 $query = "
 UPDATE hours_lk 
 SET disp_order = '".$i."' 
 WHERE idhours_lk = '".$_POST["idhours_lk"][$i]."'";
 mysqli_query($connect, $query);
}
echo 'Main Order has been updated'; 

?>

