<?php 

include "header.php";
$query = "SELECT * FROM `categories`";
$res = mysqli_query($conn,$query);



?>
<style>
	.icon-shape{

align-items: center;
display: inline-flex;
justify-content: center;
text-align: center;
vertical-align: middle;
}
.icon-sm {
height: 2rem;
line-height: 2rem;
width: 2rem;
}
</style>
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">

				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col-lg-3 col-xl-2">
										<a href="add-new-category.php" class="btn btn-primary mb-3 mb-lg-0" style="font-size: 14px;"><i class='bx bxs-plus-square'></i>New Category</a>
									</div>
									<div class="col-lg-9 col-xl-10">
										<form class="float-lg-end">
											<div class="row row-cols-lg-2 row-cols-xl-auto g-2">
												<div class="col">
													<div class="position-relative">
														<input type="text" class="form-control ps-5" id="search" placeholder="Search category..."> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
													</div>
												</div>
												<div class="col">
												<select class="form-select" id="filter">
															<option value="*" selected>All</option>
															<option value="1">Active</option>
															<option value="0">Deactive</option>
															</select>
												</div>
											
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

                <div class="table-responsive" id="catTable">
					<?php if(mysqli_num_rows($res)>0){?>
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
                            <tbody>
							<?php 
                      $count = 0;
while($row = mysqli_fetch_assoc($res)) {
	$count += 1; 
    ?>
                                <tr>
                                <th  scope="row"><a href="category-details.php?catId=<?php echo $row['catID']?>" class="text-reset"><?php echo $count; ?></a></th>
                                <td><a href="category-details.php?catId=<?php echo $row['catID']?>"> <img src="assets/images/icons/<?php echo $row['catImg'] ?>" alt=""
                              class="icon-shape icon-sm"></a></td>
                                <td><a href="category-details.php?catId=<?php echo $row['catID']?>" class="text-reset"><?php echo $row['catName'] ?></a></td>
								<?php 
                $productCount = "SELECT `categories`.`catID`, COUNT(`products`.`proID`) FROM `products` RIGHT JOIN 
				`categories` ON `categories`.`catID` = `products`.`catID` WHERE `categories`.`catID` = " . $row['catID'] . " GROUP BY 
				`categories`.`catID`";
			
		
                        $countRes = mysqli_query($conn,$productCount);
                        $data = mysqli_fetch_assoc($countRes);
                        if(isset($data['COUNT(`products`.`proID`)'])){
                          echo "<td><a href='category-details.php?catId=".$row['catID']."' class='text-reset'>" . $data['COUNT(`products`.`proID`)'] . "</a></td>";
                        }else{
                          echo "<td><a href='category-details.php?catId=".$row['catID']."' class='text-reset'> 0 </a></td>";
                        }
                        ?>
                                     <td>
                          <?php 
                          if($row['catStatus'] == 1){
                            echo "<a href='category-details.php?catId=".$row['catID']."'><span class='badge bg-primary text-dark-primary'>Published</span></a>";
                          }else{
                            echo "<a href='category-details.php?catId=".$row['catID']."'><span class='badge bg-danger text-dark-danger'>Unpublished</span></a>";
                          }
                          
                          ?>
                        </td>		
								<td>
                          <div class="dropdown">
                            <a href="#" class="text-reset" data-bs-toggle="dropdown" aria-expanded="false">
							<i class="fadeIn animated bx bx-dots-vertical"></i>
                            </a>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="delete-category.php?delid=<?php echo $row['catID'] ?>"><i class="bx bx-trash me-1"></i> Delete</a></li>
                              <li><a class="dropdown-item" href="update-category.php?updateid=<?php echo $row['catID'] ?>"><i class="bx bx-edit me-1"></i>Edit</a>
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
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © 2021. All right reserved.</p>
		</footer>
	</div>
	<!--end wrapper-->
	<!--start switcher-->

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
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
	<script>
		$(document).ready(function () {
  $("#search").on("keyup",function(){

  let searchVal = $(this).val();
//   console.log(searchVal) ;

$.ajax(
  {
    url:"ajax-cat-search.php",
    type:"POST",
    data:{
      searchCat: searchVal,
    },
    success:function(data){
      $("#catTable").html(data);
    },
  }
)


  });
   // Filter Categories 
   $("#filter").on("change",function(){
    filterValue = $(this).val();

    $.ajax(
  {

    url: "ajax-filter-cat.php",
          type: "POST",
          data: {
            categoryStatus: filterValue
          },
success: function (data){

  $("#catTable").html(data)

}

  });

});
  });

	</script>
</body>

</html>