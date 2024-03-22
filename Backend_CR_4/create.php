<?php
require_once "db_connect.php";
require_once "file_upload.php";

if(isset($_POST["create"])){
    $title = $_POST["name"];
    $isbn = $_POST["isbn"];
    $short_description = $_POST["short_description"];
    $type = $_POST["type"];
    $author_first_name = $_POST["author_first_name"];
    $author_last_name = $_POST["author_last_name"];
    $publisher_name = $_POST["publisher_name"];
    $publisher_address = $_POST["publisher_address"];
    $publish_date = $_POST["publish_date"];
    $status = $_POST["status"];

 
    $statusClass = ($status == "Available") ? "bg-success" : "bg-danger";

    $picture = fileUpload($_FILES["picture"]);

    $sql = "INSERT INTO media (title, picture,  isbn, short_description, type, author_first_name, author_last_name, publisher_name, publisher_address, publish_date, status) 
            VALUES ('$title', '{$picture[0]}',  '$isbn', '$short_description', '$type', '$author_first_name', '$author_last_name', '$publisher_name', '$publisher_address', '$publish_date', '$status')";

    if(mysqli_query($connect, $sql)){
        echo "<div class='alert alert-success' role='alert'>
        New record has been created, {$picture[1]}
        </div>";
        header("refresh: 3; url= index.php");
    } else {
        echo "<div class='alert alert-danger' role='alert'>
        Error found, {$picture[1]}
        </div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Media</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        .status-available {
            background-color: #28a745;
            color: white;
        }
        .status-not-available {
            background-color: #dc3545;
            color: white;
        }
    </style>
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


    <div class="container my-5">
        <h2>Create a new media</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3 mt-3">
                <label for="name" class="form-label">Title</label>
                <input type="text" class="form-control" id="name" aria-describedby="name" name="name">
            </div>
            
            <div class="mb-3">
                <label for="isbn" class="form-label">ISBN</label>
                <input type="text" class="form-control" id="isbn" aria-describedby="isbn" name="isbn">
            </div>
            <div class="mb-3">
                <label for="short_description" class="form-label">Short Description</label>
                <textarea class="form-control" id="short_description" rows="3" name="short_description"></textarea>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <input type="text" class="form-control" id="type" aria-describedby="type" name="type" placeholder="Type of media...">
            </div>
            <div class="mb-3">
                <label for="author_first_name" class="form-label">Author First Name</label>
                <input type="text" class="form-control" id="author_first_name" aria-describedby="author_first_name" name="author_first_name">
            </div>
            <div class="mb-3">
                <label for="author_last_name" class="form-label">Author Last Name</label>
                <input type="text" class="form-control" id="author_last_name" aria-describedby="author_last_name" name="author_last_name">
            </div>
            <div class="mb-3">
                <label for="publisher_name" class="form-label">Publisher Name</label>
                <input type="text" class="form-control" id="publisher_name" aria-describedby="publisher_name" name="publisher_name">
            </div>
            <div class="mb-3">
                <label for="publisher_address" class="form-label">Publisher Address</label>
                <input type="text" class="form-control" id="publisher_address" aria-describedby="publisher_address" name="publisher_address">
            </div>
            <div class="mb-3">
                <label for="publish_date" class="form-label">Publish Date</label>
                <input type="date" class="form-control" id="publish_date" aria-describedby="publish_date" name="publish_date">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <div class="btn-group" role="group" aria-label="Status">
                    <button type="button" class="btn btn-secondary" onclick="document.getElementById('status').value = 'Available'">Available</button>
                    <button type="button" class="btn btn-secondary" onclick="document.getElementById('status').value = 'Not Available'">Not Available</button>
                </div>
                <input type="hidden" id="status" name="status">
            </div>
            <div class="mb-3">
                <label for="picture" class="form-label">Picture</label>
                <input type="file" class="form-control" id="picture" aria-describedby="picture" name="picture">
            </div>
            <button name="create" type="submit" class="btn btn-primary">Create Media</button>
            <a href="index.php" class="btn btn-warning">Back to home page</a>
        </form>
    </div>

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
</body>
</html>
