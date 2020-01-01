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
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GamingStoreSite</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abel">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Acme">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/Header-Dark.css">
    <link rel="stylesheet" href="assets/css/OcOrato---Login-form.css">
    <link rel="stylesheet" href="assets/css/OcOrato---Login-form1.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="background-image:url(&quot;assets/img/322798.jpg&quot;);">
    <div>
        <div class="header-dark" style="background-color:transparent;">
            <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search" style="background-color:transparent;">
                <div class="container"><a class="navbar-brand" href="Home.php" style="color:#ff5400;">Gaming Store</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div
                        class="collapse navbar-collapse" id="navcol-1">
                        <ul class="nav navbar-nav">
                            <li class="nav-item" role="presentation"><a class="nav-link" href="Home.php">Home</a></li>
                        </ul>
                        <form class="form-inline mr-auto" target="_self">
                            <div class="form-group" style="margin-left:210px;"><label for="search-field"></label><input class="form-control search-field" type="search" name="search" id="search-field"><i class="fa fa-search"></i></div>
                        </form><span class="navbar-text"></span><a class="btn btn-light action-button" role="button" href="Log In.php" style="background-color:#ff5400;">Log In</a></div>
        </div>
        </nav>
    </div>
    </div>
    <div class="register-photo" style="background-image:url(&quot;none&quot;);background-color:transparent;">
        <div class="form-container">
            <div class="image-holder" style="background-image:url(&quot;assets/img/46409.jpg&quot;);"></div>
            <form method="post" action="Sign Up.php">
                <h2 class="text-center"><strong>Create</strong> an account.</h2>

<?php
    if (isset($_POST['signupbutton'])) {
    if (isset($_POST['agree'])) {
      
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
        echo "<div class='alert alert-danger'>
             <strong>Error !! </strong>the username is already taken, try a different username.</div>";

        session_destroy();
    }
  }   
  else{
  	echo "<div class='alert alert-danger'>
             <strong>Error !! </strong>you must check the licence agreement.</div>";

        session_destroy();
  }
}
?>

                <div class="form-group"><input class="form-control" type="text" name="username" placeholder="Username" required></div>
                <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email" required></div>
                <div class="form-group"><input class="form-control" type="text" name="phone" placeholder="Phone Number" required></div>
                <div class="form-group"><input class="form-control" type="text" name="address" placeholder="Address" required></div>
                <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" required></div>
                <div class="form-group">
                    <div class="form-check">
                    	<label class="form-check-label">
                    		<input class="form-check-input" name="agree" type="checkbox" >I agree to the license terms.</label></div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit" name="signupbutton" style="background-color:#ff5400;">Sign Up</button></div><a href="Log In.php" class="already">You already have an account? Login here.</a></form>
        </div>
    </div>
    <div class="footer-dark" style="color:#ff5400;">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="Home.php" style="color:#ffffff;">Home</a></li>
                            <li><a href="Log In.php" style="color:#ffffff;">Log In</a></li>
                            <li><a href="#" style="color:#ffffff;">Help</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 item">
                        <h3>About</h3>
                        <ul>
                            <li><a href="#" style="color:#ffffff;">Company</a></li>
                            <li><a href="#" style="color:#ffffff;">Team</a></li>
                            <li style="color:#ffffff;"></li>
                        </ul>
                    </div>
                    <div class="col-md-6 item text">
                        <h3>Gaming Store</h3>
                        <p style="color:#ffffff;">Gaming Store is an online content distribution, rights management and communication platform developed by EST Casablanca students. Focused on video games, it allows users to buy games, content for games, manage the multiplayer
                            game and offer community<br> tools around games.<br></p>
                    </div>
                    <div class="col item social"><a href="#" style="background-color:#ff5400;"><i class="icon ion-social-facebook"></i></a><a href="#" style="background-color:#ff5400;"><i class="icon ion-social-twitter" style="color:#ffffff;"></i></a><a href="#" style="background-color:#ff5400;"><i class="icon ion-social-snapchat" style="color:#ffffff;"></i></a>
                        <a
                            href="#" style="background-color:#ff5400;"><i class="icon ion-social-instagram" style="color:#ffffff;"></i></a>
                    </div>
                </div>
                <p class="copyright" style="font-size:20px;">Company GamingStore © 2018</p>
            </div>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>