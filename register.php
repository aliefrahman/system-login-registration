<?php
require 'config.php';
generateCsrfToken();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!verifyCsrfToken($_POST['csrf_token'])) {
    die("CSRF token tidak valid!");
  }

  $name = htmlspecialchars(trim($_POST['name']));
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $role = ($_POST['role'] === 'admin') ? 'admin' : 'user';
  $verification_code = md5(uniqid(rand(), true));

  $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows > 0) {
    echo "Email sudah terdaftar!";
  } else {
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, role, verification_code) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $password, $role, $verification_code);

    if ($stmt->execute()) {
      echo "Registrasi berhasil! Cek email untuk verifikasi.";
    } else {
      echo "Terjadi kesalahan.";
    }
  }
  $stmt->close();
}

// Formulir registrasi dengan CSRF token
?>
<form method="POST">
  <input type="text" name="name" required placeholder="Nama">
  <input type="email" name="email" required placeholder="Email">
  <input type="password" name="password" required placeholder="Password">
  <select name="role">
    <option value="user">User</option>
    <option value="admin">Admin</option>
  </select>
  <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
  <button type="submit">Daftar</button>
</form>