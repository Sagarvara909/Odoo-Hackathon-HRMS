# DayFlow – HR Management System

DayFlow is a simple Human Resource Management System built for the *Odoo Hackathon* using PHP, MySQL, HTML, CSS, and JavaScript.

---
## Demo Admin Account (Manual Setup)
- For security reasons, Admin users are not created via the Sign Up page.
- Admin accounts must be manually inserted into the database.

- Below is a demo admin setup for testing purposes.
- Admin Credentials
    Email: admin@gmail.com
    Password (plain): admin123
    Password (Hash value): $2a$12$Yk12ckg7xgwoPUzNmUR8n.sr7GL.Ac9S6MrF15wh2vqtN0HmagfMm 

### Employee
- Employees sign up using the *Sign Up* page
- All signups are automatically assigned the *employee role*
- After login, the Employee Dashboard opens

---

## Features

### Admin / HR
- View employee profiles
- View all attendance records
- Approve / Reject time-off requests
- Manage salary information

### Employee
- Dashboard access
- Attendance Check-In / Check-Out
- View attendance history
- Apply for time-off
- View time-off status
- Update profile and password

---

## Tech Stack

- Frontend: HTML, CSS, JavaScript
- Backend: PHP (Core PHP)
- Database: MySQL
- Server: Apache (XAMPP)

---

## Project Setup

1. Install XAMPP
2. Copy project to:

## htdocs/Odoo/
3. Start Apache and MySQL
4. Create database hrms in phpMyAdmin
5. Import the SQL file
6. Update DB credentials in:

## backend/config/db.php
7. Open in browser:  
    http://localhost/Odoo/frontend/signin.php

---

## Notes

- Signup is only for Employees
- Admin login is fixed for demo
- Passwords are securely hashed

---

Built for *Odoo Hackathon*

Created By: *Suman & Sagar*
