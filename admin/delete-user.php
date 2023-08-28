<?php
include "config.php";
session_start();

if (!isset($_SESSION['admin'])) {
    echo "<script> window.location.href = 'adminlogin.php' </script>";
}

if (isset($_GET['delid'])) {
    $id = $_GET['delid'];

    // Check if the user has any associated orders
    $check_orders_query = "SELECT COUNT(*) AS order_count FROM `orders` WHERE `customerID` = $id";
    $result = mysqli_query($conn, $check_orders_query);
    if ($result && $row = mysqli_fetch_assoc($result)) {
        $order_count = $row['order_count'];
        if ($order_count > 0) {
            echo "<script> alert('Cannot delete user. User has placed orders.') </script>";
            echo "<script> window.location.href = 'users.php' </script>";
        } else {
            // No orders associated with the user, proceed to delete the user
            $delete_user_query = "DELETE FROM `users` WHERE `userID` = $id";
            if (mysqli_query($conn, $delete_user_query)) {
                echo "<script> alert('User deleted') </script>";
                echo "<script> window.location.href = 'users.php' </script>";
            } else {
                echo "<script> alert('Error deleting user') </script>";
                echo "<script> window.location.href = 'users.php' </script>";
            }
        }
    } else {
        echo "<script> alert('Error checking associated orders') </script>";
        echo "<script> window.location.href = 'users.php' </script>";
    }
}
?>
<?php
include "config.php";
session_start();

if (!isset($_SESSION['admin'])) {
    echo "<script> window.location.href = 'adminlogin.php' </script>";
}

if (isset($_GET['delid'])) {
    $id = $_GET['delid'];

    // Check if the user has any associated orders
    $check_orders_query = "SELECT COUNT(*) AS order_count FROM `orders` WHERE `customerID` = $id";
    $result = mysqli_query($conn, $check_orders_query);
    if ($result && $row = mysqli_fetch_assoc($result)) {
        $order_count = $row['order_count'];
        if ($order_count > 0) {
            echo "<script> alert('Cannot delete user. User has placed orders.') </script>";
            echo "<script> window.location.href = 'users.php' </script>";
        } else {
            // No orders associated with the user, proceed to delete the user
            $delete_user_query = "DELETE FROM `users` WHERE `userID` = $id";
            if (mysqli_query($conn, $delete_user_query)) {
                echo "<script> alert('User deleted') </script>";
                echo "<script> window.location.href = 'users.php' </script>";
            } else {
                echo "<script> alert('Error deleting user') </script>";
                echo "<script> window.location.href = 'users.php' </script>";
            }
        }
    } else {
        echo "<script> alert('Error checking associated orders') </script>";
        echo "<script> window.location.href = 'users.php' </script>";
    }
}
?>
