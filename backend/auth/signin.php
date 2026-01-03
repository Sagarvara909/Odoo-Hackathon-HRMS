<?php
session_start();
require "../config/db.php";

$_SESSION['company'] = $user['company'];
$_SESSION['company_logo'] = $user['logo'];

/* =========================
   GET FORM DATA
========================= */
$login    = trim($_POST['login']);
$password = $_POST['password'];

/* =========================
   FIND USER (EMAIL OR LOGIN ID)
========================= */
$stmt = $conn->prepare(
    "SELECT id, role, password FROM users
     WHERE email = ? OR login_id = ?"
);
$stmt->bind_param("ss", $login, $login);
$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    header("Location: ../../frontend/signin.php?error=1");
    exit;

}

/* =========================
   VERIFY PASSWORD
========================= */
if (!password_verify($password, $user['password'])) {
    header("Location: ../../frontend/signin.php?error=1");
    exit;

}

/* =========================
   CREATE SESSION
========================= */
$_SESSION['user_id'] = $user['id'];
$_SESSION['role']    = $user['role'];

/* =========================
   ROLE-BASED REDIRECT
========================= */
if ($user['role'] === 'admin') {
    header("Location: ../../frontend/admin/profile.php");
} else {
    header("Location: ../../frontend/employee/dashboard.php");
}
exit;


