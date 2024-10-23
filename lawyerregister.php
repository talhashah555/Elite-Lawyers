<?php

include('config/db.php'); // Include your database connection

if (isset($_POST['submit'])) {

    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $specialization = $_POST['speciality'];

    // Handle the file upload
    $target_dir = "assets/images/uploaded_img/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
sleep(3);
    // Check if file is an actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo '<script>alert("File is not an image.");</script>';
        $uploadOk = 0;
    }

    // Check file size (limit to 5MB)
    if ($_FILES["image"]["size"] > 5000000) {
        echo '<script>alert("Sorry, your file is too large.");</script>';
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo '<script>alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");</script>';
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo '<script>alert("Sorry, your file was not uploaded.");</script>';
    } else {
     // if everything is ok, try to upload file
if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    // Prepare the SQL statement with placeholders
    $sql = "INSERT INTO lawyers (name, email, image, type, password) VALUES (?, ?, ?, ?, ?)";
    // Create a prepared statement
    $stmt = mysqli_prepare($conn, $sql);
    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "sssss", $firstname, $email, $target_file, $specialization, $pass);
    // Execute the prepared statement
    $result = mysqli_stmt_execute($stmt);

    // Check if the query was executed successfully
    if ($result) {
        // Insert data into lawyer_register table
        $sql_register = "INSERT INTO lawyer_registers (firstname, email, password) VALUES (?, ?, ?)";
        $stmt_register = mysqli_prepare($conn, $sql_register);
        mysqli_stmt_bind_param($stmt_register, "sss", $firstname, $email, $pass);
        mysqli_stmt_execute($stmt_register);

        echo '<script>alert("Data inserted successfully");</script>';
        header('location:lawyerregister.php');
    } else {
        echo '<script>alert("Failed to insert data");</script>';
    }

    // Close the statements and database connection
    mysqli_stmt_close($stmt);
    mysqli_stmt_close($stmt_register);
    mysqli_close($conn);
}
    }
}
?>

<!-- Your HTML form remains unchanged -->

<?php
session_start();	
include 'config/db.php';
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
	  <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../assets/plugins/daterangepicker/daterangepicker.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../assets/plugins/summernote/summernote-bs4.min.css">

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
	<link rel="stylesheet" href="assets/fonts/flaticon/font/flaticon.css">

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
		
	<!-- <div class="colorlib-loader"></div> -->
	
	<div id="page">
	<nav class="colorlib-nav" role="navigation">
		<div class="top-menu">
			<div class="containerr">
				<div class="row">
					<div class="col-md-2">
						<div id="colorlib-logo"><a href="index1.html"><img src="assets/images/logo.png" alt="" height="100px" class="mb-5"></a></div>
					</div>
					<div class="col-md-10 text-right menu-1">
						<ul >
							<li class="active"><a href="index1.php">Home</a></li>
							<li><a href="lawyers.php">lawyers</a></li>
							<li><a href="won.php">Won Cases</a></li>
							<li class="has-dropdown">
								<a href="lawyerregister.php">Lawyer registeration</a>

							</li>
							<li><a href="about.php">About</a></li>
							<li><a href="login.php">Login</a></li>
							<li class="btn-cta"><a href="./user_profile.php"><span >    <?php
 
 if (isset($_SESSION['username'])) {
	 echo $_SESSION['username'];
 } else {
	 echo "Username"; 
 }
 ?></span></a></li>
							<!-- <li class="btn-cta"><a href="#"><span>Sign Up</span></a></li> -->
						</ul>
					</div>
				</div>
				
			</div>
		</div>
	</nav>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="assets/css/lawyerregister.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <style>
    /* ===== Google Font Import - Poppins ===== */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
body{
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #F0F0F0;
}
.containerr{
    position: relative;
    width: 90%;
    border-radius: 6px;
    padding: 30px;
    margin: 0 auto;
    background-color: #fff;
    box-shadow: 0 5px 10px rgba(0,0,0,0.1);
    height:100%;
}
.containerr header{
    position: relative;
    font-size: 20px;
    font-weight: 600;
    color: #333;
}
.containerr header::before{
    content: "";
    position: absolute;
    left: 0;
    bottom: -2px;
    height: 3px;
    width: 27px;
    border-radius: 8px;
    background-color: #4070f4;
}
.containerr form{
    position: relative;
    margin-top: 16px;
    min-height: 490px;
    background-color: #fff;
    overflow: hidden;
}
.containerr form .form{
    position: absolute;
    background-color: #fff;
    transition: 0.3s ease;
}


form.secActive .form.first{
    opacity: 0;
    pointer-events: none;
    transform: translateX(-100%);
}
.containerr form .title{
    display: block;
    margin-bottom: 8px;
    font-size: 16px;
    font-weight: 500;
    margin: 6px 0;
    color: #333;
}
.containerr form .fields{
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
}
form .fields .input-field{
    display: flex;
    width: calc(100% / 3 - 15px);
    flex-direction: column;
    margin: 4px 0;
}
.input-field label{
    font-size: 12px;
    font-weight: 500;
    color: #2e2e2e;
}
.input-field input, select{
    outline: none;
    font-size: 14px;
    font-weight: 400;
    color: #333;
    border-radius: 5px;
    border: 1px solid #aaa;
    padding: 0 15px;
    height: 42px;
    margin: 8px 0;
}
.input-field input :focus,
.input-field select:focus{
    box-shadow: 0 3px 6px rgba(0,0,0,0.13);
}
.input-field select,
.input-field input[type="date"]{
    color: #707070;
}
.input-field input[type="date"]:valid{
    color: #333;
}
.containerr form button, .backBtn{
    display: flex;
    align-items: center;
    justify-content: center;
    height: 45px;
    max-width: 200px;
    width: 100%;
    border: none;
    outline: none;
    color: #fff;
    border-radius: 5px;
    /* margin: 25px 0; */
    margin-bottom:200px;
    background-color: #4070f4;
    transition: all 0.3s linear;
    cursor: pointer;
}
.containerr form .btnText{
    font-size: 14px;
    font-weight: 400;
}
form button:hover{
    background-color: #265df2;
}
form button i,
form .backBtn i{
    margin: 0 6px;
}
form .backBtn i{
    transform: rotate(180deg);
}
form .buttons{
    display: flex;
    align-items: center;
}
form .buttons button , .backBtn{
    margin-right: 14px;
}

@media (max-width: 750px) {
    .containerr form{
        overflow-y: scroll;
    }
    .containerr form::-webkit-scrollbar{
       display: none;
    }
    form .fields .input-field{
        width: calc(100% / 2 - 15px);
    }
}

@media (max-width: 550px) {
    form .fields .input-field{
        width: 100%;
    }
}
</style>
    <title>lawyer Regisration Form </title> 
</head>
<body>

    <div class="containerr">
        <header>Lawyer Registration</header>

        <form action="#" onsubmit="openPopup()" method="post" role="form" enctype="multipart/form-data">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>First Name</label>
                            <input type="text" name="firstname" placeholder="first name" required>
                        </div>

                        <div class="input-field">
                            <label>Last Name</label>
                            <input type="text" name="lastname" placeholder="last name" required>
                        </div>

                        <div class="input-field">
                            <label>Email</label>
                            <input type="text" name="email" placeholder="Enter your email" required>
                        </div>

                        <div class="input-field">
                            <label>Mobile Number</label>
                            <input type="number" name="mobile_number" placeholder="Enter mobile number" required>
                        </div>

                        <div class="input-field">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Enter Password " required>

                        </div>

                        <div class="input-field">
                            <label>Image</label>
                            <input type="file" name="image" placeholder="Enter your ccupation" required>
                        </div>
                    </div>
                </div>

                <div class="details ID">
                    <span class="title">Educational Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>University/College Name</label>
                            <input type="text" name="institute" placeholder="Enter your institute" required>
                        </div>

                        <div class="input-field">
                            <label>Degree</label>
                            <input type="text" name="degree" placeholder="Enter your degree" required>
                        </div>

                        <div class="input-field">
                            <label>Passing Year</label>
                            <input type="text" name="passing_year" placeholder="Enter your passing year" required>
                        </div>

                        <div class="input-field">
                            <label>Address</label>
                            <input type="text" name="address" placeholder="Enter your address" required>
                        </div>

                        <div class="input-field">
                            <label>City</label>
                            <input type="text" name="city" placeholder="Enter your city" required>
                        </div>
						<div class="form-group">
						<label>speciality</label><br>

								<select id="practise" name="speciality" class="form-control">
									<option value=" " selected>Choose...</option>
									<option value="Criminal Lawyer">Criminal Lawyer</option>
									<option value="Civil Lawyer">Civil Lawyer</option>
									<option value="Divorce Lawyer">Divorce Lawyer</option>
									<option value="Affidavit Lawyer">Affidavit Lawyer</option>
									

								</select>
							</div>
                    
                    </div>
         

                    <button class="nextBtn" name="submit">
                        <span class="btnText" >submit</span>
                        <i class="uil uil-navigator"></i>
                    </button>
                </div> 
            </div>

         
    </div>

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


  
    </body>
</html>

<div class="popup" id="popup">
    <img src="assets/images/tick.png" alt="">
    <h2>Conratulations</h2>
    <p>The Request has Been Successfuly sent,When The admin Will approve you you will the parts of elite lawyers</p>
    <button type="button" onclick="closePopup()" >OK</button>
</div>

</div>




<script>


function openPopup() {
    popup.classList.add("open-popup");
   
 }
 function closePopup() {
    popup.classList.remove("open-popup");
   
 }
</script>
<style>
    .popup{
width: 400px;
background: #fff; 
border-radius: 6px;
position: absolute;
top: 0;
left: 50%;
transform: translate(-50%,-50%) scale(0.1);
text-align:center;
padding: 0 30px 30px;
color: #333;
visibility: hidden;
transition: transform 0.4s,top 0.4s;
}
.open-popup{
visibility: visible;
top: 50%;
transform: translate(-50%,-50%) scale(1);

}
.popup img{
 width: 100px;
 margin-top:-50px ;
 border-radius: 50%;
 box-shadow: 0 2px 5px rgba(0,0,0,0.2);
}
.popup h2{
 font-size:38px;
 font-weight: 500;
 margin: 30px 0 10px;

}
.popup button{
 width: 100%;
 margin-top: 50px;
 padding: 10px 0;
 background: #6fd649;
 color: #fff;
 border: 0;
 outline: none;
 font-size: 18px;
 border-radius: 4px;
 cursor: pointer;
 box-shadow: 0 2px 5px rgba(0,0,0,0.2);


}
</style>