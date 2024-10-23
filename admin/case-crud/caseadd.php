<?php
// Start output buffering
ob_start();

// Include necessary files
include('../sidebar.php');
include('../../config/db.php');

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $client_name = $_POST['client_name'];
    $lawyer_name = $_POST['lawyer_name'];
    $cnic = $_POST['cnic'];
    $phone_number = $_POST['phone_number'];
    $case_name = $_POST['case_name'];
    $appointment_time = $_POST['appointment_time'];
    $case_details = $_POST['case_details'];
    $date = date('Y-m-d'); // Current date in YYYY-MM-DD format

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO client_cases (name, lawyer_name, cnic, phone, case_name, time, date, case_detail) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $client_name, $lawyer_name, $cnic, $phone_number, $case_name, $appointment_time, $date, $case_details);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to the desired page
        header("Location:../case.php");
        exit(); // Ensure no further code is executed after the redirect
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection

// Flush output buffer and end buffering
ob_end_flush();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Case Info</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
 



 




    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <!-- Page title -->
                        <h1>Cases</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <!-- Breadcrumbs -->
                       
                    </div><!-- /.col -->
                </div><!-- /.row -->
                
            </div><!-- /.container-fluid -->
        </div><!-- /.content-header -->


   <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}
body{
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background:url('../../assets/images/hero-bg.jpg');
  background-size: cover;
  background-repeat: no-repeat;
  padding: 10px;

}
.container{
  /* max-width: 700px; */
  width: 100%;
  background-color: #fff;
  padding: 25px 30px;
  border-radius: 5px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.15);
}
.container .title{
  font-size: 25px;
  font-weight: 500;
  position: relative;
}
.container .title::before{
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 30px;
  border-radius: 5px;
  background: linear-gradient(135deg, #71b7e6, #9b59b6);
}
.content form .user-details{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 20px 0 12px 0;
}
form .user-details .input-box{
  margin-bottom: 15px;
  width: calc(100% / 2 - 20px);
}
form .input-box span.details{
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
}
.user-details .input-box input{
  height: 45px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
}
.user-details .input-box input:focus,
.user-details .input-box input:valid{
  border-color: #9b59b6;
}
 form .gender-details .gender-title{
  font-size: 20px;
  font-weight: 500;
 }
 form .category{
   display: flex;
   width: 80%;
   margin: 14px 0 ;
   justify-content: space-between;
 }
 form .category label{
   display: flex;
   align-items: center;
   cursor: pointer;
 }
 form .category label .dot{
  height: 18px;
  width: 18px;
  border-radius: 50%;
  margin-right: 10px;
  background: #d9d9d9;
  border: 5px solid transparent;
  transition: all 0.3s ease;
}
 #dot-1:checked ~ .category label .one,
 #dot-2:checked ~ .category label .two,
 #dot-3:checked ~ .category label .three{
   background: #9b59b6;
   border-color: #d9d9d9;
 }
 form input[type="radio"]{
   display: none;
 }
 form .button{
   height: 45px;
   margin: 35px 0
 }
 form .button input{
   height: 100%;
   width: 100%;
   border-radius: 5px;
   border: none;
   color: #fff;
   font-size: 18px;
   font-weight: 500;
   letter-spacing: 1px;
   cursor: pointer;
   transition: all 0.3s ease;
   background: linear-gradient(135deg, #71b7e6, #9b59b6);
 }
 select{
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
 form .button input:hover{
  /* transform: scale(0.99); */
  background: linear-gradient(-135deg, #71b7e6, #9b59b6);
  }
 @media(max-width: 584px){
 .container{
  max-width: 100%;
}
form .user-details .input-box{
    margin-bottom: 15px;
    width: 100%;
  }
  form .category{
    width: 100%;
  }
  .content form .user-details{
    max-height: 300px;
    overflow-y: scroll;
  }
  .user-details::-webkit-scrollbar{
    width: 5px;
  }
  }
  @media(max-width: 459px){
  .container .content .category{
    flex-direction: column;
  }
}
   </style>
<body>
 <div class="container">
    <div class="title">Add Case</div>
    <div class="content">
      <form action="" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details"><i class="fas fa-user"></i> Client Name</span>
            <input type="text" name="client_name" placeholder="Enter your name" required>
          </div>
          <div class="input-box">
            <span class="details"><i class="fa-solid fa-graduation-cap"></i> Lawyer Name</span>
            <input type="text" name="lawyer_name" placeholder="Enter lawyer name" required>
          </div>
          <div class="input-box">
            <span class="details"><i class="fa-regular fa-address-card"></i> Cnic</span>
            <input type="text" name="cnic" placeholder="Enter your cnic" required>
          </div>
          <div class="input-box">
            <span class="details"><i class="fas fa-phone"></i> Phone Number</span>
            <input type="text" name="phone_number" placeholder="Enter your number" required>
          </div>
          <div class="input-box">
            <span class="details"><i class="fa-solid fa-book"></i> Case Name</span>
            <input type="text" name="case_name" placeholder="Enter case name" required>
          </div>
          <div class="input-box">
            <span class="details"><i class="fa-solid fa-calendar-check"></i> Appointment Time</span>
            <select name="appointment_time" required>
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
              <option value="09:30 PM">9:30 PM</option>
            </select>
          </div>
          <div class="input-box">
            <span class="details">Case Details</span>
            <input type="text" name="case_details" placeholder="Enter details" required>
          </div>
        </div>
        
        <div class="button">
          <input type="submit" name="submit" value="Add">
        </div>
      </form>
    </div>
</div>
<br>


