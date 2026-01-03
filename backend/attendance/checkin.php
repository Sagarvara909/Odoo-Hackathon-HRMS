<?php
session_start();
require "../config/db.php";

$user_id = $_SESSION['user_id'] ?? 0;
if (!$user_id) die("Not logged in");

/* find employee id */
$emp = $conn->query("SELECT id FROM employees WHERE user_id = $user_id")->fetch_assoc();
if (!$emp) die("Employee record not found");

$employee_id = (int)$emp['id'];
$date = date("Y-m-d");
$time = date("H:i:s");

/* Prevent double check-in */
$exists = $conn->query("SELECT id FROM attendance WHERE employee_id = $employee_id AND date = '$date'")->num_rows;
if ($exists > 0) {
  echo "Already checked in";
  exit;
}

/* Insert check-in */
$stmt = $conn->prepare("INSERT INTO attendance (employee_id, date, check_in) VALUES (?, ?, ?)");
$stmt->bind_param("iss", $employee_id, $date, $time);
$stmt->execute();

echo "CHECKED_IN";
