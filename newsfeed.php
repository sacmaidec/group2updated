<?php
// Example job data (you could later replace this with a database)
$jobs = [
    [
        'title' => 'Market Inventory Staff/Admin Staff',
        'company' => 'KM Services',
        'location' => 'Makati City, Metro Manila',
        'salary' => '₱19,000 - ₱25,000 a month',
        'description' => 'Responsible for inventory management, data entry, and assisting administrative operations. Must be organized and detail-oriented.',
    ],
    [
        'title' => 'Back Office Staff',
        'company' => 'KM Services',
        'location' => 'Quezon City, Metro Manila',
        'salary' => '₱18,000 - ₱22,000 a month',
        'description' => 'Provide support for internal processes, documentation, and data handling. Proficiency in MS Office is a plus.',
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KM Services - Job Listings</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #fff;
            margin: 0;
            padding: 0;
            color: #000;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 50px;
            background-color: #fff;
            border-bottom: 1px solid #ccc;
        }

        header .logo {
            font-weight: bold;
            font-size: 18px;
        }

        nav a {
            text-decoration: none;
            margin-left: 20px;
            color: #aaa;
            font-weight: 500;
        }

        nav a:hover {
            color: #000;
        }

        .container {
            display: flex;
            padding: 40px 60px;
        }

        .sidebar {
            width: 30%;
            padding-right: 30px;
        }

        .job-list {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .job-list h3 {
            margin: 0;
            font-size: 16px;
        }

        .job-list p {
            margin: 5px 0;
            color: #666;
        }

        .apply-btn {
            display: inline-block;
            margin-top: 10px;
            padding: 6px 12px;
            background: #00a000;
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
        }

        .apply-btn:hover {
            background: #007a00;
        }

        .main {
            width: 70%;
            background: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .main h2 {
            margin-top: 0;
        }

        .location, .salary {
            color: #666;
            font-size: 14px;
        }

        .next-btn {
            display: block;
            text-align: right;
            padding: 20px 60px;
        }

        .next-btn a {
            text-decoration: none;
            color: #00a000;
            font-weight: bold;
        }

        .next-btn a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<header>
    <div class="logo">KM Services</div>
    <nav>
        <a href="index.php">Home</a>
        <a href="about.php">About Us</a>
        <a href="profile.php">Profile</a>
    </nav>
</header>

<div class="container">
    <div class="sidebar">
        <h3>Find Jobs</h3>
        <form method="GET">
            <input type="text" name="keyword" placeholder="Search..." style="width:100%; padding:8px; margin-bottom:15px;">
        </form>

        <h4>Sort by relevance</h4>
        <?php foreach($jobs as $job): ?>
            <div class="job-list">
                <h3><?= htmlspecialchars($job['title']) ?></h3>
                <p><?= htmlspecialchars($job['company']) ?></p>
                <p class="salary"><?= htmlspecialchars($job['salary']) ?></p>
                <a href="#" class="apply-btn">Easy apply</a>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="main">
        <h2><?= htmlspecialchars($jobs[0]['title']) ?></h2>
        <p class="salary"><?= htmlspecialchars($jobs[0]['salary']) ?></p>
        <a href="#" class="apply-btn">Apply Now</a>

        <h4>Location</h4>
        <p class="location"><?= htmlspecialchars($jobs[0]['location']) ?></p>

        <h4>Full Job Description</h4>
        <p><?= htmlspecialchars($jobs[0]['description']) ?></p>
    </div>
</div>

</body>
</html>
