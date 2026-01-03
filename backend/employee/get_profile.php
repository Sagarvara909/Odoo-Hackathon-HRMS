<?php
session_start();
require "../config/db.php";

$user_id = $_SESSION['user_id'];

$data = $conn->query(
  "SELECT * FROM employees WHERE user_id = $user_id"
)->fetch_assoc();

echo json_encode($data);
