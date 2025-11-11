<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - KM Services</title>
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

    <!-- Login Box -->
    <div class="login-container">
        <h1>Login</h1>
        <form action="login_process.php" method="POST">
            <input type="email" name="email" placeholder="Enter your email" required>
            <input type="password" name="password" placeholder="Enter your password" required>

            <div class="form-options">
                <label><input type="checkbox" name="remember"> Remember me</label>
                <a href="#">Forgot password?</a>
            </div>

            <button type="submit" class="login-btn">Login</button>

            <p class="register-link">Not Registered? <a href="register.php">Create an account!</a></p>
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

/* Login Container */
.login-container {
    max-width: 400px;
    margin: 80px auto;
    text-align: center;
}

.login-container h1 {
    font-size: 32px;
    margin-bottom: 30px;
    font-weight: bold;
}

.login-container form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.login-container input[type="email"],
.login-container input[type="password"] {
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

.login-btn {
    padding: 12px;
    background-color: #00a000;
    color: white;
    font-weight: bold;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.register-link {
    margin-top: 10px;
    font-size: 14px;
}

.register-link a {
    color: #000;
    font-weight: bold;
    text-decoration: underline;
}
</style>