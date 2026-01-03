<?php
session_start();
require "../config/db.php";

$user_id = $_SESSION['user_id'] ?? 0;
$emp = $conn->query("SELECT id FROM employees WHERE user_id = $user_id")->fetch_assoc();
if (!$emp) exit;
$employee_id = (int)$emp['id'];

$month = date("m");
$year = date("Y");

$result = $conn->query("
  SELECT date, check_in, check_out, work_hours, extra_hours
  FROM attendance
  WHERE employee_id = $employee_id
  AND MONTH(date) = '$month'
  AND YEAR(date) = '$year'
  ORDER BY date ASC
");

while ($row = $result->fetch_assoc()) {
  echo "
    <tr>
      <td>{$row['date']}</td>
      <td>{$row['check_in']}</td>
      <td>{$row['check_out']}</td>
      <td>{$row['work_hours']}</td>
      <td>{$row['extra_hours']}</td>
    </tr>
  ";
}
