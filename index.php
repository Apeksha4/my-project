<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
ini_set('display_errors', 1);
error_reporting(E_ALL);
include('./includes/connect.php');
include('./functions/function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Happy Shop</title>
  <!-- Bootstrap CSS (if not already added) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome for cart icon -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">


  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>

  <style>


  


    .sidebar {
      height: 100vh;
      overflow-y: auto;
      background-color: #e9ecef;
      border-right: 1px solid #ccc;
    }

    .card-img-top {
      height: 250px;
      object-fit: contain;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      background-color: #f8f9fa;
    }

    .card-img-top:hover {
      transform: scale(1.05);
      box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    }

    .text-decoration-none {
      color: inherit;
    }

    .text-decoration-none:hover {
      color: #0d6efd;
    }

    .card {
      transition: transform 0.3s ease;
    }

    .shop-title {
      font-size: 2.5rem;
      font-weight: bold;
      color: #0d6efd;
      animation: slideFromLeft 1s ease-out;
      text-shadow: 0 0 8px rgba(13, 110, 253, 0.6);
    }

    .shop-slogan.typewriter {
      font-size: 1.2rem;
      color: #555;
      font-style: italic;
      white-space: nowrap;
      overflow: hidden;
      border-right: 3px solid #0d6efd;
      width: 0;
      animation: typing 4s steps(60, end) forwards, blink 0.75s step-end infinite;
    }


    @keyframes zoomIn {
  0% { transform: scale(0.5); opacity: 0; }
  100% { transform: scale(1); opacity: 1; }
}


    @keyframes slideFromLeft {
      from { transform: translateX(-100px); opacity: 0; }
      to { transform: translateX(0); opacity: 1; }
    }

    @keyframes typing {
      from { width: 0; }
      to { width: 100%; }
    }

    @keyframes blink {
      50% { border-color: transparent; }
    }

    .carousel-item img {
      height: 400px;
      width: auto;
      object-fit: contain;
    }

    .carousel-caption {
      background: rgba(0, 0, 0, 0.5);
      border-radius: 10px;
    }
  </style>
</head>
<body>
<!-- Splash Screen -->
<!-- Logo Splash Screen -->
<div id="logo-screen" style="
  position: fixed;
  top: 0; left: 0;
  width: 100%; height: 100%;
  background: white;
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 9999;
  transition: opacity 1s ease;
">
  <img src="admin_area/product_images/download.png" alt="Happy Shop Logo" style="max-width: 300px; animation: zoomIn 1s ease-in-out;">
</div>


<div class="container-fluid p-0">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container-fluid">
      <img src="./admin_area/product_images/download.png" alt="Logo" style="height: 50px;" />
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="display_all.php">Products</a></li>
          <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
         <li class="nav-item">
  <a class="nav-link" href="contact.php">Contact</a>
</li>

         <?php
$cart_count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
?>
<a class="nav-link" href="cart.php">
  <i class="fa fa-shopping-cart"></i> Cart 
  <sup class="badge bg-danger text-white"><?php echo $cart_count; ?></sup>
</a>


        </ul>
        <form class="d-flex" method="get" action="search_product.php">
          <input class="form-control me-2" type="search" name="search_data" placeholder="Search" required />
          <input type="submit" class="btn btn-outline-light" name="search_data_product" value="Search" />
        </form>
      </div>
    </div>
  </nav>

  <!-- Animated Title and Slogan -->
  <div class="bg-light text-center p-4">
    <h3 class="shop-title">Happy Shop</h3>
    <p class="shop-slogan typewriter">Amazing things will happen when you listen to the consumer</p>
  </div>

 <!-- Bootstrap Carousel Slider -->
<div id="happyCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3000">

  <div class="carousel-inner">

    <!-- Slide 1 -->
    <div class="carousel-item active">
      <img src="./admin_area/product_images/istockphoto-2007737872-612x612.jpg" class="d-block mx-auto carousel-img-small" alt="New Arrival">
      <div class="carousel-caption d-none d-md-block">
        <h5>🎉 New Arrivals Coming Soon</h5>
        <p>Explore fresh and trending products.</p>
      </div>
    </div>

    <!-- Slide 2 -->
    <div class="carousel-item">
      <img src="./admin_area/product_images/download (2).jpg" class="d-block mx-auto carousel-img-small" alt="Big Sale">
      <div class="carousel-caption d-none d-md-block">
        <h5>🔥 Big Sale Today</h5>
        <p>Up to 50% off on selected items!</p>
      </div>
    </div>

    <!-- Slide 3 -->
    <div class="carousel-item">
      <img src="./admin_area/product_images/download (1).jpg" class="d-block mx-auto carousel-img-small" alt="Fast Delivery">
      <div class="carousel-caption d-none d-md-block">
        <h5>🚚 Fast Delivery</h5>
        <p>We deliver your happiness in 3–5 days.</p>
      </div>
    </div>

  </div>

  <!-- Carousel controls -->
  <button class="carousel-control-prev" type="button" data-bs-target="#happyCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#happyCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>


  <!-- Main Content -->
  <div class="container-fluid">
    <div class="row">

      <!-- Sidebar -->
      <div class="col-md-2 p-3 sidebar">
        <h5 class="text-center text-dark">Delivery Brands</h5>
        <ul class="list-group mb-4">
          <?php getbrands(); ?>
        </ul>

        <h5 class="text-center text-dark">Categories</h5>
        <ul class="list-group">
          <?php getcategories(); ?>
        </ul>
      </div>

      <!-- Product Cards -->
      <div class="col-md-10 p-4">
        <div class="row row-cols-1 row-cols-md-3 g-4">
          <?php getproducts(); ?>
        </div>


    </div>
   <div class="text-center mt-4">
  <a href="display_all.php" class="btn btn-info">View More Products</a>
</div>


  </div>
  <script>
document.querySelectorAll('.add-to-cart-btn').forEach(btn => {
  btn.addEventListener('click', function() {
    const productId = this.getAttribute('data-product-id');

    fetch('add_to_cart.php', {
      method: 'POST',
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
      body: 'product_id=' + productId
    })
    .then(response => response.text())
    .then(data => {
      document.getElementById('cart-count').innerText = data;
    });
  });
});
</script>
<script>
  setTimeout(() => {
    const logoScreen = document.getElementById("logo-screen");
    logoScreen.style.opacity = "0";
    setTimeout(() => logoScreen.style.display = "none", 1000);
  }, 3000); // show logo for 3 seconds
</script>



  <!-- Footer -->
  <?php include("./includes/footer.php") ?>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
