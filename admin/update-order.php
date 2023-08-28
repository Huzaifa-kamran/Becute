<?php 
include "header.php";
include "config.php";
$orders = "SELECT * FROM `orders`";
$res = mysqli_query($conn,  $orders);
if (isset($_GET['updateid'])) {
    $id = $_GET['updateid'];

    $orders = "SELECT * FROM `orders` WHERE `orderID` = $id";
    $ordersRes = mysqli_query($conn, $orders);
    $data = mysqli_fetch_assoc($ordersRes);
}



?>
