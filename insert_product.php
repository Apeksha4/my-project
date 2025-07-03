<?php
include('../includes/connect.php');

if (isset($_POST['insert_product'])) {
    $product_title = $_POST['product_title'];
    $description = $_POST['description'];
    $product_keywords = $_POST['keywords'];
    $product_category = $_POST['product_categories'];
    $product_brands = $_POST['product_brands'];
    $product_price = $_POST['price'];
    $product_status = 'true';

    // Access images
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    // Temp names
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    // Check if any field is empty
    if (
        empty($product_title) || empty($description) || empty($product_keywords) ||
        empty($product_category) || empty($product_brands) || empty($product_price) ||
        empty($product_image1) || empty($product_image2) || empty($product_image3)
    ) {
        echo "<script>alert('Please fill all the available fields');</script>";
    } else {
        // Move uploaded files
        move_uploaded_file($temp_image1, "../product_images/$product_image1");
        move_uploaded_file($temp_image2, "../product_images/$product_image2");
        move_uploaded_file($temp_image3, "../product_images/$product_image3");

        // Insert into DB
        $insert_product = "INSERT INTO `products` 
        (product_title, product_description, product_keywords, category_id, brand_id, product_image1, product_image2, product_image3, product_price, date, status)
        VALUES 
        ('$product_title', '$description', '$product_keywords', '$product_category', '$product_brands', '$product_image1', '$product_image2', '$product_image3', '$product_price', NOW(), '$product_status')";

        $result_query = mysqli_query($con, $insert_product);

        if ($result_query) {
            echo "<script>alert('Product inserted successfully');</script>";
        } else {
            echo "<script>alert('Failed to insert product');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insert Products - Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <form action="" method="post" enctype="multipart/form-data">

            <!-- Product Title -->
            <div class="mb-3 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" required>
            </div>

            <!-- Description -->
            <div class="mb-3 w-50 m-auto">
                <label for="description" class="form-label">Description</label>
                <input type="text" name="description" id="description" class="form-control" required>
            </div>

            <!-- Keywords -->
            <div class="mb-3 w-50 m-auto">
                <label for="product_keywords" class="form-label">Keywords</label>
                <input type="text" name="keywords" id="product_keywords" class="form-control" required>
            </div>

            <!-- Categories -->
            <div class="mb-3 w-50 m-auto">
                <label class="form-label">Select Category</label>
                <select name="product_categories" class="form-select" required>
                    <option value="">Select a category</option>
                    <?php
                    $select_query = "SELECT * FROM `categories`";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $category_title = $row['category_title'];
                        $category_id = $row['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Brands -->
            <div class="mb-3 w-50 m-auto">
                <label class="form-label">Select Brand</label>
                <select name="product_brands" class="form-select" required>
                    <option value="">Select a brand</option>
                    <?php
                    $select_query = "SELECT * FROM `brands`";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $brand_title = $row['brand_title'];
                        $brand_id = $row['brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Image 1 -->
            <div class="mb-3 w-50 m-auto">
                <label for="product_image1" class="form-label">Image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required>
            </div>

            <!-- Image 2 -->
            <div class="mb-3 w-50 m-auto">
                <label for="product_image2" class="form-label">Image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required>
            </div>

            <!-- Image 3 -->
            <div class="mb-3 w-50 m-auto">
                <label for="product_image3" class="form-label">Image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required>
            </div>

            <!-- Price -->
            <div class="mb-3 w-50 m-auto">
                <label for="product_price" class="form-label">Price</label>
                <input type="text" name="price" id="product_price" class="form-control" required>
            </div>

            <!-- Submit -->
            <div class="mb-3 w-50 m-auto text-center">
                <input type="submit" name="insert_product" class="btn btn-info" value="Insert Product">
            </div>
        </form>
    </div>
</body>
</html>
