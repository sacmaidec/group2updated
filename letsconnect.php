<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - KM Services</title>
    <link rel="stylesheet" href="style.css">
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

<main class="contact-container">
    <a href="about.php" class="back-arrow">&#8592;</a>

    <div class="contact-content">
        <h1>Contact Us</h1>
        <p>Let's break the ice. We'd love to hear from you...</p>
        <p>Looking for the right talent or your next career move? Our recruitment team is here to connect top-tier professionals with the companies that need them. Whether you're an employer seeking skilled candidates or a job seeker ready for your next opportunity, we’re ready to help.</p>
        <p>Fill out the contact form below or reach us directly — one of our recruitment specialists will get back to you promptly to discuss how we can support your goals.</p>

        <div class="contact-info">
            <p><strong>Contact Us:</strong> +63 912 345 6789</p>
            <p><strong>Headquarters:</strong> Jenra, Angeles City</p>
        </div>

        <form method="post" action="contact_submission.php" class="contact-form">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" placeholder="Your Message" rows="5" required></textarea>

            <div class="buttons">
                <button type="submit" class="submit-btn">Submit</button>
                <button type="button" class="cancel-btn" onclick="window.history.back()">Cancel</button>
            </div>
        </form>
    </div>
</main>

</body>
</html>
<style>
    /* General Body */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    background: #fff;
    color: #000;
    text-align: center;
}

/* Header */
header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 50px;
    border-bottom: 1px solid #ccc;
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

/* Contact Container */
.contact-container {
    max-width: 800px;
    margin: 80px auto;
    padding: 0 20px;
    text-align: center;
}

.back-arrow {
    font-size: 16px;
    text-decoration: none;
    color: #000;
    display: inline-block;
    margin-bottom: 20px;
    align-self: flex-start;
}

.contact-content h1 {
    font-size: 32px;
    margin-bottom: 20px;
    font-weight: bold;
}

.contact-content p {
    font-size: 16px;
    line-height: 1.6;
    color: #555;
    margin-bottom: 20px;
}

.contact-info {
    margin: 20px 0;
    text-align: left;
    display: inline-block;
}

.contact-info p {
    margin: 8px 0;
    font-size: 16px;
}

.contact-form {
    margin-top: 30px;
    text-align: left;
    display: inline-block;
    width: 100%;
    max-width: 500px;
}

.contact-form input,
.contact-form textarea {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border: none;
    border-bottom: 1px solid #ccc;
    background: transparent;
    font-size: 16px;
    outline: none;
}

.buttons {
    display: flex;
    gap: 10px;
    justify-content: flex-start;
}

.submit-btn {
    padding: 12px 20px;
    background-color: #00a000;
    color: white;
    font-weight: bold;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.cancel-btn {
    padding: 12px 20px;
    background-color: #ccc;
    color: #555;
    font-weight: bold;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

/* Mobile responsiveness */
@media (max-width: 768px) {
    header {
        flex-direction: column;
        padding: 20px;
    }
    header nav {
        margin-top: 10px;
    }
    header nav a {
        margin: 0 10px;
    }
    .contact-container {
        margin: 40px auto;
        padding: 0 10px;
    }
    .buttons {
        flex-direction: column;
    }
}
</style>