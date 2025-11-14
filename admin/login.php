<?php
session_start();
include '../db_connect.php'; // Connect to the db
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    // Query to retrieve admin login credentials
    $query = "select * from tbl_admin where username='$username' and password='$password'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['admin'] = $username;
        header("Location: dashboard.php"); // Move to admin dashboard if login is successful
    } else {
        $error = "Invalid credentials"; // Errpr message
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        function preventBack() {
            window.history.forward();
        }
        setTimeout("preventBack()", 0);
        window.onunload = function () {
            null
        };
    </script>
</head>

<body class="bg-light">
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="card shadow-sm w-100" style="max-width: 400px;">
            <div class="card-body">
                <h1 class="h4 text-center mb-4">Admin Login</h1>
                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
                <?php endif; ?>
                <form method="post" novalidate>
                    <!-- Username=admin -->
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="username" required>
                    </div>
                    <!-- Password=admin123 -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100" name="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>