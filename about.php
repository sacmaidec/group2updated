<?php
// Example email variable (replace this with your session or database value)
$email = "tashaevangelista8@gmail.com";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About KM Recruitment</title>
<style>
/* --- Global Reset --- */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* --- Body Styling --- */
body {
  font-family: "Poppins", sans-serif;
  background: #f7f9fb;
  color: #333;
}

/* --- Header --- */
header {
  background: #fff;
  border-bottom: 1px solid #ddd;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 15px 50px;
  position: sticky;
  top: 0;
  z-index: 100;
}

.logo {
  font-weight: bold;
  font-size: 18px;
}

nav {
  display: flex;
  align-items: center;
  gap: 30px;
}

nav a {
  text-decoration: none;
  color: #333;
  font-weight: 500;
}

nav a:hover {
  color: #007bff;
}

/* --- User Menu --- */
.user-menu {
  position: relative;
}

.user-icon img {
  width: 30px;
  height: 30px;
  border-radius: 50%;
  cursor: pointer;
}

/* --- About Section --- */
.about-container {
  display: flex;
  align-items: flex-start;
  justify-content: center;
  gap: 40px;
  padding: 80px 10%;
  background: #ffffff;
  box-shadow: 0 4px 20px rgba(0,0,0,0.05);
  border-radius: 10px;
  width: 80%;
  margin: 50px auto;
}

.about-container img {
  width: 40%;
  max-width: 400px;
  border-radius: 5px;
  border: 3px solid #007bff;
  box-shadow: 10px 10px 0 #ccc;
}

.about-text {
  width: 55%;
  text-align: justify;
}

.about-text h2 {
  margin-bottom: 15px;
  font-size: 24px;
  color: #000;
}

.about-text p {
  line-height: 1.6;
  font-size: 15px;
}

/* --- Footer --- */
footer {
  text-align: center;
  padding: 20px;
  font-size: 14px;
  color: #555;
  border-top: 1px solid #ddd;
  margin-top: 60px;
}
</style>
</head>

<body>

<!-- Header -->
<header>
  <div class="logo">KM Services</div>
  <nav>
    <a href="index.php">Home</a>
    <a href="about.php">About Us</a>
  </nav>
  <div class="user-menu">
    <div class="user-icon">
      <img src="https://cdn-icons-png.flaticon.com/512/1077/1077063.png" alt="User Icon">
    </div>
  </div>
</header>

<!-- About Section -->
<section class="about-container">
  <img src="img/about-us.jpg" alt="Business Team">
  <div class="about-text">
    <h2>About KM Recruitment</h2>
    <p>KM Recruitment is a job site and a global leader in job matching and hiring, operating in over 60 countries. More people find jobs on Indeed than anywhere else because we put job seekers first — offering powerful tools to search jobs, post resumes, research companies, and more.</p>
    <p>Powered by AI and extensive proprietary job and hiring data, KM Recruitment is transforming how people and employers connect. Every day, we help tens of millions of job seekers discover new opportunities and empower millions of employers to find the right talent through innovative AI-driven solutions that simplify and accelerate the hiring process. Indeed is a subsidiary of Recruit Holdings, a global leader in HR technology and business consulting that is reshaping hiring and transforming the world of work.</p>
  </div>
</section>

<!-- Footer -->
<footer>
  © 2025 KM Services. All rights reserved.
</footer>

</body>
</html>
