<?php
session_start();

if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // Check if the product exists in the wishlist
    if (in_array($product_id, $_SESSION['wishlist'])) {
        // Remove the product from the wishlist
        $index = array_search($product_id, $_SESSION['wishlist']);
        unset($_SESSION['wishlist'][$index]);
        // Optional: You can re-index the array to avoid gaps in the indices
        $_SESSION['wishlist'] = array_values($_SESSION['wishlist']);

        // Show JavaScript alert and redirect to wishlist.php
        echo '<script>';
        echo 'alert("Product removed from wishlist.");';
        echo 'window.location.href = "wishlist.php";';
        echo '</script>';
        exit; // Exit the script after performing the redirect
    } else {
        // Product not found in the wishlist

        // Show JavaScript alert and redirect to wishlist.php
        echo '<script>';
        echo 'alert("Product not found in the wishlist.");';
        echo 'window.location.href = "wishlist.php";';
        echo '</script>';
        exit; // Exit the script after performing the redirect
    }
} else {
    // Invalid request or product ID not provided

    // Show JavaScript alert and redirect to wishlist.php
    echo '<script>';
    echo 'alert("Invalid request.");';
    echo 'window.location.href = "wishlist.php";';
    echo '</script>';
    exit; // Exit the script after performing the redirect
}
?>
