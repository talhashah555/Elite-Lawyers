<?php
include '../config/db.php';
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients Info</title>
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
                        <h1>Clients Info</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-12">
                <a href="client-crud/clientadd.php" class="btn btn-success float-right">+ Add</a>
            </div>

            <div class="table-container">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Id <span class="icon-arrow">&UpArrow;</span></th>
                            <th>User Name <span class="icon-arrow">&UpArrow;</span></th>
                            <th>First Name <span class="icon-arrow">&UpArrow;</span></th>
                            <th>Last Name <span class="icon-arrow">&UpArrow;</span></th>
                            <th>Email <span class="icon-arrow">&UpArrow;</span></th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM client_registers";
                        $result = mysqli_query($conn, $query);
                        while ($client = mysqli_fetch_object($result)):
                        ?>
                            <tr>
                                <td><?php echo $client->id; ?></td>
                                <td><?php echo $client->UserName; ?></td>
                                <td><?php echo $client->First_name; ?></td>
                                <td><?php echo $client->Last_name; ?></td>
                                <td><?php echo $client->email; ?></td>
                                <td>
                                    <div class="action-btns">
                                        <a href="client-crud/clientview.php?id=<?php echo $client->id; ?>" class="btn btn-info"><i class="fa-solid fa-eye"></i></a>
                                        <a href="client-crud/clientedit.php?id=<?php echo $client->id; ?>" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="client-crud/clientdelete.php?id=<?php echo $client->id; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?');"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="../assets/js/adminapprove.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4mg60m9Uef1O7WlBOhFpZoGrgJc4jzbaXoUq/2rp8HpleEJzQ/E" crossorigin="anonymous"></script>
</body>

</html>
