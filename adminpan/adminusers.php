<?php
session_start();

   $connect = mysqli_connect("localhost", "root", "","gamingstoresite");

    $query = "SELECT * FROM `users`";

    $result=mysqli_query($connect,$query);


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
    <link rel="stylesheet" href="../assets/css/admin.css">

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
                                <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="orders.php">Orders</a><a class="dropdown-item" role="presentation" href="#">Revenue</a><a class="dropdown-item" role="presentation" href="#Upcoming Releases">Mentions</a></div>
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
    <!-- DIV Navbar End -->
 <!-- Gere -->

 <!--Table-->
<table class="table table-hover table-responsive-md tableadmin">

    <!--Table head-->
    <thead>
        <tr>
            <th class="th-lg">
                <i  aria-hidden="true"></i>
                ID</th>
            <th class="th-lg">
                <i class="fa fa-vcard icon" aria-hidden="true"></i>USERNAME</th>
            <th class="th-lg">
                <i class="fa fa-envelope icon" aria-hidden="true"></i>EMAIL</th>
            <th class="th-lg">
                <i class="fa fa-phone icon" aria-hidden="true"></i>PHONE</th>
            <th class="th-lg">
                <i class="fa fa-building icon" aria-hidden="true"></i>ADRESS</th>
            <th class="th-lg">
                <i class="fa fa-lock icon" aria-hidden="true"></i>PASSWORD</th>
            <th class="th-lg">
                <i class="fa fa-gears" aria-hidden="true"></i>Operation</th>
        </tr>
    </thead>
    <!--Table head-->

    <!--Table body-->
    <tbody>
        <?php
                 while($row = mysqli_fetch_array($result)):?>
             <tr>
                 <td><?php echo $row['id'];?></td>
                 <td><?php echo $row['username'];?></td>
                 <td><?php echo $row['email'];?></td>
                 <td><?php echo $row['phone'];?></td>
                 <td><?php echo $row['address'];?></td>
                 <td><?php echo $row['password'];?></td>
                <td>
                <a href="delete.php?delete= <?php echo $row['id']; ?>" class="btn btn-danger btn-sm btnadmin" 
                style="width: 66%;
                margin-bottom: 2%;"
                onclick="return confirm('Are You Sure !!');" >
                       <h6>Delete</h6>
                    </a>         
                </td>

            </tr>
                <?php endwhile; ?>
                <tr>
                <form action="adminusers.php" method="POST">
                 <td>(A.I)</td>
                 <td><input class="form-control is-valid" type="text" name="username" placeholder="UserName" ></td>
                 <td>
                  <input class="form-control is-valid" type="text" name="email" placeholder="email" ></td>
                 <td><input class="form-control is-valid" type="text" name="phone" placeholder="Phone" ></td>
                 <td><input class="form-control is-valid" type="text" name="address" placeholder="Address" ></td>
                 <td><input class="form-control is-valid" type="text" name="password" placeholder="Password" >
                 </td>
                 <td>
                <button type="submit" name="add" class="btn btn-success">Add User</button>
                </from>


                </td>
                </tr>
    </tbody>
    <!--Table body-->

</table>
<!--Table-->
  <button type="submit" name="delall" class="btn btn-danger delall" style="margin-left: 82%;">Delete All Users</button>

<!--  Recuperation ADDD -->
<?php
    if (isset($_POST['add'])) 
    {  

    $username=$_POST['username'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $password=$_POST['password'];

    $sql1="select * from users where username='$username'";
    $result=mysqli_query($connect,$sql1);
 

    if (mysqli_num_rows($result)==0) {

                $sql2="INSERT INTO `users` (`id`, `username`, `email`, `phone`, `address`, `password`) VALUES (NULL, '$username', '$email', '$phone', '$address', '$password');";
                mysqli_query($connect,$sql2);
                $_SESSION["username"]=$username;
                echo "<div class='alert alert-success alertcenter2 alertcenter1'>
                     <strong>Success!</strong>Inserted</div>";
         }     

    else {

        echo "<div class='alert alert-danger alertcenter2 alertcenter1'>
             <strong>ereur!</strong>The username  is already taken !! Try a different username.</div>";

        session_destroy();
    }
    
  }   
?>
 <!-- Recuperation Supprimer TOus -->

<!--  Recuperation ADDD -->
<?php
    if (isset($_POST['delall'])) 
    {  

    $sql1="DELETE FROM `users`";
    mysqli_query($connect,$sql1);

    echo "<div class='alert alert-success alertcenter2 alertcenter1'>
           <strong>Success!</strong>ALl Users Delete</div>";

  }  
?>

    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>