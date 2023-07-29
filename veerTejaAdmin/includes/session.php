<?php 
session_start();
require('connection.php');
$adminuser=$_SESSION['adminuser'];

if (!isset($_SESSION['adminuser'])) {
	header("Location:login");
}

?>