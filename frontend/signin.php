<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign In</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/app.js" defer></script>
</head>
<body>

<div class="login-container">
    <div class="login-box">

        <h3>Sign in Page</h3>

        <div class="logo">App/Web Logo</div>

        <?php
            session_start();
            if (isset($_SESSION['error'])) {
            echo "<p style='color:red;text-align:center'>{$_SESSION['error']}</p>";
            unset($_SESSION['error']);
            }
            ?>


        <form action="../backend/auth/signin.php" method="post">
            <label>Login Id/Email :-</label>
            <input type="text" name="login" required>

            <label>Password :-</label>
            <div class="password-box">
         
                <input type="password" id="signinPass" name="password" required>
                <span onclick="togglePassword('signinPass')">👁</span>
            </div>

            <button type="submit">SIGN IN</button>
        </form>

        <p class="signup-text">
            Don't have an account? <span><a href="signup.php">Sign Up</a></span>
        </p>

    </div>
</div>

</body>
</html>
