<?php
include_once('../../config/db.php'); // include your database connection

// Check if the ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // SQL query to select the lawyer
    $query = "SELECT * FROM lawyers WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $lawyer = mysqli_fetch_object($result);
    } else {
        echo "No lawyer found with the provided ID.";
        exit;
    }
} else {
    echo "No ID provided.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Lawyer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .container {
            margin-top: 9%;
            
        }

        .card {
            padding: 20px;
            border-radius: 10px;
        }
body{
    background:url('../../assets/images/hero-bg.jpg');
    background-size: cover;
    background-repeat: no-repeat;
}
        .back-button {
            margin-top: 20px;
        }
    </style>
</head>

<body>
   


    <div class="content-wrapper">
        <div class="container">
            <div class="card">
                <h2>Lawyer Details</h2>
                <p><strong>ID:</strong> <?php echo $lawyer->id; ?></p>
                <p><strong>Name:</strong> <?php echo $lawyer->name; ?></p>
                <p><strong>Type:</strong> <?php echo $lawyer->type; ?></p>
                <p><strong>Description:</strong> <?php echo $lawyer->description; ?></p>
                <p><strong>Price:</strong> <?php echo $lawyer->price; ?></p>
                <a href="../lawyers.php" class="btn btn-secondary back-button">Back to List</a>
            </div>
        </div>
    </div>


</body>

</html>
