<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facility</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <style>
        /* User facility Styles */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
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

        img {
            width: 90%;
            height: 300px;
            object-fit: cover;
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

        .facility {
            padding: 60px 20px;
            text-align: center;
        }

        .facility h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .facility p {
            font-size: 18px;
            margin-bottom: 40px;
            color: #666666;
        }

        .facility .button {
            padding: 15px 30px;
            font-size: 18px;
            background-color: #ffcc00;
            color: #b30000;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .facility .button:hover {
            background-color: #e6b800;
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

    <div class="facility">
        <h2>FACILITY IN JESSELBALL</h2>
        <br>
        <br>
        <h1>- Futsal Court -</h1>
        <br>
        <h3>Futsal FIFA</h3>
        <img src="assets/futsal3.jpeg">
        <p>The Futsal FIFA court at Jesselball Sports Centre is designed to meet international standards, offering a top-quality playing surface that adheres to FIFA's specifications. This court features smooth, non-abrasive flooring, providing excellent ball control and player safety. Ideal for professional matches and serious training sessions, the Futsal FIFA court ensures a premium futsal experience.</p>
        <br>
        <h3>Futsal Interlock</h3>
        <img src="assets/futsal2.jpeg">
        <p>The Futsal Interlock court boasts a modular flooring system that combines durability with comfort. Its interlocking tiles are designed to withstand high-intensity play while offering a slight cushioning effect to reduce strain on players' joints. This court is perfect for recreational games and local tournaments, providing a balance of performance and practicality.</p>
        <br>
        <h3>Futsal Grass(Futsal Turf)</h3>
        <img src="assets/futsal1.jpeg">
        <p>Our Futsal Grass court offers a unique playing experience with its high-quality synthetic turf that mimics the feel of natural grass. This surface is designed for optimal traction and ball movement, making it suitable for both casual games and competitive matches. The Futsal Grass court is an excellent choice for players who enjoy the traditional outdoor soccer feel in a controlled indoor environment.</p>
        <br>
        <h3>Futsal Surface</h3>
        <table>
            <tr><img src="assets/grass.jpeg" alt= "grass"></td>
            <tr><img src="assets/rubber.jpeg" alt= "rubber"></td>
        </table>
        <br>
        <br>
        <h1>- Food, Drinks & Snacks -</h1>
        <br>
        <h3>Jesselball Café</h3>
        <img src="assets/cafe.jpeg">
        <img src="assets/cafe2.jpeg">
        <p>The Jesselball Café offers a vibrant and welcoming environment, perfect for enjoying a break before or after your activities. With a mix of comfortable seating and a casual ambiance, it's an ideal spot for both individuals and groups to relax and refuel.</p>
        <br>
        <br>
        <h1>- Shop -</h1>
        <br>
        <h3>Jesselball Sports Shop</h3>
        <img src="assets/shop.jpeg">
        <p>The Jesselball Sports Shop is your one-stop destination for all your sports equipment needs, with a focus on futsal and badminton gear. Located conveniently within the Jesselball Sports Centre, the shop offers a wide range of high-quality products to enhance your sporting experience.</p>
        <br>
        <br>
        <h1>- Gym -</h1>
        <br>
        <h3>Power Master Gym & Fitness</h3>
        <img src="assets/gym.jpeg">
        <p>Power Master Gym & Fitness at Jesselball Sport Centre is a state-of-the-art fitness facility equipped with a wide range of cardio machines, including treadmills and elliptical trainers. The gym boasts modern equipment designed to cater to all fitness levels, providing an ideal environment for both beginners and seasoned athletes. With a focus on creating a supportive and dynamic atmosphere, Power Master Gym & Fitness ensures that members have access to top-notch amenities and professional guidance, making it a premier destination for achieving fitness goals.</p>
        <br>
    </div>

    <footer>
        <div class="social">
            <a href="https://wa.me/+60134832222" target="_blank"><i class="fab fa-whatsapp"></i></a>
            <a href="https://www.facebook.com/JesselballSportsCentreSB/"><i class="fab fa-facebook"></i></a>
            <a href="https://www.instagram.com/jesselball/"><i class="fab fa-instagram"></i></a>
        </div>
        <p>&copy; 2023 Jesselball Sports Centre. All rights reserved.</p>
    </footer>
    <script>
        function toggleMenu() {
            let navbarMenu = document.getElementById('navbar-menu');
            navbarMenu.classList.toggle('active');
        }
    </script>
</body>
</html>
