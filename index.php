<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jesselball Sports Centre</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<style>
    /* General Styles */
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

    .hero {
        padding: 40px 20px;
        background-image: url("assets/bgjb.jpeg");
        background-size: cover;
        background-position: center;
        height: 800px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: #ffffff;
        position: relative;
    }

    .hero::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.9);
    }

    .hero div {
        position: relative;
        z-index: 1;
    }

    .hero h2 {
        font-size: 48px;
        margin: 0;
    }

    .hero p {
        font-size: 24px;
        margin: 10px 0 20px;
    }

    .hero .button {
        padding: 15px 30px;
        font-size: 18px;
        background-color: #ffcc00;
        color: #b30000;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .hero .button:hover {
        background-color: #e6b800;
    }

    .slideshow-container {
        /* padding: 40px 20px; */
        position: relative;
        max-width: 100%;
        margin: auto;
        background: rgba(255, 255, 255, 0.3);
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(255, 255, 255, 0.3);
        overflow: hidden;
    }

    .slides {
        display: none;
    }

    .slides img {
        width: 100%;
        height: 400px;
        object-fit: cover;
    }

    .prev,
    .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -22px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
    }

    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    .prev:hover,
    .next:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    .dot {
        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
    }

    .active,
    .dot:hover {
        background-color: #717171;
    }

    .fade {
        animation-name: fade;
        animation-duration: 1.5s;
    }

    @keyframes fade {
        from {
            opacity: 0.4;
        }

        to {
            opacity: 1;
        }
    }

    .section {
        padding: 40px 20px;
        text-align: center;
        background-color: #b30000;
        color: #ffffff;
    }

    .section h2 {
        font-size: 36px;
        margin-bottom: 20px;
    }

    .section p {
        font-size: 18px;
        margin-bottom: 40px;
    }

    .features {
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
    }

    .feature {
        width: 30%;
        margin-bottom: 20px;
    }

    .feature i {
        font-size: 50px;
        color: #212222;
        margin-bottom: 20px;
    }

    .feature h3 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    .booking {
        padding: 40px 20px;
        background-color: #ffffff;
        text-align: center;
    }

    .booking h2 {
        font-size: 36px;
        margin-bottom: 20px;
        color: #b30000;
    }

    .booking p {
        font-size: 18px;
        margin-bottom: 20px;
        color: #666666;
    }

    .booking .button {
        padding: 15px 30px;
        font-size: 18px;
        background-color: #ffcc00;
        color: #b30000;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .booking .button:hover {
        background-color: #e6b800;
    }

    .events {
    padding: 40px 20px;
    background-color: #f4f4f4;
    text-align: center;
}

.events h2 {
    font-size: 36px;
    margin-bottom: 20px;
    color: #333333;
}

.event-list {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
}

.event {
    width: 45%;
    background-color: #ffffff;
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 5px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: left;
}

.event h3 {
    font-size: 24px;
    margin-bottom: 10px;
    color: #b30000;
}

.event p {
    font-size: 16px;
    color: #666666;
    margin-bottom: 10px;
}

.event img {
    width: 100%; /* Make the image take the full width */
    height: auto; /* Maintain aspect ratio */
    max-height: 200px; /* Set a max height to prevent overflow */
    object-fit: cover; /* Ensure image covers the area */
    border-radius: 5px;
    margin-bottom: 10px;
}


    .testimonials {
        padding: 40px 20px;
        text-align: center;
        background-color: #ffffff;
    }

    .testimonials h2 {
        font-size: 36px;
        margin-bottom: 20px;
        color: #b30000;
    }

    .testimonial {
        margin-bottom: 40px;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        opacity: 0;
        transform: translateY(50px);
        transition: opacity 0.6s ease, transform 0.6s ease;
    }

    .testimonial.animated {
        opacity: 1;
        transform: translateY(0);
    }

    .testimonial p {
        font-size: 18px;
        line-height: 1.6;
        margin-bottom: 10px;
        color: #333333;
    }

    .testimonial em {
        font-style: italic;
        color: #666666;
    }

    footer {
        padding: 20px 20px;
        background-color: #b30000;
        color: #ffffff;
        text-align: center;
        position: relative;
        bottom: 0;
        width: 100%;
        box-sizing: border-box;
    }

    footer .social {
        margin-bottom: 20px;
    }

    footer .social a {
        color: #ffffff;
        font-size: 24px;
        margin: 0 10px;
        transition: color 0.3s;
    }

    footer .social a:hover {
        color: #ffcc00;
    }

    footer p {
        font-size: 14px;
        margin: 0;
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
        @media (max-width: 768px) {
            .navbar ul 
        .features,
        .event-list {
            flex-direction: column;
        }

        .feature,
        .event {
            width: 100%;
        }
    }

    .card-img-top {
        transition: transform 0.5s;
    }
    .card-img-top:hover {
        transform: scale(1.1);
    }

    .gallery h2{
        font-size: 36px;
        margin-bottom: 40px;
        color: #b30000;
        text-align: center;
        padding: 40px;
    }

.fade:not(.show) {
    opacity: 1 !important;
}

</style>

</head>
<body>
<header>
    <div class="navbar">
        <h1>JesselBall Sport Centre</h1>
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


    <div class="hero">
        <div>
            <h2>Welcome to JesselBall Pearl City Sports Centre</h2>
            <p>Reserve your spot for futsal, badminton, and more!</p>
            <button class="button" onclick="location.href='BookCourt.php'">Book Now</button>
        </div>
    </div>

    <div class="slideshow-container" id="slideshow-container">
        <!-- Slides will be inserted here by JavaScript -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>
    <div style="text-align:center" id="dots-container">
        <!-- Dots will be inserted here by JavaScript -->
    </div>

    <section class="section" id="facilities">
        <h2>Type of sports</h2>
        <p>We provide top-notch facilities for your favorite sports.</p>
        <div class="features">
            <div class="feature">
                <i class="fas fa-futbol"></i>
                <h3>Futsal Courts</h3>
                <p>Indoor and outdoor futsal courts with the best turf.</p>
            </div>
            <div class="feature">
                <i class="fas fa-table-tennis"></i>
                <h3>Badminton Courts</h3>
                <p>Professional-grade courts for all your badminton needs.</p>
            </div>
           
        </div>
    </section>
    
    <section class="gallery" id="gallery">

    
        <h2>Gallery</h2>
        <div class="container">
            <div class="row" id="gallery-row">
               
            </div>
        </div>
    </section>

    <section class="booking" id="booking">
        <h2>Book now!!</h2>
        <p> Book now to secure Access Our Premium Facilities.</p>
        <button class="button" onclick="location.href='BookCourt.php'">Book Now</button>
    </section>

    <section class="events" id="events">
    <h2>Upcoming Events and news</h2>
    <div class="event-list">
        <?php
        $events = include 'show_events.php';

        if (!empty($events)) {
            foreach ($events as $event) {
                echo '<div class="event">';
                echo '<img src="data:' . $event['image_type'] . ';base64,' . base64_encode($event['image']) . '" alt="Event Image">';
                echo '<h3>' . htmlspecialchars($event['title']) . '</h3>';
                echo '<p>Date: ' . htmlspecialchars($event['date']) . '</p>';
                echo '<p>Time: ' . htmlspecialchars($event['time']) . '</p>';
                echo '<p>' . htmlspecialchars($event['description']) . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p>No upcoming events found.</p>';
        }
        ?>
    </div>
</section>


    <section class="testimonials" id="testimonials">
        <h2>Testimonials: The Jesselball Advantage!</h2>
        <div class="testimonial">
            <p>"Jesselball offers a range of courts, including different types for futsal, allowing players to enjoy diverse formats of the game"</p>
            <p><em>Discover the Ultimate Sports Experience at Jesselball!</em></p>
        </div>
        <div class="testimonial">
            <p>"The venues feature well-maintained badminton courts, ensuring a great playing experience for enthusiasts of all levels.."</p>
            <p><em>Join the Action: Jesselball's Best Courts Await You!</em></p>
        </div>
    </section>

    <footer>
        <p> Contact us for further inquiries !! </p>
        <div class="social">
            <a href="https://wa.me/+60134832222" target="_blank"><i class="fab fa-whatsapp"></i></a>
            <a href="https://www.facebook.com/JesselballSportsCentreSB/"><i class="fab fa-facebook"></i></a>
            <a href="https://www.instagram.com/jesselball/"><i class="fab fa-instagram"></i></a>
        </div>
        <p>&copy; 2024 Jesselball Sports Centre. All rights reserved.</p>
    </footer>

    <script>
document.addEventListener("DOMContentLoaded", function() {
            // Fetch and display slideshow images
            fetch('fetch_images.php')
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        console.error(data.error);
                    } else {
                        document.getElementById('slideshow-container').insertAdjacentHTML('afterbegin', data.slides);
                        document.getElementById('dots-container').innerHTML = data.dots;
                        showSlides(slideIndex);
                        startSlideShow();
                    }
                });

            // Fetch and display gallery images
            fetch('fetch_gallery_images.php')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('gallery-row').innerHTML = data;
                })
                .catch(error => console.error('Error fetching gallery images:', error));
        });

        let slideIndex = 1;
        let slideInterval;

        function initializeSlides() {
    showSlides(slideIndex);
    startSlideShow();
}

// Function to display the slide at index n
function showSlides(n) {
    let slides = document.getElementsByClassName("slides");
    let dots = document.getElementsByClassName("dot");
    
    // Loop back to the first slide if n exceeds the number of slides
    if (n > slides.length) { slideIndex = 1 }
    // Loop to the last slide if n is less than 1
    if (n < 1) { slideIndex = slides.length }
    
    // Hide all slides
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    
    // Remove the active class from all dots
    for (let i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    
    // Show the current slide and add the active class to the corresponding dot
    if (slides.length > 0) {
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
    }
}

// Function to change slides by n steps
function plusSlides(n) {
    clearInterval(slideInterval); // Stop the automatic slideshow
    showSlides(slideIndex += n); // Update the slide index and show the new slide
    startSlideShow(); // Restart the automatic slideshow
}

// Function to show the slide corresponding to the clicked dot
function currentSlide(n) {
    clearInterval(slideInterval); // Stop the automatic slideshow
    showSlides(slideIndex = n); // Set the slide index to n and show the new slide
    startSlideShow(); // Restart the automatic slideshow
}

// Function to start the automatic slideshow
function startSlideShow() {
    slideInterval = setInterval(() => {
        showSlides(slideIndex += 1); // Move to the next slide every 5 seconds
    }, 5000); // Change image every 5 seconds
}

        document.querySelector('.slideshow-container').addEventListener('mouseenter', () => {
            clearInterval(slideInterval);
        });

        document.querySelector('.slideshow-container').addEventListener('mouseleave', () => {
            startSlideShow();
        });

        function toggleMenu() {
            let navbarMenu = document.getElementById('navbar-menu');
            navbarMenu.classList.toggle('active');
        }

        function isInViewport(element) {
            const rect = element.getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
        }

        function animateTestimonials() {
            const testimonials = document.querySelectorAll('.testimonial');
            testimonials.forEach(testimonial => {
                if (isInViewport(testimonial)) {
                    testimonial.classList.add('animated');
                }
            });
        }

        animateTestimonials();
        window.addEventListener('scroll', animateTestimonials);

        function animateGallery() {
            const galleryImages = document.querySelectorAll('.gallery .card-img-top');
            galleryImages.forEach(image => {
                if (isInViewport(image)) {
                    image.classList.add('animated', 'zoomIn');
                }
            });
        }

        animateGallery();
        window.addEventListener('scroll', () => {
            animateTestimonials();
            animateGallery();
        });
    </script>
</body>
</html>
