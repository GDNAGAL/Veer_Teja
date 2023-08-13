<?php
include("../includes/connection.php");
include("../includes/session.php");
$orderid = $_GET['orderid'];
$unorderid = $_GET['unorderid'];


//do rejection
if(isset($_GET['orderid'])){
	mysqli_query($conn, "UPDATE `tbl_token_request` SET `status`= 2 where `Id`=$orderid");
	header("Location:../tokenrequestreview?orderid=$orderid");
}


//undo rejection
if(isset($_GET['unorderid'])){
	mysqli_query($conn, "UPDATE `tbl_token_request` SET `status`= 0 where `Id`=$unorderid");
	header("Location:../tokenrequestreview?orderid=$unorderid");
}
?>