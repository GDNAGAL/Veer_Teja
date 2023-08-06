<?php
include("../includes/connection.php");
include("../includes/session.php");
// error_reporting(0);

//$records = array(''); 
$membermobile  = $_GET['mobileid'];
$membersql = mysqli_query($conn, "SELECT * FROM `tbl_members` where `mobile` = '$membermobile'");	
$membersqlrows = mysqli_num_rows($membersql);
if($membersqlrows==0){
    echo 0;
}else{
while($row = mysqli_fetch_assoc($membersql)) {
    $records[] = $row;
    }
echo json_encode($records);
}
?>
