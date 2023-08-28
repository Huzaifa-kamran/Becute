<?php
include "header.php";
if (isset($_POST['addToCart'])) {

    if (isset($_POST['proID']) && isset($_POST['quantity'])) {
        $product_id = $_POST['proID'];
        $quantity = $_POST['quantity'];

        // Check if the product is already in the cart
        if (isset($_SESSION['cart'][$product_id])) {
            // echo "<script>alert('Product is already in the cart.')</script>";
            $message = '';
            echo "<script>window.location.href = 'index.php?status=2'</script>";
            exit();
        }

        // Add the product to the cart
        $_SESSION['cart'][$product_id] = $quantity;

        // Redirect to the cart page
        // echo "<script>Swal.fire(
        //     'Good job!',
        //     'You clicked the button!',
        //     'success'
        //   )</script>";
        // $message = "Product added to cart successfully.";
        echo "<script>window.location.href = 'index.php?success=1';</script>";
        // Debugging - Display the contents of the cart session variable
// var_dump($_SESSION['cart']);

// Check if the product ID and quantity are received correctly
var_dump($_POST['proID'], $_POST['quantity']);

        exit();
    } else {
        // Return an error response
        echo 'Invalid request.';
    }
}
?>
