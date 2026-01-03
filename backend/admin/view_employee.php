<?php
session_start();
require "../config/db.php";

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
  die("Access denied");
}

$emp_id = intval($_GET['emp_id'] ?? 0);
if ($emp_id <= 0) die("Invalid employee id");

$res = $conn->query("SELECT * FROM employees WHERE id = $emp_id");
$emp = $res->fetch_assoc();
if (!$emp) die("Employee not found");

?>
<!DOCTYPE html>
<html>
<head>
  <title>Employee View</title>
  <link rel="stylesheet" href="../../frontend/assets/css/style.css">
</head>
<body>
  <h2>Employee: <?php echo htmlspecialchars($emp['name']); ?></h2>
  <p><strong>Company:</strong> <?php echo htmlspecialchars($emp['company']); ?></p>
  <p><strong>Phone:</strong> <?php echo htmlspecialchars($emp['phone']); ?></p>
  <p><strong>Email:</strong> <?php
     $u = $conn->query("SELECT email FROM users WHERE id = {$emp['user_id']}")->fetch_assoc();
     echo htmlspecialchars($u['email'] ?? '');
  ?></p>
  <p><a href="../../frontend/admin/attendance.php">Back</a></p>
</body>
</html>
