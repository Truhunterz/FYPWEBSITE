<?php
session_start();
include 'db_connection.php'; // Added missing semicolon

// Check if the form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate inputs (you might want to add more validation/sanitization)
    if (empty($username) || empty($password)) {
        echo "Please enter both username and password.";
        exit;
    }

    // Prepare SQL statement with a parameterized query to prevent SQL injection
    $stmt = $conn->prepare("SELECT id, username, password FROM admins WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Fetch user details
        $row = $result->fetch_assoc();
        $stored_password = $row['password'];

        // Verify password using password_verify function
        if (password_verify($password, $stored_password)) {
            // Password is correct, set session variables
            $_SESSION['username'] = $row['username'];
            $_SESSION['id'] = $row['id'];

            // Redirect to the authenticated page (change as per your application)
            header("Location: adminpage.php");
            exit();
        } else {
            // Password is incorrect
            echo "Incorrect password.";
        }
    } else {
        // Username not found
        echo "Username not found.";
    }

    $stmt->close();
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>JesselBall Sports Centre Login Form</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <style>
        *,
        *:before,
        *:after {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        a{
            margin-top:10px;
            text-decoration:none;
            display: inline-block;
            transition: all 0.2s ease-in;
            position: relative;
            overflow: hidden;
            z-index: 1;
            color: #FFFFFF;
            padding: 0.7em 1.7em;
            cursor: pointer;
            font-size: 18px;
            border-radius: 0.5em;
            background: #902020;
            border: 1px solid #902020;
            width: 325px;
            text-align:center;
        }
        body {
            background-color: #ffffff;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-image: url("assets/background.jpeg"); /* Replace with your image path */
            background-size: cover;
            background-position: center;
        }
        header {
            width: 100%;
            background-color: #b30000;
            padding: 20px 0;
            text-align: center;
        }
        header h1 {
            color: #ffffff;
            font-family: 'Poppins', sans-serif;
            font-size: 24px;
            font-weight: 500;
        }
        .form-container {
            display: flex;
            flex-grow: 1;
            justify-content: center;
            align-items: center;
            width: 100%;
            padding: 20px;
        }
        form {
            position: relative;
            width: 100%;
            max-width: 400px;
            background-color: rgba(255, 255, 255, 0.13);
            border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 40px rgba(0, 0, 0, 0.1);
            padding: 50px 35px;
            box-sizing: border-box;
        }
        form * {
            font-family: 'Poppins', sans-serif;
            color: #902020;
            letter-spacing: 0.5px;
            outline: none;
            border: none;
        }
        form h3 {
            font-size: 32px;
            font-weight: 500;
            line-height: 42px;
            text-align: center;
            color: #0A0909;
        }
        label {
            display: block;
            margin-top: 30px;
            font-size: 16px;
            font-weight: 500;
            color: #0A0909;
        }
        input {
            display: block;
            height: 50px;
            width: 100%;
            background-color: rgba(24, 69, 173, 0.07);
            border-radius: 3px;
            padding: 0 10px;
            margin-top: 8px;
            font-size: 14px;
            font-weight: 300;
            color: #333333;
            transition: background-color 0.3s, box-shadow 0.3s;
        }
        input:focus {
            background-color: rgba(24, 69, 173, 0.15);
            box-shadow: 0 0 10px rgba(24, 69, 173, 0.2);
        }
        .password-container {
            position: relative;
        }
        .toggle-password {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #666666;
        }
        ::placeholder {
            color: #666666;
        }
        button {
            margin-top: 50px;
            width: 100%;
            background-color: #902020;
            color: #ffffff;
            padding: 15px 0;
            font-size: 18px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #333333;
        }
        .sign-up-container {
            text-align: center;
            margin-top: 20px;
        }
        .sign-up-button {
            margin-top: 10px;
            background-color: #009087;
        }
        .sign-up-button:hover {
            background-color: #00796b;
        }
        .social {
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
        }
        .social div {
            width: 48%;
            border-radius: 3px;
            padding: 10px;
            background-color: rgba(24, 69, 173, 0.07);
            color: #902020;
            text-align: center;
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .social div:hover {
            background-color: rgba(24, 69, 173, 0.15);
        }
        .social i {
            margin-right: 8px;
            font-size: 20px;
        }
        .button2 {
            display: inline-block;
            transition: all 0.2s ease-in;
            position: relative;
            overflow: hidden;
            z-index: 1;
            color: #FFFFFF;
            padding: 0.7em 1.7em;
            cursor: pointer;
            font-size: 18px;
            border-radius: 0.5em;
            background: #902020;
            border: 1px solid #902020;

            
        }
        .button2:active {
            color: #902020;
        }
        .button2:before {
            content: "";
            position: absolute;
            left: 50%;
            transform: translateX(-50%) scaleY(1) scaleX(1.25);
            top: 100%;
            width: 140%;
            height: 180%;
            background-color: rgba(0, 0, 0, 0.05);
            border-radius: 50%;
            display: block;
            transition: all 0.5s 0.1s cubic-bezier(0.55, 0, 0.1, 1);
            z-index: -1;
        }
        .button2:after {
            content: "";
            position: absolute;
            left: 55%;
            transform: translateX(-50%) scaleY(1) scaleX(1.45);
            top: 180%;
            width: 160%;
            height: 190%;
            background-color: #009087;
            border-radius: 50%;
            display: block;
            transition: all 0.5s 0.1s cubic-bezier(0.55, 0, 0.1, 1);
            z-index: -1;
        }
        .button2:hover {
            color: #ffffff;
            border: 1px solid #009087;
        }
        .button2:hover:before {
            top: -35%;
            background-color: #009087;
            transform: translateX(-50%) scaleY(1.3) scaleX(0.8);
        }
        .button2:hover:after {
            top: -45%;
            background-color: #009087;
            transform: translateX(-50%) scaleY(1.3) scaleX(0.8);
        }
        @media (max-width: 600px) {
            form {
                padding: 30px 20px;
            }
            form h3 {
                font-size: 24px;
                line-height: 32px;
            }
            input {
                height: 45px;
            }
            button {
                padding: 12px 0;
                font-size: 16px;
            }
            .social div {
                padding: 8px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>JesselBall Sports Centre</h1>
    </header>
    <div class="form-container">
        <form action="login.php" method="POST">
            <h3>Admin Login</h3>
            <label for="username">Username</label>
            <input type="text" placeholder="Username" id="username" name="username" required>
            <label for="password">Password</label>
            <div class="password-container">
                <input type="password" placeholder="Password" id="password" name="password" required>
                <i class="fas fa-eye toggle-password" onclick="togglePassword('password')"></i>
            </div>
            <button type="submit" class="button2">Login</button>
            <a href="index.php" class="button2">Back</a>


          
        </form>
    </div>
    <script>
    function togglePassword(inputId) {
        const passwordInput = document.getElementById(inputId);
        const passwordToggle = passwordInput.nextElementSibling;
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            passwordToggle.classList.replace('fa-eye', 'fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            passwordToggle.classList.replace('fa-eye-slash', 'fa-eye');
        }
    }
    </script>
</body>
</html>
