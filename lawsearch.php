

<?php
    include('includes/header.php'); // Assuming this includes your HTML header
include('config/db.php');?>

<a href="lawyers.php" class="back-button"><i class="fa-solid fa-arrow-left"></i><span>Back</span></a>
<style>
    .back-button {
    float: right;
    padding: 10px 20px;
    font-size: 16px;
    text-decoration: none;
    color: #fff;
    background-color: #28a745; /* Success color */
    border-radius: 20px;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.back-button:hover {
    background-color: green; 
}


</style>

<?php

if (isset($_GET["query"])) {
    $search_query = $_GET["query"];
    $search_type = isset($_GET["search_type"]) ? $_GET["search_type"] : "name";

    // Validate and sanitize search input (important to prevent SQL injection)
    $search_query = mysqli_real_escape_string($conn, $search_query);

    // Prepare SQL statement based on search type
    if ($search_type === "name") {
        $sql = "SELECT * FROM lawyers WHERE name LIKE '%$search_query%' AND status = 'approved'";
    } elseif ($search_type === "type") {
        $sql = "SELECT * FROM lawyers WHERE type LIKE '%$search_query%'AND status = 'approved'";
    }

    $result = $conn->query($sql);

    if ($result && mysqli_num_rows($result) > 0) {
        echo '<div class="container py-5">';
        $count = 0;

        while ($row = mysqli_fetch_assoc($result)) {
            if ($count % 3 == 0) {
                echo '<div class="row">';
            }

            $namee = $row['name'];
            $dess = $row['description'];
            $typee = $row['type'];
            $pricee = $row['price'];
            $imagee = $row['image'];
?>
            
            <div class="col-lg-4 mb-4">
            <div class="card ">
                <img src="<?php echo $imagee; ?>" class="card-img-top" alt="Lawyer Image" height="500px" width="100%">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $namee; ?></h5>
                    <p class="card-text"><?php echo $dess; ?></p>
              <div>he/she is a <?php echo $typee ?> Lawyers</div>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <h3>$<?php  echo $pricee ?></h3>
                       <a href="appoint.php?user=<?php echo $namee ?>"><button class="btn btn-primary">Appoint</button></a> 
                    </div>
                </div>
            </div>
        </div>
<?php
        $count++;

        if ($count % 3 == 0) {
            echo '</div>'; // Close row after every 3 items
        }
    }

    if ($count % 3 != 0) {
        echo '</div>'; // Close row if there are remaining items
    }

    echo '</div>'; // Close container
}   
}
       

?>
    <link href="assets/css/stylee.css" rel="stylesheet">

<?php include('includes/footer.php'); // Assuming this includes your HTML footer?><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4mg60m9Uef1O7WlBOhFpZoGrgJc4jzbaXoUq/2rp8HpleEJzQ/E"
        crossorigin="anonymous"></script>