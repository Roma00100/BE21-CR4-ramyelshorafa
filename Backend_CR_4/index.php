<?php
require_once "db_connect.php"; 

// Handling Search
if(isset($_GET['search'])) {
    $searchKeyword = $_GET['search'];
    $sql = "SELECT * FROM media WHERE title LIKE '%$searchKeyword%' OR author_first_name LIKE '%$searchKeyword%' OR author_last_name LIKE '%$searchKeyword%'";
} else {
    $sql = "SELECT * FROM media";
}

$result = mysqli_query($connect, $sql);
$layout = "";

if(mysqli_num_rows($result) == 0) { 
    $layout = "<p>No result found</p>";
} else {
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);  
    foreach ($rows as $value) {
        $statusTextClass = (strtolower($value["status"]) == "available") ? "text-success" : "text-danger";
        $layout .= "<div class='col-lg-4 col-md-6 mb-4'>
            <div class='card'>
                <img src='picture/{$value["picture"]}' class='card-img-top image-height' alt=' Image'>
                <div class='card-body'>
                    <h5 class='card-title'>Title: {$value["title"]}</h5>
                    <p class='card-text'>Author name: {$value["author_first_name"]} {$value["author_last_name"]} </p>
                    <p class='card-text'>International Standard Book Number: {$value["isbn"]} </p>
                    <p class='card-text'>Description: {$value["short_description"]} </p>
                    <p class='card-text'><span class='{$statusTextClass}'>Status: {$value["status"]}</span></p>
                    <a href='details.php?id={$value["id"]}' class='btn btn-primary'>Details</a>
                    <!-- Added link to view publisher -->
                    <a href='publisher.php?publisher={$value["publisher_name"]}' class='btn btn-secondary'>View Publisher</a>
                </div>
            </div>
        </div>";
    }      
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
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
<section class="jumbotron heroSection text-center d-flex align-items-center justify-content-center bg-dark mb-5" style="background-image: url('https://cdn.pixabay.com/photo/2017/08/06/22/01/books-2596809_1280.jpg'); height: 70vh;">
    <div class="container ">
        <!-- Search Form -->
        <form action="" method="GET" class="d-flex justify-content-center">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search by title or author" name="search">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
            </div>
        </form>
    </div>
</section>
<!-- End Hero Section -->


    <!-- Layout Section (Cards) -->
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?= $layout ?>
        </div>
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
</html
