<?php
include("../includes/connection.php");
include("../includes/session.php");
error_reporting(0);

//$records = array(''); 
$offtoken  = $_GET['id'];
$offtoknsql = mysqli_query($conn, "SELECT * FROM `tbl_tokens` where `offlinetokenno` = '$offtoken'");	
$offtoknsqlrows = mysqli_num_rows($offtoknsql);
if($offtoknsqlrows==0){
    echo 0;
}else{
    echo 1;
}
?>
