<?php
session_start();
// ✅ Check if user is logged in
if (!isset($_SESSION['firstname']) || !isset($_SESSION['lastname']) || !isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// ✅ Fetch data from session
$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$email = $_SESSION['email'];
$phone = isset($_SESSION['phone']) ? $_SESSION['phone'] : '(+63) — — — — — — — —';
$location = isset($_SESSION['location']) ? $_SESSION['location'] : 'Mabalacat, Dau';
$citizenship = isset($_SESSION['citizenship']) ? $_SESSION['citizenship'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - KM Services</title>
    <style>
 body {
        margin: 0;
        font-family: Arial, sans-serif;
    }

   header {
    background: #fff;
    border-bottom: 1px solid #ddd;
    padding: 20px 60px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: relative;
}


    .logo {
        font-size: 18px;
        font-weight: bold;
        color: #333;

    }

    /* ✅ UPDATED NAVBAR SECTION */
.navbar {
    display: flex;
    align-items: center;
    padding-right: 50px; /* <-- adds gap before the profile icon */
}

.navbar a {
    text-decoration: none;
    color: #333;
    font-size: 15px;
    padding: 0 15px; /* space between Home and About Us */
}
.navbar a:hover {
    color: #0078d7;
}
/* ✅ END UPDATED NAVBAR SECTION */


    /* User icon top right corner */
 .user-menu {
    position: absolute;
    top: 50%;
    right: 20px; /* large gap */
    transform: translateY(-50%);
}


    .user-icon img {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        cursor: pointer;
        padding-right: 50px;
    }

    /* Dropdown */
    .dropdown-menu {
        display: none;
        position: absolute;
        right: 50px;
        top: 45px;
        background: #fff;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        width: 220px;
        z-index: 1000;
        padding: 10px 0;
        font-size: 14px;
    }

    .dropdown-menu::before {
        content: "";
        position: absolute;
        top: -8px;
        right: 15px;
        border-width: 8px;
        border-style: solid;
        border-color: transparent transparent #fff transparent;
    }

    .dropdown-menu .user-email {
        padding: 10px 15px;
        font-weight: bold;
        border-bottom: 1px solid #eee;
        color: #333;
        font-size: 13px;
        word-break: break-all;
    }

    .dropdown-menu a {
        display: block;
        padding: 10px 15px;
        color: #333;
        text-decoration: none;
        transition: background 0.2s;
    }

    .dropdown-menu a:hover {
        background: #f3f3f3;
    }

    .dropdown-menu .signout {
        color: #0073e6;
        font-weight: bold;
        border-top: 1px solid #eee;
    }
</style>
</head>
<script>
function toggleMenu() {
    const menu = document.getElementById("dropdownMenu");
    menu.style.display = menu.style.display === "block" ? "none" : "block";
}

window.onclick = function(e) {
    if (!e.target.closest('.user-menu')) {
        document.getElementById("dropdownMenu").style.display = "none";
    }
}
</script>

<body>

<header>
    <div class="logo">KM Services</div>

    <!-- ✅ UPDATED NAVBAR HTML -->
    <nav class="navbar">
        <a href="index.php">Home</a>
        <a href="about.php">About Us</a>
    </nav>
    <!-- ✅ END UPDATED NAVBAR HTML -->

    <!-- User icon on the top right -->
    <div class="user-menu">
        <div class="user-icon" onclick="toggleMenu()">
            <img src="img/icon.jpg" alt="User Icon">
        </div>
        <div class="dropdown-menu" id="dropdownMenu">
            <div class="user-email"><?php echo htmlspecialchars($email); ?></div>
            <a href="profile.php">📄 Profile</a>
            <a href="#">⭐ My reviews</a>
            <a href="#">⚙️ Settings</a>
            <a href="#">❓ Help</a>
            <a href="#">🔒 Privacy Center</a>
            <a href="logout.php" class="signout">Sign out</a>
        </div>
    </div>
</header>


<div class="container">
    <div class="left-section">
        <a href="index.php" class="back-btn">&#8592;</a>
        <div class="user-name"><?php echo $firstname . ' ' . $lastname; ?></div>
        <div class="user-info">
            <?php echo $email; ?><br>
            <?php echo $phone; ?>
        </div>

        <h4>Resume</h4>
        <div class="resume-box">
            <a href="#" onclick="openOverlay()">Edit Profile</a>

        </div>
    </div>

    <div class="right-section">
        <div class="section-item">
            <h4>Improve your job matches</h4>
        </div>
        <div class="section-item">
            <h4>Qualifications</h4>
            <a href="quali3.php">&gt;</a>
        </div>
        <div class="section-item">
            <h4>Job preferences</h4>
            <a href="job.php">&gt;</a>
        </div>
        <div class="section-item">
            <h4>Ready to work</h4>
            <a href="readytowork.php">&gt;</a>
        </div>
    </div>
</div>

<!-- Main Overlay -->
<div id="profileOverlay" class="overlay">
    <div class="overlay-content">
        <span class="close-overlay" onclick="closeOverlay()">&times;</span>
        <a href="#" class="back-arrow" onclick="closeOverlay()">&#8592;</a>

        <div class="profile-header">
            <h2><?php echo $firstname . ' ' . $lastname; ?></h2>
            <p><?php echo $phone; ?></p>
            <p><?php echo $email; ?></p>
            <p><?php echo $location; ?></p>
        </div>

        <!-- Summary -->
        <div class="section">
            <div class="section-header">
                <div>Summary</div>
                <div class="add-icon" onclick="openSummaryOverlay()">+</div>
            </div>
            <div class="info-box">
                <span>Your summary will appear here</span>
            </div>
        </div>

        <!-- Personal Information -->
        <div class="section">
            <div class="section-header">
                <div>Personal information</div>
            </div>
            <div class="info-box">
                <span>Citizenship: <?php echo $citizenship ?: 'Not set'; ?></span>
                <div class="icons">
                    <a href="#" onclick="openPersonalOverlay()">&#9998;</a>
                    <a href="#" onclick="clearCitizenship()">&#128465;</a>
                </div>
            </div>
        </div>

        <!-- Work Experience -->
        <!-- Work Experience -->
<div class="section">
  <div class="section-header">
      <div>Work experience</div>
      <div class="add-icon" onclick="openWorkOverlay()">+</div>
  </div>
  <div class="info-box">
      <span>Your work experience will appear here</span>
  </div>
</div>

<!-- educastion -->
       <div class="section">
    <div class="section-header">
        <div>Education</div>
        <div class="add-icon" onclick="openEducationOverlay()">+</div>
    </div>
      <div class="info-box">
      <span>Your skills will appear here</span>
   </div>
    </div>

        <!-- Skills -->
<div class="section">
  <div class="section-header">
      <div>Skills</div>
      <div class="add-icon" onclick="openSkillsOverlay()">+</div>
  </div>
  <div class="info-box">
      <span>Your skills will appear here</span>
  </div>
</div>
        <!-- Certificates -->
        <div class="section">
            <div class="section-header">
                <div>Certificate & Licenses</div>
                <div class="add-icon">+</div>
            </div>
            <div class="info-box">
                <span>Your certificates will appear here</span>
            </div>
        </div>

        <!-- Buttons -->
        <div class="buttons">
            <button class="btn btn-next">Next</button>
            <button class="btn btn-save">Save</button>
        </div>
    </div>
</div>

<!-- Summary Overlay -->
<div id="summaryOverlay" class="summary-overlay">
    <div class="summary-overlay-content">
        <span class="summary-close-overlay" onclick="closeSummaryOverlay()">&times;</span>
        <a href="#" class="back-arrow" onclick="closeSummaryOverlay()">&#8592;</a>
        <h2>Add Summary</h2>

        <form action="save_summary.php" method="POST">
            <textarea name="summary" placeholder="Write your summary here..."></textarea>
            <button type="submit" class="save-btn">SAVE</button>
        </form>
    </div>
</div>

<!-- Personal Info Overlay -->
<div id="personalOverlay" class="personal-overlay">
    <div class="personal-overlay-content">
        <span class="personal-close-overlay" onclick="closePersonalOverlay()">&times;</span>
        <a href="#" class="back-arrow" onclick="closePersonalOverlay()">&#8592;</a>
        <h2>Personal Information</h2>

        <form action="save_personal_info.php" method="POST">
            <div class="input-group">
                <label for="citizenship">Citizenship:</label>
                <select id="citizenship" name="citizenship" required>
                    <option value="">Select Citizenship</option>
                    <option value="Filipino">Filipino</option>
                    <option value="American">American</option>
                    <option value="Canadian">Canadian</option>
                    <option value="Japanese">Japanese</option>
                    <option value="Korean">Korean</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <button type="submit" class="save-btn">SAVE</button>
        </form>
    </div>
</div>

<!-- Work Experience Overlay -->
<div id="workOverlay" class="personal-overlay">
  <div class="personal-overlay-content" style="max-width: 700px; padding: 30px;">
    <span class="personal-close-overlay" onclick="closeWorkOverlay()">&times;</span>

    <h2 style="font-size:22px;">Add Work Experience</h2>
    <p style="color:#555; font-size:14px;">Please fill out the form below. <span style="color:red">*</span> required</p>

    <form method="POST" action="save_work_experience.php" style="margin-top:20px;">
      <label style="display:block;margin-top:15px;font-weight:600;font-size:14px;">Job title*</label>
      <input type="text" name="job_title" required
        style="width:100%;padding:10px;border:1px solid #ccc;border-radius:6px;margin-top:5px;font-size:14px;">

      <label style="display:block;margin-top:15px;font-weight:600;font-size:14px;">Company*</label>
      <input type="text" name="company" required
        style="width:100%;padding:10px;border:1px solid #ccc;border-radius:6px;margin-top:5px;font-size:14px;">

      <label style="display:block;margin-top:15px;font-weight:600;font-size:14px;">Country</label>
      <input type="text" name="country" value="Philippines"
        style="width:100%;padding:10px;border:1px solid #ccc;border-radius:6px;margin-top:5px;font-size:14px;">

      <label style="display:block;margin-top:15px;font-weight:600;font-size:14px;">City, State</label>
      <input type="text" name="city_state"
        style="width:100%;padding:10px;border:1px solid #ccc;border-radius:6px;margin-top:5px;font-size:14px;">

      <label class="checkbox" style="margin-top:10px;">
        <input type="checkbox" name="current_work"> I currently work here
      </label>

      <label style="display:block;margin-top:15px;font-weight:600;font-size:14px;">From</label>
      <div class="row" style="display:flex;gap:10px;">
        <select name="from_month" style="flex:1;padding:10px;border:1px solid #ccc;border-radius:6px;font-size:14px;">
          <option value="">Month</option>
          <option>January</option><option>February</option><option>March</option>
          <option>April</option><option>May</option><option>June</option>
          <option>July</option><option>August</option><option>September</option>
          <option>October</option><option>November</option><option>December</option>
        </select>
        <select name="from_year" style="flex:1;padding:10px;border:1px solid #ccc;border-radius:6px;font-size:14px;">
          <option value="">Year</option>
          <?php for ($y = date('Y'); $y >= 1970; $y--) echo "<option>$y</option>"; ?>
        </select>
      </div>

      <label style="display:block;margin-top:15px;font-weight:600;font-size:14px;">To</label>
      <div class="row" style="display:flex;gap:10px;">
        <select name="to_month" style="flex:1;padding:10px;border:1px solid #ccc;border-radius:6px;font-size:14px;">
          <option value="">Month</option>
          <option>January</option><option>February</option><option>March</option>
          <option>April</option><option>May</option><option>June</option>
          <option>July</option><option>August</option><option>September</option>
          <option>October</option><option>November</option><option>December</option>
        </select>
        <select name="to_year" style="flex:1;padding:10px;border:1px solid #ccc;border-radius:6px;font-size:14px;">
          <option value="">Year</option>
          <?php for ($y = date('Y'); $y >= 1970; $y--) echo "<option>$y</option>"; ?>
        </select>
      </div>

      <label style="display:block;margin-top:15px;font-weight:600;font-size:14px;">Description (Recommended)</label>
      <textarea name="description" style="width:100%;height:80px;padding:10px;border:1px solid #ccc;border-radius:6px;resize:none;font-size:14px;"></textarea>

      <div style="text-align:center;margin-top:30px;">
        <button type="submit" class="save-btn"
          style="background-color:#91ad89;color:#fff;border:none;padding:10px 40px;border-radius:6px;font-weight:bold;font-size:15px;cursor:pointer;letter-spacing:1px;">
          SAVE
        </button>
      </div>
    </form>
  </div>
</div>
<!-- Skills Overlay -->
<div id="skillsOverlay" class="personal-overlay">
  <div class="personal-overlay-content" style="max-width: 600px; padding: 30px;">
    <span class="personal-close-overlay" onclick="closeSkillsOverlay()">&times;</span>

    <h2 style="font-size:22px;">Add Skill</h2>
    <p style="color:#555; font-size:14px;">Please fill out the form below. <span style="color:red">*</span> required</p>

    <form method="POST" action="save_skill.php" style="margin-top:20px;">
      <label style="display:block;margin-top:15px;font-weight:600;font-size:14px;">Skill name*</label>
      <input type="text" name="skill_name" required
        style="width:100%;padding:10px;border:1px solid #ccc;border-radius:6px;margin-top:5px;font-size:14px;">

      <label style="display:block;margin-top:15px;font-weight:600;font-size:14px;">Years of experience</label>
      <select name="years_experience"
        style="width:100%;padding:10px;border:1px solid #ccc;border-radius:6px;margin-top:5px;font-size:14px;">
        <option value="">Select...</option>
        <?php for ($i = 1; $i <= 50; $i++) echo "<option value='$i'>$i</option>"; ?>
      </select>

      <div style="text-align:center;margin-top:30px;">
        <button type="submit" class="save-btn"
          style="background-color:#91ad89;color:#fff;border:none;padding:10px 40px;border-radius:6px;font-weight:bold;font-size:15px;cursor:pointer;letter-spacing:1px;">
          SAVE
        </button>
      </div>
    </form>
  </div>
</div>

<!-- Education Overlay -->
<div id="educationOverlay" class="personal-overlay">
  <div class="personal-overlay-content" style="max-width: 700px; padding: 40px;">
    <span class="personal-close-overlay" onclick="closeEducationOverlay()">&times;</span>

    <h2 style="font-size:22px;">Add Education</h2>
    <p style="color:#555; font-size:14px;">Please fill out the form below. <span style="color:red">*</span> required</p>

    <form method="POST" action="save_education.php" style="margin-top:20px;">
      <label style="font-weight:600; margin-top:15px;">Level of Education*</label>
      <input type="text" name="level" class="form-control" required
        style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px; margin-top:5px; font-size:14px;">

      <label style="font-weight:600; margin-top:15px;">Field of Study*</label>
      <input type="text" name="field" class="form-control" required
        style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px; margin-top:5px; font-size:14px;">

      <label style="font-weight:600; margin-top:15px;">Country</label>
      <input type="text" name="country" value="Philippines" class="form-control"
        style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px; margin-top:5px; font-size:14px;">

      <label style="font-weight:600; margin-top:15px;">School Location</label>
      <input type="text" name="school_location" class="form-control"
        style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px; margin-top:5px; font-size:14px;">

      <label style="font-weight:600; margin-top:15px;">From</label>
      <div style="display:flex; gap:10px;">
        <select name="from_month" style="flex:1; padding:10px; border:1px solid #ccc; border-radius:6px; font-size:14px;">
          <option value="">Month</option>
          <option>January</option><option>February</option><option>March</option>
          <option>April</option><option>May</option><option>June</option>
          <option>July</option><option>August</option><option>September</option>
          <option>October</option><option>November</option><option>December</option>
        </select>
        <select name="from_year" style="flex:1; padding:10px; border:1px solid #ccc; border-radius:6px; font-size:14px;">
          <option value="">Year</option>
          <?php for ($y = date('Y'); $y >= 1970; $y--) echo "<option>$y</option>"; ?>
        </select>
      </div>

      <label style="font-weight:600; margin-top:15px;">To</label>
      <div style="display:flex; gap:10px;">
        <select name="to_month" style="flex:1; padding:10px; border:1px solid #ccc; border-radius:6px; font-size:14px;">
          <option value="">Month</option>
          <option>January</option><option>February</option><option>March</option>
          <option>April</option><option>May</option><option>June</option>
          <option>July</option><option>August</option><option>September</option>
          <option>October</option><option>November</option><option>December</option>
        </select>
        <select name="to_year" style="flex:1; padding:10px; border:1px solid #ccc; border-radius:6px; font-size:14px;">
          <option value="">Year</option>
          <?php for ($y = date('Y'); $y >= 1970; $y--) echo "<option>$y</option>"; ?>
        </select>
      </div>

      <label class="checkbox" style="margin-top:10px;">
        <input type="checkbox" name="currently_here"> I currently study here
      </label>

       <div style="text-align:center;margin-top:30px;">
        <button type="submit" class="save-btn"
          style="background-color:#91ad89;color:#fff;border:none;padding:10px 40px;border-radius:6px;font-weight:bold;font-size:15px;cursor:pointer;letter-spacing:1px;">
          SAVE
        </button>


      </div>
    </form>
  </div>
</div>

<!-- Certificate & Licenses Overlay -->
<div id="certificateOverlay" class="personal-overlay">
  <div class="personal-overlay-content" style="max-width: 700px; padding: 40px;">
    <span class="personal-close-overlay" onclick="closeCertificateOverlay()">&times;</span>

    <h2 style="font-size:22px;">Add Certificate or License</h2>
    <p style="color:#555; font-size:14px;">Please fill out the form below. <span style="color:red">*</span> required</p>

    <form method="POST" action="save_certificate.php" style="margin-top:20px;">

      <label style="font-weight:600; margin-top:15px;">Certificate or License Name*</label>
      <input type="text" name="certificate_name" class="form-control" required
        style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px; margin-top:5px; font-size:14px;">

      <label style="font-weight:600; margin-top:15px;">Issuing Organization*</label>
      <input type="text" name="issuer" class="form-control" required
        style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px; margin-top:5px; font-size:14px;">

      <label style="font-weight:600; margin-top:15px;">Credential ID</label>
      <input type="text" name="credential_id" class="form-control"
        style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px; margin-top:5px; font-size:14px;">

      <label style="font-weight:600; margin-top:15px;">Credential URL</label>
      <input type="url" name="credential_url" placeholder="https://example.com/certificate" class="form-control"
        style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px; margin-top:5px; font-size:14px;">

      <label style="font-weight:600; margin-top:15px;">Issue Date</label>
      <div style="display:flex; gap:10px;">
        <select name="issue_month" style="flex:1; padding:10px; border:1px solid #ccc; border-radius:6px; font-size:14px;">
          <option value="">Month</option>
          <option>January</option><option>February</option><option>March</option>
          <option>April</option><option>May</option><option>June</option>
          <option>July</option><option>August</option><option>September</option>
          <option>October</option><option>November</option><option>December</option>
        </select>
        <select name="issue_year" style="flex:1; padding:10px; border:1px solid #ccc; border-radius:6px; font-size:14px;">
          <option value="">Year</option>
          <?php for ($y = date('Y'); $y >= 1970; $y--) echo "<option>$y</option>"; ?>
        </select>
      </div>

      <label style="font-weight:600; margin-top:15px;">Expiration Date</label>
      <div style="display:flex; gap:10px;">
        <select name="expiry_month" style="flex:1; padding:10px; border:1px solid #ccc; border-radius:6px; font-size:14px;">
          <option value="">Month</option>
          <option>January</option><option>February</option><option>March</option>
          <option>April</option><option>May</option><option>June</option>
          <option>July</option><option>August</option><option>September</option>
          <option>October</option><option>November</option><option>December</option>
        </select>
        <select name="expiry_year" style="flex:1; padding:10px; border:1px solid #ccc; border-radius:6px; font-size:14px;">
          <option value="">Year</option>
          <?php for ($y = date('Y') + 10; $y >= 1970; $y--) echo "<option>$y</option>"; ?>
        </select>
      </div>

      <label class="checkbox" style="margin-top:10px;">
        <input type="checkbox" name="no_expiry"> This certification does not expire
      </label>

      <div style="text-align:center;margin-top:30px;">
        <button type="submit" class="save-btn"
          style="background-color:#91ad89;color:#fff;border:none;padding:10px 40px;border-radius:6px;font-weight:bold;font-size:15px;cursor:pointer;letter-spacing:1px;">
          SAVE
        </button>
      </div>

    </form>
  </div>
</div>






<footer>
    &copy; 2025 KM Services. All rights reserved.
</footer>

<script>
    // Overlay control functions
    function openOverlay() {
        document.getElementById('profileOverlay').style.display = 'flex';
    }
    function closeOverlay() {
        document.getElementById('profileOverlay').style.display = 'none';
    }

    function openSummaryOverlay() {
        document.getElementById('summaryOverlay').style.display = 'flex';
    }
    function closeSummaryOverlay() {
        document.getElementById('summaryOverlay').style.display = 'none';
    }

    function openPersonalOverlay() {
        document.getElementById('personalOverlay').style.display = 'flex';
    }
    function closePersonalOverlay() {
        document.getElementById('personalOverlay').style.display = 'none';
    }

    function clearCitizenship() {
        if (confirm("Are you sure you want to clear your citizenship?")) {
            // You can later connect this to PHP or AJAX
            alert("Citizenship cleared (demo only).");
        }
    }
    function openWorkOverlay() {
    document.getElementById('workOverlay').style.display = 'flex';
}
function closeWorkOverlay() {
    document.getElementById('workOverlay').style.display = 'none';
}

function openSkillsOverlay() {
    document.getElementById('skillsOverlay').style.display = 'flex';
}
function closeSkillsOverlay() {
    document.getElementById('skillsOverlay').style.display = 'none';
}
   
function openEducationOverlay() {
    document.getElementById('educationOverlay').style.display = 'flex';
}
function closeEducationOverlay() {
    document.getElementById('educationOverlay').style.display = 'none';
}




</script>

</body>
</html>
<?php
// ✅ Check if user is logged in
if (!isset($_SESSION['firstname']) || !isset($_SESSION['lastname']) || !isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// ✅ Fetch data from session
$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$email = $_SESSION['email'];
$phone = isset($_SESSION['phone']) ? $_SESSION['phone'] : '(+63) — — — — — — — —'; // optional fallback
$location = isset($_SESSION['location']) ? $_SESSION['location'] : 'Mabalacat, Dau'; // optional fallback, adjust as needed
$citizenship = isset($_SESSION['citizenship']) ? $_SESSION['citizenship'] : ''; // Fetch citizenship if set
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - KM Services</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #fff;
            margin: 0;
            padding: 0;
            color: #000;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
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
            color: #aaa;
            margin-left: 20px;
            font-weight: 500;
        }
        nav a:hover { color: #000; }
        .container {
            display: flex;
            justify-content: space-between;
            padding: 50px 60px;
            flex: 1;
        }
        .left-section { width: 35%; }
        .back-btn {
            text-decoration: none;
            font-size: 24px;
            color: #333;
        }
        .user-name {
            font-size: 18px;
            font-weight: bold;
            margin: 20px 0 5px;
        }
        .user-info {
            font-size: 14px;
            color: #777;
            margin-bottom: 30px;
        }
        .resume-box {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 15px;
            width: 200px;
            text-align: center;
            background: #fff;
            transition: box-shadow 0.3s ease;
        }
        .resume-box:hover { box-shadow: 0 3px 8px rgba(0,0,0,0.1); }
        .resume-box a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }
        .resume-box p {
            margin: 5px 0 0;
            font-size: 12px;
            color: #666;
        }
        .right-section {
            width: 55%;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.08);
        }
        .section-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #eee;
            padding: 15px 0;
        }
        .section-item:last-child { border-bottom: none; }
        .section-item h4 {
            margin: 0;
            font-size: 15px;
            color: #333;
        }
        .section-item a {
            text-decoration: none;
            font-size: 18px;
            color: #888;
        }
        .section-item a:hover { color: #000; }
        footer {
            text-align: center;
            padding: 20px;
            font-size: 13px;
            color: #888;
            border-top: 1px solid #ccc;
            margin-top: auto;
        }

        /* Overlay Styles */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .overlay-content {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            max-width: 800px;
            width: 90%;
            max-height: 80vh;
            overflow-y: auto;
            position: relative;
        }

        .overlay .back-arrow {
            text-decoration: none;
            font-size: 20px;
            color: #000;
            margin-bottom: 10px;
            display: inline-block;
        }

        .overlay .profile-header {
            margin-bottom: 30px;
        }

        .overlay .profile-header h2 {
            margin: 0;
            font-size: 20px;
        }

        .overlay .profile-header p {
            margin: 5px 0;
            color: #555;
            font-size: 14px;
        }

        .overlay .section {
            margin-bottom: 25px;
        }

        .overlay .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .overlay .add-icon {
            cursor: pointer;
            font-size: 20px;
            color: #000;
        }

        .overlay .info-box {
            background-color: #f0f0f0;
            padding: 8px 12px;
            border-radius: 4px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .overlay .info-box span {
            flex-grow: 1;
        }

        .overlay .icons {
            display: flex;
            gap: 8px;
        }

        .overlay .icons a {
            text-decoration: none;
            color: #555;
            font-size: 14px;
        }

        .overlay .icons a:hover {
            color: #000;
        }

        .overlay .buttons {
            text-align: right;
            margin-top: 40px;
        }

        .overlay .btn {
            border: none;
            border-radius: 6px;
            padding: 10px 25px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            margin-left: 8px;
        }

        .overlay .btn-next {
            background-color: #b7cfb3;
            color: #fff;
        }

        .overlay .btn-save {
            background-color: #91ad89;
            color: #fff;
        }

        .overlay .btn-next:hover,
        .overlay .btn-save:hover {
            opacity: 0.9;
        }

        .close-overlay {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 24px;
            cursor: pointer;
            color: #999;
        }

        .close-overlay:hover {
            color: #000;
        }

        /* Summary Overlay Styles */
        .summary-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1100; /* Higher than main overlay */
            justify-content: center;
            align-items: center;
        }

        .summary-overlay-content {
            background-color: #fafafa;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            max-width: 800px;
            width: 90%;
            position: relative;
        }

        .summary-overlay .back-arrow {
            display: inline-block;
            font-size: 18px;
            color: #000;
            text-decoration: none;
            margin-bottom: 15px;
        }

        .summary-overlay h2 {
            font-size: 20px;
            margin-bottom: 20px;
        }

        .summary-overlay textarea {
            width: 100%;
            height: 200px;
            background-color: #ddd;
            border: none;
            border-radius: 6px;
            resize: none;
            padding: 12px;
            font-size: 14px;
            color: #333;
            outline: none;
        }

        .summary-overlay textarea:focus {
            background-color: #eaeaea;
        }

        .summary-overlay .save-btn {
            display: inline-block;
            background-color: #91ad89;
            color: white;
            border: none;
            border-radius: 6px;
            padding: 8px 25px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 20px;
            float: right;
        }

        .summary-overlay .save-btn:hover {
            opacity: 0.9;
        }

        .summary-close-overlay {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 24px;
            cursor: pointer;
            color: #999;
        }

        .summary-close-overlay:hover {
            color: #000;
        }

        /* Personal Info Overlay Styles */
        .personal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1200; /* Higher than summary overlay */
            justify-content: center;
            align-items: center;
        }

        .personal-overlay-content {
            background-color: #fafafa;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            max-width: 700px;
            width: 90%;
            position: relative;
        }

        .personal-overlay .back-arrow {
            display: inline-block;
            font-size: 18px;
            color: #000;
            text-decoration: none;
            margin-bottom: 20px;
        }

        .personal-overlay h2 {
            font-size: 20px;
            margin-bottom: 30px;
        }

        .personal-overlay .input-group {
            background-color: #e5e5e5;
            border-radius: 30px;
            padding: 15px 25px;
            margin-bottom: 25px;
        }

        .personal-overlay label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .personal-overlay select {
            width: 100%;
            border: none;
            background: none;
            font-size: 15px;
            outline: none;
            color: #333;
        }

        .personal-overlay .save-btn {
            display: inline-block;
            background-color: #91ad89;
            color: white;
            border: none;
            border-radius: 6px;
            padding: 8px 25px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            float: right;
        }

        .personal-overlay .save-btn:hover {
            opacity: 0.9;
        }

        .personal-close-overlay {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 24px;
            cursor: pointer;
            color: #999;
        }

        .personal-close-overlay:hover {
            color: #000;
        }
    </style>
