<?php
include 'db_connect.php';// Connect to the db

if (!isset($_GET['event_id'])) {
    header("Location: index.php");
    exit;
}

$event_id = $_GET['event_id'];// Get event_id from url
$query = "SELECT * FROM tbl_events WHERE id=$event_id"; //query to retrieve the event details
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);

if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Query to input registration details
    $insert = "INSERT INTO tbl_registrations(name, email, event_id) VALUES('$name','$email','$event_id')";
    $result = mysqli_query($conn, $insert);
    if ($result) {
        header("Location: success.php?name=$name&event_id=$event_id");// Pass user's name and event_id
    }
    exit;

}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Register for Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
    <style>
        /* Error validation message */
        .error-message {
            color: red;
        }
    </style>
</head>

<body class="bg-light">
    <?php include '_navbar.html'; ?>
    <?php if (isset($error))
        echo "<p class='error'>$error</p>"; ?>
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="card shadow-sm w-100" style="max-width: 500px;">
            <div class="card-body">
                <h1 class="h4 text-center mb-4">Register for <?php echo $row['name']; ?></h1>
                <form method="post" id="form">
                    <div class="mb-3">
                        <!-- Input User's Name -->
                        <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" required>
                    </div>
                    <span class="error-name error-message"></span>
                    <div class="mb-3">
                        <!-- Input User's Email -->
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your email"
                            required>
                    </div>
                    <span class="error-email error-message"></span>
                    <div class="mb-3">
                        <!-- Event Field cannot be edited -->
                        <input type="text" class="form-control" value="<?php echo $row['name']; ?>" name="event"
                            id="event" readonly>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit" id="submit" disabled>Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>