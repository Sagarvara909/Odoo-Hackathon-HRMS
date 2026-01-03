<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'employee') {
  header("Location: ../signin.php");
  exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>My Attendance</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <script src="../assets/js/app.js" defer></script>
</head>
<body>

<div class="topbar">
  <div>Company Logo</div>
  <div class="nav">
    <a href="dashboard.php">Employees</a>
    <a class="active">Attendance</a>
    <a href="timeoff.php">Time Off</a>
  </div>
</div>

<h3>Attendance</h3>

<div class="date-controls">
  <button>&lt;</button>
  <button>&gt;</button>
  <button>Oct</button>
  <button>Days Present</button>
  <button>Leaves</button>
  <button>Total Days</button>
</div>

<h4>22 October 2025</h4>

<table class="attendance-table">
  <thead>
    <tr>
      <th>Date</th>
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
