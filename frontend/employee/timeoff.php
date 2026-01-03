<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'employee') {
  die("Access denied");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>My Time Off</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <script src="../assets/js/app.js" defer></script>
</head>
<body>

<div class="topbar">
  <div>Company Logo</div>
  <div class="nav">
    <a href="dashboard.php">Employees</a>
    <a href="attendance.php">Attendance</a>
    <a class="active">Time Off</a>
  </div>
</div>

<button class="new-btn" onclick="openTimeoffModal()">NEW</button>

<div class="leave-summary">
  <span>Paid Time Off: <b>29 Days Available</b></span>
  <span>Sick Time Off: <b>07 Days Available</b></span>
</div>

<table class="attendance-table">
  <thead>
    <tr>
      <th>Name</th>
      <th>Start Date</th>
      <th>End Date</th>
      <th>Time Off Type</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody id="myTimeoffBody"></tbody>
</table>

<div id="timeoffModal" class="modal hidden">
  <div class="modal-content">
    <h4>Time Off Request</h4>

    <label>Time Off Type</label>
    <select id="leaveType">
      <option>Paid</option>
      <option>Sick</option>
      <option>Unpaid</option>
    </select>

    <label>Start Date</label>
    <input type="date" id="startDate">

    <label>End Date</label>
    <input type="date" id="endDate">

    <label>Attachment</label>
    <input type="file" name="attachment">

    <button onclick="submitTimeoff()">Submit</button>
    <button onclick="closeTimeoffModal()">Cancel</button>
  </div>
</div>

</body>
</html>
