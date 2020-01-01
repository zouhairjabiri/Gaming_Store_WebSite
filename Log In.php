<?php
session_start();
$con=mysqli_connect("localhost","root","");

if (!$con) {
    echo("Not connected in server");
}

$selectdb=mysqli_select_db($con,'gamingstoresite');

if (!$selectdb) {
echo "BD Not Selected ";
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
                        </form><span class="navbar-text"></span><a class="btn btn-light action-button" role="button" href="Sign Up.php" style="background-color:#ff5400;">Sign Up</a></div>
        </div>
        </nav>
    </div>
    <form method="post" action="Log In.php" id="form" style="font-family:Quicksand, sans-serif;background-color:rgba(44,40,52,0.73);width:853px;padding:40px; max-width:450px; margin-top:65px; margin-bottom:200px;">
    <h1 id="head" style="color:rgb(255,255,255);">Log In</h1>
    <div></div>

<?php
if (isset($_POST['btn'])) {
    
    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql1="select * from users where username='$username' and password='$password'";

    $result=mysqli_query($con,$sql1);
    
    if ($username=="admin" && $password=="admin") {
               $_SESSION['admin']=true;
               header("Location: admin.php");exit(); 
   }

    elseif (mysqli_num_rows($result) > 0) {
                session_start();
                $_SESSION['username']=$username;
                header("Location: session.php");exit();
         }     
    else {

            echo "<div class='alert alert-danger'>
             <strong>Error !! </strong>the username or password is invalid.</div>";

    }
}
?>
    <div class="form-group"><input type="text" class="form-control" id="formum" name="username" placeholder="Username" /></div>
    <div class="form-group"><input type="password" class="form-control" id="formum2" name="password" placeholder="Password" /></div>
    <button class="btn btn-light btn-sm" type="submit" id="butonas" name="btn" style="width:30%;height:100%;margin-bottom:20px;background-color:#ff5400;color:rgb(255,255,255);">Log In</button>
    <a
        href="#" id="linkas" style="font-size:12px;margin:auto;margin-left:0;margin-right:0;margin-bottom:10px;margin-top:0;padding-left:0;padding-right:0;color:rgb(255,255,255);">Forgot your e mail or password ?</a>
    <a
        href="Sign Up.php" id="linkas" style="font-size:12px;margin:auto;margin-left:0;margin-right:0;margin-bottom:0;margin-top:0;padding-left:0;padding-right:0;color:rgb(255,255,255);">Not a member yet ?</a>
</form></div>
    <div class="footer-dark" style="color:#ff5400;">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="Home.php" style="color:#ffffff;">Home</a></li>
                            <li><a href="Sign Up.php" style="color:#ffffff;">Sign Up</a></li>
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