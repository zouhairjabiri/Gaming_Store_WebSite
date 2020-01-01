<?php
session_start();
$con=mysqli_connect("localhost","root","");

$selectdb=mysqli_select_db($con,'gamingstoresite');

$username=$_SESSION['username'];
 $sql2="select id From users where username='$username'";              
 $id=mysqli_query($con,$sql2);
foreach ($id as $value) { $id_user=$value['id'];}

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

<body style="background-image:url(&quot;assets/img/324862.jpg&quot;);background-attachment:fixed;background-position:center center;background-size:cover;">
    <div>
        <div class="header-dark" style="background-color:transparent;">
            <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search" style="background-color:transparent;height:64px;">
                <div class="container"><a class="navbar-brand" href="session.php" style="color:#ff5400;">Gaming Store</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div
                        class="collapse navbar-collapse" id="navcol-1">
                        <ul class="nav navbar-nav">
                            <li class="nav-item" role="presentation"><a class="nav-link" href="session.php">Home</a></li>
                            <li class="dropdown"><a class="dropdown-toggle nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">Categories</a>
                                <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#Most Popular">Most Popular</a><a class="dropdown-item" role="presentation" href="#New Games">New Games</a><a class="dropdown-item" role="presentation" href="#Upcoming Releases">Upcoming Releases</a></div>
                            </li>
                        </ul>
                        <form class="form-inline mr-auto" target="_self">
                            <div class="form-group" style="margin-left:70px;"><label for="search-field"></label><input class="form-control search-field" type="search" name="search" id="search-field"><i class="fa fa-search"></i></div>
                        </form>
                        <span class="navbar-text" style="height:47px;">Hello, <?php echo $_SESSION['username'];  ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="Log_Out.php" class="login">Log Out</a>
                            <a href="panier.php">
                            <button class="btn btn-warning" name="">
                                
                                    <i class="fa fa-shopping-cart fa-fw fa-1x"></i>
                                
                            </button>
                            </a>

                                 <button class="btn btn-primary" name="">
                                <span class="glyphicon  glyphicon-shopping-cart">
                                    
                                </span> Items : <?php 
                                                 $sql="SELECT * FROM `commande` where id_users='$id_user'";
                                                 $commande=mysqli_query($con,$sql);
                                                 $num_rows=mysqli_num_rows($commande);
                                                 echo $num_rows;
                                                 ?>
                                             </button>
                            </br></br>


                        </span>
                    </div>
        </div>
        </nav>
    </div>
    <div>
        <div class="carousel slide" data-ride="carousel" id="carousel-1" style="width:70%;height:20%;margin:10px;margin-left:auto;margin-right:auto;">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active"><img class="w-100 d-block" src="assets/img/assassin-039-s-creed-origins-3840x2160-assassins-creed-origins-the-hidden-ones-dlc-2018-4k-8k-12423.jpg" alt="Slide Image" style="height:560px;"></div>
                <div class="carousel-item"><img class="w-100 d-block" src="assets/img/god-of-war-3840x2160-kratos-atreus-collectors-edition-playstation-4-13190.jpg" alt="Slide Image" style="height:560px;"></div>
                <div class="carousel-item"><img class="w-100 d-block" src="assets/img/FarCry5Wallpaper5.jpg" alt="Slide Image" style="height:560px;"></div>
            </div>
            <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button"
                    data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
            <ol class="carousel-indicators">
                <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-1" data-slide-to="1"></li>
                <li data-target="#carousel-1" data-slide-to="2"></li>
            </ol>
        </div>
    </div>
    </div>
    <div>
        <div class="header-dark" style="background-color:transparent;margin-bottom:35px;background-image:url(&quot;none&quot;);margin-top:40px;"><h1 id="Most Popular" class="text-center text-white" style="margin:0px;padding:25px;">Most Popular</h1>
            <div class="card-deck m-auto" style="width:65%;height:420px;">
                <?php 
                $sql="select * from products where genre='Most_Popular'";
                $result=mysqli_query($con,$sql);
                foreach ($result as $item ) {
                    $product_id=$item['product_id'];
                    echo '<div class="card"><img class="card-img-top w-100 d-block" src="'.$item['img'].'"><div class="card-body">
                        <h4 class="card-title" style="margin-top:-0.9rem;margin-bottom:8px;">'.$item['product_name'].'</h4>
                        <p class="card-text" style="margin-bottom:0rem;">Out on : '.$item['release_date'].'<br></p>
                        <p class="card-text">Price : '.$item['product_price'].' £</p>
                        <a href="addpan.php?a= '.$item['product_id'].'">
                        <button class="btn btn-primary" type="button" style="margin-top:-5px;background-color:#ff5400;">BUY</button></a></div>
                </div>';

                }

                ?>

                
            </div>
        </div>
        <div class="header-dark" style="background-color:transparent;margin-bottom:35px;background-image:url(&quot;none&quot;);margin-top:40px;"><h1 id="New Games" class="text-center text-white" style="margin:0px;padding:25px;">New Games</h1>
            <div class="card-deck m-auto" style="width:65%;height:420px;">
               <?php 
                $sql="select * from products where genre='New_Games'";
                $result=mysqli_query($con,$sql);
                foreach ($result as $item ) {
                    echo '<div class="card"><img class="card-img-top w-100 d-block" src="'.$item['img'].'"><div class="card-body">
                        <h4 class="card-title" style="margin-top:-0.9rem;margin-bottom:8px;">'.$item['product_name'].'</h4>
                        <p class="card-text" style="margin-bottom:0rem;">Out on : '.$item['release_date'].'<br></p>
                        <p class="card-text">Price : '.$item['product_price'].' £</p><a href="addpan.php?a='.$item['product_id'].'"><button class="btn btn-primary" type="button" style="margin-top:-5px;background-color:#ff5400;">BUY</button></a></div>
                </div>';

                }

                ?>
            </div>
        </div>
        <div class="header-dark" style="background-color:transparent;margin-bottom:75px;background-image:url(&quot;none&quot;);margin-top:40px;"><h1 id="Upcoming Releases" class="text-center text-white" style="margin:0px;padding:25px;">Upcoming Games</h1>
            <div class="card-deck m-auto" style="width:65%;height:420px;">
                <?php 
                $sql="select * from products where genre='Upcoming_Games'";
                $result=mysqli_query($con,$sql);
                foreach ($result as $item ) {
                    echo '<div class="card"><img class="card-img-top w-100 d-block" src="'.$item['img'].'"><div class="card-body">
                        <h4 class="card-title" style="margin-top:-0.9rem;margin-bottom:8px;">'.$item['product_name'].'</h4>
                        <p class="card-text" style="margin-bottom:0rem;">Out on : '.$item['release_date'].'<br></p>
                        <p class="card-text">Price : '.$item['product_price'].' £</p><a href="addpan.php?a='.$item['product_id'].'"><button class="btn btn-primary" type="button" style="margin-top:-5px;background-color:#ff5400;">Pre-Order</button></a></div>
                </div>';

                }

                ?>
        </div>
    </div>
    <div class="footer-dark" style="color:#ff5400;background-image:url(&quot;dark_background_2-wallpaper-1920x1080.jpg&quot;);">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="Log In.html" style="color:#ffffff;">Log In</a></li>
                            <li><a href="Sign Up.html" style="color:#ffffff;">Sign Up</a></li>
                            <li><a href="#" style="color:#ffffff;">Help</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 item">
                        <h3>About</h3>
                        <ul>
                            <li><a href="#" style="color:#ffffff;">Company</a></li>
                            <li><a href="#" style="color:#ffffff;">Team</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 item text">
                        <h3>Gaming Store</h3>
                        <p style="color:#ffffff;">Gaming Store is an online content distribution, rights management and communication platform developed by EST Casablanca students. Focused on video games, it allows users to buy games, content for games, manage the multiplayer
                            game and offer community tools around games.</p>
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