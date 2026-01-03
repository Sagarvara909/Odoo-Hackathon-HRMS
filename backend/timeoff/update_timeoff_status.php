<?php
session_start();
require "../config/db.php";

if (!in_array($_SESSION['role'], ['admin','hr'])) {
  die("Unauthorized");
}

$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'];
$status = $data['status'];

$conn->query("
  UPDATE timeoff
  SET status='$status'
  WHERE id=$id
");
