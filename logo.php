<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Welcome - Happy Shop</title>
  <style>
    body {
      margin: 0;
      background: #fefefe;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      animation: fadeIn 1.5s ease-in-out;
    }

    img {
      height: 200px;
      animation: zoomIn 1s ease-in-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to   { opacity: 1; }
    }

    @keyframes zoomIn {
      from { transform: scale(0.8); opacity: 0; }
      to   { transform: scale(1); opacity: 1; }
    }
  </style>
</head>
<body>

  <!-- Your Logo -->
  <img src="./admin_area/product_images/download.png" alt="Happy Shop Logo">

  <!-- Redirect to your main site after 3 seconds -->
  <script>
    setTimeout(function() {
      window.location.href = "index.php";
    }, 3000);
  </script>

</body>
</html>
