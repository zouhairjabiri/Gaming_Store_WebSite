<?php

$con=mysqli_connect("localhost","root","");

if (!$con) {
	echo("Not connected in server");
}

$selectdb=mysqli_select_db($con,'gamingstoresite');

if (!$selectdb) {
echo "BD Not Selected ";
}



if (isset($_POST)) {
	
	$username=$_POST['username'];
	$password=$_POST['password'];

	$sql1="select * from users where username='$username' and password='$password'";

	$result=mysqli_query($con,$sql1);

	if (mysqli_num_rows($result) > 0) {
	     	
	     	$_SESSION["username"]=$username;
                header("Location: session.php");exit();
	     }     
	else {

		    echo "<div class='alert alert-danger'>
             <strong>ereur!</strong>The username/Password  Incorrect !! Try with a different.</div>";

        session_destroy();

	}
}


?>