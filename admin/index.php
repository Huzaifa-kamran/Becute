<?php 

include "header.php";



?>

		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                   <div class="col">
					 <div class="card radius-10 border-start border-0 border-4 border-info">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-secondary">Total Orders</p>
									<h4 class="my-1 text-info"><?php
// Assuming you have already established a connection to the database in $conn variable

// Query to count the total number of users
$OrderCount = "SELECT COUNT(`orderID`) AS total_orders FROM `orders`;";
$OrderCountRes = mysqli_query($conn, $OrderCount);

// Check if the query executed successfully
if ($OrderCountRes) {
    // Fetch the user count data
    $OrderCountData = mysqli_fetch_assoc($OrderCountRes);
    // Access the total number of users using the 'total_users' key from the associative array
    $totalOrders = $OrderCountData['total_orders'];

    // Display the total number of users
    echo $totalOrders;
} else {
    // Handle the case when the query fails
    echo "Error: Unable to fetch Order count.";
}

?>
</h4>

								</div>
								<div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i class='bx bxs-cart'></i>
								</div>
							</div>
						</div>
					 </div>
				   </div>
				   <div class="col">
					<div class="card radius-10 border-start border-0 border-4 border-danger">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div>
								   <p class="mb-0 text-secondary">Total Revenue</p>
								   <h4 class="my-1 text-danger"><?php
// Assuming you have already established a connection to the database in $conn variable

// Query to count the total number of users
$RevenueCount = "SELECT SUM(od.quantityOrdered * p.sellPrice) AS totalRevenue
FROM orderdetails od
INNER JOIN products p ON od.productID = p.proID;";
$RevenueCountRes = mysqli_query($conn, $RevenueCount);

// Check if the query executed successfully
if ($RevenueCountRes) {
    // Fetch the user count data
    $RevenueCountData = mysqli_fetch_assoc($RevenueCountRes);
    // Access the total number of users using the 'total_users' key from the associative array
    $totalRevenue = $RevenueCountData['totalRevenue'];

    // Display the total number of users
    echo"$". $totalRevenue;
} else {
    // Handle the case when the query fails
    echo "Error: Unable to fetch Order count.";
}

?></h4>
					
							   </div>
							   <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto"><i class='bx bxs-wallet'></i>
							   </div>
						   </div>
					   </div>
					</div>
				  </div>
				  <div class="col">
					<div class="card radius-10 border-start border-0 border-4 border-success">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div>
								   <p class="mb-0 text-secondary">Products</p>
								   <h4 class="my-1 text-success"><?php
// Assuming you have already established a connection to the database in $conn variable

$productCount = "SELECT count(`products`.`proID`) AS product_count FROM `products`;";
$productCountRes = mysqli_query($conn, $productCount);

// Check if the query executed successfully
if ($productCountRes) {
    // Fetch the product count data
    $proCountData = mysqli_fetch_assoc($productCountRes);
    // Access the product count using the 'product_count' key from the associative array
    $productCountValue = $proCountData['product_count'];

    // Display the product count
    echo  $productCountValue;
} else {
    // Handle the case when the query fails
    echo "Error: Unable to fetch product count.";
}

?>
</h4>
						
							   </div>
							   <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class='bx bxs-bar-chart-alt-2' ></i>
							   </div>
						   </div>
					   </div>
					</div>
				  </div>
				  <div class="col">
					<div class="card radius-10 border-start border-0 border-4 border-warning">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div>
								   <p class="mb-0 text-secondary">Total Customers</p>
								   <h4 class="my-1 text-warning"><?php
// Assuming you have already established a connection to the database in $conn variable

// Query to count the total number of users
$userCount = "SELECT COUNT(`userID`) AS total_users FROM `users`;";
$userCountRes = mysqli_query($conn, $userCount);

// Check if the query executed successfully
if ($userCountRes) {
    // Fetch the user count data
    $userCountData = mysqli_fetch_assoc($userCountRes);
    // Access the total number of users using the 'total_users' key from the associative array
    $totalUsers = $userCountData['total_users'];

    // Display the total number of users
    echo  $totalUsers;
} else {
    // Handle the case when the query fails
    echo "Error: Unable to fetch user count.";
}

?>
</h4>
								  
							   </div>
							   <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto"><i class='bx bxs-group'></i>
							   </div>
						   </div>
					   </div>
					</div>
				  </div> 
				</div><!--end row-->


				 <div class="card radius-10">
					<div class="card-header">
						<div class="d-flex align-items-center">
							<div>
								<h6 class="mb-0">10 best selling products</h6>
							</div>
							<div class="dropdown ms-auto">
								<a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
								</a>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="javascript:;">Action</a>
									</li>
									<li><a class="dropdown-item" href="javascript:;">Another action</a>
									</li>
									<li>
										<hr class="dropdown-divider">
									</li>
									<li><a class="dropdown-item" href="javascript:;">Something else here</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
                         <div class="card-body">
						 <div class="table-responsive">

						   <?php
						   $topProducts = "SELECT proID,proName,img1,inStock,proStatus,buyPrice,sellPrice, SUM(quantityOrdered) AS totalQuantitySold 
						   FROM orderdetails INNER JOIN products ON orderdetails.productID = products.proID
						   GROUP BY productID 
						   ORDER BY totalQuantitySold DESC 
						   LIMIT 10";
						   $res = mysqli_query($conn,$topProducts);
							
						   if(mysqli_num_rows($res)>0){?>
                    <table class="table table-hover">
                     <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Status</th>
                                <th scope="col">Buy Price</th>
                                <th scope="col">Sell Price</th>
                                <th scope="col"></th>
                            </tr>
                     </thead>
                            <tbody>
							<?php 
								$count =0;
			while($row = mysqli_fetch_assoc($res)) {
				$count += 1;
				?>
                                <tr>
                                <th scope="row"><a href="products-details.php?proId=<?php echo $row['proID']?>" class="text-reset"><?php echo $count; ?></a></th>
                                <td>
								<a href="products-details.php?proId=<?php echo $row['proID']?>"> 
								<img src="assets/images/products/<?php echo $row['img1'] ?>" width="50px" alt=""
                              class="icon-shape icon-sm">
							</a>
							</td>
                                <td><a href="products-details.php?proId=<?php echo $row['proID']?>" class="text-reset"><?php echo $row['proName'] ?></a></td>
                            <td>
							<?php 
							if($row['inStock'] == 1) {
								if($row['proStatus'] == 1) {
									echo '<a href="products-details.php?proId='.$row["proID"].'" class="text-reset"><span class="badge bg-success text-dark-success">Active</span></a>';

								} else {
									echo '<a href="products-details.php?proId='.$row["proID"].'" class="text-reset"><span class="badge bg-secondary text-dark-primary">Disabled</span></a>';
								}
							}else{
								echo '<a href="products-details.php?proId='.$row["proID"].'" class="text-reset"><span class="badge bg-danger text-dark-danger">Out of Stock</span></a>';
							}
							?>
                        </td>	
						<td><a href="products-details.php?proId=<?php echo $row['proID']?>" class="text-reset">$<?php echo $row['buyPrice'] ?></a></td>	
						<td><a href="products-details.php?proId=<?php echo $row['proID']?>" class="text-reset">$<?php echo $row['sellPrice'] ?></a></td>	
								<td>
                          <div class="dropdown">
                            <a href="#" class="text-reset" data-bs-toggle="dropdown" aria-expanded="false">
							<i class="fadeIn animated bx bx-dots-vertical"></i>
                            </a>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="delete-product.php?delid=<?php echo $row['proID'] ?>"><i class="bx bx-trash me-1"></i> Delete</a></li>
                              <li><a class="dropdown-item" href="update-product.php?updateid=<?php echo $row['proID'] ?>"><i class="bx bx-edit me-1"></i>Edit</a>
                              </li>
                            </ul>
                          </div>
                        </td>
						
                                </tr>
								<?php }?>
                            </tbody>
                        </table>
						<?php }else{
echo "<h5 class='ms-5 ps-4'>No Result Found</h5>";
						}?>
						  </div>
						 </div>
					</div>


					
					<div class="card radius-10">
					<div class="card-header">
						<div class="d-flex align-items-center">
							<div>
								<h6 class="mb-0">10 best clients/users (doing maximum shopping).</h6>
							</div>
						</div>
					</div>
                         <div class="card-body">
						 <div class="table-responsive">

						   <?php
						   $topCustomer = "SELECT customerID, customerName, SUM(orderAmount) AS totalOrderAmount
						   FROM orders
						   GROUP BY customerID, customerName
						   ORDER BY totalOrderAmount DESC
						   LIMIT 10";
						   $customerRes = mysqli_query($conn,$topCustomer);
							
						   if(mysqli_num_rows($customerRes)>0){?>
                    <table class="table table-hover">
                     <thead>
                            <tr>
                  
                                <th scope="col">ID</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Total Order Amount</th>
                            </tr>
                     </thead>
                            <tbody>
							<?php 
							
			while($row2 = mysqli_fetch_assoc($customerRes)) {
				$count += 1;
				?>
                                <tr>
                                <th scope="row"><?php echo $row2['customerID'] ?></th>
                            
                                <td><?php echo $row2['customerName'] ?></td>
                                <td><?php echo $row2['totalOrderAmount'] ?></td>
                    
						
                                </tr>
								<?php }?>
                            </tbody>
                        </table>
						<?php }else{
echo "<h5 class='ms-5 ps-4'>No Result Found</h5>";
						}?>
						  </div>
						 </div>
					</div>
			</div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		 <div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button-->
		  <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © 2022. All right reserved.</p>
		</footer>
	</div>
	<!--end wrapper-->


	<!-- search modal -->
    <div class="modal" id="SearchModal" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
		  <div class="modal-content">
			<div class="modal-header gap-2">
			  <div class="position-relative popup-search w-100">
				<input class="form-control form-control-lg ps-5 border border-3 border-primary" type="search" placeholder="Search">
				<span class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-4"><i class='bx bx-search'></i></span>
			  </div>
			  <button type="button" class="btn-close d-md-none" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="search-list">
				   <p class="mb-1">Html Templates</p>
				   <div class="list-group">
					  <a href="javascript:;" class="list-group-item list-group-item-action active align-items-center d-flex gap-2 py-1"><i class='bx bxl-angular fs-4'></i>Best Html Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-vuejs fs-4'></i>Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-magento fs-4'></i>Responsive Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-shopify fs-4'></i>eCommerce Html Templates</a>
				   </div>
				   <p class="mb-1 mt-3">Web Designe Company</p>
				   <div class="list-group">
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-windows fs-4'></i>Best Html Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-dropbox fs-4' ></i>Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-opera fs-4'></i>Responsive Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-wordpress fs-4'></i>eCommerce Html Templates</a>
				   </div>
				   <p class="mb-1 mt-3">Software Development</p>
				   <div class="list-group">
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-mailchimp fs-4'></i>Best Html Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-zoom fs-4'></i>Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-sass fs-4'></i>Responsive Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-vk fs-4'></i>eCommerce Html Templates</a>
				   </div>
				   <p class="mb-1 mt-3">Online Shoping Portals</p>
				   <div class="list-group">
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-slack fs-4'></i>Best Html Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-skype fs-4'></i>Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-twitter fs-4'></i>Responsive Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-vimeo fs-4'></i>eCommerce Html Templates</a>
				   </div>
				</div>
			</div>
		  </div>
		</div>
	  </div>
    <!-- end search modal -->




	<!--start switcher-->
	<div class="switcher-wrapper">
		<div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
		</div>
		<div class="switcher-body">
			<div class="d-flex align-items-center">
				<h5 class="mb-0 text-uppercase">Theme Customizer</h5>
				<button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
			</div>
			<hr/>
			<h6 class="mb-0">Theme Styles</h6>
			<hr/>
			<div class="d-flex align-items-center justify-content-between">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" checked>
					<label class="form-check-label" for="lightmode">Light</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
					<label class="form-check-label" for="darkmode">Dark</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark">
					<label class="form-check-label" for="semidark">Semi Dark</label>
				</div>
			</div>
			<hr/>
			<div class="form-check">
				<input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
				<label class="form-check-label" for="minimaltheme">Minimal Theme</label>
			</div>
			<hr/>
			<h6 class="mb-0">Header Colors</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator headercolor1" id="headercolor1"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor2" id="headercolor2"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor3" id="headercolor3"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor4" id="headercolor4"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor5" id="headercolor5"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor6" id="headercolor6"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor7" id="headercolor7"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor8" id="headercolor8"></div>
					</div>
				</div>
			</div>
			<hr/>
			<h6 class="mb-0">Sidebar Colors</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator sidebarcolor1" id="sidebarcolor1"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor2" id="sidebarcolor2"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor3" id="sidebarcolor3"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor4" id="sidebarcolor4"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor5" id="sidebarcolor5"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor6" id="sidebarcolor6"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor7" id="sidebarcolor7"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor8" id="sidebarcolor8"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script> -->
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="assets/plugins/chartjs/js/chart.js"></script>
	<script src="assets/js/index.js"></script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
	<script>
		new PerfectScrollbar(".app-container")
	</script>
</body>

</html>