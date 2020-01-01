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
    <link rel="stylesheet" href="assets/css/panier.css">
    <script src="https://use.fontawesome.com/c560c025cf.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

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
                        </ul>
                        <form class="form-inline mr-auto" target="_self">
                            <div class="form-group" style="margin-left:70px;"><label for="search-field"></label><input class="form-control search-field" type="search" name="search" id="search-field"><i class="fa fa-search"></i></div>
                        </form>
                        <span class="navbar-text" style="height:47px;">Hello, <?php echo $_SESSION['username'];  ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="Log_Out.php" class="login">Log Out</a>
                            <button class="btn btn-warning" name="MyBasket">
                                <a href="panier.php" style="color: black"><span class="glyphicon  glyphicon-shopping-cart">
                                    
                                </span> My Basket</button></a>

                                 <button class="btn btn-primary" name="">
                                <span class="glyphicon  glyphicon-shopping-cart">
                                    
                                </span> Item : <?php
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
                         <!-- Contenu -->


<div class="container" style="margin-bottom: 100px">
   <div class="card shopping-cart">
            <div class="card-header bg-dark text-light">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                &nbsp;Shopping Cart
                <a href="session.php" class="btn btn-outline-info btn-sm pull-right">Continue Shopping</a>
                <div class="clearfix"></div>
            </div>
            <div class="card-body">
                    <!-- PRODUCT -->
                  <?php 
                    $sql="SELECT * FROM ( 
                    (users INNER JOIN commande on (users.id =$id_user AND commande.id_users=$id_user)
                    INNER join products on commande.product_id = products.product_id))";

                    $result=mysqli_query($con,$sql);  
                    foreach ($result as $item ) {
                    echo ' <div class="row">
                            <div class="col-12 col-sm-12 col-md-2 text-center">
                                <img class="img-responsive" src="'.$item['img'].'" alt="prewiew" width="145" height="190">
                        </div>
                        <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                            <h4 class="product-name"><strong>'.$item['product_name'].'</strong></h4>
                          
                        </div>
                        <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                            <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                                <h6><strong>'.$item['product_price'].' € <span class="text-muted">&nbsp;x</span></strong></h6>
                            </div>
                            <div class="col-4 col-sm-4 col-md-4">
                                <div class="quantity">
                                    <input type="button" value="+" class="plus">
                                    <input type="number" step="1" max="99" min="1" value="1" title="Qty" class="qty"
                                           size="4">
                                    <input type="button" value="-" class="minus">
                                </div>
                            </div>
                            <div class="col-2 col-sm-2 col-md-2 text-right">
                                <button type="button" class="btn btn-outline-danger btn-xs">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <hr> ';

                }
            
                ?>
                                      
                    <!-- END PRODUCT -->
            </div>
            <div class="card-footer">
                <div class="coupon col-md-5 col-sm-5 no-padding-left pull-left">
                    <div class="pull-left" style="margin: 10px">
                    <a href="panier.php" class="btn btn-outline-secondary pull-left">
                        Refresh
                    </a>
                </div>
                </div>
                <div class="pull-right" style="margin: 10px">
                    <a href="" class="btn btn-success pull-right" style="margin-left: 35px">Confirm</a>
                    <div class="pull-right" style="margin: 8px">
                        Total price: <b><?php
                         $sql="SELECT round(sum(product_price),2) as price FROM `commande` INNER join products  where (commande.product_id=products.product_id) AND (commande.id_users=$id_user);";
                                      $result=mysqli_query($con,$sql);
                                      foreach ($result as  $value) {
                                         echo $value['price']." €";
                                      }

                                      ?> </b>
                    </div>
                </div>
            </div>
        </div>
</div>

<div class="footer-dark" style="color:#ff5400;background-image:url(&quot;dark_background_2-wallpaper-1920x1080.jpg&quot;);">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="Log In.php" style="color:#ffffff;">Log In</a></li>
                            <li><a href="Sign Up.php" style="color:#ffffff;">Sign Up</a></li>
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

                         <!-- End Contenu -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>