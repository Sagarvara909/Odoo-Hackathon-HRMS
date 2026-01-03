<?php
require "../config/db.php";

/* Basic required fields */
$company  = $_POST['company'] ?? '';
$name     = $_POST['name'] ?? '';
$email    = $_POST['email'] ?? '';
$phone    = $_POST['phone'] ?? '';
$password = $_POST['password'] ?? '';
$confirm  = $_POST['confirm'] ?? '';

if ($password !== $confirm) {
  die("Passwords do not match");
}
if (strlen($password) < 6) {
  die("Password too short");
}

/* Prevent duplicate email */
$check = $conn->prepare("SELECT id FROM users WHERE email=?");
$check->bind_param("s", $email);
$check->execute();
$check->store_result();
if ($check->num_rows > 0) die("Email already registered");

/* Logo upload */
$logoName = time() . "_" . basename($_FILES['logo']['name']);
$logoTmp  = $_FILES['logo']['tmp_name'];
$uploadDir = "../../frontend/assets/uploads/";
if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);
$uploadPath = $uploadDir . $logoName;
if (!move_uploaded_file($logoTmp, $uploadPath)) {
  die("Logo upload failed");
}

/* Create user with role 'employee' (default signups) */
$role = 'employee';
$hashed = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (role, email, password, login_id) VALUES (?, ?, ?, ?)");
$login_id = null; // you can generate login_id later
$stmt->bind_param("ssss", $role, $email, $hashed, $login_id);
$stmt->execute();
$user_id = $stmt->insert_id;

/* Create employee record linked to user */
$stmt2 = $conn->prepare("INSERT INTO employees (user_id, name, phone, company) VALUES (?, ?, ?, ?)");
$stmt2->bind_param("isss", $user_id, $name, $phone, $company);
$stmt2->execute();

/* Redirect to signin */
header("Location: ../../frontend/signin.php");
exit;
