<?php 

include('includes/header.php');




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href=".css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"> -->
    <title>Document</title>
</head>
<style>
	* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.about-us {
    padding: 80px 0;
}

.container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 20px;
}

.row {
    display: flex;
    flex-wrap: wrap;
    margin: -10px; /* Adjust for spacing */
}

.flex {
    flex: 0 0 50%;
    max-width: 50%;
    padding: 10px; /* Adjust for spacing */
}

.about-us h2 {
    font-size: 45px;
    margin-bottom: 20px;
    color: #333;
}

.about-us p {
    font-size: 18px;
    line-height: 1.5;
    color: #333;
    margin-bottom: 20px;
}

.about-us img {
    display: block;
    max-width: 100%;
    height: auto;
    margin: 0 auto;
}

.social-links {
    display: flex;
    gap: 10px; /* Space between icons */
    margin-bottom: 20px;
}

.social-links a {
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    text-align: center;
    border-radius: 50%;
    color: #fff;
    background-color: #333;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    transition: all 0.4s ease;
}

.social-links a:hover {
    transform: translateY(-3px);
}

.btn {
    text-decoration: none;
    color: #fff;
    display: inline-block;
    padding: 10px 20px;
    font-size: 18px;
    font-weight: bold;
    text-transform: uppercase;
    border-radius: 5px;
    background-color: #333;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    transition: all 0.4s ease;
}

.btn:hover {
    transform: translateY(-3px);
}

@media screen and (max-width: 786px) {
    .row {
        flex-direction: column;
    }

    .flex {
        max-width: 100%;
        padding: 0; /* Adjust spacing */
    }

    .about-us h2 {
        font-size: 31px;
    }

    .about-us p {
        font-size: 16px;
    }

    .social-links {
        gap: 5px; /* Adjust spacing */
    }

    .social-links a {
        width: 30px;
        height: 30px;
        line-height: 30px;
        font-size: 14px;
    }
}

</style>
<body>
    <?php
    include('config/db.php');
    $sql = "SELECT * FROM about";
    $result = mysqli_query($conn, $sql);

    // Check if there are any rows returned
    if (mysqli_num_rows($result) > 0) {
        echo '<div class="container py-5">';
        $count = 0; // Counter for number of cards in a row

        while ($row = mysqli_fetch_object($result)) {




      

?>
    <div class="about-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
				<img src="assets/images/img_bg_3.jpg" alt=""><br>
				</div>
                <div class=" col-lg-6">
				<h2>About Us</h2>
                    <!-- <h3>Our Mission</h3> -->
                    <p>"<?php echo $row->AboutUs?>"</p>
                    <div class="socaial-links">
                        <a href=""><i class="fa-brands fa-facebook"></i>
                        <a href=""><i class="fa-brands fa-twitter"></i></a>
                        <a href=""><i class="fa-brands fa-instagram"></i></a>
                     </div><br>
                     <a href="" class="btn">learn More</a>
                </div>
                
            </div>


			<div class="row">
               
                <div class=" col-lg-6">
				<h2>Who We Are
</h2>
                    <!-- <h3>Our Mission</h3> -->
                    <p>"<?php echo $row->WhoWeAre?>"</p>
                    <div class="socaial-links">
                        <a href=""><i class="fa-brands fa-facebook"></i>
                        <a href=""><i class="fa-brands fa-twitter"></i></a>
                        <a href=""><i class="fa-brands fa-instagram"></i></a>
                     </div><br>
                     <a href="" class="btn">learn More</a>
                </div>
				<div class="col-lg-6">
				<img src="assets/images/img_bg_1.jpg" alt=""><br>
				</div>
            </div>

			<div class="row">
                <div class="col-lg-6">
				<img src="assets/images/blog-1.jpg" alt=""><br>
				</div>
                <div class=" col-lg-6">
				<h2>Our Philosophy</h2>
                    <!-- <h3>Our Mission</h3> -->
                    <p>"<?php echo $row->OurPhilosophy?>"</p>
                    <div class="socaial-links">
                        <a href=""><i class="fa-brands fa-facebook"></i>
                        <a href=""><i class="fa-brands fa-twitter"></i></a>
                        <a href=""><i class="fa-brands fa-instagram"></i></a>
                     </div><br>
                     <a href="" class="btn">learn More</a>
                </div>
                
            </div>

			<div class="row">
               
                <div class=" col-lg-6">
				<h2>Our Expertise
</h2>
                    <!-- <h3>Our Mission</h3> -->
                    <p>"<?php echo $row->OurExpertise?>"</p>
                    <div class="socaial-links">
                        <a href=""><i class="fa-brands fa-facebook"></i>
                        <a href=""><i class="fa-brands fa-twitter"></i></a>
                        <a href=""><i class="fa-brands fa-instagram"></i></a>
                     </div><br>
                     <a href="" class="btn">learn More</a>
                </div>
				<div class="col-lg-6">
				<img src="assets/images/video.jpg" alt="">
				</div>
            </div>
			<div class="row">
                <div class="col-lg-6">
				<img src="assets/images/img_bg_2.jpg" alt="">
				</div>
                <div class=" col-lg-6">
				<h2>Our Commitment
</h2>
                    <!-- <h3>Our Mission</h3> -->
                    <p>"<?php echo $row->OurCommitment?>"</p>
                    <div class="socaial-links">
                        <a href=""><i class="fa-brands fa-facebook"></i>
                        <a href=""><i class="fa-brands fa-twitter"></i></a>
                        <a href=""><i class="fa-brands fa-instagram"></i></a>
                     </div><br>
                     <a href="" class="btn">learn More</a>
                </div>
                
            </div>

        </div>
    </div>
    <?php
      }}

      ?>
 
 <footer id="colorlib-footer" role="contentinfo">
		<div class="containerrr">
			<div class="row row-pb-md">
				<div class="col-md-3 colorlib-widget">
					<h4>Lawfirm</h4>
					<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
				</div>
				<div class="col-md-3 col-md-push-1">
					<h4>Navigation</h4>
					<ul class="colorlib-footer-links">
						<li><a href="#">Home</a></li>
						<li><a href="#">Practice Areas</a></li>
						<li><a href="#">Won Cases</a></li>
						<li><a href="#">Blog</a></li>
						<li><a href="#">About us</a></li>
					</ul>
				</div>

				<div class="col-md-3 col-md-push-1">
					<h4>Contact Information</h4>
					<ul class="colorlib-footer-links">
						<li>198 West 21th Street, <br> Suite 721 New York NY 10016</li>
						<li><a href="tel://1234567920">+ 1235 2355 98</a></li>
						<li><a href="mailto:info@yoursite.com">info@yoursite.com</a></li>
					</ul>
				</div>

				<div class="col-md-3 col-md-push-1">
					<h4>Opening Hours</h4>
					<ul class="colorlib-footer-links">
						<li>Mon - Thu: 9:00 - 21 00</li>
						<li>Fri 8:00 - 21 00</li>
						<li>Sat 9:30 - 15: 00</li>
					</ul>
				</div>

			</div>

			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
					<small class="block">&copy; 2018 LawFirm. All Rights Reserved. Created by <a href="index1.php" target="_blank">Saim&Teams</a></small> 
					
					</p>
					<p>
						<ul class="colorlib-social-icons">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
				</div>
			</div>

		</div>
	</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="assets/js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="assets/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="assets/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="assets/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="assets/js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="assets/js/jquery.stellar.min.js"></script>
	<!-- Carousel -->
	<script src="assets/js/owl.carousel.min.js"></script>
	<!-- Flexslider -->
	<script src="assets/js/jquery.flexslider-min.js"></script>
	<!-- countTo -->
	<script src="assets/js/jquery.countTo.js"></script>
	<!-- Magnific Popup -->
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<script src="assets/js/magnific-popup-options.js"></script>
	<!-- Main -->
	<script src="assets/js/main.js"></script>

	</body>
</html>