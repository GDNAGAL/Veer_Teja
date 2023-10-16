<?php
include("veerTejaAdmin/includes/connection.php");
// error_reporting(0);
//Buy Token 
if (isset($_POST['tokenbuy'])) {
	$fullname = $_POST['fullname'];
	$fathername = $_POST['fathername'];
	$mobile = $_POST['mobile'];
	$offerid = $_POST['offerid'];
	$amountpaid = $_POST['amountpaid'];
	$district = $_POST['district'];
	$email = $_POST['email'];
	date_default_timezone_set("Asia/Kolkata");
    $dt = date("d/m/Y h:i:s A");

/* create new name file */
$filename   = uniqid() . "-" . time(); // 5dab1961e93a7-1571494241
$extension  = pathinfo( $_FILES["screenshot"]["name"], PATHINFO_EXTENSION ); // jpg
$basename   = $filename . "." . $extension; // 5dab1961e93a7_1571494241.jpg

$source       = $_FILES["screenshot"]["tmp_name"];
$destination  = "veerTejaAdmin/dist/screenshot/{$basename}";
/* move the file */
move_uploaded_file( $source, $destination );
$newfile = $filename . '.' . $extension;






$buytoken = mysqli_query($conn, "INSERT INTO `tbl_token_request`(`member_name`, `father_name`, `mobile`, `district`, `refno`, `offerid`, `amoutpaid`, `email`, `status`, `datetime`, `screenshot`) VALUES ('$fullname','$fathername','$mobile','$district','0','$offerid','$amountpaid','$email',0,'$dt','$newfile')");
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