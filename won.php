<?php
include_once 'includes/header.php';
include_once 'config/db.php';





?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Lawfirm Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="assets/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="assets/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="assets/css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="assets/css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="assets/css/flexslider.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="assets/css/style.css">

	<!-- Modernizr JS -->
	<script src="assets/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
<aside id="colorlib-hero" class="assets/js-fullheight">
		<div class="flexslider js-fullheight">
			<ul class="slides">
		   	<li style="background-image: url(assets/images/img_bg_1.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="col-md-10 col-md-offset-1 text-center js-fullheight slider-text">
		   				<div class="slider-text-inner desc">
		   					<h2 class="heading-section">Honors &amp; Awards</h2>
		   					
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		  	</ul>
	  	</div>
	</aside>
  

	<?php
$user_result = mysqli_query($conn, "SELECT * FROM lawyer_cases WHERE result = 'won'");
$count = 0; // Counter for tracking three items per row

while ($user = mysqli_fetch_object($user_result)):
    // Start a new row every three items
    if ($count % 3 == 0):
?>
<div class="container">
    <div class="row">
    <?php endif; ?>

        <div class="col-md-4 text-center animate-box">
            <div class="services "  style="height:250px;margin-top:30px;">
                <div class="desc">
                    <h3><a href="#"><?php echo $user->lawyer_name; ?></a></h3>
                    <p><?php echo $user->victory_speech; ?></p>
                    <strong>Result: <?php echo $user->result; ?></strong>
                </div>
            </div>
        </div>

    <?php
    // End row after every three items
   $count++;
   if ($count % 3 == 0 || $count == mysqli_num_rows($user_result)):
    ?>
    </div>
</div>
<?php endif; ?>
<?php endwhile; ?>




<div id="colorlib-testimonial" class="colorlib-bg-section">
    <div class="container">
        <div class="row animate-box">
            <div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
                <h2>What are the clients saying</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row animate-box">
                    <div class="owl-carousel owl-carousel-fullwidth">
                        <?php
                        $client_result = mysqli_query($conn, "SELECT * FROM clients");

                       while ($client = mysqli_fetch_object($client_result)):
                        ?>
                        <div class="item">
                            <div class="testimony-slide active text-center">
                                <span><?php echo $client->name; ?></span>
                                <blockquote>
                                    <p>&ldquo;<?php echo $client->review; ?>&rdquo;</p>
                                </blockquote>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
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


<?php
include 'includes/footer.php' ;
?>