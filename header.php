<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillSwap</title>
    <link rel="stylesheet" href="includes/styles.css">
    <style>
        /* Header Styling */
.header-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    background-color: #f8f9fa;
}

.logo-section {
    display: flex;
    align-items: center;
}

.logo img {
    height: 100px;
}

.slogan {
    font-size: 1.1rem;
    margin-left: 10px;
    color: #555;
}

.main-nav a {
    margin: 0 10px;
    text-decoration: none;
    color: #333;
    font-weight: bold;
}

.user-nav {
    display: flex;
    align-items: center;
}

.user-nav .auth-link {
    margin: 0 5px;
    text-decoration: none;
    font-weight: bold;
    color: #007bff;
}

.profile-info {
    margin-right: 15px;
    font-weight: bold;
}

.auth-link.logout {
    color: #dc3545;
}

.auth-link.signup {
    color: #28a745;
}

.auth-link.login {
    color: #007bff;
}

    </style>
</head>
<body>
<header>
    <div class="header-container">
        <!-- Logo and Slogan -->
        <div class="logo-section">
            <a href="index.php" class="logo">
                <img src="includes/images/logoo.png" alt="SkillSwap Logo"> <!-- Add your logo image in assets/images folder -->
            </a>
            <h1>SKILLSWAP</h1><br>
            <span class="slogan">Learn, Teach, and Connect</span>
        </div>
        
        <!-- Navigation Links -->
        <nav class="main-nav">
            <a href="index.php">Home</a>
            <a href="explore.php">Explore Skills</a>
            <a href="dashboard.php">Dashboard</a>
            <a href="addskill.php">share your Skills</a>
            <a href="about.php">About</a>
            <a href="contact.php">Contact</a>
            <a href="faq.php">FAQ</a>
        </nav>

        <!-- Profile and Authentication Links -->
        <div class="user-nav">
            <?php
            session_start();
            if (isset($_SESSION['user_id'])) {
                // Fetch username from the session or database (Example)
                $query = "SELECT * FROM users WHERE username = '$username'";
                $result = $conn->query($query);

                $username = $_SESSION['username']; // Set the username when the user logs in
                
                echo "<div class='profile-info'>
                        <span>Welcome, $username</span>
                        <a href='profile.php' class='profile-link'>My Profile</a>
                      </div>";
                echo "<a href='logout.php' class='auth-link logout'>Logout</a>";
            } else {
                echo "<a href='login.php' class='auth-link login'>Login</a>";
                echo "<a href='signup.php' class='auth-link signup'>Sign Up</a>";
            }
            ?>
        </div>
    </div>
</header>
<main>
