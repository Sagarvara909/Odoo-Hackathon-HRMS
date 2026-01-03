<?php
$conn = new mysqli("localhost", "root", "", "hrms");

if ($conn->connect_error) {
    die("Database connection failed");
}
