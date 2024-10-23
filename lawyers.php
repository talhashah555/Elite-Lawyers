<?php
include('config/db.php'); // Assuming this includes your database connection

if (isset($_GET["query"])) {
    $search_query = $_GET["query"];
    $search_type = isset($_GET["search_type"]) ? $_GET["search_type"] : "name";

    // Validate and sanitize search input (important to prevent SQL injection)
    $search_query = mysqli_real_escape_string($conn, $search_query);

    // Prepare SQL statement based on search type
    if ($search_type === "name") {
        $sql = "SELECT * FROM lawyers WHERE name LIKE '%$search_query%'";
    } elseif ($search_type === "type") {
        $sql = "SELECT * FROM lawyers WHERE type LIKE '%$search_query%'";
    }

    $result = $conn->query($sql);

    if ($result && mysqli_num_rows($result) > 0) {
        echo '<div class="container py-5">';
        $count = 0;

        while ($row = mysqli_fetch_assoc($result)) {
            if ($count % 3 == 0) {
                echo '<div class="row">';
            }

            $name = $row['name'];
            $description = $row['description'];
            $type = $row['type'];
            $price = $row['price'];
            $image = $row['image'];

            // Example output of each lawyer's information
            echo '<div class="col-md-4">';
            echo '<div class="card">';
            echo '<img src="' . $image . '" class="card-img-top" alt="Lawyer Image">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $name . '</h5>';
            echo '<p class="card-text">' . $description . '</p>';
            echo '<p class="card-text">' . $type . '</p>';
            echo '<p class="card-text">' . $price . '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';

            $count++;

            if ($count % 3 == 0) {
                echo '</div>'; // Close row after every 3 items
            }
        }

        if ($count % 3 != 0) {
            echo '</div>'; // Close row if there are remaining items
        }

        echo '</div>'; // Close container
    } else {
        echo '<p>No lawyers found.</p>';
    }
}

?>

         





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
        margin: 0;
        padding: 0;
    }

    .box{
        height: 50px;
        display: flex;
        cursor: pointer;
        text-align:center;
        padding: 10px 20px;
        background: #ffff;
        width:450px;
        border-radius: 30px;
        align-items: center;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        margin:0 auto;
        margin-bottom:50px;
    }
    .box:hover input{
        width: 380px;
    }
    .box input{
        width: 0;
        outline: none;
        border: none;
        font-weight: 500;
        transition: 0.8s;
        background: transparent;
    }
    .box a .fast{
       
        font-size: 18px;
    }
    .boxx {
        height: 50px;
        display: flex;
        cursor: pointer;
        text-align:center;
        padding: 10px 20px;
        background: #ffff;
        width:200px;
        border-radius: 30px;
        align-items: center;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        margin:0 auto;
        margin-bottom:50px;
        border: none;
    }
    .boxx select{
        width: 160px;
        border-radius: 10px;
        padding: 5px;
        margin-left: 10px;
        background: #fff;
        outline: none;
        border: none;
        transition: 0.8s;
        background: transparent;
    }
    .boxx select option{
        border-radius: 10px;
        padding: 5px;
        margin-left: 10px;
        background: #fff;
        outline: none;
        border: none;
        transition: 0.8s;
        background: transparent;
        

    }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="assets/css/stylee.css" rel="stylesheet">
</head>

<body>
    <?php
    include('includes/header.php'); // Assuming this includes your HTML header
?>
<div class="box">
    <form id="searchForm" action="lawsearch.php" method="GET">
        <input type="search" id="searchInput" name="query" placeholder="Search lawyers...">
      
        <i class="fa-solid fa-search"></i>
    
</div>
<div class="boxx">
<select name="search_type">
            <option value="name">Search by Name</option>
            <option value="type">Search by Type</option>
        </select>
</div>
</form>
    </div><?php
    // Query to fetch all data from the 'lawyers' table
    $sql = "SELECT * FROM lawyers WHERE status = 'approved'";
    $result = mysqli_query($conn, $sql);

    // Check if there are any rows returned
    if (mysqli_num_rows($result) > 0) {
        echo '<div class="container py-5">';
        $count = 0; // Counter for number of cards in a row

        while ($row = mysqli_fetch_assoc($result)) {
            if ($count % 3 == 0) {
                echo '<div class="row">';
            }

            $name = $row['name'];
            $des = $row['description'];
            $type = $row['type'];
            $price = $row['price'];
            $image = $row['image'];
            ?>
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <img src="<?php echo $image; ?>" class="card-img-top" alt="Lawyer Image" height="300px">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $name; ?></h5>
                        <p class="card-text"><?php echo $des; ?></p>
                  <div>he/she is a <?php echo $type ?> Lawyers</div>

                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <h3>$<?php  echo $price ?></h3>
                           <a href="appoint.php?user=<?php  echo $name    ?>"><button class="btn btn-primary">Appoint</button></a> 
                        </div>
                    </div>
                </div>
            </div>
            <?php

            $count++;

            if ($count % 3 == 0) {
                echo '</div>'; // Close the row after three cards
            }
        }

        // Close the row if it's not already closed
        if ($count % 3 != 0) {
            echo '</div>';
        }

        echo '</div>'; // Close the container
    } else {
        echo '<div class="container"><div class="row"><div class="col-12 text-center">No lawyers found.</div></div></div>';
    }

    // Close the database connection
    mysqli_close($conn);
    ?>

    <?php include('includes/footer.php'); // Assuming this includes your HTML footer ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4mg60m9Uef1O7WlBOhFpZoGrgJc4jzbaXoUq/2rp8HpleEJzQ/E"
        crossorigin="anonymous"></script>
    
</body>

</html>