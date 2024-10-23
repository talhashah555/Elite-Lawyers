<?php
include 'config/db.php';
include 'includes/header.php';

?><!DOCTYPE html>
<html lang="en">
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

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Cases Info</title>
    <link rel="stylesheet" href="../assets/css/adminapprove.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        /* Custom styles for the table */
        .table-container {
            width: 100%;
            max-height: 500px; /* Adjust as needed */
            overflow-y: auto;
            overflow-x: auto;
            display: block;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th, .table td {
            white-space: nowrap;
            padding: 0.3rem; /* Adjust padding as needed */
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .table tbody + tbody {
            border-top: 2px solid #dee2e6;
        }

        .table .table {
            background-color: #fff;
        }

        .form-control {
            padding: 0.3rem 0.5rem; /* Adjust padding as needed */
        }

        .action-btns {
            display: flex;
            gap: 5px;
        }

        .action-btns .btn {
            padding: 0.2rem 0.5rem;
        }
    </style>
</head>
<body>
  <link rel="stylesheet" href="assets/css/adminapprove.css">

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Cases Info</h1>
                    </div>
                    <div class="col-sm-6">
                       
                    </div>
                </div>
            </div>
        </div>

     

            <div class="table-container" style="margin-top:100px;margin-bottom:500px">
            <table>
                    <thead>
                        <tr>
                            <th> Name <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Lawyer Name <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Email <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Case <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Time <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Date <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Status <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Payment Status <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Action <span class="icon-arrow">&UpArrow;</span></th>

                        
                        </tr>
                    </thead>
                    

                    <tbody>
    <?php if(isset($_SESSION['email'])){
        $email = $_SESSION['email'];
        $query = "SELECT * FROM client_cases where email = '$email'";
        $result = mysqli_query($conn, $query);
        while ($user = mysqli_fetch_object($result)): ?>
    <tr>
        <td><?php echo $user->name; ?></td>
        <td><?php echo $user->lawyer_name; ?></td>
        <td><?php echo $user->email ?></td>
        <td><?php echo $user->case_name ?></td>
        <td><?php echo $user->time; ?></td>
        <td><?php echo $user->date; ?></td>
        <td><?php echo $user->status; ?></td>
        <td><?php echo $user->pay_status; ?></td>
        <td>
            <?php 
            $sql = "SELECT * FROM lawyers WHERE name = '$user->lawyer_name'";
            $result_lawyer = mysqli_query($conn, $sql);
            $row_lawyer = mysqli_fetch_assoc($result_lawyer);
            if ($row_lawyer != null) {
                $pay = $row_lawyer['price'];
            } else {
                $pay = 0;
            }
            ?>
           <?php if($user->status == 'approved' && $user->pay_status != 'Paid'): ?>
    <a href="billings.php?saim=<?php echo $pay?>"><button class="btn btn-success">Pay</button></a>
<?php else: ?>
    <button class="btn btn-danger" disabled>Pay</button>
<?php endif; ?>
        </td>
    </tr>
    <?php endwhile;} ?>
</tbody>
                </table>
            </div>
        </div>
    </div>
   <?php
    include 'includes/footer.php';
?>
    <script src="../assets/js/adminapprove.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4mg60m9Uef1O7WlBOhFpZoGrgJc4jzbaXoUq/2rp8HpleEJzQ/E" crossorigin="anonymous"></script>
</body>

</html>