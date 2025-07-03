<?php

// Ensure database connection is available
include_once(__DIR__ . '/../includes/connect.php');

// Display products on homepage or by brand/category
function getproducts($limit = 9, $offset = 0) {
    global $con;


    if (isset($_GET['search_data_product'])) {
        $search_value = mysqli_real_escape_string($con, $_GET['search_data']);
        echo "<h5 class='text-center text-primary'>Searching for: $search_value</h5>"; // Debug
        $query = "SELECT * FROM products WHERE product_keywords LIKE '%$search_value%'";
    } elseif (isset($_GET['category'])) {
        $category_id = intval($_GET['category']);
        $query = "SELECT * FROM products WHERE category_id = $category_id";
    } elseif (isset($_GET['brand'])) {
        $brand_id = intval($_GET['brand']);
        $query = "SELECT * FROM products WHERE brand_id = $brand_id";
    } else {
        $query = "SELECT * FROM products ORDER BY RAND() LIMIT $limit OFFSET $offset";
    }

    $result = mysqli_query($con, $query);

    if (!$result || mysqli_num_rows($result) == 0) {
        echo "<h4 class='text-center text-danger'>This Product is not available</h4>";
        return;
    }

    while ($row = mysqli_fetch_assoc($result)) {
        $product_id = $row['product_id'];
        $title = htmlspecialchars($row['product_title']);
        $desc = htmlspecialchars($row['product_description']);
        $image = htmlspecialchars($row['product_image1']);
        $price = htmlspecialchars($row['product_price']);
        $image_path = "./admin_area/product_images/$image";
echo"
        <div class='col'>
          <div class='card h-100'>
            <img src='$image_path' class='card-img-top' alt='$title'>
            <div class='card-body d-flex flex-column'>
              <h5 class='card-title'>$title</h5>
              <p class='card-text'>$desc</p>
              <p class='text-success fw-bold'>₹$price</p>
              <div class='mt-auto'>
              
                <a href='cart.php?add_to_cart={$row['product_id']}' class='btn btn-success btn-sm'>Add to Cart</a>

                <a href='checkout.php?product=$product_id' class='btn btn-success btn-sm'>Buy Now</a>
                <a href='display_all.php?id=$product_id' class='btn btn-secondary btn-sm'>View More</a>
              </div>
            </div>
          </div>
        </div>
        ";

        
    }
}
//getting all products//
function get_all_products(){
     global $con;


    if (isset($_GET['search_data_product'])) {
        $search_value = mysqli_real_escape_string($con, $_GET['search_data']);
        echo "<h5 class='text-center text-primary'>Searching for: $search_value</h5>"; // Debug
        $query = "SELECT * FROM products WHERE product_keywords LIKE '%$search_value%'";
    } elseif (isset($_GET['category'])) {
        $category_id = intval($_GET['category']);
        $query = "SELECT * FROM products WHERE category_id = $category_id";
    } elseif (isset($_GET['brand'])) {
        $brand_id = intval($_GET['brand']);
        $query = "SELECT * FROM products WHERE brand_id = $brand_id";
    } else {
        $query = "SELECT * FROM products ORDER BY RAND() ";
    }

    $result = mysqli_query($con, $query);

    if (!$result || mysqli_num_rows($result) == 0) {
        echo "<h4 class='text-center text-danger'>This Product is not available</h4>";
        return;
    }

    while ($row = mysqli_fetch_assoc($result)) {
        $product_id = $row['product_id'];
        $title = htmlspecialchars($row['product_title']);
        $desc = htmlspecialchars($row['product_description']);
        $image = htmlspecialchars($row['product_image1']);
        $price = htmlspecialchars($row['product_price']);
        $image_path = "./admin_area/product_images/$image";

        echo "
        <div class='col'>
          <div class='card h-100'>
            <img src='$image_path' class='card-img-top' alt='$title'>
            <div class='card-body d-flex flex-column'>
              <h5 class='card-title'>$title</h5>
              <p class='card-text'>$desc</p>
              <p class='text-success fw-bold'>₹$price</p>
              <div class='mt-auto'>
               <a href='cart.php?add_to_cart={$row['product_id']}' class='btn btn-success btn-sm'>Add to Cart</a>

                <a href='checkout.php?product=$product_id' class='btn btn-success btn-sm'>Buy Now</a>
                <a href='display_all.php?product_id=$product_id' class='btn btn-secondary btn-sm'>View More</a>
              </div>
            </div>
          </div>
        </div>
        ";
    }
}



//displaying brands in sidenav
function getbrands()
{
    global $con;
     $select_brands = "SELECT * FROM brands";
          $result_brands = mysqli_query($con, $select_brands);
          while ($row = mysqli_fetch_assoc($result_brands)) {
            $brand_title = htmlspecialchars($row['brand_title']);
            $brand_id = $row['brand_id'];
            echo "<li class='list-group-item'><a href='index.php?brand=$brand_id' class='text-decoration-none'>$brand_title</a></li>";
          }
}


//displaying categories
       function getcategories(){
             global $con;
        
        
          $select_categories = "SELECT * FROM categories";
          $result_categories = mysqli_query($con, $select_categories);
          while ($row = mysqli_fetch_assoc($result_categories)) {
            $category_title = htmlspecialchars($row['category_title']);
            $category_id = $row['category_id'];
            echo "<li class='list-group-item'><a href='index.php?category=$category_id' class='text-decoration-none'>$category_title</a></li>";
          }
        
    }
    



?>
