<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - KM Services</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Header -->
    <header>
        <div class="logo">KM Services</div>
        <nav>
            <a href="#">Home</a>
            <a href="#">About Us</a>
            <a href="#">Contact</a>
        </nav>
    </header>

    <!-- Register Box -->
    <div class="register-container">
        <h1>Register</h1>
        <form action="register_process.php" method="POST">
            <input type="text" name="firstname" placeholder="Enter your first name" required>
            <input type="text" name="lastname" placeholder="Enter your last name" required>
            <input type="email" name="email" placeholder="Enter your email" required>
            <input type="password" name="password" placeholder="Enter your password" required>
            <input type="password" name="confirm_password" placeholder="Confirm your password" required>

            <div class="form-options">
                <label><input type="checkbox" name="agree_terms" required> I agree to the <a href="#">Terms & Conditions</a></label>
            </div>

            <button type="submit" class="register-btn">Register</button>

            <p class="login-link">Already have an account? <a href="login.php">Login here!</a></p>
        </form>
    </div>
</body>
</html>
<style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    background: #fff;
    color: #000;
}

/* Header */
header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 50px;
}

header .logo {
    font-weight: bold;
    font-size: 18px;
}

header nav a {
    margin-left: 20px;
    color: #aaa;
    text-decoration: none;
    font-weight: 500;
}
header nav a:hover {
    color: #000;
}

/* Register Container */
.register-container {
    max-width: 400px;
    margin: 80px auto;
    text-align: center;
}

.register-container h1 {
    font-size: 32px;
    margin-bottom: 30px;
    font-weight: bold;
}

.register-container form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.register-container input[type="text"],
.register-container input[type="email"],
.register-container input[type="password"] {
    padding: 12px;
    border: none;
    border-bottom: 1px solid #ccc;
    background: transparent;
    font-size: 16px;
    outline: none;
}

.form-options {
    display: flex;
    justify-content: space-between;
    font-size: 14px;
    color: #888;
    margin-top: 5px;
}

.form-options a {
    color: #000;
    text-decoration: underline;
}

.register-btn {
    padding: 12px;
    background-color: #00a000;
    color: white;
    font-weight: bold;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.login-link {
    margin-top: 10px;
    font-size: 14px;
}

.login-link a {
    color: #000;
    font-weight: bold;
    text-decoration: underline;
}
</style>