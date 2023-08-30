<?php
include("../includes/connection.php");
include("../includes/session.php");
//error_reporting(0);

//send mail
function sendmail($mail, $mobile, $name){
// $msg = "First line of text\nSecond line of text";
// mail($mail,"Your Token Request Approved - Jai Veer Teja Lucky Draw",$msg);

$headers  = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
$headers  .= "From: NO-REPLY<no-reply@jaiveertejaluckydraw.in>" . "\r\n";
$subject = "Jai Veer Teja Lucky Draw - Token Confirmation";
$message = "<html>
                <body>
                    <h3>Hi $name</h3>
                    <h3>
					Congratulations ! We recieved Token Request from you. Please Click below button to Download Your Tokens.
                    </h3>
                    <center><br><br>
					<a href='http://jaiveertejaluckydraw.in/downloadTokens?mobile=$mobile'><button style='padding:15px 10px; border:none; background-color:green;color:white;'>Download Your Token</button></a>
					</center>
                    <h3>
                    Thanks,<br>
                    Jai Veer Teja Team.
                    </h3>
                </body>
            </html>";
mail( $mail, $subject, $message, $headers );
}



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
	$memberno = $_POST['memberid'];
	
// GEt offer details
	$getofferdetails=mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `tbl_token_offer` WHERE `Id` = $offerchhose"));
	$free = $getofferdetails['free'];
	$paid = $getofferdetails['buy'];
	$price = round($getofferdetails['price']/$paid);
	
if($memberno==0){
	//Add Member Query	
	$addmember = mysqli_query($conn, "INSERT INTO `tbl_members`(`member_name`, `father_name`, `mobile`, `district`, `id_type`, `id_number`, `agent`) VALUES ('$membername','$fathername','$mobile','$district','$idtype','$idno','$agents')");
	//find member id
	$findmemberid=mysqli_fetch_assoc(mysqli_query($conn, "SELECT `id` FROM `tbl_members` ORDER by `id` DESC limit 1"));
	$memberid = $findmemberid['id'];
	
}else{
	//update member
	$addmember = mysqli_query($conn, "UPDATE `tbl_members` SET `member_name`='$membername',`father_name`='$fathername',`district`='$district',`id_type`='$idtype',`id_number`='$idno',`agent`='$agents' WHERE `id`='$memberno'");
	$memberid = $memberno;
}

$tokenno = $_POST['tokenno'];
$offtoken = $_POST['offtoken'];
//Inset Token Data
for($i=1; $i<=$paid; $i++ ){
	$addpaidtoken = mysqli_query($conn, "INSERT INTO `tbl_tokens` (`token_no`, `member_id`, `amount`, `type`, `agent`, `offlinetokenno`) VALUES ('$tokenno', '$memberid', '$price', 'PAID', '$agents', '$offtoken');");
	$tokenno = $tokenno+1;
	if($offtoken == ""){
		$offtoken = $offtoken;
	}else{
		$offtoken = $offtoken+1;
	}
}
if($free!==0){
	for($i=1; $i<=$free; $i++ ){
		$addfreetoken = mysqli_query($conn, "INSERT INTO `tbl_tokens` (`token_no`, `member_id`, `amount`, `type`, `agent`, `offlinetokenno`) VALUES ('$tokenno', '$memberid', '0', 'FREE', '$agents', '$offtoken');");
		$tokenno = $tokenno+1;
		if($offtoken == ""){
			$offtoken = $offtoken;
		}else{
			$offtoken = $offtoken+1;
		}
	}
}

if ($addpaidtoken==True) {
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
	$memberno = $_POST['memberid'];
	$email = $_POST['email'];
	$tid = $_POST['tid'];

	$getofferdetails=mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `tbl_token_offer` WHERE `Id` = $offerchhose"));
	$free = $getofferdetails['free'];
	$paid = $getofferdetails['buy'];
	$price = round($getofferdetails['price']/$paid);
	
	// GEt offer details
	if($memberno==0){
		//Add Member Query	
		$addmember = mysqli_query($conn, "INSERT INTO `tbl_members`(`member_name`, `father_name`, `mobile`, `district`, `id_type`, `id_number`, `agent`) VALUES ('$membername','$fathername','$mobile','$district','$idtype','$idno','$agents')");
		//find member id
		$findmemberid=mysqli_fetch_assoc(mysqli_query($conn, "SELECT `id` FROM `tbl_members` ORDER by `id` DESC limit 1"));
		$memberid = $findmemberid['id'];
		
	}else{
		//update member
		$addmember = mysqli_query($conn, "UPDATE `tbl_members` SET `member_name`='$membername',`father_name`='$fathername',`district`='$district',`id_type`='$idtype',`id_number`='$idno',`agent`='$agents' WHERE `id`='$memberno'");
		$memberid = $memberno;
	}
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
mysqli_query($conn, "UPDATE `tbl_token_request` SET `status`=1, `refno`='$tid' Where `Id`= $oid");
sendmail($email, $mobile, $membername);
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



//transactionid Validata
if (isset($_POST['trid'])) {
	$trid = $_POST['trid'];

$trval = mysqli_query($conn, "SELECT `refno`, `Id`, `mobile` FROM `tbl_token_request` where `refno`='$trid' AND `status`<>2 limit 1");
$row = mysqli_fetch_assoc($trval);
if (mysqli_num_rows($trval)==1) {
	echo "<span style='color:red'>Duplicate Found (Id : $row[Id]) || (Mobile : $row[mobile])</span>";
}else{
	echo 0;
}

}


//Update Mobile Number
if (isset($_POST['updatemobile'])) {
	$newmobile = $_POST['newmobileno'];
	$memberid = $_POST['memberid'];

$mrval = mysqli_query($conn, "SELECT `mobile` FROM `tbl_token_request` where `mobile`=$newmobile");
if (mysqli_num_rows($mrval)==0) {
	$msrval = mysqli_query($conn, "SELECT `mobile` FROM `tbl_members` where `mobile`=$newmobile");
	if (mysqli_num_rows($msrval)==0) {
        mysqli_query($conn, "UPDATE `tbl_members` SET `mobile`='$newmobile' where `id`=$memberid");
		echo "Success";
	}else{
		echo "Mobile No. Already Registred by Member";
	}
}else{
	echo "One Request Already exit With Same No.";
}
}


?>