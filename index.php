<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Dashboard</title>
	<!--bootstrap css link-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
<!--font awesome link-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!--css file-->
<link rel="stylesheet" href="style.css">
<style>


  .body {
    background-color: #f0f0f0; /* Light gray color, change as needed */
  }


	.admin_image{
	width: 100px;
	object-fit: contain;
}

	.footer{
      position: absolute;
      bottom: 0;
}
</style>
</head>
<body>
	<!--navbar-->
	<div class="container-fluid p-0">
		<!--first child-->
		<nav class="navbar navbar-expand-lg navbar-light bg-info">
			<div class="container-fluid">
				<img src="../admin_area/product_images/download.png" alt="" class="logo">
				<nav class="navbar navbar-expand-lg">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a href="" class="nav-link">Welcome to our humble abode!</a>
						</li>
									
					</ul>
					
				</nav>
			</div>
		</nav>
		<!--second child-->
		<div class="bg-light">
			<h3 class="text-center p-2">Manage Details</h3>
		</div>
		<!--third child-->
		<div class="row">
			<div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
				<div class="px-5">
					<a href=""><img src="../admin_area/product_images/images.jpg" alt="" class="admin_image"></a>
					<p class="text-light text-center">Admin Name</p>
				</div>
				<!--button*10>a.nav-link.text.light.bg-info.my-1-->
				<div class="button text-center">
					<button class="my-3"><a href="insert_product.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
					<button><a href="" class="nav-link text-light bg-info my-1">View Products</a></button>
					<button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
					<button><a href="" class="nav-link text-light bg-info my-1">View Categories</a></button>
					<button><a href="index.php?Insert_brands" class="nav-link text-light bg-info my-1">Insert brands</a></button>
					<button><a href="" class="nav-link text-light bg-info my-1">View Brands</a></button>
					<button><a href="" class="nav-link text-light bg-info my-1">All orders</a></button>
					<button><a href="" class="nav-link text-light bg-info my-1">All payments</a></button>
					<button><a href="" class="nav-link text-light bg-info my-1">List users</a></button>
					<button><a href="" class="nav-link text-light bg-info my-1">Logout</a></button>
				</div>

			</div>
		</div>
		<!--fourth child-->
		<div class="container my-3">
			<?php
			if(isset($_GET['insert_category'])){
				include('insert_categories.php');
			  }
			  if(isset($_GET['Insert_brands']))
			  {
				include('Insert_brands.php');
			  }
			  ?>
			
		</div>
		




		<!--last child-->
<div class="bg-info p-3 text- footer">
  <p>All rights reserved ©-Designed by Apeksha Chauhan-2k25</p>
</div>
	</div>

	<!--bootstrap js link-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>