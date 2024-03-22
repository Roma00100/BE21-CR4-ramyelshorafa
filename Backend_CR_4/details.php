<?php 
require_once 'db_connect.php';

$id= $_GET["id"];  
$sql = "SELECT * FROM `media` WHERE id = {$id}";
$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) == 0) {
    $layout = "<p>No details found for this book.</p>";
} else {
    $row = mysqli_fetch_assoc($result);

    $publishDate = date("F j, Y", strtotime($row["publish_date"]));

    $layout = "<div class='container'>
    <img src='picture/{$row["picture"]}' class='img-fluid ' alt='Book Cover' style='height: 70vh;' />
                    <h2>{$row["title"]}</h2>
                    <p><strong>ISBN:</strong> {$row["isbn"]}</p>
                    <p><strong>Description:</strong> {$row["short_description"]}</p>
                    <p><strong>Type:</strong> {$row["type"]}</p>
                    <p><strong>Author:</strong> {$row["author_first_name"]} {$row["author_last_name"]}</p>
                    <p><strong>Publisher:</strong> {$row["publisher_name"]}, {$row["publisher_address"]}</p>
                    <p><strong>Publish Date:</strong> {$publishDate}</p>
                    <p><strong>Status:</strong> {$row["status"]}</p>
              </div>";
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
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
               
            </ul>
            <form class="d-flex" role="search" action="create.php" method="get">
                <button class="btn btn-dark" type="submit">Add Media</button>
            </form>
        </div>
    </div>
</nav>
<!-- End Navbar -->

    <?= $layout ?>
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
