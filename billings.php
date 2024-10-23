<?php
session_start(); // Start session at the beginning
if(isset($_GET['saim'])){
  $user = htmlspecialchars($_GET['saim']);


}
include('config/db.php'); // Include your database connection

if (isset($_POST['submit'])) {
  // Initialize variables
  $full_name = $_POST['full_name'] ?? '';
  $email = $_POST['email'] ?? '';
  $city = $_POST['city'] ?? '';
  $home_phone = $_POST['lawyer_name'] ?? '';
  $work_phone = $_POST['work_phone'] ?? '';
  $name_on_card = $_POST['name_on_card'] ?? '';
  $credit_card_number = $_POST['credit_card_number'] ?? '';
  $amount = $_POST['amount'] ?? '';
  $cvv = $_POST['cvv'] ?? '';

  // SQL query with corrected syntax
  $query = "INSERT INTO billings (full_name, email, city, lawyer_name, work_phone, name_on_card, credit_card_number, amount, cvv) VALUES (?,?,?, ?, ?, ?, ?, ?, ?)";
  // Create a prepared statement
  $stmt = mysqli_prepare($conn, $query);
  // Bind parameters
  sleep(3);
  mysqli_stmt_bind_param($stmt, "sssssssss", $full_name, $email, $city, $home_phone, $work_phone, $name_on_card, $credit_card_number, $amount, $cvv);
  // Execute the statement
  $result = mysqli_stmt_execute($stmt);

  if ($result) {
    header("location:index1.php");
    // Update query with prepared statement
    $update_query = "UPDATE client_cases SET pay_status = 'Paid' WHERE email = ? limit 1";
    $update_stmt = mysqli_prepare($conn, $update_query);
    mysqli_stmt_bind_param($update_stmt, "s", $email);
    mysqli_stmt_execute($update_stmt);

    // Update pay_status in billings table
    $update_billings_query = "UPDATE billings SET pay_status = 'Paid' WHERE email = ? limit 1";
    $update_billings_stmt = mysqli_prepare($conn, $update_billings_query);
    mysqli_stmt_bind_param($update_billings_stmt, "s", $email);
    mysqli_stmt_execute($update_billings_stmt);
}

  // Close statements
  mysqli_stmt_close($stmt);
  mysqli_stmt_close($update_stmt);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600&display=swap');

*{
  font-family: 'Poppins', sans-serif;
  margin:0; padding:0;
  box-sizing: border-box;
  outline: none; border:none;
  text-transform: capitalize;
  transition: all .2s linear;



}

.container{
  display: flex;
  justify-content: center;
  align-items: center;
  padding:25px;
  min-height: 100vh;
  
  background: white;
  
}

.container form{
  padding:20px;
  width:700px;
  background: #fff;
  box-shadow: 0 5px 10px rgba(0,0,0,.1);
}

.container form .row{
  display: flex;
  flex-wrap: wrap;
  gap:15px;
}

.container form .row .col{
  flex:1 1 250px;
}

.container form .row .col .title{
  font-size: 20px;
  color:#333;
  padding-bottom: 5px;
  text-transform: uppercase;
}

.container form .row .col .inputBox{
  margin:15px 0;
}

.container form .row .col .inputBox span{
  margin-bottom: 10px;
  display: block;
}

.container form .row .col .inputBox input{
  width: 100%;
  border:1px solid #ccc;
  padding:10px 15px;
  font-size: 15px;
  text-transform: none;
}

.container form .row .col .inputBox input:focus{
  border:1px solid #000;
}

.container form .row .col .flex{
  display: flex;
  gap:15px;
}

.container form .row .col .flex .inputBox{
  margin-top: 5px;
}

.container form .row .col .inputBox img{
  height: 34px;
  margin-top: 5px;
  filter: drop-shadow(0 0 1px #000);
}

.container form .submit-btn{
  width: 100%;
  padding:12px;
  font-size: 17px;
  background: grey;
  color:#fff;
  margin-top: 5px;
  cursor: pointer;
}

.container form .submit-btn:hover{
  background: #2ecc71;
}

</style>
<body>
   <?php
if(isset($_SESSION['email'])){
  $email = $_SESSION['email'];
}
$select = "SELECT * FROM client_cases WHERE email = '$email'";
$result = mysqli_query($conn, $select);

    // Check if there are any rows retur
    

        while ($row = mysqli_fetch_object($result)) {









?>

<div class="container">

    <form action="" onsubmit="openPopup()" method="post">

        <div class="row">

            <div class="col">

                <h3 class="title">billing address</h3>

                <div class="inputBox">
                    <span>full name :</span>
                    <input type="text" readonly value="<?php echo $row->name ?>" name="full_name" placeholder="Enter full-name">
                </div>
                <div class="inputBox">
                    <span>email :</span>
                    <input type="email" readonly name="email"value="<?php echo $row->email ?>" placeholder="Enter email">
                </div>
               
                <div class="inputBox">
                    <span>city :</span>
                    <input type="text"readonly value="<?php echo $row->city ?> "name="city" placeholder="Enter city">
                </div>

                <div class="inputBox">
                            <span> Lawyer Name  </span>
                            <input type="text"readonly value="<?php echo $row->lawyer_name ?>" name="lawyer_name" placeholder="Enter home phone" required>
                        </div>

                        <div class="inputBox">
                            <label> Work Phone  </label>
                            <input type="number" name="work_phone" placeholder="Enter work phone" required>
                        </div>

            </div>

            <div class="col">

                <h3 class="title">payment</h3>

                <div class="inputBox">
                    <span>cards accepted :</span>
                    <img src="assets/images/card_img.png" alt="">
                </div>
                <div class="inputBox">
                    <span>name on card :</span>
                    <input type="text" name="name_on_card" placeholder="Enter your name">
                </div>
                <div class="inputBox">
                    <span>Amount :</span>
                    <input type="number"readonly name="amount" value="<?php echo $user ?>"placeholder="150">
                </div>
                <div class="inputBox">
                    <span>credit card number :</span>
                    <input type="number" name="credit_card_number" placeholder="1111-2222-3333-4444">
                </div>
              
               
                   
                    <div class="inputBox">
                        <label >CVV </label>
                        <input style="margin-top: 4px;"type="text" name="cvv" placeholder="1234">
                    </div>
               

            </div>
    
        </div>

        <input type="submit" name="submit" value="proceed to checkout" class="submit-btn">

    </form>

</div>    
    <?php
        }
     
    ?>
</body>
</html>
<div class="popup" id="popup">
    <img src="assets/images/tick.png" alt="">
    <h2>Thank You!</h2>
    <p>Payment Successfully</p>
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