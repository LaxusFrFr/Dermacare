<?php
$host = "localhost";
$db_name = "dermacareadmin";
$username = "dermacare";
$password = "dermatologists";
$con = mysqli_connect($host, $username, $password, $db_name);
$query = "SELECT * FROM feedback";
$data = mysqli_query($con, $query);
$links = mysqli_fetch_all($data, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width" initial-scale=1.0>
    <title>Home | Dermacare</title>
    <link rel="icon" href="images/B2.ico" type="image/dermacare-icon">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <header>
        <div class="logo-container">
            <a href="index.php" class="logo">
                <img src="images/B2.png" alt="Logo Image" width="60" height="60">
                <span class="logo-text">D</span>erma<span>c</span>are
            </a>
        </div>
        <ul class="navigation">
            <li><a href="#banner" style="color: white;">Home</a></li>
            <li><a href="#features" style="color: white;">Services</a></li>
            <li><a href="#explore" style="color: white;">Explore</a></li>
            <li><a href="#about" style="color: white;">About</a></li>
            <li><a href="#reviews" style="color: white;">Reviews</a></li>
            <li><a href="#footer" style="color: white;">Follow Us!</a></li>
        </ul>
    </header>
    <style>
        body {
            margin: 0; /* Remove default margin */
            font-family: Arial, sans-serif; /* Set a default font */
        }
        header {
            display: flex; /* Use flexbox for alignment */
            align-items: center; /* Center items vertically */
            padding: 8px; /* Adjust padding for spacing */
            background-color: transparent; /* Make the background transparent */
        }
        .logo-container {
            display: flex; /* Flexbox for logo alignment */
            align-items: center; /* Center items vertically */
            margin-right: auto; /* Push navigation to the right */
        }
        .logo {
            text-decoration: none; /* No underline on the link */
            display: flex; /* Use flexbox for logo alignment */
            align-items: center; /* Center items vertically */
            color: #fff; /* Logo text color */
            margin-left: 10px;
        }
        .logo-text {
            color: #ff0157; /* Color for the 'D' in the logo */
            font-weight: 700; /* Bold text */
            font-size: 1.3em; /* Font size */
            margin-left: 5px; /* Space between logo image and text */
        }
        .navigation {
            list-style: none; /* Remove bullet points */
            display: flex; /* Use flexbox for navigation items */
            margin: 0; /* Remove margin */
            padding: 0; /* Remove padding */
        }
        .navigation li {
            margin-left: 0px; /* Spacing between navigation items */
            margin-right: 20px; /* Move text items slightly to the left */
        }
        .navigation a {
            text-decoration: none; /* No underline */
            color: white; /* Text color */
            transition: color 0.3s; /* Smooth transition for hover */
        }
        .navigation a:hover {
            color: #ff0157; /* Change color on hover */
        }
        .mini-player {
            position: fixed;
            right: 20px;
            bottom: 10px;
            width: 450px;
            display: none;
            z-index: 1000;
            cursor: move; /* Change cursor to indicate draggable */
        }
        .mini-player video {
            width: 100%;
            border-radius: 10px 10px 0 0;
        }
        .reviews {
            position: relative;
            overflow: hidden;
            width: 100%;
            max-width: 1520px; /* Adjust as needed */
            margin: auto;
            min-height: 750px; /* Set a minimum height */
            background-size: cover; /* Adjusts the image to cover the entire area */
            background-position: center; /* Centers the image */
        }
        .slider-container {
            position: relative;
            overflow: hidden; /* Hide overflow for the sliding effect */
            width: 100%;
            margin: auto;
        }
        .slider {
            display: flex;
            position: relative;
        }
        .slides {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }
        .slides img {
            width: 100%; /* Ensure each image takes full width */
            height: auto;
            display: block;
            flex-shrink: 0; /* Prevent images from shrinking */
            max-width: none; /* Disable max width to allow full coverage */
        }
        .arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.5);
            border: none;
            cursor: pointer;
            font-size: 30px;
            z-index: 1000;
        }
        .feedback-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 20px;
            margin-top: 20px;
        }
/* Dermacare Feedback Box */
        .feedback-box {
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            padding: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .feedback-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }
        .imgbx {
            text-align: center;
            margin-bottom: 20px;
        }
        .imgbx img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #ddd;
        }
        .text {
            text-align: center;
        }
        h3 {
            font-size: 20px;
            color: #333;
            margin: 10px 0;
        }
        .testimonial {
            font-size: 14px;
            color: #777;
            line-height: 1.6;
            margin-bottom: 15px;
        }
        .patient-name {
            font-size: 16px;
            color: #333;
            font-weight: bold;
        }
        .feedback-box:not(:last-child) {
            margin-bottom: 20px;
        }
/* Responsive Design */
        @media (max-width: 768px) {
        .feedback-container {
            flex-direction: column;
            align-items: center;
        }
        .feedback-box {
            width: 80%;
        }
        }
        .services-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* Ensures 3 items per row */
            gap: 30px; /* Spacing between items */
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            grid-template-rows: auto; /* Ensures automatic row height */
        }
        .service-item {
            background-color: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center; 
        }
        .service-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15)
        }
        .image-container {
            height: 300px;
            overflow: hidden;
            border-radius: 12px 12px 0 0;
        }
        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        .service-item:hover .image-container img {
            transform: scale(1.05); /* Slight zoom-in effect */
        }
        .service-text {
            padding: 20px;
        }
        .service-text h3 {
            font-size: 1.25rem;
            font-weight: 600;
            color: #333;
            text-transform: uppercase;
            margin: 0;
            letter-spacing: 1px;
        }
/* Modal style */
.map-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent dark background */
    display: none; /* Initially hidden */
    z-index: 9999; /* Ensure it is on top of other content */
    justify-content: center;
    align-items: center;
}

/* Modal content style (white background) */
.map-modal-content {
    background-color: white; /* White background */
    border-radius: 10px;
    padding: 20px;
    width: 80%;
    height: 600px;
    max-width: 800px;
    position: relative;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5); /* Soft shadow for a 3D effect */
}

/* Close button style */
.close-btn {
    position: absolute;
    top: 10px;
    right: 20px;
    color: black; /* Black color for close button */
    font-size: 30px;
    cursor: pointer;
}

.close-btn:hover {
    color: #ff0157; /* Color change on hover */
}
/* Responsive Design */
        @media screen and (max-width: 1200px) {
        .services-container {
            grid-template-columns: repeat(2, 1fr); /* 2 items per row for medium screens */
        }
        }
        @media screen and (max-width: 768px) {
        .services-container {
            grid-template-columns: 1fr; /* 1 item per row for small screens */
    }
}
    </style>
</body>
    </header>
    <section class="banner" id="banner">
        <div class="content">
            <h2> <span id="typing-text"></span>
                <span id="cursor">|</span>
            </h2>
            <a href="signup.php" class="btn">Sign Up</a>
            <a href="login.php" class="btn">Sign In</a>
        </div>
    </section>
    <section class="about" id="about" style="margin-bottom: 1; padding-bottom: 1; background-color: #f7f3f3">
       <div class="row">
    <div class="col50">
        <h2 class="titleText"><span>A</span>bout</h2>
        <p style="font-size: 1.0em; text-align: justify;">Dermacare Philippines is a dermatology and skincare clinic that offers a variety of beauty and skin care procedures. Treatments for acne, skin rejuvenation, anti-aging, and other cosmetic procedures are frequently included in their services. The primary objectives of Dermacare are Skin Health Improvement, which aims to enhance the overall health and appearance of the skin through customized treatments, and Customer Education, which teaches customers about appropriate skincare routines and the best ways to maintain the health of their skin. The third is Personalized Products, which involves providing each customer with customized skincare products that specifically address their needs.<br><br>Dermacare offers three different solutions: Booking, which involves scheduling appointments for professional evaluations of skin conditions and recommendations for suitable treatments; Advanced Treatments, which include a range of procedures like chemical peels, laser therapy, and injectables to address specific skin issues; and Skincare Products, featuring premium items that promote continued skin health and complement their therapies. In general, Dermacare aims to empower its clients by effectively treating their skin concerns and assisting them in achieving their ideal skin goals.</p>
            </div>
            <div class="col50">
                <div class="imgBx">
                    <img src="images/giphy (1).gif" style="width: 700px; height: 550px;">
                </div>
            </div>
        </div>
    </section>
   <!-- Add Mini Player HTML -->
   <div id="mini-player" class="mini-player">
    <video id="video" controls muted>
        <source src="video/Dermacare.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>
<script type="text/javascript">
    window.onload = function() {
        const miniPlayer = document.getElementById("mini-player");
        miniPlayer.style.display = "block"; // Show the mini player
        const video = document.getElementById("video");
        // Attempt to play the video automatically
        video.play().catch((error) => {
            console.log('Autoplay failed:', error);
        });
    };
</script>
</div>
    </div>
    <section class="features " id="features" style="margin-top: 0; padding-top: 0; background-color: #f7f3f3">
        <div class="title">
        </div>
        <!-- Service content here... -->
    </section>
    <script type="text/javascript">
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            header.classList.toggle("sticky", window.scrollY > 0);
        });
        const text = "Connect with Confidence and Embrace Expert Care for Your Unique Skin Needs.";
        const typingText = document.getElementById("typing-text");
        const cursor = document.getElementById("cursor");
        let isCursorVisible = true;
        let isTypingComplete = false;
        function toggleCursor() {
            cursor.style.visibility = isCursorVisible ? "visible" : "hidden";
            isCursorVisible = !isCursorVisible;
        }
        function typeWriter(text, i) {
            if (i < text.length) {
                typingText.innerHTML += text.charAt(i);
                setTimeout(function() {
                    typeWriter(text, i + 1);
                }, 50);
            } else {
                isTypingComplete = true;
                toggleCursor();
            }
        }
        setInterval(function() {
            if (isTypingComplete) {
                cursor.style.visibility = "hidden";
            } else {
                toggleCursor();
            }
        }, 500);
        typeWriter(text, 0);
        // Show mini player on load
        window.onload = function() {
            const miniPlayer = document.getElementById("mini-player");
            miniPlayer.style.display = "block"; // Show the mini player
            const video = document.getElementById("video");
            video.play(); // Play the video automatically
        };
    </script>
    <section class="features " id="features" style="margin-top: 0; padding-top: 0; background-color: #f7f3f3">
        <div class="title">
            <h2 class="titleText"><span>S</span>ervices</h2>
            <div class="services-container">
    <div class="service-item">
        <div class="image-container">
            <img src="images/1.png" alt="Acne Treatment">
        </div>
        <div class="service-text">
            <h3>Acne Treatment</h3>
        </div>
    </div>
    <div class="service-item">
        <div class="image-container">
            <img src="images/2.png" alt="Angel White Facial">
        </div>
        <div class="service-text">
            <h3>Angel White Facial</h3>
        </div>
    </div>
    <div class="service-item">
        <div class="image-container">
            <img src="images/3.png" alt="Underarm Combo">
        </div>
        <div class="service-text">
            <h3>Underarm Combo</h3>
        </div>
    </div>
    <div class="service-item">
        <div class="image-container">
            <img src="images/4.png" alt="Facial & Massage">
        </div>
        <div class="service-text">
            <h3>Facial & Massage</h3>
        </div>
    </div>
    <div class="service-item">
        <div class="image-container">
            <img src="images/5.png" alt="Cinderella Drip">
        </div>
        <div class="service-text">
            <h3>Cinderella Drip</h3>
        </div>
    </div>
    <div class="service-item">
        <div class="image-container">
            <img src="images/6.png" alt="Rejuvenate & Massage">
        </div>
        <div class="service-text">
            <h3>Rejuvenate & Massage</h3>
        </div>
    </div>
</div>
                </div>
            </div>
        </div>
        <!-- <div class="title">		
			<a href="#" class="btn">View All </a>
		</div> -->
        </section>
    <section class="explore" id="explore">
        <div class="title white">
            <h2 class="titleText" style="color: black;"><span>E</span>xplore</h2>
    <div class="slider-container">
        <div class="slider">
            <div class="slides">
                <img src="images/D3.jpg" alt="Photo 1">
                <img src="images/D1.png" alt="Photo 2">
                <img src="images/D2.jpg" alt="Photo 3">
                <img src="images/D6.png" alt="Photo 4">
                <img src="images/D5.jpg" alt="Photo 5">
                <img src="images/D4.jpg" alt="Photo 6">
                <img src="images/D7.png" alt="Photo 7">
    </section>
    <section class="reviews" id="reviews">
        <div class="title white">
            <h2 class="titleText" style="color: black;"><span>R</span>eviews</h2>
        </div>
        <div class="content"> <?php foreach ($links as $link) { ?> <div class="feedback-box">
                <div class="imgbx"> <?php if(!empty($link['picture'])){ ?> <img src="data:<?php echo $link['picture_type'] ?>;base64,<?php echo base64_encode($link['picture']); ?>"> <?php }
					else{ ?> <img src="images/default2.png"> <?php } ?> </div>
                <div class="text">
                    <h3><?php echo $link['stars'] ?> ★</h3>
                    <p style="color: gray;"><?php echo $link['message']; ?></p>
                    <h3><?php echo $link['name'] ?></h3>
                </div>
            </div> <?php } ?>
    </section>
    <!-- Footer -->
    <footer class="text-center text-lg-start text-white" id="footer" style="background-color: #1c2331">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-between p-4" style="background-color: #ff0157; width: 100%; padding: 10px; ">
            <!-- Left -->
            <div class="social-container" style=" display: flex; align-items: center; justify-content: space-between;">
                <div class="me-5" style="color: white; font-weight: 100; font-size: 1.1em; margin-left: 10px;">
                    <h5>Get in touch with us via our social media accounts:</h5>
                </div>
                <!-- Left -->
                <!-- Right -->
                <div class="social-icons" style="display: flex; justify-content: flex-end;">
                    <a href="https://www.facebook.com/dermacaretanauanofficial/" class="mb-4 mt-0" style="color: white; text-decoration: none; margin-right: 30px;">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://www.instagram.com/dermacareph/?hl=en" class="mb-4 mt-0" style="color: white; text-decoration: none; margin-right: 30px;">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://www.tiktok.com/@dermacaretanauanofficial" class="mb-4 mt-0" style="color: white; text-decoration: none; margin-right: 30px;">
                        <i class="fab fa-tiktok"></i>
                    </a>
                    <a href="https://www.youtube.com/@dermacarefacebodyandlaserc7154" class="mb-4 mt-0" style="color: white; text-decoration: none; margin-right: 30px;">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->
        <!-- Section: Links  -->
        <section class="" style="height: 290px; padding-top: 40px;">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4 ml-auto" style="padding: 20px; flex: 1;">
                        <!-- Content -->
                        <h2 class="text-uppercase fw-bold" style="color: white;">Dermacare</h2>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 138px; background-color: #7c4dff; height: 2px" />
                        <img src="images/B2.png" alt="Dermacare Image" style="width: 135px; height: 135px;">
                    </div>
                    <!-- Grid column -->
                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4" style="padding: 20px; flex: 1;">
                        <!-- Links -->
                        <h2 class="text-uppercase fw-bold" style="color: white;">Tanauan City</h2>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 167px; background-color: #7c4dff; height: 2px" />
                        <p>
                        <h5 class="text-white" style="color: white;">Face</h5>
                        </p>
                        <br>
                        <p>
                        <h5 class="text-white " style="color: white;">Body</h5>
                        </p>
                        <br>
                        <p>
                        <h5 class="text-white" style="color: white;">Laser Center</h5>
                        </p>
                        <br>
                        <p>
                        <h5 class="text-white" style="color: white;">#AlagangDermacare</h5>
                        </p>
                    </div>
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4" style="padding: 20px; flex: 1;">
                        <!-- Links -->
                        <h2 class="text-uppercase fw-bold" style="color: white;">Useful Links</h2>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 145px; background-color: #7c4dff; height: 2px" />
                        <h5>
                            <p>
                                <a href="#banner" class="text-white" style="color: white; text-decoration: none;">Sign up/Sign in</a>
                            </p>
                            <br>
                            <p>
                                <a href="#about" class="text-white" style="color: white; text-decoration: none;">About</a>
                            </p>
                            <br>
                            <p>
                                <a href="#features" class="text-white" style="color: white; text-decoration: none;">Services</a>
                            </p>
                            <br>
                            <p>
                                <a href="#reviews" class="text-white" style="color: white; text-decoration: none;">Reviews</a>
                            </p>
                        </h5>
                    </div>
                    <!-- Grid column -->
                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4" style="padding: 20px; flex: 1;">
                        <!-- Links -->
                        <h2 class="text-uppercase fw-bold" style="color: white;">Contact</h2>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 102px; background-color: #7c4dff; height: 2px" />
                        <h5>
                            <p style="color: white;"><i class="fas fa-home mr-3"></i> 2nd Floor Victory Mall & Market Tanauan, A. Mabini St., Tanauan Batangas</p><br>
                            <p style="color: white;"> <i class="fas fa-envelope mr-3"></i>  dermacaretanauan@gmail.com</p><br>
                            <p style="color: white;"><i class="fas fa-phone mr-3"></i> + 0969 456 8854</p><br>
                            <!-- Visit Us Button -->
                           <!-- Visit Us Button with smaller text and button size -->
<button id="visit-us-btn" class="btn btn-primary" style="background-color: #ff0157; border-color: white; color: white; font-size: 0.9em; 
    width: 140px; height: 40px; margin-top: 0px; margin-bottom: 0px; margin-left: 0px; margin-right: 10px;">
    Visit Us
</button>                
</button>
<!-- Modal (Hidden by default) -->
<div id="map-modal" class="map-modal" style="display: none;">
    <div class="map-modal-content">
        <span class="close-btn" id="close-btn">&times;</span>
        <h2 class="text-uppercase fw-bold" style="color: black;">Google Maps</h2>

        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 138px; background-color: #7c4dff; height: 2px" />
        <!-- Embed Google Map -->
        <iframe 
            id="google-map"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3870.1308043633846!2d121.1465777!3d14.083469!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd6f53d3ee52c9%3A0x8ab9f1073983356!2sVictory+Mall+and+Market+Tanauan!5e0!3m2!1sen!2sph!4v1695151523107!5m2!1sen!2sph"
            width="100%" height="520" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>

                        </h5>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2); padding: 15px; ">
            <span style="color: white; display: block; text-align: center;">2024 Capstone, <a class="text-white" href="#" style="color: white; ">dermacare.com.ph</a></span>
            <span style="color: white; display: block; text-align: center;">Design & Development by Dermacare
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
    </div>
    <script type="text/javascript">
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            header.classList.toggle("sticky", window.scrollY > 0);
        });
        // JavaScript code to create the typing effect with a blinking cursor
        const text = "Connect with Confidence and Embrace Expert Care for Your Unique Skin Needs.";
        const typingText = document.getElementById("typing-text");
        const cursor = document.getElementById("cursor");
        let isCursorVisible = true;
        let isTypingComplete = false;
        function toggleCursor() {
            cursor.style.visibility = isCursorVisible ? "visible" : "hidden";
            isCursorVisible = !isCursorVisible;
        }
        function typeWriter(text, i) {
            if (i < text.length) {
                typingText.innerHTML += text.charAt(i);
                setTimeout(function() {
                    typeWriter(text, i + 1);
                }, 50); // Adjust the speed of typing by changing the timeout value
            } else {
                isTypingComplete = true;
                toggleCursor(); // Show the cursor after typing is complete
            }
        }
        setInterval(function() {
            if (isTypingComplete) {
                cursor.style.visibility = "hidden"; // Hide the cursor after typing is complete
            } else {
                toggleCursor();
            }
        }, 500); // Make the cursor blink every 500ms
        typeWriter(text, 0);
    </script>
</body>
<script>
    const miniPlayer = document.getElementById('mini-player');
    let isDragging = false;
    let offset = { x: 0, y: 0 };
    miniPlayer.addEventListener('mousedown', (e) => {
        isDragging = true;
        offset.x = e.clientX - miniPlayer.getBoundingClientRect().left;
        offset.y = e.clientY - miniPlayer.getBoundingClientRect().top;
        miniPlayer.style.transition = 'none'; // Disable transition during drag
    });
    document.addEventListener('mouseup', () => {
        isDragging = false;
        miniPlayer.style.transition = ''; // Re-enable transition after drag
    });
    document.addEventListener('mousemove', (e) => {
        if (isDragging) {
            // Calculate new position
            const newX = e.clientX - offset.x;
            const newY = e.clientY - offset.y;
            // Update position with boundary checks
            miniPlayer.style.left = `${Math.max(0, Math.min(window.innerWidth - miniPlayer.offsetWidth, newX))}px`;
            miniPlayer.style.top = `${Math.max(0, Math.min(window.innerHeight - miniPlayer.offsetHeight, newY))}px`;
        }
    });
    // Get the modal
    var modal = document.getElementById("map-modal");

    // Get the button that opens the modal
    var btn = document.getElementById("visit-us-btn");

    // Get the <span> element that closes the modal
    var closeBtn = document.getElementById("close-btn");

    // When the user clicks the "Visit Us" button, open the modal
    btn.addEventListener("click", function() {
        modal.style.display = "flex"; // Show the modal
    });

    // When the user clicks on <span> (x), close the modal
    closeBtn.addEventListener("click", function() {
        modal.style.display = "none"; // Hide the modal
    });

    // Close the modal if the user clicks anywhere outside of the modal
    window.addEventListener("click", function(event) {
        if (event.target === modal) {
            modal.style.display = "none"; // Hide the modal
        }
    });
    let currentIndex = 0;
const slides = document.querySelectorAll('.slides img');
const totalSlides = slides.length;
function showSlide(index) {
    const offset = -index * (100); // Each image takes 100% of the width
    document.querySelector('.slides').style.transform = `translateX(${offset}%)`;
}
function moveSlide(direction) {
    currentIndex = (currentIndex + direction + totalSlides) % totalSlides;
    showSlide(currentIndex);
}
// Automatic sliding
setInterval(() => {
    moveSlide(1); // Move slide to the left
}, 4000); // Change slide every 4 seconds
// Initial display
showSlide(currentIndex);
</script>
</html>