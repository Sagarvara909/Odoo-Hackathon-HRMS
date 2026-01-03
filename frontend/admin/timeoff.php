<?php
session_start();
if (!isset($_SESSION['role']) || !in_array($_SESSION['role'], ['admin','hr'])) {
  die("Access denied");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Time Off</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <script src="../assets/js/app.js" defer></script>
</head>
<body>

<div class="topbar">
  <div>Company Logo</div>
  <div class="nav">
    <a href="profile.php">Employees</a>
    <a href="attendance.php">Attendance</a>
    <a class="active">Time Off</a>
  </div>
</div>

<div class="timeoff-header">
  <button class="new-btn">NEW</button>
  <input type="text" placeholder="Searchbar">
</div>

<div class="leave-summary">
  <span>Paid time off: <b>24 Days Available</b></span>
  <span>Sick time off: <b>07 Days Available</b></span>
</div>

<table class="attendance-table">
  <thead>
    <tr>
      <th>Name</th>
      <th>Start Date</th>
      <th>End Date</th>
      <th>Time Off Type</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody id="timeoffBody"></tbody>
</table>

</body>
</html>
