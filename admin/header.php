<?php
include "config.php";
session_start();
if(! isset($_SESSION['admin'])){
	echo "<script> window.location.href = 'adminlogin.php' </script>";
}

?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png"/>
	<!--plugins-->
	<link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet"/>
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet"/>
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="assets/css/dark-theme.css"/>
	<link rel="stylesheet" href="assets/css/semi-dark.css"/>
	<link rel="stylesheet" href="assets/css/header-colors.css"/>
	<title>becute</title>
</head>

<body>
	
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<a href="index.php">
				<div>
					<img src="assets/images/icons/nav-log.webp"  alt="logo icon">
				</div>
				</a>
			 </div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="index.php">
						<div class="parent-icon"><i class='bx bx-home-alt'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				
				<li class="menu-label">UI Elements</li>
				<li>
					<a href="categories.php">
						<div class="parent-icon"><i class='bx bx-radio-circle'></i>
						</div>
						<div class="menu-title">Categories</div>
					</a>
				</li>
				<li>
					<a href="products.php">
						<div class="parent-icon"><i class='bx bx-radio-circle'></i>
						</div>
						<div class="menu-title">Products</div>
					</a>
				</li>
				<li>
					<a href="users.php">
						<div class="parent-icon"><i class='bx bx-radio-circle'></i>
						</div>
						<div class="menu-title">Users</div>
					</a>
				</li>
				<li>
					<a href="orders.php">
						<div class="parent-icon"><i class='bx bx-radio-circle'></i>
						</div>
						<div class="menu-title">orders</div>
					</a>
				</li>
				<li>
					<a href="feedback.php">
						<div class="parent-icon"><i class='bx bx-radio-circle'></i>
						</div>
						<div class="menu-title">Feedback</div>
					</a>
				</li>
			
				
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		
		<header>
			
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand gap-3">
					
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>

					  <div class="position-relative search-bar d-lg-block d-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
						<input class="form-control px-5" disabled type="search" placeholder="Search">
						<span class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-5"><i class='bx bx-search'></i></span>
					  </div>


					  <div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center gap-1">
						
							<li class="nav-item dark-mode d-none d-sm-flex">
								<a class="nav-link dark-mode-icon" href="javascript:;"><i class='bx bx-moon'></i>
								</a>
							</li>

						
						
						</ul>
					</div>
					<div class="user-box dropdown px-3">
						<a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="assets/images/admin-image/<?php echo $_SESSION['adminImg']?>" class="user-img" alt="user avatar">
							<div class="user-info">
								<p class="user-name mb-0"><?php echo $_SESSION['admin']?></p>
								<p class="designattion mb-0">Admin</p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-user fs-5"></i><span>Profile</span></a>
							</li>
							<li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-cog fs-5"></i><span>Settings</span></a>
							</li>
							<li><a class="dropdown-item d-flex align-items-center" href="index.php"><i class="bx bx-home-circle fs-5"></i><span>Dashboard</span></a>
							</li>
							<li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-dollar-circle fs-5"></i><span>Earnings</span></a>
							</li>
							<li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-download fs-5"></i><span>Downloads</span></a>
							</li>
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li><a class="dropdown-item d-flex align-items-center" href="logout.php"><i class="bx bx-log-out-circle"></i><span> Logout</span></a>
							</li>
						</ul>
					</div>
				</nav>
				
			</div>
			
		</header>
		
		<!--end header -->
		

		