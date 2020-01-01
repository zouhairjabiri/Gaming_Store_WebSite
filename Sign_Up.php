<?php
session_start();
$con=mysqli_connect("localhost","root","");

if (!$con) {
    echo("Not connected to the server !!");
}

$selectdb=mysqli_select_db($con,'gamingstoresite');

if (!$selectdb) {
echo "Database Not Selected ";
}


    if (isset($_POST)) {
    
    $username=$_POST['username'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $password=$_POST['password'];

    $sql1="select * from users where username='$username'";
    $result=mysqli_query($con,$sql1);


    if (mysqli_num_rows($result)==0) {

                $sql2="INSERT INTO `users` (`id`, `username`, `email`, `phone`, `address`, `password`) VALUES (NULL, '$username', '$email', '$phone', '$address', '$password');";
                mysqli_query($con,$sql2);
               
                $_SESSION["username"]=$username;
                header("Location: session.php");exit();
         }     

    else {

        echo "The username ".$username." is already taken !! Try a different username.";
        session_destroy();
    }
     
}
?>


