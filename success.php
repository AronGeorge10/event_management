<?php
include 'db_connect.php'; // Connect to the db
$event_id = $_GET['event_id'];// Get event_id from url

// Query to retrieve event details
$query = "SELECT * FROM tbl_events where id=$event_id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Success</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        h4 {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="card shadow-sm w-100 align-items-center" style="max-width: 500px;">
            <div class="card-body">
                <center>
                    <h1>Registration Successful</h1>
                    <p>Thank you <b><?= $_GET['name']; ?></b> for registering.</p>
                    <!-- Display Event Details -->
                    <h4>Event Summary</h4>
                    <p>Name: <?= $row['name'] ?></p>
                    <p>Date: <?= $row['event_date'] ?></p>
                    <p>Description: <?= $row['description'] ?></p>
                    <a class="btn btn-success" href="index.php">Back to Home</a>
                </center>
            </div>
        </div>
    </div>
</body>

</html>