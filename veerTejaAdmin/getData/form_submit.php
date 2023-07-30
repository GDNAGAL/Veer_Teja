<?php
include("../includes/connection.php");
include("../includes/session.php");
//error_reporting(0);
//edit Class Info
if(isset($_POST['updateclass'])){
	$class_id=$_POST['class_id'];
	$class_name=$_POST['class_name'];
	$class_teacher=$_POST['class_teacher'];


    if($class_id==0){
        $result = mysqli_query($conn, "INSERT INTO `tbl_school_classes`(`year`, `school_id`, `class_name`, `class_teacher`) VALUES ('$year','$schoolid','$class_name','$class_teacher')");
        if ($result==True) {
        	echo 1;
        }else{
        echo 1;	
        }
 
    }else{
    	$classupdatesql=mysqli_query($conn, "UPDATE `tbl_school_classes` SET `class_name`='$class_name', `class_teacher`='$class_teacher' WHERE `tbl_school_classes`.`Id`='$class_id'");
    	if ($classupdatesql==True) {
    		echo 1;
    	}else{
    		echo 0;
    	}
		
    }
	
}

//Add Student 
if (isset($_POST['addstudent'])) {
	$studentname = $_POST['studentname'];
	$fathername = $_POST['fathername'];
	$mothername = $_POST['mothername'];
	$dob = $_POST['dob'];
	$category = $_POST['category'];
	$address = $_POST['address'];
	$studentclass = $_POST['studentclass'];
	$adno = $_POST['adno'];
	$gender = $_POST['gender'];
	$rollno = $_POST['rollno'];
	$mobile = $_POST['mobile'];
	$aadhar = $_POST['aadhar'];

$insertstudent = mysqli_query($conn, "INSERT INTO `tbl_student`(`year`, `school_id`, `student_name`, `father_name`, `mother_name`, `dateofbirth`, `category`, `address`, `student_class`, `admissionno`, `gender`, `rollno`, `mobile`, `aadhar`, `photo`) VALUES ('$year','$schoolid','$studentname','$fathername','$mothername','$dob','$category','$address','$studentclass','$adno','$gender','$rollno','$mobile','$aadhar','')");
if ($insertstudent==True) {
	echo 1;
}else{
	echo 0;
}

}


//Add Agent 
if (isset($_POST['addagent'])) {
	$agentname = $_POST['agent_name'];
	$mobile = $_POST['mobile'];

$insertstudent = mysqli_query($conn, "INSERT INTO `agents`(`agent_name`, `mobile`, `status`) VALUES ('$agentname','$mobile', 1)");
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
//Add Agent 
if (isset($_POST['addmember'])) {
	$membername = $_POST['membername'];
	$fathername = $_POST['fathername'];
	$mobile = $_POST['mobile'];
	$district = $_POST['district'];
	$agents = $_POST['agents'];
	$idtype = $_POST['idtype'];
	$idno = $_POST['idno'];
	$offerchhose = $_POST['offerchoose'];

$addmember = mysqli_query($conn, "INSERT INTO `tbl_members`(`member_name`, `father_name`, `mobile`, `district`, `id_type`, `id_number`) VALUES
 ('$membername','$fathername','$mobile','$district','$idtype','$idno')");
if ($addmember==True) {
	echo 1;
}else{
	echo 0;
}

}
?>