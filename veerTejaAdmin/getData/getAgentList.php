<?php
include("../includes/connection.php");
include("../includes/session.php");
$n="";
$selecttecherlist = mysqli_query($conn, "SELECT * FROM `agents`");
while($row = mysqli_fetch_assoc($selecttecherlist)) {
  $n++;
 	echo "<tr>
	<td>$n</td>
	<td>$row[agent_name]</td>
	<td>$row[mobile]</td>
	<td class='text-center'><button class='btn btn-success btn-flat'>Edit</button>&nbsp;<button class='btn btn-danger btn-flat'>Delete</button></td>
	</tr>";
 }
?>