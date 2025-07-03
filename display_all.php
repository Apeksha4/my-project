<?php
include('./includes/connect.php');
include('./functions/function.php');

// Handle pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 9;
$offset = ($page - 1) * $limit;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>All Products</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-4">
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <?php getproducts($limit, $offset); ?>
    </div>

    <!-- Pagination -->
    <div class="text-center mt-4">
      <?php
      $count_query = "SELECT COUNT(*) as total FROM products";
      $result_count = mysqli_query($con, $count_query);
      $row_count = mysqli_fetch_assoc($result_count);
      $total_products = $row_count['total'];
      $total_pages = ceil($total_products / $limit);

      for ($i = 1; $i <= $total_pages; $i++) {
          echo "<a class='btn btn-outline-primary mx-1' href='display_all.php?page=$i'>$i</a>";
      }
      ?>
    </div>
  </div>
</body>
</html>
