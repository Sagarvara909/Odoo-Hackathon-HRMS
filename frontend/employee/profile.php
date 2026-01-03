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
  <title>My Profile</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <script src="../assets/js/app.js" defer></script>
</head>
<body>
  

<h2>My Profile</h2>

<div class="profile-header">
  <div class="avatar big"></div>

  <div class="profile-basic">
    <h3 id="name">My Name</h3>
    <p id="login">Login ID</p>
    <p id="email">Email</p>
    <p id="mobile">Mobile</p>

  </div>

  <div class="profile-meta">
    <p id="company">Company</p>
    <p id="department">Department</p>
    <p id="manager">Manager</p>
    <p id="location">Location</p>

  </div>
</div>

<div class="tabs">
  <button onclick="openTab('resume')">Resume</button>
  <button onclick="openTab('private')">Private Info</button>
  <button onclick="openTab('salary')">Salary Info</button>
  <button onclick="openTab('security')">Security</button>
</div>

<div id="resume" class="tab-content">
  <textarea name="about" placeholder="About"></textarea>
  <textarea name="job_love" placeholder="What I love about my job"></textarea>
  <textarea name="hobbies" placeholder="My interests and hobbies"></textarea>
</div>

<div id="private" class="tab-content hidden">
  <input name="dob" placeholder="Date of Birth">
  <input name="address" placeholder="Residential Address">
  <input name="nationality" placeholder="Nationality">
  <input name="personal_email" placeholder="Personal Email">
  <input name="gender" placeholder="Gender">
  <input name="marital_status" placeholder="Marital Status">
  <input name="joining_date" placeholder="Date of Joining">

  <input name="account" placeholder="Account Number">
  <input name="bank" placeholder="Bank Name">
  <input name="ifsc" placeholder="IFSC Code">
  <input name="pan" placeholder="PAN No">
  <input name="uan" placeholder="UAN No">
  <input name="emp_code" placeholder="Emp Code">

  <button onclick="saveProfile()">Save</button>
</div>

<div id="salary" class="tab-content hidden">
  <p>Salary details are managed by Admin.</p>
</div>

<div id="security" class="tab-content hidden">
  <input name="current" type="password" placeholder="Current Password">
  <input name="new" type="password" placeholder="New Password">
  <input name="confirm" type="password" placeholder="Confirm Password">
  <button onclick="changePassword()">Update Password</button>
</div>

</body>
</html>
