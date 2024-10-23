<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer Info</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
 
       
    </style>
</head>
<link rel="stylesheet" href="../assets/css/adminapprove.css">
<body>
    <?php include('sidebar.php') ?>
    <?php
    include('../config/db.php');

    $user_result = mysqli_query($conn, "SELECT * FROM Footer");
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <!-- Page title -->
                        <h1>Footer Info</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <!-- Breadcrumbs -->
                       
                    </div><!-- /.col -->
                </div><!-- /.row -->

            </div><!-- /.container-fluid -->
        </div><!-- /.content-header -->
       
        <!-- Main content section -->
        <main class="table" id="customers_table">
    
            <section class="table__body">
                <table style="margin: 0 auto;">
                    <thead>
                        <tr>
                            <th> Address <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Email <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Phone <span class="icon-arrow">&UpArrow;</span></th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM Footer";
                        $result = mysqli_query($conn, $query);
                        while ($user = mysqli_fetch_object($result)):
                        ?>
                            <tr>
                                <td><?php echo $user->Address; ?></td>
                                <td><?php echo $user->email; ?></td>
                                <td><?php echo $user->Phone; ?></td>
                               
                                <td>
                                    <a href="Footeredit.php?id=<?php echo $user->id; ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </section>
        </main>
        <?php include('footer.php'); ?>
        <script src="../assets/js/adminapprove.js"></script>

        <!-- Bootstrap JS Bundle -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ygbV9kiqUc6oa4mg60m9Uef1O7WlBOhFpZoGrgJc4jzbaXoUq/2rp8HpleEJzQ/E"
            crossorigin="anonymous"></script>
    </div>
</body>

</html>
