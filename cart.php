<?php
session_start();
include('./includes/connect.php');

// Initialize cart if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add product to cart
if (isset($_GET['add_to_cart'])) {
    $product_id = $_GET['add_to_cart'];

    if (!in_array($product_id, $_SESSION['cart'])) {
        $_SESSION['cart'][] = $product_id;
    }

    header("Location: cart.php");
    exit();
}

// Remove product from cart
if (isset($_GET['remove'])) {
    $product_id = $_GET['remove'];
    $_SESSION['cart'] = array_diff($_SESSION['cart'], [$product_id]);
    header("Location: cart.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Your Cart</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
  <h2>Your Cart</h2>

  <?php
  if (!empty($_SESSION['cart'])) {
      echo '<div class="row row-cols-1 row-cols-md-3 g-4">';
      foreach ($_SESSION['cart'] as $product_id) {
          $query = "SELECT * FROM products WHERE product_id = $product_id";
          $result = mysqli_query($con, $query);
          $row = mysqli_fetch_assoc($result);

          echo "
          <div class='col'>
            <div class='card h-100'>
              <img src='./admin_area/product_images/{$row['product_image1']}' class='card-img-top'>
              <div class='card-body'>
                <h5 class='card-title'>{$row['product_title']}</h5>
                <p class='card-text'>₹{$row['product_price']}</p>
                <a href='cart.php?remove={$row['product_id']}' class='btn btn-danger'>Remove</a>
              </div>
            </div>
          </div>";
      }
      echo '</div>';
  } else {
      echo "<p>Your cart is empty.</p>";
  }
  ?>

  <a href="index.php" class="btn btn-secondary mt-4">Continue Shopping</a>
</div>
</body>
</html>
