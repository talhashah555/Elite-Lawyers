<?php

session_start();
include('config/db.php'); // Assuming this file contains database connection code

// LOGIN FORM
if (isset($_POST['login'])) {
    $email = $_POST['emailoruser'];
    $password = $_POST['passwordd'];

    // Prepare and execute query using prepared statement to prevent SQL injection
    $query = "SELECT * FROM admin_registers WHERE email = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Check if user exists
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $status = $row['status'];

        // Check status and redirect accordingly
        if ($status == "approved") {
            $_SESSION['email'] = $email;
            $_SESSION['status'] = $status;
            header("Location: admin/dash.php");
            exit();
        } else if ($status == "Rejected") {
            echo "<script>alert('Your account is not approved yet')</script>";
            header("Location: login.php");
            exit();
        }
    } else {
        echo "<script>alert('Invalid email or password')</script>";
        header("Location: login.php");
        exit();
    }
}



// SIGNUP FORM
if (isset($_POST['sign-up'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Hash password securely
    
    // Insert user into database
    $query = "INSERT INTO admin_registers (firstname, lastname, email, password) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssss", $firstname, $lastname, $email, $password);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "<script>alert('You have successfully registered')</script>";
        header("Location: login.php");
        exit;
    } else {
        echo "<script>alert('Something went wrong')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Ludiflex | Login & Registration</title>
       <style>
          @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
*{  
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
body{
    background: url("https://img.freepik.com/free-photo/law-justice-converge-antique-gavel-generative-ai_188544-9402.jpg?t=st=1720079915~exp=1720083515~hmac=47bec735d03763ba62bee89b6e5e05e726f85d4f8e8e802d9268a04f90915b9a&w=826");
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    overflow: hidden;
}
.wrapper{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 110vh;
    background: rgba(39, 39, 39, 0.4);
}


.form-box{
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 512px;
    height: 420px;
    overflow: hidden;
    z-index: 2;
}
.login-container{
    position: absolute;
    left: 4px;
    width: 500px;
    display: flex;
    flex-direction: column;
    transition: .5s ease-in-out;
}
.register-container{
    position: absolute;
    right: -520px;
    width: 500px;
    display: flex;
    flex-direction: column;
    transition: .5s ease-in-out;
}
.top span{
    color: #fff;
    font-size: small;
    padding: 10px 0;
    display: flex;
    justify-content: center;
}
.top span a{
    font-weight: 500;
    color: #fff;
    margin-left: 5px;
}
header{
    color: #fff;
    font-size: 30px;
    text-align: center;
    padding: 10px 0 30px 0;
}
.two-forms{
    display: flex;
    gap: 10px;
}
.input-field{
    font-size: 15px;
    background: rgba(255, 255, 255, 0.2);
    color: #fff;
    height: 50px;
    width: 100%;
    padding: 0 10px 0 45px;
    border: none;
    border-radius: 30px;
    outline: none;
    transition: .2s ease;
}
.input-field:hover, .input-field:focus{
    background: rgba(255, 255, 255, 0.25);
}
::-webkit-input-placeholder{
    color: #fff;
}
.input-box i{
    position: relative;
    top: -35px;
    left: 17px;
    color: #fff;
}
.submit{
    font-size: 15px;
    font-weight: 500;
    color: black;
    height: 45px;
    width: 100%;
    border: none;
    border-radius: 30px;
    outline: none;
    background: rgba(255, 255, 255, 0.7);
    cursor: pointer;
    transition: .3s ease-in-out;
}
.submit:hover{
    background: rgba(255, 255, 255, 0.5);
    box-shadow: 1px 5px 7px 1px rgba(0, 0, 0, 0.2);
}
.two-col{
    display: flex;
    justify-content: space-between;
    color: #fff;
    font-size: small;
    margin-top: 10px;
}
.two-col .one{
    display: flex;
    gap: 5px;
}
.two label a{
    text-decoration: none;
    color: #fff;
}
.two label a:hover{
    text-decoration: underline;
}
@media only screen and (max-width: 786px){
    .nav-button{
        display: none;
    }
    .nav-menu.responsive{
        top: 100px;
    }
    .nav-menu{
        position: absolute;
        top: -800px;
        display: flex;
        justify-content: center;
        background: rgba(255, 255, 255, 0.2);
        width: 100%;
        height: 90vh;
        backdrop-filter: blur(20px);
        transition: .3s;
    }
    .nav-menu ul{
        flex-direction: column;
        text-align: center;
    }
    .nav-menu-btn{
        display: block;
    }
    .nav-menu-btn i{
        font-size: 25px;
        color: #fff;
        padding: 10px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        cursor: pointer;
        transition: .3s;
    }
    .nav-menu-btn i:hover{
        background: rgba(255, 255, 255, 0.15);
    }
}
@media only screen and (max-width: 540px) {
    .wrapper{
        min-height: 100vh;
    }
    .form-box{
        width: 100%;
        height: 500px;
    }
    .register-container, .login-container{
        width: 100%;
        padding: 0 20px;
    }
    .register-container .two-forms{
        flex-direction: column;
        gap: 0;
    }

}

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
    </style> 
</head>
<body>
    <div class="wrapper">
        <div class="form-box">
            <!-- Login Container -->
            <div class="login-container" id="login">
                <div class="top">
                    
                    <header>Login</header>
                </div>
                <form action="" method="post">
                    <div class="input-box">
                        <input type="text" class="input-field" name="emailoruser" placeholder="Username or Email">
                        <i class="bx bx-user"></i>
                    </div>
                    <div class="input-box">
                        <input type="password" class="input-field" name="passwordd" placeholder="Password">
                        <i class="bx bx-lock-alt"></i>
                    </div>
                    <div class="input-box">
                        <input type="submit" class="submit" name="login" value="Sign In">
                    </div>
                </form>
                <div class="top">
                <span>Don't have an account? <a href="#" onclick="register()">Sign Up</a></span></div>
               
            </div>
            
            <!-- Registration Container -->
            <div class="register-container" id="register">
               
            <div class="top">
                    <header>Sign Up</header>
                </div>
                <form action="" method="post" id="register-form" onsubmit="openPopup()">
                    <div class="two-forms">
                        <div class="input-box">
                            <input type="text" class="input-field" name="firstname" placeholder="Firstname" required>
                            <i class="bx bx-user"></i>
                        </div>
                        <div class="input-box">
                            <input type="text" class="input-field" name="lastname" placeholder="Lastname" required>
                            <i class="bx bx-user"></i>
                        </div>
                    </div>
                    <div class="input-box">
                        <input type="text" class="input-field" name="email" placeholder="Email" required>
                        <i class="bx bx-envelope"></i>
                    </div>
                    <div class="input-box">
                        <input type="password" class="input-field" name="password" placeholder="Password" required>
                        <i class="bx bx-lock-alt"></i>
                    </div>
                    <div class="input-box">
                        <input type="submit"onclick="openPopup()"  name="sign-up" class="submit" value="Register">
                    </div>
                </form>
                <div class="top">
                    <span>Have an account? <a href="#" onclick="login()">Login</a></span>
                    </div>
                
            </div>
        </div>
    </div>  <div class="popup" id="popup">
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
    <script>
        var a = document.getElementById("loginBtn");
        var b = document.getElementById("registerBtn");
        var x = document.getElementById("login");
        var y = document.getElementById("register");

        function login() {
            x.style.left = "4px";
            y.style.right = "-520px";
            a.className += " white-btn";
            b.className = "btn";
            x.style.opacity = 1;
            y.style.opacity = 0;
        }

        function register() {
            x.style.left = "-510px";
            y.style.right = "5px";
            a.className = "btn";
            b.className += " white-btn";
            x.style.opacity = 0;
            y.style.opacity = 1;
        }
    </script><script>
    let popup = document.getElementById("popup");
    function openPopup() {
        popup.classList.add("open-popup");
    }

    function closePopup() {
        popup.classList.remove("open-popup");
        location.reload(); // Reload the page after closing the popup
    }
    let popupclose = document.getElementById("popupclose");

function openPopupclose() {
    popupclose.classList.add("open-popup");
}





</script>
</body>
</html>
