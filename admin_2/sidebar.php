<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>


<!DOCTYPE html>
<!-- Coding By CodingNepal - www.codingnepalweb.com -->
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> </title>
    <!-- Linking Google font link for icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

  </head>
  <style>
    /* Importing Google font - Poppins */
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");

       * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
           
        }

        body {
            display: flex;
            min-height: 100vh;
            margin: 0;
            background: #f4f4f4;
            background:url('../assets/images/hero-bg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }

        .sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: 110px; /* Default width */
    height: 100%;
    display: flex;
    flex-direction: column;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(17px);
    border-right: 1px solid rgba(255, 255, 255, 0.7);
    transition: width 0.3s ease;
}

.sidebar:hover {
    width: 280px; /* Expanded width */
}

.content-wrapper {
    margin-left: 110px;/* Match this to the default width of the sidebar */
    padding: 20px;
    flex: 1;
    transition: margin-left 0.3s ease;
}

.sidebar:hover ~ .content-wrapper {
    margin-left: 260px; /* Match this to the expanded width of the sidebar */
}


        .sidebar .logo {
            color: #000;
            display: flex;
            align-items: center;
            padding: 25px 10px 15px;
        }

        .logo img {
            width: 43px;
            border-radius: 50%;
        }

        .logo h2 {
            font-size: 1.15rem;
            font-weight: 600;
            margin-left: 15px;
            display: none;
        }

        .sidebar:hover .logo h2 {
            display: block;
        }

        .sidebar .links {
            list-style: none;
            margin-top: 20px;
            overflow-y: auto;
            height: calc(100% - 140px);
            scrollbar-width: none;
        }

        .sidebar .links::-webkit-scrollbar {
            display: none;
        }

        .links li {
            display: flex;
            border-radius: 4px;
            align-items: center;
            padding: 10px;
        }

        .links li:hover {
            cursor: pointer;
            background: #fff;
        }

        .links h4 {
            color: #222;
            font-weight: 500;
            display: none;
            margin-bottom: 10px;
        }

        .sidebar:hover .links h4 {
            display: block;
        }

        .links hr {
            margin: 10px 8px;
            border: 1px solid #4c4c4c;
        }

        .sidebar:hover .links hr {
            border-color: transparent;
        }

        .links li span {
            padding: 12px 10px;
        }

        .links li a {
            padding: 10px;
            color: #000;
            display: none;
            font-weight: 500;
            white-space: nowrap;
            text-decoration: none;
        }

        .sidebar:hover .links li a {
            display: block;
        }

        .links .logout-link {
            margin-top: 20px;
        }

      

        .add-button {
            float: right;
            padding: 10px 20px;
            font-size: 16px;
            text-decoration: none;
            color: #fff;
            background-color: #28a745; /* Success color */
            border-radius: 20px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .add-button:hover {
            background-color: green; 
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table th, .table td {
            border: 1px solid #dee2e6;
            padding: 8px;
        }

        .table thead th {
            background-color: #f8f9fa;
            color: #495057;
            border-color: #dee2e6;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .input-group {
            margin-bottom: 20px;
        }

        .export__file {
            display: inline-block;
        }
    </style>
  <body>
    <aside class="sidebar">
      <div class="logo">
        <img src="../assets/images/Elite-Lawyers.png" alt="logo">
        <h2>Elite Lawyers</h2>
      </div>
      <ul class="links">
        <h4>Main Menu</h4>
       
        <li>
        <span><i class="fa-solid fa-graduation-cap"></i></span>
          <a href="cases.php">All Cases </a>
        </li>
        <li>
        <span><i class="fa-solid fa-graduation-cap"></i></span>
          <a href="mycases.php">My Cases </a>
        </li>
        <li>
        <span><i class="fa-solid fa-users"></i></span>
          <a href="payment.php">Payments</a>
        </li> 
        <li>
        <li>
            <?php
$user = $_SESSION['username'];
            ?>
        <span><i class="fa-solid fa-users"></i></span>
        <a href="pricing.php?user=<?php echo urlencode($user); ?>">Pricing and Quote</a>
        </li> 
        <li>
        <span><i class="fa-solid fa-credit-card"></i></span>
          <a href="wallet.php">My Wallet</a>
        </li>
        <li class="logout-link">
          <span class="material-symbols-outlined">logout</span>
          <a href="../logout.php">Logout</a>
        </li>
      
      </ul>
    </aside>
  </body>
</html>