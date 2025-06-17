<?php 
include 'config/db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = '$email' AND verified = 0";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            header("Location: dashboard.php");
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "Account not found or not verified.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background: linear-gradient(135deg, rgba(0, 128, 128, 0.9), rgba(0, 102, 204, 0.9), rgba(255, 153, 0, 0.9));
    background-size: cover;
    color: #ffffff;
    overflow: hidden;
}

/* Animated Gradient */
@keyframes gradientAnimation {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

body {
    background: linear-gradient(135deg, rgba(0, 128, 128, 0.9), rgba(0, 102, 204, 0.9), rgba(255, 153, 0, 0.9));
    background-size: 200% 200%;
    animation: gradientAnimation 10s ease infinite;
}

.container {
    background: rgba(255, 255, 255, 0.9);
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    width: 100%;
    max-width: 400px;
    text-align: center;
    position: relative;
    overflow: hidden; /* Ensures that the shadows and border-radius are well-contained */
    
    /* Adding a subtle gradient background for depth */
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.7));
    
    /* Adding a subtle hover effect for interaction */
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.container:hover {
    transform: scale(1.02); /* Slight scale effect on hover */
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3); /* Deepens the shadow for hover */
}

/* Border Styling: Adding a thin, light border around the container */
.container::before {
    content: "";
    position: absolute;
    top: -5px;
    left: -5px;
    right: -5px;
    bottom: -5px;
    border: 1px solid rgba(255, 255, 255, 0.4); /* Thin light border for added structure */
    border-radius: 15px;
    z-index: -1; /* Keeps the border behind the form content */
}

/* Subtle animation to the container */
@keyframes fadeIn {
    0% { opacity: 0; transform: scale(0.95); }
    100% { opacity: 1; transform: scale(1); }
}


        /* Logo Styling */
        .logo {
            max-width: 120px;
            margin-bottom: 20px;
        }

        /* Headings */
        h2 {
            color: #333;
            font-size: 1.8rem;
            margin-bottom: 15px;
            font-weight: bold;
        }

        /* Form Inputs */
        label {
            display: block;
            text-align: left;
            color: #333;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
            background-color: #fafafa;
        }

        /* Button Styling */
        button[type="submit"],
        .social-button {
            background-color: #0066cc;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            width: 100%;
            margin: 10px 0;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover,
        .social-button:hover {
            background-color: #005bb5;
        }

        /* Social Button Styling */
        .social-button {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #db4437;
        }

        .social-button:hover {
            background-color: #c1351d;
        }

        /* Link Styling */
        a {
            color: #0066cc;
            text-decoration: none;
            margin-top: 10px;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Footer Styling */
        footer {
            text-align: center;
            color: #333;
            font-size: 0.9rem;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <img src="includes/images/logoo.png" alt="Logo" class="logo"> <!-- Replace with your logo path -->

            <h2>Login</h2>
            <form action="" method="POST">
                <label>Email:</label>
                <input type="email" name="email" required>
                
                <label>Password:</label>
                <input type="password" name="password" required>
                
                <button type="submit">Login</button>
            </form>

            <p>Or log in with:</p>
            <button class="social-button" onclick="alert('Login with Google coming soon!')">Google</button>
            <button class="social-button" onclick="alert('Login with Facebook coming soon!')">Facebook</button>

            <a href="signup.php">Don't have an account? Sign up</a>
        </div>
    </div>
</body>
</html>
