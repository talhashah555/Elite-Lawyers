<?php
include '../config/db.php';
session_start();
?><!DOCTYPE html>
<html lang="en">

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
    <?php include('sidebar.php'); ?>

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

     

            <div class="table-container">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Client Name <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Lawyer Name <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Case Name <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Appointment Time <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Case Detail <span class="icon-arrow">&UpArrow;</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                        $saim = $_SESSION['username'];
                        $query = "SELECT * FROM client_cases WHERE lawyer_name = '$saim' and status!='approved'";
                        $result = mysqli_query($conn, $query);
                        if ($result) {
                            while ($user = mysqli_fetch_object($result)) {
                                ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($user->name); ?></td>
                                    <td><?php echo htmlspecialchars($user->lawyer_name); ?></td>
                                    <td><?php echo htmlspecialchars($user->case_name); ?></td>
                                    <td><?php echo htmlspecialchars($user->time); ?></td>
                                    <td><?php echo htmlspecialchars($user->case_detail); ?></td>
                                    <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="id" value="<?php echo $user->id; ?>">
                                        <input type="submit" class=" btn btn-success" name="Approve" value="Approve">
                                        <input type="submit" class="btn btn-danger" name="Deny" value="Deny">
                                    </form>
                                </td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo "Error: " . mysqli_error($conn);
                        }
                    
                    ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <?php

if (isset($_POST['Approve'])) {
    $id = $_POST['id'];
    $query = "UPDATE client_cases SET status ='approved' WHERE id = $id";
    mysqli_query($conn, $query);
    echo "<script>alert('User approvred')</script>";
  
    exit();
    } elseif (isset($_POST['Deny'])) {
        $id = $_POST['id'];
        $query = "UPDATE client_cases SET status ='rejected' WHERE id = $id";
        mysqli_query($conn, $query);
    echo "<script>alert('User rejected')</script>";

     

        exit();

    }

?>
    <script src="../assets/js/adminapprove.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4mg60m9Uef1O7WlBOhFpZoGrgJc4jzbaXoUq/2rp8HpleEJzQ/E" crossorigin="anonymous"></script>
</body>

</html>