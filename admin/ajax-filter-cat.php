<?php
include 'config.php';
session_start();
if(!isset($_SESSION['admin'])){


    echo "<script> window.location.href = 'adminlogin.php' </script>";


}

$filter = $_POST['categoryStatus'];

if($filter == 1){
    
$category = "SELECT * FROM `categories` WHERE `catStatus` = '1' ";

}elseif($filter == 0){

    $category = "SELECT * FROM `categories` WHERE `catStatus` = '0' ";

}else{
    $category = "SELECT * FROM `categories`";
}


$res = mysqli_query($conn, $category);

$output= "";


if(mysqli_num_rows($res)>0){

    $output = '
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Products</th>
            <th scope="col">Status</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>';

$count = 1;
while ($row = mysqli_fetch_assoc($res)) {
    $output .= '
    <tr>
        <th scope="row"><a href="category-details.php?catId='.$row["catID"].'" class="text-reset" > '. $count . '</a></th>
        <td><a href="category-details.php?catId='.$row["catID"].'"><img src="assets/images/icons/' . $row['catImg'] . '" alt="" class="icon-shape icon-sm"></a></td>
        <td><a href="category-details.php?catId='.$row["catID"].'" class="text-reset">' . $row['catName'] . '</a></td>';

    $productCount = "SELECT `categories`.`catID`, COUNT(`products`.`proID`) FROM `products` RIGHT JOIN `categories` ON `categories`.`catID` = `products`.`catID` WHERE `categories`.`catID` = 3 GROUP BY `categories`.`catID`";
    $countRes = mysqli_query($conn, $productCount);
    $data = mysqli_fetch_assoc($countRes);

    if (isset($data['COUNT(`products`.`proID`)'])) {
        $output .= '<td><a href="category-details.php?catId='.$row["catID"].'" class="text-reset" >' . $data['COUNT(`products`.`proID`)'] . '</a></td>';
    } else {
        $output .= '<td><a href="category-details.php?catId='.$row["catID"].'" class="text-reset" >0</a></td>';
    }

    $output .= '<td>';

    if ($row['catStatus'] == 1) {
        $output .= '<a href="category-details.php?catId='.$row["catID"].'" class="text-reset" >
        <span class="badge bg-primary text-dark-primary">Published</span></a>';
    } else {
        $output .= '<a href="category-details.php?catId='.$row["catID"].'" class="text-reset" >
        <span class="badge bg-danger text-dark-danger">Unpublished</span></a>';
    }

    $output .= '</td>
        <td>
            <div class="dropdown">
                <a href="#" class="text-reset" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fadeIn animated bx bx-dots-vertical"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="delete-category.php?delid=' . $row['catID'] . '"><i class="bx bx-trash me-1"></i>Delete</a></li>
                    <li><a class="dropdown-item" href="update-category.php?updateid=' . $row['catID'] . '"><i class="bx bx-edit me-1"></i>Edit</a></li>
                </ul>
            </div>
        </td>
    </tr>';

    $count++;
}

$output .= '
    </tbody>
</table>';


                 echo $output;
 }else{
    $output .= "<h5 class='ms-5 ps-4'>No Result Found</h5>";
    echo $output;
 }



?>