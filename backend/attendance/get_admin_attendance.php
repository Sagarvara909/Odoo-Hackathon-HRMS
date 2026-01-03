<?php
require "../config/db.php";

$date = date("Y-m-d");

$result = $conn->query("
  SELECT e.name,
         a.check_in,
         a.check_out,
         a.work_hours,
         a.extra_hours
  FROM attendance a
  JOIN employees e ON e.id = a.employee_id
  WHERE a.date = '$date'
");

while ($row = $result->fetch_assoc()) {
  echo "
    <tr>
      <td>{$row['name']}</td>
      <td>{$row['check_in']}</td>
      <td>{$row['check_out']}</td>
      <td>{$row['work_hours']}</td>
      <td>{$row['extra_hours']}</td>
    </tr>
  ";
}
