<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Access denied");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Profile</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <script src="../assets/js/app.js" defer></script>
</head>
<body>

<h2>My Profile</h2>
<a href="../logout.php">Logout</a>

<div class="profile-header">
  <div class="avatar big"></div>

<div class="profile-basic">
  <div class="info-row">
    <span class="label">Name</span>
    <span id="name"></span>
  </div>
  <div class="info-row">
    <span class="label">Email</span>
    <span id="email"></span>
  </div>
  <div class="info-row">
    <span class="label">Mobile</span>
    <span id="mobile"></span>
  </div>
</div>

<div class="profile-meta">
  <div class="info-row">
    <span class="label">Company</span>
    <span id="company"></span>
  </div>
  <div class="info-row">
    <span class="label">Department</span>
    <span id="department"></span>
  </div>
  <div class="info-row">
    <span class="label">Manager</span>
    <span id="manager"></span>
  </div>
  <div class="info-row">
    <span class="label">Location</span>
    <span id="location"></span>
  </div>
</div>


<div class="tabs">
  <button onclick="openTab('resume')">Resume</button>
  <button onclick="openTab('private')">Private Info</button>
  <button onclick="openTab('salary')">Salary Info</button>
</div>

<div id="resume" class="tab-content">
  <h4>About</h4>
  <p>Lorem ipsum...</p>

  <h4>What I love about my job</h4>
  <p>Lorem ipsum...</p>

  <h4>My interests and hobbies</h4>
  <p>Lorem ipsum...</p>
</div>

<div id="private" class="tab-content hidden">
  <h4>Skills</h4>
  <button>+ Add Skills</button>

  <h4>Certification</h4>
  <button>+ Add Certification</button>
</div>

<div id="salary" class="tab-content hidden">
  <h3>Salary Info</h3>

  <label>Monthly Wage</label>
  <input type="number" id="monthlyWage" value="50000" oninput="recalculateSalary()">

  <label>Yearly Wage</label>
  <input type="number" id="yearlyWage" value="600000" readonly>

  <h4>Salary Components</h4>

  <div class="component"><span>Basic (50%)</span><span id="basic">25000</span></div>
  <div class="component"><span>HRA</span><span id="hra">12500</span></div>
  <div class="component"><span>Standard Allowance</span><span id="standard">4167</span></div>
  <div class="component"><span>PF</span><span id="pf">3000</span></div>
  <div class="component"><span>Professional Tax</span><span id="tax">200</span></div>

  <button onclick="saveSalary()">Save Salary</button>
</div>

</body>
</html>
