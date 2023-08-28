<?php
include "header.php";

if(isset($_POST['updateCategory'])) {
    $catID = $_POST['catID'];
    $catName = $_POST['name'];
    $catDesc = $_POST['description'];
    $catStatus = $_POST['status'];
    $fileName = $_FILES['icon']['name'];
    $tmpName = $_FILES['icon']['tmp_name'];
    $type = $_FILES['icon']['type'];


    $checkQuery = "SELECT * FROM `categories` WHERE `catName` = '$catName'";
    $checkResult = mysqli_query($conn, $checkQuery);
    if (mysqli_num_rows($checkResult) > 0) {

        $err = "<p style='color:red'>Category name already exists. Please choose a different name.</p>";
    } else {

        if ($type == 'image/svg+xml' || $type == 'image/png' || $type == 'image/jpeg' || $fileName == "") {

            if(empty($fileName)) {
                $update = "UPDATE `categories` SET`catName`='$catName',`catDescription`='$catDesc',`catStatus`='$catStatus' WHERE `catID`= '$catID'";

                $updateQuery = mysqli_query($conn, $update);

                if ($updateQuery) {
                    echo "<script> alert('Category Update Successfully.') </script>";
                    echo "<script> window.location.href = 'categories.php' </script>";
                } else {
                    echo "<script> alert('An error occurred while updating the Category.') </script>";
                    echo "<script> window.location.href = 'update-category.php?updateid=$catID' </script>";
                }
            } else {
                $update = "UPDATE `categories` SET`catName`='$catName',
                           `catDescription`='$catDesc',`catStatus`='$catStatus',`catImg`='$fileName' WHERE `catID`= '$catID'";
                $updateQuery = mysqli_query($conn, $update);
                if ($updateQuery) {
                    if (move_uploaded_file($tmpName, 'assets/images/icons/' . $fileName)) {
                        echo "<script> alert('Category Update Successfully.') </script>";
                        echo "<script> window.location.href = 'categories.php' </script>";
                    } else {
                        echo "<script> alert('An error occurred while updating the Category.') </script>";
                        echo "<script> window.location.href = 'update-category.php?updateid=$catID' </script>";
                    }
                }
            }

        } else {
            echo "<script> alert('Please use supported file format, image/svg+xml , PNG or JPEG') </script>";
            echo "<script> window.location.href = 'update-category.php?updateid=$catID' </script>";
        }
    }
}




if(isset($_GET['updateid'])){
    $id = $_GET['updateid'];
     
    $query = "SELECT * FROM `categories` WHERE `categories`.`catID` = $id";
    $res = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc($res);
    // print_r($data);
    
    }
    
?>
<style>
.image {
  align-items: center;
  display: inline-flex;
  justify-content: center;
  text-align: center;
  vertical-align: middle;
  height: 140px;
  width: 130px;
  object-fit: cover;
}
.file-upload input.file-input {
    cursor: pointer;
    filter: alpha(opacity=0);
    font-size: 20px;
    height: 100%;
    margin: 0;
    opacity: 0;
    padding: 0;
    position: absolute;
    right: 0;
    top: 0;
}
</style>
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">eCommerce</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Orders</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-primary">Settings</button>
							<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
								<a class="dropdown-item" href="javascript:;">Another action</a>
								<a class="dropdown-item" href="javascript:;">Something else here</a>
								<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
							</div>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title">Add New Category</h5>
					  <hr/>
                       <div class="form-body mt-4">
					    <div class="row">
						<div class="col-lg-9">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="catID" value="<?php echo $data['catID'] ?>">

        <div class="border border-3 p-4 rounded">
		<h4 class="mb-5 h5">Category Image</h4>
                           <div class="mb-4 d-flex">
								<div class="position-relative">
									<img class="image icon-shape icon-xxxl bg-light rounded-4" src="assets\images\avatars\avatar-1.png" alt="Image">
									<div class="file-upload position-absolute end-0 top-0 mt-n2 me-n1">
										<input type="file" class="file-input" name="icon">
										<span class="icon-shape icon-sm rounded-circle bg-white">
											<i class="bx bxs-pencil text-muted"></i>
										</span>
									</div>
								</div>
							</div>

							<div class="mb-3">
								<label for="inputProductTitle" class="form-label">Category Title</label>
								<input type="text" name="name" value="<?php echo $data['catName']?>" class="form-control" id="inputProductTitle" placeholder="Enter category title">
							  </div>
					<?php echo @$err;?>
							  <div class="mb-3">
								<label for="inputProductDescription" class="form-label">Description</label>
								<textarea class="form-control" placeholder="Enter Category Description" name="desc" id="inputProductDescription" rows="3"><?php echo $data['catDescription']?></textarea>
							  </div>
							  <div class="mb-3 ">
                              <label class="form-label" id="productSKU">Status</label><br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status"
                                                    id="inlineRadio1" value="1" <?php if($data['catStatus']== 1){ echo "checked";}?>>
                                                <label class="form-check-label" for="inlineRadio1">Active</label>
                                            </div>
                                            <!-- input -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status"
                                                    id="inlineRadio2" value="0" <?php if($data['catStatus']== 0){ echo "checked";}?>>
                                                <label class="form-check-label" for="inlineRadio2">Disabled</label>
                                            </div>
                                        </div>
									  <div class="mb-3">
                                         <button type="submit" name="updateCategory" class="btn btn-primary">Add Category</button>
									  </div>
        </div>
    </form>
</div>

						   </div>
					   </div><!--end row-->
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
            $(".file-input").length &&
    $(".file-input").change(function () {
      var e = $(this).parent().parent().find(".image");
      console.log(e);
      var t = new FileReader();
      (t.onload = function (t) {
        e.attr("src", t.target.result);
      }),
        t.readAsDataURL(this.files[0]);
    });
		})
	</script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
</body>

</html>