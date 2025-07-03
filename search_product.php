<?php
include('./includes/connect.php');
include('./functions/function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Search Results</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>

<div class="container mt-4">
  <h3 class="text-center mb-4">🔍 Search Results</h3>
  <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php
    if (isset($_GET['search_data_product'])) {
        $search_data = mysqli_real_escape_string($con, $_GET['search_data']);
        $query = "SELECT * FROM products WHERE product_keywords LIKE '%$search_data%'";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $product_id = $row['product_id'];
                $title = htmlspecialchars($row['product_title']);
                $desc = htmlspecialchars($row['product_description']);
                $price = $row['product_price'];
                $image = htmlspecialchars($row['product_image1']);

                echo "
                <div class='col'>
                    <div class='card h-100'>
                        <img src='./admin_area/product_images/$image' class='card-img-top' alt='$title'>
                        <div class='card-body d-flex flex-column'>
                            <h5 class='card-title'>$title</h5>
                            <p class='card-text'>$desc</p>
                            <p class='text-success fw-bold'>₹$price</p>
                            <div class='mt-auto'>
                                <a href='checkout.php?product=$product_id' class='btn btn-success btn-sm'>Buy Now</a>
                                <a href='product_detail.php?id=$product_id' class='btn btn-secondary btn-sm'>View More</a>
                            </div>
                        </div>
                    </div>
                </div>
                ";
            }
        } else {
            echo "<h5 class='text-danger text-center'>No products found for '$search_data'</h5>";
        }
    }
    ?>
  </div>
</div>

</body>
</html>
