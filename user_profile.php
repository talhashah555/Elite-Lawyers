<?php

include 'config/db.php';
session_start();
$user_id = $_SESSION['id'];

$stmt = $conn->prepare("SELECT * FROM `client_registers` WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$fetch = $result->fetch_assoc();
$stmt->close();

if(isset($_POST['update_profile'])) {

    $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
    $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

    // Update user information
    mysqli_query($conn, "UPDATE `client_registers` SET UserName = '$update_name', email = '$update_email' WHERE id = '$user_id'") or die('query failed');
    $_SESSION['username'] = $update_name;
    $_SESSION['email'] = $update_email;

    $new_pass = $_POST['new_pass'];
    $confirm_pass = $_POST['confirm_pass'];

    if(!empty($new_pass) || !empty($confirm_pass)){
        if($new_pass != $confirm_pass){
            echo "<script>alert('Confirm password not matched!');</script>";
        } else {
            $hashed_pass = password_hash($new_pass, PASSWORD_DEFAULT);
            $update_query = "UPDATE `client_registers` SET password = '$hashed_pass' WHERE id = '$user_id'";
            if(mysqli_query($conn, $update_query)){
                echo "<script>alert('Password updated successfully!');</script>";
            } else {
                echo "<script>alert('Error updating password: " . mysqli_error($conn) . "');</script>";
            }
        }
    }

    if(isset($_FILES['update_image']) && $_FILES['update_image']['size'] > 0){
        // Process the image
        $update_image = $_FILES['update_image']['name'];
        $update_image_size = $_FILES['update_image']['size'];
        $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
        $update_image_folder = 'assets/images/uploaded_img/' . $update_image;

        // Initialize message array
        $message = [];

        // Check if the directory exists, if not, create it
        $upload_dir = 'assets/images/uploaded_img/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        // Validate image size (example: limit to 2MB)
        if($update_image_size > 2000000){
            $message[] = 'Image is too large';
        } else {
            // Validate image type
            $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
            $detected_type = mime_content_type($update_image_tmp_name);

            if(in_array($detected_type, $allowed_types)){
                // Prepare and execute the update query securely
                $stmt = $conn->prepare("UPDATE `client_registers` SET image = ? WHERE id = ?");
                $stmt->bind_param("si", $update_image, $user_id);

                if($stmt->execute()){
                    if(move_uploaded_file($update_image_tmp_name, $update_image_folder)){
                        $message[] = 'Image updated successfully!';
                    } else {
                        $message[] = 'Failed to move uploaded file';
                    }
                } else {
                    $message[] = 'Query failed';
                }

                $stmt->close();
            } else {
                $message[] = 'Invalid image type';
            }
        }
    } else {
        echo "<script>alert('No image was uploaded, skipping image processing')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Update Profile</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

    :root{
       --blue:#3498db;
       --dark-blue:#2980b9;
       --red:#e74c3c;
       --dark-red:#c0392b;
       --black:#333;
       --white:#fff;
       --light-bg:#eee;
       --box-shadow:0 5px 10px rgba(0,0,0,.1);
    }

    *{
       font-family: 'Poppins', sans-serif;
       margin:0; padding:0;
       box-sizing: border-box;
       outline: none; border: none;
       text-decoration: none;
    }

    *::-webkit-scrollbar{
       width: 10px;
    }

    *::-webkit-scrollbar-track{
       background-color: transparent;
    }

    *::-webkit-scrollbar-thumb{
       background-color: var(--blue);
    }

    .btn,
    .delete-btn{
       width: 100%;
       border-radius: 5px;
       padding:10px 30px;
       color:var(--white);
       display: block;
       text-align: center;
       cursor: pointer;
       font-size: 20px;
       margin-top: 10px;
    }

    .btn{
       background-color: var(--blue);
    }

    .btn:hover{
       background-color: var(--dark-blue);
    }

    .delete-btn{
       background-color: var(--red);
    }

    .delete-btn:hover{
       background-color: var(--dark-red);
    }

    .message{
       margin:10px 0;
       width: 100%;
       border-radius: 5px;
       padding:10px;
       text-align: center;
       background-color: var(--red);
       color:var(--white);
       font-size: 20px;
    }

    .form-container{
       min-height: 100vh;
       background-color: var(--light-bg);
       display: flex;
       align-items: center;
       justify-content: center;
       padding:20px;
    }

    .form-container form{
       padding:20px;
       background-color: var(--white);
       box-shadow: var(--box-shadow);
       text-align: center;
       width: 500px;
       border-radius: 5px;
    }

    .form-container form h3{
       margin-bottom: 10px;
       font-size: 30px;
       color:var(--black);
       text-transform: uppercase;
    }

    .form-container form .box{
       width: 100%;
       border-radius: 5px;
       padding:12px 14px;
       font-size: 18px;
       color:var(--black);
       margin:10px 0;
       background-color: var(--light-bg);
    }

    .form-container form p{
       margin-top: 15px;
       font-size: 20px;
       color:var(--black);
    }

    .form-container form p a{
       color:var(--red);
    }

    .form-container form p a:hover{
       text-decoration: underline;
    }

    .container{
       min-height: 100vh;
       background-color: var(--light-bg);
       display: flex;
       align-items: center;
       justify-content: center;
       padding:20px;
    }

    .container .profile{
       padding:20px;
       background-color: var(--white);
       box-shadow: var(--box-shadow);
       text-align: center;
       width: 400px;
       border-radius: 5px;
    }

    .container .profile img{
       height: 150px;
       width: 150px;
       border-radius: 50%;
       object-fit: cover;
       margin-bottom: 5px;
    }

    .container .profile h3{
       margin:5px 0;
       font-size: 20px;
       color:var(--black);
    }

    .container .profile p{
       margin-top: 20px;
       color:var(--black);
       font-size: 20px;
    }

    .container .profile p a{
       color:var(--red);
    }

    .container .profile p a:hover{
       text-decoration: underline;
    }

    .update-profile{
       min-height: 100vh;
       background-color: var(--light-bg);
       display: flex;
       align-items: center;
       justify-content: center;
       padding:20px;
    }

    .update-profile form{
       padding:20px;
       background-color: var(--white);
       box-shadow: var(--box-shadow);
       text-align: center;
       width: 700px;
       text-align: center;
       border-radius: 5px;
    }

    .update-profile form img{
       height: 200px;
       width: 200px;
       border-radius: 50%;
       object-fit: cover;
       margin-bottom: 5px;
    }

    .update-profile form .flex{
       display: flex;
       justify-content: space-between;
       margin-bottom: 20px;
       gap:15px;
    }

    .update-profile form .flex .inputBox{
       width: 49%;
    }

    .update-profile form .flex .inputBox span{
       text-align: left;
       display: block;
       margin-top: 15px;
       font-size: 17px;
       color:var(--black);
    }

    .update-profile form .flex .inputBox input{
       width: 100%;
       border-radius: 5px;
       padding:12px 14px;
       font-size: 18px;
       color:var(--black);
       margin-top: 10px;
       background-color: var(--light-bg);
    }
   </style>
</head>
<body>
   
<div class="update-profile">

   <?php
   $stmt = $conn->prepare("SELECT * FROM `client_registers` WHERE id = ?");
   $stmt->bind_param("i", $user_id);
   $stmt->execute();
   $result = $stmt->get_result();
   $fetch = $result->fetch_assoc();
   $stmt->close();
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <!-- Display current profile image -->
      <?php
      if(empty($fetch['image'])){
          echo '<img src="assets/images/default_avatar.png" alt="Default Avatar">';
      } else {
          echo '<img src="assets/images/uploaded_img/' . htmlspecialchars($fetch['image']) . '" alt="User Image">';
      }
      ?>
    
      <div class="flex">
         <div class="inputBox">
            <span>Username :</span>
            <input type="text" name="update_name" value="<?php echo htmlspecialchars($fetch['UserName']); ?>" class="box">
            <span>Your Email :</span>
            <input type="email" name="update_email" value="<?php echo htmlspecialchars($fetch['email']); ?>" class="box">
            <span>Update Your Pic :</span>
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
         </div>
         <div class="inputBox">
            <span>New Password :</span>
            <input type="password" name="new_pass" placeholder="Enter new password" class="box">
            <span>Confirm Password :</span>
            <input type="password" name="confirm_pass" placeholder="Confirm new password" class="box">
         </div>
      </div>
      <input type="submit" value="Update Profile" name="update_profile" class="btn">
      <a href="user_profile1.php" class="delete-btn">Go Back</a>
   </form>

</div>

</body>
</html>
