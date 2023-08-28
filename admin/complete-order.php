
    <?php 
    include "config.php";
    if(isset($_GET['updateid'])){
        $id = $_GET['updateid'];
         
        $query = "UPDATE `orders` SET `orderStatus` = '1' WHERE `orders`.`orderID` = $id";
        $res = mysqli_query($conn,$query);
        if($res){
            echo "<script> alert('Order Completed.') </script>";
                    echo "<script> window.location.href = 'orders.php' </script>";
        }
        }
    
    ?>