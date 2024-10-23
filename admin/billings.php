<?php
include '../config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billings And Payments</title>
    <link rel="stylesheet" href="../assets/css/adminapprove.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .table-container {
            width: 100%;
            max-height: 500px;
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
            padding: 0.3rem;
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
            padding: 0.3rem 0.5rem;
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
                        <h1>Payments Info</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-container">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Full Name <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Email <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Work Phone <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Name on Card <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Credit Card <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Status <span class="icon-arrow">&UpArrow;</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM billings WHERE status = 'pending'";
                    $result = mysqli_query($conn, $query);

                    // Loop through each pending billing record and display their information
                    while ($user = mysqli_fetch_object($result)):
                    ?>
                        <tr>
                            <td><?php echo $user->full_name; ?></td>
                            <td><?php echo $user->email; ?></td>
                            <td><?php echo $user->work_phone; ?></td>
                            <td><?php echo $user->name_on_card; ?></td>
                            <td><?php echo $user->credit_card_number; ?></td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="id" value="<?php echo $user->id; ?>">
                                    <input type="submit" class="btn btn-success" name="Approve" value="Approve">
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php
    // Handle form submission for approval
    if (isset($_POST['Approve'])) {
        $id = $_POST['id'];
        $query = "UPDATE billings SET status = 'approved' WHERE id = $id";
        mysqli_query($conn, $query);
        echo "<script>alert('Payment approved');</script>";
        exit();
    }
    ?>

    <script src="../assets/js/adminapprove.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4mg60m9Uef1O7WlBOhFpZoGrgJc4jzbaXoUq/2rp8HpleEJzQ/E" crossorigin="anonymous"></script>
</body>
</html>
