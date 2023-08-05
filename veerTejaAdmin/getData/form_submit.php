<?php
include("../includes/connection.php");
include("../includes/session.php");
// error_reporting(0);
//Add Agent 
if (isset($_POST['addagent'])) {
	$agentname = $_POST['agent_name'];
	$mobile = $_POST['mobile'];

$insertstudent = mysqli_query($conn, "INSERT INTO `agents`(`agent_name`, `agentmobile`, `status`) VALUES ('$agentname','$mobile', 1)");
if ($insertstudent==True) {
	echo 1;
}else{
	echo 0;
}

}

//Add Offer
if (isset($_POST['addoffer'])) {
	$text = $_POST['text'];
	$buy = $_POST['buy'];
	$free = $_POST['free'];
	$amount = $_POST['amount'];

/* create new name file */
$filename   = uniqid() . "-" . time(); // 5dab1961e93a7-1571494241
$extension  = pathinfo( $_FILES["banner"]["name"], PATHINFO_EXTENSION ); // jpg
$basename   = $filename . "." . $extension; // 5dab1961e93a7_1571494241.jpg

$source       = $_FILES["banner"]["tmp_name"];
$destination  = "../dist/banner/{$basename}";
/* move the file */
move_uploaded_file( $source, $destination );
$newfile = $filename . '.' . $extension;

$addoffer = mysqli_query($conn, "INSERT INTO `tbl_token_offer`(`buy`, `free`, `price`, `image`, `text`) VALUES ('$buy','$free', '$amount','$newfile','$text')");
if ($addoffer==True) {
	echo "<script>alert('Offer Added Successfully');window.location = '../TokenOffer';</script>";
	//echo "<script> window.location = '../TokenOffer';</script>";
}else{
	echo "<script>alert('Failed');window.location = '../TokenOffer';</script>";
	//echo "<script> window.location = '../TokenOffer';</script>";
}

}




//Add New Member and Tokens
if (isset($_POST['addmember'])) {
	$membername = $_POST['membername'];
	$fathername = $_POST['fathername'];
	$mobile = $_POST['mobile'];
	$district = $_POST['district'];
	$agents = $_POST['agents'];
	$idtype = $_POST['idtype'];
	$idno = $_POST['idno'];
	$offerchhose = $_POST['offerchoose'];
	

	$getofferdetails=mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `tbl_token_offer` WHERE `Id` = $offerchhose"));
	$free = $getofferdetails['free'];
	$paid = $getofferdetails['buy'];
	$price = round($getofferdetails['price']/$paid);
	
	// GEt offer details
//Add Member Query	
$addmember = mysqli_query($conn, "INSERT INTO `tbl_members`(`member_name`, `father_name`, `mobile`, `district`, `id_type`, `id_number`, `agent`) VALUES ('$membername','$fathername','$mobile','$district','$idtype','$idno','$agents')");
//find member id
$findmemberid=mysqli_fetch_assoc(mysqli_query($conn, "SELECT `id` FROM `tbl_members` ORDER by `id` DESC limit 1"));
$memberid = $findmemberid['id'];

$tokenno = $_POST['tokenno'];
$offtoken = $_POST['offtoken'];
//Inset Token Data
for($i=1; $i<=$paid; $i++ ){
	$addpaidtoken = mysqli_query($conn, "INSERT INTO `tbl_tokens` (`token_no`, `member_id`, `amount`, `type`, `agent`, `offlinetokenno`) VALUES ('$tokenno', '$memberid', '$price', 'PAID', '$agents', '$offtoken');");
	$tokenno = $tokenno+1;
	$offtoken = $offtoken+1;
}
if($free!==0){
	for($i=1; $i<=$free; $i++ ){
		$addfreetoken = mysqli_query($conn, "INSERT INTO `tbl_tokens` (`token_no`, `member_id`, `amount`, `type`, `agent`, `offlinetokenno`) VALUES ('$tokenno', '$memberid', '0', 'FREE', '$agents', '$offtoken');");
		$tokenno = $tokenno+1;
		$offtoken = $offtoken+1;
	}
}

if ($addpaidtoken==True) {
	echo 1;
}else{
	echo 0;
}

}




//Buy Token 
if (isset($_POST['tokenbuy'])) {
	$fullname = $_POST['fullname'];
	$fathername = $_POST['fathername'];
	$mobile = $_POST['mobile'];
	$trno = $_POST['trno'];
	$offerid = $_POST['offerid'];
	$amountpaid = $_POST['amountpaid'];
	$district = $_POST['district'];
	$emails = $_POST['email'];

$buytoken = mysqli_query($conn, "INSERT INTO `tbl_token_request`(`member_name`, `father_name`, `mobile`, `district`, `refno`, `offerid`, `amoutpaid`, `email`, `status`) VALUES ('$fullname','$fathername','$mobile','$district','$trno','$offerid','$amountpaid','$emails',0)");
if ($buytoken==True) {
	echo 1;
}else{
	echo 0;
}

}



//Approve Tokens
if (isset($_POST['accept'])) {
	$membername = $_POST['membername'];
	$fathername = $_POST['fathername'];
	$mobile = $_POST['mobile'];
	$district = $_POST['district'];
	$agents = $_POST['agents'];
	$idtype = $_POST['idtype'];
	$idno = $_POST['idno'];
	$oid = $_POST['oid'];
	$offerchhose = $_POST['offerchoose'];

	$getofferdetails=mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `tbl_token_offer` WHERE `Id` = $offerchhose"));
	$free = $getofferdetails['free'];
	$paid = $getofferdetails['buy'];
	$price = round($getofferdetails['price']/$paid);
	
	// GEt offer details
//Add Member Query	
$addmember = mysqli_query($conn, "INSERT INTO `tbl_members`(`member_name`, `father_name`, `mobile`, `district`, `id_type`, `id_number`, `agent`) VALUES ('$membername','$fathername','$mobile','$district','$idtype','$idno','$agents')");
//find member id
$findmemberid=mysqli_fetch_assoc(mysqli_query($conn, "SELECT `id` FROM `tbl_members` ORDER by `id` DESC limit 1"));
$memberid = $findmemberid['id'];

$tokenno = $_POST['tokenno'];
//Inset Token Data
for($i=1; $i<=$paid; $i++ ){
	$addpaidtoken = mysqli_query($conn, "INSERT INTO `tbl_tokens` (`token_no`, `member_id`, `amount`, `type`) VALUES ('$tokenno', '$memberid', '$price', 'PAID');");
	$tokenno = $tokenno+1;
}
if($free!==0){
	for($i=1; $i<=$free; $i++ ){
		$addfreetoken = mysqli_query($conn, "INSERT INTO `tbl_tokens` (`token_no`, `member_id`, `amount`, `type`) VALUES ('$tokenno', '$memberid', '0', 'FREE');");
		$tokenno = $tokenno+1;
	}
}
mysqli_query($conn, "UPDATE `tbl_token_request` SET `status`=1 Where `Id`= $oid");
if ($addpaidtoken==True) {
	echo 1;
}else{
	echo 0;
}

}






//Add Payment Details qr and upi
if (isset($_POST['updatepaymentdetails'])) {
	$upi = $_POST['upi'];

/* create new name file */
$filename   = uniqid() . "-" . time(); // 5dab1961e93a7-1571494241
$extension  = pathinfo( $_FILES["qr"]["name"], PATHINFO_EXTENSION ); // jpg
$basename   = $filename . "." . $extension; // 5dab1961e93a7_1571494241.jpg

$source       = $_FILES["qr"]["tmp_name"];
$destination  = "../../asset/img/{$basename}";
/* move the file */
move_uploaded_file( $source, $destination );
$newfile = $filename . '.' . $extension;

$addoffer = mysqli_query($conn, "UPDATE `genral` SET `qr`='$newfile',`upi`='$upi' WHERE `Id`=1");
if ($addoffer==True) {
	echo "<script>alert('Update Successfully');window.location = '../Settings';</script>";
	//echo "<script> window.location = '../TokenOffer';</script>";
}else{
	echo "<script>alert('Failed');window.location = '../Settings';</script>";
	//echo "<script> window.location = '../TokenOffer';</script>";
}

}


//Update Scroll Text
if (isset($_POST['uscrolltextbtn'])) {
	$scrolltext = $_POST['scrolltext'];

$addoffer = mysqli_query($conn, "UPDATE `genral` SET `marquee`='$scrolltext' WHERE `Id`=1");
if ($addoffer==True) {
	echo 1;
}else{
	echo 0;
}

}


//Update close date
if (isset($_POST['closedatebtn'])) {
	$date = $_POST['bookingclosedate'];
	$time = $_POST['closetime'];
	$year=substr($date,6,4);
	$month=substr($date,0,2);
	$day=substr($date,3,2);
	if(substr($month,0,1)==0){
		$month = substr($month,1,1);
	}
	$monthname = array("", "Jan", "Feb","Mar", "Apr", "May","Jun", "Jul", "Aug", "Sep", "Oct", "Nov","Dec");
	$newdate = "$monthname[$month] $day, $year $time:00"; 

$addoffer = mysqli_query($conn, "UPDATE `genral` SET `closedate`='$newdate' WHERE `Id`=1");
if ($addoffer==True) {
	echo 1;
}else{
	echo 0;
}

}

?>