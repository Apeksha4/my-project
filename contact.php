<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // You can save to database or send via email
    $to = "your_email@example.com"; // Replace with your email
    $subject = "New Contact Message from $name";
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

    if (mail($to, $subject, $body)) {
        $success = "Message sent successfully!";
    } else {
        $error = "Message could not be sent. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Contact Us</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
  <h2>Contact Us</h2>

  <?php if (isset($success)) echo "<div class='alert alert-success'>$success</div>"; ?>
  <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

  <form method="post" action="contact.php">
    <div class="mb-3">
      <label for="name" class="form-label">Name:</label>
      <input type="text" name="name" class="form-control" required />
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email:</label>
      <input type="email" name="email" class="form-control" required />
    </div>
    <div class="mb-3">
      <label for="message" class="form-label">Message:</label>
      <textarea name="message" class="form-control" rows="5" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Send Message</button>
  </form>
</div>
</body>
</html>
