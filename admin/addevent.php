<?php
include '../db_connect.php'; // Connect to the db

if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $description = $_POST['description'];

    // query to input event details
    $insert = "INSERT INTO tbl_events(name, event_date, description) VALUES('$name','$date','$description')";
    $result = mysqli_query($conn, $insert);
    if ($result) {
        ?>
        <script>alert('Event added successfully');</script>
        <?php
        header("Location: dashboard.php");
    }
    exit;

}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Add Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
    <style>
    </style>
</head>

<body class="bg-light">
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="card shadow-sm w-100" style="max-width: 500px;">
            <div class="card-body">
                <h1 class="h4 text-center mb-4">Add Event</h1>
                <form method="post" id="form">
                    <!-- Input Event Name -->
                    <div class="mb-3">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Event Name" required>
                    </div>
                    <!-- Input Event Date -->
                    <div class="mb-3">
                        <input type="date" class="form-control" name="date" id="date"
                            min="<?= date('Y-m-d', strtotime('+1 day')); ?>" required>
                    </div>
                    <!-- Input Event Description -->
                    <div class="mb-3">
                        <textarea class="form-control" name="description" placeholder="Description"></textarea>
                    </div>
                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>