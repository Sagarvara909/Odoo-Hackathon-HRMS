<?php
session_start();
require "../config/db.php";

$user_id = $_SESSION['user_id'];

/* Join users + employees */
$res = $conn->query("
  SELECT 
    u.email,
    u.login_id,
    e.name,
    e.phone,
    e.company,
    e.department,
    e.manager,
    e.location
  FROM users u
  JOIN employees e ON e.user_id = u.id
  WHERE u.id = $user_id
");

$data = $res->fetch_assoc();

/* Return JSON */
echo json_encode($data);
