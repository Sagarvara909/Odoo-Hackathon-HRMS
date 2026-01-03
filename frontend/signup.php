<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/app.js" defer></script>
</head>
<body>

<div class="signup-container">
    <div class="signup-box">

        <h3>Sign Up Page</h3>

        <div class="logo-box">App/Web Logo</div>

        <form action="../backend/auth/signup.php"
                method="post"
                enctype="multipart/form-data"
                onsubmit="return validateSignupForm()">


            <div class="row">
                <label>Company Name :-</label>
                <input type="text" name="company" required>
                <input type="file" name="logo" class="logo-upload" required onchange="previewLogo(this)">
            </div>

            <label>Name :-</label>
            <input type="text" name="name" required>

            <label>Email :-</label>
            <input type="email" name="email" required>

            <label>Phone :-</label>
            <input type="text" name="phone" required>

            <label>Password :-</label>
            <div class="password-box">
                <input type="password" id="password" name="password" required>
                <span onclick="togglePassword('password')">👁</span>
            </div>

            <label>Confirm Password :-</label>
            <div class="password-box">
                <input type="password" id="confirm" name="confirm" required>
                <span onclick="togglePassword('confirm')">👁</span>
            </div>

            <button type="submit">Sign Up</button>
        </form>

        <p class="signin-text">
            Already have an account ? <a href="signin.php">Sign In</a>
        </p>

    </div>
</div>

</body>
</html>
