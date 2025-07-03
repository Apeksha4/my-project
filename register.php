<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Register - Happy Shop</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6 bg-white p-4 rounded shadow">
      <h3 class="text-center mb-4">Create an Account</h3>
      <form action="register_process.php" method="post">
        <div class="mb-3">
          <label>Username:</label>
          <input type="text" name="username" class="form-control" required />
        </div>
        <div class="mb-3">
          <label>Email:</label>
          <input type="email" name="email" class="form-control" required />
        </div>
        <div class="mb-3">
          <label>Password:</label>
          <input type="password" name="password" class="form-control" required />
        </div>
        <button type="submit" name="register" class="btn btn-success w-100">Register</button>
        <p class="text-center mt-3">Already have an account? <a href="login.php">Login</a></p>
      </form>
    </div>
  </div>
</div>

</body>
</html>
