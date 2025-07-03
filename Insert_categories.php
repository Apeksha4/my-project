
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../includes/connect.php');

if (isset($_POST['insert_cat'])) {
    $category_title = $_POST['cat_title'];

    // Check if category already exists
    $select_query = "SELECT * FROM categories WHERE category_title='$category_title'";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);

    if ($number > 0) {
        echo "<script>alert('This category is already present in the database')</script>";
    } else {
        $insert_query = "INSERT INTO categories (category_title) VALUES ('$category_title')";
        $result = mysqli_query($con, $insert_query);

        if ($result) {
            echo "<script>alert('Category inserted successfully')</script>";
        } else {
            // Error message if insert fails
            echo "Insert failed: " . mysqli_error($con);
        }
    }
}
?>
<h2 class="text-center">Insert Categories</h2>

<form action="" method="post" class="mb-2">
  <div class="input-group w-90 mb-2">
    <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
    <input type="text" class="form-control" name="cat_title" placeholder="Insert categories" aria-label="categories" aria-describedby="basic-addon1">
  </div>
  <div class="input-group w-10 mb-2 m-auto">
  <input type="submit" class="bg-info border-0 p-2 my-3"  name="insert_cat" value="Insert categories">
</div>
</form>