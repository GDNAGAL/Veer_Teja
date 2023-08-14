<?php
error_reporting(0);
include("includes/connection.php");
$sql = mysqli_query($conn, "SELECT * FROM `log` order by `Id` DESC");
while($rows=mysqli_fetch_assoc($sql)){
    if($rows['mesage']=="Login Session Start"){
        echo "<span style='color:green; font-family:arial; font-size:12px;'>".$rows['datetime']." || ".$rows['ipadd']." || ".$rows['mesage']."</span><br>";
    }else{
        echo "<span style='color:red; font-family:arial; font-size:12px;'>".$rows['datetime']." || ".$rows['ipadd']." || ".$rows['mesage']."</span><br>";
    }
    
}
?>