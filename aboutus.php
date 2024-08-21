<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Jesselball Sports Centre</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333333;
        }

        header {
            background-color: #b30000;
            color: #ffffff;
            padding: 20px 0;
            position: sticky;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        header h1 {
            margin: 0;
            font-size: 36px;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        .navbar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .navbar li {
            margin: 0 10px;
        }

        .navbar a {
            color: #ffffff;
            text-decoration: none;
            font-size: 18px;
            padding: 10px 15px;
            transition: background-color 0.3s, color 0.3s;
        }

        .navbar a:hover {
            background-color: #ffffff;
            color: #b30000;
            border-radius: 5px;
        }

        .navbar-toggle {
            display: none;
            font-size: 24px;
            cursor: pointer;
        }

        /* About Us Section */
        .aboutus {
            padding: 60px 20px;
            text-align: center;
            background-color: #ffffff;
        }

        .aboutus h2 {
            font-size: 36px;
            margin-bottom: 20px;
            color: #dd2d2d;
        }

        .aboutus p {
            font-size: 18px;
            margin-bottom: 20px;
            color: #666666;
        }

        .aboutus img {
            max-width: 100%;
            height: auto;
            margin: 20px 0;
        }

        /* Our Values Section */
        .values {
            padding: 60px 20px;
            text-align: center;
            background-color: #f1f1f1;
        }

        .values h2 {
            font-size: 32px;
            margin-bottom: 20px;
            color: #333333;
        }

        .values .value {
            margin: 20px 0;
        }

        .values .value h3 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #dd2d2d;
        }

        .values .value p {
            font-size: 18px;
            color: #666666;
        }

        .values .icons {
            font-size: 50px;
            color: #ff4000;
            margin-bottom: 20px;
        }

        /* Contact Info Section */
        .contact-info {
            padding: 20px;
            text-align: center;
            background-color: #ffffff;
            border-top: 1px solid #ddd;
        }

        .contact-info p {
            margin: 5px 0;
            font-size: 18px;
        }

        .contact-info a {
            color: #ff7700;
            text-decoration: none;
            font-size: 18px;
        }

        .contact-info a:hover {
            text-decoration: underline;
        }

        footer {
            background-color: #b30000;
            color: #ffffff;
            text-align: center;
            padding: 20px 0;
        }

        footer p {
            margin: 0;
            font-size: 14px;
        }

        footer .social {
            margin: 20px 0;
        }

        footer .social a {
            margin: 0 10px;
            color: #ffffff;
            font-size: 20px;
            transition: color 0.3s;
        }

        footer .social a:hover {
            color: #cccccc;
        }

        @media (max-width: 768px) {
            .navbar ul {
                display: none;
                flex-direction: column;
                width: 100%;
                background-color: #902020;
                position: absolute;
                top: 60px;
                left: 0;
            }

            .navbar ul.active {
                display: flex;
            }

            .navbar li {
                text-align: center;
                margin: 10px 0;
            }

            .navbar a {
                padding: 10px;
                font-size: 20px;
            }

            .navbar-toggle {
                display: block;
            }
        }
    </style>
</head>
<body>
<header>
    <div class="navbar">
        <h1>JesselBall Sports Centre</h1>
        <div class="navbar-toggle" onclick="toggleMenu()">
            <i class="fas fa-bars"></i>
        </div>
        <ul class="navbar-menu" id="navbar-menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="BookCourt.php">Book</a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href="Facility.php">Facility</a></li>
            <li><a href="login.php"><i class="fa fa-user"></i></a></li>
        </ul>
    </div>
</header>

    <section class="aboutus">
        <h2>About Us</h2>
        <p>When sport meets technology</p>
        <img src="assets/logoj.jpg"  width="300px" 3px; alt="jesselball logo"> <!-- Placeholder image URL -->
        <p>Jesselball was founded in 2015 with a passion for revolutionizing the sports booking industry. We envisioned a platform that seamlessly connects sports enthusiasts with their favorite sports complexes and facilities, making the process of booking sports venues as effortless as possible.</p>
    </section>
    <section class="values">
        <h2>Our Value</h2>
        <div class="value">
            <i class="fas fa-envelope icons"></i>
            <h3>Product</h3>
            <p>We provide better booking sport complex experiences to users as we have live availability booking feature. We understand that convenience is important for sports enthusiasts.</p>
        </div>
        <div class="value">
            <i class="fas fa-handshake icons"></i>
            <h3>Partnership</h3>
            <p>We believe that building successful partnerships will provide greater benefit and convenience to users.</p>
        </div>
        <div class="value">
            <i class="fas fa-lightbulb icons"></i>
            <h3>Our Vision</h3>
            <p>To become your ultimate sport booking fellow.</p>
        </div>
        <div class="value">
            <i class="fas fa-bullseye icons"></i>
            <h3>Our Mission</h3>
            <p>Your gateway to thrilling sport experience.</p>
        </div>
    </section>
    <section class="contact-info">
        <p><strong>Address:</strong> <a href="https://maps.app.goo.gl/PWMahdVNkapEzikL6">1190, Jalan Selendang 1, Taman Selamat, 14000 Bukit Mertajam, Penang</a></p>
        <p><strong>Phone:</strong> <a href="tel:+0134832222">+013 483 2222</a></p>
        <p><strong>Email:</strong> <a href="mailto:jesselballsc@gmail.com">jesselballsc@gmail.com</a></p>
    </section>
    <footer>
        <p>&copy; 2024 Jesselball Sports Centre. All rights reserved.</p>
        <div class="social">
            <a href="https://wa.me/+60134832222" target="_blank"><i class="fab fa-whatsapp"></i></a>
            <a href="https://www.facebook.com/JesselballSportsCentreSB/"><i class="fab fa-facebook"></i></a>
            <a href="https://www.instagram.com/jesselball/"><i class="fab fa-instagram"></i></a>
        </div>
    </footer>
    <script>
        function toggleMenu() {
            var menu = document.getElementById('navbar-menu');
            menu.classList.toggle('active');
        }
    </script>
</body>
</html>
