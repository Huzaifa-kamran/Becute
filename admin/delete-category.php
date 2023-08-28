<?php
include "config.php";
session_start();

if (!isset($_SESSION['admin'])) {
    echo "<script> window.location.href = 'adminlogin.php' </script>";
    exit();
}

if (isset($_GET['delid'])) {
    $id = $_GET['delid'];

    // Check if there are associated products with the category
    $checkProductsQuery = "SELECT COUNT(*) FROM products WHERE catID = $id";
    $result = mysqli_query($conn, $checkProductsQuery);
    $row = mysqli_fetch_array($result);
    $productCount = $row[0];

    if ($productCount > 0) {
        echo "<script> alert('Cannot delete the category. There are associated products.'); </script>";
        echo "<script> window.location.href = 'categories.php'; </script>";
        exit();
    }

    // Delete the category
    $deleteCategoryQuery = "DELETE FROM categories WHERE catID = $id";

    if (mysqli_query($conn, $deleteCategoryQuery)) {
        echo "<script> alert('Category deleted.'); </script>";
        echo "<script> window.location.href = 'categories.php'; </script>";
        exit();
    } else {
        echo "Error deleting category: " . mysqli_error($conn);
    }
}

?>
