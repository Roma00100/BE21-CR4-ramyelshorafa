<?php 
require_once 'db_connect.php';

if(isset($_GET["publisher"])) {
    $publisherName = $_GET["publisher"];
    
    $sql = "SELECT * FROM media WHERE publisher_name = '$publisherName'";
    $result = mysqli_query($connect, $sql);

    if(mysqli_num_rows($result) == 0) {
        $layout = "<p>No media found for this publisher.</p>";
    } else {
        $layout = "";
        while($row = mysqli_fetch_assoc($result)) {
            $publishDate = date("F j, Y", strtotime($row["publish_date"]));
            $statusTextClass = (strtolower($row["status"]) == "available") ? "text-success" : "text-danger";

            $layout .= "<div class='col-lg-4 col-md-6 mb-4  '>
                            <div class='card'>
                                <img src='picture/{$row["picture"]}' class='card-img-top' alt='Book Cover' >
                                <div class='card-body'>
                                    <h5 class='card-title'>{$row["title"]}</h5>
                                    <p class='card-text'>Author: {$row["author_first_name"]} {$row["author_last_name"]}</p>
                                    <p class='card-text'>ISBN: {$row["isbn"]}</p>
                                    <p class='card-text'>Description: {$row["short_description"]}</p>
                                    <p class='card-text'>Type: {$row["type"]}</p>
                                    <p class='card-text'>Publish Date: {$publishDate}</p>
                                    <p class='card-text'><span class='{$statusTextClass}'>Status: {$row["status"]}</span></p>
                                </div>
                            </div>
                        </div>";
        }
        $layout = "<div class='row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4'>$layout</div>";
    }
} else {
    $layout = "<p>No publisher specified.</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publisher Media</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">T_I_T Library</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- Add your navbar items here -->
            </ul>
            <form class="d-flex" role="search" action="create.php" method="get">
                <button class="btn btn-dark" type="submit">Add Media</button>
            </form>
        </div>
    </div>
</nav>
<!-- End Navbar -->


    <!-- Hero Section -->
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="display-4">Publisher Media</h1>
            <p class="lead">Browse media items published by <?= $publisherName ?></p>
        </div>
    </section>
    <!-- End Hero Section -->

    <!-- Layout Section (Cards) -->
    <div class="container">
        <?= $layout ?>
    </div>
    <!-- End Layout Section -->

     <!-- Footer -->
<footer class="footer mt-auto py-3 bg-dark text-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h5>Contact Information</h5>
                <p>Email: info@yourlibrary.com</p>
                <p>Phone: +123-456-7890</p>
                <p>Address: 123 Library Street, City, Country</p>
            </div>
            <div class="col-md-6">
                <h5>Follow Us</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-light">Facebook</a></li>
                    <li><a href="#" class="text-light">Twitter</a></li>
                    <li><a href="#" class="text-light">Instagram</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
