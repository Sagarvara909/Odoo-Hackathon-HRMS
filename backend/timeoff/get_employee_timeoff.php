<?php
session_start();
require "../config/db.php";

$user_id = $_SESSION['user_id'];

/* Get employee id */
$emp = $conn->query(
  "SELECT id FROM employees WHERE user_id = $user_id"
)->fetch_assoc();

$employee_id = $emp['id'];

$res = $conn->query("
  SELECT start_date, end_date, type, status
  FROM timeoff
  WHERE employee_id = $employee_id
");

while ($row = $res->fetch_assoc()) {
  echo "
    <tr>
      <td>{$row['start_date']}</td>
      <td>{$row['end_date']}</td>
      <td>{$row['type']}</td>
      <td class='status-{$row['status']}'>{$row['status']}</td>
    </tr>
  ";
}
