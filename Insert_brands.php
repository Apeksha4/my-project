
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../includes/connect.php');

if (isset($_POST['insert_brand'])) {
    $brand_title = $_POST['brand_title'];

    // Check if category already exists
    $select_query = "SELECT * FROM brands WHERE brand_title='$brand_title'";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);

    if ($number > 0) {
        echo "<script>alert('This brand is already present in the database')</script>";
    } else {
        $insert_query = "INSERT INTO brands (brand_title) VALUES ('$brand_title')";
        $result = mysqli_query($con, $insert_query);

        if ($result) {
            echo "<script>alert('brand inserted successfully')</script>";
        } else {
            // Error message if insert fails
            echo "Insert failed: " . mysqli_error($con);
        }
    }
}
?>
<h2 class="text-center">Insert Brands</h2>

<form action="" method="post" class="mb-2">
  <div class="input-group w-90 mb-2">
    <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
    <input type="text" class="form-control" name="brand_title" placeholder="Insert brands" aria-label="brands" aria-describedby="basic-addon1">
  </div>
  <div class="input-group w-10 mb-2 m-auto">
  <input type="submit" class="bg-info border-0 p-2 my-3"  name="insert_brand" value="Insert brands">
</div>
</form>