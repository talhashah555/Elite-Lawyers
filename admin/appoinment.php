<?php
include '../config/db.php';
include 'sidebar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .table {
            width: 70%;
            height: 90vh;
            background-color: #fff5;
            margin: 0 auto;
            backdrop-filter: blur(7px);
            box-shadow: 0 .4rem .8rem #0005;
            border-radius: .8rem;
            overflow: hidden;
        }
    </style>
</head>
<body>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <!-- Page title -->
                        <h1>Appointments</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <main class="table" id="customers_table">
            <section class="table__header">
                <h1>All Appointments of Lawyers</h1>
            </section>
            <section class="table__body">
                <table style="width:100%;">
                    <thead>
                        <tr>
                            <th>Id <span class="icon-arrow">&UpArrow;</span></th>
                            <th>Client Name <span class="icon-arrow">&UpArrow;</span></th>
                            <th>Lawyer Name <span class="icon-arrow">&UpArrow;</span></th>
                            <th>Appointment Time <span class="icon-arrow">&UpArrow;</span></th>
                            <th>Status <span class="icon-arrow">&UpArrow;</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM client_cases ";
                        $result = mysqli_query($conn, $query);

                        // Loop through each appointment and display their information
                        while ($appointment = mysqli_fetch_object($result)):
                        ?>
                            <tr>
                                <td><?php echo $appointment->id; ?></td>
                                <td><?php echo $appointment->name; ?></td>
                                <td><?php echo $appointment->lawyer_name; ?></td>
                                <td><?php echo $appointment->time; ?></td>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="id" value="<?php echo $appointment->id; ?>">
                                        <input type="submit" class="btn btn-success" name="Approve" value="Approve">
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </section>
        </main>
    </div>

    <?php
    // Handle form submission for approval
    if (isset($_POST['Approve'])) {
        $id = $_POST['id'];
        $query = "UPDATE client_cases SET status = 'Done' WHERE id = $id";
        mysqli_query($conn, $query);
        echo "<script>alert('Appointment approved');</script>";
       
        exit();
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4mg60m9Uef1O7WlBOhFpZoGrgJc4jzbaXoUq/2rp8HpleEJzQ/E" crossorigin="anonymous"></script>
</body>
</html>
