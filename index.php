<?php
include 'db_connect.php'; // Connect to the db
?>
<!DOCTYPE html>
<html>

<head>
    <title>Event Portal</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* To disable the scrollbar at the bottom */
        body {
            overflow-x: hidden;
        }
    </style>
</head>

<body>
    <?php include '_navbar.html'; ?>
    <h1 class="text-center">Upcoming Events</h1>
    <div class="row">
        <?php
        // Retrieve the event details
        $result = $conn->query("SELECT * FROM tbl_events ORDER BY event_date ASC");
        // Fetch each recoord
        while ($row = mysqli_fetch_array($result)) { ?>

            <div class="col-sm-4 mb-4">
                <div class="card ms-2 me-2">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['name']; ?></h5>
                        <p class="card-text"><?= $row['event_date'] ?></p>
                        <p class="card-text"><?= $row['description']; ?></p>
                        <a href="register.php?event_id=<?= $row['id']; ?>" class="btn btn-primary">Register</a>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>
</body>

</html>