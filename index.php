<?php 
include "header.php";
 
if(isset($_GET['success'])){
    if($_GET['success'] == 1){
    echo "<script>Swal.fire(
            'Product Added to cart successfully!',
             '',
             'success'
           )</script>";
    }
}
if(isset($_GET['action'])){
    if($_GET['action'] == "order"){
        echo "<script>Swal.fire(
            'Order Placed Successfully!',
             '',
             'success'
           )</script>";
    }

    }

if(isset($_GET['status'])){
    if($_GET['status'] == 2) {
        ?>
         <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Product Already in Cart</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
    <?php
    
    }
        }

?>
<style>
 .product__card--thumbnail {
  height: 300px; /* Adjust this value to the desired height for the card */
  background-size: cover;
  background-position: center;
  position: relative; /* Ensure relative positioning for absolute elements inside */
}




</style>
    <main class="main__content_wrapper">
        <!-- Start slider section -->
        <section class="hero__slider--section">
            <div class="hero__slider--activation swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="hero__slider--items">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="slider__content">
                                            <h2 class="slider__maintitle text__primary h1">Beauty is Whatever <br>
                                                Brings Perfect</h2>
                                            <p class="slider__desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,  aliquip ex ea commodo consequat. </p>
                                            <a class="primary__btn slider__btn" href="shop.php">
                                                SHOP NOW
                                                <svg width="17" height="12" viewBox="0 0 17 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15.9732 5.19375L11.1893 0.460018C11.1225 0.392216 11.0412 0.338185 10.9507 0.301395C10.8601 0.264605 10.7623 0.245867 10.6636 0.246372C10.5648 0.246877 10.4672 0.266615 10.377 0.304329C10.2869 0.342044 10.2061 0.396903 10.14 0.465385C10.001 0.610077 9.9245 0.79778 9.92549 0.992021C9.92649 1.18626 10.0049 1.37316 10.1454 1.51643L13.6531 4.9864L0.935903 5.05145C0.734471 5.06613 0.546408 5.15137 0.409525 5.29006C0.272641 5.42874 0.197086 5.61057 0.19805 5.799C0.199014 5.98743 0.276425 6.16848 0.41472 6.30575C0.553015 6.44303 0.74194 6.52635 0.943512 6.53896L13.6586 6.47392L10.1866 9.98155C10.0475 10.1262 9.97108 10.3139 9.97207 10.5082C9.97306 10.7024 10.0514 10.8893 10.192 11.0326C10.2588 11.1004 10.3401 11.1544 10.4306 11.1912C10.5212 11.228 10.6189 11.2467 10.7177 11.2462C10.8165 11.2457 10.9141 11.226 11.0042 11.1883C11.0944 11.1506 11.1751 11.0957 11.2413 11.0272L15.9786 6.25458C16.1206 6.1093 16.1989 5.91956 16.1979 5.72303C16.1969 5.5265 16.1167 5.33757 15.9732 5.19375Z" fill="currentColor"/>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hero__slider--layer">
                                <img class="slider__layer--img" src="assets/img/slider/home1-slider1-layer.png" alt="slider-img">
                            </div>  
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="hero__slider--items">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="slider__content">
                                            <h2 class="slider__maintitle text__primary h1">Beauty is Whatever <br>
                                                Brings Perfect</h2>
                                            <p class="slider__desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,  aliquip ex ea commodo consequat. </p>
                                            <a class="primary__btn slider__btn" href="shop.php">
                                                SHOP NOW
                                                <svg width="17" height="12" viewBox="0 0 17 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15.9732 5.19375L11.1893 0.460018C11.1225 0.392216 11.0412 0.338185 10.9507 0.301395C10.8601 0.264605 10.7623 0.245867 10.6636 0.246372C10.5648 0.246877 10.4672 0.266615 10.377 0.304329C10.2869 0.342044 10.2061 0.396903 10.14 0.465385C10.001 0.610077 9.9245 0.79778 9.92549 0.992021C9.92649 1.18626 10.0049 1.37316 10.1454 1.51643L13.6531 4.9864L0.935903 5.05145C0.734471 5.06613 0.546408 5.15137 0.409525 5.29006C0.272641 5.42874 0.197086 5.61057 0.19805 5.799C0.199014 5.98743 0.276425 6.16848 0.41472 6.30575C0.553015 6.44303 0.74194 6.52635 0.943512 6.53896L13.6586 6.47392L10.1866 9.98155C10.0475 10.1262 9.97108 10.3139 9.97207 10.5082C9.97306 10.7024 10.0514 10.8893 10.192 11.0326C10.2588 11.1004 10.3401 11.1544 10.4306 11.1912C10.5212 11.228 10.6189 11.2467 10.7177 11.2462C10.8165 11.2457 10.9141 11.226 11.0042 11.1883C11.0944 11.1506 11.1751 11.0957 11.2413 11.0272L15.9786 6.25458C16.1206 6.1093 16.1989 5.91956 16.1979 5.72303C16.1969 5.5265 16.1167 5.33757 15.9732 5.19375Z" fill="currentColor"/>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hero__slider--layer">
                                <img class="slider__layer--img" src="assets/img/slider/home1-slider2-layer.png" alt="slider-img">
                            </div> 
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="hero__slider--items">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="slider__content">
                                            <h2 class="slider__maintitle text__primary h1">Beauty is Whatever <br>
                                                Brings Perfect</h2>
                                            <p class="slider__desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,  aliquip ex ea commodo consequat. </p>
                                            <a class="primary__btn slider__btn" href="shop.php">
                                                SHOP NOW
                                                <svg width="17" height="12" viewBox="0 0 17 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15.9732 5.19375L11.1893 0.460018C11.1225 0.392216 11.0412 0.338185 10.9507 0.301395C10.8601 0.264605 10.7623 0.245867 10.6636 0.246372C10.5648 0.246877 10.4672 0.266615 10.377 0.304329C10.2869 0.342044 10.2061 0.396903 10.14 0.465385C10.001 0.610077 9.9245 0.79778 9.92549 0.992021C9.92649 1.18626 10.0049 1.37316 10.1454 1.51643L13.6531 4.9864L0.935903 5.05145C0.734471 5.06613 0.546408 5.15137 0.409525 5.29006C0.272641 5.42874 0.197086 5.61057 0.19805 5.799C0.199014 5.98743 0.276425 6.16848 0.41472 6.30575C0.553015 6.44303 0.74194 6.52635 0.943512 6.53896L13.6586 6.47392L10.1866 9.98155C10.0475 10.1262 9.97108 10.3139 9.97207 10.5082C9.97306 10.7024 10.0514 10.8893 10.192 11.0326C10.2588 11.1004 10.3401 11.1544 10.4306 11.1912C10.5212 11.228 10.6189 11.2467 10.7177 11.2462C10.8165 11.2457 10.9141 11.226 11.0042 11.1883C11.0944 11.1506 11.1751 11.0957 11.2413 11.0272L15.9786 6.25458C16.1206 6.1093 16.1989 5.91956 16.1979 5.72303C16.1969 5.5265 16.1167 5.33757 15.9732 5.19375Z" fill="currentColor"/>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hero__slider--layer">
                                <img class="slider__layer--img" src="assets/img/slider/home1-slider3-layer.png" alt="slider-img">
                            </div>  
                        </div>
                    </div>
                </div>
                <div class="slider__pagination swiper-pagination"></div>
            </div>
        </section>
        <!-- End slider section -->

        <!-- Start collection section -->
        <section class="shop__collection--section section--padding">
            <div class="container">
                <div class="section__heading text-center mb-40">
                    <h2 class="section__heading--maintitle">Shop By Category</h2>
                </div>
                <div class="shop__collection--column5 swiper">
                    <div class="swiper-wrapper">
                        <?php 
                        $categories =  "SELECT * FROM  `categories`";
                        $categoryRes = mysqli_query($conn,$categories);
                        while($row = mysqli_fetch_assoc($categoryRes)){ 
                        ?>
                        <div class="swiper-slide">
                            <div class="shop__collection--card text-center">
                                <a class="shop__collection--link" href="shop.php?catID=<?php echo $row['catID'] ?>">
                                    <img class="shop__collection--img" src="admin/assets/images/icons/<?php echo $row['catImg'] ?>" alt="icon-img">
                                    <h3 class="shop__collection--title"><?php echo $row['catName'] ?></h3>
                                    <span class="shop__collection--subtitle">		<?php 
                $productCount = "SELECT `categories`.`catID`, COUNT(`products`.`proID`) FROM `products` RIGHT JOIN 
				`categories` ON `categories`.`catID` = `products`.`catID` WHERE `categories`.`catID` = " . $row['catID'] . " GROUP BY 
				`categories`.`catID`";
			
		
                        $countRes = mysqli_query($conn,$productCount);
                        $data = mysqli_fetch_assoc($countRes);
                        if(isset($data['COUNT(`products`.`proID`)'])){
                          echo $data['COUNT(`products`.`proID`)'];
                        }else{
                          echo " 0";
                        }
                        ?></span>
                                </a>
                            </div>
                        </div>

                        <?php 
                        }
                        ?>

                      
                    </div>
                    <div class="swiper__nav--btn swiper-button-next">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" -chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                    <div class="swiper__nav--btn swiper-button-prev">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" -chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
                    </div>
                </div>
            </div>
        </section>
        <!-- End collection section -->
        
        <!-- Start image width text section -->
        <section class="image__width--text__section position-relative">
            <div class="container">
                <div class="image__width--text__inner d-flex position-relative">
                    <div class="image__width--text__thumbnail position-relative">
                        <img src="assets/img/banner/banner1.webp" alt="image">
                        <div class="image__width--text">
                            <h2 class="image__width--text__title">Face Your Skin With Us</h2>
                            <p class="image__width--text__desc">Kidlues ispum maruwes cnsectetur adipisicing elit, sed do
                                eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <div class="image__width--text__footer">
                                <a class="image__width--text__link" href="shop.php">Shop Now 
                                    <svg width="9" height="12" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 1L7.96317 7.96317L1 14.9263" stroke="currentColor" stroke-width="2"/>
                                    </svg>
                                </a>
                                <a class="image__width--text__link glightbox" href="https://vimeo.com/115041822" data-gallery="video">Play Video 
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="10" cy="10" r="9.75" fill="#F7EEDD" stroke="black" stroke-width="0.5"/>
                                        <path d="M15 10L7.5 14.3301L7.5 5.66987L15 10Z" fill="black"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="image__width--text__thumbnail thumbnail2">
                        <img src="assets/img/banner/banner2.webp" alt="image">
                    </div>
                </div>
            </div>
            <img class="section__shape--img" src="assets/img/other/shape-img1.webp" alt="shape-img">
            <img class="section__shape--img two" src="assets/img/other/shape-img2.webp" alt="shape-img">
        </section>
        <!-- End image width text section -->

        <!-- Start product section -->
        <section class="product__section section--padding ">
            <div class="container">
                <div class="section__heading text-center mb-40">
                    <h2 class="section__heading--maintitle">TRENDING PRODUCT</h2>
                </div>
                <div class="product__section--inner">
                    <div class="row mb--n30">


                    <?php 
                    $trendingPro = "SELECT * FROM  `products` WHERE `products`.`proType` = 'trending' AND `inStock` = 1 AND `proStatus` = 1 ";
                    $trendingProRes = mysqli_query($conn,$trendingPro);
                    if(mysqli_num_rows($trendingProRes) > 0){
while($row = mysqli_fetch_assoc($trendingProRes)) {
    ?>

<div class="col-lg-3 col-md-4 col-sm-6 col-6 custom-col mb-30">
                            <article class="product__card">
                                <div class="product__card--thumbnail">
                                    <a class="product__card--thumbnail__link display-block" href="product-details.php?proID=<?php echo $row['proID']?>">
                                        <img class="product__card--thumbnail__img product__primary--img" src="admin/assets/images/products/<?php echo $row['img1'] ?>" alt="product-img">
                                        <img class="product__card--thumbnail__img product__secondary--img" src="admin/assets/images/products/<?php echo $row['img2'] ?>" alt="product-img">
                                    </a>
                                    <ul class="product__card--action">
                                    
                                        <li class="product__card--action__list">
                                            <button class="product__card--action__btn wishlist-btn" data-pro-id="<?php echo $row['proID'];?>" title="Wishlist" href="" >
                                                <svg class="product__card--action__btn--svg" width="18" height="18" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.5379 1.52734C11.9519 0.1875 9.51832 0.378906 8.01442 1.9375C6.48317 0.378906 4.04957 0.1875 2.46364 1.52734C0.412855 3.25 0.713636 6.06641 2.1902 7.57031L6.97536 12.4648C7.24879 12.7383 7.60426 12.9023 8.01442 12.9023C8.39723 12.9023 8.7527 12.7383 9.02614 12.4648L13.8386 7.57031C15.2879 6.06641 15.5886 3.25 13.5379 1.52734ZM12.8816 6.64062L8.09645 11.5352C8.04176 11.5898 7.98707 11.5898 7.90504 11.5352L3.11989 6.64062C2.10817 5.62891 1.91676 3.71484 3.31129 2.53906C4.3777 1.63672 6.01832 1.77344 7.05739 2.8125L8.01442 3.79688L8.97145 2.8125C9.98317 1.77344 11.6238 1.63672 12.6902 2.51172C14.0847 3.71484 13.8933 5.62891 12.8816 6.64062Z" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Wishlist</span> 
                                            </button>
                                        </li>
                                    </ul>
                                    <form action="addToCart.php" method="post">
                                    <div class="product__add--to__card">
                                    <input type="hidden" name="proID" value="<?php echo $row['proID']; ?>">
                                    <input type="hidden" name="quantity" value="1">
                             
                                        <button class="product__card--btn" type="submit" title="Add To Card" name="addToCart"> Add to Cart
                                            <svg width="17" height="15" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.2371 4H11.5261L8.5027 0.460938C8.29176 0.226562 7.9402 0.203125 7.70582 0.390625C7.47145 0.601562 7.44801 0.953125 7.63551 1.1875L10.0496 4H3.46364L5.8777 1.1875C6.0652 0.953125 6.04176 0.601562 5.80739 0.390625C5.57301 0.203125 5.22145 0.226562 5.01051 0.460938L1.98707 4H0.299574C0.135511 4 0.0183239 4.14062 0.0183239 4.28125V4.84375C0.0183239 5.00781 0.135511 5.125 0.299574 5.125H0.721449L1.3777 9.78906C1.44801 10.3516 1.91676 10.75 2.47926 10.75H11.0339C11.5964 10.75 12.0652 10.3516 12.1355 9.78906L12.7918 5.125H13.2371C13.3777 5.125 13.5183 5.00781 13.5183 4.84375V4.28125C13.5183 4.14062 13.3777 4 13.2371 4ZM11.0339 9.625H2.47926L1.86989 5.125H11.6433L11.0339 9.625ZM7.33082 6.4375C7.33082 6.13281 7.07301 5.875 6.76832 5.875C6.4402 5.875 6.20582 6.13281 6.20582 6.4375V8.3125C6.20582 8.64062 6.4402 8.875 6.76832 8.875C7.07301 8.875 7.33082 8.64062 7.33082 8.3125V6.4375ZM9.95582 6.4375C9.95582 6.13281 9.69801 5.875 9.39332 5.875C9.0652 5.875 8.83082 6.13281 8.83082 6.4375V8.3125C8.83082 8.64062 9.0652 8.875 9.39332 8.875C9.69801 8.875 9.95582 8.64062 9.95582 8.3125V6.4375ZM4.70582 6.4375C4.70582 6.13281 4.44801 5.875 4.14332 5.875C3.8152 5.875 3.58082 6.13281 3.58082 6.4375V8.3125C3.58082 8.64062 3.8152 8.875 4.14332 8.875C4.44801 8.875 4.70582 8.64062 4.70582 8.3125V6.4375Z" fill="currentColor"/>
                                            </svg>
                                        </button>
                                    </div>
                                    </form>
                                </div>
                                <div class="product__card--content text-center">
                                    <ul class="rating product__card--rating d-flex justify-content-center">
                                        
                                    </ul>
                                    <h3 class="product__card--title"><a href="product-details.php?proID=<?php echo $row['proID']?>"><?php echo $row['proName']?></a></h3>
                                    <div class="product__card--price">
                                        <span class="current__price">$<?php echo $row['sellPrice']?></span>
                                    </div>  
                                </div>
                            </article>
                        </div>

<?php 
}
                    }else{
                        echo "<h1>No Trending Products Available</h1>";
                    }
                    ?>  
                    </div>
                    <div class="product__load--more text-center">
                        <a class="load__more--btn primary__btn" href="shop.php">Load More</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- End product section -->

        <!-- Start video banner section -->
        <section class="video__banner--section position-relative section--padding pb-0">
            <img class="video__banner--section__thumbnail" src="assets/img/banner/banner-fullwidth1.webp" alt="img">
            <div class="video__banner--wrapper">
                <div class="container">
                    <div class="video__banner--inner d-flex align-items-end">
                        <div class="video__banner--box position-relative">
                            <img class="video__banner--box__thumbnail" src="assets/img/banner/banner3.webp" alt="banner-img">
                            <div class="bideo__play">
                                <a class="bideo__play--icon glightbox" href="https://vimeo.com/115041822" data-gallery="video">
                                    <svg width="17" height="20" viewBox="0 0 17 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.5 9.13398C17.1667 9.51888 17.1667 10.4811 16.5 10.866L1.5 19.5263C0.833335 19.9112 9.70611e-07 19.4301 1.00426e-06 18.6603L1.76136e-06 1.33975C1.79501e-06 0.569945 0.833335 0.0888201 1.5 0.47372L16.5 9.13398Z" fill="currentColor"/>
                                    </svg>
                                    <span class="visually-hidden">Video Play</span>
                                </a>
                            </div>
                        </div>
                        <div class="video__banner--content">
                            <h2 class="video__banner--content__title">Beauty products that
                                really work</h2>
                            <p class="video__banner--content__desc">Our formulations have proven efficacy, contain organic ingredients only and are 100% cruelty free</p>
                            <a class="video__banner--content__btn primary__btn" href="shop.php">SKINCARE</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End video banner section -->

        <!-- Start product section -->
        <section class="product__section section--padding ">
            <div class="container">
                <div class="section__heading text-center mb-40">
                    <h2 class="section__heading--maintitle">FEATURED PRODUCT</h2>
                </div>
                <div class="product__section--inner product__swiper--column4 padding swiper">
                    <div class="swiper-wrapper">
                    <?php 
                    $featuredPro = "SELECT * FROM  `products` WHERE `products`.`proType` = 'featured' AND `inStock` = 1 AND `proStatus` = 1 ";
                    $featuredProRes = mysqli_query($conn,$featuredPro);
                    if(mysqli_num_rows($featuredProRes) > 0){
while($row2 = mysqli_fetch_assoc($featuredProRes)) {
    ?>
                        <div class="swiper-slide">
                            <article class="product__card">
                                <div class="product__card--thumbnail">
                                <a class="product__card--thumbnail__link display-block" href="product-details.php?proID=<?php echo $row2['proID']?>">
                                        <img class="product__card--thumbnail__img product__primary--img" src="admin/assets/images/products/<?php echo $row2['img1'] ?>" alt="product-img">
                                        <img class="product__card--thumbnail__img product__secondary--img" src="admin/assets/images/products/<?php echo $row2['img2'] ?>" alt="product-img">
                                    </a>

                                    <ul class="product__card--action">
                                        <li class="product__card--action__list">
                                        <button class="product__card--action__btn wishlist-btn" data-pro-id="<?php echo $row2['proID'];?>" title="Wishlist" href="" >
                                                <svg class="product__card--action__btn--svg" width="18" height="18" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.5379 1.52734C11.9519 0.1875 9.51832 0.378906 8.01442 1.9375C6.48317 0.378906 4.04957 0.1875 2.46364 1.52734C0.412855 3.25 0.713636 6.06641 2.1902 7.57031L6.97536 12.4648C7.24879 12.7383 7.60426 12.9023 8.01442 12.9023C8.39723 12.9023 8.7527 12.7383 9.02614 12.4648L13.8386 7.57031C15.2879 6.06641 15.5886 3.25 13.5379 1.52734ZM12.8816 6.64062L8.09645 11.5352C8.04176 11.5898 7.98707 11.5898 7.90504 11.5352L3.11989 6.64062C2.10817 5.62891 1.91676 3.71484 3.31129 2.53906C4.3777 1.63672 6.01832 1.77344 7.05739 2.8125L8.01442 3.79688L8.97145 2.8125C9.98317 1.77344 11.6238 1.63672 12.6902 2.51172C14.0847 3.71484 13.8933 5.62891 12.8816 6.64062Z" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Wishlist</span> 
                                            </button>
                                        </li>
                                    </ul>
                                    <div class="product__add--to__card">
                                    <form action="addToCart.php" method="post">
                                    <div class="product__add--to__card">
                                    <input type="hidden" name="proID" value="<?php echo $row2['proID']; ?>">
                                    <input type="hidden" name="quantity" value="1">
                             
                                        <button class="product__card--btn" type="submit" title="Add To Card" name="addToCart"> Add to Cart
                                            <svg width="17" height="15" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.2371 4H11.5261L8.5027 0.460938C8.29176 0.226562 7.9402 0.203125 7.70582 0.390625C7.47145 0.601562 7.44801 0.953125 7.63551 1.1875L10.0496 4H3.46364L5.8777 1.1875C6.0652 0.953125 6.04176 0.601562 5.80739 0.390625C5.57301 0.203125 5.22145 0.226562 5.01051 0.460938L1.98707 4H0.299574C0.135511 4 0.0183239 4.14062 0.0183239 4.28125V4.84375C0.0183239 5.00781 0.135511 5.125 0.299574 5.125H0.721449L1.3777 9.78906C1.44801 10.3516 1.91676 10.75 2.47926 10.75H11.0339C11.5964 10.75 12.0652 10.3516 12.1355 9.78906L12.7918 5.125H13.2371C13.3777 5.125 13.5183 5.00781 13.5183 4.84375V4.28125C13.5183 4.14062 13.3777 4 13.2371 4ZM11.0339 9.625H2.47926L1.86989 5.125H11.6433L11.0339 9.625ZM7.33082 6.4375C7.33082 6.13281 7.07301 5.875 6.76832 5.875C6.4402 5.875 6.20582 6.13281 6.20582 6.4375V8.3125C6.20582 8.64062 6.4402 8.875 6.76832 8.875C7.07301 8.875 7.33082 8.64062 7.33082 8.3125V6.4375ZM9.95582 6.4375C9.95582 6.13281 9.69801 5.875 9.39332 5.875C9.0652 5.875 8.83082 6.13281 8.83082 6.4375V8.3125C8.83082 8.64062 9.0652 8.875 9.39332 8.875C9.69801 8.875 9.95582 8.64062 9.95582 8.3125V6.4375ZM4.70582 6.4375C4.70582 6.13281 4.44801 5.875 4.14332 5.875C3.8152 5.875 3.58082 6.13281 3.58082 6.4375V8.3125C3.58082 8.64062 3.8152 8.875 4.14332 8.875C4.44801 8.875 4.70582 8.64062 4.70582 8.3125V6.4375Z" fill="currentColor"/>
                                            </svg>
                                        </button>
                                    </div>
                                    </form>
                                    </div>
                                </div>
                                <div class="product__card--content text-center">
                               
                                    <h3 class="product__card--title"><a href="product-details.php?proID=<?php echo $row2['proID']?>"><?php echo $row2['proName']?></a></h3>
                                    <div class="product__card--price">
                                        <span class="current__price">$<?php echo $row2['sellPrice']?></span>
     
                                    </div>  
                                </div>
                            </article>
                        </div>

                        <?php 
}
                    }else{
                        echo "<h1>No Featured Products Available</h1>";
                    }
                    ?> 
                    </div>
                    <div class="swiper__nav--btn swiper-button-next">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" -chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                    <div class="swiper__nav--btn swiper-button-prev">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" -chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
                    </div>
                </div>
            </div>
        </section>
        <!-- End product section -->

        <!-- Start Before After section -->
        <div class="before__after--section">
            <div class="container">
                <div class="section__heading text-center mb-40">
                    <h2 class="section__heading--maintitle">Before & After</h2>
                </div>
                <div id="comparison">
                    <figure>
                        <div id="handle"></div>
                        <div id="divisor"></div>
                    </figure>
                    <input type="range" min="0" max="100" value="50" id="slider" oninput="moveDivisor()">
                </div>
            </div>
        </div>
        <!-- End Before After section -->


        <!-- Start banner fullwidth section -->
        <section class="banner__fullwidth--section position-relative mt-5">
            <img class="banner__fullwidth--bg__thumbnail" src="assets/img/banner/banner-fullwidth2.webp" alt="img">
            <div class="banner__fullwidth--inner">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <div class="banner__fullwidth--thumbnail">
                                <img src="assets/img/banner/banner6.webp" alt="img">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="banner__fullwidth--content">
                                <h3 class="banner__fullwidth--content__subtitle">SPECIAL OFFER</h3>
                                <h2 class="banner__fullwidth--content__title">Set For A Good Time</h2>
                                <p class="banner__fullwidth--content__desc">We are committed to offering the finest selection of clean and natural skin care products created by the world’s leading brands that are pioneers in innovation, science, technology, and sustainability.</p>
                                <a class="banner__fullwidth--content__btn primary__btn" href="#">SHOP NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End banner fullwidth section -->

        <!-- Start skin advice section -->
        <section class="skin__advice--section section--padding ">
            <div class="container">
                <div class="skin__advice--content text-center">
                    <h2 class="skin__advice--content__title">Truly love the skin you're in</h2>
                    <p class="skin__advice--content__desc">Our vision is to give melanin rich skin the attention it deserves. We don't want to just nurture your skin—we want you to discover the beauty that lies within.</p>
                    <h3 class="skin__advice--content__subtitle">Everyone needs a Iil' Buttah – baby!</h3>
                </div>
            </div>
        </section>
        <!-- End skin advice section -->

        <!-- Start banner section -->
        <section class="banner__section section--padding pt-0">
            <div class="container">
                <div class="row mb--n30">
                    <div class="col-lg-6 col-md-6 mb-30">
                        <div class="banner__box border-radius-5 position-relative">
                            <a class="display-block" href="shop.php"><img class="banner__box--thumbnail border-radius-5" src="assets/img/banner/banner7.webp" alt="banner-img">
                                <div class="banner__box--content">
                                    <h2 class="banner__box--content__title ">Beauty Box</h2>
                                    <p class="banner__box--content__desc">Freshwater pearl necklace and earrings</p>
                                    <span class="banner__box--content__btn primary__btn">EXPLORE </span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 mb-30">
                        <div class="banner__box border-radius-5 position-relative">
                            <a class="display-block" href="shop.php"><img class="banner__box--thumbnail border-radius-5" src="assets/img/banner/banner8.webp" alt="banner-img">
                                <div class="banner__box--content">
                                    <h2 class="banner__box--content__title ">Organic Serium</h2>
                                    <p class="banner__box--content__desc">Freshwater pearl necklace and</p>
                                    <span class="banner__box--content__btn primary__btn style2">EXPLORE </span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End banner section -->

        <!-- Start testimonial section -->
        <section class="testimonial__section testimonial__bg section--padding">
            <div class="container">
                <div class="section__heading text-center mb-40">
                    <h2 class="section__heading--maintitle">What Clients Are Saying</h2>
                </div>
                <div class="testimonial__section--inner testimonial__swiper--activation swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="testimonial__items">
                                <div class="testimonial__author d-flex align-items-center">
                                    <div class="testimonial__author__thumbnail">
                                        <img src="assets/img/other/testimonial1.webp" alt="testimonial-img">
                                    </div>
                                    <div class="testimonial__author--text">
                                        <h3 class="testimonial__author--title">Michael	Linda</h3>
                                        <span class="testimonial__author--subtitle">Beautician</span>
                                        <ul class="rating testimonial__rating d-flex">
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
                                        </ul>
                                    </div>
                                </div>
                                <div class="testimonial__content">
                                    <p class="testimonial__desc"> 
                                    I'm in love with the quality of your makeup products! The eyeshadows are highly pigmented, and the lipsticks are long-lasting. My makeup looks flawless all day. Thank you for creating such amazing cosmetics!</p>
                                    <img class="testimonial__vector--icon" src="assets/img/icon/vector-icon.webp" alt="icon">
                                </div>
                                
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testimonial__items">
                                <div class="testimonial__author d-flex align-items-center">
                                    <div class="testimonial__author__thumbnail">
                                        <img src="assets/img/other/testimonial2.webp" alt="testimonial-img">
                                    </div>
                                    <div class="testimonial__author--text">
                                        <h3 class="testimonial__author--title">Lee Barners</h3>
                                        <span class="testimonial__author--subtitle">Beautician</span>
                                        <ul class="rating testimonial__rating d-flex">
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
                                        </ul>
                                    </div>
                                </div>
                                <div class="testimonial__content">
                                    <p class="testimonial__desc"> 
                                    Your skincare products have done wonders for my skin! I've noticed a significant improvement in my complexion since using your products. My skin feels so smooth and radiant now. I couldn't be happier </p>
                                    <img class="testimonial__vector--icon" src="assets/img/icon/vector-icon.webp" alt="icon">
                                </div>
                                
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testimonial__items">
                                <div class="testimonial__author d-flex align-items-center">
                                    <div class="testimonial__author__thumbnail">
                                        <img src="assets/img/other/testimonial3.webp" alt="testimonial-img">
                                    </div>
                                    <div class="testimonial__author--text">
                                        <h3 class="testimonial__author--title">Michael	Linda</h3>
                                        <span class="testimonial__author--subtitle">Beautician</span>
                                        <ul class="rating testimonial__rating d-flex">
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
                                        </ul>
                                    </div>
                                </div>
                                <div class="testimonial__content">
                                    <p class="testimonial__desc"> 
                                    I can't get enough of your range of nail polishes. The colors are trendy and vibrant, and the formula lasts without chipping. My nails always look salon-ready with your polishes </p>
                                    <img class="testimonial__vector--icon" src="assets/img/icon/vector-icon.webp" alt="icon">
                                </div>
                                
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testimonial__items">
                                <div class="testimonial__author d-flex align-items-center">
                                    <div class="testimonial__author__thumbnail">
                                        <img src="assets/img/other/testimonial4.webp" alt="testimonial-img">
                                    </div>
                                    <div class="testimonial__author--text">
                                        <h3 class="testimonial__author--title">Lee Barners</h3>
                                        <span class="testimonial__author--subtitle">Beautician</span>
                                        <ul class="rating testimonial__rating d-flex">
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
                                        </ul>
                                    </div>
                                </div>
                                <div class="testimonial__content">
                                    <p class="testimonial__desc"> 
                                    Your customer service is outstanding! I had a query about a product, and your team was quick to respond and provided all the information I needed. It's refreshing to receive such personalized attention. </p>
                                    <img class="testimonial__vector--icon" src="assets/img/icon/vector-icon.webp" alt="icon">
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="testimonial__pagination swiper-pagination"></div>
                </div>
            </div>
        </section>
        <!-- End testimonial section -->

        <!-- Start feature section -->
        <section class="feature__section section--padding">
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

        
    </div>
    <!-- Quickview Wrapper End -->

     <!-- Start News letter popup -->
     <div class="newsletter__popup" data-animation="slideInUp">
        <div id="boxes" class="newsletter__popup--inner">
            <button class="newsletter__popup--close__btn" aria-label="search close button">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 512 512"><path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368"></path></svg>
            </button>
            <div class="box newsletter__popup--box d-flex align-items-center">
                <div class="newsletter__popup--thumbnail">
                    <img class="newsletter__popup--thumbnail__img display-block" src="assets/img/banner/newsletter-popup-thumb2.webp" alt="newsletter-popup-thumb">
                </div>
                <div class="newsletter__popup--box__right">
                    <h2 class="newsletter__popup--title">Join Our Newsletter</h2>
                    <div class="newsletter__popup--content">
                        <label class="newsletter__popup--content--desc">Enter your email address to subscribe our notification of our new post &amp; features by email.</label>
                        <div class="newsletter__popup--subscribe" id="frm_subscribe">
                  
                            <div class="newsletter__popup--footer">
                                <input type="checkbox" id="newsletter__dont--show">
                                <label class="newsletter__popup--dontshow__again--text" for="newsletter__dont--show">Don't show this popup again</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End News letter popup -->

    <!-- Scroll top bar -->
    <button id="scroll__top"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 244l144-144 144 144M256 120v292"/></svg></button>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <!-- All Script JS Plugins here  -->
   <script src="assets/js/vendor/popper.js" defer="defer"></script>
   <!-- <script src="assets/js/vendor/bootstrap.min.js" defer="defer"></script> -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
   <script src="assets/js/plugins/swiper-bundle.min.js"></script>
   <script src="assets/js/plugins/glightbox.min.js"></script>

  <!-- Customscript js -->
  <script src="assets/js/script.js"></script>
  <!-- Assuming this is how you have the wishlist button defined in your HTML -->

  <script>
  $(document).ready(function () {
    $(document).on("click", ".wishlist-btn", function () {
      let proId = $(this).data('pro-id');
      console.log(proId);

      $.ajax({
        url: 'addToWishlist.php',
        method: 'POST',
        data: {
          proID: proId, // Fix the key here to proID
        },
        success: function (data) {
          // Parse the JSON response from the addToWishlist.php script
          const response = JSON.parse(data);

          // Check the status of the response
          if (response.status === 'success') {
            showAlert('success', response.message);
          } else {
            showAlert('error', response.message);
          }
        },
        error: function (xhr, status, error) {
          // Handle any errors that occur during the AJAX request
          console.error(error);
          showAlert('error', 'An error occurred during the AJAX request.');
        }
      });
    });

    // Function to show the Bootstrap alert with the specified status and message
    function showAlert(status, message) {
      // Set the alert style based on the status (success or error)
      const alertClass = status === 'success' ? 'alert-success' : 'alert-danger';

      // Update the alert element with the provided message and show it
    //   $('#alertStatus').text(status.toUpperCase());
      $('#alertText').text(message);
      $('#alertMessage').removeClass().addClass(`alert ${alertClass}`).show();

      // Automatically hide the alert after 5 seconds (adjust as needed)
      setTimeout(function () {
        $('#alertMessage').hide();
      }, 5000);
    }
  });
</script>


</body>
</html>