<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

include '../db_connect.php'; // Connect to the db

// Query to retrieve registration details
$query = "SELECT r.id as rid, r.name, r.email, e.id, e.name AS event_name, r.registered_at 
                        FROM tbl_registrations r 
                        JOIN tbl_events e ON r.event_id = e.id
                        ORDER BY r.registered_at DESC";
$result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/script.js"></script>
    <script>
        // Prevent using the browser back button to go back to the admin panel after logging out
        function preventBack() {
            window.history.forward();
        }

        setTimeout("preventBack()", 0);
        window.onunload = function () {
            null
        };
    </script>

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="addevent.php">Add Event</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-danger" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Table to dispay the details -->
    <table class="table">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Event</th>
            <th scope="col">Date Registered</th>
            <th scope="col">Action</th>
        </tr>
        <?php while ($row = mysqli_fetch_array($result)) { ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['event_name'] ?></td>
                <td><?= $row['registered_at'] ?></td>
                <td>
                    <a href="view.php?id=<?= $row['id'] ?>" class="btn btn-primary">View</a> |
                    <a href="delete.php?id=<?= $row['rid'] ?>" class="btn btn-danger" onclick="deleteRecord()">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>

</body>

</html>