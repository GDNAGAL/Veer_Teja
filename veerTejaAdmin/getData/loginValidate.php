<?php
include("../includes/connection.php");
//Validate Login
if(isset($_POST['login'])){
	$myusername = mysqli_real_escape_string($conn,$_POST['username']);
    $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
    $euser = md5($myusername);
    $epass = md5($mypassword);
     
    //validate username and password
    $sql = mysqli_query($conn,"SELECT * FROM `adminlog` WHERE eusername = '$euser' and epassword = '$epass'");
	$rowcount = mysqli_num_rows($sql);
	if($rowcount==1){
		session_start();
		$_SESSION['adminuser']=$myusername;
		echo 1;
	}else{
		echo 0;
	}
   
	
};

?>