<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

include '../db_connect.php'; // Connect to the db
$event_id = $_GET['id']; // get event_id passed from dashboard
$query = "SELECT * FROM tbl_events where id=$event_id"; // retrieve event details 
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Event</title>
</head>

<body>
    <!-- Display the event details -->
    <?php
    while ($row = mysqli_fetch_array($result)) {
        ?>
        <h1>Name: <?= $row['name']; ?></h1>
        <p><b>Date: </b><?= $row['event_date']; ?></p>
        <p><b>Description: </b><?= $row['description']; ?></p>
        <?php
    } ?>
</body>

</html>