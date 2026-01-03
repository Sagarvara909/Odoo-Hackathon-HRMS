<?php
session_start();
require "../config/db.php";
require "calculate_hours.php";

$user_id = $_SESSION['user_id'] ?? 0;
if (!$user_id) die("Not logged in");

$emp = $conn->query("SELECT id FROM employees WHERE user_id = $user_id")->fetch_assoc();
if (!$emp) die("Employee record not found");
$employee_id = (int)$emp['id'];

$date = date("Y-m-d");
$checkout = date("H:i:s");

/* fetch existing record */
$res = $conn->query("SELECT id, check_in FROM attendance WHERE employee_id = $employee_id AND date = '$date' LIMIT 1");
if ($res->num_rows === 0) {
  echo "No check-in found";
  exit;
}
$row = $res->fetch_assoc();
$checkin = $row['check_in'];

/* calculate hours (returns strings) */
list($work_hours_str, $extra_hours_str) = calculateHours($checkin, $checkout);

/* update record */
$stmt = $conn->prepare("UPDATE attendance SET check_out = ?, work_hours = ?, extra_hours = ? WHERE id = ?");
$stmt->bind_param("sssi", $checkout, $work_hours_str, $extra_hours_str, $row['id']);
$stmt->execute();

echo "CHECKED_OUT";
