<?php
session_start();
$con = mysqli_connect("localhost", "root","","gamingstoresite");
$username=$_SESSION['username'];
 $sql2="select id From users where username='$username'";              
 $id=mysqli_query($con,$sql2);
foreach ($id as $value) { $id_user=$value['id'];}

$id_produit=$_GET['a'];
echo "id Produit is".$id_produit."<br>"."<br>"."<br>";
echo "id user Is".$id_user."<br>"."<br>"."<br>";
if(isset($_GET['a']))
{

mysqli_query($con,"INSERT INTO `commande` (`id_commande`, `id_users`, `product_id`) VALUES (NULL, '$id_user', '$id_produit');");
header("location:session.php");


}


?>