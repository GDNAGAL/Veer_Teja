<?php
include("veerTejaAdmin/includes/connection.php");
error_reporting(0);
//Buy Token 
if (isset($_POST['tokenbuy'])) {
	$fullname = $_POST['fullname'];
	$fathername = $_POST['fathername'];
	$mobile = $_POST['mobile'];
	$trno = $_POST['trno'];
	$offerid = $_POST['offerid'];
	$amountpaid = $_POST['amountpaid'];
	$district = $_POST['district'];

$buytoken = mysqli_query($conn, "INSERT INTO `tbl_token_request`(`member_name`, `father_name`, `mobile`, `district`, `refno`, `offerid`, `amoutpaid`) VALUES ('$fullname','$fathername','$mobile','$district','$trno','$offerid','$amountpaid')");
if ($buytoken==True) {
	echo 1;
}else{
	echo 0;
}

}
?>