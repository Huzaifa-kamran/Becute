<?php 
include "config.php";
session_start();
if(!isset($_SESSION['admin'])){
    echo "<script> window.location.href = 'adminlogin.php' </script>";

}

$searchPro = $_POST['searchPro'];


$products = "SELECT * FROM `products` INNER JOIN `categories` ON `products`.`catID` = `categories`.`catID`
WHERE `proName` LIKE '%$searchPro%' OR `catName` LIKE '%$searchPro%'";

$res = mysqli_query($conn, $products);

$output= "";


 if(mysqli_num_rows($res)>0){

    $output .=  
    '   <table class="table table-hover">
    <thead>
           <tr>
               <th scope="col">#</th>
               <th scope="col">Image</th>
               <th scope="col">Name</th>
               <th scope="col">Category</th>
               <th scope="col">Status</th>
               <th scope="col">Buy Price</th>
               <th scope="col">Sell Price</th>
               <th scope="col"></th>
           </tr>
    </thead>
           <tbody>';
    $count = 0;
  while($row = mysqli_fetch_assoc($res)){
    $count += 1;
    $output .= '<tr>
    <th scope="row"><a href="products-details.php?proId='.$row['proID'].'" class="text-reset"><?php echo $count; ?></a></th>
    <td>
    <a href="products-details.php?proId='.$row['proID'].'"> 
    <img src="assets/images/products/'.$row['img1'].'" alt=""
  class="icon-shape icon-sm">
</a>
</td>
    <td><a href="products-details.php?proId'.$row['proID'].'" class="text-reset">'.$row['proName'].'</a></td>
 <td><a href="products-details.php?proId='.$row['proID'].'" class="text-reset">'.$row['catName'].'</a></td>
<td>';
if($row['inStock'] == 1) {
    if($row['proStatus'] == 1) {
        $output .='<a href="products-details.php?proId='.$row["proID"].'" class="text-reset"><span class="badge bg-primary text-dark-primary">Published</span></a>';

    } else {
        $output .= '<a href="products-details.php?proId='.$row["proID"].'" class="text-reset"><span class="badge bg-danger text-dark-primary">Unpublished</span></a>';
    }
}else{
    $output .= '<a href="products-details.php?proId='.$row["proID"].'" class="text-reset"><span class="badge bg-danger text-dark-danger">Out of Stock</span></a>';
}
$output .='</td>	
<td><a href="products-details.php?proId='.$row['proID'].'" class="text-reset">$'.$row['buyPrice'].'</a></td>	
<td><a href="products-details.php?proId='.$row['proID'].'" class="text-reset">$'.$row['sellPrice'].'</a></td>	
    <td>
<div class="dropdown">
<a href="#" class="text-reset" data-bs-toggle="dropdown" aria-expanded="false">
<i class="fadeIn animated bx bx-dots-vertical"></i>
</a>
<ul class="dropdown-menu">
  <li><a class="dropdown-item" href="delete-product.php?delid='.$row['proID'].'"><i class="bx bx-trash me-1"></i> Delete</a></li>
  <li><a class="dropdown-item" href="update-product.php?updateid='.$row['proID'].'"><i class="bx bx-edit me-1"></i>Edit</a>
  </li>
</ul>
</div>
</td>
  </tr>';
     }
     $output .= '</tbody>
                 </table>';
                 echo $output;
 }else{
    $output .= "<h5 class='ms-5 ps-4'>No Result Found</h5>";
    echo $output;
 }
?>