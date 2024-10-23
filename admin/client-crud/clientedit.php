<?php
include('../../config/db.php');

// Check if ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the current data for the client
    $query = "SELECT * FROM client_registers WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $client = mysqli_fetch_object($result);
    } else {
        echo "No client found with this ID.";
        exit;
    }
} else {
    echo "No ID provided.";
    exit;
}

// Update the client details if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $UserName = $_POST['UserName'];
    $First_name = $_POST['First_name'];
    $Last_name = $_POST['Last_name'];
    $email = $_POST['email'];

    // Update query
    $query = "UPDATE client_registers SET UserName='$UserName', First_name='$First_name', Last_name='$Last_name', email='$email' WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
header("location:../clients.php")   ; } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Edit Client</h1>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="UserName" class="form-label">UserName</label>
                <input type="text" class="form-control" id="UserName" name="UserName" value="<?php echo $client->UserName; ?>" required>
            </div>
            <div class="mb-3">
                <label for="First_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="First_name" name="First_name" value="<?php echo $client->First_name; ?>" required>
            </div>
            <div class="mb-3">
                <label for="Last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="Last_name" name="Last_name" value="<?php echo $client->Last_name; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $client->email; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="submit" class="btn btn-secondary "><a href="../clients.php">cancel</a></button>
        </form>
    </div>
</body>

</html> <style>
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
        background-image: url('../../assets/images/hero-bg.jpg');
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
    .container {
        width: 715px;
        background: rgba(255, 255, 255, 0.15); /* Adjust the opacity here */
        border-radius: 5px;
        box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.05);
        margin: 0 auto;
    }
    .container header {
        font-size: 22px;
        font-weight: 600;
        padding: 20px 30px;
        border-bottom: 1px solid #ccc;
    }
    .container form {
        margin: 35px 30px;
    }
    .container form.disabled {
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
    .container form i {
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
        .container header {
            text-align: center;
        }
        .container form {
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
    .input-field input, select{
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
