<?php
session_start();
require "../config/db.php";

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("
  UPDATE employees SET
    address = ?,
    nationality = ?,
    personal_email = ?,
    bank_account = ?,
    bank_name = ?,
    ifsc = ?
  WHERE user_id = ?
");

$stmt->bind_param(
  "ssssssi",
  $_POST['address'],
  $_POST['nationality'],
  $_POST['personal_email'],
  $_POST['account'],
  $_POST['bank'],
  $_POST['ifsc'],
  $user_id
);

$stmt->execute();
