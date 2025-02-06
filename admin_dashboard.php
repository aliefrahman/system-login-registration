<?php
session_start();
require 'config.php';
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
  header("Location: login.php");
  exit();
}
?>
<h2>Selamat datang, <?= $_SESSION['name']; ?></h2>
<form method="POST" action="logout.php">
  <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
  <button type="submit">Logout</button>
</form>