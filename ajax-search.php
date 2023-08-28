<?php 
include "config.php";
session_start();
if(!isset($_POST['searchPro'])){
    echo "<script> window.location.href = 'index.php' </script>";

}

$searchPro = $_POST['searchPro'];


$products = "SELECT * FROM `products` INNER JOIN `categories` ON `products`.`catID` = `categories`.`catID`
WHERE `proName` LIKE '%$searchPro%' OR `catName` LIKE '%$searchPro%'";

$res = mysqli_query($conn, $products);

$output= "";

        
if(mysqli_num_rows($res) > 0){
while($productsDetails = mysqli_fetch_assoc($res)) {

$output .= '<div class="col-lg-4 col-md-4 col-sm-6 col-6 custom-col mb-30">
        <article class="product__card">
            <div class="product__card--thumbnail">
                <a class="product__card--thumbnail__link display-block" href="product-details.php?proID='.$productsDetails['proID'].'">
                    <img class="product__card--thumbnail__img product__primary--img" src="admin/assets/images/products/'.$productsDetails['img1'].'" alt="product-img">
                    <img class="product__card--thumbnail__img product__secondary--img" src="admin/assets/images/products/'.$productsDetails['img2'].'" alt="product-img">
                </a>
                <ul class="product__card--action">
                    <li class="product__card--action__list">
                        <button class="product__card--action__btn wishlist-btn" data-pro-id="'.$productsDetails['proID'].'" title="Wishlist" href="" >
                            <svg class="product__card--action__btn--svg" width="18" height="18" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.5379 1.52734C11.9519 0.1875 9.51832 0.378906 8.01442 1.9375C6.48317 0.378906 4.04957 0.1875 2.46364 1.52734C0.412855 3.25 0.713636 6.06641 2.1902 7.57031L6.97536 12.4648C7.24879 12.7383 7.60426 12.9023 8.01442 12.9023C8.39723 12.9023 8.7527 12.7383 9.02614 12.4648L13.8386 7.57031C15.2879 6.06641 15.5886 3.25 13.5379 1.52734ZM12.8816 6.64062L8.09645 11.5352C8.04176 11.5898 7.98707 11.5898 7.90504 11.5352L3.11989 6.64062C2.10817 5.62891 1.91676 3.71484 3.31129 2.53906C4.3777 1.63672 6.01832 1.77344 7.05739 2.8125L8.01442 3.79688L8.97145 2.8125C9.98317 1.77344 11.6238 1.63672 12.6902 2.51172C14.0847 3.71484 13.8933 5.62891 12.8816 6.64062Z" fill="currentColor"/>
                            </svg>
                            <span class="visually-hidden">Wishlist</span> 
                        </butt>
                    </li>
                </ul>
                <form action="addToCart.php" method="post">
                <div class="product__add--to__card">
                <input type="hidden" name="proID" value="'.$productsDetails['proID'].'">
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
                
                <h3 class="product__card--title"><a href="product-details.php?proID='.$productsDetails['proID'].'">'.$productsDetails['proName'].'</a></h3>
                <div class="product__card--price">
                    <span class="current__price">$'.$productsDetails['sellPrice'].'</span>
                </div>  
            </div>
        </article>
    </div>';
    echo $output;

}
}else{
    $output .= "<h5 class='ms-5 ps-4'>No Result Found</h5>";
    echo $output;
}

?>