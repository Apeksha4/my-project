<?php
include('./includes/connect.php');

if (isset($_GET['product'])) {
    $product_id = intval($_GET['product']);
    $query = "SELECT * FROM products WHERE product_id = $product_id";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
} else {
    echo "Invalid request.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Buy Now - Checkout</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body class="bg-light">

<div class="container mt-5">
  <h3 class="mb-4">Buy Now</h3>

  <div class="card p-3">
    <div class="row">
      <div class="col-md-4">
        <img src="./admin_area/product_images/<?php echo htmlspecialchars($row['product_image1']); ?>" class="img-fluid" />
      </div>
      <div class="col-md-8">
        <h4><?php echo htmlspecialchars($row['product_title']); ?></h4>
        <p><?php echo htmlspecialchars($row['product_description']); ?></p>
        <h5 class="text-success">Price: ₹<?php echo htmlspecialchars($row['product_price']); ?></h5>

        <!-- Order Form -->
        <!-- Inside the <form> -->
<div class="mb-2">
  <label>Payment Method:</label>
  <select name="payment_method" class="form-select" required>
    <option value="">Select Payment Method</option>
    <option value="Cash on Delivery">Cash on Delivery</option>
    <option value="UPI">UPI</option>
    <option value="Card">Credit/Debit Card</option>
  </select>
</div>


      </div>
    </div>
  </div>
</div>


</body>
</html>
