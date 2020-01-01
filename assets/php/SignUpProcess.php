<?php
$con=mysqli_connect("localhost","root","");

if (!$con) {
	echo("Not connected to the server !!");
}

$selectdb=mysqli_select_db($con,'GamingStoreSite');

if (!$selectdb) {
echo "Database Not Selected ";
}


?>

