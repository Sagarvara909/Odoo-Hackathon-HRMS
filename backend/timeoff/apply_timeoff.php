<?php
session_start();
require "../config/db.php";

$user_id = $_SESSION['user_id'];
$type  = $_POST['type'];
$start = $_POST['start'];
$end   = $_POST['end'];

/* Get employee id */
$emp = $conn->query(
  "SELECT id FROM employees WHERE user_id = $user_id"
)->fetch_assoc();

$employee_id = $emp['id'];

/* Insert time off */
$stmt = $conn->prepare("
  INSERT INTO timeoff (employee_id, start_date, end_date, type)
  VALUES (?, ?, ?, ?)
");

$stmt->bind_param("isss", $employee_id, $start, $end, $type);
$stmt->execute();

echo "Success";
