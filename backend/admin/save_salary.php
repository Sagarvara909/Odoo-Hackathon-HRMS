<?php
session_start();
require "../config/db.php";

$data = json_decode(file_get_contents("php://input"), true);
$monthly = $data['monthly'];
$yearly = $monthly * 12;

$id = $_SESSION['user_id'];

$conn->query(
  "UPDATE salary
   SET monthly='$monthly', yearly='$yearly'
   WHERE employee_id='$id'"
);
