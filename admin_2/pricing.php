<?php
include('../config/db.php');

// Check if the 'user' parameter is set in the URL
if (isset($_GET['user'])) {
    $name = $_GET['user']; // Get the 'user' parameter from the URL

    // Use prepared statements to avoid SQL injection
    $query = "SELECT * FROM lawyers WHERE name = ?";
    $stmt = mysqli_prepare($conn, $query);
    
    // Check if preparation was successful
    if ($stmt) {
        // Bind parameters (s for string)
        mysqli_stmt_bind_param($stmt, "s", $name);
        
        // Execute the statement
        mysqli_stmt_execute($stmt);
        
        // Get the result
        $result = mysqli_stmt_get_result($stmt);
        
        // Fetch the data
        if ($result) {
            $lawyer = mysqli_fetch_assoc($result);
            
            // Check if any data was returned
           
        } else {
            echo "Error fetching lawyer information: " . mysqli_error($conn);
        }
        
        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing the query: " . mysqli_error($conn);
    }

    // Update the lawyer's information based on the form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $Quote = $_POST['Quote'];
        $Price = $_POST['price'];

        // Prepare the UPDATE query
        $updateQuery = "UPDATE lawyers SET price=?, description=? WHERE name=?";
        $stmt = mysqli_prepare($conn, $updateQuery);

        // Check if preparation was successful
        if ($stmt) {
            // Bind parameters (ss for string, s for string)
            mysqli_stmt_bind_param($stmt, "sss", $Price, $Quote, $name);
            
            // Execute the statement
            if (mysqli_stmt_execute($stmt)) {
                $message = "Record updated successfully.";
                header("location:cases.php");
            } else {
                $message = "Error updating record: " . mysqli_stmt_error($stmt);
            }

            // Close the statement
            mysqli_stmt_close($stmt);
        } else {
            echo "Error preparing the update query: " . mysqli_error($conn);
        }
    }
}

// Close the database connection
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit About</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
            background-image: url('../assets/images/hero-bg.jpg');
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
            margin: 0 auto;
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
        .input-field input, select {
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
    <div class="container mt-5 wrapper">
        <h1>Edit Quote and price</h1>
        <?php if (isset($message)): ?>
            <div class="alert alert-info" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="AboutUs" class="form-label">Quote</label>
                <input type="text" class="form-control" id="AboutUs" name="Quote" value="<?php echo htmlspecialchars($lawyer['description']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Price</label>
                <input type="number" class="form-control" id="WhoWeAre" name="price" value="<?php echo htmlspecialchars($lawyer['price'], ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>
        
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="dash.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
