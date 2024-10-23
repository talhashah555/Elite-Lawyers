<?php
include('../../config/db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // SQL query to delete the lawyer
    $query = "DELETE FROM client_registers WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
header("location:../clients.php") ;   } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "No ID provided.";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Lawyer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  
</body>
</html>
