<?php
// Start the session (if not already started)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Assuming $_SESSION['wishlist'] contains an array of product IDs
if (!isset($_SESSION['wishlist'])) {
    $_SESSION['wishlist'] = array();
}
$wishlistItems = $_SESSION['wishlist'];

// Include your database connection file
include('config.php');

// Function to get product details by ID from the database
function getProductDetails($conn, $productID) {
    $query = "SELECT * FROM `products` WHERE `proID` = '$productID'";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
}

?>

<!-- HTML Table to display wishlist items -->
<table border="1">
    <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Description</th>
        <th>Price</th>
    </tr>
    <?php
    foreach ($wishlistItems as $productID) {
        $product = getProductDetails($conn, $productID);
        if ($product) {
            echo "<tr>";
            echo "<td>{$product['proID']}</td>";
            echo "<td>{$product['proName']}</td>";
            echo "<td>{$product['proDesc']}</td>";
            echo "<td>{$product['sellPrice']}</td>";
            echo "</tr>";
        }
    }
    ?>
</table>
