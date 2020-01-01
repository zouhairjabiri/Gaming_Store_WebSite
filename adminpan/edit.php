<?php
session_start();

    $connect = mysqli_connect("localhost", "root","","gamingstoresite");


if(isset($_GET['delete']))
{
   $id=$_GET['delete'];

mysqli_query($connect,"DELETE FROM users WHERE id='$id' ");
echo "<meta http-equiv='refresh' content='0;url=adminusers.php'>";


}


?>