<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Lawyers</title>
    
   <link rel="stylesheet" href="../assets/css/adminapprove.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        /* Custom styles for the table */
        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table th,
        .table td {
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
    </style>
</head>

<body>
    <?php include('../sidebar.php') ?>
    <?php
include('../../config/db.php');

    $user_result = mysqli_query($conn, "SELECT * FROM lawyers");
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <!-- Page title -->
                        <h1>Add Lawyers</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <!-- Breadcrumbs -->
                       
                    </div><!-- /.col -->
                </div><!-- /.row -->
                
            </div><!-- /.container-fluid -->
        </div><!-- /.content-header -->
                                     



        <?php


if (isset($_POST['submit'])) {

    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $specialization = $_POST['speciality'];

    // Prepare the SQL statement with placeholders
    $sql = "INSERT INTO lawyers (name, email,  type, password) VALUES ( ?, ?, ?, ?)";
    // Create a prepared statement
    $stmt = mysqli_prepare($conn, $sql);
    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "ssss", $firstname, $email, $specialization, $pass);
    // Execute the prepared statement
    $result = mysqli_stmt_execute($stmt);

    // Check if the query was executed successfully
    if ($result) {
        // Insert data into lawyer_register table
        $sql_register = "INSERT INTO lawyer_registers (firstname, email, password) VALUES (?, ?, ?)";
        $stmt_register = mysqli_prepare($conn, $sql_register);
        mysqli_stmt_bind_param($stmt_register, "sss", $firstname, $email, $pass);
        mysqli_stmt_execute($stmt_register);

      
    } 

    // Close the statements and database connection
    mysqli_stmt_close($stmt);
    mysqli_stmt_close($stmt_register);

}
    
?>

<!-- Your HTML form remains unchanged -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="assets/css/lawyerregister.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<style>
    /* ===== Google Font Import - Poppins ===== */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
body{
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: url('../../assets/images/hero-bg.jpg');
  
    
}
.containerr{
    position: relative;
    width: 90%;
    border-radius: 6px;
    padding: 30px;
    margin: 0 auto;
    background-color: #fff;
    box-shadow: 0 5px 10px rgba(0,0,0,0.1);
    height:100%;
}
.containerr header{
    position: relative;
    font-size: 20px;
    font-weight: 600;
    color: #333;
}
.containerr header::before{
    content: "";
    position: absolute;
    left: 0;
    bottom: -2px;
    height: 3px;
    width: 27px;
    border-radius: 8px;
    background-color: #4070f4;
}
.containerr form{
    position: relative;
    margin-top: 16px;
    min-height: 490px;
    background-color: #fff;
    overflow: hidden;
    opacity:.8;
}
.containerr form .form{
    position: absolute;
    background-color: #fff;
    transition: 0.3s ease;
}
.containerr form .form.second{
    opacity: 0;
    pointer-events: none;
    transform: translateX(100%);
}

form.secActive .form.first{
    opacity: 0;
    pointer-events: none;
    transform: translateX(-100%);
}
.containerr form .title{
    display: block;
    margin-bottom: 8px;
    font-size: 16px;
    font-weight: 500;
    margin: 6px 0;
    color: #333;
}
.containerr form .fields{
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
}
form .fields .input-field{
    display: flex;
    width: calc(100% / 3 - 15px);
    flex-direction: column;
    margin: 4px 0;
}
.input-field label{
    font-size: 12px;
    font-weight: 500;
    color: #2e2e2e;
}
.input-field input, select{
    outline: none;
    font-size: 14px;
    font-weight: 400;
    color: #333;
    border-radius: 5px;
    border: 1px solid #aaa;
    padding: 0 15px;
    height: 42px;
    margin: 8px 0;
}
.input-field input :focus,
.input-field select:focus{
    box-shadow: 0 3px 6px rgba(0,0,0,0.13);
}
.input-field select,
.input-field input[type="date"]{
    color: #707070;
}
.input-field input[type="date"]:valid{
    color: #333;
}
.containerr form button, .backBtn{
    display: flex;
    align-items: center;
    justify-content: center;
    height: 45px;
    max-width: 200px;
    width: 100%;
    border: none;
    outline: none;
    color: #fff;
    border-radius: 5px;
    /* margin: 25px 0; */
    margin-bottom:200px;
    background-color: #4070f4;
    transition: all 0.3s linear;
    cursor: pointer;
}
.containerr form .btnText{
    font-size: 14px;
    font-weight: 400;
}
form button:hover{
    background-color: #265df2;
}
form button i,
form .backBtn i{
    margin: 0 6px;
}
form .backBtn i{
    transform: rotate(180deg);
}
form .buttons{
    display: flex;
    align-items: center;
}
form .buttons button , .backBtn{
    margin-right: 14px;
}

@media (max-width: 750px) {
    .containerr form{
        overflow-y: scroll;
    }
    .containerr form::-webkit-scrollbar{
       display: none;
    }
    form .fields .input-field{
        width: calc(100% / 2 - 15px);
    }
}

@media (max-width: 550px) {
    form .fields .input-field{
        width: 100%;
    }
}
</style>
    <title>lawyer Regisration Form </title> 
</head>
<body>
<div class="containerr">
        <header>Lawyer Registration</header>

        <form action="../lawyers.php" method="post" role="form" enctype="multipart/form-data">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>First Name</label>
                            <input type="text" name="firstname" placeholder="first name" required>
                        </div>

                        <div class="input-field">
                            <label>Last Name</label>
                            <input type="text" name="lastname" placeholder="last name" required>
                        </div>

                        <div class="input-field">
                            <label>Email</label>
                            <input type="text" name="email" placeholder="Enter your email" required>
                        </div>

                        <div class="input-field">
                            <label>Mobile Number</label>
                            <input type="number" name="mobile_number" placeholder="Enter mobile number" required>
                        </div>

                        <div class="input-field">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Enter Password " required>

                        </div>

                        <div class="input-field">
                            <label>Image</label>
                            <input type="file" name="image" placeholder="Enter your ccupation" required>
                        </div>
                    </div>
                </div>

                <div class="details ID">
                    <span class="title">Educational Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>University/College Name</label>
                            <input type="text" name="institute" placeholder="Enter your institute" required>
                        </div>

                        <div class="input-field">
                            <label>Degree</label>
                            <input type="text" name="degree" placeholder="Enter your degree" required>
                        </div>

                        <div class="input-field">
                            <label>Passing Year</label>
                            <input type="text" name="passing_year" placeholder="Enter your passing year" required>
                        </div>

                        <div class="input-field">
                            <label>Address</label>
                            <input type="text" name="address" placeholder="Enter your address" required>
                        </div>

                        <div class="input-field">
                            <label>City</label>
                            <input type="text" name="city" placeholder="Enter your city" required>
                        </div>
						<div class="form-group">
						<label>speciality</label><br>

								<select id="practise" name="speciality" class="form-control">
									<option value=" " selected>Choose...</option>
									<option value="Criminal Lawyer">Criminal Lawyer</option>
									<option value="Civil Lawyer">Civil Lawyer</option>
									<option value="Divorce Lawyer">Divorce Lawyer</option>
									<option value="Affidavit Lawyer">Affidavit Lawyer</option>
									

								</select>
							</div>
                    
                    </div>
         

                    <button class="nextBtn" name="submit">
                        <span class="btnText" >submit</span>
                        <i class="uil uil-navigator"></i>
                    </button>
                </div> 
            </div>

         
    </div>
	
    <script src="assets/js/lawyerregister.js"></script>
</body>
</html>
</html>
     <!-- Main content section -->
     <main class="table" id="customers_table">
            <section class="table__header">
                <h1>All Lawyers</h1>
             
            </section>
            <section class="table__body">
                <table>
                    <thead>
                        <tr>
                            <th> Id <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Name <span class="icon-arrow">&UpArrow;</span></th>
                            <th> type <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Description <span class="icon-arrow">&UpArrow;</span></th>
                            <th> price <span class="icon-arrow">&UpArrow;</span></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM lawyers ";
                        $result = mysqli_query($conn, $query);
                        while ($user = mysqli_fetch_object($result)):
                        ?>
                            <tr>
                                <td><?php echo $user->id; ?></td>
                                <td><?php echo $user->name ?></td>
                                <td><?php echo $user->type; ?></td>
                                <td><?php echo $user->description; ?></td>
                                <td><?php echo $user->price; ?></td>
                            
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                </section>
            </main>
    </div><!-- /.content-wrapper -->



    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4mg60m9Uef1O7WlBOhFpZoGrgJc4jzbaXoUq/2rp8HpleEJzQ/E"
        crossorigin="anonymous"></script>
</body>

</html>
