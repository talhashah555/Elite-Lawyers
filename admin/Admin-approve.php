<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sAdmin Approvals</title>
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
                        <h1>Admin Approvals</h1>
                    </div>
                    <div class="col-sm-6">
                        <!-- Empty for potential future content -->
                    </div>
                </div>
            </div>
        </div>

        <div class="table-container">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Id <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Name <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Email <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Status <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include('../config/db.php');

                    // Fetch users with pending status
                    $query = "SELECT * FROM admin_registers WHERE status = 'pending'";
                    $result = mysqli_query($conn, $query);

                    // Loop through each user and display their information
                    while ($user = mysqli_fetch_object($result)):
                    ?>
                        <tr>
                            <td><?php echo $user->id; ?></td>
                            <td><?php echo $user->firstname . ' ' . $user->lastname; ?></td>
                            <td><?php echo $user->email; ?></td>
                            <td><?php echo $user->status; ?></td>
                            <td>
                                <form action="" method="post" class="action-btns">
                                    <input type="hidden" name="id" value="<?php echo $user->id; ?>">
                                    <input type="submit" class="btn btn-success" name="Approve" value="Approve">
                                    <input type="submit" class="btn btn-danger" name="Deny" value="Deny">
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="../assets/js/adminapprove.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4mg60m9Uef1O7WlBOhFpZoGrgJc4jzbaXoUq/2rp8HpleEJzQ/E" crossorigin="anonymous"></script>
</body>
</html>

<?php
// Handle form submissions for Approve and Deny actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    if (isset($_POST['Approve'])) {
        // Approve the user
        $query = "UPDATE admin_registers SET status = 'approved' WHERE id = $id";
        mysqli_query($conn, $query);
        echo "<script>alert('User approved');</script>";
    } elseif (isset($_POST['Deny'])) {
        // Deny (delete) the user
        $query = "DELETE FROM admin_registers WHERE id = $id";
        mysqli_query($conn, $query);
        echo "<script>alert('User rejected');</script>";
    }

}
?>
