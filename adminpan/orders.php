<?php
session_start();

   $connect = mysqli_connect("localhost", "root", "","gamingstoresite");


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GamingStoreSite</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abel">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Acme">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand">
    <link rel="stylesheet" href="../assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="../assets/css/Header-Dark.css">
    <link rel="stylesheet" href="../assets/css/OcOrato---Login-form.css">
    <link rel="stylesheet" href="../assets/css/OcOrato---Login-form1.css">
    <link rel="stylesheet" href="../assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/panier.css">
    <script src="https://use.fontawesome.com/c560c025cf.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style type="text/css">
    .orders{

        margin-top: 30Px;
    }

</style>
</head>

<body style="background-image:url(&quot;../assets/img/324862.jpg&quot;);background-attachment:fixed;background-position:center center;background-size:cover;">
    <div>
        <div class="header-dark" style="background-color:transparent;">
            <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search" style="background-color:transparent;height:64px;">
                <div class="container"><a class="navbar-brand" href="../admin.php" style="color:#ff5400;">Gaming Store</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div
                        class="collapse navbar-collapse" id="navcol-1">
                        <ul class="nav navbar-nav">
                            <li class="nav-item" role="presentation"><a class="nav-link" href="../admin.php">Home</a></li>
                            <li class="dropdown"><a class="dropdown-toggle nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">Options</a>
                                <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="adminusers.php">Users</a><a class="dropdown-item" role="presentation" href="#">Revenue</a><a class="dropdown-item" role="presentation" href="#Upcoming Releases">Messages</a></div>
                            </li>
                        </ul>
                        <form class="form-inline mr-auto" target="_self">
                            <div class="form-group" style="margin-left:70px;"><label for="search-field"></label>
                              <input class="form-control search-field" type="search" name="search" id="search-field"><i class="fa fa-search"></i></div>
                        </form>
                        <span class="navbar-text" style="height:47px;">Hello,
                         <?php echo "Mr Admin"  ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="../Log_Out.php" class="login">Log Out</a>
                        </br></br>


                        </span>
                    </div>
        </div>
        </nav>
    </div>
    <!-- contenu -->

<div class="container" style="margin-bottom: 120px">
   <div class="card shopping-cart">
            <div class="card-header bg-dark text-light">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
               &nbsp;All Orders
                <a href="../admin.php" class="btn btn-outline-info btn-sm pull-right">Dashboard</a>
                <div class="clearfix"></div>
            </div>
            <div class="card-body order">
                    <!-- PRODUCT -->
                  <?php 
                    $sql="SELECT * FROM ( 
                    (users INNER JOIN commande on (users.id=commande.id_users)
                    INNER join products on commande.product_id = products.product_id))";

                    $result=mysqli_query($connect,$sql);  
                    foreach ($result as $item ) {
                    echo ' <div class="row">
                            <div class="col-12 col-sm-12 col-md-2 text-center">
                                <img class="img-responsive" src="../'.$item['img'].'" alt="prewiew" width="145" height="190">
                        </div>
                        <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                            <h4 class="product-name"><strong>'.$item['product_name'].'</strong></h4>
                            <h5>User id : '.$item['id_users'].'</h5>
                          
                        </div>
                        <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                            <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                                <h6><strong>'.$item['product_price'].' € </strong></h6>
                            </div>
                            <div class="col-4 col-sm-4 col-md-4">
                                <a href="#">
                                        <button class="btn btn-success" name="" style="margin-top: 110px;    margin-left: -64px;">
                                        More Details
                                            
                                      </button>
                                     </a> 
                            </div>
                            <div class="col-2 col-sm-2 col-md-2 text-right">
                                <a href="dltorder.php"><button type="button" class="btn btn-outline-danger btn-xs">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button></a>
                            </div>
                        </div>
                    </div>
                    <hr> ';

                }
            
                ?>
                                      
                    <!-- END PRODUCT -->
               
            </div>
        </div>
</div>
 <!-- end contenu -->





    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>