<?php
include "header.php";
$categories = "SELECT * FROM `categories`";
$res = mysqli_query($conn,  $categories);



if (isset($_POST['createProduct'])) {


    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $catID = $_POST['catID'];
    $status = $_POST['status'];
    $buyPrice = $_POST['buy'];
    $sellPrice = $_POST['sell'];
    $proType = $_POST['type'];
    $fileName1 = $_FILES['img1']['name'];
    $tmpName1 = $_FILES['img1']['tmp_name'];
    $type1 = $_FILES['img1']['type'];
    $fileName2 = $_FILES['img2']['name'];
    $tmpName2 = $_FILES['img2']['tmp_name'];
    $type2 = $_FILES['img2']['type'];
    $inStock = isset($_POST['stock']) ? 1 : 0;

if($catID == 0){
	$catErr = "<p style='color:red'>Category Should be select.</p>";
}

if ($type1 == 'image/jpg' || $type1 == 'image/png' || $type1 == 'image/jpeg' || $type2 == 'image/jpg' || $type2 == 'image/png' || $type2 == 'image/jpeg' || $type1 == 'image/webp' || $type2 == 'image/webp') {
    $checkQuery = "SELECT * FROM `products` WHERE `proName` = '$name'";
    $checkResult = mysqli_query($conn, $checkQuery);
    if (mysqli_num_rows($checkResult) > 0) {

        $err = "<p style='color:red'>Product name already exists. Please choose a different name.</p>";
    } else {

		if($catID == 0){
			$catErr = "<p style='color:red'>Category Should be select.</p>";
		}else{


			if($fileName1 == $fileName2){
				$imgErr = "<p style='color:red'>Please Select Different images.</p>";
			}else{

    if (move_uploaded_file($tmpName1, 'assets/images/products/' . $fileName1) && move_uploaded_file($tmpName2, 'assets/images/products/' . $fileName2)) {


        $product = "INSERT INTO `products` (`proName`, `proDesc`, `catID`, `proStatus`, `buyPrice`, 
			`sellPrice`, `proType`,`createdAt`, `inStock`, `img1`, `img2`) VALUES ( '$name', '$desc', '$catID', '$status', '$buyPrice', 
			'$sellPrice', 'proType', current_timestamp(), '$inStock','$fileName1','$fileName2')";


        $res =  mysqli_query($conn, $product);
        if ($res) {
            echo "<script> alert('Product Added') </script>";
            echo "<script> window.location.href = 'products.php' </script>";

        }
    }








}



        }


    }
}else {
        echo "<script> alert('Please use supported file format, JPG , JPEG or PNG') </script>";
    
}
}
?>

		<!--start page wrapper -->
		<div class="page-wrapper">
  <div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">eCommerce</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">Orders</li>
          </ol>
        </nav>
      </div>
      <div class="ms-auto">
        <div class="btn-group">
          <button type="button" class="btn btn-primary">Settings</button>
          <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">
            <span class="visually-hidden">Toggle Dropdown</span>
          </button>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
            <a class="dropdown-item" href="javascript:;">Action</a>
            <a class="dropdown-item" href="javascript:;">Another action</a>
            <a class="dropdown-item" href="javascript:;">Something else here</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="javascript:;">Separated link</a>
          </div>
        </div>
      </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
      <div class="card-body p-4">
        <h5 class="card-title">Add New Product</h5>
        <hr/>
        <div class="form-body mt-4">
			<p class="text-danger"><?php echo @$err;?></p>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-lg-8">
              <div class="border border-3 p-4 rounded">
                  <div class="mb-3">
                    <label for="inputProductTitle" class="form-label">Product Title</label>
                    <input type="text" name="name" value="<?php echo @$_POST['name']?>" class="form-control" id="inputProductTitle" placeholder="Enter product title" required>
                  </div>
                  <div class="mb-3">
                    <label for="inputProductType" class="form-label">Category</label>
                    <select class="form-select" name="catID" id="inputProductType"  required>
                      <option value="0">Select Category</option>
                      <?php while ($row = mysqli_fetch_assoc($res)) { ?>
                        <option value="<?php echo $row['catID'] ?>"><?php echo $row['catName'] ?></option>
                      <?php } ?>
                    </select>
					<?php echo @$catErr?>
                  </div>
                  <div class="mb-3">
					<div class="row">
					 <div class="col-6"> 
							<label for="inputProductDescription" class="form-label">Product Images</label>
                            <br>
                             <input id="image-uploadify" name="img1" type="file" required>
						</div>
					<div class="col-6">  
						<label for="inputProductDescription" class="form-label">Product Images</label>
                    <br>
                    <input id="image-uploadify" name="img2" type="file" required>
				</div>
				<?php echo @$imgErr?>
					</div>
                  
                  </div>
                  <div class="mb-3">
                    <label for="inputProductDescription" class="form-label">Description</label>
                    <textarea class="form-control" name="desc" id="inputProductDescription" rows="3" required><?php echo @$_POST['desc']?></textarea>
                  </div>
               
              </div>
            </div>
            <div class="col-lg-4">
              <div class="border border-3 p-4 rounded">
                <div class="row g-3">
                  <div class="col-md-6">
                    <label for="inputPrice" class="form-label">Buy Price</label>
                    <input type="number" name="buy" value="<?php echo @$_POST['buy']?>" class="form-control" id="inputPrice" placeholder="00.00" min="0" required>
                  </div>
                  <div class="col-md-6">
                    <label for="inputCompareatprice" class="form-label">Sell Price</label>
                    <input type="number" name="sell" value="<?php echo @$_POST['sell']?>" class="form-control" id="inputCompareatprice" placeholder="00.00" min="0" required>
                  </div>
                  <div class="col-12">
                    <label for="inputProductType" class="form-label">Product Type</label>
                    <select class="form-select" name="type" id="inputProductType">
					  <option value="Normal" <?php if(isset($_POST['type'])){if($_POST['type'] == "Normal"){echo "selected";}} ?>>Normal</option>
                      <option value="Trending" <?php if(isset($_POST['type'])){if($_POST['type'] == "Trending"){echo "selected";}} ?>>Trending</option>
                      <option value="Featured" <?php if(isset($_POST['type'])){if($_POST['type'] == "Featured"){echo "selected";}} ?>>Featured</option>
                      <option value="Deal of Weak" <?php if(isset($_POST['type'])){if($_POST['type'] == "Deal of Weak"){echo "selected";}} ?>>Deal of Weak</option>
                    </select>
                  </div>
                  <div class="col-12">
				  <div class="form-check form-switch">
  <input class="form-check-input" name="stock" style="width: 35px;height:19px" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
  <label class="form-check-label ms-2 mt-1" for="flexSwitchCheckChecked">In Stock</label>
</div>
                    <div class="mb-3 mt-3">
                      <label class="form-label" style="font-size: 15px;" id="catductSKU">Status</label><br>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1" checked>
                        <label class="form-check-label" for="inlineRadio1">Active</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0">
                        <label class="form-check-label" for="inlineRadio2">Disabled</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="d-grid">
                      <button type="submit" name="createProduct" class="btn btn-primary">Add Product</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div><!--end row-->
		  </form>
        </div>
      </div>
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
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js"></script>
	<script>
		$(document).ready(function () {
			$('#image-uploadify').imageuploadify();
		})
	</script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
</body>

</html>