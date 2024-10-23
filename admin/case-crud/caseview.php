<?php
include_once('../../config/db.php'); // include your database connection

// Check if the ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // SQL query to select the case
    $query = "SELECT * FROM client_cases WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $case = mysqli_fetch_object($result);
    } else {
        echo "No case found with the provided ID.";
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
    <title>View case</title>
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
                <h2>case Details</h2>
                <p><strong>Client Name:</strong> <?php echo $case->name; ?></p>
                <p><strong>Lawyer Name:</strong> <?php echo $case->lawyer_name; ?></p>
                <p><strong>Case name:</strong> <?php echo $case->case_name?></p>
                <p><strong>Details:</strong> <?php echo $case->case_detail; ?></p>
                <a href="../case.php" class="btn btn-secondary back-button">Back to List</a>
            </div>
        </div>
    </div>


</body>

</html>
