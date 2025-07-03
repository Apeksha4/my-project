<?php
include('./includes/connect.php');

if (isset($_POST['register'])) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashing

    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $password);

    if (mysqli_stmt_execute($stmt)) {
        echo "✅ Registration successful. <a href='login.php'>Login now</a>";
    } else {
        echo "❌ Registration failed: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
}
?>
