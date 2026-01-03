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
  <title>Employee Dashboard</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <script src="../assets/js/app.js" defer></script>
</head>
<body>

<div class="topbar">
 <div class="logo">
  <img src="../assets/uploads/<?php echo $_SESSION['company_logo'] ?? 'default.png'; ?>" height="30">
</div>

<div id="profileMenu" class="dropdown">
  <a href="profile.php">My Profile</a>
  <a href="../logout.php">Log Out</a>
</div>

  <div class="nav">
    <a class="active">Employees</a>
    <a href="attendance.php">Attendance</a>
    <a href="timeoff.php">Time Off</a>
  </div>

  <div class="avatar" onclick="toggleMenu()">
    <img src="../assets/avatar.png">
  </div>

  <div id="profileMenu" class="dropdown">
    <a href="profile.php">My Profile</a>
    <a href="../logout.php">Log Out</a>
  </div>
</div>



<div class="check-actions">
  <button onclick="checkIn()" class="new-btn">Check In</button>
  <button onclick="checkOut()" class="new-btn">Check Out</button>
</div>


<div class="actions">
  <button class="new-btn">NEW</button>
  <input type="text" placeholder="Search">
</div>

<div class="card-grid" id="employeeGrid"></div>

</body>
</html>
