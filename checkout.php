<?php 
include "header.php";
if(! isset($_SESSION['user'])){
    echo "<script> window.location.href = 'login.php?status=0' </script>";
}
if(! isset($_SESSION['cart']) && empty($_SESSION['cart'])){
    echo "<script> window.location.href = 'index.php' </script>";
}


if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {

    // Prepare the query to fetch product details
    $product_ids = array_keys($_SESSION['cart']);
    $placeholders = implode(',', array_fill(0, count($product_ids), '?'));
    $query = "SELECT * FROM `products` WHERE `proID` IN ($placeholders)";
    $stmt = $conn->prepare($query);

    // Bind product IDs as parameters
    $stmt->bind_param(str_repeat('i', count($product_ids)), ...$product_ids);

    // Execute the query
    $stmt->execute();

    // Get the result set
    $result = $stmt->get_result();

}

if(isset($_POST['checkout'])){
$customerID = $_SESSION['userID'];
$orderAmount = $_SESSION['orderAmount'];
$name = $_POST['name'];
$dob = $_POST['dob'];
$address = $_POST['address'];
$email = $_POST['email'];
$workContact = $_POST['workContact'];
$contact = $_POST['contact'];
$paymentType = $_POST['paymentType'];
$pincode = $_POST['pincode'];
$remarks = $_POST['remarks'];

if ($name == "" || $dob == "" || $address == "" || $email == "" || $workContact == "" || $contact == "" || $paymentType == "" || $pincode == "" || $remarks == "") {
    $error = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Please fill all the form fields</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}


else {
        $query = "INSERT INTO `orders` (`customerID`, `customerName`, `dateOfBirth`, `address`, `customerEmail`, 
        `workContact`, `contactNo`, `paymentMethod`, `pinCode`, `remarks`, `orderAmount`, `orderStatus`, `orderDate`) 
        VALUES ('$customerID', '$name', '$dob', '$address', '$email', '$workContact', '$contact', '$paymentType',
         '$pincode', '$remarks', '$orderAmount', '0', current_timestamp())";
        $res = mysqli_query($conn, $query);
        if ($res) {
            
            $orderID = mysqli_insert_id($conn);
            
while ($data = $result->fetch_assoc()) {
    $proID = $data['proID'];
    $proPrice = $data['sellPrice'];
    $quantity = $_SESSION['cart'][$proID];
    $proTotal = $proPrice * $quantity;

    $productQuery = "INSERT INTO `orderdetails` (`orderNumber`, `productID`, `quantityOrdered`, `priceEach`) 
    VALUES ('$orderID', '$proID', '$quantity', '$proTotal')";
    if(mysqli_query($conn, $productQuery)){
        unset($_SESSION['cart']);
echo "<script> window.location.href = 'index.php?action=order' </script>";

    }else{
        echo "<script> alert('Wrong') </script>";
    }

}

        } else {
            echo "<script> alert('error') </script>";
            echo "<script> window.location.href = 'signup.php' </script>";
        }

    }

}
?>
    
    <main class="main__content_wrapper">
<?php echo @$error?>
        <!-- Start breadcrumb section -->
        <div class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content text-center">
                            <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                <li class="breadcrumb__content--menu__items"><a href="index.php">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span>Checkout</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End breadcrumb section -->

        <!-- Start checkout page area -->
        <div class="checkout__page--area section--padding">
         <form action="checkout.php" method="post">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-6">
                        <div class="main checkout__mian">
                            
                                <div class="checkout__content--step section__contact--information">
                                    <div class="checkout__section--header d-flex align-items-center justify-content-between mb-25">
                                        <h2 class="checkout__header--title h3">Contact information</h2>
                                       
                                    </div>
                                </div>
                                <div class="checkout__content--step section__shipping--address">
                                    <div class="checkout__section--header mb-25">
                                        <h2 class="checkout__header--title h3">Billing Details</h2>
                                    </div>
                                    <div class="section__shipping--address__content">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 mb-20">
                                                <div class="checkout__input--list ">
                                                    <label class="checkout__input--label mb-10" for="input1">Name <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" name="name" placeholder="Name" id="input1"  type="text">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-10" for="input2">Date Of Birth<span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" name="dob" placeholder="Date of birth" id="input2"  type="date">
                                                </div>
                                            </div>
                                          
                                            <div class="col-12 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-10" for="input4">Address <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" name="address" placeholder="Address" id="input4" type="text">
                                                </div>
                                            </div>
                                            <div class="col-12 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-10" for="input3">Email <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" name="email" value="<?php echo $_SESSION['userEmail']?>" placeholder="Email" id="input3" type="email">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 mb-20">
                                                <div class="checkout__input--list ">
                                                    <label class="checkout__input--label mb-10" for="input5">Work Phone No. <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" name="workContact" placeholder="Work Phone No" id="input5"  type="tel">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 mb-20">
                                                <div class="checkout__input--list">
                                                <label class="checkout__input--label mb-10" for="input6">Cell No. <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" name="contact" placeholder="Cell No" id="input6"  type="tel">    
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-10" for="country">Payment Method <span class="checkout__input--label__star">*</span></label>
                                                    <div class="checkout__input--select select">
                                                        <select class="checkout__input--select__field border-radius-5" id="country" name="paymentType">
                                                            <option value="cod">Cash on delevery</option>
                                                            <option value="paypal">Paypal</option>
                                                            <option value="credit card">Credit Card</option>
                                                            <option value="bank transfer">Bank Transfer</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-10" for="input6">Pin Code <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" name="pincode" placeholder="Pin code" id="input6" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-notes mb-20">
                                    <label class="checkout__input--label mb-10" for="order">Order Notes <span class="checkout__input--label__star">*</span></label>
                                   <textarea class="checkout__notes--textarea__field border-radius-5" name="remarks" id="order" placeholder="Notes about your order, e.g. special notes for delivery." spellcheck="false"></textarea>
                                </div>
                                <div class="checkout__content--step__footer d-flex align-items-center">
                                    <a class="continue__shipping--btn primary__btn border-radius-5" href="index.php">Continue To Shipping</a>
                                    <a class="previous__link--content" href="cart.php">Return to cart</a>
                                </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <aside class="checkout__sidebar sidebar border-radius-10">
                            <h2 class="checkout__order--summary__title text-center mb-15">Your Order Summary</h2>
                            <div class="cart__table checkout__product--table">
                                <table class="cart__table--inner">
                                    <tbody class="cart__table--body">

                                    <?php 
                                  
                                  // Display the cart items
                                        $grandTotal = 0;
while ($row = $result->fetch_assoc()) {
    $product_id = $row['proID'];
    $product_img = $row['img1'];
    $product_name = $row['proName'];
    $product_price = $row['sellPrice'];
    $quantity = $_SESSION['cart'][$product_id];
    $proTotal = $product_price * $quantity;
    $grandTotal = $grandTotal + $proTotal;
$_SESSION['orderAmount'] = $grandTotal;
    ?>
                                        <tr class="cart__table--body__items">
                                            <td class="cart__table--body__list">
                                                <div class="product__image two  d-flex align-items-center">
                                                    <div class="product__thumbnail border-radius-5">
                                                        <a class="display-block" href="product-details.php?proID=<?php echo $row['proID']?>"><img class="display-block border-radius-5" src="admin/assets/images/products/<?php echo $product_img; ?>" alt="cart-product"></a>
                                                        <span class="product__thumbnail--quantity"><?php echo $quantity ?></span>
                                                    </div>
                                                    <div class="product__description">
                                                        <h4 class="product__description--name"><a href="product-details.php"><?php echo $product_name ?></a></h4>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cart__table--body__list">
                                                <span class="cart__price">$<?php echo $product_price ?></span>
                                            </td>
                                        </tr>
<?php
}
?>
                                       
                                    </tbody>
                                </table> 
                            </div>
                       
                            <div class="checkout__total">
                                <table class="checkout__total--table">
                                    <tbody class="checkout__total--body">
                                        <tr class="checkout__total--items">
                                            <td class="checkout__total--title text-left">Subtotal </td>
                                            <td class="checkout__total--amount text-right">$<?php echo $grandTotal ?></td>
                                        </tr>
                                    </tbody>
                                    <tfoot class="checkout__total--footer">
                                        <tr class="checkout__total--footer__items">
                                            <td class="checkout__total--footer__title checkout__total--footer__list text-left">Total </td>
                                            <td class="checkout__total--footer__amount checkout__total--footer__list text-right">$<?php echo $grandTotal ?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <button class="checkout__now--btn primary__btn" type="submit" name="checkout">Checkout Now</button>
                        </aside>
                    </div>
                    
                </div>
            </div>
        </form>
        </div>
        <!-- End checkout page area -->

        <!-- Start feature section -->
       <section class="feature__section section--padding pt-0">
            <div class="container">
                <div class="feature__inner d-flex justify-content-between">
                    <div class="feature__items d-flex align-items-center">
                        <div class="feature__icon">  
                            <img src="assets/img/other/feature1.webp" alt="img">
                        </div>
                        <div class="feature__content">
                            <h2 class="feature__content--title h3">Free Shipping</h2>
                            <p class="feature__content--desc">Free shipping over $100</p>
                        </div>
                    </div>
                    <div class="feature__items d-flex align-items-center">
                        <div class="feature__icon ">  
                            <img src="assets/img/other/feature2.webp" alt="img">
                        </div>
                        <div class="feature__content">
                            <h2 class="feature__content--title h3">Support 24/7</h2>
                            <p class="feature__content--desc">Contact us 24 hours a day</p>
                        </div>
                    </div>
                    <div class="feature__items d-flex align-items-center">
                        <div class="feature__icon">  
                            <img src="assets/img/other/feature3.webp" alt="img">
                        </div>
                        <div class="feature__content">
                            <h2 class="feature__content--title h3">100% Money Back</h2>
                            <p class="feature__content--desc">You have 30 days to Return</p>
                        </div>
                    </div>
                    <div class="feature__items d-flex align-items-center">
                        <div class="feature__icon">  
                            <img src="assets/img/other/feature4.webp" alt="img">
                        </div>
                        <div class="feature__content">
                            <h2 class="feature__content--title h3">Payment Secure</h2>
                            <p class="feature__content--desc">We ensure secure payment</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End feature section -->
    </main>

    <!-- Start footer section -->
    <footer class="footer__section footer__bg">
        <div class="container">
            <div class="main__footer section--padding">
                <div class="row ">
                    <div class="col-lg-4 col-md-8">
                        <div class="footer__widget">
                            <h2 class="footer__widget--title d-none d-sm-u-block">About Us <button class="footer__widget--button" aria-label="footer widget button"></button>
                                <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                                    <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                </svg>
                            </h2>
                            <div class="footer__widget--inner">
                                <div class="footer__logo">
                                    <a class="footer__logo--link" href="index.php">
                                        <img class="footer__logo--img" src="assets/img/logo/nav-log.webp" alt="logo-img">
                                    </a>
                                </div>
                                <p class="footer__widget--desc">Corporate clients and leisure travelers has
                                    been relying on Groundlink for dependable
                                    safe, and professional </p>
                                <ul class="footer__widget--info">
                                    <li class="footer__widget--info_list">
                                        <svg class="footer__widget--info__icon" width="20" height="23" viewBox="0 0 20 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18.3334 10.1666C18.3334 14.769 10.0001 20.9999 10.0001 20.9999C10.0001 20.9999 1.66675 14.769 1.66675 10.1666C1.66675 5.56421 5.39771 1.83325 10.0001 1.83325C14.6025 1.83325 18.3334 5.56421 18.3334 10.1666Z" stroke="currentColor" stroke-width="2"></path>
                                        <ellipse cx="10.0001" cy="10.1667" rx="2.5" ry="2.5" stroke="currentColor" stroke-width="2"></ellipse>
                                        </svg>
                                        <span class="footer__widget--info__text">Brooklyn, New York, United States</span>
                                    </li>
                                    <li class="footer__widget--info_list">
                                        <svg class="footer__widget--info__icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.31 1.52371L18.6133 2.11296C18.6133 2.11296 19.2026 7.41627 13.31 13.3088C7.41748 19.2014 2.11303 18.6133 2.11303 18.6133L1.52377 13.31L5.64971 10.9529L7.71153 13.0148C7.71153 13.0148 9.18467 12.7201 10.9524 10.9524C12.7202 9.18461 13.0148 7.71147 13.0148 7.71147L10.953 5.64965L13.31 1.52371Z" stroke="currentColor" stroke-width="2"></path>
                                        </svg>
                                        <a class="footer__widget--info__text" href="tel:+1234567898">: (+123) 456-7898</a>
                                    </li>
                                    <li class="footer__widget--info_list">                                     
                                        <svg class="footer__widget--info__icon" width="24" height="20" viewBox="0 0 24 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.00006 3.33325H22.0001V17.4999H2.00006V3.33325Z" stroke="currentColor" stroke-width="2"></path>
                                            <path d="M3.2655 3.33325H20.7871L12 12.4999L3.2655 3.33325Z" stroke="currentColor" stroke-width="2"></path>
                                        </svg>    
                                        <a class="footer__widget--info__text" href="mailto:example@example.com">example@example.com</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <div class="footer__widget">
                            <h2 class="footer__widget--title ">Our Offer <button class="footer__widget--button" aria-label="footer widget button"></button>
                                <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                                    <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                </svg>
                            </h2>
                            <ul class="footer__widget--menu footer__widget--inner">
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="contact.php">Contact Us</a></li>
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="about.php">About Us</a></li>
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="wishlist.php">Wishlist</a></li>
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="privacy-policy.php">Privacy Policy</a></li>
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="faq.php">Frequently</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-5">
                        <div class="footer__widget">
                            <h2 class="footer__widget--title ">Quick Links <button class="footer__widget--button" aria-label="footer widget button"></button>
                                <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                                    <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                </svg>
                            </h2>
                            <ul class="footer__widget--menu footer__widget--inner">
                                
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="my-account.php">My Account</a></li>
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="cart.php">Shopping Cart</a></li>
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="login.php">Login</a></li>
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="login.php">Register</a></li>
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="checkout.php">Checkout</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-7">
                        <div class="footer__widget">
                            <h2 class="footer__widget--title ">Newsletter <button class="footer__widget--button" aria-label="footer widget button"></button>
                                <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                                    <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                </svg>
                            </h2>
                            <div class="footer__widget--inner">
                                <p class="footer__widget--desc">Subscribe to our weekly Newsletter and receive updates via email.</p>
                                <div class="newsletter__subscribe footer__newsletter">
                                    <form class="newsletter__subscribe--form" action="#">
                                        <label>
                                            <input class="newsletter__subscribe--input" placeholder=" Enter Your Email" type="text">
                                        </label>
                                        <button class="newsletter__subscribe--button" type="submit">Subscribe</button>
                                    </form>   
                                </div> 
                                <ul class="social__share footer__social d-flex">
                                    <li class="social__share--list">
                                        <a class="social__share--icon" target="_blank" href="https://www.facebook.com">
                                            <svg width="11" height="17" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7.62891 8.625L8.01172 6.10938H5.57812V4.46875C5.57812 3.75781 5.90625 3.10156 7 3.10156H8.12109V0.941406C8.12109 0.941406 7.10938 0.75 6.15234 0.75C4.15625 0.75 2.84375 1.98047 2.84375 4.16797V6.10938H0.601562V8.625H2.84375V14.75H5.57812V8.625H7.62891Z" fill="currentColor"/>
                                            </svg>
                                            <span class="visually-hidden">Facebook</span>
                                        </a>
                                    </li>
                                    <li class="social__share--list">
                                        <a class="social__share--icon" target="_blank" href="https://twitter.com">
                                            <svg width="16" height="14" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12.5508 2.90625C13.0977 2.49609 13.5898 2.00391 13.9727 1.42969C13.4805 1.64844 12.9062 1.8125 12.332 1.86719C12.9336 1.51172 13.3711 0.964844 13.5898 0.28125C13.043 0.609375 12.4141 0.855469 11.7852 0.992188C11.2383 0.417969 10.5 0.0898438 9.67969 0.0898438C8.09375 0.0898438 6.80859 1.375 6.80859 2.96094C6.80859 3.17969 6.83594 3.39844 6.89062 3.61719C4.51172 3.48047 2.37891 2.33203 0.957031 0.609375C0.710938 1.01953 0.574219 1.51172 0.574219 2.05859C0.574219 3.04297 1.06641 3.91797 1.85938 4.4375C1.39453 4.41016 0.929688 4.30078 0.546875 4.08203V4.10938C0.546875 5.50391 1.53125 6.65234 2.84375 6.92578C2.625 6.98047 2.35156 7.03516 2.10547 7.03516C1.91406 7.03516 1.75 7.00781 1.55859 6.98047C1.91406 8.12891 2.98047 8.94922 4.23828 8.97656C3.25391 9.74219 2.02344 10.207 0.683594 10.207C0.4375 10.207 0.21875 10.1797 0 10.1523C1.25781 10.9727 2.76172 11.4375 4.40234 11.4375C9.67969 11.4375 12.5508 7.08984 12.5508 3.28906C12.5508 3.15234 12.5508 3.04297 12.5508 2.90625Z" fill="currentColor"/>
                                            </svg>
                                            <span class="visually-hidden">Twitter</span>
                                        </a>
                                    </li>
                                    <li class="social__share--list">
                                        <a class="social__share--icon" target="_blank" href="https://www.instagram.com">
                                            <svg width="16" height="15" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7.125 3.60547C5.375 3.60547 3.98047 5.02734 3.98047 6.75C3.98047 8.5 5.375 9.89453 7.125 9.89453C8.84766 9.89453 10.2695 8.5 10.2695 6.75C10.2695 5.02734 8.84766 3.60547 7.125 3.60547ZM7.125 8.80078C6.00391 8.80078 5.07422 7.89844 5.07422 6.75C5.07422 5.62891 5.97656 4.72656 7.125 4.72656C8.24609 4.72656 9.14844 5.62891 9.14844 6.75C9.14844 7.89844 8.24609 8.80078 7.125 8.80078ZM11.1172 3.49609C11.1172 3.08594 10.7891 2.75781 10.3789 2.75781C9.96875 2.75781 9.64062 3.08594 9.64062 3.49609C9.64062 3.90625 9.96875 4.23438 10.3789 4.23438C10.7891 4.23438 11.1172 3.90625 11.1172 3.49609ZM13.1953 4.23438C13.1406 3.25 12.9219 2.375 12.2109 1.66406C11.5 0.953125 10.625 0.734375 9.64062 0.679688C8.62891 0.625 5.59375 0.625 4.58203 0.679688C3.59766 0.734375 2.75 0.953125 2.01172 1.66406C1.30078 2.375 1.08203 3.25 1.02734 4.23438C0.972656 5.24609 0.972656 8.28125 1.02734 9.29297C1.08203 10.2773 1.30078 11.125 2.01172 11.8633C2.75 12.5742 3.59766 12.793 4.58203 12.8477C5.59375 12.9023 8.62891 12.9023 9.64062 12.8477C10.625 12.793 11.5 12.5742 12.2109 11.8633C12.9219 11.125 13.1406 10.2773 13.1953 9.29297C13.25 8.28125 13.25 5.24609 13.1953 4.23438ZM11.8828 10.3594C11.6914 10.9062 11.2539 11.3164 10.7344 11.5352C9.91406 11.8633 8 11.7812 7.125 11.7812C6.22266 11.7812 4.30859 11.8633 3.51562 11.5352C2.96875 11.3164 2.55859 10.9062 2.33984 10.3594C2.01172 9.56641 2.09375 7.65234 2.09375 6.75C2.09375 5.875 2.01172 3.96094 2.33984 3.14062C2.55859 2.62109 2.96875 2.21094 3.51562 1.99219C4.30859 1.66406 6.22266 1.74609 7.125 1.74609C8 1.74609 9.91406 1.66406 10.7344 1.99219C11.2539 2.18359 11.6641 2.62109 11.8828 3.14062C12.2109 3.96094 12.1289 5.875 12.1289 6.75C12.1289 7.65234 12.2109 9.56641 11.8828 10.3594Z" fill="currentColor"/>
                                            </svg>  
                                            <span class="visually-hidden">Instagram</span>
                                        </a>
                                    </li>
                                    <li class="social__share--list">
                                        <a class="social__share--icon" target="_blank" href="https://www.pinterest.com">
                                            <svg width="16" height="17" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.5625 7.75C13.5625 4.00391 10.5273 0.96875 6.78125 0.96875C3.03516 0.96875 0 4.00391 0 7.75C0 10.6484 1.77734 13.082 4.29297 14.0664C4.23828 13.5469 4.18359 12.7266 4.32031 12.125C4.45703 11.6055 5.11328 8.76172 5.11328 8.76172C5.11328 8.76172 4.92188 8.35156 4.92188 7.75C4.92188 6.82031 5.46875 6.10938 6.15234 6.10938C6.72656 6.10938 7 6.54688 7 7.06641C7 7.64062 6.61719 8.51562 6.42578 9.33594C6.28906 9.99219 6.78125 10.5391 7.4375 10.5391C8.64062 10.5391 9.57031 9.28125 9.57031 7.44922C9.57031 5.80859 8.39453 4.6875 6.75391 4.6875C4.8125 4.6875 3.69141 6.13672 3.69141 7.61328C3.69141 8.21484 3.91016 8.84375 4.18359 9.17188C4.23828 9.22656 4.23828 9.30859 4.23828 9.36328C4.18359 9.58203 4.04688 10.0469 4.04688 10.1289C4.01953 10.2656 3.9375 10.293 3.80078 10.2383C2.95312 9.82812 2.43359 8.59766 2.43359 7.58594C2.43359 5.45312 3.99219 3.48438 6.91797 3.48438C9.26953 3.48438 11.1016 5.17969 11.1016 7.42188C11.1016 9.74609 9.625 11.6328 7.57422 11.6328C6.89062 11.6328 6.23438 11.2773 6.01562 10.8398C6.01562 10.8398 5.6875 12.1523 5.60547 12.4531C5.44141 13.0547 5.03125 13.793 4.75781 14.2305C5.38672 14.4492 6.07031 14.5312 6.78125 14.5312C10.5273 14.5312 13.5625 11.4961 13.5625 7.75Z" fill="currentColor"/>
                                            </svg>
                                            <span class="visually-hidden">Pinterest</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="footer__bottom">
            <div class="container">
                <div class="footer__bottom--inenr d-flex justify-content-between align-items-center">
                    <p class="copyright__content mb-0"><span class="text__secondary">© 2022</span> Powered by <a class="copyright__content--link" target="_blank" href="https://themeforest.net/search/hooktheme">Hooktheme</a> .  All Rights Reserved.</p>
                    <div class="footer__payment">
                        <img src="assets/img/icon/payment-img.webp" alt="payment-img">
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End footer section -->

    <!-- Scroll top bar -->
    <button id="scroll__top"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 244l144-144 144 144M256 120v292"/></svg></button>

<!-- All Script JS Plugins here  -->
<script src="assets/js/vendor/popper.js" defer="defer"></script>
<script src="assets/js/vendor/bootstrap.min.js" defer="defer"></script>
<script src="assets/js/plugins/swiper-bundle.min.js"></script>
<script src="assets/js/plugins/glightbox.min.js"></script>

<!-- Customscript js -->
<script src="assets/js/script.js"></script>


  
</body>
</html>