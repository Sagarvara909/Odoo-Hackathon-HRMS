function togglePassword(id) {
  const input = document.getElementById(id);
  if (!input) return;

  input.type = input.type === "password" ? "text" : "password";
}


/* =========================
   DROPDOWN MENU
========================= */
function toggleMenu() {
  const menu = document.getElementById("profileMenu");
  if (menu) {
    menu.style.display = menu.style.display === "block" ? "none" : "block";
  }
}

/* =========================
   TAB SWITCHING (PROFILE)
========================= */
function openTab(id) {
  document.querySelectorAll(".tab-content").forEach(tab => {
    tab.classList.add("hidden");
  });

  const active = document.getElementById(id);
  if (active) active.classList.remove("hidden");
}

/* =========================
   EMPLOYEE DASHBOARD CARDS
========================= */
if (document.getElementById("employeeGrid")) {
  fetch("../../backend/employee/fetch_employees.php")
    .then(res => res.text())
    .then(html => {
      document.getElementById("employeeGrid").innerHTML = html;
    });
}

/* =========================
   SALARY CALCULATION (ADMIN)
========================= */
function recalculateSalary() {
  const wageInput = document.getElementById("monthlyWage");
  if (!wageInput) return;

  const wage = Number(wageInput.value) || 0;
  document.getElementById("yearlyWage").value = wage * 12;

  const basic = wage * 0.5;
  const hra = basic * 0.5;
  const standard = 4167;
  const pf = basic * 0.12;

  document.getElementById("basic").innerText = basic.toFixed(0);
  document.getElementById("hra").innerText = hra.toFixed(0);
  document.getElementById("standard").innerText = standard;
  document.getElementById("pf").innerText = pf.toFixed(0);
}

function saveSalary() {
  const wageInput = document.getElementById("monthlyWage");
  if (!wageInput) return;

  fetch("../../backend/admin/save_salary.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ monthly: wageInput.value })
  }).then(() => alert("Salary saved"));
}

/* =========================
   PROFILE UPDATE (EMPLOYEE)
========================= */
function saveProfile() {
  const form = document.getElementById("private");
  if (!form) return;

  const data = new FormData();
  form.querySelectorAll("input, textarea").forEach(el => {
    if (el.name) data.append(el.name, el.value);
  });

  fetch("../../backend/employee/update_profile.php", {
    method: "POST",
    body: data
  }).then(() => alert("Profile updated"));
}

function changePassword() {
  const sec = document.getElementById("security");
  if (!sec) return;

  const data = new FormData();
  sec.querySelectorAll("input").forEach(el => {
    if (el.name) data.append(el.name, el.value);
  });

  fetch("../../backend/employee/change_password.php", {
    method: "POST",
    body: data
  }).then(() => alert("Password updated"));
}

/* =========================
   ATTENDANCE (ADMIN / EMP)
========================= */
if (document.getElementById("attendanceBody")) {

  // Admin attendance
  fetch("../../backend/attendance/get_admin_attendance.php")
    .then(res => res.text())
    .then(html => {
      if (html.trim() !== "") {
        document.getElementById("attendanceBody").innerHTML = html;
      }
    });

  // Employee attendance (fallback)
  fetch("../../backend/attendance/get_employee_attendance.php")
    .then(res => res.text())
    .then(html => {
      if (html.trim() !== "") {
        document.getElementById("attendanceBody").innerHTML = html;
      }
    });
}

/* =========================
   TIME OFF (ADMIN)
========================= */
if (document.getElementById("timeoffBody")) {
  fetch("../../backend/timeoff/get_admin_timeoff.php")
    .then(res => res.text())
    .then(html => {
      document.getElementById("timeoffBody").innerHTML = html;
    });
}

function updateTimeoff(id, status) {
  fetch("../../backend/timeoff/update_timeoff_status.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ id, status })
  }).then(() => location.reload());
}

/* =========================
   TIME OFF (EMPLOYEE)
========================= */
if (document.getElementById("myTimeoffBody")) {
  fetch("../../backend/timeoff/get_employee_timeoff.php")
    .then(res => res.text())
    .then(html => {
      document.getElementById("myTimeoffBody").innerHTML = html;
    });
}

function openTimeoffModal() {
  const modal = document.getElementById("timeoffModal");
  if (modal) modal.classList.remove("hidden");
}

function closeTimeoffModal() {
  const modal = document.getElementById("timeoffModal");
  if (modal) modal.classList.add("hidden");
}

function submitTimeoff() {
  const data = new FormData();
  data.append("type", document.getElementById("leaveType").value);
  data.append("start", document.getElementById("startDate").value);
  data.append("end", document.getElementById("endDate").value);

  fetch("../../backend/timeoff/apply_timeoff.php", {
    method: "POST",
    body: data
  }).then(() => location.reload());
}


/* =========================
   ADMIN PROFILE LOAD
========================= */
if (window.location.pathname.includes("/admin/profile.php")) {
  fetch("../../backend/admin/get_profile.php")
    .then(res => res.json())
    .then(data => {
      if (!data) return;
      document.getElementById("name").innerText = data.name || "";
      document.getElementById("login").innerText = data.login_id || "";
      document.getElementById("email").innerText = data.email || "";
      document.getElementById("mobile").innerText = data.phone || "";
      document.getElementById("company").innerText = data.company || "";
      document.getElementById("department").innerText = data.department || "";
      document.getElementById("manager").innerText = data.manager || "";
      document.getElementById("location").innerText = data.location || "";
    });
}

function checkPasswords() {
  const p1 = document.getElementById("password").value;
  const p2 = document.getElementById("confirm").value;

  if (p1 !== p2) {
    alert("Passwords do not match");
    return false;
  }
  return true;
}

function validateSignupForm() {
  const pass = document.getElementById("password").value;
  const confirm = document.getElementById("confirm").value;

  if (pass.length < 6) {
    alert("Password must be at least 6 characters");
    return false;
  }

  if (pass !== confirm) {
    alert("Passwords do not match");
    return false;
  }

  return true;
}

/* Password eye toggle */
function togglePassword(id) {
  const field = document.getElementById(id);
  field.type = field.type === "password" ? "text" : "password";
}

/* Logo preview */
function previewLogo(input) {
  const reader = new FileReader();
  reader.onload = () => {
    document.querySelector(".logo-box").innerText = "";
    document.querySelector(".logo-box").style.backgroundImage =
      `url(${reader.result})`;
    document.querySelector(".logo-box").style.backgroundSize = "contain";
    document.querySelector(".logo-box").style.backgroundRepeat = "no-repeat";
    document.querySelector(".logo-box").style.backgroundPosition = "center";
  };
  reader.readAsDataURL(input.files[0]);
}

function checkIn() {
  fetch("../../backend/attendance/checkin.php")
    .then(res => res.text())
    .then(msg => {
      alert(msg);
      location.reload();
    });
}

function checkOut() {
  fetch("../../backend/attendance/checkout.php")
    .then(res => res.text())
    .then(msg => {
      alert(msg);
      location.reload();
    });
}
