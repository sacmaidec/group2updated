<?php
require 'db_connect.php';

if (!isset($_GET['token'])) {
  die("Invalid token.");
}

$token = $_GET['token'];
$stmt = $conn->prepare("SELECT * FROM password_resets WHERE token=? AND expires >= ?");
$now = date("U");
$stmt->bind_param("si", $token, $now);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
  die("Invalid or expired link.");
}

$row = $result->fetch_assoc();
$email = $row['email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password - KM Services</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
  <div class="logo">KM Services</div>
</header>

<div class="login-container">
  <h1>Reset Password</h1>
  <form method="POST" action="update_password.php">
    <input type="hidden" name="email" value="<?php echo $email; ?>">
    <input type="password" name="new_password" placeholder="Enter new password" required>
    <input type="password" name="confirm_password" placeholder="Confirm new password" required>
    <button type="submit" class="login-btn">Update Password</button>
  </form>
</div>
</body>
</html>
