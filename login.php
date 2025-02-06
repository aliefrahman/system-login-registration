<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!verifyCsrfToken($_POST['csrf_token'])) {
    die("CSRF token tidak valid!");
  }

  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $password = $_POST['password'];

  $stmt = $conn->prepare("SELECT name, id, password, role, is_verified FROM users WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
      if ($user['is_verified'] == 1) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['role'] = $user['role'];

        regenerateCsrfToken();
        header("Location: " . ($user['role'] == 'admin' ? "admin_dashboard.php" : "user_dashboard.php"));
      } else {
        echo "Akun belum diverifikasi!";
      }
    } else {
      echo "Password salah!";
    }
  } else {
    echo "Email tidak terdaftar!";
  }
  $stmt->close();
}
?>
<form method="POST">
  <input type="email" name="email" required placeholder="Email">
  <input type="password" name="password" required placeholder="Password">
  <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
  <button type="submit">Login</button>
</form>