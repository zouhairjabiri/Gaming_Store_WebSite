<?php
session_start();
if(!$_SESSION['admin']){
    header("location: error.php");exit();
}
$link = mysqli_connect("localhost","root","");
mysqli_select_db($link,"gamingstoresite");
                        
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
    <link rel="stylesheet" href="assets/css/admin.css">

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body style="background-image:url(&quot;assets/img/324862.jpg&quot;);background-attachment:fixed;background-position:center center;background-size:cover;">
    <div>
        <div class="header-dark" style="background-color:transparent;">
            <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search" style="background-color:transparent;height:64px;">
                <div class="container"><a class="navbar-brand" href="admin.php" style="color:#ff5400;">Gaming Store</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div
                        class="collapse navbar-collapse" id="navcol-1">
                        <ul class="nav navbar-nav">
                            <li class="nav-item" role="presentation"><a class="nav-link" href="admin.php">Home</a></li>
                            <li class="dropdown"><a class="dropdown-toggle nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">Options</a>
                                <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="adminpan/adminusers.php">Users</a><a class="dropdown-item" role="presentation" href="adminpan/orders.php">Orders</a><a class="dropdown-item" role="presentation" href="#">Revenue</a><a class="dropdown-item" role="presentation" href="#Upcoming Releases">Mentions</a></div>
                            </li>
                        </ul>
                        <form class="form-inline mr-auto" target="_self">
                            <div class="form-group" style="margin-left:70px;"><label for="search-field"></label><input class="form-control search-field" type="search" name="search" id="search-field"><i class="fa fa-search"></i></div>
                        </form>
                        <span class="navbar-text" style="height:47px;">Hello,
                         <?php echo "Mr Admin"  ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="Log_Out.php" class="login">Log Out</a>
                        </br></br>


                        </span>
                    </div>
        </div>
        </nav>
    </div>
    <!-- DIV Navbar End -->

    
    <!-- begin SIDE NAV USER PANEL -->     
            <div class="row admincenter col-lg-12" style="margin-left: 0.05px">
                    <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading dark-blue">
                                    <i class="fa fa-users fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content dark-blue">
                                <div class="circle-tile-description text-faded">
                                    Users
                                </div>
                        <div class="circle-tile-number text-faded">       
                         <?php
                         $sql="SELECT * FROM `users`";
                         $result=mysqli_query($link,$sql);
                         $num_rows=mysqli_num_rows($result);
                         echo $num_rows;
                         ?>
                        <span id="sparklineA"></span>
                        </div>
                                <a href="adminpan/adminusers.php" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile">
                            <a href="adminpan/orders.php">
                                <div class="circle-tile-heading red">
                                    <i class="fa fa-shopping-cart fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content red">
                                <div class="circle-tile-description text-faded">
                                    Orders
                                </div>
                                <div class="circle-tile-number text-faded">
                                    <?php
                                     $sql="SELECT * FROM `commande`";
                                     $result=mysqli_query($link,$sql);
                                     $num_rows=mysqli_num_rows($result);
                                     echo $num_rows;
                                     ?>
                                    <span id="sparklineC"></span>
                                </div>
                                <a href="adminpan/orders.php" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading green">
                                    <i class="fa fa-money fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content green">
                                <div class="circle-tile-description text-faded">
                                    Revenue
                                </div>
                                <div class="circle-tile-number text-faded">
                                    <?php
                                    $sql="SELECT  round(sum(product_price),2) as price FROM `commande` INNER join products where commande.product_id=products.product_id
                                    ";
                                      $result=mysqli_query($link,$sql);
                                      foreach ($result as  $value) {
                                         echo $value['price']." €";
                                      }


                                      ?>
                                </div>
                                <a href="#" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading purple">
                                    <i class="fa fa-comments fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content purple">
                                <div class="circle-tile-description text-faded">
                                    Mentions
                                </div>
                                <div class="circle-tile-number text-faded">
                                    96
                                    <span id="sparklineD"></span>
                                </div>
                                <a href="#" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                                                     
     
        

    


 

    
    
    <script src="js/jquery-3.1.1.js"></script>    
    <script src="js/bootstrap.js"></script>
    


<script type="text/javascript">
    $(document).ready(function(){
        $(".sidebar-toggle").click(function(){
            $(this).hide();
            
           $("#user-profil").show();
            
           $("#hide-btn").show();
            
           $(".container-2").css("width", "85%");
            
             
        });
        
        $("#hide-btn").click(function(){
            $(this).hide();
            
           $("#user-profil").hide();
            
           $(".sidebar-toggle").show();
            
           $(".container-2").css("width", "100%");
            
             
        });
    });
</script>

    
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>