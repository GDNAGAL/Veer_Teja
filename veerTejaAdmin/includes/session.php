<?php 
session_start();
require('connection.php');
$adminuser=$_SESSION['adminuser'];
//check for session and cookie
if (!isset($_SESSION['adminuser']) || !isset($_COOKIE['ACTSSIN'])) {
	unset($_COOKIE['ACTSSIN']);
	setcookie("ACTSSIN", "", time() - 3600);
	unset($_SESSION['adminuser']);
	header("Location:login");
}

//check for cookie match
$sql = mysqli_query($conn, "SELECT `active_session` FROM `adminlog` where `username`='$adminuser'");
$row=mysqli_fetch_assoc($sql);
$activesession = $row['active_session'];
//echo $activesession;
if($activesession != $_COOKIE['ACTSSIN']){
	unset($_COOKIE['ACTSSIN']);
	setcookie("ACTSSIN", "", time() - 3600);
	unset($_SESSION['adminuser']);
	header("Location:login");
}


?>