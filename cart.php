<?php
// session_start();
include "header.php";
$empty = "";
// Check if the cart session variable is set and not empty
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    // Connect to the database (using your existing connection logic)
    // ...

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
?>

    <main class="main__content_wrapper">
        
        <!-- Start breadcrumb section -->
        <div class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content text-center">
                            <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                <li class="breadcrumb__content--menu__items"><a href="index.php">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span>Shopping Cart</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End breadcrumb section -->

        <!-- cart section start -->
        <section class="cart__section section--padding">
            <div class="container-fluid">
                <div class="cart__section--inner">
                    <form action="updateCart.php" method="post"> 
                        <h2 class="cart__title mb-35">Shopping Cart</h2>
                        <div class="row" id="cartTable">
                        <?php 
                                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                                    ?>
                            <div class="col-lg-8">
                                <div class="cart__table" >
                                    
                                    <table class="cart__table--inner">
                                        <thead class="cart__table--header">
                                            <tr class="cart__table--header__items">
                                                <th class="cart__table--header__list">Product</th>
                                                <th class="cart__table--header__list">Price</th>
                                                <th class="cart__table--header__list">Quantity</th>
                                                <th class="cart__table--header__list">Total</th>
                                            </tr>
                                        </thead>
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
        ?>



                        <tr class="cart__table--body__items">
                                                <td class="cart__table--body__list">
                                                    <div class="cart__product d-flex align-items-center">
                                                        <!-- <form action="removeFromCart.php" method="post"> -->
                                                            <!-- <input type="hidden" name="product_id" value=""> -->
                                                        <button class="cart__remove--btn delete-btn" aria-label="search button" data-del-id="<?php echo $product_id; ?>" type="button">
                                                            <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" width="16px" height="16px"><path d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z"/></svg>
                                                        </button>
                                                        <!-- </form> -->
                                                        <div class="cart__thumbnail">
                                                            <a href="product-details.php"><img class="border-radius-5" src="admin/assets/images/products/<?php echo $product_img; ?>" alt="cart-product"></a>
                                                        </div>
                                                        <div class="cart__content">
                                                            <h3 class="cart__content--title h4"><a href="product-details.php"><?php echo $product_name;?></a></h3>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cart__table--body__list">
                                                    <span class="cart__price">$<?php echo $product_price?></span>
                                                </td>
                                                <td class="cart__table--body__list">
                                                    <div class="quantity__box">
                                                        <button type="button" class="quantity__value quickview__value--quantity decrease" aria-label="quantity value" value="Decrease Value">-</button>
                                                        <label>
                                                            <input type="number" class="quantity__number quickview__value--number" name="quantity[<?php echo $product_id ?>]" value="<?php echo $quantity ?>" data-counter />
                                                        </label>
                                                        <button type="button" class="quantity__value quickview__value--quantity increase" aria-label="quantity value" value="Increase Value">+</button>
                                                    </div>
                                                </td>
                                                <td class="cart__table--body__list">
                                                    <span class="cart__price end">$<?php echo $proTotal?></span>
                                                </td>
                                            </tr>


<?php
    
}
         ?>
                                            
                                        </tbody>
                                    </table> 
                                    <div class="continue__shopping d-flex justify-content-between">
                                        <a class="continue__shopping--link" href="shop.php">Continue shopping</a>
                                        <button class="continue__shopping--clear" type="submit">Clear Cart</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="cart__summary border-radius-10">
                                    <div class="coupon__code mb-30">
                                        <h3 class="coupon__code--title">Coupon</h3>
                                        <p class="coupon__code--desc">Enter your coupon code if you have one.</p>
                                        <div class="coupon__code--field d-flex">
                                            <label>
                                                <input class="coupon__code--field__input border-radius-5" placeholder="Coupon code" type="text">
                                            </label>
                                            <button class="coupon__code--field__btn primary__btn" type="submit">Apply Coupon</button>
                                        </div>
                                    </div>
                                    <div class="cart__note mb-20">
                                        <h3 class="cart__note--title">Note</h3>
                                        <p class="cart__note--desc">Add special instructions for your seller...</p>
                                        <textarea class="cart__note--textarea border-radius-5"></textarea>
                                    </div>
                                    <div class="cart__summary--total mb-20">
                                        <table class="cart__summary--total__table">
                                            <tbody>
                                                <tr class="cart__summary--total__list">
                                                    <td class="cart__summary--total__title text-left">SUBTOTAL</td>
                                                    <td class="cart__summary--amount text-right">$<?php echo $grandTotal;?></td>
                                                </tr>
                                                <tr class="cart__summary--total__list">
                                                    <td class="cart__summary--total__title text-left">GRAND TOTAL</td>
                                                    <td class="cart__summary--amount text-right">$<?php echo $grandTotal;?></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="cart__summary--footer">
                                        <p class="cart__summary--footer__desc">Shipping & taxes calculated at checkout</p>
                                        <ul class="d-flex justify-content-between">
                                            <li><button class="cart__summary--footer__btn primary__btn cart" type="submit">Update Cart</button></li>
                                            <li><a class="cart__summary--footer__btn primary__btn checkout" href="checkout.php">Check Out</a></li>
                                        </ul>
                                    </div>

                                </div> 
                            </div>
                            <?php
    
}else{
    echo "<h2>No Products in Cart</h2>";
}
         ?>
                        </div> 
                    </form> 
                </div>
            </div>     
        </section>
        <!-- cart section end -->

        <!-- Start brand section -->
        <div class="brand__section brand__section-two section--padding pt-0">
            <div class="container">
                <div class="brand__section--inner brand__logo--activation swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="brang__logo--items">
                                <img class="brang__logo--img" src="assets/img/logo/brand-logo1.webp" alt="brand-logo">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brang__logo--items">
                                <img class="brang__logo--img" src="assets/img/logo/brand-logo2.webp" alt="brand-logo">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brang__logo--items">
                                <img class="brang__logo--img" src="assets/img/logo/brand-logo3.webp" alt="brand-logo">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brang__logo--items">
                                <img class="brang__logo--img" src="assets/img/logo/brand-logo4.webp" alt="brand-logo">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brang__logo--items">
                                <img class="brang__logo--img" src="assets/img/logo/brand-logo5.webp" alt="brand-logo">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brang__logo--items">
                                <img class="brang__logo--img" src="assets/img/logo/brand-logo6.webp" alt="brand-logo">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brang__logo--items">
                                <img class="brang__logo--img" src="assets/img/logo/brand-logo7.webp" alt="brand-logo">
                            </div>
                        </div>
                    </div>
                    <div class="swiper__nav--btn swiper-button-next">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" -chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                    <div class="swiper__nav--btn swiper-button-prev">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" -chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
                    </div>
                </div>
            </div>
        </div>
        <!-- End brand section -->

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

    <!-- Quickview Wrapper -->
    <div class="modal fade" id="examplemodal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog quickview__main--wrapper modal-dialog-centered">
          <div class="modal-content quickview__main__content">
            <div class="modal-header quickview_m_header">
                <button type="button" class="btn-close quickview__close--btn" data-bs-dismiss="modal" aria-label="Close">✕</button>
            </div>
            <div class="modal-body quickview__inner">
                <div class="row row-cols-lg-2 row-cols-md-2">
                    <div class="col">
                        <div class="quickview__gallery">
                            <div class="product__media--preview  swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="product__media--preview__items">
                                            <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="assets/img/product/big-product/product1.webp"><img class="product__media--preview__items--img" src="assets/img/product/big-product/product1.webp" alt="product-media-img"></a>
                                            <div class="product__media--view__icon">
                                                <a class="product__media--view__icon--link glightbox" href="assets/img/product/big-product/product1.webp" data-gallery="product-media-preview">
                                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path></svg>
                                                    <span class="visually-hidden">product view</span> 
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--preview__items">
                                            <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="assets/img/product/big-product/product2.webp"><img class="product__media--preview__items--img" src="assets/img/product/big-product/product2.webp" alt="product-media-img"></a>
                                            <div class="product__media--view__icon">
                                                <a class="product__media--view__icon--link glightbox" href="assets/img/product/big-product/product2.webp" data-gallery="product-media-preview">
                                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path></svg>
                                                    <span class="visually-hidden">product view</span> 
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--preview__items">
                                            <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="assets/img/product/big-product/product3.webp"><img class="product__media--preview__items--img" src="assets/img/product/big-product/product3.webp" alt="product-media-img"></a>
                                            <div class="product__media--view__icon">
                                                <a class="product__media--view__icon--link glightbox" href="assets/img/product/big-product/product3.webp" data-gallery="product-media-preview">
                                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path></svg>
                                                    <span class="visually-hidden">product view</span> 
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--preview__items">
                                            <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="assets/img/product/big-product/product4.webp"><img class="product__media--preview__items--img" src="assets/img/product/big-product/product4.webp" alt="product-media-img"></a>
                                            <div class="product__media--view__icon">
                                                <a class="product__media--view__icon--link glightbox" href="assets/img/product/big-product/product4.webp" data-gallery="product-media-preview">
                                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path></svg>
                                                    <span class="visually-hidden">product view</span> 
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--preview__items">
                                            <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="assets/img/product/big-product/product5.webp"><img class="product__media--preview__items--img" src="assets/img/product/big-product/product5.webp" alt="product-media-img"></a>
                                            <div class="product__media--view__icon">
                                                <a class="product__media--view__icon--link glightbox" href="assets/img/product/big-product/product5.webp" data-gallery="product-media-preview">
                                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path></svg>
                                                    <span class="visually-hidden">product view</span> 
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product__media--nav swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="product__media--nav__items">
                                            <img class="product__media--nav__items--img" src="assets/img/product/small-product/product1.webp" alt="product-nav-img">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--nav__items">
                                            <img class="product__media--nav__items--img" src="assets/img/product/small-product/product2.webp" alt="product-nav-img">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--nav__items">
                                            <img class="product__media--nav__items--img" src="assets/img/product/small-product/product3.webp" alt="product-nav-img">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--nav__items">
                                            <img class="product__media--nav__items--img" src="assets/img/product/small-product/product4.webp" alt="product-nav-img">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--nav__items">
                                            <img class="product__media--nav__items--img" src="assets/img/product/small-product/product5.webp" alt="product-nav-img">
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper__nav--btn swiper-button-next">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" -chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                </div>
                                <div class="swiper__nav--btn swiper-button-prev">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" -chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="quickview__info">
                            <form action="#">
                                <h2 class="product__details--info__title mb-15">Z 7-8mm Freshwater Button is </h2>
                                <div class="product__card--price mb-15">
                                    <span class="current__price">$239.52</span>
                                    <span class="old__price"> $362.00</span>
                                </div>
                                <ul class="rating product__card--rating mb-20 d-flex">
                                    <li class="rating__list">
                                        <span class="rating__icon">
                                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.08398 0.921875L4.56055 4.03906L1.11523 4.53125C0.505859 4.625 0.271484 5.375 0.716797 5.82031L3.17773 8.23438L2.5918 11.6328C2.49805 12.2422 3.1543 12.7109 3.69336 12.4297L6.76367 10.8125L9.81055 12.4297C10.3496 12.7109 11.0059 12.2422 10.9121 11.6328L10.3262 8.23438L12.7871 5.82031C13.2324 5.375 12.998 4.625 12.3887 4.53125L8.9668 4.03906L7.41992 0.921875C7.16211 0.382812 6.36523 0.359375 6.08398 0.921875Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="rating__list">
                                        <span class="rating__icon">
                                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.08398 0.921875L4.56055 4.03906L1.11523 4.53125C0.505859 4.625 0.271484 5.375 0.716797 5.82031L3.17773 8.23438L2.5918 11.6328C2.49805 12.2422 3.1543 12.7109 3.69336 12.4297L6.76367 10.8125L9.81055 12.4297C10.3496 12.7109 11.0059 12.2422 10.9121 11.6328L10.3262 8.23438L12.7871 5.82031C13.2324 5.375 12.998 4.625 12.3887 4.53125L8.9668 4.03906L7.41992 0.921875C7.16211 0.382812 6.36523 0.359375 6.08398 0.921875Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="rating__list">
                                        <span class="rating__icon">
                                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.08398 0.921875L4.56055 4.03906L1.11523 4.53125C0.505859 4.625 0.271484 5.375 0.716797 5.82031L3.17773 8.23438L2.5918 11.6328C2.49805 12.2422 3.1543 12.7109 3.69336 12.4297L6.76367 10.8125L9.81055 12.4297C10.3496 12.7109 11.0059 12.2422 10.9121 11.6328L10.3262 8.23438L12.7871 5.82031C13.2324 5.375 12.998 4.625 12.3887 4.53125L8.9668 4.03906L7.41992 0.921875C7.16211 0.382812 6.36523 0.359375 6.08398 0.921875Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="rating__list">
                                        <span class="rating__icon"> 
                                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12.4141 4.53125L8.99219 4.03906L7.44531 0.921875C7.1875 0.382812 6.39062 0.359375 6.10938 0.921875L4.58594 4.03906L1.14062 4.53125C0.53125 4.625 0.296875 5.375 0.742188 5.82031L3.20312 8.23438L2.61719 11.6328C2.52344 12.2422 3.17969 12.7109 3.71875 12.4297L6.78906 10.8125L9.83594 12.4297C10.375 12.7109 11.0312 12.2422 10.9375 11.6328L10.3516 8.23438L12.8125 5.82031C13.2578 5.375 13.0234 4.625 12.4141 4.53125ZM9.53125 7.95312L10.1875 11.75L6.78906 9.96875L3.36719 11.75L4.02344 7.95312L1.25781 5.28125L5.07812 4.71875L6.78906 1.25L8.47656 4.71875L12.2969 5.28125L9.53125 7.95312Z" fill="currentColor"></path>
                                             </svg>
                                        </span>
                                    </li>
                                    <li class="rating__list">
                                        <span class="rating__icon"> 
                                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12.4141 4.53125L8.99219 4.03906L7.44531 0.921875C7.1875 0.382812 6.39062 0.359375 6.10938 0.921875L4.58594 4.03906L1.14062 4.53125C0.53125 4.625 0.296875 5.375 0.742188 5.82031L3.20312 8.23438L2.61719 11.6328C2.52344 12.2422 3.17969 12.7109 3.71875 12.4297L6.78906 10.8125L9.83594 12.4297C10.375 12.7109 11.0312 12.2422 10.9375 11.6328L10.3516 8.23438L12.8125 5.82031C13.2578 5.375 13.0234 4.625 12.4141 4.53125ZM9.53125 7.95312L10.1875 11.75L6.78906 9.96875L3.36719 11.75L4.02344 7.95312L1.25781 5.28125L5.07812 4.71875L6.78906 1.25L8.47656 4.71875L12.2969 5.28125L9.53125 7.95312Z" fill="currentColor"></path>
                                             </svg>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="rating__review--text">(106) Review</span>
                                    </li>
                                </ul>
                                <p class="product__details--info__desc mb-15">Lorem ipsum dolor sit amet, consectetur adipisicing elit is. Deserunt totam dolores ea numquam labore!.</p>
                                <div class="product__variant">
                                    <div class="product__variant--list mb-20">
                                        <fieldset class="variant__input--fieldset">
                                            <legend class="product__variant--title mb-10">Color :</legend>
                                            <div class="variant__color d-flex">
                                                <div class="variant__color--list">
                                                    <input id="color-red1" name="color" type="radio" checked>
                                                    <label class="variant__color--value red" for="color-red1" title="Red"><img class="variant__color--value__img" src="assets/img/product/small-product/product1.webp" alt="variant-color-img"></label>
                                                </div>
                                                <div class="variant__color--list">
                                                    <input id="color-red2" name="color" type="radio">
                                                    <label class="variant__color--value red" for="color-red2" title="Black"><img class="variant__color--value__img" src="assets/img/product/small-product/product2.webp" alt="variant-color-img"></label>
                                                </div>
                                                <div class="variant__color--list">
                                                    <input id="color-red3" name="color" type="radio">
                                                    <label class="variant__color--value red" for="color-red3" title="Pink"><img class="variant__color--value__img" src="assets/img/product/small-product/product3.webp" alt="variant-color-img"></label>
                                                </div>
                                                <div class="variant__color--list">
                                                    <input id="color-red4" name="color" type="radio">
                                                    <label class="variant__color--value red" for="color-red4" title="Orange"><img class="variant__color--value__img" src="assets/img/product/small-product/product4.webp" alt="variant-color-img"></label>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="product__variant--list mb-20">
                                        <fieldset class="variant__input--fieldset">
                                            <legend class="product__variant--title mb-10">Weight :</legend>
                                            <ul class="variant__size d-flex">
                                                <li class="variant__size--list">
                                                    <input id="weight1" name="weight" type="radio" checked>
                                                    <label class="variant__size--value red" for="weight1">5 kg</label>
                                                </li>
                                                <li class="variant__size--list">
                                                    <input id="weight2" name="weight" type="radio">
                                                    <label class="variant__size--value red" for="weight2">3 kg</label>
                                                </li>
                                                <li class="variant__size--list">
                                                    <input id="weight3" name="weight" type="radio">
                                                    <label class="variant__size--value red" for="weight3">2 kg</label>
                                                </li>
                                            </ul>
                                        </fieldset>
                                    </div>
                                    <div class="quickview__variant--list quantity d-flex align-items-center mb-15">
                                        <div class="quantity__box">
                                            <button type="button" class="quantity__value quickview__value--quantity decrease" aria-label="quantity value" value="Decrease Value">-</button>
                                            <label>
                                                <input type="number" class="quantity__number quickview__value--number" value="1" data-counter />
                                            </label>
                                            <button type="button" class="quantity__value quickview__value--quantity increase" aria-label="quantity value" value="Increase Value">+</button>
                                        </div>
                                        <button class="primary__btn quickview__cart--btn" type="submit">Add To Cart</button>  
                                    </div>
                                    <div class="quickview__variant--list variant__wishlist mb-15">
                                        <a class="variant__wishlist--icon" href="wishlist.php" title="Add to wishlist">
                                            <svg class="quickview__variant--wishlist__svg" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 512 512"><path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
                                            Add to Wishlist
                                        </a>
                                    </div>
                                </div>
                                <div class="quickview__social d-flex align-items-center">
                                    <label class="quickview__social--title">Social Share:</label>
                                    <ul class="quickview__social--wrapper mt-0 d-flex">
                                        <li class="quickview__social--list">
                                            <a class="quickview__social--icon" target="_blank" href="https://www.facebook.com">
                                                <svg  xmlns="http://www.w3.org/2000/svg" width="7.667" height="16.524" viewBox="0 0 7.667 16.524">
                                                    <path  data-name="Path 237" d="M967.495,353.678h-2.3v8.253h-3.437v-8.253H960.13V350.77h1.624v-1.888a4.087,4.087,0,0,1,.264-1.492,2.9,2.9,0,0,1,1.039-1.379,3.626,3.626,0,0,1,2.153-.6l2.549.019v2.833h-1.851a.732.732,0,0,0-.472.151.8.8,0,0,0-.246.642v1.719H967.8Z" transform="translate(-960.13 -345.407)" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Facebook</span>
                                            </a>
                                        </li>
                                        <li class="quickview__social--list">
                                            <a class="quickview__social--icon" target="_blank" href="https://twitter.com">
                                                <svg  xmlns="http://www.w3.org/2000/svg" width="16.489" height="13.384" viewBox="0 0 16.489 13.384">
                                                    <path  data-name="Path 303" d="M966.025,1144.2v.433a9.783,9.783,0,0,1-.621,3.388,10.1,10.1,0,0,1-1.845,3.087,9.153,9.153,0,0,1-3.012,2.259,9.825,9.825,0,0,1-4.122.866,9.632,9.632,0,0,1-2.748-.4,9.346,9.346,0,0,1-2.447-1.11q.4.038.809.038a6.723,6.723,0,0,0,2.24-.376,7.022,7.022,0,0,0,1.958-1.054,3.379,3.379,0,0,1-1.958-.687,3.259,3.259,0,0,1-1.186-1.666,3.364,3.364,0,0,0,.621.056,3.488,3.488,0,0,0,.885-.113,3.267,3.267,0,0,1-1.374-.631,3.356,3.356,0,0,1-.969-1.186,3.524,3.524,0,0,1-.367-1.5v-.057a3.172,3.172,0,0,0,1.544.433,3.407,3.407,0,0,1-1.1-1.214,3.308,3.308,0,0,1-.4-1.609,3.362,3.362,0,0,1,.452-1.694,9.652,9.652,0,0,0,6.964,3.538,3.911,3.911,0,0,1-.075-.772,3.293,3.293,0,0,1,.452-1.694,3.409,3.409,0,0,1,1.233-1.233,3.257,3.257,0,0,1,1.685-.461,3.351,3.351,0,0,1,2.466,1.073,6.572,6.572,0,0,0,2.146-.828,3.272,3.272,0,0,1-.574,1.083,3.477,3.477,0,0,1-.913.8,6.869,6.869,0,0,0,1.958-.546A7.074,7.074,0,0,1,966.025,1144.2Z" transform="translate(-951.23 -1140.849)" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Twitter</span>
                                            </a>
                                        </li>
                                        <li class="quickview__social--list">
                                            <a class="quickview__social--icon" target="_blank" href="https://www.instagram.com">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="17.497" height="17.492" viewBox="0 0 19.497 19.492">
                                                    <path  data-name="Icon awesome-instagram" d="M9.747,6.24a5,5,0,1,0,5,5A4.99,4.99,0,0,0,9.747,6.24Zm0,8.247A3.249,3.249,0,1,1,13,11.238a3.255,3.255,0,0,1-3.249,3.249Zm6.368-8.451A1.166,1.166,0,1,1,14.949,4.87,1.163,1.163,0,0,1,16.115,6.036Zm3.31,1.183A5.769,5.769,0,0,0,17.85,3.135,5.807,5.807,0,0,0,13.766,1.56c-1.609-.091-6.433-.091-8.042,0A5.8,5.8,0,0,0,1.64,3.13,5.788,5.788,0,0,0,.065,7.215c-.091,1.609-.091,6.433,0,8.042A5.769,5.769,0,0,0,1.64,19.341a5.814,5.814,0,0,0,4.084,1.575c1.609.091,6.433.091,8.042,0a5.769,5.769,0,0,0,4.084-1.575,5.807,5.807,0,0,0,1.575-4.084c.091-1.609.091-6.429,0-8.038Zm-2.079,9.765a3.289,3.289,0,0,1-1.853,1.853c-1.283.509-4.328.391-5.746.391S5.28,19.341,4,18.837a3.289,3.289,0,0,1-1.853-1.853c-.509-1.283-.391-4.328-.391-5.746s-.113-4.467.391-5.746A3.289,3.289,0,0,1,4,3.639c1.283-.509,4.328-.391,5.746-.391s4.467-.113,5.746.391a3.289,3.289,0,0,1,1.853,1.853c.509,1.283.391,4.328.391,5.746S17.855,15.705,17.346,16.984Z" transform="translate(0.004 -1.492)" fill="currentColor"></path>
                                                </svg>
                                                <span class="visually-hidden">Instagram</span>
                                            </a>
                                        </li>
                                        <li class="quickview__social--list">
                                            <a class="quickview__social--icon" target="_blank" href="https://www.youtube.com">
                                                <svg  xmlns="http://www.w3.org/2000/svg" width="16.49" height="11.582" viewBox="0 0 16.49 11.582">
                                                    <path  data-name="Path 321" d="M967.759,1365.592q0,1.377-.019,1.717-.076,1.114-.151,1.622a3.981,3.981,0,0,1-.245.925,1.847,1.847,0,0,1-.453.717,2.171,2.171,0,0,1-1.151.6q-3.585.265-7.641.189-2.377-.038-3.387-.085a11.337,11.337,0,0,1-1.5-.142,2.206,2.206,0,0,1-1.113-.585,2.562,2.562,0,0,1-.528-1.037,3.523,3.523,0,0,1-.141-.585c-.032-.2-.06-.5-.085-.906a38.894,38.894,0,0,1,0-4.867l.113-.925a4.382,4.382,0,0,1,.208-.906,2.069,2.069,0,0,1,.491-.755,2.409,2.409,0,0,1,1.113-.566,19.2,19.2,0,0,1,2.292-.151q1.82-.056,3.953-.056t3.952.066q1.821.067,2.311.142a2.3,2.3,0,0,1,.726.283,1.865,1.865,0,0,1,.557.49,3.425,3.425,0,0,1,.434,1.019,5.72,5.72,0,0,1,.189,1.075q0,.095.057,1C967.752,1364.1,967.759,1364.677,967.759,1365.592Zm-7.6.925q1.49-.754,2.113-1.094l-4.434-2.339v4.66Q958.609,1367.311,960.156,1366.517Z" transform="translate(-951.269 -1359.8)" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Youtube</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>
    <!-- Quickview Wrapper End -->

     <!-- Scroll top bar -->
   <button id="scroll__top"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 244l144-144 144 144M256 120v292"/></svg></button>

   <!-- All Script JS Plugins here  -->
   <script src="assets/js/vendor/popper.js" defer="defer"></script>
   <script src="assets/js/vendor/bootstrap.min.js" defer="defer"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script src="assets/js/plugins/swiper-bundle.min.js"></script>
   <script src="assets/js/plugins/glightbox.min.js"></script>
 
  <!-- Customscript js -->
  <script src="assets/js/script.js"></script>
  <script>
    $(document).ready(function() {
     // Function to handle the removal of products from the cart
     function removeProduct(productId) {
        // Send an AJAX request to the PHP script
        $.ajax({
            url: "removeFromCart.php",
            type: "POST",
            data: { product_id: productId },
            success: function (data) {
                // Refresh the cart content on success
                $("#cartTable").html(data);
            },
            error: function () {
                alert("Error occurred while removing the product.");
            }
        });
    }

    // Event listener for the "Remove" buttons
    $(document).on("click", ".delete-btn", function () {
        let productId = $(this).data("del-id");
        removeProduct(productId);
    });
});
  </script>
</body>
</html>