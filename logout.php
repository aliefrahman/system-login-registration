<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!verifyCsrfToken($_POST['csrf_token'])) {
    die("CSRF token tidak valid!");
  }
  session_destroy();
  regenerateCsrfToken(); // Regenerasi token setelah logout
  header("Location: login.php");
  exit();
}
?>
<form method="POST">
  <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
  <button type="submit">Logout</button>
</form>