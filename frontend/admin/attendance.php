<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
  die("Access denied");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Attendance</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <script src="../assets/js/app.js" defer></script>
</head>
<body>

<div class="topbar">
  <div>Company Logo</div>
  <div class="nav">
    <a href="profile.php">Employees</a>
    <a class="active">Attendance</a>
    <a href="timeoff.php">Time Off</a>
  </div>
</div>

<div class="attendance-header">
  <h3>Attendance</h3>
  <input type="text" placeholder="Searchbar">
</div>

<div class="date-controls">
  <button>&lt;</button>
  <button>&gt;</button>
  <button>Date</button>
  <button>Day</button>
</div>

<h4 id="currentDate">22 October 2025</h4>

<table class="attendance-table">
  <thead>
    <tr>
      <th>Emp</th>
      <th>Check In</th>
      <th>Check Out</th>
      <th>Work Hours</th>
      <th>Extra Hours</th>
    </tr>
  </thead>
  <tbody id="attendanceBody"></tbody>
</table>

</body>
</html>
