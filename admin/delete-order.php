<?php 

include "config.php";
session_start();
if(!isset($_SESSION['admin'])){


    echo "<script> window.location.href = 'adminlogin.php' </script>";

}
if(isset($_GET['delid'])){
$id = $_GET['delid'];
$query = "DELETE FROM `orders` WHERE `orders`.`orderID` = $id";
if(mysqli_query($conn , $query)){
  
    echo "<script> alert('orders deleted') </script>";
    echo "<script> window.location.href = 'orders.php' </script>";
    }

}



?>