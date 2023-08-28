<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["quantity"]) && is_array($_POST["quantity"])) {
        foreach ($_POST["quantity"] as $product_id => $new_quantity) {
            $product_id = intval($product_id);
            $new_quantity = intval($new_quantity);

            // Validate the new quantity if needed (e.g., check if it's a positive number)

            // Update the cart session variable with the new quantity
            if (isset($_SESSION["cart"][$product_id])) {
                $_SESSION["cart"][$product_id] = $new_quantity;
            }
        }

        // Redirect back to the cart page after updating the cart
        header("Location: cart.php");
        exit;
    }
}
?>
