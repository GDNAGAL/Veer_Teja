<?php
include("../includes/connection.php");
//Validate Login
if(isset($_POST['login'])){
	$myusername = mysqli_real_escape_string($conn,$_POST['username']);
    $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
    $euser = md5($myusername);
    $epass = md5($mypassword);
	
	//server details
	$ip = $_SERVER['REMOTE_ADDR'];
	date_default_timezone_set("Asia/Kolkata");
    $dt = date("d/m/Y h:i:s A");
    $crediential = "Login Failed || ".$myusername." || ".$mypassword ;
    
	

    //validate username and password
    //$sql = mysqli_query($conn,"SELECT * FROM `adminlog` WHERE eusername = '$euser' and epassword = '$epass'");
    $sql = mysqli_query($conn,"SELECT * FROM `adminlog` WHERE eusername = '$euser' limit 1");
	$rowcount = mysqli_num_rows($sql);
	$logrow = mysqli_fetch_assoc($sql);
	if($rowcount==1){
		//match password
		if($logrow['epassword']==$epass){
			//genrate session cookie
			$actssin = md5(rand());
			setcookie('ACTSSIN', $actssin, time() + (60 * 30), "/"); // 60 * 30 = 30min
			mysqli_query($conn,"INSERT INTO `log`(`ipadd`, `mesage`, `datetime`) VALUES ('$ip','Login Session Start','$dt')");
			mysqli_query($conn,"UPDATE `adminlog` SET `active_session`='$actssin' WHERE eusername = '$euser'");
			session_start();
			$_SESSION['adminuser']=$myusername;
			echo 1;
		}else{
			//password wrong
			mysqli_query($conn,"INSERT INTO `log`(`ipadd`, `mesage`, `datetime`) VALUES ('$ip','$crediential','$dt')");
			echo 0;
		}
	}else{
		mysqli_query($conn,"INSERT INTO `log`(`ipadd`, `mesage`, `datetime`) VALUES ('$ip','$crediential','$dt')");
		//User Not Found
		echo 0;
	}
   
	
};

?>