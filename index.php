<?php
session_start(); // Start session at the beginning

include('config/db.php'); // Include your database connection

if(isset($_POST['sign-up'])){
    $fname = $_POST['fname'];
    $username = $_POST['username'];
    $lname = $_POST['lname'];
    $email = $_POST['emaill']; // Corrected variable name
    $hashed_password = password_hash($_POST['passwordd'], PASSWORD_DEFAULT);
    

    // Check if the email already exists
    $check_query = "SELECT * FROM client_registers WHERE email = ?";
    $check_stmt = mysqli_prepare($conn, $check_query);
    mysqli_stmt_bind_param($check_stmt, "s", $email);
    mysqli_stmt_execute($check_stmt);
    $check_result = mysqli_stmt_get_result($check_stmt);
   

    // Additional validation (e.g., email format validation)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
sleep(1);
    
      // Process image upload if exists
$image = null;
if (isset($_FILES['profile_image']) && $_FILES['profile_image']['size'] > 0) {
    $image = $_FILES['profile_image']['name'];
    $image_tmp_name = $_FILES['profile_image']['tmp_name'];
    $image_folder = 'assets/images/uploaded_img/' . $image;

    // Validate image
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    $detected_type = mime_content_type($image_tmp_name);
    if (in_array($detected_type, $allowed_types)) {
        if (move_uploaded_file($image_tmp_name, $image_folder)) {
            // Image uploaded successfully
        } else {
            $errors[] = 'Failed to upload image.';
        }
    } else {
        $errors[] = 'Invalid image type.';
    }
}

// Include image in the SQL query
$query = "INSERT INTO client_registers (username, First_name, Last_name, email, password, image) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "ssssss", $username, $fname, $lname, $email, $hashed_password, $image);
$result = mysqli_stmt_execute($stmt);

        if($result) {
            echo "<script>openPopup();</script>"; // Show popup if sign-up was successful
        } else {
            echo "Error: " . mysqli_error($conn); // Handle any other errors
        }
    }


if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
sleep(1);
    // Prepare and execute SQL query to fetch user based on email
    $query = "SELECT * FROM client_registers WHERE email = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Password is correct, set session variables
            $_SESSION['loggedin'] = true;
            $_SESSION['name'] = $user['First_name'] . ' ' . $user['Last_name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['UserName'];

            // Redirect user after successful login
            header("Location: index1.php");
            exit;
        }
    }
} 


if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
sleep(1);
    // Prepare and execute SQL query to fetch user based on email
    $query = "SELECT * FROM lawyer_registers WHERE email = ? and password = ? AND status = 'approved'";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $email,$password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
if($result){
            // Password is correct, set session variables
            $_SESSION['loggedin'] = true;
            $_SESSION['name'] = $user['First_name'] . ' ' . $user['Last_name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['firstname'];

            // Redirect user after successful login
            header("Location: admin_2/cases.php");
            exit;
        }
    }
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Login Page | AsmrProg</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/css.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Add your other CSS links here -->
    <style>
        .popup {
            width: 400px;
            background: #fff; 
            border-radius: 6px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0.1);
            text-align: center;
            padding: 0 30px 30px;
            color: #333;
            visibility: hidden;
            transition: transform 0.4s, top 0.4s;
            z-index: 9999; /* Ensure it's above other content */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        }
        .open-popup {
            visibility: visible;
            transform: translate(-50%, -50%) scale(1);
        }
        .popup img {
            width: 100px;
            margin-top: -50px;
            border-radius: 50%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
        .popup h2 {
            font-size: 38px;
            font-weight: 500;
            margin: 30px 0 10px;
        }
        .popup button {
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
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>

<div class="container" id="container">
    <div class="form-container sign-up">
    <form id="signup-form" method="post" onsubmit="openPopup()" enctype="multipart/form-data">
    <h1>Create Account</h1>
    <span>or use your email for registration</span>
    <input type="text" name="username" id="username" placeholder="Username" required>
    <input type="text" name="fname" id="fname" placeholder="First Name" required>
    <input type="text" name="lname" id="lname" placeholder="Last Name" required>
    <input type="email" name="emaill" id="emaill" placeholder="Email" required>
    <input type="password" name="passwordd" id="passwordd" placeholder="Password" required>
    <input type="file" name="profile_image" id="profile_image" accept="image/*">

    <button type="submit" class="btn" name="sign-up">Sign Up</button>
</form>

        <div class="popup" id="popup">
            <img src="assets/images/tick.png" alt="">
            <h2>Thank You!</h2>
            <p>You are registered successfully.</p>
            <button type="button" onclick="closePopup()">OK</button>
        </div>
        
        <div class="popup" id="popupclse">
            <img src="assets/images/cross.png" alt="">
            <h2>Warning</h2>
            <p>Please Fill out All The feilds</p>
            <button type="button"  class="btn btn-danger"onclick="closePopup()">OK</button>
        </div> <div class="popup" id="popupclose">
            <img src="assets/images/tick.png" alt="">
            <h2>Thank You!</h2>
            <p>You are registered successfully.</p>
            <button type="button"  class="btn btn-danger"onclick="closePopup()">OK</button>
        </div>
    </div>
    <div class="form-container sign-in">
        <form id="signin-form" method="post" onsubmit="">
            <h1 class="mt-5">Sign In</h1>
            <span>or use your email and password</span>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <a href="index1.php">Continue without an account</a>
            <button type="submit" onclick="openPopupp()" name="login">Sign In</button>
        </form>
    </div>
    <div class="toggle-container">
        <div class="toggle">
            <div class="toggle-panel toggle-right">
                <h1>Hello, Friend!</h1>
                <p>Register with your personal details to use all site features</p>
                <button class="hidden" name="sign-up" id="register">Sign Up</button>
            </div>
            <div class="toggle-panel toggle-left">
                <h1>Welcome Back!</h1>
                <p>Enter your personal details to use all site features</p>
                <button class="hidden" id="login">Sign In</button>
            </div>
        </div>
    </div>
</div>

<script>
let popup = document.getElementById('popup');
function openPopup() {
    popup.classList.add("open-popup");
   
 }
 function closePopup() {
    popup.classList.remove("open-popup");
   
 }
 </script>

<script src="assets/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
