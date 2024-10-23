<?php
session_start();
include '../config/db.php';
include 'sidebar.php';
$saim = $_SESSION['username'];
$query = "SELECT SUM(amount) as total_amount FROM billings WHERE lawyer_name = '$saim' AND pay_status = 'Paid'";
$result = mysqli_query($conn, $query);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $total_amount = $row['total_amount'];
    if ($total_amount === null) {
        $total_amount = 0;
    }
} else {
    echo "Error: " . mysqli_error($conn);
}

?>
<style>



@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap');

* {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    outline: none;
    border: none;
    text-decoration: none;
    text-transform: capitalize;
    transition: .2s linear;
}
body{
    background:url('../assets/images/hero-bg.jpg');
    background-size: cover;
    background-repeat: no-repeat;
}
.container {
    background: linear-gradient(45deg, blueviolet, lightgreen);
    padding: 15px 9%;
    padding-bottom: 100px;
    width:100%;
}

.container .heading {
    text-align: center;
    padding-bottom: 15px;
    color: #fff;
    text-shadow: 0 5px 10px rgba(0, 0, 0, .2);
    font-size: 50px;
   
}

.container .box-container {
    display: grid;
    grid-template-columns: repeat(2, 1fr); /* Ensures 2 cards per row */
    gap: 15px;
    padding: 10%;
    
    
}

.container .box-container .box {
    box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
    border-radius: 5px;
    background: #fff;
    margin-left: 55%;
    width: 300;
    text-align: center;
    padding: 30px 20px;
    opacity:0.8;
}

.container .box-container .box img {
    height: 80px;
}

.container .box-container .box h3 {
    color: #444;
    font-size: 22px;
    padding: 10px 0;
}

.container .box-container .box p {
    color: #777;
    font-size: 15px;
    line-height: 1.8;
}

.container .box-container .box .btn {
    margin-top: 10px;
    display: inline-block;
    background: #333;
    color: #fff;
    font-size: 17px;
    border-radius: 5px;
    padding: 8px 25px;
}

.container .box-container .box .btn:hover {
    letter-spacing: 1px;
}

.container .box-container .box:hover {
    box-shadow: 0 10px 15px rgba(0, 0, 0, .3);
    transform: scale(1.03);
}

@media (max-width: 768px) {
    .container {
        padding: 20px;
    }

    .container .box-container {
        grid-template-columns: 1fr; /* Stack cards vertically on smaller screens */
    }
}

</style>
<div class="container">
        <div class="heading">My Wallet</div>
        <div class="box-container">
   
          
                 <div class="box bg-primary text-light">
                 <alt=Total Lawyers>
                <h3 class="text-light">Total Income</h3>
                <i class="fa-solid fa-credit-card"  style="font-size: 50px;"></i>
                <p class="text-light"><h1>Total Amount Paid: $<?php echo $total_amount; ?></h1></p>
             
                </div>
                </div>
                </div>
                </div>
