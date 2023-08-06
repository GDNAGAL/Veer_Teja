<?php
include("veerTejaAdmin/includes/connection.php");
// error_reporting(0);
//Buy Token 
if (isset($_POST['tokenbuy'])) {
	$fullname = $_POST['fullname'];
	$fathername = $_POST['fathername'];
	$mobile = $_POST['mobile'];
	$trno = $_POST['trno'];
	$offerid = $_POST['offerid'];
	$amountpaid = $_POST['amountpaid'];
	$district = $_POST['district'];
	$email = $_POST['email'];

$buytoken = mysqli_query($conn, "INSERT INTO `tbl_token_request`(`member_name`, `father_name`, `mobile`, `district`, `refno`, `offerid`, `amoutpaid`, `email`, `status`) VALUES ('$fullname','$fathername','$mobile','$district','$trno','$offerid','$amountpaid','$email',0)");
if ($buytoken==True) {
	echo 1;
}else{
	echo 0;
}

}


//Mobile Validata
if (isset($_POST['mobileval'])) {
	$mobile = $_POST['mobileval'];

$mobileval = mysqli_query($conn, "SELECT `mobile` FROM `tbl_token_request` where `mobile`='$mobile' AND `status`=0");
if (mysqli_num_rows($mobileval)>0) {
	echo 1;
}else{
	echo 0;
}

}


?>