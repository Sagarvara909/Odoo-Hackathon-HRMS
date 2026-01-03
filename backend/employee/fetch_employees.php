<?php
session_start();
require "../config/db.php";

/* Return simple cards (this file is fetched by frontend/employee/dashboard.php) */
$res = $conn->query("SELECT id, name FROM employees ORDER BY name ASC");

while ($r = $res->fetch_assoc()) {
  $id = (int)$r['id'];
  $name = htmlspecialchars($r['name']);
  /* Link to the employee profile page in frontend/employee/profile.php?id=... */
  echo "
    <a class='employee-card' href='profile.php?id={$id}'>
      <img src='../assets/avatar.png' alt='avatar'>
      <p>{$name}</p>
      <span class='status-dot green'></span>
    </a>
  ";
}
