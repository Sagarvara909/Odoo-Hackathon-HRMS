<?php
require "../config/db.php";

$res = $conn->query("
  SELECT t.id, e.name, t.start_date, t.end_date, t.type, t.status
  FROM timeoff t
  JOIN employees e ON e.id = t.employee_id
");

while ($row = $res->fetch_assoc()) {
  echo "
    <tr>
      <td>{$row['name']}</td>
      <td>{$row['start_date']}</td>
      <td>{$row['end_date']}</td>
      <td>{$row['type']}</td>
      <td class='status-{$row['status']}'>{$row['status']}</td>
      <td>
        <button class='action-btn approve'
          onclick=\"updateTimeoff({$row['id']},'approved')\">✔</button>
        <button class='action-btn reject'
          onclick=\"updateTimeoff({$row['id']},'rejected')\">✖</button>
      </td>
    </tr>
  ";
}
