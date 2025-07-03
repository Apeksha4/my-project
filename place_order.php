<?php
include('./includes/connect.php');

if (isset($_POST['place_order'])) {
    $product_id = intval($_POST['product_id']);
    $name = mysqli_real_escape_string($con, $_POST['customer_name']);
    $address = mysqli_real_escape_string($con, $_POST['customer_address']);
    $phone = mysqli_real_escape_string($con, $_POST['customer_phone']);

    // Save to orders table (make sure it exists)
   $payment = mysqli_real_escape_string($con, $_POST['payment_method']);

$insert = "INSERT INTO orders (product_id, customer_name, customer_address, customer_phone, payment_method, order_date)
           VALUES ($product_id, '$name', '$address', '$phone', '$payment', NOW())";


    if (mysqli_query($con, $insert)) {
        echo "<h3 style='text-align:center;'>Order placed successfully! ✅</h3>";
        echo "<p style='text-align:center;'><a href='index.php'>Continue Shopping</a></p>";
    } else {
        echo "<h4>Error placing order. ❌</h4>";
    }
}
?>
