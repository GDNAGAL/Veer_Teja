<?php
include("../includes/connection.php");
//Validate Login
if(isset($_POST['login'])){
	$myusername = mysqli_real_escape_string($conn,$_POST['username']);
    $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
    

    //validate username and password
    $sql = mysqli_query($conn,"SELECT * FROM `adminlog` WHERE username = '$myusername' and password = '$mypassword'");
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