<?php
session_start();
$user_id = $_SESSION['id'];

if(!isset( $user_id )){

    header('location:index.php');
} 

; // Start session at the beginning

include('config/db.php'); // Include your database connection

// Assuming you have included your database connection file and sanitized inputs properly

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $law_name = $_POST['lawyer_name'];
    $email = $_POST['email'];
    $cnic = $_POST['cnic'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];
    $case_name = $_POST['case_name'];
    $time = $_POST['time']; // Assuming you have a time input in your form
    $case_detail = $_POST['case_detail']; // Assuming you have a case_detail input in your form

    // Prepare the SQL statement with placeholders for all columns
    $query = "INSERT INTO client_cases (name,lawyer_name, email, cnic, city, phone, case_name, time, case_detail)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)";

    // Create a prepared statement
    $stmt = mysqli_prepare($conn, $query);
sleep(3);
    // Bind parameters
    mysqli_stmt_bind_param($stmt, "sssssssss", $name, $law_name, $email, $cnic, $city, $phone, $case_name, $time, $case_detail);

    // Execute the statement
    $result = mysqli_stmt_execute($stmt);

    if($result){
        
        header("location:index1.php");
    }
    // Check if the query was executed successfully


    // Close the statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} 
?>



 








<?php

if (isset($_GET['user'])) {
    $user = htmlspecialchars($_GET['user']);
}
if(isset($_SESSION['email'])){
    $user_email = $_SESSION['email'];
}
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
}
?>









<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Client Form</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<link rel="stylesheet" href="../custom-styles.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<script src="../custom-scripts.js" defer type="f468c2e167394c23ec22a2a4-text/javascript"></script>
<style>
    /* Import Google font - Poppins */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }
    body {
        display: flex;
        padding: 0 10px;
        min-height: 100vh;
        background-image: url('https://img.freepik.com/free-photo/view-3d-justice-scales_23-2151228076.jpg?t=st=1720420256~exp=1720423856~hmac=a8a8422bfdb930c03079865bbc1ed95d94e78ca2789bc7000657a94e22286492&w=826');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        align-items: center;
        justify-content: center;
    }
    ::selection {
        color: #fff;
        background: #0D6EFD;
    }
    .wrapper {
        width: 715px;
        background: rgba(255, 255, 255, 0.15); /* Adjust the opacity here */
        border-radius: 5px;
        box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.05);
    }
    .wrapper header {
        font-size: 22px;
        font-weight: 600;
        padding: 20px 30px;
        border-bottom: 1px solid #ccc;
    }
    .wrapper form {
        margin: 35px 30px;
    }
    .wrapper form.disabled {
        pointer-events: none;
        opacity: 0.7;
    }
    form .dbl-field {
        display: flex;
        margin-bottom: 25px;
        justify-content: space-between;
    }
    .dbl-field .field {
        height: 50px;
        display: flex;
        position: relative;
        width: calc(100% / 2 - 13px);
    }
    .wrapper form i {
        position: absolute;
        top: 50%;
        left: 18px;
        color: #ccc;
        font-size: 17px;
        pointer-events: none;
        transform: translateY(-50%);
    }
    form .field input,
    form .message textarea {
        width: 100%;
        height: 100%;
        outline: none;
        padding: 0 18px 0 48px;
        font-size: 16px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }
    .field input::placeholder,
    .message textarea::placeholder {
        color: #ccc;
    }
    .field input:focus,
    .message textarea:focus {
        padding-left: 47px;
        border: 2px solid #0D6EFD;
    }
    .field input:focus ~ i,
    .message textarea:focus ~ i {
        color: #0D6EFD;
    }
    form .message {
        position: relative;
    }
    form .message i {
        top: 30px;
        font-size: 20px;
    }
    form .message textarea {
        min-height: 130px;
        max-height: 230px;
        max-width: 100%;
        min-width: 100%;
        padding: 15px 20px 0 48px;
    }
    form .message textarea::-webkit-scrollbar {
        width: 0px;
    }
    .message textarea:focus {
        padding-top: 14px;
    }
    form .button-area {
        margin: 25px 0;
        display: flex;
        align-items: center;
    }
    .button-area button {
        color: #fff;
        border: none;
        outline: none;
        font-size: 18px;
        cursor: pointer;
        border-radius: 5px;
        padding: 13px 25px;
        background: RGB(204, 183, 115);
        transition: background 0.3s ease;
    }
    .button-area button:hover {
        background: #CDA434;
    }
    .button-area span {
        font-size: 17px;
        margin-left: 30px;
        display: none;
    }
    @media (max-width: 600px) {
        .wrapper header {
            text-align: center;
        }
        .wrapper form {
            margin: 35px 20px;
        }
        form .dbl-field {
            flex-direction: column;
            margin-bottom: 0px;
        }
        form .dbl-field .field {
            width: 100%;
            height: 45px;
            margin-bottom: 20px;
        }
        form .message textarea {
            resize: none;
        }
        form .button-area {
            margin-top: 20px;
            flex-direction: column;
        }
        .button-area button {
            width: 100%;
            padding: 11px 0;
            font-size: 16px;
        }
        .button-area span {
            margin: 20px 0 0;
            text-align: center;
        }
    }
    .input-field input, select{
    outline: none;
    font-size: 14px;
    font-weight: 400;
    color: #333;
    border-radius: 5px;
    border: 1px solid #aaa;
    padding: 0 15px;
    width: 100%;
    height: 42px;
    margin: 8px 0;
}
</style>

</head>
<body>

<div class="wrapper">
<header>E-Consultation</header>
<form action="#" method="post"onsubmit="openPopup()">
<div class="dbl-field">
<div class="field">
<input type="text" name="name" value="<?php echo $username ?>" readonly placeholder="Enter your name" required>
<i class="fas fa-user"></i>
</div>
<div class="field">
<input type="text" name="lawyer_name" value="<?php echo $user?>" readonly placeholder="Enter your Lawyer name" required>
<i class="fas fa-graduation-cap"></i>
</div>

</div><div class="dbl-field"><div class="field">
<input type="text" name="cnic" placeholder="Enter your CNIC" required>
<i class="fa-regular fa-address-card"></i>
</div><div class="field">
<input type="text" name="email" value="<?php echo $user_email?>" readonly placeholder="Enter your email" required>
<i class="fas fa-envelope"></i>
</div>
</div>
<div class="dbl-field">
<div class="field">
<input type="text" name="phone" placeholder="Enter your phone" required>
<i class="fas fa-phone-alt"></i>
</div><div class="field">
<input type="text" name="city" placeholder="Enter your city" required>
<i class="fa-solid fa-location-dot"></i>
</div>


</div>
<div class="dbl-field">

<div class="field">
<input type="text" name="case_name" placeholder="Enter your case" required>
<i class="fa-solid fa-book"></i>
</div>
<div class="field">
  <select  required name="time">
                                <option disabled selected>Select Your time</option>
                                <option value="10:00 AM">10:00 AM</option>
    <option value="10:30 AM">10:30 AM</option>
    <option value="11:00 AM">11:00 AM</option>
    <option value="11:30 AM">11:30 AM</option>
    <option value="12:00 PM">12:00 PM</option>
    <option value="12:30 PM">12:30 PM</option>
    <option value="01:00 PM">1:00 PM</option>
    <option value="01:30 PM">1:30 PM</option>
    <option value="02:00 PM">2:00 PM</option>
    <option value="02:30 PM">2:30 PM</option>
    <option value="03:00 PM">3:00 PM</option>
    <option value="03:30 PM">3:30 PM</option>
    <option value="04:00 PM">4:00 PM</option>
    <option value="04:30 PM">4:30 PM</option>
    <option value="05:00 PM">5:00 PM</option>
    <option value="05:30 PM">5:30 PM</option>
    <option value="06:00 PM">6:00 PM</option>
    <option value="06:30 PM">6:30 PM</option>
    <option value="07:00 PM">7:00 PM</option>
    <option value="07:30 PM">7:30 PM</option>
    <option value="08:00 PM">8:00 PM</option>
    <option value="08:30 PM">8:30 PM</option>
    <option value="09:00 PM">9:00 PM</option>
    <option value="09:30 PM">9:30 PM</option> <option value="10:00 AM">10:00 AM</option>
  
                            </select><i class="fa-solid fa-clock" style="margin-left:80%;"></i>
</div>

</div>



<div class="message">
<textarea placeholder="Briefly describe your case" name="case_detail" required></textarea>
<i class="material-icons">message</i>
</div>
<div class="button-area">
<button type="submit" name="submit">Send </button>
<span></span>
</div>
</form>
</div>
<script>
    const form = document.querySelector("form"),
statusTxt = form.querySelector(".button-area span");

// form.onsubmit = (e)=>{
//   e.preventDefault();
//   statusTxt.style.color = "#";
//   statusTxt.style.display = "block";
//   statusTxt.innerText = "Sending your queries...";
//   form.classList.add("disabled");

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "message.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState == 4 && xhr.status == 200){
      let response = xhr.response;
      if(response.indexOf("Email and message field is required!") != -1 || response.indexOf("Enter a valid email address!") != -1 || response.indexOf("Sorry, failed to send your message!") != -1){
        statusTxt.style.color = "red";
      }else{
        form.reset();
        setTimeout(()=>{
          statusTxt.style.display = "none";
        }, 3000);
      }
      statusTxt.innerText = response;
      form.classList.remove("disabled");
    }
  }
  let formData = new FormData(form);
  xhr.send(formData);

</script>
<script src="script.js" type="f468c2e167394c23ec22a2a4-text/javascript"></script>
<script src="/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="f468c2e167394c23ec22a2a4-|49" defer></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"89fde80b0b079089","r":1,"version":"2024.4.1","token":"e029c4a3c1704e88ab37ce2409fd73de"}' crossorigin="anonymous"></script>
</body>
</html>

<div class="popup" id="popup">
    <img src="assets/images/tick.png" alt="">
    <h2>Congratulation</h2>
    <p>Appointment added successfuly when the lawyer will approve it will be displayed in the main page down some rows</p>
    <button type="button" onclick="closePopup()" >OK</button>
</div>

</div>

<button onclick="openPopup();">as</button>



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
 background: green;
 color: #fff;
 border: 0;
 outline: none;
 font-size: 18px;
 border-radius: 4px;
 cursor: pointer;
 box-shadow: 0 2px 5px rgba(0,0,0,0.2);


}

</style>
<script>


</script>