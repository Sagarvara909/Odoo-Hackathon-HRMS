<?php
session_start();
require "../config/db.php";

$user_id = $_SESSION['user_id'];
$current = $_POST['current'];
$new     = $_POST['new'];

/* Get current password */
$user = $conn->query(
  "SELECT password FROM users WHERE id = $user_id"
)->fetch_assoc();

if (!password_verify($current, $user['password'])) {
  die("Wrong password");
}

/* Update password */
$hashed = password_hash($new, PASSWORD_DEFAULT);
$conn->query(
  "UPDATE users SET password='$hashed' WHERE id=$user_id"
);
