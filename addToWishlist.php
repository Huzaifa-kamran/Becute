<?php

    session_start();


// Include your database connection file
include "config.php";

// Check if the request is POST and if the product ID is provided
if (isset($_POST['proID'])) {
    $productID = $_POST['proID'];

    // Check if the product ID exists in the database (for security purposes)
    $checkProductQuery = "SELECT * FROM `products` WHERE `proID` = '$productID' AND `inStock` = 1 AND `proStatus` = 1";
    $checkProductResult = mysqli_query($conn, $checkProductQuery);

    if (mysqli_num_rows($checkProductResult) > 0) {
        // Check if the product is not already in the user's wishlist (using session)
        if (!isset($_SESSION['wishlist'])) {
            $_SESSION['wishlist'] = array();
        }

        if (!in_array($productID, $_SESSION['wishlist'])) {
            // Add the product to the wishlist (in the session)
            $_SESSION['wishlist'][] = $productID;
            echo json_encode(array('status' => 'success', 'message' => 'Product added to wishlist.'));
        } else {
            // Product already exists in the wishlist
            echo json_encode(array('status' => 'error', 'message' => 'Product already in the wishlist.'));
        }
    } else {
        // Product does not exist or is not available
        echo json_encode(array('status' => 'error', 'message' => 'Product not found or not available.'));
    }
} else {
    // Invalid request method or product ID not provided
    echo json_encode(array('status' => 'error', 'message' => 'Invalid request.'));
}
