<?php include ('../config/db.php'); ?>
<?php include ('sidebar.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
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

        body {
            background: url('../assets/images/hero-bg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }

        .container {
            background: linear-gradient(45deg, blueviolet, lightgreen);
            padding: 15px 9%;
            padding-bottom: 100px;
            width: 100%;
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
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            padding: 10%;
        }

        .container .box-container .box {
            box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
            border-radius: 5px;
            background: #fff;
            text-align: center;
            padding: 30px 20px;
            opacity: 0.8;
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
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right"></ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="heading">Our Statistics</div>
            <div class="box-container">
                <?php
                $query = "SELECT * FROM dash_lawyers";
                $result = mysqli_query($conn, $query);
                while ($lawyer = mysqli_fetch_object($result)): ?>
                    <div class="box bg-primary text-light">
                        <h3 class="text-light">Total Lawyers</h3>
                        <i class="fa-solid fa-graduation-cap" style="font-size: 50px;"></i>
                        <p class="text-light"><?php echo $lawyer->total_lawyers; ?></p>
                    </div>

                    <div class="box bg-warning text-light">
                        <h3 class="text-light">Pending Cases</h3>
                        <i class="fa-solid fa-clock" style="font-size: 50px;"></i>
                        <p class="text-light"><?php echo $lawyer->pending_cases; ?></p>
                    </div>

                    <div class="box bg-secondary text-light">
                        <h3 class="text-light">Won Cases</h3>
                        <i class="fa-solid fa-trophy" style="font-size: 50px;"></i>
                        <p class="text-light"><?php echo $lawyer->won_cases; ?></p>
                    </div>

                    <div class="box bg-danger text-light">
                        <h3 class="text-light">Happy Clients</h3>
                        <i class="fa-solid fa-face-smile" style="font-size: 50px;"></i>
                        <p class="text-light"><?php echo $lawyer->happy_clients; ?></p>
                    </div>

                    <div class="box bg-primary text-light">
                        <a href="Admin-approve.php" class="text-light">
                            <h3 class="text-light">Admin Approvals</h3>
                            <i class="fa-solid fa-graduation-cap" style="font-size: 50px;"></i>
                            <p class="text-light"><?php echo $lawyer->total_lawyers; ?></p>
                        </a>
                    </div>

                    <div class="box bg-secondary text-light">
                        <a href="Lawyer-approve.php" class="text-light">
                            <h3 class="text-light">Lawyer Approvals</h3>
                            <i class="fa-solid fa-graduation-cap" style="font-size: 50px;"></i>
                            <p class="text-light"><?php echo $lawyer->total_lawyers; ?></p>
                        </a>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</body>
</html>
