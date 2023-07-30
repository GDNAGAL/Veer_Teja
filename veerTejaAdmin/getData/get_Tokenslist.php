<?php
include("../includes/connection.php");
include("../includes/session.php");
error_reporting(0);

//$records = array(''); 

$getmemberlist = mysqli_query($conn, "SELECT * FROM `tbl_tokens`");
while($row = mysqli_fetch_assoc($getmemberlist)) {
$records["data"][] = $row;
 }
 echo json_encode($records);
?>
